@extends('layout')

@section('content')
<section class="content-header">
  <h1>Users</h1>
  {!! Breadcrumbs::render('users.index') !!}
</section>
<section class="content">
    @if(count($users))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Users</h3>
          <div class="box-tools">
            <a class="btn btn-primary btn-sm" href="/users/create"><i class="fa fa-plus"></i> Add User</a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_names }}</td>
                            <td>
                                @if($user->status)
                                    <span class="label label-primary">Active</span>
                                @else
                                    <span class="label label-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="alert alert-info">
            There are no users added. <a href="/users/create">Add User</a>
        </div>
    @endif
</section>
@stop