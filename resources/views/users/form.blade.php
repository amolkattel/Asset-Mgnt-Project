@extends('layout')
@section('content')    
@inject('departments', 'App\Department')
@inject('roles', 'App\Role')
<?php $usercrumb = isset($user) ? 'users.edit' : 'users.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($usercrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($user))
            {!! Form::model($user, array('action' => ['UsersController@update', $user->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'users', 'enctype' => 'multipart/form-data')) !!}
        @endif
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!} <span class="text-danger">*</span>
                {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!} <span class="text-danger">*</span>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password:') !!} <span class="text-danger">*</span>
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('department_id', 'Department:') !!} <span class="text-danger">*</span>
                {!! Form::select('department_id', array('' => 'Select Department') + (array)$departments->lists('name', 'id')->all(), null, ['class' => 'form-control chosen-input']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_list', 'Roles:') !!}
                {!! Form::select('role_list[]', $roles->lists('label', 'id'), null, ['class' => 'form-control chosen-input', 'multiple' => 'multiple']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status:') !!} <span class="text-danger">*</span>
                {!! Form::select('status', array('1' => 'Active', '0' => 'Inactive'), null, ['class' => 'form-control chosen-input']) !!}
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/users" class="btn btn-default">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@stop