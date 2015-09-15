@extends('layout')

@section('content')
<div class="clearfix grid-title">
    <h1 class="pull-left">Users</h1>
    <div class="pull-right">
        <a href="/users/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add User</a>
    </div>
</div>
    @if(count($users))
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
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
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            There are no users added. <a href="/users/create">Add Departments</a>
        </div>
    @endif

@stop