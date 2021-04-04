<?php
//import koneksi ke database
?>
<html>
    <head>
        <title>Daftar Wisata                                                    Tanggal: {{ date('d-M-Y') }}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Daftar Wisata</h2>
				<div class="data-tables datatable-dark">
					
                    <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
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
</div>
	
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>