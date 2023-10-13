<?php

namespace App\Providers;

use Harimayco\Menu\Facades\Menu;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\AdminSetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('frontend::*',function($view) {
            $primarymenu = Menu::get(1);
            $sidemenu = Menu::get(5);
            $footermenu_1 = Menu::get(2);
            $quicklinks = Menu::get(3);

            $footer_name_1 = AdminSetting::getMenuNameById('2');

            $menulist = array(
                'primarymenu'           => $primarymenu,
                'sidemenu'              => $sidemenu,
                'footermenu_1'          => $footermenu_1,
                'quicklinks'          => $quicklinks,
            );
            $view->with('menulist', $menulist);

            $menuname = array(
                'footer_name_1' => $footer_name_1,
            );
            
            $view->with('menuname', $menuname);
            
        });

        view()->composer('*',function($view) {
            $sitedetail = AdminSetting::findorfail('1');
            $view->with('sitedetail', $sitedetail);
        });
    }
}
