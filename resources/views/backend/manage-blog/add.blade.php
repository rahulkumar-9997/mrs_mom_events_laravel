@extends('backend.layouts.master') 
@section('title','Add new blog') 
@section('main-content') 
{{--@dd(Auth::check());--}}
@section('morecss')
<link href="{{asset('backend/assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/ios-switch/css/switch.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/datepicker/css/datepicker.css')}}" rel="stylesheet" type="text/css" media="screen"/>
@endsection
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{route('manage-blog')}}"><i class="fa fa-home"></i>Manage Blog</a>
                        </li>

                        <li class="active">
                            <strong>Add New Blog</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Add New Blog</h2>
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('manage-blog.store') }}" method="POST" enctype="multipart/form-data">
                                
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Blog Intro Title *</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="blog_title">
                                            </div>
                                            @if($errors->has('blog_title'))
                                                <div class="text-danger">{{ $errors->first('blog_title') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Blog Intro Heading</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="blog_intro_heading">
                                            </div>
                                            @if($errors->has('blog_intro_heading'))
                                            <div class="text-danger">{{ $errors->first('blog_intro_heading') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Blog Post Date</label>
                                            <div class="controls">
                                                <input type="text" class="form-control form-control datepicker" name="blog_post_date" data-format="dd-mm-yyyy" readonly>
                                            </div>
                                            @if($errors->has('blog_post_date'))
                                            <div class="text-danger">{{ $errors->first('blog_post_date') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Blog Intro Description</label>
                                            <div class="controls">
                                                <textarea type="text" class="form-control" name="blog_intro_desc"></textarea>
                                            </div>
                                            @if($errors->has('blog_intro_desc'))
                                            <div class="text-danger">{{ $errors->first('blog_intro_desc') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Blog Intro Image *</label>
                                            <div class="controls">
                                                <input type="file" class="form-control" name="blog_intro_image">
                                            </div>
                                            @if($errors->has('blog_intro_image'))
                                            <div class="text-danger">{{ $errors->first('blog_intro_image') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Blog External URL</label>
                                            <div class="form-block">
                                                <input type="checkbox" class="iswitch iswitch-primary" name="blog_external_url_checkbox" value="1">
                                            </div>
                                            @if($errors->has('blog_external_url_checkbox'))
                                            <div class="text-danger">{{ $errors->first('blog_external_url_checkbox') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4" id="blog_external_url_area">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">
                                                Blog Blog External Url *
                                            </label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="blog_external_url">
                                            </div>
                                            @if($errors->has('blog_external_url'))
                                            <div class="text-danger">{{ $errors->first('blog_external_url') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-lg-12" id="blog_image_description_area">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="field-1">Blog Image (Select Multiple Image (Limit 20 images))</label>
                                                    <div class="controls">
                                                        <input type="file" class="form-control" name="blog_image[]" multiple>
                                                    </div>
                                                    @if($errors->has('blog_image'))
                                                    <div class="text-danger">{{ $errors->first('blog_image') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="field-1">Blog Description</label>
                                                    <div class="controls">
                                                        <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" name="blog_description"></textarea>
                                                    </div>
                                                    @if($errors->has('blog_description'))
                                                    <div class="text-danger">{{ $errors->first('blog_description') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <div class="controls">
                                             <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                       </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection

@section('morescripts')
<script src="{{asset('backend/assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/datepicker/js/datepicker.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        function toggleBlogImageDescription() {
            if ($('input[name="blog_external_url_checkbox"]').is(':checked')) {
                $('#blog_image_description_area').hide();
                $('#blog_external_url_area').show();
            } else {
                $('#blog_image_description_area').show();
                $('#blog_external_url_area').hide();
            }
        }
        toggleBlogImageDescription();
        $('input[name="blog_external_url_checkbox"]').on('change', function () {
            toggleBlogImageDescription();
        });
    });
</script>
@endsection