<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
  <title>Si Molek Dokumentasi View</title>
</head>
<body>
  <div class="topnav">
    <div class="grid-container">
      <div class="item1">
        <a href="#" class="c-green fs-17">
          <strong>Si Molek Dokumentasi</strong>
        </a>
      </div>
      <div class="item3">
        <a href="#" class="c-green fs-30">
          &larr;
        </a>
      </div>  
      <div class="item4"></div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      @foreach($dok as $d)
      <h3 class="c-green">{{$d->nama_sub_kegiatan}}</h3>
      @if(e($d->video_dokumentasi) == null)
      <p class="dot">
        <br><br>
        &#10010; Tambah Video
        <br><br><br>
      </p>
      @else
      <center>
        <p class="c-green">
          Dokumentasi Video
          <button class="btn-add">
              <center>
                &#127909;
              </center>
          </button>
        </p>
      </center>
      <video class="image-card" controls>
        <source src="{{'/assets/video/'. $d->video_dokumentasi}}" type="video/mp4">
        </video>
        @endif
        @endforeach
      </div>
      <br><br><br>
      <div class="container">
        <center>
          <p class="c-green">Dokumentasi Foto 
            <button class="btn-add">
              <center>
                <img src="/assets/image/add-img.png" width="25">
              </center>
            </button>
          </p>
        </center>
        @foreach($foto as $f)
        <div class="ribbon image-card" style="background-image: url('{{'/assets/image/'. $f->foto_dokumentasi}}');">
          <div class="ribbon">
            <span class="ribbon4">{{$f->waktu_foto_dokumentasi}}</span>
          </div>
        </div>
        <br>
        <br>
        @endforeach
      </div>
      <br><br><br>
    </div>
  </body>
  </html>
