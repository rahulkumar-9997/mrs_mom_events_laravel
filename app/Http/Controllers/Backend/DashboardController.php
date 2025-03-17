<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FeatureLogo;
use App\Models\Testimonials;
use App\Models\OurWork;
use App\Models\Media;
use App\Models\IbuCare;
use Image;
use DB;
class DashboardController extends Controller
{
    public function index(){
        $data['feature_logo_list'] = FeatureLogo::count();
        $data['testimonials_list'] = Testimonials::count();
        $data['our_work_list'] = OurWork::count();
        $data['media_image_list'] = Media::count();       
        $data['ibucare_list'] = IbuCare::count();       
        return view('backend.dashboard.index', compact('data'));
    }

    public function showProfileUpdateForm(){
        $user = Auth::user();
        return view('backend.profile.index' , compact('user'));
    }

    public function updateProfile(Request $request){
        $user_id = Auth::user()->id;
        
        // $this->validate($request, [
        //     'profile_name' => ['nullable', 'required'],
        //     'mobile_number' =>  ['nullable', 'required|numeric|digits:10'],
        //     //'profile_photo' =>  ['nullable', 'required'],
        //     'update_password' =>  ['nullable', 'required|digits:8'],
        // ]);

        $input['name'] = $request->input('profile_name');
        $input['phone_number'] = $request->input('mobile_number');
       
        $user_row = User::find($user_id);
        if ($request->hasFile('profile_photo')){
            $image = $request->file('profile_photo');
            $filenameWithExt = $image->getClientOriginalName();  
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $image_file_name = $filename.'_'.time().'.'.$extension;
            $destinationPath = public_path('/profile-img/');
            $destination_path_thumb = public_path('/profile-img/');
            $destination_path_main_img_ = public_path('/profile-img/');
            /*Unlink image*/
            // $file_old_thumb = $destination_path_thumb.$user_row->profile_img;
            $file_old_main = $destination_path_main_img_.$user_row->profile_img;
            if($file_old_main){
                unlink($file_old_main);
            }
            /*Unlink image*/
            $img = Image::make($image->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$image_file_name);
            $destinationPath = public_path('profile-img');
            $image->move($destinationPath, $image_file_name);
            $input['profile_img'] = $image_file_name;
        }
        $image_upload = $user_row->update($input);
        if($request->input('current_password') && $request->input('new_password')){
            $auth = Auth::user();
            if (!Hash::check($request->get('current_password'), $auth->password)) 
            {
                return back()->with('error', "Current Password is Invalid");
            }
                        
            if (strcmp($request->get('current_password'), $request->new_password) == 0) 
            {
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }
            $user =  User::find($auth->id);
            $user->password =  Hash::make($request->new_password);
            $user->save();
            return back()->with('success', "Password Changed Successfully");
        }
 

        if ($image_upload){
            return redirect('manage-profile')->with('success','Profile updated successfully');
        }else{
            return redirect()->back()->with('error','Somthings went wrong please try again !.');
        }
    }
}
