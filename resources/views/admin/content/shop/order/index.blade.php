@extends('admin.layouts.glance')
@section('title')
    Quản trị đơn hàng
@endsection
@section('content')
    <h1> Quản trị đơn hàng</h1>

    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>SDT</th>
                    <th>Email</th>
                    <th>Tổng tiền</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_phone }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>
                            <a href="{{ url('admin/shop/order/'.$order->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/shop/order/'.$order->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>
@endsection
