@extends('frontend.layouts.master')
@section('title','Mrs. Mom Event - Media')
@section('description', 'Capturing the radiant moments and cherished memories of our event for pregnant women through a captivating gallery.')
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading1 text-center">
                    <h1>Media</h1>
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
<!--===== EVENT AREA STARTS =======-->
<div class="event3-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="event-widget-area gallery-tab-widget">
                            @if (isset($data['media_youtube_list']) && $data['media_youtube_list']->count() > 0)
                                <div class="youtube_section">
                                    <div class="video-ifram">
                                        <div class="row de-flex justify-content-md-center">
                                        @foreach ($data['media_youtube_list'] as $youtube_link)
                                            <div class="col-lg-6">
                                                <div class="media-youtube-section">
                                                    <div class="media-youtube">
                                                        <iframe class="media-frame" 
                                                            frameborder="0" 
                                                            allowfullscreen 
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                                            referrerpolicy="strict-origin-when-cross-origin" 
                                                            title="{{ $youtube_link->title ?? '' }}" 
                                                            
                                                            src="{{ $youtube_link->youtube_link }}?controls=1&rel=0&playsinline=0&modestbranding=0&autoplay=0&enablejsapi=1" 
                                                            id="widget2">
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (isset($data['media_image_list']) && $data['media_image_list']->count() > 0)
                                <div class="media-multiple-img">
                                    <div class="row grid-services">
                                        @foreach ($data['media_image_list'] as $media)
                                            <div class="col-lg-3 col-md-6 px-1 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                                                <figure>
                                                    <a class="lightbox" title="{{ $media->title }}" data-fancybox="media-img" data-caption="{{ $media->title }}" href="{{ asset('storage/media-img/' . $media->media_image) }}">
                                                        <img src="{{ asset('storage/media-img/' . $media->media_image) }}" alt="{{ $media->title }}" loading="lazy">
                                                    </a>
                                                </figure>
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
    </div>
</div>
<!--===== EVENT AREA ENDS =======-->
@endsection