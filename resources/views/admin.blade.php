@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar">
            @include('shared.sidebar')
        </div>
        {{--Main content--}}
        <div class="col-md-10 container-padding">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Simple Lite CMS</h4>
                </div>
                <div class="panel-body">
                    <p>This is the admin panel of SL-CMS, a simple and easy to use content management system made in Laravel PHP for those
                    who want to share their thoughts. Feel free to adapt it to your needs and use it. Enjoy.</p>
                    <button class="btn btn-primary"><span class="fa fa-pencil"></span> write a post</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
