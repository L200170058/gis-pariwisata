@extends('layouts.backend')

@section('content')

<div class=" card-outline card-primary">
    <div class="col-md-12">
        <div class="card-header">
          <h3 class="card-title">Data {{ $title }}</h3>

          <div class="card-tools">
            <a href="/jenis/add" type="button" class="btn btn-primary text-sm" ><i class="fa fa-plus text-sm"> Tambah</i>
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
                        <th width="58px" class="text-center">No</th>
                        <th >Jenis</th>
                        <th >Keterangan</th>
                        <th width="50px" class="text-center">Icon</th>
                        <th width="100px" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($jenis as $data)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td >{{ $data->jenis }}</td>
                            <td >{{ $data->keterangan }}</td>
                            <td ><img src="{{ asset('icon')}}/{{ $data->icon }}" width="50px"></td>
                            <td class="text-center"> 
                              <a href="/jenis/edit/{{ $data->id_jenis }}" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"> </i> </a> 
                              <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_jenis }}"><i class="fa fa-trash"></i></button>
                              
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>

       <!-- Modal Delete -->
      @foreach ($jenis as $data)
      <div class="modal fade" id="delete{{ $data->id_jenis }}">
          <div class="modal-dialog">
            <div class="modal-content bg-danger">
              <div class="modal-header">
                <h4 class="modal-title">{{ $data->jenis }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Ingin Hapus Data Ini..?</p>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <a href="/jenis/delete/{{ $data->id_jenis }}" type="button" class="btn btn-outline-light">Yes</a>
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