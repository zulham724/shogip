
@extends('layouts.admin')

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
                        <head>
                        <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width">
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

                              
                            </head>
                            <body>
                                <div id="map"></div>
                            <script>
                              function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  center: {lat: -7.3892445, lng: 109.9644581},
                                  zoom: 9,
                                  styles: [
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
                                              ]
                                    });

                        @foreach ($umkm as $km => $um)
                        var contentString = '<div id="content">' + '<div id="siteNotice">'+ '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">{{$um->city->name}}</h1>'+ '<div id="bodyContent">'+
                        '<p>ashdgasdh</p>' + '<p><center><span data-toggle="modal" data-target="#modalUmkm"><a type="button" class="btn btn-secondary">Detail</a></span></center></p>'

                        var marker = new google.maps.Marker({
                        position: {lat: {{$um->city->lat}}, lng: {{$um->city->lng}}},
                         map: map,
                        });

                        var infowindow = new google.maps.InfoWindow;
                        /* marker.addListener('mouseover', function() {
                            infowindow.open(map, marker);
                         });*/
                         google.maps.event.addListener(marker,'mouseover', (function(marker,contentString,infowindow){ 
                            return function() {
                                infowindow.setContent(contentString);
                                infowindow.open(map,marker);
                            };
                        })(marker,contentString,infowindow));
                        @endforeach

                          }
                        </script>

                           <script 
                           src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV7eEI591Yfk0JWCxXgCEXTxTxbr4o7g8&callback=initMap"
                            async defer></script>                             
                                </body>
                       
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
                                <!-- <td>Latitude</td>
                                <td>Longitude</td> -->
                            </tr>
                            <tbody>
                       @foreach ($umkm as $um => $umkms)
                        <tr>
                            <td>{{ $um+1 }}</td>
                            <td>{{ $umkms->umkm_category->name }}</td>
                            <td>{{ $umkms->state->name }}</td>
                            <td>{{ $umkms->city->name }}</td>
                            <td>{{ $umkms->district->name }}</td>
                            <td>{{ $umkms->name }}</td>
                            <td>{{ $umkms->description }}</td>
                            <td>{{ $umkms->address }}</td>
                            <td>{{ $umkms->cp }}</td>
                            <td>{{ $umkms->web }}</td>
                            <td>{{ $umkms->facebook }}</td>
                            <td>{{ $umkms->twitter }}</td>
                            <td>{{ $umkms->instagram }}</td>
                            <!-- <td>{{ $umkms->latitude }}</td>
                            <td>{{ $umkms->longitude }}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                        </thead>
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
@endsection

