@extends('backend.layouts.master') 
@section('title','Manage Profile') 
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
                        

                        <li class="active">
                            <strong>Update Profile</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Update Profile</h2>
                    
                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ route('manage-profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="profile_name" value="{{$user->name}}">
                                            </div>
                                            @if($errors->has('profile_name'))
                                            <div class="text-danger">{{ $errors->first('profile_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Email </label>
                                            <div class="controls">
                                                <input type="email" class="form-control" readonly="readonly" name="profile_email" value="{{$user->email}}">
                                            </div>
                                            @if($errors->has('profile_email'))
                                            <div class="text-danger">{{ $errors->first('profile_email') }}</div>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile Number</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="mobile_number" value="{{$user->phone_number}}">
                                            </div>
                                            @if($errors->has('mobile_number'))
                                            <div class="text-danger">{{ $errors->first('mobile_number') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Profile Photo</label>
                                            <div class="controls">
                                                <input type="file" class="form-control" name="profile_photo">
                                                <br><img src="{{ asset('profile-img/' . $user->profile_img) }}" style="width: 100px;">
                                            </div>
                                            @if($errors->has('profile_photo'))
                                            <div class="text-danger">{{ $errors->first('profile_photo') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Current Password</label>
                                            <div class="controls">
                                                <input type="password" class="form-control" name="current_password">
                                            </div>
                                            @if($errors->has('current_password'))
                                            <div class="text-danger">{{ $errors->first('current_password') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <div class="controls">
                                                <input type="password" class="form-control" name="new_password">
                                            </div>
                                            @if($errors->has('update_password'))
                                            <div class="text-danger">{{ $errors->first('update_password') }}</div>
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
