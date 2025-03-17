@extends('frontend.layouts.master')
@section('title','Mrs. Mom Event - Blogs')
@section('description', 'The event ‘’Mrs. Mom 2023’’ took place at the four vivacious cities, namely Hyderabad, Bangalore, Chennai, and Vizag.')
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading1 text-center">
                    <h1>Our Blog</h1>
                    <!--<div class="breadcrub-a">
                        <a href="index.html">
                            Home
                            <i class="fa-solid fa-angle-right"></i>
                            <span>About Us</span>
                        </a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== BLOG AREA STARTS =======-->
<div class="blog1-section-area sp2">
    <div class="container">
        <div class="row">
            @foreach($data['blog_list'] as $blog)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="{{ 800 + ($loop->index * 200) }}">
                <div class="blog1-auhtor-boxarea">
                    <a href="{{ url('blog/'.$blog->slug) }}">
                        <div class="blog-item">
                            <div class="img1 image-anime">
                                <img src="{{ asset('storage/blog-img/' . $blog->intro_image) }}" alt="{{ $blog->title }}" loading="lazy"/>
                            </div>
                        </div>
                    </a>
                    <div class="content-area">

                        <a href="{{ url('blog/'.$blog->slug) }}">
                            {{ $blog->title }}
                        </a>
                        <div class="space20"></div>
                        <div class="btn-area1">
                            <a href="{{ url('blog/'.$blog->slug) }}" class="vl-btn2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--===== BLOG AREA ENDS =======-->
@endsection