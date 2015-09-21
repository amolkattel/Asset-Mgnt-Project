@extends('layout')

@section('content')
<section class="content-header">
  <h1>Roles</h1>
  {!! Breadcrumbs::render('roles.index') !!}
</section>
<section class="content">
    @if(count($roles))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Roles</h3>
          <div class="box-tools">
            <a href="/roles/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Role</a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
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
                                <a href="/roles/delete/{{ $department->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="alert alert-info">
            There are no roles added. <a href="/roles/create">Add Roles</a>
        </div>
    @endif
</section>
@stop