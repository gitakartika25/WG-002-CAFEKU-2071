@extends('master_user')

@section('title', 'Home')

@section('content')

{{-- {{ print_r($menu) }} --}}

    {{-- <div class="owl-carousel owl-single px-0">
  

</div> --}}

<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2>CafeKu <strong class="text-primary">Menu</strong></h2>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap d-flex">
            <div class="nonloop-block-3 owl-carousel">
                @foreach ($data as $m)
                <div class="card col-md-12 text-center item mb-3 item-v2 px-auto mx-0 " >
                    {{-- <form action="{{ url('detailproduk/' . $m->id) }}" method="POST" enctype="multipart/form-data"> --}}
                        @method('put')
                        <span class="onsale"></span>
                        <a href=""><img src="{{ asset('storage/' . $m->foto) }}"
                                style="width: 100%" class="card-img-top"></a>
                        <div class="card-body">
                            <h3 class="text-dark"><a
                                    href=""></a>{{ $m->nama }}</h3>
                            <p class="price"> Rp{{ $m->harga}}</p>
                            <a href="" class="btn btn-primary">{{ $m->keterangan }}</a>
                        </div>
                    {{-- </form> --}}
                </div>
            @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>



@endsection
