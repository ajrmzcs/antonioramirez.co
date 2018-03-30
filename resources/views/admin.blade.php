@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar col-xs-12">
            @include('shared.sidebar')
        </div>
        {{--Main content--}}
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 col-xs-12 main">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Dashboard</h4>
                </div>
                <div class="panel-body">
                    <p>This is the CMS admin panel. Feel free to adapt it to your needs and use it. Enjoy.</p>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary"><span class="fa fa-pencil"></span> write a post</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
