@extends('layout')

@section('content')
<section class="content-header">
  <h1>Departments</h1>
  {!! Breadcrumbs::render('departments.index') !!}
</section>
<section class="content">
    @if(count($departments))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Departments</h3>
          <div class="box-tools">
            <a class="btn btn-primary btn-sm" href="/departments/create"><i class="fa fa-plus"></i> Add Department</a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
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
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="/departments/{{ $department->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/departments/delete/{{ $department->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {!! $departments->render() !!}
        </div>
    </div>
    @else
    <div class="alert alert-info">
        There are no departments added. <a href="/departments/create">Add Departments</a>
    </div>
    @endif
</section>
@stop