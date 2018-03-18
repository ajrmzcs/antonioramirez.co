@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image:{{ url('img/code-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h2>Categories</h2>
                    <hr class="small">
                </div>
            </div>
        </div>
    </div>
</header>
<div class="row">
    <!--Main section-->
    <div class="container">
        <div class="col-sm-8  col-xs-12">
            <p>
                <small>Categories:</small>
                @foreach($post->categories as $category)
                    <a class="link-in-content" href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a>
                @endforeach
            </p>
            <p class="text_justify">{!! $post->body !!}</p>
        </div>
        <!--Sidebar-->
        <sidebar></sidebar>
    </div>
</div>
@endsection
