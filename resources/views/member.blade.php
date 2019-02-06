@extends('layouts.user')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<style type="text/css">
  .bulat{
border-radius:100em;
opacity:1;
width:200px;
height:200px;
}
</style>
<?php
  $q = \App\Profile::where('id', 1)->first();
?>
 <section id="subscribe" style="background: url({{asset('images/'.$q->gambar_about)}}) center center no-repeat;">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>
            <br>
            <br>
              Cari Member
          </h2>
        </div>

          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Masukkan No Identitas" name="nama" id="data">
            </div>
            <div class="col-auto">
              <button class="btn btn-primary" id="submit">Cari</button>
            </div>
          </div>
      </div>
    </section>

    {{-- AWAL JAVASCRIPT --}}
    <script type="text/javascript">
     $(document).ready(function() {
      $('#submit').click(function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var id = document.getElementById('data').value;
          $.ajax({
               type:"GET",
               url:"search2/" + id,
               success : function(results) {
                if (results.no_identitas) {
                  document.getElementById('nama').innerHTML =
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : '+results.nama+'">';
                  document.getElementById('alamat').innerHTML =
                      '<label></label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   : '+results.alamat+'">';
                  document.getElementById('no_identitas').innerHTML =
                      '<label></label>' +
                      '<input class="form-control" type="text" readonly style="background-color:#fff;" value="No Identitas   : '+results.no_identitas+'">';
                  document.getElementById('gambar').innerHTML =
                      '<img src="images/'+results.foto+' "class="bulat2" style="width:20%;"/>';
                    $(document).ready(function(){
                     
                              $('#modal-kotak , #bg').fadeIn("slow");
                               
                          $('#tombol-tutup').click(function(){
                            $('#modal-kotak , #bg').fadeOut("slow");
                          });
                        });
                    }else{
                      document.getElementById('nama23').innerHTML =
                      '<label><i class="fa fa-times"></i> Data Tidak Ditemukan</label>';
                        $(document).ready(function(){
                              $('#modal-kotak2 , #bg').fadeIn("slow");
                          $('#tombol-tutup2').click(function(){
                            $('#modal-kotak2 , #bg').fadeOut("slow");
                          });
                        });
                    }
               }
          }); 
      });
  }); 
  </script>
    {{-- AKHIR JAVASCRIPT --}}
    {{-- AWAL MODAL --}}
  <div class="container" id="modal-kotak">
    <div>
     
      <div class="modal-body">
          <center>
          <div id="gambar"></div>
          </center>
          <center>
          <div class="col-md-6">
          <div id="nama"></div>
          <div id="alamat"></div>
          <div id="no_identitas"></div>
          <div id="bawah">
            <button id="tombol-tutup" class="btn btn-primary">Tutup</button>
          </div>
          </div>
          </center>
      </div>
    </div>
  </div>
  <div id="bg"></div>
  <div class="container" id="modal-kotak2">
    <div id="atas">
      <center>
      <div hidden="true" id="nama23"></div>
      <button id="tombol-tutup2" class="btn btn-danger" aria-label="Close"><i class="fa fa-times"></i> Data Tidak Ditemukan</button>
      </div>
      </center>
    </div>
  </div>
    {{-- AKHIR MODAL --}}

<section id="hotels" class="section-with-bg wow fadeInUp">
 <h2 class="text-center">Koordinasi Wilayah</h2>
      <div class="container">
   
 
        <div class="row">
              <?php
                  $kiwil = \App\Korwil::all();
               ?>
             
               @foreach($kiwil as $key)
 
          <div class="col-sm-2 col-md-6">
         
              <div class="hotel-img">
                 <br>
              <center>
                <img src="{{ url('images/'.$key->logo)}}" alt="Hotel 1" class="bulat">
                </center>
               
              </div>
              <center>
              <input type="text" name="q" class="btn btn-danger" value="{{$key->nama}}" readonly style="border-radius: 100em; width: 100%">
              </center>
                <?php
            $km = App\Korwilmember::where('idkorwil',$key->id)->get();
        ?>
              <div class="justify-center">
              <br>
             <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Kode</th>
      <th scope="col">Logo</th>
      <th scope="col">Korwil Member</th>
    </tr>
  </thead>
  <tbody>
      @foreach($km as $kw)
    <tr>
      <td>{{$kw->kode}}</td>
      <td><img src="{{ url('images/'.$kw->logo)}}" style="width: 35px; height: 20px;"></td>
      <td>{{$kw->nama}}</td>
      @endforeach
    </tr>
  </tbody>
</table>
          </div>
        </div>
 
 
 
          @endforeach
 
        </div>
      </div>
</section>
<style type="text/css">
  body{
  background: #ecf0f1;
  font-family: sans-serif;
  font-size: 11pt;
}
#modal-kotak{
  position:sticky;
  width: auto;
  bottom: 200px;
  z-index:1002;
  display: none;
  background: white;  
  border-radius: 10px;
}
#modal-kotak2{
  position:relative;
  bottom: 200px;
  width: 70%;
  z-index:1002;
  display: none;
  background: white;
  border-radius: 10px;
}
#atas{
  font-size: 15pt;
  padding: 20px;  
  height: 80%;
}
#bawah{
  background: #fff;
}
 
#tombol-tutup{
  margin-top: 10px;
}
#tombol-tutup2{
  margin-top: 10px;
  margin-left: 1%;
}
#tombol-tutup,#tombol{
  height: 30px;
  width: 100px;
  color: #fff;
  border: 0px;
}
#bg{
  opacity:.80;
  position: absolute;
  display: none;
  top: 0%;
  left: 0%;
  width: 100%;
  height: 100%;
  background-color: #000;
  z-index:1001;
  opacity: 0.8;
}
#tombol{
  background: #e74c3c;        
}
}
</style>
    </section>
    @endsection