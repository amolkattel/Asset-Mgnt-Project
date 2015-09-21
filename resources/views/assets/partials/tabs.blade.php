<div class="clearfix">
    <div class="pull-left">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" {!! $active == 'list' ? 'class="active"' : '' !!}>
                <a href="/assets"><i class="fa fa-list"></i> List View</a>
            </li>
            <li role="presentation" {!! $active == 'grid' ? 'class="active"' : '' !!}>
                <a href="/assets/grid"><i class="fa fa-th-large"></i> Grid View</a>
            </li>
            <li role="presentation" {!! $active == 'map' ? 'class="active"' : '' !!}>
                <a href="/assets/map"><i class="fa fa-map-signs"></i> Map View</a>
            </li>
        </ul>
    </div>
    <div class="pull-right">
        <a href="/assets/create" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Asset</a>
    </div>
</div>