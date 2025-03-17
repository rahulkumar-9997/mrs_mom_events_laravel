<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\HomeCarousel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;
class HomeGeneralController extends Controller
{
    public function index()
    {
        $data['home_carousel'] = HomeCarousel::orderBy('id','DESC')->get(); 
        return view('backend.home-carousel.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_file' => 'required|array|min:1',
            'image_file.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);
    
        DB::beginTransaction();

        try {
            if ($request->hasFile('image_file')) {
                foreach ($request->file('image_file') as $image) {
                    $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_name = 'dr-shilpi-reddy-hyd-' . $uniqueTimestamp . '.webp';
                    $destinationPath = public_path('storage/home-slider/');
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0755, true, true);
                    }
                    Image::make($image)
                        ->resize(400, 200, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->encode('webp', 70)
                        ->save($destinationPath . '/' . $image_name);

                    HomeCarousel::create([
                        'image_path' => $image_name,
                        'sort_order' => 0,
                    ]);
                }
            }
            DB::commit();

            return back()->with('success', 'Images uploaded successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $homeCarousel = HomeCarousel::findOrFail($id);
            $imagePath = public_path('storage/home-slider/' . $homeCarousel->image_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $homeCarousel->delete();
            DB::commit();
            return back()->with('success', 'Image deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
}
