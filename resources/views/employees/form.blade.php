@extends('layout')

@section('content')
    
@inject('countries', 'App\Http\Utilities\country')
@inject('timezone', 'App\Http\Utilities\timezone')
@inject('usstate', 'App\Http\Utilities\usstate')
@inject('roles', 'App\Role')

<?php $employeecrumb = isset($employee) ? 'employees.edit' : 'employees.create'; ?>

<section class="content-header">
  <h1>{{ $formTitle }}</h1>
  {!! Breadcrumbs::render($employeecrumb) !!}
</section>
<section class="content">
    <div class="box box-primary">
        @include('errors/validation')

        @if(isset($employee))
            {!! Form::model($employee, array('action' => ['EmployeesController@update', $employee->id])) !!} 
            {!! Form::hidden('_method', 'PATCH') !!}
        @else
            {!! Form::open(array('url' => 'employees', 'enctype' => 'multipart/form-data')) !!}
        @endif
        <div class="box-body">
            <fieldset>
                <legend>General Informations</legend>
        
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::label('name', 'Name:') !!} <span class="text-danger">*</span>
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => 'First name']) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last name']) !!}
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!} <span class="text-danger">*</span>
                            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('employee_number', 'Employee No.:') !!} <span class="text-danger">*</span>
                            {!! Form::text('employee_number', old('employee_number'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone no.:') !!}
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('mobile', 'Mobile no.:') !!} <span class="text-danger">*</span>
                            {!! Form::text('mobile', old('mobile'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('marital_status', 'Marital Status:') !!} <span class="text-danger">*</span>
                            {!! Form::select('marital_status', array('' => 'Select', 'married' => 'Married', 'single' => 'Single'), null, ['class' => 'form-control chosen-input']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('dob', 'Date of birth:') !!} <span class="text-danger">*</span>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              {!! Form::text('dob', old('dob'), ['class' => 'form-control datemask', 'data-mask']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('ssn', 'SSN:') !!}
                            {!! Form::text('ssn', old('ssn'), ['class' => 'form-control ssnmask', 'data-mask']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('drivers_license', 'Drivers license:') !!}
                            {!! Form::text('drivers_license', old('drivers_license'), ['class' => 'form-control datepicker', 'maxlength' => '12']) !!}
                        </div>
                    </div>

                </div>
            </fieldset>
            <fieldset>
                <legend>Additional details</legend>
                <div class="row">
                    

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('street_1', 'Street 1:') !!} <span class="text-danger">*</span>
                            {!! Form::text('street_1', old('street_1'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('street_2', 'Street 2:') !!}
                            {!! Form::text('street_2', old('street_2'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('city', 'City:') !!} <span class="text-danger">*</span>
                            {!! Form::text('city', old('city'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('state', 'State:') !!}
                            {!! Form::select('state', array('' => 'Non-US') + (array)$usstate::all(), null, ['class' => 'form-control chosen-input']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('region', 'Region:') !!} <span class="text-danger">*</span>
                            {!! Form::text('region', old('region'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('country', 'Country:') !!} <span class="text-danger">*</span>
                            {!! Form::select('country', array('' => 'Select Country') + (array)$countries::all(), null, ['class' => 'form-control chosen-input']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('timezone', 'Timezone:') !!} <span class="text-danger">*</span>
                            {!! Form::select('timezone', array('' => 'Select timezone') + $timezone::getList(), null, ['class' => 'form-control chosen-input']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('zip_code', 'Zip code:') !!} <span class="text-danger">*</span>
                            {!! Form::text('zip_code', old('zip_code'), ['class' => 'form-control']) !!}
                        </div>
                    </div>

                </div>
            </fieldset>
    
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/employees" class="btn btn-default">Cancel</a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@stop