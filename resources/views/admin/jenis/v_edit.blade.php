@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card-header">Tambah Data</div>
        <form action="/jenis/update/{{ $jenis->id_jenis }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
        <!-- text input -->
                <div class="form-group" enctype="multipart/form">
                  <label>Jenis Wisata</label>
                    <input value="{{ $jenis->jenis }}" name="jenis" type="text" class="form-control" placeholder="Masukkan Jenis Wisata">
                      <div class="text-danger">
                        @error('jenis')
                          {{ $message }}
                        @enderror
                      </div>
                </div>
              </div>  <!-- end row -->
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Pilih File Icon </label>
                  <input type="file" name="icon" type="text" class="form-control" accept="image/png">
                    <div class="text-danger">
                      @error('icon')
                        {{ $message }} 
                        @enderror
                    </div>
                </div>
              </div><!-- end col sm -->
              
              <div class="col-sm-6">
        <!-- text input -->
                <div class="form-group" enctype="multipart/form">
                  <label>Keterangan</label>
                    <input value="{{ $jenis->keterangan }}" name="keterangan" type="text" class="form-control" placeholder="Masukkan keterangan">
                      <div class="text-danger">
                        @error('keterangan')
                          {{ $message }}
                        @enderror
                      </div>
                </div>
              </div>  <!-- end row -->

              <div class="col-sm-6">
                <div class="form-group">
                  <label> Icon </label>
                  <img src="{{ asset('icon') }}/{{ $jenis->icon }}" width="70px">
                </div>
              </div><!-- end col sm -->

            </div>
          </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                <a href="/jenis" class="btn btn-warning float-right">Cancel</a>
              </div>
        </form>    
    </div>         
  </div>
</div>
</div>

    
@endsection
