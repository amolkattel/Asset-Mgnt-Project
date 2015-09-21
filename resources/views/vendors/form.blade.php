@extends('layout')
@section('content')
@inject('permissions', 'App\Permission')
<?php $vendorcrumb = isset($vendor) ? 'vendors.edit' : 'vendors.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($vendorcrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($vendor))
            {!! Form::model($vendor, array('action' => ['VendorsController@update', $vendor->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'vendors', 'enctype' => 'multipart/form-data')) !!}
        @endif
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/vendors" class="btn btn-default">Cancel</a>
            </div>
        </div>
    {!! Form::close() !!}
    </div>
</section>
@stop