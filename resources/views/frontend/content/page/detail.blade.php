@extends('frontend.layouts.fashion')
@section('title')
    Trang {{ $page->name }}
@endsection

@section('content')

    <div class="payment">
        <div class="container">
            <h3>{{ $page->name }}</h3>
            <?php echo $page->desc ?>
        </div>
    </div>

@endsection