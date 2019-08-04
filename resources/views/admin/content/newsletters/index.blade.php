@extends('admin.layouts.glance')
@section('title')
    Quản trị newsletters
@endsection
@section('content')
    <h1> Quản trị newsletters</h1>

    <div style="margin: 20px 0">
        <a href="{{ url('admin/newsletters/create') }}" class="btn btn-success">Thêm newsletters</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($newsletters as $newsletter)
                    <tr>
                        <th scope="row">{{ $newsletter->id }}</th>
                        <td>{{ $newsletter->email }}</td>
                        <td>
                            <a href="{{ url('admin/newsletters/'.$newsletter->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/newsletters/'.$newsletter->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $newsletters->links() }}
        </div>
    </div>
@endsection
