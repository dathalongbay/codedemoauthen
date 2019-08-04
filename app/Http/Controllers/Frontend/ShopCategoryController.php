<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //

    public function detail($id) {

        $data = array();

        $data['category'] = ShopCategoryModel::find($id);
        $data['products'] = ShopCategoryModel::getProducts($id);

        return view('frontend.shop.category.detail', $data);
    }
}
