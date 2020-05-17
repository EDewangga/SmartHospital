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
                            <div class="card-img rounded-0 mx-5 my-5 text-center">{!! QrCode::size(500)->generate('MyNotePaper'); !!}</div>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="single-blog.html">
                                <h2>Google inks pact for new 35-storey office</h2>
                            </a>
                            <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
