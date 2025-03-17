@php 
use App\Models\OurWorkImage;
@endphp
@extends('backend.layouts.master') 
@section('title','Edit Our Work') 
@section('main-content') 
{{--@dd(Auth::check());--}}
@section('morecss')
<link href="{{asset('backend/assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/components/htmleditor.css')}}" rel="stylesheet" type="text/css" media="screen"/>


<link href="{{asset('backend/assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/uikit.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/vendor/codemirror/codemirror.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/components/htmleditor.css')}}" rel="stylesheet" type="text/css" />
@endsection
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper">
        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
            <div class="page-title">

                <div class="pull-right hidden-xs">
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{route('manage-our-work')}}"><i class="fa fa-home"></i>Manage Our Work</a>
                        </li>

                        <li class="active">
                            <strong>Edit Our Work</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Edit Our Work</h2>
                    
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ route('manage-our-work.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $our_work->id}}" name="our_work_hidden_id">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Our Work Heading Name</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="our_work_heading_name" value="{{ $our_work->heading_name }}">
                                            </div>
                                            @if($errors->has('our_work_heading_name'))
                                            <div class="text-danger">{{ $errors->first('our_work_heading_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Our Work Content</label>
                                            <div class="controls">
                                            <textarea class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" name="work_content">{{ $our_work->our_work_content }}</textarea>
                                            </div>
                                            @if($errors->has('work_content'))
                                                <div class="text-danger">{{ $errors->first('work_content') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Image (Upload Multiple images)</label>
                                            <div class="controls">
                                                <input type="file" class="form-control" name="work_multiple_image[]" multiple>
                                            </div>
                                            @if($errors->has('our_work_heading_name'))
                                            <div class="text-danger">{{ $errors->first('our_work_heading_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <div class="controls">
                                             <button type="submit" class="btn btn-primary">Update</button>
                                          </div>
                                       </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        @php 
                            $our_work_multiple_img = OurWorkImage::where(['our_work_id' => $our_work->id])->orderBy('id','DESC')->get();
                            
                            if ($our_work_multiple_img){
                            @endphp
                                <div class="col-lg-12">
                                @foreach($our_work_multiple_img as $image) 
                                    <div class="col-lg-3">
                                    <div class="product-element-top">
                                        <img  src="{{ asset('our-work/main-img/' . $image->our_work_image) }}" class="img-responsive thumbnail_img">
                                    </div>
                                    <a href="{{url('delete-multiple-img/'.$image->id.'/'.$our_work->id.'') }}">
                                        <i class="fa fa-trash-o icon-xs"></i>
                                    </a>
                                    </div>
                                @endforeach
                                </div>
                            @php
                            }
                            @endphp
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection
@section('morescripts')
<script src="{{asset('backend/assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('backend/assets/plugins/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
		<script src="{{asset('backend/assets/plugins/uikit/js/uikit.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/codemirror.js')}}" type="text/javascript"></script>
		<script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/codemirror.js')}}" type="text/javascript"></script>
		<!-- <script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/mode/markdown/markdown.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/addon/mode/overlay.js')}}"></script> -->
		<!-- <script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/mode/xml/xml.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/uikit/vendor/codemirror/mode/gfm/gfm.js')}}"></script>
		<script src="{{asset('backend/assets/plugins/uikit/vendor/marked/marked.min.js')}}" type="text/javascript"></script> -->
		<script src="{{asset('backend/assets/plugins/uikit/js/components/htmleditor.js')}}" type="text/javascript"></script>





@endsection