<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopProductController extends Controller
{
    //

    public function detail($id) {

        $item = ShopProductModel::find($id);

        $data = array();
        $data['product'] = $item;

        return view('frontend.shop.product.detail', $data);
    }
}
