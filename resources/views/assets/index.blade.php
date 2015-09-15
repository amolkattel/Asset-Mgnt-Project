@extends('layout')

@section('content')
<div class="clearfix grid-title">
    <h1 class="pull-left">Assets</h1>
    <div class="pull-right">
        <a href="/assets/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Asset</a>
    </div>
</div>
    @if(count($assets))
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>location</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
                <tr>
                    <td>{{ $asset->id }}</td>
                    <td>{{ $asset->asset_name }}</td>
                    <td>{{ $asset->department->department_name }}</td>
                    <td>{{ $asset->location }}</td>
                    <td>{{ $asset->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="/assets/{{ $asset->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="/assets/delete/{{ $asset->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @else
        <div class="alert alert-info">
            There are no assets added. <a href="/assets/create">Add Asset</a>
        </div>
    @endif

@stop