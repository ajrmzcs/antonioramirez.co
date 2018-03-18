@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image:url('../img/code-bg.png')">
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
<div class="container">
    <div class="row">
        <!--Main section-->
        <postscategory></postscategory>
        <!--Sidebar-->
        <sidebar></sidebar>
        <span style="display:none" id="cat-id">{{ $catId }}</span>
    </div>
</div>
@endsection
