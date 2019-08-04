@extends('admin.layouts.glance')
@section('title')
    Quản trị bài viết
@endsection
@section('content')
    <h1> Quản trị Bài viết</h1>
    <div style="margin: 20px 0">
        <a href="{{ url('admin/content/post/create') }}" class="btn btn-success">Thêm bài viết</a>
    </div>
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Tổng số : </h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Tác giả</th>
                    <th>View</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->author_id }}</td>
                        <td>{{ $post->view }}</td>
                        <td>{{ $post->images }}</td>
                        <td>
                            <a href="{{ url('admin/content/post/'.$post->id.'/edit') }}" class="btn btn-warning">Sửa</a>
                            <a href="{{ url('admin/content/post/'.$post->id.'/delete ') }}" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
