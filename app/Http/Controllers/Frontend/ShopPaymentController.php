<?php

namespace App\Http\Controllers\Frontend;
use App\Model\Front\OrderDetailModel;
use App\Model\Front\OrderModel;
use App\Model\Front\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopPaymentController extends Controller
{
    //

    public function index() {
        $data = array();

        $cartCollection = \Cart::getContent();

        $data['cart_products'] = $cartCollection;
        $products = array();

        foreach ($cartCollection as $p) {
            $pid = $p->id;
            $products[$pid] = ShopProductModel::find($pid);

        }
        $data['products'] = $products;
        $data['total_payment'] = \Cart::getTotal();
        $data['total_qtt_cart'] = \Cart::getTotalQuantity();

        return view('frontend.payment.index', $data);
    }

    public function order(Request $request) {
        $input = $request->all();

        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_note' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
        ]);

        $cartCollection = \Cart::getContent();

        $order = new OrderModel();

        $order->customer_name = $input['customer_name'];
        $order->customer_phone = $input['customer_phone'];
        $order->customer_email = $input['customer_email'];
        $order->customer_note = $input['customer_note'];
        $order->customer_address = $input['customer_address'];
        $order->customer_city = $input['customer_city'];
        $order->customer_country = $input['customer_country'];
        $order->total_price = \Cart::getTotal();
        $order->status = 0;

        $order->save();

        foreach ($cartCollection as $product) {
            $order_detail = new OrderDetailModel();

            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product->id;
            $order_detail->quantity = $product->quantity;
            $order_detail->unit_price = $product->price;
            $order_detail->total_price = $product->price * $product->quantity;
            $order_detail->status = 0;

            $order_detail->save();
        }

        \Cart::clear();

        return redirect('shop/payment/after');
    }

    public function afterOrder() {
        return view('frontend.payment.success');
    }
}
