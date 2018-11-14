@extends('layouts.creative')

@section('css')
<style type="text/css">
    #map {
        height:100vh;
        width: 100%;
      }
</style>
@endsection

@section('content')

    <div id="map"></div>

@endsection
@section('script')
<script type="text/javascript">

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

    var states = [{}];

    var cities = [{}];

    var umkms = [];

    var center = {lat: -4.8234002, lng: 117.1941047};

    var zoom = 5;



    $(()=>{
        // $("#modalUmkm").modal("show");
    });

    function initMap() {

        var tid = setInterval( function () {
            if ( document.readyState !== 'complete' ) return;
            clearInterval( tid );       
            // do your work
            this.map_cities(-7.218586,110.441687,33);
        }, 100 );

    }

    function map_states(){

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -4.8234002, lng: 117.1941047},
          zoom:5,
          styles: style,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });
        if(map){
            console.log('map woi');
        }
        axios.get("{{ url('api/umkm/states') }}").then(res=>{
            states = res.data;
            console.log(states);

            $.each(states,(index,s)=>{
                
                var iconBase = '{{ asset('storage/marker/toko.png') }}';
                var marker = new google.maps.Marker({
                    position: 
                        { 
                            lat: parseInt(s.lat), lng: parseInt(s.lng) 
                        },
                    map: map,
                    icon : iconBase
                });

                var infowindow = new google.maps.InfoWindow;

                var contentString = 
                "<div id='content'>\
                     <div class='card'>\
                        <div class='card-header'>\
                            <i class='fa fa-pencil'></i> Data UMKM Di "+s.name+"\
                            <a href=' class='pull-right'>Tampilkan Data UMKM Di "+s.name+"</a>\
                        </div>\
                        <div class='card-body'>\
                            <table class='table table-striped'>\
                                <tr>\
                                    <td colspan='2'><i class='fa fa-home'></i>"+ s.cities_count +" Kota Di Daerah "+ s.name +"</td>\
                                </tr>\
                                <tr>\
                                    <td><img class='img-thumbnail' width='100' src='{{asset('storage/marker/shop.jpg')}}'></td>\
                                    <td>"+s.description+"\
                                    <a href=' class='pull-right'>Edit</a>\
                                    </td>\
                                </tr>\
                                <tr>\
                                    <td colspan='2'>\
                                        <button type='button' class='btn btn-info' onclick='map_cities("+s.lat+","+s.lng+","+s.id+")'><i class='fa fa-search'></i> Masuk </button>\
                                    </td>\
                                </tr>\
                            </table>\
                        </div>\
                    </div>\
                </div>\
                ";
                 google.maps.event.addListener(marker,'click', (function(marker,contentString,infowindow){ 
                    return function() {
                        infowindow.setContent(contentString);
                        infowindow.open(map,marker);
                    };
                })(marker,contentString,infowindow));
                 

            });

        });
    }

    function map_cities(lat,lng,state_id){

        center = {lat:lat,lng:lng};
        zoom+=4;

        var map = new google.maps.Map(document.getElementById('map'), {
          center: center,
          zoom: zoom,
          styles: style,
          mapTypeId: google.maps.MapTypeId.HYBRID
        });

        //
        axios.get("{{ url('api/umkm/cities') }}/"+state_id).then(res=>{
            cities = res.data;
            // console.log(cities);

            $.each(cities,(index,c)=>{

                var iconBase = '{{ asset('storage/marker/toko.png') }}';
                var marker = new google.maps.Marker({
                    position: 
                        { 
                            lat: parseFloat(c.lat), lng: parseFloat(c.lng) 
                        },
                    map: map,
                    icon : iconBase
                });

                var infowindow = new google.maps.InfoWindow;

                var contentString = 
                "<div id='content'>\
                    <table class='table table-striped'>\
                        <tr>\
                            <td colspan='2'><i class='fa fa-home'></i> "+c.umkm_count+" UMKM Di "+c.name+"</td>\
                        </tr>\
                        <tr>\
                            <td><img class='img-thumbnail' width='100' src='{{asset('storage/marker/shop.jpg')}}'></td>\
                            <td>"+c.description+"\
                            \
                            </td>\
                        </tr>\
                        <tr>\
                            <td colspan='2'>\
                                <span>\
                                <button type='button' class='btn btn-info' onclick='load_umkm("+c.id+")'><i class='fa fa-search'></i> Lihat Data UMKM</button>\
                                </span>\
                            </td>\
                        </tr>\
                    </table>\
                </div>\
                ";
                 google.maps.event.addListener(marker,'click', (function(marker,contentString,infowindow){ 
                    return function() {
                        infowindow.setContent(contentString);
                        infowindow.open(map,marker);
                    };
                })(marker,contentString,infowindow));

            });

        });

        
    }

    
    function load_umkm(city_id){
        // alert('load umkm '+city_id)
        console.log(city_id);
        axios.get("{{ url('api/umkms/getByCity') }}/"+city_id).then(res=>{
            console.log(res.data);

            if(umkms.length > 0){
                $(".customdatatable").DataTable().destroy();        
            }
            umkms = res.data;
            var table = $(".customdatatable").DataTable({   
                data:umkms,
                columns:[
                    {data:'umkm_category.name',title:'Kategori UMKM'},
                    {data:'state.name',title:'Provinsi'},
                    {data:'city.name',title:'Kota'},
                    {data:'district.name',title:'Wilayah'},
                    {data:'name',title:'Nama'},
                    {data:'description',title:'Deskripsi'},
                    {data:'address',title:'Alamat'},
                    {data:'cp',title:'No Telpon'},
                    {data:'web',title:'Web'},
                    {data:'facebook',title:'Facebook'},
                    {data:'twitter',title:'Twiter'},
                    {data:'instagram',title:'Instagram'},
                   
                ]
            });

            $('.customdatatable tbody').on('click','button',function(){
                let data = table.row($(this).parents('tr')).data();
                window.location.href = "{{ url('umkms') }}/"+data.id;
            });

            $("#modalUmkm").modal("show");

        });
    }
</script>   
@endsection

