@if(isset($gallery_category)) 
    <div class="event-widget-area gallery-tab-widget">
        <div class="row grid-services">
        @foreach($gallery_category->galleryImages as $image)
            <div class="col-lg-3 col-md-6 px-1 aos-init aos-animate" data-aos="zoom-in" data-aos-duration="800">
                <figure>
                    <a class="lightbox" title="{{ $gallery_category->name }}" data-fancybox="gallery-img" data-caption="" href="{{ asset('storage/gallery-img/'.$image->image_path) }}">
                        <img src="{{ asset('storage/gallery-img/'.$image->image_path) }}" alt="{{ $gallery_category->name }}" loading="lazy">
                    </a>
                </figure>
            </div>
        @endforeach
        </div>
    </div>
@endif