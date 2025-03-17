<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FeatureLogoController;
use App\Http\Controllers\Backend\TestimonialsController;
use App\Http\Controllers\Backend\OurWorkController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\IbuCareController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\PermissionsController;

use App\Http\Controllers\Backend\GalleryCategoryController;
use App\Http\Controllers\Backend\GalleryImageController;
use App\Http\Controllers\Backend\HomeGeneralController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('forget/password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget.password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
 // https://dev.to/codeanddeploy/laravel-8-user-roles-and-permissions-step-by-step-tutorial-1dij
//Route::group(['middleware' => ['auth', 'permission']], function() {
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('users');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
        // Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

    

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('manage-profile', [DashboardController::class, 'showProfileUpdateForm'])->name('manage-profile');
    Route::post('manage-profile.update', [DashboardController::class, 'updateProfile'])->name('manage-profile.update');
    Route::get('manage-feature-logo', [FeatureLogoController::class, 'index'])->name('manage-feature-logo');
    Route::group(['prefix' => 'manage-feature-logo'], function(){
        Route::get('add', [FeatureLogoController::class, 'showFeatureLogoForm'])->name('manage-feature-logo.add');
        Route::post('store', [FeatureLogoController::class, 'store'])->name('manage-feature-logo.store');
        Route::get('edit/{id}', [FeatureLogoController::class, 'edit']);
        Route::post('update', [FeatureLogoController::class, 'update'])->name('manage-feature-logo.update');
        Route::get('delete/{id}', [FeatureLogoController::class, 'delete']);
    });

    Route::get('manage-testimonials', [TestimonialsController::class, 'index'])->name('manage-testimonials');
    Route::group(['prefix' => 'manage-testimonials'], function(){
        Route::get('add', [TestimonialsController::class, 'showTestimonialsForm'])->name('manage-testimonials.add');
        Route::post('store', [TestimonialsController::class, 'store'])->name('manage-testimonials.store');
        Route::get('edit/{id}', [TestimonialsController::class, 'edit']);
        Route::post('update', [TestimonialsController::class, 'update'])->name('manage-testimonials.update');
        Route::get('delete/{id}', [TestimonialsController::class, 'delete']);
    });
    Route::get('manage-our-work', [OurWorkController::class, 'index'])->name('manage-our-work');
    Route::group(['prefix' => 'manage-our-work'], function(){
        Route::get('add', [OurWorkController::class, 'showOurWorkForm'])->name('manage-our-work.add');
        Route::post('store', [OurWorkController::class, 'store'])->name('manage-our-work.store');
        Route::get('edit/{id}', [OurWorkController::class, 'edit']);
        Route::post('update', [OurWorkController::class, 'update'])->name('manage-our-work.update');
        Route::get('delete/{id}', [OurWorkController::class, 'delete']);

        
    });
    Route::get('delete-multiple-img/{id}/{ourWorkId}', [OurWorkController::class, 'deleteMultipleImage']);


    Route::get('manage-media', [MediaController::class, 'index'])->name('manage-media');
    Route::post('media-image/sort', [MediaController::class, 'sort'])->name('media-image.sort');
    Route::get('manage-media/add', [MediaController::class, 'showMediaForm'])->name('manage-media.add');
    Route::post('manage-media/store', [MediaController::class, 'store'])->name('manage-media.store');
    Route::get('manage-media/edit/{id}', [MediaController::class, 'edit']);
    Route::post('manage-media/update', [MediaController::class, 'update'])->name('manage-media.update');
    Route::get('manage-media/delete/{id}', [MediaController::class, 'delete']);

    Route::get('manage-blog', [BlogController::class, 'index'])->name('manage-blog');
    Route::group(['prefix' => 'manage-blog'], function(){
        Route::get('add', [BlogController::class, 'showBlogForm'])->name('manage-blog.add');
        Route::post('store', [BlogController::class, 'store'])->name('manage-blog.store');
        Route::get('edit/{id}', [BlogController::class, 'edit']);
        Route::post('update', [BlogController::class, 'update'])->name('manage-blog.update');
        Route::get('delete/{id}', [BlogController::class, 'delete']);
        Route::get('deleteblogimage/{id}/{blogId}', [BlogController::class, 'deleteMultipleImage']);
    });
    Route::get('manage-ibucare', [IbuCareController::class, 'index'])->name('manage-ibucare');
    Route::group(['prefix' => 'manage-ibucare'], function(){
        Route::get('add', [IbuCareController::class, 'showIbuCareForm'])->name('manage-ibucare.add');
        Route::post('store', [IbuCareController::class, 'store'])->name('manage-ibucare.store');
        Route::get('edit/{id}', [IbuCareController::class, 'edit']);
        Route::post('update', [IbuCareController::class, 'update'])->name('manage-ibucare.update');
        Route::get('delete/{id}', [IbuCareController::class, 'delete']);
    });
    Route::resource('gallery-category', GalleryCategoryController::class);
    Route::resource('gallery-image', GalleryImageController::class);
    Route::post('gallery-image/sort', [GalleryImageController::class, 'sort'])->name('gallery-image.sort');

    Route::get('home-slider', [HomeGeneralController::class, 'index'])->name('home-slider');
    Route::post('home-slider', [HomeGeneralController::class, 'store'])->name('home-slider.store');
    Route::get('home-slider/{id}', [HomeGeneralController::class, 'destroy'])->name('home-slider.destroy');
});


Route::get('/', [FrontHomeController::class, 'home'])->name('home');
Route::get('about-us', [FrontHomeController::class, 'aboutUs'])->name('about-us');
Route::get('sponsorship', [FrontHomeController::class, 'sponsorshipPage'])->name('sponsorship');
Route::get('gallery', [FrontHomeController::class, 'gallery'])->name('gallery');

Route::get('gallery-cate-image', [FrontHomeController::class, 'getGalleryCategoryDetails'])->name('gallery-cate-image');
Route::get('media', [FrontHomeController::class, 'mediaPage'])->name('media');
Route::get('registration', [FrontHomeController::class, 'registrationPage'])->name('registration');
Route::get('blog', [FrontHomeController::class, 'blogPage'])->name('blog');
Route::get('blog/{slug}', [FrontHomeController::class, 'blogDetailsPage'])->name('blog.details');
Route::get('contact-us', [FrontHomeController::class, 'contactUsPage'])->name('contact-us');
Route::post('store', [FrontHomeController::class, 'homeEnquirySubmit'])->name('home-enquiry.store');
Route::get('privacy-policy', [FrontHomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('terms-of-use', [FrontHomeController::class, 'termsOfUse'])->name('terms-of-use');
Route::get('disclaimer', [FrontHomeController::class, 'disclaimer'])->name('disclaimer');
Route::get('return-refund', [FrontHomeController::class, 'returnRefund'])->name('return-refund');
