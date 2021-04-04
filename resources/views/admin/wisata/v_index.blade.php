@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
    <div class="col-md-12">
        <div class="card-header">
          <h3 class="card-title">Data {{ $title }}</h3><br>
          {{-- <a href="/wisata/print" target="_blank" type="button" class="btn btn-primary btn-xs" > Print</a> --}}
          {{-- <a href="/wisata/pdf" target="_blank" type="button" class="btn btn-primary btn-xs" > Pdf</a> --}}
          <a href="/wisata/export" target="_blank" type="button" class="btn btn-primary btn-xs" > export</a>
          {{-- <a href="/wisata/add" type="button" class="btn btn-danger btn-xs" ><i class="fa fa-plus text-sm"> Tambah</i></a> --}}
          <div class="card-tools">
            <a href="/wisata/add" type="button" class="btn btn-primary text-sm" ><i class="fa fa-plus text-sm"> Tambah</i>
            </a>
          </div>
          <!-- /.card-tools -->
        </div>
      </div>
        <!-- /.card-header -->
        <div class="card-body">
          @if (session('pesan'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-check"></i> {{ session('pesan') }}</h6>
          </div>
              
          @endif
            <table id="example1" class="table table-bordered table-striped text-sm">
                <thead>
                    <tr>
                        <th width="10px" class="text-center">No</th>
                        <th class="text-center">Nama Wisata</th>
                        <th width="30px" class="text-center">Jenis</th>
                        <th class="text-center">Alamat</th>
                        <th width="40px"class="text-center">Kecamatan</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Tgl Dibuat</th>
                        <th class="text-center">Tgl Diubah</th>
                        <th width="30" class="text-center">Action</th>
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
                            <td >{{ $data->kecamatan }}</td>
                            <td class="text-center"><a href="{{ asset('foto')}}/{{ $data->foto }}" target="_blank"><img src="{{ asset('foto')}}/{{ $data->foto }}" width="100px" height="75px"></a></td>
                            <td >{{ $data->deskripsi }}</td>
                            <td >{{ $data->create_at }}</td>
                            <td >{{ $data->updated_at }}</td>
                            <td class="text-center"> 
                              <a href="/wisata/ft/{{ $data->id_wisata }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-image"> </i></a> 
                              <a href="/wisata/edit/{{ $data->id_wisata }}" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"> </i> </a> 
                              <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_wisata }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>

       <!-- Modal Delete -->
      @foreach ($wisata as $data)
      <div class="modal fade" id="delete{{ $data->id_wisata }}">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">{{ $data->nama_wisata }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Ingin Hapus Data Ini..?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <a href="/wisata/delete/{{ $data->id_wisata }}" type="button" class="btn btn-outline-light">Yes</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      @endforeach
     
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