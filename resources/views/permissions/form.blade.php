@extends('layout')
@section('content')

<?php $permissioncrumb = isset($permission) ? 'permissions.edit' : 'permissions.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($permissioncrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($permission))
            {!! Form::model($permission, array('action' => ['PermissionsController@update', $permission->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'permissions', 'enctype' => 'multipart/form-data')) !!}
        @endif
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('label', 'Label:') !!} <span class="text-danger">*</span>
                    {!! Form::text('label', old('label'), ['class' => 'form-control']) !!}
                </div>

                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/permissions" class="btn btn-default">Cancel</a>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</section>
@stop