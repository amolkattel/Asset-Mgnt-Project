@extends('layout')

@section('content')
<section class="content-header">
  <h1>Vendors</h1>
  {!! Breadcrumbs::render('vendors.index') !!}
</section>
<section class="content">
    @if(count($vendors))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Vendors</h3>
          <div class="box-tools">
            <a href="/vendors/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Vendor</a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $department)
                        <tr>
                            <td>{{ $department->id }}</td>
                            <td>{{ $department->name }}</td>
                            <td>
                                <a href="/vendors/{{ $department->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/vendors/delete/{{ $department->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {!! $vendors->render() !!}
        </div>
    </div>
    @else
        <div class="alert alert-info">
            There are no vendors added. <a href="/vendors/create">Add Vendor</a>
        </div>
    @endif
</section>
@stop