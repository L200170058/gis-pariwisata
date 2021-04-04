@extends('layouts.frontend')
@section('content')



			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form contact-form">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Tampil berdasarkan Jenis</button>
							<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu">
								@foreach ($jenis as $data)
								<a href="/jenis/{{ $data->id_jenis }}" class="dropdown-item">{{ $data->jenis }}</a>
								@endforeach
						</div>
					</div>
				</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form contact-form">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Tampil berdasarkan kecamatan</button>
							<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu">
								@foreach ($kecamatan as $data)
								<a href="/kecamatan/{{ $data->id_kecamatan }}" class="dropdown-item">{{ $data->kecamatan }}</a>
								@endforeach
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<br>

	<div id="map" style="width: 100%; height: 500px;"></div>
	<script>
		navigator.geolocation.getCurrentPosition(function(location) {
			var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
			
			console.log(location.coords.posisi);
		//map view
		
		
		});
		
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
	
		@foreach ($kecamatan as $data)
		var data{{ $data->id_kecamatan }} = L.layerGroup();
		@endforeach
		var wisata = L.layerGroup();
	
		var map = L.map('map', {
				center: [-7.670014861357169, 110.61328580048811],
				zoom: 12,
				fullscreenControl: true,
				fullscreenControlOptions: {
				position: 'topleft'},
					layers: [peta5,
				@foreach ($kecamatan as $data)
					data{{ $data->id_kecamatan }},
				@endforeach
				wisata,
			]
		});

		var locate = L.control.locate().addTo(map);

		function popupLayer(e) {
				var popup = L.popup();
				popup
					.setLatLng(e.latlng)
					.setContent(e.sourceTarget.feature.properties.kecamatan)
					.openOn(maps);
				// return popup;
			}
	
		var baseMaps = {
			"googleStreets" : peta5,
			"googleHybrid" : peta6,
			"Grayscale": peta1,
			"Satelit": peta2,
			"Streets": peta3,
			"Dark": peta4,
		};
	
		var overlayer = {
			"wisata": wisata,
			@foreach ($kecamatan as $data)
			"{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
			@endforeach
			
		};
	
		L.control.layers(baseMaps, overlayer).addTo(map);
	
		@foreach ($kecamatan as $data)
			L.geoJSON(<?= $data->geojson ?>,{
				style : {
					color : 'white', //warna tepi
					fillColor : '{{ $data->warna }}', //warna dalam
					fillOpacity : 0.3, //tranparansi
				},
			}).addTo(data{{ $data->id_kecamatan }}); 
		@endforeach
	
		@foreach ($wisata as $data)
		var iconwisata = L.icon({
			iconUrl: '{{ asset('icon')}}/{{ $data->icon }}',
			iconSize:     [38, 38],
		});
	
		var informasi ='<table class="table table-bordered"><tbody><tr><td>Nama Wisata</td><td>{{ $data->nama_wisata }}</td></tr><tr><td>Jenis Wisata</td><td>{{ $data->jenis }}</td></tr><tr><td>Kecamatan</td><td>{{ $data->kecamatan }}</td></tr><tr><td><a href="/detailwisata/{{ $data->id_wisata }}" class="btn btn-xs btn-warning">Detail</a></td><td><a href="https://www.google.com/maps/search/{{ $data->nama_wisata }}/{{ $data->posisi }}" target="_blank" class="btn btn-xs btn-warning">Menuju Map</a></td></tr></tbody></table>';
			L.marker([<?= $data->posisi ?>],{icon: iconwisata})
			.addTo(wisata)
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
		
	
	
	</script>
@endsection 