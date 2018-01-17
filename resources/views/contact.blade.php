@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Hey, thank you for dropping me a line!!</h1>
            <br>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                <form action="{{ route('send') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Insert your name"
                               value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Insert your email"
                               value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" rows="5" id="message" name="message" placeholder="Insert your message">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>&nbsp;&nbsp;
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
                <div>
                    <br>
                    <p><span class="fa fa-angle-double-up" style="color: blue"></span><i> If you send a question, I promise to do my best to answer as soon as possible <span class="fa fa-angle-double-up" style="color: blue"></span></i></p>
                </div>
            </div>
        </div>
    </div>
@endsection