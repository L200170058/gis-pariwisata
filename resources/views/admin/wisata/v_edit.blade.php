@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-header">Edit Data</div>
        <form action="/wisata/update/{{ $wisata->id_wisata }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
        <!-- text input -->
                <div class="form-group" enctype="multipart/form">
                  <label>Nama Wisata</label>
                    <input name="nama_wisata" value="{{ $wisata->nama_wisata }}" type="text" class="form-control" placeholder="Masukkan nama Wisata">
                      <div class="text-danger">
                        @error('nama_wisata')
                          {{ $message }}
                        @enderror
                      </div>
                </div>
              </div>  <!-- end row -->

              <div class="col-sm-6">
                <!-- text input -->
              <div class="form-group" enctype="multipart/form">
                <label>Jenis Wisata</label>
                  <select name="id_jenis" class="form-control">
                    <option value="{{ $wisata->id_jenis }}">{{ $wisata->jenis }}</option>
                    @foreach ($jenis as $data)
                        <option value="{{ $data->id_jenis }}">{{ $data->jenis }}</option>
                    @endforeach
                  </select>
                    <div class="text-danger">
                      @error('id_jenis')
                        {{ $message }}
                      @enderror
                     </div>
              </div>
             </div>  <!-- end row -->                  
              
              <div class="col-sm-6">
                <!-- text input -->
              <div class="form-group" enctype="multipart/form">
                <label>Kecamatan</label>
                  <select name="id_kecamatan" class="form-control">
                    <option value="{{ $wisata->id_kecamatan }}">{{ $wisata->kecamatan }}</option>
                    @foreach ($kecamatan as $data)
                        <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                    @endforeach
                  </select>
                    <div class="text-danger">
                      @error('id_jenis')
                        {{ $message }}
                      @enderror
                     </div>
              </div>
             </div>  <!-- end row -->

             <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group" enctype="multipart/form">
                <label>Alamat</label>
                 <input name="alamat" value="{{ $wisata->alamat }}" type="text" class="form-control" placeholder="Masukkan Alamat Wisata">
                    <div class="text-danger">
                      @error('alamat')
                        {{ $message }}
                     @enderror
                    </div>
                </div>
              </div>  <!-- end row -->

             <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group" enctype="multipart/form">
                <label>Posisi Wisata</label>
                 <input name="posisi" value="{{ $wisata->posisi }}" type="text" class="form-control" placeholder="Posisi Wisata" >
                    <div class="text-danger">
                      @error('alamat')
                        {{ $message }}
                     @enderror
                    </div>
                </div>
              </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pilih Foto</label>
                        <input type="file" name="foto" type="text" class="form-control" accept="image/jpeg,image/png">
                      <div class="text-danger">
                        @error('foto')
                          {{ $message }} 
                        @enderror
                      </div>
                  </div>
                </div><!-- end col sm -->

              <div class="col-sm-12">
                <label for="">MAP<label class="text-danger">(Drag and Drop Marker Atau Klik Map Untuk Menentukan Posisi Wisata)</label></label>
                <div id="map" style="width: 100%; height: 300px;"></div>
              </div>

              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group" enctype="multipart/form">
                
                    
                  </div>
                </div>  

              <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group" enctype="multipart/form">
                  <label>Deskripsi</label>
                   <textarea name="deskripsi" type="text" class="form-control" placeholder="Masukkan Deskripsi" rows="7">{{ $wisata->deskripsi }}</textarea>
                      <div class="text-danger">
                        @error('deskripsi')
                          {{ $message }}
                       @enderror
                      </div>
                  </div>
                </div>  

            </div>
          </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <a href="/wisata" class="btn btn-warning float-right">Cancel</a>
              </div>
        </form>    
    </div>         
  </div>
</div>
</div>

<script>
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


var map = L.map('map', {
    	center: [{{ $wisata->posisi }}],
   		zoom: 9,
   	 	layers: [peta5],
});
var baseMaps = {
			"googleStreets" : peta5,
			"googleHybrid" : peta6,
			"Grayscale": peta1,
			"Satelit": peta2,
			"Streets": peta3,
			"Dark": peta4,
		};

    L.control.layers(baseMaps).addTo(map);

    //mengambil titik koordinat
    var curLocation = [{{ $wisata->posisi }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });
    map.addLayer(marker);

    //ambil koordinat saat marker di drag n drop
    marker.on('dragend',function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable : 'true',
        }).bindPopup(position).update();
        //console.log(position.lat + "," + position.lng);
        $("#posisi").val(position.lat + "," + position.lng).keyup();
    });

     //ambil koordinat saatmap diklik
     var posisi = document.querySelector("[name=posisi]");
    map.on("click",function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;
        if(!marker)
        {
            marker = L.marker(event.latlng).addTo(map);
        }else{
            marker.setLatLng(event.latlng);
        }
        posisi.value = lat + "," + lng;
    });
</script>

    
@endsection
