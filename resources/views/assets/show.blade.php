@extends('layout')

@section('content')
<section class="content-header">
  <h1>{{ $asset->name }}</h1>
  {!! Breadcrumbs::render('assets.show') !!}
</section>
<section class="content">
    
    <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img-responsive" src="{{$asset->image}}" alt="{{$asset->name}}">
              <h3 class="profile-username text-center">{{ $asset->name }}</h3>
              <p class="text-muted text-center">Model: {{ $asset->model }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Serial</b> <a class="pull-right">{{$asset->serial}}</a>
                </li>
                <li class="list-group-item">
                  <b>Price</b> <a class="pull-right">${{$asset->purchase_price}}</a>
                </li>
                <li class="list-group-item">
                  <b>Purchase date</b> <a class="pull-right">{{$asset->date_acquired}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right">{{$asset->status}}</a>
                </li>
                @if($asset->barcode)
                <li class="list-group-item">
                  <b>Barcode</b> <a class="pull-right">{{$asset->barcode}}</a>
                </li>
                @endif
              </ul>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </div><!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-body">
                    <p>{{$asset->description}}</p>
                    <div class="table-resonsive">
                        <table class="table table-striped">
                            <tr>
                                <td><b>Category</b></td>
                                <td>{{$asset->category->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Department</b></td>
                                <td>{{$asset->department->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Vendor</b></td>
                                <td>{{$asset->vendor->name}}</td>
                            </tr>
                            <tr>
                                <td><b>Used by</b></td>
                                <td>{{$asset->employee->first_name}} {{$asset->employee->last_name}}</td>
                            </tr>
                        </table>
                    </div>
                    @if($asset->location_lat && $asset->location_long)
                    <hr/>
                    <div id="map"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    @if($asset->location_lat && $asset->location_long)
    <script>
    function initMap() {
        
        var uluru = {lat: {{$asset->location_lat}}, lng: {{$asset->location_long}} };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru
        });
        var infowindow = new google.maps.InfoWindow({
            content: "<b>{{$asset->name}}</b><br/>Asset No. {{$asset->asset_no}}<br/>{{$asset->description}}"
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            title: "{{$asset->name}}"
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

    }
    
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initMap';
        document.body.appendChild(script);
    }

    window.onload = loadScript;
    </script>
    @endif
</section>
<style>
      #map {
        width:100%;
        height: 350px;
      }
    </style>
@stop