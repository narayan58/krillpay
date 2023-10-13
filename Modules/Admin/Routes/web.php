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

Route::prefix('backoffice')->group(function() {
    Route::get('/', 'AdminLoginController@login')->name('login.page');
    Route::get('newsletter/{id}', 'AdminNewsletterController@show')->name('newsletterdetail');
    Route::post('login', 'AdminLoginController@loginCheck')->name('logincheck');
});

Route::prefix('backoffice')->middleware(['adminlogincheck','roles'])->group(function() {
        Route::get('registeruser', 'AdminLoginController@userRegister')->name('user.create');
        Route::post('registeruser', 'AdminLoginController@userRegisterData')->name('userregister');
        Route::get('dashboard', 'AdminDashboardController@dashboard')->name('dashboard');
        Route::get('user/list', 'AdminLoginController@adminUserList')->name('user.list');
        Route::get('user/{id}/edit', 'AdminLoginController@editUser')->name('user.edit');
        Route::any('updateuser/{id}', 'AdminLoginController@updateuser')->name('user.update');
        Route::get('user/delete/{id}', ['as' => 'user.delete', 'uses' => 'AdminLoginController@deleteUser']);   
        Route::any('logout', 'AdminLoginController@logout')->name('logout');

        Route::any('updateuserprofile/{id}', 'AdminProfileController@updateuser')->name('userprofile.update');
        Route::get('userprofile/{id}/edituserprofile', 'AdminProfileController@editUserProfile')->name('userprofile.editprofile');
    

        Route::get('success-login', 'AdminSiteSettingController@successLogin')->name('successlogin');
        Route::get('fail-login', 'AdminSiteSettingController@failLogin')->name('faillogin');
        Route::get('menu', 'AdminMenuController@index')->name('menu');

        // User Group
        Route::resource('usergroup', 'AdminGroupController');
        Route::get('usergroup/delete/{id}', ['as' => 'usergroup.delete', 'uses' => 'AdminGroupController@destroy']);

        // Role Access
        Route::resource('role-access', 'AdminRoleAccessController');
        Route::get('role-access/delete/{id}', ['as' => 'role-access.delete', 'uses' => 'AdminRoleAccessController@destroy']);
        Route::get('roleChangeAccess/{allowId}/{id}','AdminRoleAccessController@changeAccess');
        Route::get('setting','AdminSiteSettingController@setting')->name('setting');
        Route::post('setting-update','AdminSiteSettingController@updateSetting')->name('update.setting');

        // slider
        Route::resource('slider', 'AdminSliderController');
        Route::get('slider/delete/{id}', ['as' => 'slider.delete', 'uses' => 'AdminSliderController@destroy']);

        // others
        Route::get('medialibrary', 'AdminDashboardController@mediaLibrary')->name('medialibrary');
        Route::any('ajax/drag-drop-sorting', 'AdminAjaxController@postDragDropSorting')->name('ajax.sorting');
        Route::any('module-url','AdminAjaxController@moduleUrl')->name('moduleUrl');

        // Contact
        Route::resource('contact', 'AdminContactController');
        Route::get('contact/delete/{id}', ['as' => 'contact.delete', 'uses' => 'AdminContactController@destroy']);
        Route::get('mailing-list', 'AdminContactController@mailinglist')->name('mailinglist');

        // category
        Route::resource('category', 'AdminCategoryController');
        Route::get('category/delete/{id}', ['as' => 'category.delete', 'uses' => 'AdminCategoryController@destroy']);

        // author
        Route::resource('author', 'AdminAuthorController');
        Route::get('author/delete/{id}', ['as' => 'author.delete', 'uses' => 'AdminAuthorController@destroy']);

        // partner
        Route::resource('partner', 'AdminPartnerController');
        Route::get('partner/delete/{id}', ['as' => 'partner.delete', 'uses' => 'AdminPartnerController@destroy']);

        // service
        Route::resource('service', 'AdminServiceController');
        Route::get('service/delete/{id}', ['as' => 'service.delete', 'uses' => 'AdminServiceController@destroy']);

        // service
        Route::resource('feature', 'AdminFeatureController');
        Route::get('feature/delete/{id}', ['as' => 'feature.delete', 'uses' => 'AdminFeatureController@destroy']);

        // value
        Route::resource('value', 'AdminValueController');
        Route::get('value/delete/{id}', ['as' => 'value.delete', 'uses' => 'AdminValueController@destroy']);

        // posts
        Route::resource('posts', 'AdminPostsController');
        Route::get('posts/delete/{id}', ['as' => 'posts.delete', 'uses' => 'AdminPostsController@destroy']);

        // Pages
        Route::resource('pages', 'AdminPagesController');
        Route::get('pages/delete/{id}', ['as' => 'pages.delete', 'uses' => 'AdminPagesController@destroy']);

        // FAQ
        Route::resource('faq', 'AdminFaqController');
        Route::get('faq/delete/{id}', ['as' => 'faq.delete', 'uses' => 'AdminFaqController@destroy']);

        // country
        Route::resource('country', 'AdminCountryController');
        Route::get('country/delete/{id}', ['as' => 'country.delete', 'uses' => 'AdminCountryController@destroy']);

        // study-abroad
        Route::resource('study-abroad', 'AdminStudyAbroadController');
        Route::get('study-abroad/delete/{id}', ['as' => 'study-abroad.delete', 'uses' => 'AdminStudyAbroadController@destroy']);

        // why-choose
        Route::resource('why-choose', 'AdminWhyChooseController');
        Route::get('why-choose/delete/{id}', ['as' => 'why-choose.delete', 'uses' => 'AdminWhyChooseController@destroy']);

        // workings
        Route::resource('working', 'AdminWorkingController');
        Route::get('working/delete/{id}', ['as' => 'working.delete', 'uses' => 'AdminWorkingController@destroy']);
        
        // testimonial
        Route::resource('testimonial', 'AdminTestimonialController');
        Route::get('testimonial/delete/{id}', ['as' => 'testimonial.delete', 'uses' => 'AdminTestimonialController@destroy']);
        
        // event
        Route::resource('event', 'AdminEventController');
        Route::get('event/delete/{id}', ['as' => 'event.delete', 'uses' => 'AdminEventController@destroy']);
        
        // university
        Route::resource('university', 'AdminUniversityController');
        Route::get('university/delete/{id}', ['as' => 'university.delete', 'uses' => 'AdminUniversityController@destroy']);
        
        // certificate
        Route::resource('certificate', 'AdminCertificateController');
        Route::get('certificate/delete/{id}', ['as' => 'certificate.delete', 'uses' => 'AdminCertificateController@destroy']);
        
        // scholarship-offer
        Route::resource('scholarship-offer', 'AdminScholarshipOfferController');
        Route::get('scholarship-offer/delete/{id}', ['as' => 'scholarship-offer.delete', 'uses' => 'AdminScholarshipOfferController@destroy']);
        
        // branch
        Route::resource('branch', 'AdminBranchController');
        Route::get('branch/delete/{id}', ['as' => 'branch.delete', 'uses' => 'AdminBranchController@destroy']);
        
        // team
        Route::resource('team', 'AdminTeamController');
        Route::get('team/delete/{id}', ['as' => 'team.delete', 'uses' => 'AdminTeamController@destroy']);

        // newsletter
        Route::get('newsletter/email-list', ['as' => 'newsletter.emaillist', 'uses' => 'AdminNewsletterController@emailList']);
        Route::resource('newsletter', 'AdminNewsletterController');
        Route::get('newsletter/resendmail/{id}', ['as' => 'newsletter.resendmail', 'uses' => 'AdminNewsletterController@resendMail']);

});
