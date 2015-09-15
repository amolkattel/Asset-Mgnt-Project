@extends('layout')

@section('content')
<div class="clearfix grid-title">
    <h1 class="pull-left">Roles</h1>
    <div class="pull-right">
        <a href="/roles/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Role</a>
    </div>
</div>
    
    @if(count($roles))
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Label</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->label }}</td>
                    <td>
                        <a href="/roles/{{ $department->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="/roles/delete/{{ $department->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            There are no roles added. <a href="/roles/create">Add Roles</a>
        </div>
    @endif

@stop