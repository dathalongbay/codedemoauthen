<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopOrderModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopOrderController extends Controller
{
    //

    /**
     * Hàm khởi tạo của class được chạy ngay khi khởi tạo đổi tượng
     * Hàm này nó luôn được chạy trước các hàm khác trong class
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $items = DB::table('orders')->paginate(10);

        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();
        $data['orders'] = $items;

        return view('admin.content.shop.order.index', $data);
    }

    public function edit($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = ShopOrderModel::find($id);
        $data['order'] = $item;

        return view('admin.content.shop.order.edit', $data);
    }

    public function delete($id) {
        /**
         * Đây là biến truyền từ controller xuống view
         */
        $data = array();

        $item = ShopOrderModel::find($id);
        $data['order'] = $item;

        return view('admin.content.shop.order.delete', $data);
    }

    public function update(Request $request, $id) {

        $input = $request->all();

        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_note' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);
        
        $item = ShopOrderModel::find($id);

        $item->customer_name = $input['customer_name'];
        $item->customer_phone = $input['customer_phone'];
        $item->customer_email = $input['customer_email'];
        $item->customer_note = $input['customer_note'];
        $item->customer_address = $input['customer_address'];
        $item->customer_city = $input['customer_city'];
        $item->customer_country = $input['customer_country'];
        $item->total_price = $input['total_price'];
        $item->status = $input['status'];

        $item->save();

        return redirect('/admin/shop/order');
    }

    public function destroy($id) {
        $item = ShopOrderModel::find($id);

        $item->delete();

        return redirect('/admin/shop/order');
    }

}
