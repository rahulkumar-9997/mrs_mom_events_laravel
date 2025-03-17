<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data['foundation_category_list'] = GalleryCategory::orderBy('id','DESC')->get(); 
        return view('backend.manage-foundation-image.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $foundation_categories = GalleryCategory::orderBy('id', 'DESC')->get(); 
        $foundation_cate_id = $request->input('foundation_cate_id');
        $form = '
        <div class="modal-body">
            <form method="POST" action="' . route('gallery-image.store') . '" accept-charset="UTF-8" enctype="multipart/form-data" id="foundationImageStore">
                ' . csrf_field() . '
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="gallery_category" class="form-label">Select Gallery Category</label>
                            <select class="form-control" name="gallery_category" id="gallery_category">
                                <option value="">Select Gallery Category</option>';
                                foreach ($foundation_categories as $category) {
                                    $selected = ($category->id == $foundation_cate_id) ? 'selected' : '';
                                    $form .= '<option value="' . $category->id . '" ' . $selected . '>' .$category->name. '</option>';
                                }
                                $form .= '
                            </select>
                        </div>	
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="gallery_image_file" class="control-label">Fondation Image Multiple (Select Multiple Images (Limit 20 images))*</label>
                            <input type="file" name="gallery_image_file[]" multiple class="form-control" id="gallery_image_file">
                        </div>	
                    </div>
                </div>
                <div class="modal-footer pb-0">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>';

        return response()->json([
            'message' => 'Form created successfully',
            'form' => $form,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gallery_category' => 'required|exists:gallery_categories,id',
            'gallery_image_file' => 'required|array', 
            'gallery_image_file.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);
     
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
     
        DB::beginTransaction();
     
        try {
            $foundation_category_id = $request->gallery_category;
            $foundation_category = GalleryCategory::findOrFail($foundation_category_id);
    
            if ($request->hasFile('gallery_image_file')) {
                $uploadPath = public_path('storage/gallery-img/');
    
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
    
                foreach ($request->file('gallery_image_file') as $file) {
                    $sanitized_title = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($foundation_category->name)));
                    $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_file_name = 'dr-shilpi-reddy-hyd-' . $sanitized_title . '-' . $uniqueTimestamp . '.webp';
    
                    $img = Image::make($file)->resize(600, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
    
                    $img->encode('webp', 80)->save($uploadPath . $image_file_name); 
                    GalleryImage::create([
                        'gallery_categories_id' => $foundation_category_id,
                        'image_path' => $image_file_name,
                        'sort_order' => 0,
                    ]);
                }
        }
        DB::commit();
        return response()->json([
            'status' => 'success',
            'message' => 'Gallery Images uploaded successfully',
        ]);
    
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong! ' . $e->getMessage(),
            ], 500);
        }
     }
     
     
     


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foundation_category_id = $id;
        $foundation_category = GalleryCategory::with(['galleryImages' => function ($query) {
            $query->orderBy('sort_order');
        }])->findOrFail($foundation_category_id);
        return view('backend.manage-foundation-image.show', compact('foundation_category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $foundationImage = GalleryImage::findOrFail($id);
            $imagePath = public_path('storage/gallery-img/' . $foundationImage->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $foundationImage->delete();
            DB::commit();
            return back()->with('success', 'Gallery Image deleted successfully.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    public function sort(Request $request){
        $sortedIDs = $request->input('order');
        foreach ($sortedIDs as $index => $id) {
            GalleryImage::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['success' => true, 'message'=>'Sort order updated successfully!']);
    }
}
