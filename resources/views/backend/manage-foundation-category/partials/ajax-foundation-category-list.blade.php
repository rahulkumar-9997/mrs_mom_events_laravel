@if (isset($data['foundation_category_list']) && $data['foundation_category_list']->count() > 0)
<table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Foundation Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @php
        $sr_no = 1;
        @endphp
        @foreach($data['foundation_category_list'] as $foundation_category_row)
        <tr>
            <td>{{ $sr_no }}</td>
            <td>{{ $foundation_category_row->name }}</td>
            <td>
            <a href="{{ route('gallery-image.show', $foundation_category_row->id) }}"  rel="tooltip" data-color-class="danger" data-animate=" animated fadeIn " data-toggle="tooltip" data-original-title="View Gallery Image ({{ $foundation_category_row->name }})" class="btn btn-warning btn-sm" >
                    <span class="badge badge-primary">
                        {{ $foundation_category_row->gallery_images_count }}
                    </span>
                     View Gallery Images/Sort Order
                </a>
            </td>
            <td>
                <div class="d-flex gap-2" style="display: flex;">
                    <a href="javascript:void(0);" data-editfoundationcategory-popup="true" data-fcid="{{ $foundation_category_row->id }}" data-size="lg" data-title="Edit {{ $foundation_category_row->name }}" data-url="{{ route('gallery-category.edit', $foundation_category_row->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Edit {{ $foundation_category_row->name }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil icon-xs"></i>
                    </a>
                    
                    <form method="POST" action="{{ route('gallery-category.destroy', $foundation_category_row->id) }}" style="margin-left: 10px;">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                            <a href="javascript:void(0);" title="Delete {{ $foundation_category_row->name }}" data-name="{{ $foundation_category_row->name }}" class="show_confirm btn btn-danger btn-sm" data-title="Delete {{ $foundation_category_row->name }}" data-bs-toggle="tooltip" >
                            <i class="fa fa-trash icon-xs"></i>
                        </a>
                    </form>

                    <a href="javascript:void(0);" data-addfoundationimage-popup="true" data-fcid="{{ $foundation_category_row->id }}" data-size="lg" data-title="Add Gallery Image ( {{ $foundation_category_row->name }})" data-url="{{ route('gallery-image.create', $foundation_category_row->id) }}"  rel="tooltip" data-color-class="purple" data-animate=" animated fadeIn " data-toggle="tooltip" data-original-title="Add Gallery Image ( {{ $foundation_category_row->name }})" class="btn btn-info btn-sm" style="margin-left: 10px;">
                       Add Gallery Image
                    </a>
                </div>

            </td>

        </tr>
        @php
        $sr_no++;
        @endphp
        @endforeach
    </tbody>
</table>
@endif