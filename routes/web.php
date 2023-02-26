<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\Settings\Location\CountryController as country;
use App\Http\Controllers\Settings\Location\DivisionController as division;
use App\Http\Controllers\Settings\Location\DistrictController as district;
use App\Http\Controllers\Settings\Location\UpazilaController as upazila;
use App\Http\Controllers\Settings\Location\ThanaController as thana;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OurMemberController as member;
use App\Http\Controllers\MemberPanel;
use App\Http\Controllers\NoticeController as notice;
use App\Http\Controllers\FacilitiesController as facilities;
use App\Http\Controllers\YearController as year;
use App\Http\Controllers\PhotoGallaryCategoryController as pGalleryCat;
use App\Http\Controllers\PhotoGallaryController as pGallery;
use App\Http\Controllers\VideoGalleryController as vGallery;
use App\Http\Controllers\VideoGallaryCategoryController as vGalleryCat;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\TagController as tag;
use App\Http\Controllers\BlogCategoryController as blogcat;
use App\Http\Controllers\BlogController as blog;
use App\Http\Controllers\BenefitsOfMemberController as benefit;

use App\Http\Controllers\Products\UnitController as unit;

use App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\PageController as page;
use App\Http\Controllers\MediaController as photo;
use App\Http\Controllers\ScrollNoticeController as scrollN;
use App\Http\Controllers\FrontMenuController as frontMenu;
/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isSalesmanager;
use App\Http\Middleware\isSalesman;

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

// Become a member login
Route::get('/memberRegister', [auth::class,'memberSignUpForm'])->name('member_registration');
Route::post('/memberRegister', [auth::class,'memberSignUpStore'])->name('memberRegister.store');
Route::get('/memberLogin', [auth::class,'memberSignInForm'])->name('memberLogin');
Route::post('/memberLogin', [auth::class,'memberSignInCheck'])->name('memberlogin.check');
Route::get('/memberLogOut', [auth::class,'memberSingOut'])->name('memberLogOut');

// Member login
Route::get('/memLogin', [auth::class,'memSignInForm'])->name('memLogin');
Route::post('/memLogin', [auth::class,'memSignInCheck'])->name('memlogin.check');
Route::get('/memLogOut', [auth::class,'memSingOut'])->name('memLogOut');


Route::get('/', [front::class,'index'])->name('front');
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');
Route::get('/benfit_of_membrer', [front::class,'benefit'])->name('member.benefit');
Route::get('/become_a_member', [front::class,'mem_regi'])->name('member.registration');
Route::post('/become_a_member/save', [front::class,'mem_regi_store'])->name('member.registration.store');
Route::get('/page/{slug}', [front::class,'page'])->name('front.page');
Route::get('memberlist', [MemberPanel::class,'memberlist'])->name('member.list');
Route::get('pGallery', [photo::class,'pGallery'])->name('pGallery');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);
        Route::resource('country',country::class,['as'=>'admin']);
        Route::resource('division',division::class,['as'=>'admin']);
        Route::resource('district',district::class,['as'=>'admin']);
        Route::resource('upazila',upazila::class,['as'=>'admin']);
        Route::resource('thana',thana::class,['as'=>'admin']);
        Route::resource('unit',unit::class,['as'=>'admin']);
        Route::resource('slider',SliderController::class,['as'=>'admin']);
        Route::resource('ourMember',member::class,['as'=>'admin']);
        Route::resource('notice',notice::class,['as'=>'admin']);
        Route::resource('facilities',facilities::class,['as'=>'admin']);
        Route::resource('year',year::class,['as'=>'admin']);
        Route::resource('pGalleryCat',pGalleryCat::class,['as'=>'admin']);
        Route::resource('pGallery',pGallery::class,['as'=>'admin']);
        Route::resource('settings',settings::class,['as'=>'admin']);
        Route::resource('tag',tag::class,['as'=>'admin']);
        Route::resource('vgallery',vGallery::class,['as'=>'admin']);
        Route::resource('vgalleryCat',vGalleryCat::class,['as'=>'admin']);
        Route::resource('blogcategory',blogcat::class,['as'=>'admin']);
        Route::resource('blog',blog::class,['as'=>'admin']);
        Route::resource('benefit',benefit::class,['as'=>'admin']);
        Route::resource('scrollN',scrollN::class,['as'=>'admin']);
        Route::resource('page',page::class,['as'=>'admin']);
        Route::post('image-upload', [page::class, 'storeImage'])->name('image.upload');
        Route::get('front_menu', [frontMenu::class, 'index'])->name('admin.front_menu.index');
        Route::post('menu_save_update/{id?}', [frontMenu::class, 'save_update'])->name('admin.front_menu.save');
        Route::get('front_menu/mss', [frontMenu::class, 'mss'])->name('admin.front_menu.mss');
        Route::get('front_menu/delete/{id}', [frontMenu::class, 'destroy'])->name('admin.front_menu.detroy');

    });
});

Route::group(['middleware'=>isOwner::class],function(){
    Route::prefix('owner')->group(function(){
        Route::get('/dashboard', [dash::class,'ownerDashboard'])->name('owner.dashboard');
        Route::resource('users',user::class,['as'=>'owner']);
    });
});

Route::group(['middleware'=>isSalesmanager::class],function(){
    Route::prefix('salesmanager')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanagerDashboard'])->name('salesmanager.dashboard');

    });
});

Route::group(['middleware'=>isSalesman::class],function(){
    Route::prefix('salesman')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanDashboard'])->name('salesman.dashboard');

    });
});
Route::group(['middleware'=>isMember::class],function(){
    Route::prefix('member')->group(function(){
        Route::get('/loggedMem', [dash::class,'memDashboard'])->name('member.memdashboard');
        Route::get('/loggedMember', [dash::class,'memberDashboard'])->name('member.dashboard');
        Route::get('/profile', [MemberPanel::class,'memberProfile'])->name('member.profile');
        Route::post('/profileUpdate/update', [MemberPanel::class,'memberProfileUpdate'])->name('profile.update');
        Route::get('/password_change', [MemberPanel::class,'memberPassword'])->name('member.password');
        Route::post('/password_update', [MemberPanel::class,'mem_pass_update'])->name('member.passwordUpdate');
        Route::get('/memberPrint', [MemberPanel::class,'mem_regi_success'])->name('member.registration.success');

    });
});


