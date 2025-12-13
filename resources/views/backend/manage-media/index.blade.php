@extends('backend.layouts.master')
@section('title','Manage Media Images')
@section('main-content')
{{--@dd(Auth::check());--}}
@section('morecss')
@endsection
<section id="main-content" class=" ">
   <section class="wrapper main-wrapper">
      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
         <div class="page-title">
            <div class="pull-left">
               <a href="{{route('manage-media.add')}}" class="btn btn-warning btn-sm" style="margin-top: 20px;">Add Media Images</a>
            </div>
            <div class="pull-right hidden-xs">
               <ol class="breadcrumb">
                  <li>
                     <a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Home</a>
                  </li>
                  <li class="active">
                     <strong>Manage Media Images</strong>
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12">
         <section class="box ">
            <header class="panel_header">
               <h2 class="title pull-left">Manage Media Images</h2>
               <div class="actions panel_actions pull-right">
                  <i class="box_toggle fa fa-chevron-down"></i>
                  <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                  <i class="box_close fa fa-times"></i>
               </div>
            </header>
            <div class="content-body">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     @if (isset($data['media_image_list']) && $data['media_image_list']->count() > 0)
                     <div class="sort-div" role="tabpanel">
                        <ul class="list-unstyled list-group sortable stage ui-sortable" id="sortable_media_image">
                           @foreach($data['media_image_list'] as $image)
                           @if($image->is_image_or_youtube == 0)
                           <li class="d-flex align-items-start justify-content-between list-group-item ui-sortable-handle"
                              data-id="{{ $image->id }}"
                              style="padding: 8px;">
                              <div class="d-flex align-items-start">
                                 <div class="img-thumbnail" style="width: 100px; height: 100px; margin: 0 auto; overflow: hidden;">
                                    <img
                                       src="{{ asset('storage/media-img/'. $image->media_image) }}"
                                       class=""
                                       style="width: 100%; height: 100%; object-fit: contain;"
                                       alt="{{ $image->title }}">
                                 </div>

                                 <div style="margin-left: 10px;">
                                       <h6 class="mb-1">{{ $image->title }}</h6>
                                       @if($image->media_image_link)
                                          <div class="small">
                                          <a href="{{ $image->media_image_link }}" target="_blank">
                                                   {{ $image->media_image_link }}
                                             </a>
                                          </div>
                                       @endif
                                       @if($image->media_link_description)
                                          <div class="text-muted small mt-1">
                                             {{ Str::limit($image->media_link_description, 120) }}
                                          </div>
                                       @endif
                                 </div>
                              </div>
                              <div class="ms-2">
                                 <a href="{{ url('manage-media/edit/'.$image->id.'?type=media') }}"
                                    class="btn btn-primary btn-sm mb-1">
                                       <i class="fa fa-pencil"></i>
                                 </a>
                                 <a href="{{ url('manage-media/delete/'.$image->id) }}"
                                    class="btn btn-danger btn-sm">
                                       <i class="fa fa-trash"></i>
                                 </a>
                              </div>
                           </li>
                           @else
                           <li class="d-flex align-items-start justify-content-between list-group-item ui-sortable-handle"
                              style="padding: 8px;">
                              <div class="d-flex align-items-start">
                                 <iframe
                                       width="100"
                                       height="60"
                                       class="me-3 rounded"
                                       frameborder="0"
                                       allowfullscreen
                                       src="{{ $image->youtube_link }}?controls=1&rel=0&autoplay=0">
                                 </iframe>
                                 <div>
                                       <h6 class="mb-1">{{ $image->title }}</h6>
                                       <div class="small">
                                          <a href="{{ $image->youtube_link }}" target="_blank">
                                             {{ $image->youtube_link }}
                                          </a>
                                       </div>

                                       @if($image->youtube_link_description)
                                          <div class="text-muted small mt-1">
                                             {{ Str::limit($image->youtube_link_description, 120) }}
                                          </div>
                                       @endif
                                 </div>
                              </div>

                              <div class="ms-2">
                                 <a href="{{ url('manage-media/edit/'.$image->id.'?type=youtube') }}"
                                    class="btn btn-primary btn-sm mb-1">
                                       <i class="fa fa-pencil"></i>
                                 </a>
                                 <a href="{{ url('manage-media/delete/'.$image->id) }}"
                                    class="btn btn-danger btn-sm">
                                       <i class="fa fa-trash"></i>
                                 </a>
                              </div>

                           </li>

                           @endif
                           @endforeach
                           </ul>

                     </div>
                     <div class="row mt-3">
                        <div class="col-md-12 text-right">
                           {{ $data['media_image_list']->links() }}
                        </div>
                     </div>
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
<script src="{{asset('backend/assets/js/pages/sort-jquery-ui.min.js')}}" type="text/javascript"></script>
<script>
   var mediaImageSortUrl = "{{ route('media-image.sort') }}";
</script>
<script>
   $(function() {   
      $('#sortable_media_image').sortable({   
         placeholder: "ui-sortable-placeholder",   
         update: function(event, ui) {   
            var movedItem = ui.item;   
            var previousItem = movedItem.prev();   
            var nextItem = movedItem.next();
            var swapData = [];  
            if (previousItem.length > 0) {   
               swapData.push({   
                  id: movedItem.attr('data-id'),   
                  sort_order: previousItem.attr('data-id')   
               }); 
               swapData.push({   
                  id: previousItem.attr('data-id'),   
                  sort_order: movedItem.attr('data-id')   
               });   
            } else if (nextItem.length > 0) {   
               swapData.push({   
                  id: movedItem.attr('data-id'),
                     sort_order: nextItem.attr('data-id')   
               });
               swapData.push({   
                  id: nextItem.attr('data-id'),   
                  sort_order: movedItem.attr('data-id')   
               });
   
            }
            console.log("Swapped Order:", swapData); 
            $.ajax({
                  url: mediaImageSortUrl,   
               method: 'POST',   
               data: {   
                  _token: '{{ csrf_token() }}',   
                  swaps: swapData   
               },   
               success: function(response) {   
                  console.log("Sort Response:", response);   
                  if (response.success) {   
                     showSuccess(response.message);   
                  } else {   
                     showSuccess('Failed to swap order.');   
                  }   
               },   
               error: function() {   
                  showSuccess('Error swapping sort order.');   
               }   
            });   
         }   
      });   
   });
</script>
@endsection