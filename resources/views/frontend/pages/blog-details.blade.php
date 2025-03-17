@extends('frontend.layouts.master')
@section('title', $blog->title . ' - Dr. K Shilpireddy')
@section('description', substr($blog->intro_description, 0, 70))
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>{{ $blog->title }}</h1>
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
<div class="blog-details-section sp8">
    <div class="container">
        <div class="row de-flex justify-content-md-center">
            <div class="col-lg-8">
                <div class="blog-deatils-content heading2">
                    <div class="img1">
                        <a class="lightbox" title="{{ $blog->title }}" data-fancybox="intro-img" data-caption="" href="{{ asset('storage/blog-img/' . $blog->intro_image) }}">
                            <img src="{{ asset('storage/blog-img/' . $blog->intro_image) }}" alt="{{ $blog->title }}" loading="lazy"/>
                        </a>
                    </div>
                    @if($blog->blog_intro_head)
                        <div class="space18"></div>
                        <h1>{!! $blog->blog_intro_head !!}</h1>
                    @endif
                    <div class="space16"></div>
                    <div class="blog-details">
                        {!! $blog->blog_description !!}
                    </div>
                    <div class="space48"></div>
                    @if ($blog->images->isNotEmpty())
                        <div class="blog-img-area">
                            <div class="row">
                                @foreach ($blog->images as $image)
                                    <div class="col-lg-6 col-md-6 mb10">
                                        <a class="lightbox" title="{{ $blog->title }}" data-fancybox="images-1" data-caption="" href="{{ asset('storage/blog-img/' . $image->blog_image) }}">
                                            <div class="img1 image-anime">
                                                <img src="{{ asset('storage/blog-img/' . $image->blog_image) }}" alt="{{ $blog->title }}" loading="lazy"/>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>   
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== BLOG AREA ENDS =======-->
@endsection