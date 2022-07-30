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
