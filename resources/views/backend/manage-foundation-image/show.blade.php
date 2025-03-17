@extends('backend.layouts.master')
@section('title','Manage Gallery Image')
@section('main-content')
{{--@dd(Auth::check());--}}
@section('morecss')
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
                            <strong>{{ $foundation_category->name }}</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <h2 class="title pull-left">
                        {{ $foundation_category->name }}
                        <a href="{{ route('gallery-category.index')}}"
                            rel="tooltip" data-color-class="danger" data-animate=" animated fadeIn " data-toggle="tooltip" data-original-title="Go Back to Previous Page"
                            class="btn btn-sm btn-danger">
                            &lt;&lt; Go Back to Previous Page
                        </a>
                    </h2>

                </header>
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="sort-div role="tabpanel">
                                <ul class="list-unstyled list-group sortable stage ui-sortable" id="sortable_foundation_image">
                                    @if($foundation_category && $foundation_category->galleryImages->isNotEmpty())
                                    @foreach($foundation_category->galleryImages as $image)
                                    <li class="d-flex align-items-center justify-content-between list-group-item ui-sortable-handle"
                                        data-id="{{ $image->id }}"
                                        style="position: relative; left: 0px; top: 0px; padding: 5px;">

                                        <h6 class="mb-0 mt-0">
                                            <img src="{{ asset('storage/gallery-img/' . $image->image_path) }}"
                                                class="img-thumbnail me-3"
                                                style="width: 50px; height: 50px;"
                                                alt="{{ $data['product_details']->title ?? '' }}">
                                            <span>{{ $image->image_path }}</span>
                                        </h6>
                                        <span class="float-end">
                                            <form method="POST" action="{{ route('gallery-image.destroy', $image->id) }}" accept-charset="UTF-8" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger show_confirm" data-name="{{ $image->image_path }}" title="Delete">
                                                    <i class="fa fa-trash icon-xs"></i>
                                                </button>
                                            </form>
                                        </span>
                                    </li>
                                    @endforeach
                                    @else
                                    <li class="list-group-item">No images available</li>
                                    @endif
                                </ul>
                            </div>

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
$(function() {
    $('#sortable_foundation_image').sortable({
        placeholder: "ui-sortable-placeholder",
        update: function(event, ui) {
            var order = $(this).sortable('toArray', {attribute: 'data-id'});
            /*alert(JSON.stringify(order));*/
            $.ajax({
                url: '{{ route("gallery-image.sort") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function(response) {
                    if (response.success) {
                        showSuccess(response.message);
                    } else {
                        showSuccess('Failed to update sort order.');
                    }
                },
                error: function() {
                    showSuccess('Error updating sort order.');
                }
            });
        }
    });
});
/*Delete Images */
$(document).ready(function() {
    $('.show_confirm').click(function(event) {
         var form = $(this).closest("form"); 
         var name = $(this).data("name");
         event.preventDefault();

         Swal.fire({
               title: `Are you sure you want to delete this ${name}?`,
               text: "If you delete this, it will be gone forever.",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Yes, delete it!",
               cancelButtonText: "Cancel",
               dangerMode: true,
         }).then((result) => {
               if (result.isConfirmed) {
                  form.submit(); 
               }
         });
      });
   });
/*Delete Images */
</script>
@endsection