@extends('layout')

@section('content')
<section class="content-header">
  <h1>Assets</h1>
  {!! Breadcrumbs::render('assets.index') !!}
</section>
<section class="content">
    
    @include('assets.partials.tabs', ['active' => 'grid'])

    
    <div class="box box-info">
        <div class="box-header with-border">
          @include('assets.partials.filter')
        </div>
        <div class="box-body">
            @if(count($assets))
            <div class="row">
                @foreach($assets as $asset)
                <div class="col-sm-4">
                    <div class="box">
                        <div class="box-header with-border">{{ $asset->name }}</div>
                        <div class="box-body no-border asset-grid text-center">
                            @if(isset($asset->image))
                                <img src="{{ $asset->image }}" alt="" height="240" class="img-responsive" />
                            @else
                                <img src="/images/placeholder.jpg" alt="" class="img-responsive" />
                            @endif
                        </div>
                        <div class="box-footer">
                            <a href="/assets/{{ $asset->id }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> View</a>
                            <a href="/assets/{{ $asset->id }}/edit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="/assets/delete/{{ $asset->id }}" class="btn btn-danger btn-xs confirm"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
                <div class="alert alert-info">
                    There are no assets added. <a href="/assets/create">Add Asset</a>
                </div>
            @endif

        </div>
        <div class="box-footer clearfix">
            {!! $assets->render() !!}
        </div>
    </div>
</section>
<style type="text/css">
    .asset-grid{
        height:250px;
        overflow:hidden;
        text-align: center;
    }
    .asset-grid img{
        display: inline;
    }
</style>
@stop