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
            <a href="#" class="c-green fs-20">
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
    @foreach($dok as $d)
    <h3 class="c-green">
        {{$d->nama_sub_kegiatan}}
    </h3>
    <div class="container">
        <img src="{{'/assets/video/'.$d->video_dokumentasi}}" class="image-card">
        <span>{{$d->waktu_video_dokumentasi}}</span>
    </div>
    @endforeach
    <br>
    <div class="container">
        @foreach($foto as $f)
            <div class="ribbon image-card" style="background-image: url('/assets/image/default-foto.png');">  
                <div class="ribbon">
                  <span class="ribbon4">{{$f->waktu_foto_dokumentasi}}</span>
              </div>
          </div>
        @endforeach

  </div>
</div>

</body>
</html>
