@extends('layouts.frontend')
@section('content')

<div class=" card-outline card-primary">
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
                        <th width="" class="text-center">Foto</th>
                        <th width="30PX" class="text-center">Nama Wisata</th>
                        <th width="30PX" class="text-center">Jenis</th>
                        <th width="30px" class="text-center">Alamat</th>
                        <th width="30PX"class="text-center">Kecamatan</th>
                        <th width="30px"class="text-center">Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($wisata as $data)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center"><img src="{{ asset('foto')}}/{{ $data->foto }}" width="100%" height=""></td>
                            <td >{{ $data->nama_wisata }}</td>
                            <td >{{ $data->jenis }}</td>
                            <td >{{ $data->alamat }}</td>
                            <td >{{ $data->kecamatan }}</td>
                            <td >{{ $data->deskripsi }}</td>
                            <td class="text-center"> 
                              <a href="/detailwisata/{{ $data->id_wisata }}" class="btn btn-flat btn-warning"> <i class="fa fa-eye"> </i> Detail </a> 
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