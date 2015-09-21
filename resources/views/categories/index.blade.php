@extends('layout')

@section('content')
<section class="content-header">
  <h1>Categories</h1>
  {!! Breadcrumbs::render('categories.index') !!}
</section>
<section class="content">
    @if(count($categories))
    <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Manage Categories</h3>
          <div class="box-tools">
            <a href="/categories/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Category</a>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th style="min-width:150px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="/categories/delete/{{ $category->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {!! $categories->render() !!}
        </div>
    </div>
    @else
        <div class="alert alert-info">
            There are no categories added. <a href="/categories/create">Add Category</a>
        </div>
    @endif
</section>
@stop