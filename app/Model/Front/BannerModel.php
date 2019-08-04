<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BannerModel extends Model
{
    //
    public $table = 'banners';

    public static function getBannerByLocation($location_id) {

        $banner = DB::table('banners')->where('location_id', $location_id)->first();

        return $banner;

    }
}
