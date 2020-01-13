<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/load.css')}}">
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
    <h5 class="c-green">{{$dok->nama_sub_kegiatan}}</h5>
  </div>
  <div class="content">
    <div class="container">
      <span class="c-green">Dokumentasi Video</span>
      <button class="btn-add">
        <form id="addVideoForm1" action="{{route('upload.proses', $dok->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <center>
            <label for="file-input-video-1">
              <img src="/assets/video/logo-video.png" width="20">
            </label>
          </center>
          <input onchange="showFileModifiedVideo();" class="none" id="file-input-video-1" type="file" name="video_dokumentasi" accept="video/mp4"/>  
          <input type="hidden" name="lastmodifvideo" id="lastmodifvideo" value="">
        </form>
      </button>
      <div class="cssload-container" style="display: none;" id="load">
        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      </div>
    </div>
    <br>
    <div class="container" id="video-load">
      @if($dok->video_dokumentasi == null)
      <strong class="c-green">
        <center>Video Tidak ada!</center>
      </strong>
      @else
      <video class="image-card" controls>
        <source src="{!! asset('storage/videos/'. $dok->video_dokumentasi) !!}" type="video/mp4">
        </video>
        <center>{{$dok->waktu_video_dokumentasi}}</center>
        @endif
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <span class="c-green">
        Dokumentasi Foto     &nbsp;
      </span>
      <button class="btn-add">
        <form id="addFotoForm" action="{{route('upload.foto.proses', $dok->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <center>
            <label for="file-input-foto">
              <img src="/assets/image/add-img.png" width="20">
            </label>
          </center>
          <input onchange='showFileModified();' class="none" id="file-input-foto" type="file" name="foto_dokumentasi" accept="image/png,image/jpeg,image/*"/>  
          <input type="hidden" value="" id="lastmodif" name="lastmodif">
        </form>
      </button>
    </div>
    <br>
    <div class="container">
      @foreach($foto as $f)
      <div class="ribbon image-card" style="background-image: url('{{'/assets/image/'. $f->foto_dokumentasi}}');">
        <div class="ribbon">
          <span class="ribbon1">
            <span>&#128065; Lihat</span>
          </span>
          <span class="ribbon4">
            &#x2139; &nbsp;
          </span>

        </div>
      </div>
      <br>
      <br>
      @endforeach
    </div>
  </div>

  <script src="{{asset('assets/bootstrap/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

  <script type='text/javascript'>
    function showFileModified() {
      var input, file;

      input = document.getElementById('file-input-foto');
      file = input.files[0];
      console.log("The last modified date of file '" + file.name + "' is " + new Date(file.lastModified));
      document.getElementById('lastmodif').value = new Date(file.lastModified);
      document.getElementById('addFotoForm').submit();
    }

    function showFileModifiedVideo() {
      var input, file;

      input = document.getElementById('file-input-video-1');
      file = input.files[0];
      console.log("The last modified date of file '" + file.name + "' is " + new Date(file.lastModified));
      document.getElementById('lastmodifvideo').value = new Date(file.lastModified);
      document.getElementById('load').style.display = "block";
      document.getElementById('video-load').style.display = "none";
      document.getElementById('addVideoForm1').submit();
    }
  </script>

</body>
</html>
