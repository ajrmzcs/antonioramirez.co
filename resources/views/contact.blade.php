@extends('layouts.app')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('img/code-bg.png')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h2>Contact Me</h2>
                    <hr class="small">
                </div>
            </div>
        </div>
    </div>
</header>
<div class="row">
    <h2 class="text-center">Hey, thanks for dropping a line!!</h2>
    <br>
</div>
<div class="row">
    {{--Alerts--}}
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        {{--Success--}}
        @if (session('status'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('status') }}
            </div>
        @endif
        {{--Error--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="col-md-6 col-md-offset-3 col-xs-12">
        <form method="POST" action="{{ route('send') }}">
            {{ csrf_field() }}
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name"
                           value="{{ old('name') }}">
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Insert your email"
                           value="{{ old('email') }}">
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label for="message">Message</label>
                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Insert your message">{{ old('message') }}</textarea>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Submit</button>&nbsp;&nbsp;
            <button type="reset" class="btn btn-default">Reset</button>
        </form>
        <div>
            <br>
            <p><span class="fa fa-angle-double-up" style="color: blue"></span><i> If you send a question, I promise to do my best to answer as soon as possible <span class="fa fa-angle-double-up" style="color: blue"></span></i></p>
        </div>
    </div>
</div>
@endsection