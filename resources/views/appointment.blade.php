@extends('layouts.master')

@section('content')
<div class="bradcam_area breadcam_bg bradcam_overlay">
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="bradcam_text">
                <h3>List Priksa</h3>
                <p><a href="/">Home /</a> appointment</p>
            </div>
        </div>
    </div>
</div>
</div>
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="blog_left_sidebar">
                @foreach($appointments as $appointment)
                @if ($appointment->users_id == Auth::user()->id)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="img/blog/single_blog_7.jpg" alt="">
                            <a href="#" class="blog_item_date">
                                <h3> {{ date('d', strtotime($appointment->tanggal))}}</h3>
                                <p>{{ date('M', strtotime($appointment->tanggal))}}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                        <a class="d-inline-block" href="periksa/{{$appointment->id}}">
                                <h2>Nama Pasien : {{$appointment->nama}}</h2>
                            </a>
                            <p>No. Telp : {{$appointment->telp}}</p>
                        </div>
                    </article>
                @endif
                @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
