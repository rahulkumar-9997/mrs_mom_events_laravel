<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\FeatureLogo;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class FeatureLogoController extends Controller
{
    public function index(){
        $data['feature_logo_list'] = FeatureLogo::orderBy('id','DESC')->get();        
        return view('backend.manage-feature-logo.index' , compact('data'));
    }
    public function showFeatureLogoForm(){
        return view('backend.manage-feature-logo.add');
    }
    
    public function store(Request $request){
        $user_id = Auth::id();
        $this->validate($request, [
            'image_file' => 'required|array',
            'image_file.*' => 'image|mimes:jpeg,png,webp|max:2048',
        ]);
    
        $destinationPath = public_path('storage/associates-img/');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }
    
        if ($request->hasFile('image_file')) {
            $files = $request->file('image_file');
            $success = false;
            foreach ($files as $file) {
                $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                $image_file_name = 'dr-shilpi-reddy-hyd-' . $uniqueTimestamp . '.webp';
                Image::make($file)
                    ->resize(300, 200, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('webp', 70)
                    ->save($destinationPath . '/' . $image_file_name);
                $image_upload = FeatureLogo::create([
                    'img_file' => $image_file_name,
                    'user_id' => $user_id
                ]);
    
                if ($image_upload) {
                    $success = true;
                }
            }
    
            if ($success) {
                return redirect('manage-feature-logo')->with('success', 'Proud Associates Images uploaded successfully');
            }
        }
        return redirect()->back()->with('error', 'Something went wrong, please try again!');
    }

    public function edit($id){
        $feature_logo = FeatureLogo::find($id);
        return view('backend.manage-feature-logo.edit' , compact('feature_logo'));
    }

    public function update(Request $request) {
        $feature_logo = FeatureLogo::find($request->feature_logo_id_hidden);
        
        if (!$feature_logo) {
            return redirect()->back()->with('error', 'Feature logo not found!');
        }

        $this->validate($request, [
            'update_image_file' => 'required|image|mimes:jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('update_image_file')) {
            $image = $request->file('update_image_file');
            $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
            $image_file_name = 'dr-shilpi-reddy-hyd-' . $uniqueTimestamp . '.webp';
            $destination_main = public_path('storage/associates-img/');
            File::ensureDirectoryExists($destination_main, 0777, true);
            $file_old_main = $destination_main . $feature_logo->img_file;
            if (File::exists($file_old_main)) {
                File::delete($file_old_main);
            }
            Image::make($image)
                ->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 70)
                ->save($destination_main . $image_file_name);
            $image_upload = $feature_logo->update(['img_file' => $image_file_name]);

            if ($image_upload) {
                return redirect('manage-feature-logo')->with('success', 'Proud Associates Image updated successfully');
            }
        }

        return redirect()->back()->with('error', 'Something went wrong, please try again!');
    }

    public function delete($id) {
        $feature_logo = FeatureLogo::find($id);
        if (!$feature_logo) {
            return redirect()->back()->with('error', 'Feature logo not found!');
        }
        $destination_main = public_path('storage/associates-img/');
        $file_old_main = $destination_main . $feature_logo->img_file;
        if (File::exists($file_old_main)) {
            File::delete($file_old_main);
        }
        $feature_logo->delete();
    
        return redirect('manage-feature-logo')->with('success', 'Proud Associates Image deleted successfully!');
    }
}
