@extends('layout')
@section('content')
@inject('permissions', 'App\Permission')
<?php $categorycrumb = isset($category) ? 'categories.edit' : 'categories.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($categorycrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($category))
            {!! Form::model($category, array('action' => ['RolesController@update', $category->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'categories', 'enctype' => 'multipart/form-data')) !!}
        @endif
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description:') !!} <span class="text-danger">*</span>
                {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
            </div>
            
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/categories" class="btn btn-default">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</section>
@stop