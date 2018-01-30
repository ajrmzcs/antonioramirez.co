@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!--Main section-->
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p>Posted on: {{ $post->updated_at->format('D, d M Y')  }}</p>
            <p>Categories:
                @foreach($post->categories as $category)
                    <a href="{{ url('category/'.$category->id) }}">{{ $category->name }}</a>
                @endforeach
            </p>
            <br>
            <p class="text_justify">{!! $post->body !!}</p>
        </div>
        <!--Sidebar-->
        <sidebar></sidebar>
    </div>
</div>
@endsection
