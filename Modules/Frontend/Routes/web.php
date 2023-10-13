<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/c', function() {
    $exitCode = Artisan::call('cache:clear');
    Artisan::call('config:clear');
    $exitCode = Artisan::call('optimize');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return "All cleared";
});

Route::get('/', 'FrontendController@index')->name('index');
Route::get('about', 'FrontendController@about')->name('about');
Route::get('contact', 'FrontendController@contact')->name('contact');
Route::post('/postcontact', 'FrontendController@postContact')->name('postcontact');
Route::post('newsletter', 'FrontendController@newsLetter')->name('newsletter');
Route::get('terms-and-conditions', 'FrontendController@terms')->name('terms');
Route::get('page/{slug}', 'FrontendController@pageDetail')->name('page.detail');
Route::get('faq', 'FrontendController@faq')->name('faq');


Route::get('appointment', 'FrontendController@appointment')->name('appointment');
Route::get('universities', 'FrontendController@universities')->name('universities');
Route::get('university/{slug}', 'FrontendController@universityDetail')->name('university.detail');
Route::get('study-abroad/{slug}', 'FrontendController@studyAbroad')->name('studyAbroad');
Route::get('why-choose', 'FrontendController@whyChoose')->name('whyChoose');
Route::get('testimonial', 'FrontendController@testimonial')->name('testimonial');
Route::get('events', 'FrontendController@events')->name('events');
Route::get('scholarship-offer', 'FrontendController@scholarshipOffers')->name('scholarshipOffer');
Route::get('branch', 'FrontendController@branches')->name('branch');


Route::post('/sub-email-scribe', [\Modules\Frontend\Http\Controllers\FrontendController::class, 'emailSubscription'])->name('sub.email');
