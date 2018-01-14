@extends('layouts.app')

@section('content')
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
