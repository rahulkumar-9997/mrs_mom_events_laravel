@extends('backend.layouts.master') 
@section('title','Edit testimonials') 
@section('main-content') 
{{--@dd(Auth::check());--}}

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
                            <a href="{{route('manage-testimonials')}}"><i class="fa fa-home"></i>Manage Testimonials</a>
                        </li>

                        <li class="active">
                            <strong>Edit Testimonials</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Edit Testimonials</h2>
                    
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ route('manage-testimonials.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$testimonials_edit->id}}" name="testimonials_id_hidden">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <div class="controls">
                                                <input type="text" value="{{$testimonials_edit->name}}" class="form-control" name="name">
                                            </div>
                                            @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Testimonials Content</label>
                                            <div class="controls">
                                            <textarea name="testimonials_content" class="form-control" cols="15" rows="10">{{$testimonials_edit->testimonials_content}}</textarea>
                                            </div>
                                            @if($errors->has('testimonials_content'))
                                                <div class="text-danger">{{ $errors->first('testimonials_content') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Profile Photo</label>
                                            <br><img src="{{ asset('testimonials-img/thumb/' . $testimonials_edit->profile_image) }}" style="width: 100px;">
                                            <div class="controls">
                                                <input type="file" class="form-control" name="profile_photo">
                                            </div>
                                            @if($errors->has('profile_photo'))
                                            <div class="text-danger">{{ $errors->first('profile_photo') }}</div>
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
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection
