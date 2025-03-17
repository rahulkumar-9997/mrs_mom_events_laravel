<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\IbuCare;
use Image;
use Illuminate\Support\Facades\Auth;
use DB;

class IbuCareController extends Controller
{
    public function index(){
        $data['ibucare_list'] = IbuCare::orderBy('id','DESC')->get();        
        return view('backend.manage-ibucare.index' , compact('data'));
    }

    public function showIbuCareForm(){
        return view('backend.manage-ibucare.add');
    }
    
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'ibucare_name' => 'required',
            'ibucare_image' => 'required',
            'ibucare_description' => 'required',
            
        ]);
        $input['title'] = $request->input('ibucare_name');
        $input['description'] = $request->input('ibucare_description');
        $input['user_id'] = $user_id;
        if ($request->hasFile('ibucare_image')){
            $image = $request->file('ibucare_image');
            $filenameWithExt = $image->getClientOriginalName();  
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image_file_name = $filename.'_'.time().'.'.$extension;
            $destinationPath = public_path('/ibucare-img/thumb');
            
            
            $img = Image::make($image->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_file_name);

            $destinationPath = public_path('ibucare-img/main-img');
            $image->move($destinationPath, $image_file_name);
            $input['img_file'] = $image_file_name;
            
        }
        $ibucare_add = IbuCare::create($input);
        if ($ibucare_add){
            return redirect('manage-ibucare')->with('success','Ibucare added successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !');
    }

    public function edit($id){
        $ibucare_edit = IbuCare::find($id);
        return view('backend.manage-ibucare.edit' , compact('ibucare_edit'));
    }

    public function update(Request $request){
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'ibucare_name' => 'required',
            'ibucare_description' => 'required',
            
        ]);
        $ibucare_row = IbuCare::find($request->ibucare_id_hidden);
        $input['title'] = $request->input('ibucare_name');
        $input['description'] = $request->input('ibucare_description');
        $input['user_id'] = $user_id;
        if ($request->hasFile('ibucare_image')){
            $image = $request->file('ibucare_image');
            $filenameWithExt = $image->getClientOriginalName();  
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image_file_name = $filename.'_'.time().'.'.$extension;
            $destinationPath = public_path('/ibucare-img/thumb');
            /*Unlink image*/
            $destination_path_thumb = public_path('/ibucare-img/thumb/');
            $destination_path_main_img_ = public_path('/ibucare-img/main-img/');
            $file_old_thumb = $destination_path_thumb.$ibucare_row->img_file;
            $file_old_main = $destination_path_main_img_.$ibucare_row->img_file;
            unlink($file_old_thumb);
            unlink($file_old_main);
            /*Unlink image*/
            
            $img = Image::make($image->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_file_name);

            $destinationPath = public_path('ibucare-img/main-img');
            $image->move($destinationPath, $image_file_name);
            $input['img_file'] = $image_file_name;
        }
        $ibucare_row_update = $ibucare_row->update($input);
        if ($ibucare_row_update){
            return redirect('manage-ibucare')->with('success','Ibucare updated successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
        return redirect()->back()->with('error','Somthings went wrong please try again !');
    }

    public function delete($id){
        $ibucare_row = IbuCare::find($id);
        /*Unlink image*/
        $destination_path_thumb = public_path('/ibucare-img/thumb/');
        $destination_path_main_img_ = public_path('/ibucare-img/main-img/');
        $file_old_thumb = $destination_path_thumb.$ibucare_row->img_file;
        $file_old_main = $destination_path_main_img_.$ibucare_row->img_file;
        unlink($file_old_thumb);
        unlink($file_old_main);
        /*Unlink image*/
        $ibucare_row->delete();
        return redirect('manage-ibucare')->with('success','Ibucare deleted successfully !');
    }
}
