@extends('admin.layouts.glance')
@section('title')
    Quản trị menu
@endsection
@section('content')
    <h1> Quản trị menu</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/menu/create') }}" class="btn btn-success">Thêm menu</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Vị trí</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($menus as $menu)
                    <tr>
                        <th scope="row">{{ $menu->id }}</th>
                        <td>{{ $menu->name }}</td>

                        <td>
                            @if(isset($locations[$menu->location]))
                            {{ $locations[$menu->location] }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/menu/'.$menu->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/menu/'.$menu->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $menus->links() }}
        </div>
    </div>
@endsection
