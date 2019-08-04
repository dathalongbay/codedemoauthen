<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    //
    public $table = 'banners';


    public static function getBannerLocations() {

        $locations = array();
        $locations[1] = 'Main banner';
        $locations[2] = 'Sale 1';
        $locations[3] = 'Sale 2';
        $locations[4] = 'Sale 3';
        $locations[5] = 'Sale 4';
        $locations[6] = 'Sale 5';

        return $locations;
    }
}
