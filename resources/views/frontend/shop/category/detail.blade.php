@extends('frontend.layouts.fashion')
@section('title')
    Danh mục {{ $category->name }}
@endsection

@section('content')

<div class="sub-banner my-banner2">
</div>
<div class="content">
    <div class="container">
        <div class="col-md-4 w3ls_dresses_grid_left">
            <div class="w3ls_dresses_grid_left_grid">
                <h3>Categories</h3>
                <div class="w3ls_dresses_grid_left_grid_sub">
                    <div class="ecommerce_dres-type">
                        <ul>
                            <li><a href="women.html">Dresses</a></li>
                            <li><a href="women.html">Sarees</a></li>
                            <li><a href="women.html">Shorts & Skirts</a></li>
                            <li><a href="women.html">Jeans</a></li>
                            <li><a href="women.html">Shirts</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-sm-8 women-dresses">

            <?php $i = 0; ?>
                <div class="women-set1">
            @foreach($products as $product)
                    <?php
                            // 0 . 3 . 6. 9. 12
                    if (($i % 3) == 0 ) {
                        ?>
                        <div class="clearfix"></div>
                </div>
                <div class="women-set{{ $i }}">
                        <?php
                    }
                    ?>

                    <?php
                    $images = (isset($product->images) && $product->images) ? json_decode($product->images) : array();
                    ?>

                        <div class="col-md-4 women-grids wp1 animated wow slideInUp" data-wow-delay=".5s">
                            <a href="{{ url('shop/product/'.$product->id)  }}"><div class="product-img">

                                    <?php if (count($images)) : ?>
                                    @foreach($images as $image)
                                        <img src="{{ asset($image) }}" alt="" />
                                        @break
                                    @endforeach
                                    <?php endif; ?>

                                    <div class="p-mask">
                                        <form action="<?php echo url('shop/cart/add') ?>" method="post">
                                            @csrf
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="w3ls1_item" value="{{ $product->id }}" />
                                            <input type="hidden" name="amount" value="{{ $product->priceSale }}" />
                                            <button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
                                        </form>
                                    </div>
                                </div></a>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star yellow-star" aria-hidden="true"></i>
                            <i class="fa fa-star gray-star" aria-hidden="true"></i>
                            <h4>{{ $product->name }}</h4>
                            <h5>VND {{ $product->priceSale }}</h5>
                        </div>

                    <?php $i++; ?>
            @endforeach
                </div>

                <div class="clearfix"></div>
                {{ $products->links() }}


        </div>
    </div>
</div>

@endsection