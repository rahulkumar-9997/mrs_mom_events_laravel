@extends('frontend.layouts.master')
@section('title','Event for pregnant women - Mrs. Mom Event')
@section('description', 'An empowering and nurturing event exclusively designed for pregnant women, offering a wealth of knowledge and support.')
<!-- @section('keywords', 'sharing, sharing text, text, sharing photo, photo,') -->
@section('main-content')
@include('frontend.layouts.banner-top')
<!--===== ABOUT AREA STARTS =======-->
<div class="about1-section-area sp1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-imges">
                    <div class="img1 reveal image-anime">
                        <img src="{{asset('fronted/assets/mrs-mom-img/about-one.jpeg')}}" alt="" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{asset('fronted/assets/mrs-mom-img/about-two.jpg')}}" alt="" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="space30"></div>
                            <div class="img1 reveal image-anime">
                                <img src="{{asset('fronted/assets/mrs-mom-img/about-three.jpeg')}}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="about-btnarea">
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 200 200" fill="none" class="keyframe5">
                            <path
                                d="M93.8771 2.53621C96.8982 1.28483 98.4087 0.659138 100 0.659138C101.591 0.659138 103.102 1.28483 106.123 2.5362L164.588 26.7531C167.609 28.0045 169.119 28.6302 170.245 29.7554C171.37 30.8806 171.995 32.3912 173.247 35.4123L197.464 93.8771C198.715 96.8982 199.341 98.4087 199.341 100C199.341 101.591 198.715 103.102 197.464 106.123L173.247 164.588C171.995 167.609 171.37 169.119 170.245 170.245C169.119 171.37 167.609 171.995 164.588 173.247L106.123 197.464C103.102 198.715 101.591 199.341 100 199.341C98.4087 199.341 96.8982 198.715 93.8771 197.464L35.4123 173.247C32.3912 171.995 30.8806 171.37 29.7554 170.245C28.6302 169.119 28.0045 167.609 26.7531 164.588L2.53621 106.123C1.28483 103.102 0.659138 101.591 0.659138 100C0.659138 98.4087 1.28483 96.8982 2.5362 93.8771L26.7531 35.4123C28.0045 32.3912 28.6302 30.8806 29.7554 29.7554C30.8806 28.6302 32.3912 28.0045 35.4123 26.7531L93.8771 2.53621Z"
                                fill="#5d009d" />
                        </svg>
                        
                        <a href="https://www.youtube.com/watch?v=efA8F-FJz74" class="popup-youtube">
                            <span><i class="fa-solid fa-circle-play"></i></span>
                            <br />
                            <div class="space12"></div>
                            View More
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-header-area heading2">
                    <h5 data-aos="fade-left" data-aos-duration="800">about event</h5>
                    <div class="space16"></div>
                    <h2 class="text-anime-style-3">India’s Only Health
                        Pageant for to be Mother</h2>
                    <div class="space16"></div>
                    <p data-aos="fade-left" data-aos-duration="900">The event focuses on various wellness and educational pursuits that can be included into pregnancy and infant care. These include teaching sustainability, undertaking cooking classes, fostering spiritual well-being, offering free dental and medical screenings, personality development workshops, and planning mom’s makeover. In order to secure the best outcomes for both mother and child, it highlights the significance of teaching parents about pregnancy and child care.</p>
                    <div class="space32"></div>
                    <div class="about-auhtor-box" data-aos="fade-left" data-aos-duration="1000">
                        <div class="icons">
                            <img src="{{asset('fronted/assets/img/icons/about-icon1.svg')}}" alt="" />
                        </div>
                        <div class="text">
                            <a href="#">Elegance in Motherhood</a>
                            <div class="space12"></div>
                            <p>Embrace the beauty of pregnancy with our exclusive beauty pageant for moms-to-be. Celebrate confidence, grace, and the radiant journey of motherhood in a glamorous and empowering way!</p>
                        </div>
                    </div>
                    <div class="space20"></div>
                    <div class="about-auhtor-box" data-aos="fade-left" data-aos-duration="1100">
                        <div class="icons">
                            <img src="{{asset('fronted/assets/img/icons/about-icon2.svg')}}" alt="" />
                        </div>
                        <div class="text">
                            <a href="#">A Beautiful Journey of Parenthood</a>
                            <div class="space12"></div>
                            <p>Pregnant couples deserve 360° holistic care, making their journey of pregnancy truly special. Our beauty pageant celebrates this transformative phase with elegance, confidence, and joy.</p>
                        </div>
                    </div>
                    <div class="space32"></div>
                    <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
                        <a href="{{ route('about-us') }}" class="vl-btn1">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== ABOUT AREA ENDS =======-->
<div class="testimonials1-section-area sptwo">
    <!-- <div class="testimonial-img2">
        <img class="youtube-thumbnail" src="{{asset('fronted/assets/mrs-mom-img/director.webp')}}" alt="about us" loading="lazy"/>
    </div> -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="testimonial-header heading2">
                    <h2 class="text-anime-style-3">Director of Mrs. Mom</h2>
                </div>
                <div class="space32"></div>
                <div class="about-us-home">
                    <p>
                    As an obstetrician and gynaecologist practising <strong>since 20 years</strong> and as a woman I have seen and personally experienced transformation in my life happen when I changed towards sustainability, organic living, wellness based concepts and incorporating healthy living habits. I have decided to promote these core concepts for the good that they bring into the lives of pregnant women. These concepts help achieve healthy pregnancy as well as promote normal delivery and healthy future living. What is missing in the nuclear family concept we are incorporating and promoting the necessary training to fill this vacuum. My story was my game changer and it’s the way Mrs Mom was conceptualized. The effects of today’s lifestyle on human reproduction and its outcomes need serious reform.
                    </p>
                    <p>
                    After 5 yrs of marriage and fertility issues for <strong>3 yrs</strong> culminating in <strong>IVF</strong> treatment at <strong>34 yrs</strong> of age, I conceived with twin pregnancy successfully but it landed into preterm labor at <strong>26 weeks</strong> and it’s roller coaster outcomes because of the impact of stress and lifestyle. As a family me and my husband Pramod then decided to changed our lifestyle to sustainable healthy lifestyle focusing on organic food and holistic concepts. The health benefits are enormous and very encouraging and I had a spontaneous pregnancy at <strong>38 years</strong> of age and a full term uneventful delivery. After the birth of my son Avi in 2016 I decided to bring this change into everyone’s life and teach healthy living to everyone planning pregnancy and pregnant couples. This is the story and the beginning of Mrs Mom – an event aimed at “change for good ”
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-mg">
                    <div class="video-play-btn">
                        <a href="https://www.youtube.com/watch?v=OCFdVMApDko" class="popup-youtube"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
                                <path d="M19.5185 11.1463L1.52146 0.147702C1.36988 0.0550624 1.19634 0.0044781 1.01872 0.0011519C0.8411 -0.00217431 0.665798 0.041878 0.510849 0.128777C0.3559 0.215677 0.226898 0.342285 0.137113 0.495581C0.0473273 0.648876 8.00178e-08 0.823322 0 1.00098V22.9981C8.00178e-08 23.1758 0.0473273 23.3502 0.137113 23.5035C0.226898 23.6568 0.3559 23.7834 0.510849 23.8703C0.665798 23.9572 0.8411 24.0013 1.01872 23.998C1.19634 23.9946 1.36988 23.944 1.52146 23.8514L19.5185 12.8528C19.6647 12.7635 19.7855 12.6381 19.8693 12.4887C19.9531 12.3393 19.9971 12.1709 19.9971 11.9996C19.9971 11.8282 19.9531 11.6598 19.8693 11.5104C19.7855 11.361 19.6647 11.2356 19.5185 11.1463Z" fill="#1A1719" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== MEMORY AREA STARTS =======-->
@if(!empty($data['home_carousel']) && $data['home_carousel']->count() > 0)
    <div class="memory1-section-area sp1">
        <div class="container">
            <!--<div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="memory-header text-center heading2 space-margin60">
                        <h5 data-aos="fade-left" data-aos-duration="800">last year memory</h5>
                        <div class="space16"></div>
                        <h2 class="text-anime-style-3">Recent Memories 2024</h2>
                    </div>
                </div>
            </div>-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="memory-slider-area owl-carousel">
                        @foreach($data['home_carousel'] as $home_carousel_row)
                            <div class="memory-boxarea">
                                <a class="lightbox" title="title" data-fancybox="home-carousel-img" data-caption="" href="{{ asset('storage/home-slider/' . $home_carousel_row->image_path) }}">
                                    <div class="img1 image-anime">
                                    
                                        <img src="{{ asset('storage/home-slider/' . $home_carousel_row->image_path) }}" alt="home carousel" loading="lazy"/>
                                    </div>
                                </a>
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!--===== MEMORY AREA ENDS =======-->
<!--===== BLOG AREA STARTS =======-->
@if(!empty($data['blog_list']) && $data['blog_list']->count() > 0)
<div class="blog-sectopn-home blog1-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="blog-header text-center heading2 space-margin60">
                    <h5 data-aos="fade-left" data-aos-duration="900">News & updates</h5>
                    <div class="space10"></div>
                    <h2 class="text-anime-style-3">Our Latest Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data['blog_list'] as $blog)
            <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="{{ 800 + ($loop->index * 200) }}">
                <div class="blog1-auhtor-boxarea">
                    <a href="{{ url('blog/'.$blog->slug) }}">
                        <div class="blog-item">
                            <div class="img1 image-anime">
                                <img src="{{ asset('storage/blog-img/' . $blog->intro_image) }}" alt="{{ $blog->title }}" loading="lazy" />
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
@endif
<!--===== BLOG AREA ENDS =======-->

@endsection