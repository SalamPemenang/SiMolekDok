<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
  <title>Si Molek Dokumentasi View</title>
</head>
<body style="background-color: #AEDBC6">
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
      <h3 class="c-green">{{$dok->nama_sub_kegiatan}}</h3>
      @if(e($dok->video_dokumentasi) == null)
      <form action="{{route('upload.proses', $dok->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <a>
          <p class="dot">
            <br><br>
            <label for="file-input-video-1">
              &#10010; Tambah Video 
            </label>
            <br><br>
          </p>
        </a>
        <input onchange="this.form.submit();" class="none" id="file-input-video-1" type="file" name="video_dokumentasi" accept="video/mp4,video/x-m4v,video/*"/> 
      </form>
      @else
      <center>
        <p class="c-green">
          Dokumentasi Video
          <button class="btn-add">
            <form action="{{route('upload.proses', $dok->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <center>
                <label for="file-input-video-2">
                  <img src="/assets/video/logo-video.png" width="20">
                </label>
              </center>
              <input onchange="this.form.submit();" class="none" id="file-input-video-2" type="file" name="video_dokumentasi" accept="video/mp4,video/x-m4v,video/*"/>  
            </form>
          </button>
        </p>
      </center>
      <video class="image-card" controls>
        <source src="{{'/assets/video/'. $dok->video_dokumentasi}}" type="video/mp4">
        </video>
        @endif
      </div>
      <br><br><br>
      <div class="container">
        <center>
          <p class="c-green">Dokumentasi Foto 
            <button class="btn-add">
              <center>
                <form action="{{route('upload.foto.proses', $dok->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <label for="file-input-foto">
                    <img src="/assets/image/add-img.png" width="23">
                  </label>
                  <input class="none" onchange="this.form.submit();" id="file-input-foto" type="file" name="foto_dokumentasi" accept="image/png,image/jpeg,image/*"/> <br><br>
                </form> 
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

    <script src="{{asset('assets/bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

  </body>
  </html>
  <script type="text/javascript">

  </script>