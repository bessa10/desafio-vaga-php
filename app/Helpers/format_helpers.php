<?php

use Carbon\Carbon;

if (!function_exists('format_date')) {
    function format_date($date, $format = 'd/m/Y')
    {
        return $date ? Carbon::parse($date)->format($format) : '';
    }
}
