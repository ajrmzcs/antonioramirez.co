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
                    <h4 class="panel-title">Post Management</h4>
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
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> New Post</a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-responsive table-striped">
                                <tr>
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Excerpt</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Updated</th>
                                    <th colspan="2" class="text-center">Actions</th>
                                </tr>
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $category->name }}</td>
                                        <td class="text-center">
                                            <a href="categories/{{ $category->id }}/edit" class="btn btn-sm btn-primary pull-right" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="categories/{{ $category->id }}" method="POST">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-sm btn-danger pull-left" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="text-center">
                                <a class="btn btn-primary @if($categories->previousPageUrl() === null) disabled @endif" href="{{ $categories->previousPageUrl() }}">Prev</a>
                                <a class="btn btn-primary @if($categories->nextPageUrl() === null) disabled @endif" href="{{ $categories->nextPageUrl() }}">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
