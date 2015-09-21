@inject('departments', 'App\Department')
@inject('categories', 'App\Category')
@inject('vendors', 'App\Vendor')

<div class="box-search">
    <form action="" method="get" class="form-inline" role="form">
                       
        <div class="form-group">
            {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => 'Search by Name, Asset no and Model..']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('department_id', array('' => 'Department') + (array)$departments->lists('name', 'id')->all(), Request::get('department_id'), ['class' => 'form-control chosen-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('category_id', array('' => 'Category') + (array)$categories->lists('name', 'id')->all(), Request::get('category_id'), ['class' => 'form-control chosen-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('vendor_id', array('' => 'Vendor') + (array)$vendors->lists('name', 'id')->all(), Request::get('vendor_id'), ['class' => 'form-control chosen-input']) !!}
        </div>
        <div class="form-group">
            {!! Form::select('status', array('' => 'Status', 'active' => 'Active', 'inactive' => 'Inactive', 'repair' => 'In repair'), Request::get('status'), ['class' => 'form-control chosen-input']) !!}
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
        <a href="/assets" class="btn btn-default">Reset</a>
      </form>
</div>