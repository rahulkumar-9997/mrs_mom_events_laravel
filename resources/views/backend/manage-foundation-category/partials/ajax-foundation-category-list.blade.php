@if (isset($data['foundation_category_list']) && $data['foundation_category_list']->count() > 0)
<table id="sortable-table" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Foundation Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody id="sortable">
        @foreach($data['foundation_category_list'] as $foundation_category_row)
        <tr data-id="{{ $foundation_category_row->id }}" class="sortable-row">
            <td class="handle">
                <i class="fa fa-arrows-alt"></i>
            </td>
            <td>{{ $foundation_category_row->name }}</td>
            <td>
                <a href="{{ route('gallery-image.show', $foundation_category_row->id) }}" class="btn btn-warning btn-sm">
                    <span class="badge badge-primary">
                        {{ $foundation_category_row->gallery_images_count }}
                    </span>
                    View Gallery Images/Sort Order
                </a>
            </td>
            <td>
                <div class="d-flex gap-2">
                    <a href="javascript:void(0);" data-editfoundationcategory-popup="true" data-fcid="{{ $foundation_category_row->id }}" data-url="{{ route('gallery-category.edit', $foundation_category_row->id) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil icon-xs"></i>
                    </a>

                    <form method="POST" action="{{ route('gallery-category.destroy', $foundation_category_row->id) }}" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0);" class="show_confirm btn btn-danger btn-sm">
                            <i class="fa fa-trash icon-xs"></i>
                        </a>
                    </form>

                    <a href="javascript:void(0);" data-addfoundationimage-popup="true" data-fcid="{{ $foundation_category_row->id }}" data-url="{{ route('gallery-image.create', $foundation_category_row->id) }}" class="btn btn-info btn-sm">
                        Add Gallery Image
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
