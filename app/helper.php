<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

if (!function_exists('dateTimeFormat')) {
    /**
     * format date time
     *
     * @param date-time $date
     * @return false|string
     */
    function dateTimeFormat($date)
    {
        return date("Y-m-d", strtotime($date));
    }
}