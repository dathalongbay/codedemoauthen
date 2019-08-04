@extends('admin.layouts.glance')
@section('title')
    Quản trị sản phẩm
@endsection
@section('content')
    <h1> Quản trị sản phẩm</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/product/create') }}" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th style="width: 150px">Images</th>
                    <th>Giá niêm yết</th>
                    <th>Giá bán</th>
                    <th>Tồn kho</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>
                            <?php
                            $images = isset($product->images) ? json_decode($product->images) : array();
                            ?>
                            @if(!empty($images))
                                @foreach($images as $image)
                                    <img src="{{ asset($image) }}" style="margin-top:15px;max-height:100px;">
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $product->priceCore }}</td>
                        <td>{{ $product->priceSale }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ url('admin/shop/product/'.$product->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/shop/product/'.$product->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
