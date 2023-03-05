<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

function checkStatus($routeName)
{
    if (Route::is($routeName))
        return true;
}

function getExpectedPayOfShift($employeeJobDaysArray, $perDayPayments, $totalPay, $defaultPay)
{
    foreach ($employeeJobDaysArray as $key => $eachUserDay) {
        $eachDayUserTotalMinutes = $eachUserDay['start_time']->diffInMinutes($eachUserDay['end_time']);
        foreach ($perDayPayments as $payKey => $eachPayDay) {
            if (($eachUserDay['start_time']->copy()->format('N') != $eachPayDay['day_number']) || (is_null($eachPayDay['from_time']) || is_null($eachPayDay['to_time']))) {
                continue;
            }
            $payArray = [
                'start_time' => Carbon::parse(Carbon::parse($eachPayDay['from_time'])->setDate($eachUserDay['start_time']->format('Y'), $eachUserDay['start_time']->format('m'), $eachUserDay['start_time']->format('d'))),
                'end_time' => Carbon::parse(Carbon::parse($eachPayDay['to_time'])->setDate($eachUserDay['end_time']->format('Y'), $eachUserDay['end_time']->format('m'), $eachUserDay['end_time']->format('d'))),
                'pay' => $eachPayDay['payment_amount'],
            ];
            $resultArray = getCommonMinutesAndPay($eachUserDay, $payArray);
            if (!empty($resultArray)) {
                $eachDayUserTotalMinutes = $eachDayUserTotalMinutes - $resultArray['commonMinutes'];   // jinty common minutes nikly user k total minutes s minus krdo
                $totalPay = $totalPay + $resultArray['pay'];
            }
        }

        if ($eachDayUserTotalMinutes > 0) {
            $totalPay = $totalPay + ($eachDayUserTotalMinutes / 60) * $defaultPay;
            $eachDayUserTotalMinutes = 0;
        }
    }

    return $totalPay;
}

function getDays(array $start_end_time)
{
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
    $days[count($days) - 1]['end_time'] = $start_end_time['end_time'];

    return ($days);
}


function getCommonMinutesAndPay(array $UserAttendanceArray, array $payArray): array
{
    try {
        $minutesCommon = 0;
        // case 1 all  payRole time falls within slot
        if (($payArray['start_time']->gte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->lte($UserAttendanceArray['end_time']))) {
            $minutesCommon = $payArray['start_time']->diffInMinutes($payArray['end_time']);
        }

        // case 2  start time is not within slot
        else if (($payArray['start_time']->lte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->lte($UserAttendanceArray['end_time']))) {
            $minutesCommon = $UserAttendanceArray['start_time']->diffInMinutes($payArray['end_time']);
        }

        // case 3 end time is not within slot
        else if (($payArray['start_time']->gte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->gte($UserAttendanceArray['end_time']))) {
            $minutesCommon = $payArray['start_time']->diffInMinutes($UserAttendanceArray['end_time']);
        }

        //case4 both time are not within  slots
        else  if (($payArray['start_time']->lte($UserAttendanceArray['start_time'])) && ($payArray['end_time']->gte($UserAttendanceArray['end_time']))) {
            $minutesCommon = $UserAttendanceArray['start_time']->diffInMinutes($UserAttendanceArray['end_time']);
        }
        return [
            'commonMinutes' => $minutesCommon,
            'pay' => ($minutesCommon / 60) * $payArray['pay'],
        ];
    } catch (Exception $e) {
        return [];
    }
}
