<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SellerManagerController extends Controller
{
    //


    public function index() {
        $items = DB::table('sellers')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['sellers'] = $items;

        return view('admin.content.shop.seller.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        return view('admin.content.shop.seller.submit', $data);
    }
}
