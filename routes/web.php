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
use App\Http\Controllers\MembershipTypeController as memberType;
use App\Http\Controllers\NoticeController as notice;
use App\Http\Controllers\FacilitiesController as facilities;
use App\Http\Controllers\YearController as year;
use App\Http\Controllers\PhotoGallaryCategoryController as pGalleryCat;
use App\Http\Controllers\PhotoGallaryController as pGallery;
use App\Http\Controllers\VideoGalleryController as vGallery;
use App\Http\Controllers\VideoGallaryCategoryController as vGalleryCat;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\BanklistController as bank;
use App\Http\Controllers\TagController as tag;
use App\Http\Controllers\BlogCategoryController as blogcat;
use App\Http\Controllers\BlogController as blog;
use App\Http\Controllers\BenefitsOfMemberController as benefit;
use App\Http\Controllers\ChangeRequestController as changeReq;
use App\Http\Controllers\ContactUsController as contact;
use App\Http\Controllers\PaymentPurposeController as ppurpose;
use App\Http\Controllers\PaymentsController as payment;
use App\Http\Controllers\ContactReasonController as creason;
use App\Http\Controllers\MemberContactReasonController as mcreason;
use App\Http\Controllers\TermsOfMembershipController as terms;
use App\Http\Controllers\TotalDueController as tdue;
use App\Http\Controllers\FoundingCommitteeController as foundCommittee;
use App\Http\Controllers\CommitteeSessionController as committeeSession;
use App\Http\Controllers\ExecutiveCommitteeController as exeCommittee;
use App\Http\Controllers\Products\UnitController as unit;
// accounts
use App\Http\Controllers\Accounts\MasterAccountController as master;
use App\Http\Controllers\Accounts\SubHeadController as sub_head;
use App\Http\Controllers\Accounts\ChildOneController as child_one;
use App\Http\Controllers\Accounts\ChildTwoController as child_two;
use App\Http\Controllers\Accounts\NavigationHeadViewController as navigate;
use App\Http\Controllers\Accounts\IncomeStatementController as statement;
/*CRM*/
use App\Http\Controllers\CRM\MemberFeeCategoryController as fees_category;
use App\Http\Controllers\CRM\MemberInvoiceController as member_invoice;
use App\Http\Controllers\MembershipPendingController as mPending;
// voucher
use App\Http\Controllers\Vouchers\VoucherController as vouchers;
use App\Http\Controllers\Vouchers\CreditVoucherController as credit;
use App\Http\Controllers\Vouchers\DebitVoucherController as debit;
use App\Http\Controllers\Vouchers\JournalVoucherController as journal;
use App\Http\Controllers\Vouchers\MemberVoucherController as memvervoucher;
use App\Http\Controllers\Vouchers\OnlinePaymentController as onlinepayment;

use App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\PageController as page;
use App\Http\Controllers\MediaController as media;
use App\Http\Controllers\ScrollNoticeController as scrollN;
use App\Http\Controllers\VideoNoticeController as vNotice;
use App\Http\Controllers\FrontMenuController as frontMenu;
/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isSalesmanager;
use App\Http\Middleware\isSalesman;

/* member panel */
use App\Http\Controllers\Mamberpanel\DashboardController as memberdash;
use App\Http\Controllers\Mamberpanel\MemberPanel;
use App\Http\Controllers\Mamberpanel\sslController as sslcz;
use App\Http\Controllers\Mamberpanel\sslSingleController as sslsinglecz;
use App\Http\Controllers\Mamberpanel\AccountReportController as accreport;

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
Route::get('/password-reset', [auth::class,'memberPasswordReset'])->name('passwordReset');

// Member login
Route::get('/mlogin', [auth::class,'memSignInForm'])->name('memLogin');
Route::post('/mlogin', [auth::class,'memSignInCheck'])->name('memlogin.check');
// forget password
Route::get('/forget-password', [MemberPanel::class,'forgetPassword'])->name('forget_password');
Route::post('/forget-password-reset', [MemberPanel::class,'resetPassValidation'])->name('forget_password_reset');
Route::post('/forget-password-otp', [MemberPanel::class,'resetPassOtpCheck'])->name('forget_password_otp');
Route::post('/password-reset-update', [MemberPanel::class,'updateNewPassword'])->name('update_forget_password');

// Contact Us
Route::get('/contact-us', [contact::class,'store'])->name('contact.us');


Route::get('/', [front::class,'index'])->name('front');
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');
Route::get('/benfit_of_membrer', [front::class,'benefit'])->name('member.benefit');
Route::get('/all-notice', [front::class,'allNotice'])->name('all-notice');
Route::get('/news-events-detail{id}', [front::class,'newsEventsDetail'])->name('event_notice_detail');
Route::get('/news-events', [front::class,'newsEvents'])->name('event-notice');
Route::get('event-news-search', [front::class,'nwesSearch'])->name('news.search');
Route::get('/contact_us', [front::class,'contactUs'])->name('contact-Us');
Route::get('/become_a_member', [front::class,'mem_regi'])->name('member.registration');
Route::post('/become_a_member/save', [front::class,'mem_regi_store'])->name('member.registration.store');
Route::get('/page/{slug}', [front::class,'page'])->name('front.page');
Route::get('memberlist', [MemberPanel::class,'memberlist'])->name('member.list');
Route::get('founding-member', [MemberPanel::class,'foundingMember'])->name('foundmember.list');
Route::get('executive-session-member', [MemberPanel::class,'executiveSession'])->name('exe-session-list');
Route::get('/executive-member{slug}', [MemberPanel::class,'executiveMember'])->name('exe-member-list');
Route::get('memberlist/{letter}', [MemberPanel::class,'memberlist'])->name('searchByLetter');
Route::get('terms-condition', [MemberPanel::class,'termsConditon'])->name('terms');

Route::get('/club-dues', [front::class,'club_dues'])->name('club_dues');

// photo and video gallery
Route::get('photo_gallery', [media::class,'pGallery'])->name('pGallery');
Route::get('/album/{slug}', [media::class,'album'])->name('album');
Route::get('/photo/{slug}', [media::class,'photo'])->name('photo');
Route::get('video_gallery', [media::class,'vGallery'])->name('vGallery');
Route::get('/vAlbum/{slug}', [media::class,'videoAlbum'])->name('vAlbum');
Route::get('/video/{slug}', [media::class,'video'])->name('video');

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
        //Route::resource('unit',unit::class,['as'=>'admin']);
        Route::resource('slider',SliderController::class,['as'=>'admin']);
        Route::resource('memberType',memberType::class,['as'=>'admin']);
        Route::resource('ourMember',member::class,['as'=>'admin']);
        Route::resource('notice',notice::class,['as'=>'admin']);
        Route::resource('facilities',facilities::class,['as'=>'admin']);
        Route::resource('year',year::class,['as'=>'admin']);
        Route::resource('pGalleryCat',pGalleryCat::class,['as'=>'admin']);
        Route::resource('pGallery',pGallery::class,['as'=>'admin']);
        Route::get('pGallerydelete', [pGallery::class, 'delete'])->name('admin.image.delete'); 
        
        Route::resource('settings',settings::class,['as'=>'admin']);
        Route::resource('bank',bank::class,['as'=>'admin']);
        Route::resource('tag',tag::class,['as'=>'admin']);
        Route::resource('vgallery',vGallery::class,['as'=>'admin']);
        Route::resource('vgalleryCat',vGalleryCat::class,['as'=>'admin']);
        Route::resource('blogcategory',blogcat::class,['as'=>'admin']);
        Route::resource('blog',blog::class,['as'=>'admin']);
        Route::resource('benefit',benefit::class,['as'=>'admin']);
        Route::resource('ppurpose',ppurpose::class,['as'=>'admin']);
        Route::resource('payment',payment::class,['as'=>'admin']);
        Route::resource('creason',creason::class,['as'=>'admin']);
        Route::resource('mcreason',mcreason::class,['as'=>'admin']);
        Route::resource('contact',contact::class,['as'=>'admin']);
        Route::resource('changeReq',changeReq::class,['as'=>'admin']);
        Route::resource('terms',terms::class,['as'=>'admin']);
        Route::resource('scrollN',scrollN::class,['as'=>'admin']);
        Route::resource('vNotice',vNotice::class,['as'=>'admin']);
        Route::resource('tdue',tdue::class,['as'=>'admin']);
        Route::resource('foundCommittee',foundCommittee::class,['as'=>'admin']);
        Route::resource('committeeSession',committeeSession::class,['as'=>'admin']);
        Route::resource('exeCommittee',exeCommittee::class,['as'=>'admin']);
        Route::resource('page',page::class,['as'=>'admin']);
        Route::post('image-upload', [page::class, 'storeImage'])->name('image.upload');
        
        
        Route::get('approved-member', [member::class, 'approvedMember'])->name('admin.approve_member');
        Route::get('sms-to-member', [member::class, 'smsToMember'])->name('admin.sms_to_member');
        Route::post('sms-to-member-success', [member::class, 'sendSmsToMember'])->name('admin.sms_to_member_success');
        Route::get('member-contact-list', [contact::class, 'memberContact'])->name('admin.member_contact');
        Route::get('member-contact-delete/{id}', [contact::class, 'memberContactDelete'])->name('admin.member_contact_delete');
        Route::get('front_menu', [frontMenu::class, 'index'])->name('admin.front_menu.index');
        Route::post('menu_save_update/{id?}', [frontMenu::class, 'save_update'])->name('admin.front_menu.save');
        Route::get('front_menu/mss', [frontMenu::class, 'mss'])->name('admin.front_menu.mss');
        Route::get('front_menu/delete/{id}', [frontMenu::class, 'destroy'])->name('admin.front_menu.detroy');

        //member search
        Route::get('/member-search', [foundCommittee::class,'search'])->name('admin.member_search');
        Route::get('/member_search_data', [foundCommittee::class,'member_search_data'])->name('admin.member_search_data');

        //Accounts
        Route::resource('master',master::class,['as'=>'admin']);
        Route::resource('sub_head',sub_head::class,['as'=>'admin']);
        Route::resource('child_one',child_one::class,['as'=>'admin']);
        Route::resource('child_two',child_two::class,['as'=>'admin']);
        Route::resource('navigate',navigate::class,['as'=>'admin']);
        
        Route::get('onlinepayment',[onlinepayment::class,'index'])->name('admin.onlinepayment');
        Route::get('onlinepayment/accepted',[onlinepayment::class,'accepted'])->name('admin.onlinepayment.accepted');
        Route::get('onlinepayment/update_status/{id}/{status}',[onlinepayment::class,'update_status'])->name('admin.onlinepayment.update_status');
        
        Route::resource('fees_category',fees_category::class,['as'=>'admin']);
        Route::resource('member-invoice',member_invoice::class,['as'=>'admin']);
        Route::post('member-invoice/pay/{id}', [member_invoice::class, 'pay_now'])->name('admin.member-invoice.pay_now');
        Route::get('/get-member', [member_invoice::class, 'getMember'])->name('admin.getMember');
        Route::resource('mPending',mPending::class,['as'=>'admin']);
        Route::get('/get-member-fee', [mPending::class, 'get_member_fee'])->name('admin.getMemberFee');
        Route::get('/get-member-pay', [mPending::class, 'get_members'])->name('admin.get_member_pay');

        Route::get('incomeStatement',[statement::class,'index'])->name('admin.incomeStatement');
        Route::get('incomeStatement_details',[statement::class,'details'])->name('admin.incomeStatement.details');

        //Voucher
        Route::resource('credit_voucher',credit::class,['as'=>'admin']);
        Route::resource('debit_voucher',debit::class,['as'=>'admin']);
        Route::resource('journal_voucher',journal::class,['as'=>'admin']);
        Route::resource('member_voucher',memvervoucher::class);
        Route::get('get_head', [vouchers::class, 'get_head'])->name('get_head');

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
Route::post('/deposit/ssl/notify', [sslcz::class,'notify'])->name('deposit.ssl.notify');
Route::post('/deposit/ssl/cancel', [sslcz::class,'cancel'])->name('deposit.ssl.cancel');

Route::post('/single_invoice/ssl/notify', [sslsinglecz::class,'notify'])->name('single_invoice.ssl.notify');
Route::post('/single_invoice/ssl/cancel', [sslsinglecz::class,'cancel'])->name('single_invoice.ssl.cancel');

Route::group(['middleware'=>isMember::class],function(){
    Route::prefix('member')->group(function(){
        Route::get('/loggedMem', [memberdash::class,'memDashboard'])->name('member.memdashboard');
        Route::get('/loggedMember', [memberdash::class,'memberDashboard'])->name('member.dashboard');
        Route::get('/profile', [MemberPanel::class,'memberProfile'])->name('member.profile');
        Route::get('/member-profile', [MemberPanel::class,'approveMemberProfile'])->name('member.approveMember');
        Route::post('/profileUpdate/update', [MemberPanel::class,'memberProfileUpdate'])->name('profile.update');
        Route::get('/password_change', [MemberPanel::class,'memberPassword'])->name('member.password');
        Route::get('/member-password-change', [MemberPanel::class,'memPassword'])->name('member.memPassword');
        Route::post('/password_update', [MemberPanel::class,'mem_pass_update'])->name('member.passwordUpdate');
        Route::get('/memberPrint', [MemberPanel::class,'mem_regi_success'])->name('member.registration.success');
        Route::get('/bank-list', [MemberPanel::class,'bankList'])->name('member.bank');
        Route::get('/online-help', [MemberPanel::class,'helpDesk'])->name('member.help');
        Route::get('/change-request', [MemberPanel::class,'changeRequest'])->name('member.request');
        Route::post('/online-help-submited', [MemberPanel::class,'memberContactUs'])->name('member.help.store');
        Route::get('/member-due-view', [MemberPanel::class,'member_due'])->name('member.member_due_view');
        
        Route::resource('changeReq',changeReq::class,['as'=>'member']);
        Route::get('/pending-request', [changeReq::class,'pendingRequest'])->name('member.pending_request');
        Route::get('/request-history', [changeReq::class,'requetHistory'])->name('member.request_history');
        /* online payment */
        // ssl Routes
        Route::get('/deposit/ssl/submit', [sslcz::class,'store'])->name('deposit.ssl.submit');
        Route::get('/single_invoice/ssl/submit/{id}', [sslsinglecz::class,'store'])->name('single_invoice.ssl.submit');
        /**account report */
        Route::get('/account-statement', [accreport::class,'statement'])->name('member.account_statement');
        Route::get('/online-payment-history', [accreport::class,'onlinePaymentHistory'])->name('member.online_payment_history');
        Route::get('/online-payment-invoice/{id}', [accreport::class,'paymentInvoice'])->name('member.online_payment_invoice');
        Route::get('/money-receipt/{id}', [accreport::class,'moneyReceipt'])->name('member.money_receipt');
        Route::get('/member-invoice-view/{id}', [accreport::class,'memberInvoice'])->name('member.member_invoice_view');

    });
});


