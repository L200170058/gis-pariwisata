
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print Data Wisata</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE')}}/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <img src="{{ asset('AdminLTE') }}/klaten.png" width="50px" height="50px"> 
          Daftar Pariwisata Kabupaten Klaten
          <small class="float-right">Tanggal: {{ date('d-M-Y') }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
 
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
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
                  </tr>
              @endforeach

          </tbody>
      </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
