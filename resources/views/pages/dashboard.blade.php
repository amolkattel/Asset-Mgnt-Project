@extends('layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      @can('manage_assets')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $stats['assets'] }}</h3>
              <p>Total assets</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/assets" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        @endcan
        @can('manage_users')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $stats['users'] }}</h3>
              <p>Total users</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        @endcan
        @can('manage_employees')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $stats['employees'] }}</h3>
              <p>Total employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/employees" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        @endcan
        @can('manage_vendors')
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $stats['vendors'] }}</h3>
              <p>Total vendors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/vendors" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->
        @endcan
      </div><!-- /.row -->
    </section>
</div>
@stop