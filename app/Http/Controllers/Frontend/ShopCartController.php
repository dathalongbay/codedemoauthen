<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCartController extends Controller
{
    //


    /**
     * View giỏ hàng
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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



       /* echo '<pre>';
        print_r(session('cart_item'));
        echo '</pre>';

        var_dump(session('cart_item'));*/

        return view('frontend.cart.index', $data);
    }


    public function add(Request $request) {
        $input = $request->all();

        $product_id = (int) $input['w3ls1_item'];
        $quantity = (int) $input['add'];

        $product  = ShopProductModel::find($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {

            // array format
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->priceSale,
                'quantity' => $quantity,
                'attributes' => array()
            ));

            $response['status'] = 1;
            session()->save();

        }

        echo \GuzzleHttp\json_encode($response);
        exit;

    }

    /**
     * add to cart
     */
    public function add2(Request $request) {
        //session_start();
        $input = $request->all();

        $product_id = (int) $input['w3ls1_item'];
        $quantity = (int) $input['add'];

        $product  = ShopProductModel::find($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {


            $session_cart = session('cart_item');


            if ( isset($session_cart) && !empty($session_cart) ) {
                /**
                 * !empty($session_cart == true
                 * tức là lúc này giỏ hàng có dữ liệu
                 */
                if (isset($session_cart[$product_id])) {
                    /**
                     * Sảm phẩm đã tồn tại trong giỏ hàng
                     */
                    $exist_cart_item = $session_cart[$product_id];
                    $exist_quantity = $exist_cart_item['quantity'];
                    $cart_item = array();
                    $cart_item['id'] = $product['id'];
                    $cart_item['product_name'] = $product->name;
                    $cart_item['price'] = $product->priceSale;
                    $cart_item['quantity'] =  $exist_quantity + $quantity;
                    $session_cart[$product_id] = $cart_item;
                } else {
                    /**
                     * Sản phẩm chưa tồn tại trong giỏ hàng
                     */
                    $cart_item = array();
                    $cart_item['id'] = $product['id'];
                    $cart_item['product_name'] = $product->name;
                    $cart_item['price'] = $product->priceSale;
                    $cart_item['quantity'] = $quantity;
                    $session_cart[$product_id] = $cart_item;
                }
            } else {
                /**
                 * !empty($session_cart == false
                 * tức là lúc này giỏ hàng không dữ liệu
                 */
                $session_cart = array();
                $cart_item = array();
                $cart_item['id'] = $product['id'];
                $cart_item['product_name'] = $product->name;
                $cart_item['price'] = $product->priceSale;
                $cart_item['quantity'] = $quantity;
                $session_cart[$product_id] = $cart_item;
            }

            session()->put('cart_item', $session_cart);
            $response['status'] = 1;
            session()->save();




            //exit;
               // return redirect('/shop/cart');

        }

        echo \GuzzleHttp\json_encode($response);
        exit;

    }


    /**
     * update to cart
     */
    public function update(Request $request) {
        $input = $request->all();

        $product_id = (int) $input['pid'];
        $qtt = (int) $input['quantity'];

        $product  = ShopProductModel::find($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {

            // array format
            /*\Cart::update($product->id, array(
                'quantity' => $qtt, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
            ));*/

            \Cart::update($product->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qtt
                ),
            ));

            $response['status'] = 1;
            session()->save();

        }

        echo \GuzzleHttp\json_encode($response);
        exit;




    }


    /**
     * remove to cart
     */
    public function remove(Request $request) {
        $input = $request->all();

        $product_id = (int) $input['pid'];

        $product  = ShopProductModel::find($product_id);
        $response['status'] = 0;
        if (isset($product->id)) {

            // array format
            \Cart::remove($product->id);

            $response['status'] = 1;
            session()->save();

        }

        echo \GuzzleHttp\json_encode($response);
        exit;
    }

    /**
     * remove toàn bộ giỏ hàng
     */
    public function clear() {
        \Cart::clear();
    }
}
