<?php

use App\Models\WebSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

if (!function_exists("settings")) {


    /**
     * Fetch all record for web site settings
     * @return Collection
     */
    function settings($key = null)
    {
        static $settings = null;
        if ($settings) {
            return ($key) ? (($settings->where('name', $key)->count()) ? $settings->where('name', $key)->first()->value : $settings) : $settings;
        }
        if (Cache::has("settings")) {
            $settings = Cache::get("settings");
        } else {
            $settings = WebSetting::get();
        }
        if ($key) {
            return ($settings->where('name', $key)->count()) ? $settings->where('name', $key)->first()->value : null;
        }

        return $settings;
    }
}

if (!function_exists("active_route")) {
    /**
     * Check if given route is active
     * @param array route name
     * @return boolean|string
     * @version 1.0
     */

    function active_route(array $route_name, $return = "active")
    {
        return (in_array(Route::currentRouteName(), $route_name)) ? $return : null;
    }
}

/**
 * Format bytes to kb, mb, gb, tb
 *
 * @param  integer $size
 * @param  integer $precision
 * @return integer
 */
function formatBytes($size, $precision = 2)
{
    if ($size > 0) {
        $size = (int) $size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
    } else {
        return $size;
    }
}
