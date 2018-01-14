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
                        <h4 class="panel-title">Edit user</h4>
                    </div>
                    <div class="panel-body">
                        {{--Alerts--}}
                        <div class="col-md-8 col-md-offset-2">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
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
                        <div class="col-md-8 col-md-offset-2">
                            <form method="POST" action="/admin/users/{{ $user->id }}">
                                {{ method_field('PATCH') }}
                                @include('adminUsers.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
