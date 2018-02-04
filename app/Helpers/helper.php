<?php

if (!function_exists('convertDateToDefault')) {
    function convertDateToDefault($date)
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}