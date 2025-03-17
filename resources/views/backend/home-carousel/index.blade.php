@extends('backend.layouts.master')
@section('title','Home Carousel')
@section('main-content')
{{--@dd(Auth::check());--}}
@section('morecss')
<link href="{{asset('backend/assets//plugins/datatables/css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('backend/assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('backend/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{asset('backend/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" media="screen" />
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

                        <li class="active">
                            <strong>Home Carousel</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">Home Carousel</h2>
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
                            <form action="{{ route('home-slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="field-1">Upload Multiple Image</label>
                                    <div class="controls">
                                        <input type="file" class="form-control" name="image_file[]" multiple="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @if (isset($data['home_carousel']) && $data['home_carousel']->count() > 0)
                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Image</th>
                                    `   <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $sr_no = 1;
                                    @endphp
                                    @foreach($data['home_carousel'] as $home_carousel_row)
                                    <tr>
                                        <td>{{ $sr_no }}</td>
                                        <td>
                                            <img src="{{ asset('storage/home-slider/' . $home_carousel_row->image_path) }}" style="width: 50px;">
                                        </td>

                                        <td>
                                            
                                            <a href="{{ route('home-slider.destroy', $home_carousel_row->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash icon-xs"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                    @php
                                    $sr_no++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </div>



    </section>
</section>
@endsection
@section('morescripts')
<script src="{{asset('backend/assets/plugins/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js')}}" type="text/javascript">

</script>
@endsection