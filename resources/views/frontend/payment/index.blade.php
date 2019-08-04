@extends('frontend.layouts.fashion')
@section('title')
    Thanh toán
@endsection

@section('content')

    <style type="text/css">
        #custom-cart .banner-bottom, .team, .checkout, .additional_info, .team-bottom, .single, .mail, .special-deals, .about, .faq, .typo, .new-products, .banner-bottom1, .top-brands, .dresses, .w3l_related_products {
            padding: 5em 0;
        }

        #custom-cart .checkout h3 {
            font-size: 1em !important;
            color: #212121;
            text-transform: uppercase;
            margin: 0 0 3em;
        }

        #custom-cart .checkout h3 span {
            color: #ff9b05;
        }

        #custom-cart table {
            border-color: grey;
        }

        #custom-cart table.timetable_sub {
            width: 100%;
            margin: 0 auto;
        }

        #custom-cart .timetable_sub thead {
            background: #F2F2F2;
        }

        #custom-cart .timetable_sub th:nth-child(1) {
            border-left: 1px solid #C5C5C5;
        }

        #custom-cart .timetable_sub th, .timetable_sub td {
            text-align: center;
            padding: 7px;
            font-size: 14px;
            color: #212121;
        }

        #custom-cart .timetable_sub th {
            background: none;
            color: #212121 !important;
            text-transform: capitalize;
            font-size: 13px;
            border-right: 1px solid #C5C5C5;
            border-top: 1px solid #C5C5C5;
        }

        #custom-cart tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }

        #custom-cart .close1, .close2, .close3 {
            cursor: pointer;
            position: static !important;
            -webkit-transition: color 0.2s ease-in-out;
            -moz-transition: color 0.2s ease-in-out;
            -o-transition: color 0.2s ease-in-out;
            transition: color 0.2s ease-in-out;
        }

        #custom-cart .timetable_sub td {
            border: 1px solid #CDCDCD;
        }

        #custom-cart .checkout-left {
            margin: 2em 0 0;
        }

        #custom-cart .checkout-left-basket {
            float: left;
            width: 25%;
        }

        #custom-cart .checkout-left-basket h4 {
            padding: 1em;
            background: #ff9b05;
            font-size: 1.1em;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin: 0 0 1em;
        }

        #custom-cart .checkout-left-basket ul li {
            list-style-type: none;
            margin-bottom: 1em;
            font-size: 14px;
            color: #999;
        }

        #custom-cart .checkout-left-basket ul li span {
            float: right;
        }

        #custom-cart .checkout-left-basket ul li:last-child {
            font-size: 1em;
            color: #212121;
            font-weight: 600;
            padding: 1em 0;
            border-top: 1px solid #DDD;
            border-bottom: 1px solid #DDD;
            margin: 2em 0 0;
        }

        #custom-cart .checkout-right-basket {
            float: right;
            margin: 8em 0 0 0em;
        }

        #custom-cart .checkout-right-basket a {
            padding: 10px 30px;
            color: #fff;
            font-size: 1em;
            background: #212121;
            text-decoration: none;
        }

        #custom-cart
    </style>

    <div id="custom-cart">
        <div class="checkout">
            <div class="container">
                <h3>Your shopping cart contains: <span>{{ $total_qtt_cart }} Products</span></h3>
                <!---728x90--->

                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Giá SP</th>
                            <th>Giá SL</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($cart_products as $product)
                            <tr class="rem{{ $i }}">
                            <td class="invert">{{ $i }}</td>
                                <?php
                                $product_id = $product->id;
                                $images = (isset($products[$product_id]->images) && $products[$product_id]->images) ? json_decode($products[$product_id]->images) : array();
                                ?>
                                <td class="invert-image"><a href="{{ url('shop/product/'.$product_id) }}">
                                        @foreach($images as $image)
                                            <img src="{{ asset($image) }}" style="max-width: 150px" class="img-responsive">
                                            @break;
                                        @endforeach
                                    </a></td>
                            <td class="invert">
                                {{ $product->quantity }}
                            </td>
                            <td class="invert">{{ $product->name }}</td>
                            <td class="invert">VND {{ number_format($product->price) }}</td>
                            <td class="invert">VND {{ number_format($product->price*$product->quantity) }}</td>

                        </tr>
                        @endforeach
                        <!--quantity-->
                        </tbody></table>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        #w3payment .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        #w3payment .col-25 {
            margin: 30px auto;
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        #w3payment .col-50 {
            margin: 30px auto;
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        #w3payment .col-75 {
            margin: 30px auto;
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        #w3payment .col-25,
        #w3payment .col-50,
        #w3payment .col-75 {
            padding: 0 16px;
        }

        #w3payment .container {
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        #w3payment input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #w3payment label {
            margin-bottom: 10px;
            display: block;
        }

        #w3payment .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        #w3payment .btn {
            background-color: #00D07E;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        #w3payment .btn:hover {
            background-color: #00D07E;
        }

        #w3payment span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            #w3payment .row {
                flex-direction: column;
            }
            #w3payment .col-25 {
                margin-bottom: 20px;
                display: none;
            }


        }
    </style>

    <h1>VND <?php echo number_format($total_payment) ?></h1>

    <div id="w3payment">
        <div class="row">

            <div class="col-75">
                <div class="container">
                    <form name="order_form" action="{{ url('shop/payment') }}" method="post">

                        @csrf

                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="fa fa-user"></i> Tên</label>
                                <input type="text" id="fname" name="customer_name" placeholder="John M. Doe">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="customer_email" placeholder="john@example.com">


                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">Quốc gia</label>
                                        <input type="text" id="customer_country" name="customer_country" placeholder="VN">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">SDT</label>
                                        <input type="text" id="customer_phone" name="customer_phone" placeholder="0981234567">
                                    </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>

                                <label for="adr"><i class="fa fa-address-card-o"></i> ĐC</label>
                                <input type="text" id="adr" name="customer_address" placeholder="542 W. 15th Street">
                                <label for="city"><i class="fa fa-institution"></i> TP</label>
                                <input type="text" id="city" name="customer_city" placeholder="New York">

                            </div>

                        </div>
                        <div>
                            <label>Ghi chú</label>
                            <textarea name="customer_note" rows="10" style="width: 100%"></textarea>
                        </div>

                        <input type="submit" value="Continue to checkout" class="btn">
                    </form>
                </div>
            </div>


        </div>
    </div>

@endsection