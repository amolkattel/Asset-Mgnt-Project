@extends('layout')

@section('content')

    
    <form action="/auth/login" method="POST" role="form">
        {!! csrf_field() !!}
        <fieldset>
            <legend>Login</legend>
        
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">Login</button>

                </div>
            </div>
        </fieldset>
    </form>
    

@stop