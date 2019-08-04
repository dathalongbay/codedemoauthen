@extends('admin.layouts.glance')
@section('title')
    Quản trị đơn vị vận chuyển
@endsection
@section('content')
    <h1> Quản trị đơn vị vận chuyển</h1>

    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/shipper/create') }}" class="btn btn-success">Thêm đơn vị vận chuyển</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($shippers as $shipper)
                    <tr>
                        <th scope="row">{{ $shipper->id }}</th>
                        <td>{{ $shipper->name }}</td>
                        <td>{{ $shipper->email }}</td>
                        <td>
                            <a href="{{ url('admin/shop/shipper/'.$shipper->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/shop/shipper/'.$shipper->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $shippers->links() }}
        </div>
    </div>
@endsection
