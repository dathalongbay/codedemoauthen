@extends('frontend.layouts.fashion')
@section('title')
    Danh mục nội dung {{ $category->name }}
@endsection

@section('content')

    <style type="text/css">
        #webmag-custom .post.post-thumb {
            position: static;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend_assets/webmag/css/style.css') }}" type="text/css" media="all" />

    <div id="webmag-custom" style="clear: both">
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            @foreach($posts as $post)

                                    <!-- post -->
                                    <div class="col-md-12">
                                        <div class="post post-row">
                                            <a class="post-img" href="{{ url('content/post/'.$post->id)  }}"><img src="{{ asset($post->images) }}" alt=""></a>
                                            <div class="post-body">
                                                <div class="post-meta">
                                                    <span class="post-date">{{ $post->created_at }}</span>
                                                </div>
                                                <h3 class="post-title"><a href="{{ url('content/post/'.$post->id)  }}">{{ $post->name }}</a></h3>
                                                <p><?php echo $post->intro ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /post -->
                            @endforeach


                            <div class="col-md-12">
                                <div class="section-row">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </div>

@endsection   