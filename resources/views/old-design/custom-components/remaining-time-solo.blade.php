<?php
$carbon_created_at = \Carbon\Carbon::parse($date);
$now = \Carbon\Carbon::now();
$difference_in_minutes = $carbon_created_at->diffInMinutes($now);
$difference_in_hours = $carbon_created_at->diffInHours($now);
$difference_in_days = $carbon_created_at->diffInDays($now);
?>


@if($difference_in_days > 1)
<span style="font-weight: 900">{{ $difference_in_days }}</span> Days Left
@elseif($difference_in_days > 0)

<span style="font-weight: 900">{{ $difference_in_days }}</span> Day Left

@elseif($difference_in_hours > 1)

<span style="font-weight: 900">{{ $difference_in_days }}</span> Hours left

@elseif($difference_in_hours > 0)

<span style="font-weight: 900">{{ $difference_in_days }}</span> Hour left

@elseif($difference_in_minutes > 1)

<span style="font-weight: 900">{{ $difference_in_days }}</span> Minutes left

@elseif($difference_in_minutes > 0)

<span style="font-weight: 900">{{ $difference_in_days }}</span> Minute left

@else
Less than a minute
@endif