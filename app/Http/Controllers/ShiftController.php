<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\ShiftCheckIn;
use Illuminate\Http\Request;

class ShiftController
{
    public function index(Request $request, string $uuid)
    {
        $shift = Shift::whereUuid($uuid)->first();

        abort_if(!$shift, 404, "Shift {$uuid} not found.");

        return view('start-shift', ['shift_id' => $shift->id]);
    }

    public function check(Request $request)
    {
        ShiftCheckIn::firstOrCreate($request->except('_token'));

        return redirect()->back()->with('success', 'Successfully checked');
    }
}
