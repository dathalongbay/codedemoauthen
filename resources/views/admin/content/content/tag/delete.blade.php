@extends('admin.layouts.glance')
@section('title')
    Danh mục nội dung
@endsection
@section('content')
    <h1> Xóa tag {{ $tag->id . ' : ' .$tag->name }}</h1>

    <div class="row">
        <div class="form-three widget-shadow">
            <form name="tag" action="{{ url('admin/content/tag/'.$tag->id.'/delete') }}" method="post" class="form-horizontal">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </div>
            </form>
        </div>
    </div>

@endsection
