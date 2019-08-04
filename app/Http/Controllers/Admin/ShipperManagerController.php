<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ShipperManagerController extends Controller
{
    //

    public function index() {
        $items = DB::table('shippers')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['shippers'] = $items;

        return view('admin.content.shop.shipper.index', $data);
    }

    public function create() {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        return view('admin.content.shop.shipper.submit', $data);
    }
}
