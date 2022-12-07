@extends('master_admin')

@section('title', 'Tambah Kategori')

@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Kategori</h4>
       
        <form class="forms-sample" action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama Kategori</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputName1" placeholder="Masukkan nama kategori" name="nama">
          </div>
          
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
         
        </form>
      </div>
    </div>
  </div>

@endsection