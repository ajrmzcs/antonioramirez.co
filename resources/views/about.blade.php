@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">About me</h1>
            <div class="col-md-2 col-md-offset-5 col-xs-12">
                <br>
                <img src="img/ar.png" alt="Antonio Ramirez" class="about-img img-responsive img-circle">
            </div>
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
                    The purpose of this blog is to share my side projects, helping those who are starting as web developers with examples, boilerplates and simple tools. Feel free to use my code and examples in your projects.
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
                    You can find me as <a href="http://twitter.com/ajrmzcs">@ajrmzcs</a> on twitter
                    or through my <a href="{{ route('contact') }}">contact page</a>.
                    <br>
                </p>
            </div>
        </div>
    </div>
@endsection