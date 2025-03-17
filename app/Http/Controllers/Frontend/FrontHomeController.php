<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\FeatureLogo;
use App\Models\Blog;
use App\Models\Media;
use Illuminate\Support\Facades\Log;
use App\Mail\EnquiryMail; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\HomeCarousel;
use App\Models\GalleryCategory;
class FrontHomeController extends Controller
{
    public function home(){
        $data['home_carousel'] = HomeCarousel::orderBy('id', 'DESC')->limit(20)->get();
        $data['blog_list'] = Blog::select('id', 'title' ,'slug', 'blog_description', 'blog_intro_head', 'intro_description', 'intro_image')->inRandomOrder()->limit(3)->get();
	    return view('frontend.index', compact('data'));
    }
    
    public function aboutUs(){
	    return view('frontend.pages.about-us');
    }
    
    public function sponsorshipPage(){
        $data['proud_associates'] = FeatureLogo::orderBy('id', 'DESC')->get();
        return view('frontend.pages.sponsorship', compact('data'));
    }
    
    public function gallery(){
        $data['gallery_category_list'] = GalleryCategory::orderBy('id','DESC')->get();
	    return view('frontend.pages.gallery', compact('data'));
    }

    public function getGalleryCategoryDetails(Request $request)
    {
        
        if (!$request->has('id')) {
            return response()->json(['error' => 'Missing category ID'], 400);
        }
        $category = GalleryCategory::with(['galleryImages' => function ($query) {
            $query->orderBy('sort_order');
        }])->find($request->id);
        if (!$category) {
            Log::error('Gallery Category Not Found: ID ' . $request->id);
            return response()->json(['error' => 'Category not found'], 404);
        }
        //Log::info('Fetched Foundation Category:', ['category' => $category]);
        try {
            $html = view('frontend.pages.partials.gallery-image', [
                'gallery_category' => $category
            ])->render();
        } catch (\Exception $e) {
            Log::error('View Rendering Error: ' . $e->getMessage());
            return response()->json(['error' => 'View rendering failed'], 500);
        }
        return response()->json(['html' => $html]);
    }

    public function mediaPage(){
        $data['media_image_list'] = Media::where('is_image_or_youtube', 0)->orderBy('sort_order', 'asc')->get();
        $data['media_youtube_list'] = Media::where('is_image_or_youtube', 1)->orderBy('sort_order', 'asc')->get(); 
	    return view('frontend.pages.media', compact('data'));
    }

    public function registrationPage(){
	    return view('frontend.pages.registration');
    }
     
    public function blogPage(){
        $data['blog_list'] = Blog::select('id', 'title' ,'slug', 'intro_description', 'intro_image', 'is_external', 'external_url')->orderBy('id','DESC')->get();
        return view('frontend.pages.blog', compact('data'));
    }

    public function blogDetailsPage($slug){
        $blog = Blog::with('images')->where('slug', $slug)->firstOrFail();
        return view('frontend.pages.blog-details', compact('blog'));
    }

    public function contactUsPage(){
        return view('frontend.pages.contact-us');
    }

    public function homeEnquirySubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'email' => 'required|email',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        try {
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'mobile_number' => $request->input('phone_number'),
                'message' => $request->input('message'),
            ];
            Mail::to('rahulkumarmaurya464@gmail.com')->send(new EnquiryMail($data));

            return response()->json([
                'status' => 'success',
                'message' => 'Your enquiry has been sent successfully, Our team contact you shortly.'
            ]);
        } catch (\Exception $e) {
            Log::error('Error mail error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again later.' . $e->getMessage()
            ], 500);
        }
    }

    public function privacyPolicy() {
        return view('frontend.pages.privacy-policy');
    }

    public function termsOfUse() {
        return view('frontend.pages.terms-of-use');
    }

    public function disclaimer() {
        return view('frontend.pages.disclaimer');
    }

    public function returnRefund() {
        return view('frontend.pages.return-refund');
    }

    
    
}
