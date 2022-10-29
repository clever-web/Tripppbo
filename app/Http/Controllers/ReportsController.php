<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\SoloTrip;
use App\Models\Trip;
use App\Models\TripJoinRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Payment;

class ReportsController extends Controller
{
    public function reportObject(Request $request)
    {
        $request->validate(
            [
                'violating_object' => 'required|string|max:20',
                'violating_object_id' => 'required|numeric',
                'report_reason' => 'nullable|string|max:1024',
                'report_comment' => 'nullable|string|max:1024',

            ]
            );

        $report = new Report();
        $report->reported_by_user_id = Auth::id();
        $report->violating_object = $request->input('violating_object');
        $report->violating_object_id = $request->input('violating_object_id');
        $report->report_reason = $request->input('report_reason');
        $report->report_comment = $request->input('report_comment');
        $report->save();
    }

    public function report_user(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'reason' => 'required|string|max:1024',

        ]);
        $reported_id = $request['id'];
        $report_reason = $request['reason'];

        $reported_user = User::findOrFail($reported_id);
        $reported_user->report(Auth::id(), $report_reason);
    }

    public function report_trip(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'reason' => 'required|string|max:1024',

        ]);
        $reported_id = $request['id'];
        $report_reason = $request['reason'];

        $reported_trip = Trip::findOrFail($reported_id);
        $reported_trip->report(Auth::id(), $report_reason);
    }

    public function report_solo_trip(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'reason' => 'required|string|max:1024',

        ]);
        $reported_id = $request['id'];
        $report_reason = $request['reason'];

        $reported_solo_trip = SoloTrip::findOrFail($reported_id);
        $reported_solo_trip->report(Auth::id(), $report_reason);
    }

    public function report_trip_join_request(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'reason' => 'required|string|max:1024',

        ]);
        $reported_id = $request['id'];
        $report_reason = $request['reason'];

        $reported_trip_join_request = TripJoinRequest::findOrFail($reported_id);
        $reported_trip_join_request->report(Auth::id(), $report_reason);
    }
}
