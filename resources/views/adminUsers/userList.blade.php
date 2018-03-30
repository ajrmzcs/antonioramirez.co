@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('shared.sidebar')
        </div>
        {{--Main content--}}
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">User Management</h4>
                </div>
                <div class="panel-body">
                    {{--Alerts--}}
                    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
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
                    <div class="col-xs-12 admin-button-padding">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New User</a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">Avatar</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Role</th>
                                        <th colspan="2" class="text-center">Actions</th>
                                    </tr>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center"><img src="{{ $user->getFirstMediaUrl('','thumb') }}" alt=""></td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">
                                                @foreach($user->roles as $role)
                                                    @if (!$loop->last)
                                                        {{ $role->slug }} |
                                                    @elseif ($loop->last)
                                                        {{ $role->slug }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a href="users/{{ $user->id }}/edit" class="btn btn-sm btn-primary pull-right" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                            </td>
                                            <td class="text-center">
                                                <form action="users/{{ $user->id }}" method="POST">
                                                    {{csrf_field()}}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-sm btn-danger pull-left" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="text-center">
                                <a class="btn btn-primary @if($users->previousPageUrl() === null) disabled @endif" href="{{ $users->previousPageUrl() }}">Prev</a>
                                <a class="btn btn-primary @if($users->nextPageUrl() === null) disabled @endif" href="{{ $users->nextPageUrl() }}">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
