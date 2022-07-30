<?php

namespace App\Observers\Admin;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

class MenuObserver
{



    /**
     * Handle the Menu "created" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function created(Menu $menu)
    {
        //
        if ($menu->parent_id) {
            $get_max_order = Menu::select("sort_by")->where('parent_id', $menu->parent_id)->max('sort_by');
        } else {
            $record = Menu::select('sort_by')->where('parent_id', null);
            $total_record = $record->where('id', '!=', $menu->id)->count();
            $get_max_order = Menu::select('sort_by')->max('sort_by');

            if ($total_record == 1) {
                $get_max_order++;
            }
        }
        $menu->sort_by =  ($get_max_order == 1) ? $get_max_order : $get_max_order + 1;
        $menu->saveQuietly();

        if (settings('cache')) {
            Cache::put('menus', Menu::where('active', true)->tree()->depthFirst()->orderBy('sort_by')->get()->toTree());
        }
    }
    /**
     * Handle the Menu "updated" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updated(Menu $menu)
    {
        //

        if ($menu->isClean('sort_by')) {
            if (settings('cache')) {
                Cache::put('menus', Menu::where('active', true)->tree()->depthFirst()->orderBy('sort_by')->get()->toTree());
            }
            return;
        };

        if (is_null($menu->sort_by) || !$menu->sort_by) {
            $maxOrder = (!$menu->parent_id) ? Menu::select('sort_by')->where('parent_id', null)->orWhere('parent_id', 0)->max('sort_by')  : Menu::select('sort_by')->where('parent_id', $menu->parent_id)->max('sort_by');
            $menu->sort_by = $maxOrder + 1;
        }
        if ($menu->getOriginal('sort_by') > $menu->sort_by) {
            $positionRange = [
                $menu->sort_by,
                $menu->getOriginal("sort_by")
            ];
        } else {
            $positionRange = [
                $menu->getOriginal('sort_by'), $menu->sort_by
            ];
        }
        $reorderMenu = Menu::whereBetween('sort_by', $positionRange);
        if ($menu->parent_id) {
            $reorderMenu->where('parent_id', $menu->parent_id);
        } else {
            $reorderMenu->where(function ($query) {
                return $query->where('parent_id', null)->orWhere('parent_id', 0);
            });
        }

        $reorderMenuList = $reorderMenu->get();
        dd($reorderMenuList);
        foreach ($reorderMenuList as $orderMenu) {
            if ($menu->getOriginal("sort_by") < $menu->sort_by) {
                $orderMenu->sort_by--;
            } else {
                $orderMenu->sort_by++;
            }
            $orderMenu->saveQuietly();
        }

        if (settings('cache')) {
            Cache::put('menus', Menu::where('active', true)->tree()->depthFirst()->orderBy('sort_by')->get()->toTree());
        }
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        //
        if (settings('cache')) {
            Cache::put('menus', Menu::where('active', true)->tree()->depthFirst()->orderBy('sort_by')->get()->toTree());
        }
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //

    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
