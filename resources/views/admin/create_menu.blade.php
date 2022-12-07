@extends('master_admin')

@section('title', 'Create Menu')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambahkan Menu</h4>
       
        <form class="forms-sample" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Menu</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="" placeholder="Masukkan nama menu" name="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="" placeholder="Masukkan harga " name="harga">
          </div>
        
          <div class="form-group">
            <label for="exampleSelectGender">Kategori</label>
              <select class="form-control @error('kategori_id') is-invalid @enderror" id="exampleSelectGender" name="kategori_id">
                <option selected disabled value="">Pilih Kategori</option>
                @foreach($kategori as $k)
                <option value="{{ $k->id }}">{{ $k->nama}}</option>
                @endforeach
              </select>
            </div>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="file-upload-default @error('foto') is-invalid @enderror">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
         
          <div class="form-group">
            <label for="exampleTextarea1">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="exampleTextarea1" name="keterangan" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        
        </form>
      </div>
    </div>
  </div>

  @section('js')
      <!-- Plugin js for this page -->
   <script src="{{ asset('template/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
   <script src="{{ asset('template/vendors/select2/select2.min.js') }}"></script>
   <!-- End plugin js for this page -->
   <!-- inject:js -->
   <script src="{{ asset('template/js/off-canvas.js') }}"></script>
   <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
   <script src="{{ asset('template/js/template.js') }}"></script>
   <script src="{{ asset('template/js/settings.js') }}"></script>
   <script src="{{ asset('template/js/todolist.js') }}"></script>
   <!-- endinject -->
   <!-- Custom js for this page-->
   <script src="{{ asset('template/js/file-upload.js') }}"></script>
   <script src="{{ asset('template/js/typeahead.js') }}"></script>
   <script src="{{ asset('template/js/select2.js') }}"></script>
   <!-- End custom js for this page-->
  @endsection
@endsection