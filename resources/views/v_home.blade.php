@extends('layouts.backend')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $wisata }}</h3>

          <p>Wisata</p>
        </div>
        <div class="icon">
          <i class="fas fa-route"></i>
        </div>
        <a href="/wisata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $jenis }}</h3>

          <p>Jenis</p>
        </div>
        <div class="icon">
          <i class="fas fa-layer-group"></i>
        </div>
        <a href="/jenis" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $kecamatan }}</h3>

          <p>Kecamatan</p>
        </div>
        <div class="icon">
          <i class="fas fa-archive"></i>
        </div>
        <a href="/kecamatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{ $user }}</h3>

          <p>User</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div>
@endsection
