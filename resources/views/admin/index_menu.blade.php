@extends('master_admin')

@section('title', 'Data Menu')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Menu</h4>
        <a class="btn btn-primary" href="{{ route('menu.create') }}">Tambah Menu</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama Menu
                </th>
                <th>
                  Foto
                </th>
                <th>
                  Kategori
                </th>
                <th>
                  Harga
                </th>
                <th>
                  Keterangan
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach($menu as $m)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $m->nama }}</td>
                <td class="py-1">
                  <img src="{{ asset('storage/' .$m->foto) }}" alt="image"/>
                </td>
                <td>
                    {{ $m->kategori->nama }}
                </td>
                <td>
                    {{ $m->harga }}
                </td>
                <td>
                    {{ $m->keterangan }}
                </td>

                <td>
                    <a href="menu/edit/{{ $m->id }}" class="btn btn-primary">Edit</a>
                    <a href="deletemenu/{{ $m->id }}" class="btn btn-danger">Delete</a>
                 
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