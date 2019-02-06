@extends('layouts.user')
@section('content')
<!-- start banner Area -->

<?php
  $q = \App\Profile::where('id', 1)->first();

?>
<section id="intro"><img src="{{asset('images/'.$q->gambar_depan)}}" id="intro" style="background-size: cover;">
    <div class="intro-container wow fadeIn">
      <h3 class="mb-4 pb-0">{!!$q->pengantar1!!}</h3>
      <p class="mb-4 pb-0">
            {!!$q->pengantar3!!}
      </p>
      <h1>{!!$q->pengantar2!!}</h1>
      <a href="{{$q->linkyt}}" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">Selengkapnya</a>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about" style="background: url({{asset('images/'.$q->gambar_about)}}) center center no-repeat; background-size: cover;">
<?php
  $q = \App\Visimisi::where('id', 1)->first();

?>  
      <div class="container">
        <div class="row" style="margin-left: 10%;">
          <div class="col-lg-4">
            <h3>Riwayat</h3>
              <?php 
                  $history = \App\History::all();
               ?>
               @foreach($history as $v)
              <p>
                {!!$v->history!!}
              </p>
              @endforeach
          </div>
          <div class="col-lg-4">
            <h3>Visi</h3>
              <?php 
                  $visi = \App\Visimisi::all()->where('tipe',1);
               ?>
               @foreach($visi as $v)
              <p>
                {!!$v->isi!!}
              </p>
              @endforeach
          </div>
          <div class="col-lg-4">
            <h3>Misi</h3>
              <?php 
                  $misi = \App\Visimisi::all()->where('tipe',2);
               ?>
               @foreach($misi as $v)
              <p>
                {!!$v->isi!!}
              </p>
              @endforeach
          </div>
        </div>
      </div>
    </section>





       <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Galeri</h2>
          <p>Cek galeri terbaru kami disini</p>
        </div>
      </div>
      <?php
      $gallery = \App\Gallery::all();  
      ?>                               
      <div class="owl-carousel gallery-carousel">
         @foreach ($gallery as $n)
        <a href="{{ asset('images/'.$n->gambar) }}" class="venobox" data-gall="gallery-carousel"><img src="{{ asset('images/'.$n->gambar) }}" alt=""></a>
        @endforeach
      </div>
    </section>
      <!-- End latest-blog Area -->   

      <!-- Start gallery Area -->
    
@endsection