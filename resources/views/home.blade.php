@extends('frontend.layouts.fashion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="min-height: 700px">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Bạn đã đăng nhập thành công !</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
