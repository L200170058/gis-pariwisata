@extends('layouts.frontend')
@section('content')
<!-- ======= Contact Section ======= -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>GIS-PEMETAAN WISATA KABUPATEN KLATEN</h2>
            </div>
          </div>
        </div>
        Adalah Sebuah Website yang menyediakan sebaran lokasi objek wisata di KABUPATEN KLATEN dengan memanfaatkan library leaflet. <br>
        Web ini dilengkapi dengan foto dan titik lokasi wisata sehingga pengunjung bisa langsung di arahkan ke tempat wisata fengan bantuan google Maps. <br><br><br>

        Website ini dibuat dan dikelola oleh : <br>
        <div class="row">
        </div>
        <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="{{ asset('bluesky')}}/sidiq.jpg" width="300px" height="100px" frameborder="0" style="border:0"">
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                          <i class="fa fa-mobile"></i>
                          <p>
                            Call: +6285155193511<br>
                          </p>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                          <i class="fa fa-envelope-o"></i>
                          <p>
                            Email: sidiqzainudin47.com<br>
                          </p>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="contact-icon text-center">
                        <div class="single-icon">
                          <i class="fa fa-map-marker"></i>
                          <p>
                            Alamat: Juwiring, Klaten<br>
                          </p>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection