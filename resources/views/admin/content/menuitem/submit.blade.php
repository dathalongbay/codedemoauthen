@extends('admin.layouts.glance')
@section('title')
    Danh mục nội dung
@endsection
@section('content')
    <h1> Thêm mới menu item </h1>

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

            <form name="page" action="{{ url('admin/menuitems') }}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control1" id="focusedinput" placeholder="Default Input">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Sắp xếp</label>
                    <div class="col-sm-8">
                        <input type="text" name="sort" value="{{ old('sort') }}" class="form-control1" id="focusedinput" placeholder="Nhập thứ tự sắp xếp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Kiểu menu item</label>
                    <div class="col-sm-8">
                        <select id="menu-type" name="type">
                            @foreach($types as $type_id => $type)
                                <option value="{{ $type_id }}" data-type="type-{{ $type_id }}">- {{ $type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-1" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop category</label>
                    <div class="col-sm-8">
                        <select name="params_1">
                            @foreach($shop_categories as $shop_category)
                                <option value="{{ $shop_category->id }}">{{ $shop_category->id }} - {{ $shop_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-2" class="form-group  menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop product</label>
                    <div class="col-sm-8">
                        <select name="params_2">
                            @foreach($shop_products as $shop_product)
                                <option value="{{ $shop_product->id }}">{{ $shop_product->id }} - {{ $shop_product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-3" class="form-group  menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content category</label>
                    <div class="col-sm-8">
                        <select name="params_3">
                            @foreach($content_categories as $content_category)
                                <option value="{{ $content_category->id }}">{{ $content_category->id }} - {{ $content_category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-4" class="form-group  menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content post</label>
                    <div class="col-sm-8">
                        <select name="params_4">
                            @foreach($content_posts as $content_post)
                                <option value="{{ $content_post->id }}">{{ $content_post->id }} - {{ $content_post->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-5" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content page</label>
                    <div class="col-sm-8">
                        <select name="params_5">
                            @foreach($content_pages as $content_page)
                                <option value="{{ $content_page->id }}">{{ $content_page->id }} - {{ $content_page->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-6" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content tag</label>
                    <div class="col-sm-8">
                        <select name="params_6">
                            @foreach($content_tags as $content_tag)
                                <option value="{{ $content_tag->id }}">{{ $content_tag->id }} - {{ $content_tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-7" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Custom link</label>
                    <div class="col-sm-8">
                        <input name="params_7" value="" class="form-control1" id="focusedinput" placeholder="EX: www.google.com">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Final Link</label>
                    <div class="col-sm-8">
                        <input type="text" name="link" readonly value="{{ old('link') }}" class="form-control1" id="focusedinput" placeholder="Auto fill link">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-8">
                        <input type="text" name="icon" value="{{ old('icon') }}" class="form-control1" id="focusedinput" placeholder="EX: fa fa-shop">
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Cha</label>
                    <div class="col-sm-8">
                        <select name="parent_id">
                            <option value="0">Mặc định</option>
                            @foreach($menuitems as $menuitem)
                                <option value="{{ $menuitem['id'] }}">{{ str_repeat('-', $menuitem['level'] - 1) . ' ' . $menuitem['name'] }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Thuộc menu</label>
                    <div class="col-sm-8">
                        <select name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{ old('desc') }}</textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $('.menu-type').hide();

            var current_type = $('#menu-type').find('option:selected').data('type');
            $('.menu-type').hide();
            if ($('#'+current_type).length) {
                $('#'+current_type).show();
            }

            $('#menu-type').on('change', function () {
                var value = $(this).val();
                var type = $(this).find('option:selected').data('type');

                $('.menu-type').hide();
                if ($('#'+type).length) {
                    $('#'+type).show();
                }
            });
        });
    </script>
@endsection
