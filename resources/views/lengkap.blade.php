@extends('layouts.user')
@section('content')
<?php
  $q = \App\Profile::where('id', 1)->first();
?>
 <form enctype="multipart/form-data">
  <section id="subscribe" style="background: url({{asset('images/'.$q->gambar_about)}}) center center no-repeat;">
      <div class="container wow fadeInUp">
         <br>
          <br>
           <br>
        <div class="section-header">
          <h2>Detail Berita</h2>
         
        </div>
 
 
      </div>
    </section>
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
       
        <div class="row">
          <div class="col-md-6">
            <img src="{{asset('images/'.$baca->foto)}}" alt="Speaker 1" class="img-fluid">
          </div>
 
          <div class="col-md-6">
            <div class="details">
              <h2>{{$baca->judul}}</h2>
              <p> {!!$baca->isi!!}</p>
            <b><h10>Penulis : {{$baca->penulis}}, {{$baca->created_at}}</h10></b>
           
            </div>
          </div>
         
        </div>
      </div>
</form>
    </section>
            <!-- End blog-posts Area -->
           
@endsection