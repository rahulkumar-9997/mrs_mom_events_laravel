@extends('frontend.layouts.master')
@section('title','Mrs. Mom Event - Sponsorship')
@section('description', 'Join us as a sponsor for an engaging and educational event, offering pregnant women a fun-filled experience while supporting their journey.')
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading1 text-center">
                    <h1>Sponsorship</h1>
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
<div class="choose-section-area sp2 sponsorship-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h2>Sponsorship Oppourtunities</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <ul class="sponsorship-list">
                    <li>Name and Logo as Title Sponsor to be displayed on all panels, promotional collaterals, banners, pre/during and after event</li>
                    <li>Title sponsor brochures/flyers will be kept at the visitor registration counter</li>
                    <li>Complimentary 48 sq.m stall raw space on exhibit floor Exclusive logo visibility on the homepage of the event</li>
                    <li>Website visibility</li>
                    <li>Logo in emails that go to our database</li>
                    <li>Branding at locations onsite</li>
                    <li>Publicity with prominent display of logo in newspaper ads where other sponsors are also acknowledged</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="sponsorship-list">
                    <li>Acknowledgement as title sponsor in FM advertisements</li>
                    <li>Invitation to the curtain raiser press meet</li>
                    <li>Promotional video on stage backdrop</li>
                    <li>Logo on the exhibition invitation cards sent to the industry people</li>
                    <li>Logo will be displayed on the conference backdrop</li>
                    <li>Speaking opportunity at the relevant conference session</li>
                    <li>Sponsor’s listing will be included in the Post Show Report</li>                    
                </ul>
            </div>
        </div>
    </div>
</div>
<!--===== OTHERS AREA STARTS =======-->
@if (isset($data['proud_associates']) && $data['proud_associates']->count() > 0)
<div class="brands3-section-area sp2 proud-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">

                <div class="heading2 text-center space-margin30">
                    <h2>Our Proud Associates</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" data-aos="zoom-in" data-aos-duration="800">
                <div class="brand-slider-area owl-carousel">
                    @foreach ($data['proud_associates'] as $proud_associates_row)
                    <div class="brand-box">
                        <img src="{{ asset('storage/associates-img/' . $proud_associates_row->img_file) }}" alt="proud associates" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="padding-sp-b"></div>
@endif
<!--===== OTHERS AREA ENDS =======-->
@endsection
@push('scripts')

@endpush