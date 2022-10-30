<?php
$carbon_created_at = \Carbon\Carbon::parse($date);
$now = \Carbon\Carbon::now();
$difference_in_minutes = $carbon_created_at->diffInMinutes($now);
$difference_in_hours = $carbon_created_at->diffInHours($now);
$difference_in_days = $carbon_created_at->diffInDays($now);
?>


@if($difference_in_days > 1)
<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Days Left</div>
</div>
@elseif($difference_in_days > 0)
<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Day Left</div>
</div>

@elseif($difference_in_hours > 1)

<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Hours Left</div>
</div>
@elseif($difference_in_hours > 0)

<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Hour Left</div>
</div>
@elseif($difference_in_minutes > 1)

<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Minutes Left</div>
</div>
@elseif($difference_in_minutes > 0)

<div class="d-flex flex-column">
    <div class="text-center" style="font-weight: 900"> {{ $difference_in_days }} </div>
    <div class="text-center" >Minute Left</div>
</div>
@else
Less than a minute
@endif
