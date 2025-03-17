@extends('backend.layouts.master')
@section('title','Manage IBU Care')
@section('main-content')
{{--@dd(Auth::check());--}}
@section('morecss')
<link href="{{asset('backend/assets//plugins/datatables/css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" media="screen"/>    
@endsection
<section id="main-content" class=" ">
   <section class="wrapper main-wrapper" style=''>
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
         <div class="page-title">
            <div class="pull-left">
                <a href="{{route('manage-ibucare.add')}}" class="btn btn-warning btn-sm" style="margin-top: 20px;">Add new IBU Care</a>             
            </div>
            <div class="pull-right hidden-xs">
               <ol class="breadcrumb">
                  <li>
                     <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a>
                  </li>
                  
                  <li class="active">
                     <strong>Manage IBU Care</strong>
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12">
         <section class="box ">
            <header class="panel_header">
               <h2 class="title pull-left">Manage IBU Care</h2>
               <div class="actions panel_actions pull-right">
                  <i class="box_toggle fa fa-chevron-down"></i>
                  <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                  <i class="box_close fa fa-times"></i>
               </div>
            </header>
            <div class="content-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  @if (isset($data['ibucare_list']) && $data['ibucare_list']->count() > 0)
                     <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th>Sr. No.</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th> Image</th>
                              
                              <th>Action</th>
                           </tr>
                        </thead>
                        
                        <tbody>
                        @php
                           $sr_no = 1;
                        @endphp
                        @foreach($data['ibucare_list'] as $ibucare_list_row)
                           <tr>
                              <td>{{ $sr_no }}</td>
                              <td>{{ $ibucare_list_row->title }}</td>
                              <td>{!!$ibucare_list_row->description!!}</td>
                              
                              <td><img src="{{ asset('ibucare-img/thumb/'. $ibucare_list_row->img_file) }}" style="width: 50px;"></td>
                              
                              
                              
                              <td>
                                 <a href="{{url('manage-ibucare/edit/'.$ibucare_list_row->id.'') }}">
                                    <span class="label label-orange"><i class="fa fa-pencil icon-xs"></i></span>   
                                 </a>
                                 <a href="{{url('manage-ibucare/delete/'.$ibucare_list_row->id.'') }}">
                                    <span class="label label-danger"><i class="fa fa-trash icon-xs"></i></span>
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