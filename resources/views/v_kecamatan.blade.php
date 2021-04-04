@extends('layouts.frontend')
@section('content')

<div id="map" style="width: 100%; height: 500px;"></div>

<div class="col-sm-12">
	<br>
	<br>
	<div class="text-center"><h2><b>Data Wisata {{ $title }}</b></h2></div>
	<table id="example1" class="table table-bordered table-striped text-sm">
		<thead>
			<tr>
				<th width="10px" class="text-center">No</th>
				<th class="text-center">Nama Wisata</th>
				<th width="30px" class="text-center">Jenis</th>
				<th class="text-center">Alamat</th>
				<th class="text-center">Foto</th>
				<th class="text-center">Deskripsi</th>
				<th class="text-center">Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			@foreach ($wisata as $data)
				<tr>
					<td class="text-center">{{ $no++ }}</td>
					<td >{{ $data->nama_wisata }}</td>
					<td >{{ $data->jenis }}</td>
					<td >{{ $data->alamat }}</td>
					<td class="text-center"><img src="{{ asset('foto')}}/{{ $data->foto }}" width="100px" height="75px"></td>
					<td >{{ $data->deskripsi }}</td>
					<td class="text-center"> 
						<a href="/detailwisata/{{ $data->id_wisata }}" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-eye"> </i> Detail </a> 
						{{-- <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#delete{{ $data->id_wisata }}"><i class="fa fa-trash"></i></button> --}}
						
					  </td>
				</tr>
			@endforeach

		</tbody>
	</table>
</div>


<script>
navigator.geolocation.getCurrentPosition(function(location) {
var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

console.log(location.coords.posisi);
//map view
var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11'
		});
	
	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/satellite-v9'
		});
	
	
	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		});
	
	var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/dark-v10'
		});
	
	var peta5 = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
			maxZoom: 20,
			subdomains:['mt0','mt1','mt2','mt3']
		});
	var peta6 = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
			maxZoom: 20,
			subdomains:['mt0','mt1','mt2','mt3']
		});

	
	

	@foreach ($jenis as $data)
		var jenis{{ $data->id_jenis }} = L.layerGroup();
	@endforeach

	var data{{ $kec->id_kecamatan }} = L.layerGroup();


    var map = L.map('map', {
    	center: [-7.732616445480298, 110.66272427677531],
   		zoom: 10,
		fullscreenControl: true,
		fullscreenControlOptions: {
		position: 'topleft'},
   	 	layers: [peta5,data{{ $kec->id_kecamatan }},
		@foreach ($jenis as $data)
			jenis{{ $data->id_jenis }},
		@endforeach
		]
	});

	var locate = L.control.locate().addTo(map);

    var baseMaps = {
		"googleStreets" : peta5,
		"googleHybrid" : peta6,
		"Grayscale": peta1,
		"Satelit": peta2,
		"Streets": peta3,
		"Dark": peta4,
	};

	var overlayer = {
		"{{ $kec->kecamatan }}" : data{{ $kec->id_kecamatan }},
		@foreach ($jenis as $data)
		"{{ $data->jenis }}" : jenis{{ $data->id_jenis }},
		@endforeach
	}; 

    L.control.layers(baseMaps, overlayer).addTo(map);

		var kec = L.geoJSON(<?= $kec->geojson ?>,{
			style : {
				color : 'white',
				fillColor : '{{ $kec->warna }}',
				fillOpacity : 0.3,
			},
		}).addTo(data{{ $kec->id_kecamatan }}); 

		map.fitBounds(kec.getBounds());

		@foreach ($wisata as $data)
	var iconwisata = L.icon({
    iconUrl: '{{ asset('icon')}}/{{ $data->icon }}',
    iconSize:     [38, 38],
	});

	var informasi ='<table class="table table-bordered"><tbody><tr><td>Nama Wisata</td><td>{{ $data->nama_wisata }}</td></tr><tr><td>Jenis Wisata</td><td>{{ $data->jenis }}</td></tr><tr><td>Kecamatan</td><td>{{ $data->kecamatan }}</td></tr><tr><td><a href="/detailwisata/{{ $data->id_wisata }}" class="btn btn-xs btn-warning">Detail</a></td><td><a href="https://www.google.com/maps/search/{{ $data->nama_wisata }}/{{ $data->posisi }}" target="_blank" class="btn btn-xs btn-warning">Menuju Map</a></td></tr></tbody></table>';

		L.marker([<?= $data->posisi ?>],{icon: iconwisata})
		.addTo( jenis{{ $data->id_jenis }})
		.bindPopup(informasi);
	@endforeach
	map.on('zoomstart', function() {
            console.log("Zoom Start Dimulai");
            if (locate._active == true) {
                $("._checkradius_").show();
            }

            $("#_radius_").on("change", function(){
                console.log("Input radius diganti");
                var radius = $("#_radius_").val();
                if (radius != "") {
                    if ($.isNumeric(radius)) {
                        locate.options.circleRadius = radius;
                        locate._updateContainerStyle();
                        locate._drawMarker();
                    } else {
                        alert('Input Harus Angka!')
                    }
                } else {
                    alert('Input tidak boleh kosong!');
                }
            });

        });
		var radius = L.control({position: 'topleft'});
		radius.onAdd = function (map) {

			var div = L.DomUtil.create('div', '_checkradius_');
			div.innerHTML += '\
				<fieldset class="row row-fluid">\
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">\
						<input type="number" name="_radius_" id="_radius_" class="form-control" placeholder="0">\
					</div>\
				</fieldset>\
			';
			
			return div;
		};

		radius.addTo(map);
		$("._checkradius_").hide();
	
	});$

	
</script>

<script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
          });
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
@endsection 