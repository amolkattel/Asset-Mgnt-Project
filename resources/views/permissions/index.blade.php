@extends('layout')

@section('content')
<div class="clearfix grid-title">
    <h1 class="pull-left">Permissions</h1>
    <div class="pull-right">
        <a href="/permissions/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Permission</a>
    </div>
</div>
    
    @if(count($permissions))
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
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->label }}</td>
                    <td>
                        <a href="/permissions/{{ $permission->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="/permissions/delete/{{ $permission->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            There are no permissions added. <a href="/permissions/create">Add Permissions</a>
        </div>
    @endif

@stop