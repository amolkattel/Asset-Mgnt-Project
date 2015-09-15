@extends('layout')

@section('content')
<div class="clearfix grid-title">
    <h1 class="pull-left">Departments</h1>
    <div class="pull-right">
        <a href="/departments/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Department</a>
    </div>
</div>
    
    @if(count($departments))
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Department Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->department_name }}</td>
                    <td>
                        <a href="/departments/{{ $department->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="/departments/delete/{{ $department->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            There are no departments added. <a href="/departments/create">Add Departments</a>
        </div>
    @endif

@stop