@extends('layouts.user')
@section('content')
 <!--==========================
      Speakers Section
    ============================-->
    <style type="text/css">
      
      .tengah{
        margin-left: auto;
        margin-right: auto;
      }
    </style>
    <?php
  $q = \App\Profile::where('id', 1)->first();
?>
    <section id="subscribe" style="background: url({{asset('images/'.$q->gambar_about)}}) center center no-repeat;">
      <div class="container wow fadeInUp">
         <br>
          <br>
           <br>
        <div class="section-header">
          <h2>Berita Kami</h2>
        </div>


      </div>
    </section>
    <section id="speakers" class="wow fadeInUp">
      <div class="container">

        <div class="row">
            <?php
           $berita = \App\Berita::latest()->paginate(env('PER_PAGE'));

        ?>
        @foreach($berita as $br)
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <img src="{{asset('images/'.$br->foto)}}" alt="Speaker 1"  class="img-fluid" style="width: 100%; height: 300px;">
              <div class="details">
                <h3><a href="{{url('berita-detail/'.$br->id)}}">{!!str_limit(strip_tags($br->judul), 10) !!}</a></h3>
                <p>{!!str_limit(strip_tags($br->isi), 100) !!}</p>
              </div>
            </div>
          </div>
          <!-- END FOREACH BERITA  -->

         
         @endforeach
  <div class="tengah"> 
        {!! $s->render() !!}
      </div>
        </div>
     
      </div>

    </section>
	
			<!-- End blog-posts Area -->
			
@endsection