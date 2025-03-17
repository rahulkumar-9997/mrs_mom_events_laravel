@extends('frontend.layouts.master')
@section('title','Mrs. Mom Event - Gallery')
@section('description', 'Capturing the radiant moments and cherished memories of our event for pregnant women through a captivating gallery.')
<!-- @section('keywords', 'DR. Shilpi reddy, The Education, Work experiences, photo,') -->
@section('main-content')
<div class="inner-page-header inner-page-header-bg breadcrub-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="heading1 text-center">
                    <h1>Gallery</h1>
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
@if (isset($data['gallery_category_list']) && $data['gallery_category_list']->count() > 0)
    <div class="event3-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="gallery-button space-margin60">
                        <ul class="nav nav-pills gallery-pills">
                            @foreach($data['gallery_category_list'] as $index => $gallery_category_row)
                                <li class="nav-item">
                                    <a
                                    href="javascript:void(0);"
                                    class="nav-link {{ $index == 0 ? 'active' : '' }}"
                                    data-id="{{ $gallery_category_row->id }}">
                                        {{ $gallery_category_row->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="gallery_content">
                        @if(isset($data['gallery_category_list'][0]))
                            @include('frontend.pages.partials.gallery-image', [
                                'category_id' => $data['gallery_category_list'][0]->id
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!--===== EVENT AREA ENDS =======-->
@endsection
@push('scripts')
<script>
    var galleryCategoryUrl = "{{ url('gallery-cate-image') }}";
</script>
<script src="{{asset('fronted/assets/js/gallery-category.js') }}"></script>
@endpush