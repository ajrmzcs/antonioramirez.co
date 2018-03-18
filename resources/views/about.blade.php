@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/code-bg.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h2>About me</h2>
                        <hr class="small">
                    </div>
                </div>
            </div>
        </div>
    </header>
            <h1 class="text-center"></h1>
            <div class="col-md-2 col-md-offset-5 col-xs-12">
                <br>
                <img src="img/ar.png" alt="Antonio Ramirez" class="about-img img-responsive img-circle">
            </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-xs-12">
                <h3>
                    Hi, I'm Antonio Ramirez.
                </h3>
                <p>
                    I'm a full time parent of twins, husband and web developer focused in PHP/Laravel and Javascript. Currently living in Colombia where I work as a backend developer, I usually spend my nights (after everybody at home is sleeping) testing/learning new technologies and making cool fullstack side projects.
                </p>
                <p>
                    The purpose of this blog is to share my side projects, using this place as my personal sandbox. Feel free to leave your comments or use my examples in your projects.
                </p>
                 <p>My interests include:</p>
                <h4>
                    <span class="label label-primary about-label-margin">PHP/Laravel</span> <span class="label label-primary about-label-margin">Javascript</span>
                    <span class="label label-primary about-label-margin">Vue</span> <span class="label label-primary about-label-margin">Angular</span>
                    <span class="label label-primary about-label-margin">Node</span> <span class="label label-primary about-label-margin">Sever admin</span>
                    <span class="label label-primary about-label-margin">Databases</span>
                </h4>
                <p>
                    <br>
                    You can find me as <strong><a href="http://twitter.com/ajrmzcs">@ajrmzcs</a></strong> on twitter
                    or using my <strong><a href="{{ route('contact') }}">contact page</a></strong>.
                    <br>
                </p>
            </div>
        </div>
@endsection