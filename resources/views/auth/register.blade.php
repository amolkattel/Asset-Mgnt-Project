@extends('layout')

@include('errors/validation')

@section('content')
    
    <form action="/auth/register" method="POST" role="form">
        {!! csrf_field() !!}
        <fieldset>
            <legend>Register</legend>
        
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input name="name" type="text" class="form-control" id="nameInput" value="{{ old('name') }}" placeholder="Name">
                      </div>
                    <div class="form-group">
                        <label for="emailInput">Email address</label>
                        <input name="email" type="email" class="form-control" id="emailInput" value="{{ old('email') }}" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Password">
                      </div>
                      <button type="submit" class="btn btn-primary">Register</button>

                </div>
            </div>
        </fieldset>
    </form>
    

@stop