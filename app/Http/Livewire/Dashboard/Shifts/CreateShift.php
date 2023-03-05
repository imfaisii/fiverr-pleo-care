<?php

namespace App\Http\Livewire\Dashboard\Shifts;

use App\Models\Client;
use App\Models\JobRole;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class CreateShift extends Component
{
    public $shift,
        $clientData,
        $expectedPay,
        $clients,
        $jobRoles,
        $description,
        $address,
        $address_longitude,
        $address_latitude;

    public function mount()
    {
        $this->shift['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        $this->clients = Client::whereBelongsTo(auth()->user()->manager)->get();
        $this->jobRoles = JobRole::where('company_id', auth()->user()->manager->company->id)->get();
    }

    public function rules()
    {
        return [
            'shift.name' => ['required', 'string'],
            'shift.job_role_id' => ['required', 'exists:job_roles,id'],
            'shift.start_time' => ['required'],
            'shift.end_time' => ['required', 'after:shift.start_time'],
            'shift.client_id' => ['required', 'exists:clients,id'],
            'address' => ['required'],
            'address_longitude' => ['required'],
            'address_latitude' => ['required'],
            'description' => ['required', 'string'],
        ];
    }

    public function updated($property, $value)
    {
        if ($property == 'description') {
            $this->shift['description'] = $value;
        }

        if ($property == 'address') {
            $this->shift['address'] = $value;
        }

        if ($property == 'address_longitude') {
            $this->shift['address_longitude'] = $value;
        }

        if ($property == 'address_latitude') {
            $this->shift['address_latitude'] = $value;
        }

        if ($property == 'shift.client_id') {
            $this->clientData = Client::find($value);
        }

        if (!array_diff(['start_time', 'end_time', 'job_role_id'], array_keys($this->shift))) {
            $totalPay=0;
            $defaultPay=0;
            $startTime = Carbon::parse($this->shift['start_time']);
            $endTime = Carbon::parse($this->shift['end_time']);
            $employeeJobDaysArray=$this->getDays([
                'start_time'=>$startTime,
                'end_time'=>$endTime,
            ]); // got days array  the from user selected start and end time
            $jobRole = JobRole::find($this->shift['job_role_id'])->with('payments')->first();
            $defaultPay=$jobRole->default;
            $perDayPayments = $jobRole->payments;
                foreach($employeeJobDaysArray as $key=>$eachUserDay){
                $eachDayUserTotalMinutes= $eachUserDay['start_time']->diffInMinutes( $eachUserDay['end_time']);
                foreach($perDayPayments as $payKey=>$eachPayDay){
                    if (($eachUserDay['start_time']->copy()->format('N')!=$eachPayDay['day_number']) || (is_null($eachPayDay['from_time']) || is_null($eachPayDay['to_time']))){
                            // this is not the day in user's entered time
                        continue;
                    }
                    $payArray=[
                        'start_time'=>Carbon::parse(Carbon::parse($eachPayDay['from_time'])->setDate($eachUserDay['start_time']->format('Y'), $eachUserDay['start_time']->format('m'), $eachUserDay['start_time']->format('d'))),
                        'end_time'=>Carbon::parse(Carbon::parse($eachPayDay['to_time'])->setDate($eachUserDay['end_time']->format('Y'), $eachUserDay['end_time']->format('m'), $eachUserDay['end_time']->format('d'))),
                        'pay'=>$eachPayDay['payment_amount'],
                    ];
                    $resultArray=$this->GetCommonMinutesAndPay($eachUserDay,$payArray);
                    if(!empty($resultArray)){
                        $eachDayUserTotalMinutes=$eachDayUserTotalMinutes-$resultArray['commonMinutes'];   // jinty common minutes nikly user k total minutes s minus krdo
                        $totalPay=$totalPay+$resultArray['pay'];
                    }
                }

                // here agr usky minutes bach gay means default pay add krni
                if($eachDayUserTotalMinutes>0){
                    $totalPay=$totalPay+($eachDayUserTotalMinutes/60)*$defaultPay;
                    $eachDayUserTotalMinutes=0;
                }

            }

            dd($totalPay);
            // foreach ($perDayPayments as $payment) {

            //     $commonMinutes = $this->calculateMinutes(
            //         ['start' => $startTime, 'end' => $endTime],
            //         ['start' => $payment->from_time, 'end' => $payment->to_time]
            //     );
            // }

            if (filled($this->shift['hourly_rate']) && $startTime->lt($endTime)) {
                $minutes = $startTime->diffInMinutes($endTime);
                $this->expectedPay = ($minutes / 60) * $this->shift['hourly_rate'];
            } else {
                $this->expectedPay = null;
            }
        } else {
            $this->expectedPay = null;
        }

        $this->validateOnly($property);
    }

    public function GetCommonMinutesAndPay(array $UserAttendanceArray,array $payArray):array{
        try{
            $minutesCommon=0;
                // case 1 all  payRole time falls within slot
            if(($payArray['start_time']->gte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->lte($UserAttendanceArray['end_time']))){
               $minutesCommon= $payArray['start_time']->diffInMinutes( $payArray['end_time']);
            }


            // case 2  start time is not within  slot
            else if(($payArray['start_time']->lte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->lte($UserAttendanceArray['end_time']))){
                $minutesCommon= $UserAttendanceArray['start_time']->diffInMinutes( $payArray['end_time']);

            }

            // case 3 end time is not within slot
            else if(($payArray['start_time']->gte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->gte($UserAttendanceArray['end_time']))){
                $minutesCommon= $payArray['start_time']->diffInMinutes( $UserAttendanceArray['end_time']);

            }


            //case4 both time are not within  slots
           else  if(($payArray['start_time']->lte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->gte($UserAttendanceArray['end_time']))){
                $minutesCommon= $UserAttendanceArray['start_time']->diffInMinutes( $UserAttendanceArray['end_time']);

            }
            return [
                'commonMinutes'=>$minutesCommon,
                'pay'=>($minutesCommon/60)*$payArray['pay'],
            ];
        }catch(Exception $e){
        //    dd($e->getMessage());
        return [];
        }
    }


    public function getDays(array $start_end_time){
        $startDate = Carbon::parse($start_end_time['start_time']);
$endDate = Carbon::parse($start_end_time['end_time']);
$days = [];
$currentDate = $startDate->copy();

while ($currentDate <= $endDate) {
    $days[] = [
        'start_time' => ($currentDate == $startDate) ? Carbon::parse($currentDate->format('Y-m-d H:i:s ')) : Carbon::parse(Carbon::parse($currentDate)->format('Y-m-d 00:00:00')),
        'end_time' => ($currentDate == $endDate) ? Carbon::parse($currentDate->format('Y-m-d H:i:s ')) : Carbon::parse(Carbon::parse($currentDate)->format('Y-m-d 23:59:59')),
    ];
    $currentDate->addDay();
}
$days[count($days)-1]['end_time']=$start_end_time['end_time'];
return ($days);

    }


    // public function calculateMinutes(array $input, array $paymentTime)
    // {
    //     dd(
    //         $input['start'],
    //         $input['end'],
    //         $paymentTime['start'],
    //         $paymentTime['end'],
    //         $this->findCommonMinutes(
    //             $input['start'],
    //             $input['end'],
    //             $paymentTime['start'],
    //             $paymentTime['end']
    //         )
    //     );
    // }

    // public function findCommonMinutes($start1, $end1, $start2, $end2)
    // {

    // }

    public function store()
    {
        $this->validate();
        dd($this->shift);
        try {
            auth()->user()->manager->shifts()->firstOrCreate($this->shift);

            // sending mail
            //! Mail::to($this->account['email'])->send(new CredentialsMail($this->account));

            $this->resetExcept(['clients', 'jobRoles']);
            $this->emit('toast', 'success', 'Success Notfication', 'Shift created successfully.');
            $this->shift['uuid'] = \Illuminate\Support\Str::uuid()->toString();
        } catch (Exception $e) {
            $this->emit('toast', 'error', 'Exception Occured', 'There was an exception, ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dashboard.shifts.create-shift')
            ->extends('layouts.dashboard.app')
            ->section('content');
    }
}
