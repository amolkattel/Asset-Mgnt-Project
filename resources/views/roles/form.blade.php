@extends('layout')
@section('content')
@inject('permissions', 'App\Permission')
<?php $rolecrumb = isset($role) ? 'roles.edit' : 'roles.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($rolecrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($role))
            {!! Form::model($role, array('action' => ['RolesController@update', $role->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'roles', 'enctype' => 'multipart/form-data')) !!}
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

            <div class="form-group">
                {!! Form::label('permission_list', 'Permissions:') !!}
                {!! Form::select('permission_list[]', $permissions->lists('label', 'id'), null, ['class' => 'form-control chosen-input', 'multiple' => 'multiple']) !!}
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/roles" class="btn btn-default">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</section>
@stop