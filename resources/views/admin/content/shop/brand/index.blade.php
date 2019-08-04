@extends('admin.layouts.glance')
@section('title')
    Quản trị nhãn hiệu
@endsection
@section('content')
    <h1> Quản trị nhãn hiệu</h1>

    <div style="margin: 20px 0">
        <a href="{{ url('admin/shop/brand/create') }}" class="btn btn-success">Thêm nhãn hiệu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{ $brand->id }}</th>
                        <td>{{ $brand->name }}</td>
                        <td>{{ $brand->image }}</td>
                        <td>
                            <a href="{{ url('admin/shop/brand/'.$brand->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/shop/brand/'.$brand->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $brands->links() }}
        </div>
    </div>
@endsection
