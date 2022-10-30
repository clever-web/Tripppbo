<?php
$carbon_created_at = \Carbon\Carbon::parse($date);
$now = \Carbon\Carbon::now();
$difference_in_minutes = $carbon_created_at->diffInMinutes($now);
$difference_in_hours = $carbon_created_at->diffInHours($now);
$difference_in_days = $carbon_created_at->diffInDays($now);
?>

@if ($difference_in_days > 14)

{{ $carbon_created_at->format('M, d  h:i') }}

@elseif($difference_in_days > 1)

{{ $difference_in_days }} days ago

@elseif($difference_in_hours > 1)

{{ $difference_in_hours }} hours ago

@elseif($difference_in_hours > 0)

{{ $difference_in_hours }} hour ago

@elseif($difference_in_minutes > 1)

{{ $difference_in_minutes }} minutes ago
@elseif($difference_in_minutes > 0)

{{ $difference_in_minutes }} minute ago

@else
Just Now
@endif