<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Image;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{
    public function index(){
        $data['testimonials_list'] = Testimonials::orderBy('id','DESC')->get();        
        return view('backend.manage-testimonials.index' , compact('data'));
    }

    public function showTestimonialsForm(){
        return view('backend.manage-testimonials.add');
        
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'profile_photo' => 'required',
            'testimonials_content' => 'required',
            
        ]);
        $input['name'] = $request->input('name');
        $input['testimonials_content'] = $request->input('testimonials_content');
        $input['user_id'] = $user_id;
        if ($request->hasFile('profile_photo')){
            $image = $request->file('profile_photo');
            $filenameWithExt = $image->getClientOriginalName();  
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image_file_name = $filename.'_'.time().'.'.$extension;
            $destinationPath = public_path('/testimonials-img/thumb');
            
            
            $img = Image::make($image->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_file_name);

            $destinationPath = public_path('testimonials-img/main-img');
            $image->move($destinationPath, $image_file_name);
            $input['profile_image'] = $image_file_name;
            
        }
        $testimonials_add = Testimonials::create($input);
        if ($testimonials_add){
            return redirect('manage-testimonials')->with('success','Testimonials added successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !');
    }

    public function edit($id){
        $testimonials_edit = Testimonials::find($id);
        return view('backend.manage-testimonials.edit' , compact('testimonials_edit'));
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required',
            'testimonials_content' => 'required',
            
        ]);
        $testimonials_row = Testimonials::find($request->testimonials_id_hidden);
        $input['name'] = $request->input('name');
        $input['testimonials_content'] = $request->input('testimonials_content');
        $input['user_id'] = $user_id;
        if ($request->hasFile('profile_photo')){
            $image = $request->file('profile_photo');
            $filenameWithExt = $image->getClientOriginalName();  
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image_file_name = $filename.'_'.time().'.'.$extension;
            $destinationPath = public_path('/testimonials-img/thumb');
            /*Unlink image*/
            $destination_path_thumb = public_path('/testimonials-img/thumb/');
            $destination_path_main_img_ = public_path('/testimonials-img/main-img/');
            $file_old_thumb = $destination_path_thumb.$testimonials_row->profile_image;
            $file_old_main = $destination_path_main_img_.$testimonials_row->profile_image;
            unlink($file_old_thumb);
            unlink($file_old_main);
            /*Unlink image*/
            
            $img = Image::make($image->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_file_name);

            $destinationPath = public_path('testimonials-img/main-img');
            $image->move($destinationPath, $image_file_name);
            $input['profile_image'] = $image_file_name;
            
        }
        //$image_upload = $feature_logo->update($input);
        $testimonials_update = $testimonials_row->update($input);
        if ($testimonials_update){
            return redirect('manage-testimonials')->with('success','Testimonials updated successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !');
    }

    public function delete($id){
        $testimonials_row = Testimonials::find($id);
        /*Unlink image*/
        $destination_path_thumb = public_path('/testimonials-img/thumb/');
        $destination_path_main_img_ = public_path('/testimonials-img/main-img/');
        $file_old_thumb = $destination_path_thumb.$testimonials_row->profile_image;
        $file_old_main = $destination_path_main_img_.$testimonials_row->profile_image;
        unlink($file_old_thumb);
        unlink($file_old_main);
        /*Unlink image*/
        $testimonials_row->delete();
        return redirect('manage-testimonials')->with('success','Testimonials deleted successfully !');
    }
}
