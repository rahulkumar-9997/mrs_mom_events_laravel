<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
    public function index(){
        $data['blog_list'] = Blog::orderBy('id','DESC')->get();        
        return view('backend.manage-blog.index' , compact('data'));
    }

    public function showBlogForm(){
        return view('backend.manage-blog.add');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
       
        try {
            $user_id = Auth::id();
            $validator = Validator::make($request->all(), [
                'blog_title' => 'required',
                'blog_description' => 'nullable',
                'blog_intro_desc' => 'nullable',
                'blog_intro_heading' => 'nullable',
                'blog_post_date' =>'nullable',
                'blog_intro_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
                'blog_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
                'blog_external_url' => 'nullable|url|required_if:blog_external_url_checkbox,1',
            ]);
            
            if ($validator->fails()) {                
                return redirect()->back()->withErrors($validator)->withInput();
            }
            

            $input = [
                'title' => $request->input('blog_title'),
                'intro_description' => $request->input('blog_intro_desc'),
                'blog_description' => $request->input('blog_description') ?: 'No description available.',
                'blog_intro_head' => $request->input('blog_intro_heading'),
                'blog_post_date' => $request->input('blog_post_date') 
                    ? date('Y-m-d', strtotime($request->input('blog_post_date'))) 
                    : now()->format('Y-m-d'), 
                'user_id' => $user_id,
                'is_external' => $request->has('blog_external_url_checkbox') ? 1 : 0,
                'external_url' => $request->input('blog_external_url'),
            ];

            if ($request->hasFile('blog_intro_image')) {
                $intro_image = $request->file('blog_intro_image');
                $sanitized_title = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($request->input('blog_title'))));
                $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                $intro_image_name = 'dr-shilpi-reddy-hyd-'.$sanitized_title . '-' . $uniqueTimestamp . '.webp';
                
                $destinationPath = public_path('storage/blog-img/');
                //public_path('storage/gallery-img/');
                Image::make($intro_image)
                    ->resize(600, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('webp', 70)
                    ->save($destinationPath . '/' . $intro_image_name);

                $input['intro_image'] = $intro_image_name;
            }

            $blog = Blog::create($input);

            /*Handle Multiple Blog Images (if not an external blog)*/
            if (!$input['is_external'] && $request->hasFile('blog_image')) {
                $files = $request->file('blog_image');
                foreach ($files as $file) {
                    $sanitized_title_multiple_image = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->input('blog_title')));
                    $uniqueTimestampMultiple = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_name = 'dr-shilpi-reddy-hyd-'.$sanitized_title_multiple_image . '-' . $uniqueTimestampMultiple . '.webp';
                    $thumbPath = public_path('storage/blog-img/');

                    Image::make($file)->resize(600, 400)->encode('webp', 70)->save($thumbPath . '/' . $image_name);
                    BlogImages::create([
                        'blog_id' => $blog->id,
                        'blog_image' => $image_name,
                    ]);
                }
            }
            DB::commit(); 
            return redirect('manage-blog')->with('success', 'Blog added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            //dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to add blog. ' . $e->getMessage());
        }
        
    }
   
    public function edit($id){
        $blog = Blog::find($id);
        return view('backend.manage-blog.edit' , compact('blog'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $user_id = Auth::id();
            $validator = Validator::make($request->all(), [
                'blog_title' => 'required',
                'blog_description' => 'nullable',
                'blog_intro_heading' => 'nullable',
                'blog_post_date' =>'nullable',
                'blog_intro_desc' => 'nullable',
                'blog_intro_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
                'blog_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
                'blog_external_url' => 'nullable|url|required_if:blog_external_url_checkbox,1',
            ]);
            if ($validator->fails()) {                
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $blog = Blog::findOrFail($request->blog_id_hidden);
            $input = [
                'title' => $request->input('blog_title'),
                'blog_intro_head' => $request->input('blog_intro_heading'),
                'blog_post_date' => date('y-m-d', strtotime($request->input('blog_post_date'))),
                'intro_description' => $request->input('blog_intro_desc'),
                'blog_description' => $request->input('blog_description') ?: 'No description available.',
                'user_id' => $user_id,
                'is_external' => $request->has('blog_external_url_checkbox') ? 1 : 0,
                'external_url' => $request->input('blog_external_url'),
            ];

            // Handle Intro Image Upload
            if ($request->hasFile('blog_intro_image')) {
                $intro_image = $request->file('blog_intro_image');
                $sanitized_title = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(trim($request->input('blog_title'))));
                $uniqueTimestamp = uniqid() . '-' . round(microtime(true) * 1000);
                $intro_image_name = 'dr-shilpi-reddy-hyd-'. $sanitized_title . '-' . $uniqueTimestamp . '.webp';
                $destinationPath = public_path('storage/blog-img/');

                // Resize & Save Image
                Image::make($intro_image)
                    ->resize(600, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('webp', 70)
                    ->save($destinationPath . '/' . $intro_image_name);

                // Delete old intro image if exists
                if (!empty($blog->intro_image) && file_exists(public_path('storage/blog-img/' . $blog->intro_image))) {
                    unlink(public_path('storage/blog-img/' . $blog->intro_image));
                }

                $input['intro_image'] = $intro_image_name;
            }
            $blog->update($input);

            /*Handle Multiple Blog Images (Only if not external)*/
            if (!$input['is_external'] && $request->hasFile('blog_image')) {
                $files = $request->file('blog_image');
                foreach ($files as $file) {
                    $sanitized_title_multiple_image = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->input('blog_title')));
                    $uniqueTimestampMultiple = uniqid() . '-' . round(microtime(true) * 1000);
                    $image_name = 'dr-shilpi-reddy-hyd-'.$sanitized_title_multiple_image . '-' . $uniqueTimestampMultiple . '.webp';
                    $thumbPath = public_path('storage/blog-img/');
                    Image::make($file)->resize(600, 400)->encode('webp', 70)->save($thumbPath . '/' . $image_name);
                    BlogImages::create([
                        'blog_id' => $blog->id,
                        'blog_image' => $image_name,
                    ]);
                }
            }

            DB::commit(); 
            return redirect('manage-blog')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            DB::rollBack(); 
            return redirect()->back()->with('error', 'Failed to update blog. ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $blog_row = Blog::find($id);

            if (!$blog_row) {
                return redirect()->back()->with('error', 'Blog not found!');
            }
            $blog_image_rows = BlogImages::where('blog_id', $blog_row->id)->get();
            if (!empty($blog_row->intro_image)) {
                $intro_image_path = public_path('storage/blog-img/' . $blog_row->intro_image);
                if (file_exists($intro_image_path)) {
                    unlink($intro_image_path);
                }
            }
            foreach ($blog_image_rows as $image) {
                $main_image_path = public_path('storage/blog-img/' . $image->blog_image);
                if (file_exists($main_image_path)) {
                    unlink($main_image_path);
                }
                
                $image->delete();
            }
            $blog_row->delete();
            DB::commit();
            return redirect('manage-blog')->with('success', 'Blog deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete blog. ' . $e->getMessage());
        }
    }



    public function deleteMultipleImage($multiple_image_id, $blog_id){
        $blog_image = BlogImages::find($multiple_image_id);
        /*Unlink image*/
        $destination_path_thumb = public_path('storage/blog-img/');
        $file_old_thumb = $destination_path_thumb.$blog_image->blog_image;
        unlink($file_old_thumb);
        /*Unlink image*/
        $blog_image->delete();
        return redirect('manage-blog/edit/'.$blog_id.'')->with('success','Blog images deleted successfully !');
    }
}
