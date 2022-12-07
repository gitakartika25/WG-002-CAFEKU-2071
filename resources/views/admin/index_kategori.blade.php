@extends('master_admin')

@section('title', 'kategori')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Kategori</h4>
        <a class="btn btn-primary" href="{{ route('kategori.create') }}">Tambah Kategori</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama Kategori
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach($kategori as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>
                    <a href="/kategori/edit/{{ $p->id }}" class="btn btn-primary">Edit</a>
                    <a href="/deletekategori/{{ $p->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection