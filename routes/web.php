<?php

use App\Http\Livewire\Aboutus;
use App\Http\Livewire\Accordion;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\Avatar;
use App\Http\Livewire\Background;
use App\Http\Livewire\Badge;
use App\Http\Livewire\Blog;
use App\Http\Livewire\BlogDetails;
use App\Http\Livewire\Border;
use App\Http\Livewire\Breadcrumbs;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Cards;
use App\Http\Livewire\Carousel;
use App\Http\Livewire\ChartChartjs;
use App\Http\Livewire\ChartEchart;
use App\Http\Livewire\ChartFlot;
use App\Http\Livewire\ChartMorris;
use App\Http\Livewire\ChartPeity;
use App\Http\Livewire\ChartSparkline;
use App\Http\Livewire\Chat;
use App\Http\Livewire\CheckOut;
use App\Http\Livewire\Collapse;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\Counters;
use App\Http\Livewire\Display;
use App\Http\Livewire\Draggablecards;
use App\Http\Livewire\Dropdown;
use App\Http\Livewire\EditPost;
use App\Http\Livewire\Emptypage;
use App\Http\Livewire\Error404;
use App\Http\Livewire\Error500;
use App\Http\Livewire\Error501;
use App\Http\Livewire\Extras;
use App\Http\Livewire\Faq;
use App\Http\Livewire\FileAttachedTags;
use App\Http\Livewire\FileDetails;
use App\Http\Livewire\FileManager;
use App\Http\Livewire\FileManager1;
use App\Http\Livewire\Flex;
use App\Http\Livewire\Forgot;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\FormEditor;
use App\Http\Livewire\FormElements;
use App\Http\Livewire\FormLayouts;
use App\Http\Livewire\FormSizes;
use App\Http\Livewire\FormValidation;
use App\Http\Livewire\FormWizards;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Height;
use App\Http\Livewire\Icons;
use App\Http\Livewire\Icons10;
use App\Http\Livewire\Icons11;
use App\Http\Livewire\Icons12;
use App\Http\Livewire\Icons2;
use App\Http\Livewire\Icons3;
use App\Http\Livewire\Icons4;
use App\Http\Livewire\Icons5;
use App\Http\Livewire\Icons6;
use App\Http\Livewire\Icons7;
use App\Http\Livewire\Icons8;
use App\Http\Livewire\Icons9;
use App\Http\Livewire\ImageCompare;
use App\Http\Livewire\Images;
use App\Http\Livewire\Index;
use App\Http\Livewire\Index1;
use App\Http\Livewire\Index2;
use App\Http\Livewire\Invoice;
use App\Http\Livewire\ListGroup;
use App\Http\Livewire\Lockscreen;
use App\Http\Livewire\Mail;
use App\Http\Livewire\MailCompose;
use App\Http\Livewire\MailRead;
use App\Http\Livewire\MailSettings;
use App\Http\Livewire\MapLeaflet;
use App\Http\Livewire\MapVector;
use App\Http\Livewire\Margin;
use App\Http\Livewire\MediaObject;
use App\Http\Livewire\Modals;
use App\Http\Livewire\Navigation;
use App\Http\Livewire\Notification;
use App\Http\Livewire\Padding;
use App\Http\Livewire\Pagination;
use App\Http\Livewire\Popover;
use App\Http\Livewire\Position;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\ProductCart;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\Profile;
use App\Http\Livewire\ProfileNotifications;
use App\Http\Livewire\Progress;
use App\Http\Livewire\Rangeslider;
use App\Http\Livewire\Rating;
use App\Http\Livewire\Reset;
use App\Http\Livewire\Search;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Signin;
use App\Http\Livewire\Signup;
use App\Http\Livewire\Spinners;
use App\Http\Livewire\SweetAlert;
use App\Http\Livewire\Switcherpage;
use App\Http\Livewire\TableBasic;
use App\Http\Livewire\TableData;
use App\Http\Livewire\Tabs;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Thumbnails;
use App\Http\Livewire\Timeline;
use App\Http\Livewire\Toast;
use App\Http\Livewire\Todotask;
use App\Http\Livewire\Tooltip;
use App\Http\Livewire\Treeview;
use App\Http\Livewire\Typography;
use App\Http\Livewire\Underconstruction;
use App\Http\Livewire\Userlist;
use App\Http\Livewire\WidgetNotification;
use App\Http\Livewire\Widgets;
use App\Http\Livewire\Width;
use App\Http\Livewire\WishList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\sebayatregisterController;
use App\Http\Controllers\User\userController;
use App\Http\Controllers\Superadmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;





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

## user login
Route::controller(userController::class)->group(function() {
    Route::get('/register', 'userregister')->name('user-register');
    Route::post('store', 'store')->name('store');

    Route::get('/', 'userlogin')->name('userlogin');
    Route::post('user/authenticate', 'userauthenticate')->name('user.authenticate');
    Route::post('user/logout', 'userlogout')->name('userlogout');

});

## admin login
Route::controller(AdminController::class)->group(function() {
        
    Route::get('/admin', 'adminlogin')->name('adminlogin');
    Route::post('admin/authenticate', 'authenticate')->name('adminauthenticate');
    Route::post('admin/logout', 'adminlogout')->name('adminlogout');

});

## super admin login
Route::controller(SuperAdminController::class)->group(function() {
        
    Route::get('superadmin/', 'superadminlogin')->name('login');
    Route::post('superadmin/authenticate', 'authenticate')->name('authenticate');
    Route::get('superadmin/dashboard', 'dashboard')->name('dashboard');
    Route::post('superadmin/logout', 'logout')->name('logout');
});


##super admin routes
Route::prefix('superadmin')->middleware(['superadmin'])->group(function () {
    Route::controller(SuperAdminController::class)->group(function() {
        
        Route::get('superadmin/dashboard', 'dashboard')->name('dashboard');
    });
    Route::get('/addadmin', [SuperAdminController::class, 'addadmin']);
    Route::post('/saveadmin', [SuperAdminController::class, 'saveadmin']);
    Route::get('/editadmin/{id}', [SuperAdminController::class, 'editadmin'])->name('editadmin');
    Route::post('/update/{id}', [SuperAdminController::class, 'update'])->name('update');
    Route::get('/dltadmin/{id}', [SuperAdminController::class, 'dltadmin'])->name('dltadmin');

    Route::get('/adminlist', [SuperAdminController::class, 'adminlist']);
});

## admin routes
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    
    });
    
    Route::controller(sebayatregisterController::class)->group(function () {
        Route::get('/sebayatregister', 'sebayatregister');
        Route::post('/saveregister', 'saveregister')->name('saveregister');
    
        Route::put('/reject/{user_id}', 'reject')->name('admin.reject');
        Route::put('/approve/{user_id}', 'approve')->name('admin.accept');
    // In web.php (routes file)
    Route::post('/add-death-date/{user_id}', 'addDeathDate')->name('admin.addDeathDate');

        Route::get('/sebayatlist', 'sebayatlist')->name('sebayatlist');
        Route::get('/editsebayat/{user_id}', 'editsebayat')->name('editsebayat');
    
        Route::get('/viewsebayat/{user_id}', 'viewsebayat')->name('admin.viewsebayat');
        Route::get('/dltsebayat/{user_id}', 'dltsebayat')->name('dltsebayat');
    
        // Route::put('/childupdate/{id}', 'childupdate');
    
        // Route::put('/updateuserinfo/{userid}', 'updateuserinfo')->name('updateUserInfo');
        // // Route::put('/updatefamilyinfo/{userid}', 'updateFamilyInfo')->name('updateFamilyInfo');
        // Route::put('/update-family-info/{user_id}', 'updateFamilyInfo')->name('updateFamilyInfo');
        // Route::post('/updatechildInfo', 'updateChildInfo')->name('updateChildInfo');
    
        // Route::get('/updatechildstatus/{userid}', 'updatechildstatus')->name('updatechildstatus');
        // // Route::put('/updateidinfo', 'updateIdInfo')->name('updateIdInfo');
        // Route::put('updateIdInfo', 'updateIdInfo')->name('updateIdInfo');
        // Route::get('/updateIdstatus/{userid}', 'updateIdstatus')->name('updateIdstatus');
    
        // Route::put('/updateAddressInfo/{userid}', 'updateAddressInfo')->name('updateAddressInfo');
        // Route::put('/updateBankInfo/{userid}', 'updateBankInfo')->name('updateBankInfo');
    
        // Route::put('/updatenewAddress', 'updatenewAddress')->name('updatenewAddress');
        // Route::put('/updatenewBankInfo', 'updatenewBankInfo')->name('updatenewBankInfo');
    
        // Route::put('/updateotherInfo/{userid}', 'updateotherInfo')->name('updateOtherInfo');
    });
    
});



// user routes
Route::prefix('user')->middleware(['user'])->group(function () {

  
   
    Route::controller(userController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/sebayatregister', 'sebayatregister')->name('user.sebayatregister');
        Route::get('/sebayatprofile', 'sebayatprofile')->name('user.sebayatprofile');

        Route::get('/download-user-image', 'downloadUserImage')->name('download.user.image');


        
    });
    Route::put('/updateuserinfo/{user_id}', [UserController::class, 'updateuserinfo'])->name('user.updateUserInfo');
   
    Route::put('/update-family-info/{user_id}', [userController::class, 'updateFamilyInfo'])->name('user.updateFamilyInfo');
    Route::post('/updatechildInfo', [userController::class, 'updateChildInfo'])->name('user.updateChildInfo');
           
    Route::delete('/updatechildstatus/{id}', [UserController::class, 'updateChildStatus'])->name('user.updateChildStatus');


    Route::put('/updateidinfo', [userController::class, 'updateIdInfo'])->name('user.updateIdInfo');

    Route::delete('/updateIdstatus/{id}', [userController::class, 'updateIdstatus'])->name('user.updateIdstatus');
    
    Route::put('/updateAddressInfo/{user_id}', [userController::class, 'updateAddressInfo'])->name('user.updateAddressInfo');
    Route::put('/updateBankInfo/{user_id}', [userController::class, 'updateBankInfo'])->name('user.updateBankInfo');

    Route::put('/updateSocial/{user_id}', [userController::class, 'updateSocialMedia'])->name('user.updateSocialMedia');
   
    Route::post('/updateotherInfo', [userController::class, 'updateotherInfo'])->name('user.updateOtherInfo');
    Route::delete('/updateSebaStatus/{id}', [userController::class, 'updateSebaStatus'])->name('user.updateSebaStatus');

});
