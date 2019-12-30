<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <title>Si Molek Dokumentasi | Upload</title>
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
    <h3 class="c-green">
        Upload Foto Kegiatan
    </h3>
    <div class="container">
        
        
        <!-- Foto -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ambiFoto">
        Foto
        </button>
        <div class="modal" id="ambiFoto">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upload Foto Dokumentasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{route('upload.foto.proses')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                        <h6 class="c-green">Ambil Foto</h6>
                        <div class="image-upload">
                            <label for="file-input">
                                <img src="{{asset('assets/image/default-foto.png')}}" width="100"/>
                            </label>

                            <input id="file-input" type="file" name="foto_dokumentasi" accept="image/png,image/jpeg,image/*"/> <br><br>
                        </div>
            
                        <button class="mt-3">Upload</button> 
                    
                       
                    </form>        
                </div>

                </div>
            </div>
        </div>



    </div>

    
</div>




<script src="{{asset('assets/bootstrap/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>
<style>
.image-upload>input {
  display: none;
}
</style>