<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    //
    public $table = 'menus';

    public static function getMenuLocations() {

        $locations = array();
        $locations[1] = 'Header location';
        $locations[2] = 'Footer location 1';
        $locations[3] = 'Footer location 2';
        $locations[4] = 'Footer location 3';

        return $locations;
    }





}
