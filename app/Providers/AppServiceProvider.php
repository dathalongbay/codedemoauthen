<?php

namespace App\Providers;
use App\Model\Admin\ConfigModel;
use App\Model\Admin\MenuItemModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        $items = ConfigModel::all();

        $config = array();
        $config[] = 'web_name';
        $config[] = 'header_logo';
        $config[] = 'footer_logo';
        $config[] = 'intro';
        $config[] = 'desc';

        $default = array();

        /**
         * Tạo mặc định cho mảng config
         */
        foreach ($config as $item_config) {

            if (!isset($default[$item_config])) {
                $default[$item_config] = '';
            }
        }

        /**
         * Lấy từ CSDL ra đè lại mảng $default
         */
        foreach ($items as $item) {

            $key = $item->name;
            $default[$key] = $item->value;
        }

        $global_settings = $default;

        $menus_items_header = MenuItemModel::getMenuItemsByHeader();
        $menus_items_header_html = MenuItemModel::getMenuUlLi($menus_items_header);
        $menus_items_footer1 = MenuItemModel::getMenuItemsByFooter1();
        $menus_items_footer2 = MenuItemModel::getMenuItemsByFooter2();
        $menus_items_footer3 = MenuItemModel::getMenuItemsByFooter3();

        View::share('fe_global_settings', $global_settings);
        //View::share('fe_total_qtt_cart', $total_qtt_cart);
        View::share('fe_menus_items_header', $menus_items_header);
        View::share('fe_menus_items_header_html', $menus_items_header_html);
        View::share('fe_menus_items_footer1', $menus_items_footer1);
        View::share('fe_menus_items_footer2', $menus_items_footer2);
        View::share('fe_menus_items_footer3', $menus_items_footer3);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
