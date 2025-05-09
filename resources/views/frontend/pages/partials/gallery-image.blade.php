@if(isset($gallery_category)) 
    <div class="event-widget-area gallery-tab-widget">
        <div class="row grid-services-gallery">
        @foreach($gallery_category->galleryImages as $image)
            <div class="col-lg-3 col-md-6 px-1">
                <figure>
                    <a class="lightbox" title="{{ $gallery_category->name }}" data-fancybox="gallery-img" data-caption="" href="{{ asset('storage/gallery-img/'.$image->image_path) }}">
                        <img src="{{ asset('storage/gallery-img/'.$image->image_path) }}" alt="{{ $gallery_category->name }}" loading="lazy"
                        width="300" 
                                 height="300">
                    </a>
                </figure>
            </div>
        @endforeach
        </div>
    </div>
@endif