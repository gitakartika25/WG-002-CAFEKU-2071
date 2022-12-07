@extends('master_admin')

@section('title', 'dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Form Pesanan</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('dashboard.store', []) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Nama</label>
                                <input type="text" class="form-control" id="" name="nama"
                                    placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Pesanan</label>
                                <div></div>
                                <select class="form-select" name="order[]" multiple aria-label="multiple select example">
                                    <option value="50000">Cappucino</option>
                                    <option value="50000">Americano</option>
                                    <option value="50000">V60</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="member">Member</option>
                                    <option value="biasa">Biasa</option>
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @isset($data)
                            {{-- <hr> --}}
                            <div class="row">
                                <div class="col">
                                    Nama :
                                </div>
                                <div class="col">
                                    {{ $data['nama'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Jumlah Pesanan :
                                </div>
                                <div class="col">
                                    {{ $data['jumlahorder'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Total Pesanan :
                                </div>
                                <div class="col">
                                    {{ $data['totalpesanan'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Status :
                                </div>
                                <div class="col">
                                    {{ $data['status'] }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    Diskon :
                                </div>
                                <div class="col">
                                    {{ $data['diskon'] }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Total Pembayaran :
                                </div>
                                <div class="col">
                                    {{ $data['totalpembayaran'] }}
                                </div>
                            </div>
                            <hr>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
