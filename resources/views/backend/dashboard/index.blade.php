@extends('backend.layouts.master')
@section('title','Dashboard')
@section('main-content')
{{--@dd(Auth::check());--}}
    <section id="main-content" class=" ">
        <section class="wrapper main-wrapper" style=''>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                <div class="page-title">
                    <div class="pull-left">
                        <h1 class="title">Dashboard</h1>   
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
                <div class="col-lg-12">
                    <section class="box nobox">
                        <div class="content-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-file icon-md icon-rounded icon-primary'></i>
                                        <div class="stats">
                                            <h4><strong>{{$data['feature_logo_list']}}</strong></h4>
                                            <span>Feature Logo</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-user icon-md icon-rounded icon-orange'></i>
                                        <div class="stats">
                                            <h4><strong>{{$data['testimonials_list']}}</strong></h4>
                                            <span>Testimonials</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-star icon-md icon-rounded icon-purple'></i>
                                        <div class="stats">
                                            <h4><strong>{{$data['our_work_list']}}</strong></h4>
                                            <span>Our Work</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-envelope-o icon-md icon-rounded icon-warning'></i>
                                        <div class="stats">
                                            <h4><strong>{{$data['media_image_list']}}</strong></h4>
                                            <span>Media</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="r4_counter db_box">
                                        <i class='pull-left fa fa-heart icon-md icon-rounded icon-warning'></i>
                                        <div class="stats">
                                            <h4><strong>{{$data['ibucare_list']}}</strong></h4>
                                            <span>IBU Care</span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </section>
                </div>
            </section>
        </section>
@endsection