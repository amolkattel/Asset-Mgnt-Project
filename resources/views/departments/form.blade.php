@extends('layout')
@section('content')
<?php $departmentcrumb = isset($department) ? 'departments.edit' : 'departments.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($departmentcrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($department))
            {!! Form::model($department, array('action' => ['DepartmentsController@update', $department->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'departments', 'enctype' => 'multipart/form-data')) !!}
        @endif
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Department Name:') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/departments" class="btn btn-default">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</section>
@stop