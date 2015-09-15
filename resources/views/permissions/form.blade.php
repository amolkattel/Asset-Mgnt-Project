@extends('layout')

@section('content')
    
    <div class="clearfix grid-title">
        <h1>{{ $formTitle }}</h1>
    </div>
    
    @include('errors/validation')

    @if(isset($permission))
        {!! Form::model($permission, array('action' => ['PermissionsController@update', $permission->id])) !!} 
        {!! Form::hidden('_method', 'PATCH') !!}
    @else
        {!! Form::open(array('url' => 'permissions', 'enctype' => 'multipart/form-data')) !!}
    @endif

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('label', 'Label:') !!}
                {!! Form::text('label', old('label'), ['class' => 'form-control']) !!}
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/permissions" class="btn btn-default">Cancel</a>
            </div>

    {!! Form::close() !!}

@stop