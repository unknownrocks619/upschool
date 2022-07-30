<?php

namespace App\Observers\Admin;

use App\Models\WebSetting;
use Illuminate\Support\Facades\Cache;

class WebsiteObserver
{
    private $_cache_name = "settings";
    /**
     * Handle the WebSetting "created" event.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return void
     */
    public function created(WebSetting $webSetting)
    {
        //
        // Cache::put($this->_cache_name, WebSetting::selec(["name", "value", "additional_settings"])->get());
    }

    /**
     * Handle the WebSetting "updated" event.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return void
     */
    public function updated(WebSetting $webSetting)
    {
        //
        Cache::put($this->_cache_name, WebSetting::select(["name", "value", "additional_settings"])->get());
    }

    /**
     * Handle the WebSetting "deleted" event.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return void
     */
    public function deleted(WebSetting $webSetting)
    {
        //
        Cache::put($this->_cache_name, WebSetting::select(["name", "value", "additional_settings"])->get());
    }

    /**
     * Handle the WebSetting "restored" event.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return void
     */
    public function restored(WebSetting $webSetting)
    {
        //
        Cache::put($this->_cache_name, WebSetting::select(["name", "value", "additional_settings"])->get());
    }

    /**
     * Handle the WebSetting "force deleted" event.
     *
     * @param  \App\Models\WebSetting  $webSetting
     * @return void
     */
    public function forceDeleted(WebSetting $webSetting)
    {
        //
        Cache::put($this->_cache_name, WebSetting::select(["name", "value", "additional_settings"])->get());
    }
}
