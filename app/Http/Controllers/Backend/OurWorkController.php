<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OurWork;
use App\Models\OurWorkImage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
class OurWorkController extends Controller
{
    
    public function index(){
        //DB::enableQueryLog();
        $data['our_work_list'] = OurWork::orderBy('id','DESC')->get();        
        // $data['our_work_list'] = OurWork::join('our_works_image', 'our_works.id', '=', 'our_works_image.our_work_id')
        
        // ->get(['our_works.heading_name', 'our_works.slug', 'our_works.our_work_content', 'our_works_image.id', 'our_works_image.our_work_image']); 
         //dd($data);
        return view('backend.our-work.index' , compact('data'));
    }

    public function showOurWorkForm(){
        return view('backend.our-work.add');
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        // $product = OurWork::create([
        //     "heading_name" => "Laravel 8 Image Upload",
        //     "our_work_content" => "Laravel 8 Image Upload",
        //     "user_id" => $user_id,
        // ]);
        // dd($product);
        $this->validate($request, [
            'our_work_heading_name' => 'required',
            'work_content' => 'required',
            'work_multiple_image' => 'required',
            
        ]);
        $input['heading_name'] = $request->input('our_work_heading_name');
        $input['our_work_content'] = $request->input('work_content');
        $input['user_id'] = $user_id;

        $our_work_add = OurWork::create($input);
        if ($our_work_add){
            if ($request->hasFile('work_multiple_image')){
                $files = $request->file('work_multiple_image');
                foreach ($files as $file) {
                    $image = $file;
                    $sanitized_title = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($request->input('our_work_heading_name'))));
                    $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_file_name = 'dr-shilpi-reddy-hyd-' . $sanitized_title . '-' . $uniqueTimestamp . '.webp';
                    $thumbPath = public_path('our-work/thumb');
                    $mainImgPath = public_path('our-work/main-img');
                    $img = Image::make($image->getRealPath())
                        ->fit(800, 600) 
                        ->encode('webp', 90)
                        ->save($thumbPath . '/' . $image_file_name);

                    $img = Image::make($image->getRealPath())
                        ->encode('webp', 90)
                        ->save($mainImgPath . '/' . $image_file_name);

                    $work_img_input['our_work_image'] = $image_file_name;
                    $work_img_input['our_work_id'] = $our_work_add->id;
                    $image_upload = OurWorkImage::create($work_img_input);
                }
                if ($image_upload){
                    return redirect('manage-our-work')->with('success','Our work data save successfully');
                }else{
                    return redirect()->back()->with('error','Somthings went wrong please try again !.');
                }
            }
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !');
    }

    public function edit($id){
        $our_work = OurWork::find($id);
        return view('backend.our-work.edit' , compact('our_work'));
    }

    public function update(Request $request){
        $this->validate($request, [
            'our_work_heading_name' => 'required',
            'work_content' => 'required',
                        
        ]);
       
        $our_work_row = OurWork::find($request->our_work_hidden_id);
        $input['heading_name'] = $request->input('our_work_heading_name');
        $input['our_work_content'] = $request->input('work_content');
        $our_work_update = $our_work_row->update($input);

        if ($request->hasFile('work_multiple_image')) {
            $files = is_array($request->file('work_multiple_image')) 
                ? $request->file('work_multiple_image') 
                : [$request->file('work_multiple_image')];
        
            $thumbPath = public_path('our-work/thumb');
            $mainImgPath = public_path('our-work/main-img');
            $workImages = [];
            foreach ($files as $file) {
                $sanitizedTitle = Str::slug(trim($request->input('our_work_heading_name')));
                $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                $imageFileName = "dr-shilpi-reddy-hyd-{$sanitizedTitle}-{$uniqueTimestamp}.webp";
                $img = Image::make($file->getRealPath());
                $img->fit(800, 600)->encode('webp', 90)->save("{$thumbPath}/{$imageFileName}");
                $img->encode('webp', 90)->save("{$mainImgPath}/{$imageFileName}");
                $workImages[] = [
                    'our_work_image' => $imageFileName,
                    'our_work_id' => $request->our_work_hidden_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            OurWorkImage::insert($workImages);
        }
        if ($our_work_update){
            return redirect('manage-our-work')->with('success','Our work data updated successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
             
    }

    public function delete($id)
    {
        $ourWork = OurWork::find($id);

        if (!$ourWork) {
            return redirect()->back()->with('error', 'Our work entry not found.');
        }

        $workImages = OurWorkImage::where('our_work_id', $id)->get();

        if ($workImages->isNotEmpty()) {
            foreach ($workImages as $image) {
                $imagePathThumb = public_path('our-work/thumb/' . $image->our_work_image);
                $imagePathMain = public_path('our-work/main-img/' . $image->our_work_image);
                if (file_exists($imagePathThumb)) {
                    unlink($imagePathThumb);
                }
                if (file_exists($imagePathMain)) {
                    unlink($imagePathMain);
                }
                $image->delete();
            }
        }
        $ourWork->delete();

        return redirect('manage-our-work')->with('success', 'Our work entry and images deleted successfully.');
    }


    public function deleteMultipleImage($multiple_image_id, $our_work_id){
        $our_work_image = OurWorkImage::find($multiple_image_id);
        /*Unlink image*/
        $destination_path_thumb = public_path('/our-work/thumb/');
        $destination_path_main_img_ = public_path('/our-work/main-img/');
        $file_old_thumb = $destination_path_thumb.$our_work_image->our_work_image;
        $file_old_main = $destination_path_main_img_.$our_work_image->our_work_image;
        unlink($file_old_thumb);
        unlink($file_old_main);
        /*Unlink image*/
        $our_work_image->delete();
        return redirect('manage-our-work/edit/'.$our_work_id.'')->with('success','Our work images deleted successfully !');
    }
}






    

