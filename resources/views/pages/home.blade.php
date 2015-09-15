@extends('layout')

@section('content')

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Asset Management</h1>
            <p> Asset Managemenet System  </p>
            <p>
                <a href="assets" class="btn btn-primary btn-lg">Enter</a>
            </p>

            @can('edit_department')
                <a href="#" class="btn">Edit departments</a>
            @endcan
        </div>
    </div>


@stop