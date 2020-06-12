@extends('layouts.master')

@section('content')
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_left_sidebar">
                    <article class="blog_item">
                        <div class="blog_item_img">
                            {{-- <img class="card-img rounded-0 mx-5 my-5" src="img/blog/single_blog_1.png" alt=""> --}}
                            <div class="card-img rounded-0 mx-5 my-5 text-center">{!! QrCode::size(500)->generate($appointment->qrcode); !!}</div>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="periksa/{{$appointment->id}}">
                                    <h2>Nama Pasien : {{$appointment->nama}}</h2>
                                </a>
                                <p>No. Telp : {{$appointment->telp}}</p>
                            </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
