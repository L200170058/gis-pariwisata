@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
                  <div class="card-header">Tambah Data {{ $wisata->nama_wisata }}</div>
          <form class="mb-3" id="formAddFoto" method="post" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="row">
  
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Pilih Foto</label>
                    <input type="file" name="foto[]" multiple>
                    <div id="kolom"></div>
                  </div>
                </div><!-- end col sm -->

                <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Simpan</button>
                </div>
              </div>
          </form> 

          <table id="example1" class="table table-bordered table-striped text-sm">
            <thead>
                <tr>
                  <th width="" class="text-center">No</th>
                    <th >Foto</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($wisata->foto_wisata as $foto)
                    <tr>
                      <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center"><img src="{{ asset('foto')}}/{{ $foto->nama }}" width="200px" height="200px"></td>
                        <td class="text-center"> 
                          <a href="/wisata/ft/delete/{{ $foto->id }}"><button class="btn btn-flat btn-danger"><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>         
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(function(){
  
      var id= 0;
      // Handle untuk menambah kolom
      $('#addKolom').click(() => {
        id += 1;
        $('#kolom').append(`
          <div id="kolom-input-`+id+`">
          <a href="#" id="dropKolom`+ id +`">Hapus</a>
          <input type="file" name="gambar[]">
          </div>
          `);
  
      });
    });
  </script>
  
{{-- 
<div class=" card-outline card-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card-header">Tambah Foto</div>
        <div class="card-body">
          <form class="mb-3" id="formAddFoto" method="post" enctype="multipart/form-data">
            @csrf
            <div class="my-2">
              <input type="file" name="foto[]" multiple>
              <div id="kolom"></div>
            </div>
            <button type="submit">Simpan</button>
          </form> 
          @if(count($wisata->foto_wisata) == 0)
          Tidak ada foto
          @else
          @foreach($wisata->foto_wisata as $foto)
          <div class="border p-3 rounded m-2">
            <img src="{{ asset('foto')}}/{{ $foto->nama }}" width="100px" height="75px">
            <a href="/wisata/ft/delete/{{ $foto->id }}">Hapus</a>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){

    var id= 0;
    // Handle untuk menambah kolom
    $('#addKolom').click(() => {
      id += 1;
      $('#kolom').append(`
        <div id="kolom-input-`+id+`">
        <a href="#" id="dropKolom`+ id +`">Hapus</a>
        <input type="file" name="gambar[]">
        </div>
        `);

    });
  });
</script> --}}
@endsection
