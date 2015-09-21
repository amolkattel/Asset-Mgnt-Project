@extends('layout')

@section('content')
<section class="content-header">
  <h1>Locations</h1>
  
</section>
<section class="content">

    <div id="map-canvas"></div>
    <script>
    var map;
    function initMap() {
        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng({{$locations[0]->location}})
        }
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);


        @foreach($locations as $item)
            var marker{{$item->id}} = new google.maps.Marker({
                position: new google.maps.LatLng({{$item->location}}),
                map: map,
                title: "{{$item->title}}"
            });
        @endforeach
    }
 
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>

</section>
<style>
      #map-canvas {
        width:100%;
        height: 500px;
      }
    </style>
@stop