@extends('backend.layouts.master')
@section('title','Manage Media Image')
@section('main-content')
@section('morecss')
<link href="{{asset('backend/assets/plugins/ios-switch/css/switch.css')}}" rel="stylesheet" type="text/css" media="screen"/>
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
                     <a href="{{route('manage-media')}}"><i class="fa fa-home"></i>Manage Media Image</a>
                  </li>
                  
                  <li class="active">
                     <strong>Update Media Image</strong>
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12">
         <section class="box ">
            <header class="panel_header">
               <h2 class="title pull-left">Update media image
                   <a href="{{ route('manage-media') }}" rel="tooltip" data-color-class="danger" data-animate=" animated fadeIn " data-toggle="tooltip" data-original-title="Go Back to Previous Page" class="btn btn-sm btn-danger">
                            << Go Back to Previous Page
                        </a></h2>
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
                     <form action="{{ route('manage-media.update') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                        <input type="hidden" name="media_image_id_hidden" value="{{ $media_logo->id }}">
                        <div class="row">
                              <div class="col-lg-4">
                                 <div class="form-group">
                                       <label class="form-label">Youtube Link</label>
                                       <div class="form-block">
                                          @if(request()->has('type') && request()->get('type') == 'media')
                                             <input type="checkbox" class="iswitch iswitch-primary" name="youtube_link_checkbox" value="1" id="youtube_link_checkbox">
                                          @else
                                             <input type="checkbox" class="iswitch iswitch-primary" name="youtube_link_checkbox" value="1" id="youtube_link_checkbox" checked>
                                          @endif
                                       </div>
                                 </div>
                              </div>
                              <div class="col-lg-8">
                                 @if(request()->has('type') && request()->get('type') == 'media')
                                    <div class="form-group media_image_file">
                                       <label class="form-label" for="field-1">Upload Multiple Media Images</label>
                                       <div class="controls">
                                          <input type="file" class="form-control" name="image_file[]" multiple >
                                       </div>
                                       @if($errors->has('image_file'))
                                          <div class="text-danger">{{ $errors->first('image_file') }}</div>
                                       @endif
                                       <br><img src="{{ asset('storage/media-img/'.$media_logo->media_image) }}" style="width: 100px;">
                                    </div>
                                 @else
                                    <div class="form-group media_youtube_link">
                                       <label class="form-label" for="field-1">Youtube Link</label>
                                       <div class="controls">
                                          <input type="text" class="form-control" name="youtube_link" value="{{ $media_logo->youtube_link }}">
                                       </div>
                                       @if($errors->has('youtube_link'))
                                          <div class="text-danger">{{ $errors->first('youtube_link') }}</div>
                                       @endif
                                    </div>
                                 @endif
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
               </div>
            </div>
         </section>
      </div>
   </section>
</section>
@endsection
@section('morescripts')

@endsection
