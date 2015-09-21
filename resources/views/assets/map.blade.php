@extends('layout')

@section('content')
<section class="content-header">
  <h1>Assets</h1>
  {!! Breadcrumbs::render('assets.map') !!}
</section>
<section class="content">
    @include('assets.partials.tabs', ['active' => 'map'])
    <div class="box box-info">    
        <div id="map"></div>
    </div>
    <script>
    function initMap() {
        window.map = new google.maps.Map(document.getElementById('map'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();    

        @foreach($assets as $item)

          var marker = new google.maps.Marker({
            position: new google.maps.LatLng({{$item->location_lat}},{{$item->location_long}}),
            map: map,
            title: "{{$item->name}}"
          });

          //extend the bounds to include each marker's position
          bounds.extend(marker.position);
          var i = {{$item->id}};
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent("<b>{{$item->name}}</b><br/>Asset No. {{$item->asset_no}}<br/>{{$item->description}}");
              infowindow.open(map, marker);
            }
          })(marker, i));
        
        @endforeach

        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);

        //(optional) restore the zoom level after the map is done scaling
        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(3);
            google.maps.event.removeListener(listener);
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

</section>
<style>
      #map {
        width:100%;
        height: 550px;
      }
    </style>
@stop