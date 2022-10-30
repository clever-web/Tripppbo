<?php

namespace App\Traits;

use App\Models\Report;

trait Reportable
{
    public function report($reported_by, $report_reason)
    {
        $report = new Report();
        $report->reported_by = $reported_by;
        $report->violating_object_id = $this->id;
        $report->violating_object = $this->reportable_object_name;
        $report->report_reason = $report_reason;
        $report->save();
    }
}
