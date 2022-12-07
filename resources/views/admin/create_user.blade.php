@extends('master_admin')

@section('title', 'Tambah User')

@section('content')


<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah User</h4>
       
        <form class="forms-sample" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" placeholder="Masukkan Nama" name="name">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputName1" placeholder="Masukkan Email" name="email">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputName1" placeholder="Masukkan Password" name="password">
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Role</label>
              <select class="form-control @error('role_id') is-invalid @enderror" id="exampleSelectGender" name="role_id">
                <option selected value="">Pilih Role</option>
                @foreach($role as $k)
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
              </select>
            </div>
        
         
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
         
        </form>
      </div>
    </div>
  </div>

@endsection