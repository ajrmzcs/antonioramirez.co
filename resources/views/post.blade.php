@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image:url('img/code-bg.png')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h2>{{ $post->title }}</h2>
                    <hr class="small">
                    <p>{{ $post->updated_at->format('D, d M Y')  }}</p>
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
            @if(null !== $post->getFirstMediaUrl())
                <img src="{{ $post->getFirstMediaUrl() }}" class="img img-responsive" alt="">
            @endif
            <p class="text_justify">{!! $post->body !!}</p>
        </div>
        <!--Sidebar-->
        <sidebar></sidebar>
    </div>
</div>
@endsection
