<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
class MediaController extends Controller
{
    public function index(){
        $data['media_image_list'] = Media::orderBy('sort_order', 'asc')->get();
        return view('backend.manage-media.index' , compact('data'));
    }

    public function showMediaForm(){
        return view('backend.manage-media.add');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $isYouTube = $request->has('youtube_link_checkbox');
        
        $this->validate($request, [
            'youtube_link' => $isYouTube ? 'required|url' : 'nullable',
            'image_file' => !$isYouTube ? 'required' : 'nullable',
        ], [
            'youtube_link.required' => 'The YouTube link is required.',
            'youtube_link.url' => 'Please enter a valid YouTube URL.',
            'image_file.required' => 'Please upload at least one image.',
        ]);
        
        DB::beginTransaction();
        try {
            if ($isYouTube) {
                Media::create([
                    'is_image_or_youtube' => 1,
                    'youtube_link' => $request->youtube_link,
                    'user_id' => $user_id,
                ]);
                
                DB::commit();
                return redirect('manage-media')->with('success', 'YouTube link added successfully.');
            }

            /* Process image uploads */
            if ($request->hasFile('image_file')) {
                $files = $request->file('image_file');
                if (!is_array($files)) {
                    $files = [$files];
                }
                
                $mainPath = public_path('storage/media-img/');
                $uploadSuccess = false;
                
                foreach ($files as $file) {
                    $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_file_name = 'dr-shilpi-reddy-hyd-' . $uniqueTimestamp . '.webp';
                    
                    Image::make($file->getRealPath())
                        ->resize(600, 400, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        })
                        ->encode('webp', 70)
                        ->save("{$mainPath}/{$image_file_name}");
                    
                    $media = Media::create([
                        'is_image_or_youtube' => 0,
                        'media_image' => $image_file_name,
                        'user_id' => $user_id,
                    ]);
                    
                    if ($media) {
                        $uploadSuccess = true;
                    }
                }
                
                if ($uploadSuccess) {
                    DB::commit();
                    return redirect('manage-media')->with('success', 'Media images uploaded successfully.');
                } else {
                    throw new \Exception('Failed to upload media images.');
                }
            }
            
            throw new \Exception('Invalid media input.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Media upload error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update . ' . $e->getMessage());
        }
    }


    public function edit($id){
        $media_logo = Media::find($id);
        return view('backend.manage-media.edit' , compact('media_logo'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::id();
        $isYouTube = $request->has('youtube_link_checkbox');
        $this->validate($request, [
            'youtube_link' => $isYouTube ? 'required|url' : 'nullable',
            'image_file' => !$isYouTube ? 'required' : 'nullable',
        ], [
            'youtube_link.required' => 'The YouTube link is required.',
            'youtube_link.url' => 'Please enter a valid YouTube URL.',
            'image_file.required' => 'Please upload at least one image.',
        ]);

        DB::beginTransaction();
        try {
            $media = Media::findOrFail($request->media_image_id_hidden);
            
            if ($isYouTube) {
                $media->update([
                    'is_image_or_youtube' => 1,
                    'youtube_link' => $request->youtube_link,
                ]);
            } else {
                if ($request->hasFile('image_file')) {
                    if (!empty($media->media_image)) {
                        $oldImagePath = public_path('storage/media-img/' . $media->media_image);
                        if (File::exists($oldImagePath)) {
                            File::delete($oldImagePath);
                        }
                    }
                    $files = $request->file('image_file');
                    if (!is_array($files)) {
                        $files = [$files];
                    }

                    $mainPath = public_path('storage/media-img/');
                    $uploadSuccess = false;

                    foreach ($files as $file) {
                        $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                        $image_file_name = 'dr-shilpi-reddy-hyd-' . $uniqueTimestamp . '.webp';

                        Image::make($file->getRealPath())
                            ->resize(600, 400, function ($constraint) {
                                $constraint->aspectRatio();
                                $constraint->upsize();
                            })
                            ->encode('webp', 70)
                            ->save("{$mainPath}/{$image_file_name}");

                        $media->update([
                            'is_image_or_youtube' => 0,
                            'media_image' => $image_file_name,
                        ]);

                        $uploadSuccess = true;
                    }

                    if (!$uploadSuccess) {
                        throw new \Exception('Failed to upload media images.');
                    }
                }
            }

            DB::commit();
            return redirect('manage-media')->with('success', 'Media updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Media update error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update media. ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        $media = Media::findOrFail($id);
        DB::beginTransaction();
        try {
            if ($media->is_image_or_youtube == 0 && !empty($media->media_image)) {
                $images = explode(',', $media->media_image);
                foreach ($images as $image) {
                    $file_thumb = public_path('storage/media-img/' . $image);
                    if (file_exists($file_thumb)) {
                        unlink($file_thumb);
                    }
                }
            }
            $media->delete();

            DB::commit();
            return redirect('manage-media')->with('success', 'Media deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Media delete error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete media. ' . $e->getMessage());
        }
    }


    public function sort(Request $request) {
        Log::info('Sort request received.', ['swaps' => $request->swaps]);
            if (!$request->has('swaps') || !is_array($request->swaps)) {
            return response()->json(['success' => false, 'message' => 'No swap data received!'], 400);
        }
        foreach ($request->swaps as $swap) {
            Media::where('id', $swap['id'])->update(['sort_order' => $swap['sort_order']]);
        }
            return response()->json(['success' => true, 'message' => 'Items swapped successfully!']);
    }
    
    
    
    
}
