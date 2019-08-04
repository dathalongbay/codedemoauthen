@extends('admin.layouts.glance')
@section('title')
    Cấu hình trang web
@endsection
@section('content')
    <h1> Cấu hình trang web</h1>

    <div class="row">
        <div class="form-three widget-shadow">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form name="category" action="{{ url('/admin/config') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên trang web </label>
                    <div class="col-sm-8">
                        <input type="text" name="web_name" class="form-control1" id="focusedinput" value="{{ $configs['web_name'] }}" placeholder="Default Input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Header logo</label>
                    <div class="col-sm-8">
                        <span class="input-group-btn">
                         <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                        <input id="thumbnail1" type="text" name="header_logo" value="{{ $configs['header_logo'] }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                        <?php if (isset($configs['header_logo']) && $configs['header_logo']) : ?>
                        <img id="holder1" src="{{ asset($configs['header_logo']) }}" style="margin-top:15px;max-height:100px;">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Footer logo</label>
                    <div class="col-sm-8">
                        <span class="input-group-btn">
                         <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="lfm-btn btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                        <input id="thumbnail2" type="text" name="footer_logo" value="{{ $configs['footer_logo'] }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                        <?php if (isset($configs['footer_logo']) && $configs['footer_logo']) : ?>
                        <img id="holder2" src="{{ asset($configs['footer_logo']) }}" style="margin-top:15px;max-height:100px;">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả ngắn</label>
                    <div class="col-sm-8">
                        <textarea name="intro" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ $configs['intro'] }}</textarea></div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8">
                        <textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ $configs['desc'] }}</textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.lfm-btn').filemanager('image', {'prefix':'http://localhost/lar.tuto/authen/public/laravel-filemanager'});

        });

    </script>
@endsection
