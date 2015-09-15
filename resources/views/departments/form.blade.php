@extends('layout')

@section('content')
    
    <div class="clearfix grid-title">
        <h1>{{ $formTitle }}</h1>
    </div>
    
    @include('errors/validation')

    @if(isset($department))
        {!! Form::model($department, array('action' => ['DepartmentsController@update', $department->id])) !!} 
        {!! Form::hidden('_method', 'PATCH') !!}
    @else
        {!! Form::open(array('url' => 'departments', 'enctype' => 'multipart/form-data')) !!}
    @endif

            <div class="form-group">
                {!! Form::label('department_name', 'Department Name:') !!}
                {!! Form::text('department_name', old('department_name'), ['class' => 'form-control']) !!}
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/departments" class="btn btn-default">Cancel</a>
            </div>

    {!! Form::close() !!}

@stop