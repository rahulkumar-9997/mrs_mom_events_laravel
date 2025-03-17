@extends('frontend.layouts.master')
@section('title','Mrs. Mom Event - Contact Us')
@section('description', 'Contact us We are happy to help you Get in Touch Phone no. : 9503606049 Email : contact@drkshilpireddy.com DR K SHILPI REDDY FOUNDATION VILLA NO 77A RADHE SANCIA VILLAS OSMAN NAGAR TELLAPUR-502032 TELANGANA')
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading1 text-center">
                    <h1>Contact Us</h1>
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
<!--===== CONTACT AREA STARTS =======-->
<div class="contact-inner-section sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-us-title text-center padding-b20">
                    <h1 class="text-anime-style-3">We Are Happy to Help You</h1>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center location-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-boxarea aos-init aos-animate" data-aos="zoom-in" data-aos-duration="900">
                            <div class="icons">
                                <img src="{{asset('fronted/assets/img/icons/mail1.svg')}}" alt="">
                            </div>
                            <div class="text">
                                <h5>Our Email</h5>
                                <a href="maito:contact@drkshilpireddy.com">contact@drkshilpireddy.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="contact-boxarea aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="icons">
                                <img src="{{asset('fronted/assets/img/icons/phn1.svg')}}" alt="">
                            </div>
                            <div class="text">
                                <h5>Call/Message</h5>
                                <a href="tel:+919503606049">9503606049</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-boxarea aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                            <div class="icons">
                                <img src="{{asset('fronted/assets/img/icons/location1.svg')}}" alt="">
                            </div>
                            <div class="text">
                                <h5>Our Location</h5>
                                <a href="#">
                                    Dr. K. Shilpi Reddy Foundation Villa No. 77A Radhe Sancia Villas
                                    Osman Nagar Tellapur-502032 Telangana.

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000">
                <form action="{{ route('home-enquiry.store') }}" accept="multipart/form-data" method="post" id="enquiryForm">
                    @csrf
                    <div class="contact4-boxarea">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="input-area">
                                    <input type="text" placeholder="Name *" name="name" id="name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="input-area">
                                    <input type="text" placeholder="Phone *" name="phone_number" id="phone_number" />
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="input-area">
                                    <input type="email" placeholder="Email *" name="email" id="email" />
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="input-area">
                                    <input type="text" placeholder="Subjects" name="subject" id="subject" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <textarea placeholder="Message" name="message"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="space24"></div>
                                <div class="input-area text-end">
                                    <button type="submit" class="vl-btn1">Submit Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    <!--===== CONTACT AREA ENDS =======-->
    @endsection