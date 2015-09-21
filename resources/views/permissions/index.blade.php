@extends('layout')

@section('content')
<section class="content-header">
  <h1>Permissions</h1>
  {!! Breadcrumbs::render('permissions.index') !!}
</section>
<section class="content">
    @if(count($permissions))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Permissions</h3>
          <div class="box-tools">
            <a href="/permissions/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Permission</a>
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
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->label }}</td>
                            <td>
                                <a href="/permissions/{{ $permission->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/permissions/delete/{{ $permission->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    @else
        <div class="alert alert-info">
            There are no permissions added. <a href="/permissions/create">Add Permissions</a>
        </div>
    @endif
</section>
@stop