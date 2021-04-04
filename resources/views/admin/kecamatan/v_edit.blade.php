@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-header">Edit Data</div>
        <form action="/kecamatan/update/{{ $kecamatan->id_kecamatan  }}" method="POST">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                            <!-- text input -->
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select name="kecamatan" class="form-control">
                    <option value="{{ $kecamatan->kecamatan }}">{{ $kecamatan->kecamatan }}</option>
                    <option value="Bayat">Bayat</option>
                    <option value="Cawas">Cawas</option>
                    <option value="Ceper">Ceper</option>
                    <option value="Delanggu">Delanggu</option>
                    <option value="Gantiwarno">Gantiwarno</option>
                    <option value="Jatinom">Jatinom</option>
                    <option value="Juwiring">Juwiring</option>
                    <option value="Kalikotes">Kalikotes</option>
                    <option value="Karanganom">Karanganom</option>
                    <option value="Karanganom">Karangdowo</option>
                    <option value="Karangnongko">Karangnongko</option>
                    <option value="Kebonarum">Kebonarum</option>
                    <option value="Kemalang">Kemalang</option>
                    <option value="Klaten selatan">Klaten selatan</option>
                    <option value="Klatentengah">Klatentengah</option>
                    <option value="Klatenutara">Klatenutara</option>
                    <option value="Manisrenggo">Manisrenggo</option>
                    <option value="Ngawen">Ngawen</option>
                    <option value="Pedan">Pedan</option>
                    <option value="Polanharjo">Polanharjo</option>
                    <option value="Prambanan">Prambanan</option>
                    <option value="Trucuk">Trucuk</option>
                    <option value="Tulung">Tulung</option>
                    <option value="Wedi">Wedi</option>
                    <option value="Wonosari">Wonosari</option>
                    
            </select>
                      <div class="text-danger">
                        @error('kecamatan')
                          {{ $message }}
                        @enderror
                      </div>
                </div>
              </div>  <!-- end row -->

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Pilih Warna</label>
                    <div class="input-group my-colorpicker2">
                      <input name="warna" value="{{ $kecamatan->warna }}"  type="text" class="form-control" placeholder="Silahkan Pilih Warna">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                        </div>
                    </div>

                    <div class="text-danger">
                      @error('warna')
                        {{ $message }} 
                      @enderror
                    </div>
                </div>
              </div><!-- end col sm -->

              <div class="col-sm-12">
                <label >Geojson</label>
                  <textarea name="geojson"  rows="7" class="form-control" placeholder="Pilih geojson">{{ $kecamatan->geojson }}</textarea>
                  <div class="text-danger">
                    @error('geojson')
                      {{ $message }} 
                    @enderror
                  </div>
              </div>
            </div>
          </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <a href="/kecamatan" class="btn btn-warning float-right">Cancel</a>
              </div>
        </form>    
    </div>         
  </div>
</div>
</div>
<script src="{{ asset('AdminLTE')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script>
   //color picker with addon
   $('.my-colorpicker2').colorpicker();
   $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
</script>
    
@endsection
