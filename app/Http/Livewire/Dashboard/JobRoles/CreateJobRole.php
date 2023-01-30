<?php

namespace App\Http\Livewire\Dashboard\JobRoles;

use App\Traits\JsonifyResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\JobRole;
use Illuminate\Support\Facades\Redirect;

class CreateJobRole extends Component
{
    use JsonifyResponse;

    public $payment, $events, $updateId = null;

    public function mount(JobRole $jobRole)
    {
        $this->payment = $jobRole->toArray();

        // ignore id on update
        $this->updateId = array_key_exists('id', $this->payment) ? $this->payment['id'] : NULL;
    }

    public function updated($property, $value)
    {
        $this->validateOnly($property);
    }

    public function rules(): array
    {
        return [
            'payment.name' => [
                'required',
                'unique:job_roles,name,' .  $this->updateId . ',id,company_id,' . auth()->user()->company->id
            ],
            'payment.default' => 'required|numeric',
            'events' => 'nullable|array'
        ];
    }

    public function isFullDay(array $data): bool
    {
        return count($data) == 3 ? true : false;
    }

    public function getFormattedData($data): array
    {
        $weekDays = Carbon::getDays();
        $resultant = [];

        foreach ($data as $key => $calendarEntry) {
            $from = Carbon::parse($calendarEntry['start']);

            $resultant[] = [
                'day' => $weekDays[$from->dayOfWeek],
                'day_number' => $from->dayOfWeek,
                'from_time' => self::isFullDay($calendarEntry) ? NULL : $from,
                'to_time' => self::isFullDay($calendarEntry) ? NULL : Carbon::parse($calendarEntry['end']),
                'is_full_day' => self::isFullDay($calendarEntry) ? true : false,
                'payment_amount' => $calendarEntry['title'],
            ];
        }

        return $resultant;
    }

    public function saveRoles()
    {
        $this->validate();

        try {
            DB::transaction(function () {

                $data = [
                    'name' => $this->payment['name'],
                    'default' => $this->payment['default'],
                    'events' => $this->events ? json_encode($this->events) : NULL
                ];

                // model dealing
                $jobRole = auth()->user()->company->jobRoles()->updateOrCreate(['id' => $this->updateId], $data);

                // if there are some events on calendar add them as payments
                if ($this->events) {
                    // format data for job role payments
                    $formattedData = self::getFormattedData($this->events);

                    foreach ($formattedData as $key => $jobRolePayment)
                        $jobRole->payments()->firstOrCreate($jobRolePayment);
                }
            });

            self::sendSuccess("Payments were saved successfully.");
            return Redirect::route('job-roles.list');
        } catch (\Exception $e) {
            self::sendException($e);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.job-roles.create-job-role')
            ->extends('layouts.dashboard.app')
            ->section('content');
    }
}
