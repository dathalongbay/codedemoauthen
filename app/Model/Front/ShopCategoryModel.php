<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopCategoryModel extends Model
{
    //
    public $table = 'shop_category';


    public static function getProducts($cat_id) {

        //$products = DB::table('shop_products')->where('cat_id', $cat_id)->get();

        $products = DB::table('shop_products')->where('cat_id', $cat_id)->paginate(9);


        return $products;
    }

}
