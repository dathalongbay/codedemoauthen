@extends('admin.layouts.glance')
@section('title')
    Quản trị admins
@endsection
@section('content')
    <h1> Quản trị admins</h1>

    <div style="margin: 20px 0">
        <a href="{{ url('admin/users/create') }}" class="btn btn-success">Thêm admin</a>

        @if (Route::has('admin.register'))
            <a class="btn btn-success" href="{{ route('admin.register') }}">{{ __('Đăng ký mới admin') }}</a>
        @endif
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

                @foreach($admins as $admin)
                    <tr>
                        <th scope="row">{{ $admin->id }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a href="{{ url('admin/users/'.$admin->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/users/'.$admin->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admins->links() }}
        </div>
    </div>
@endsection
