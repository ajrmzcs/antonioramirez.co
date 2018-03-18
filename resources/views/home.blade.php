@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/code-bg.png')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h2>Antonio Ramirez</h2>
                    <hr class="small">
                    <span class="subheading">Welcome to my personal blog</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <!--Main section-->
        <homeposts></homeposts>
        <!--Sidebar-->
        <sidebar></sidebar>
    </div>
</div>

<hr>
@endsection
