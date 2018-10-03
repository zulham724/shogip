
@extends('layouts.admin')

@section('css')
<style>
  #map {
    height:500px;
    width: 100%;
  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>
@endsection

@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Dashboard</h2>
  </div>
</div>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalUmkm" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data UMKM</h4>
                    <button type="button" class="close" data-dismiss="modal">&times</button>
                </div>
                <div class="modal-body">
                    <div id="text-center">
                        <h2>Data UMKM</h2>
                    </div>
                    <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>UMKM Category</td>
                                <td>State</td>
                                <td>City</td>
                                <td>District</td>
                                <td>Name</td>
                                <td>Description</td>
                                <td>Address</td>
                                <td>CP</td>
                                <td>Web</td>
                                <td>Facebook</td>
                                <td>Twiiter</td>
                                <td>Instagram</td>
                            </tr>
                        </thead>
                        <tbody>
                   
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
        </div> 
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(()=>{
        if({!! $login !!}){
            swal("Hello :)","You Have Login as Admin, Feel free to surf","success");
        }
    });
</script>
<script>
      function initMap() {

        var style = [
             {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ff0000"
                        },
                        {
                            "weight": "2.26"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#fb0000"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f2f2f2"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 45
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#f80000"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "color": "#42baeb"
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                }
            ];

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -7.3892445, lng: 109.9644581},
          zoom: 9,
          styles: style
        });

        var marker = new google.maps.Marker({
            position: 
                { 
                    lat: -6.9904038, lng: 110.4229455 
                },
            map: map
        });

        var infowindow = new google.maps.InfoWindow;
        /* marker.addListener('mouseover', function() {
            infowindow.open(map, marker);
         });*/

        var contentString = '<div id="content">' + '<div id="siteNotice">'+ '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">Hai</h1>'+ '<div id="bodyContent">'+
                        '<p>Halo</p>' + '<p><center><span data-toggle="modal" data-target="#modalUmkm"><a type="button" class="btn btn-secondary">Detail</a></span></center></p>';
         google.maps.event.addListener(marker,'mouseover', (function(marker,contentString,infowindow){ 
            return function() {
                infowindow.setContent(contentString);
                infowindow.open(map,marker);
            };
        })(marker,contentString,infowindow));

  }
</script>
@endsection

