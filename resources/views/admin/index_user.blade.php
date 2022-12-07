@extends('master_admin')

@section('title', 'Data User')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data User</h4>
        <a class="btn btn-primary" href="{{ route('user.create') }}">Tambah User</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  No
                </th>
                <th>
                  Nama 
                </th>
                <th>
                  Email
                </th>
                <th>
                  Role
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach($user as $u)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role->nama }}</td>
              
                <td>
                    <a href="/user/edit/{{ $u->id }}" class="btn btn-primary">Edit</a>
                    <a href="/deleteuser/{{ $u->id }}" class="btn btn-danger">Delete</a>
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