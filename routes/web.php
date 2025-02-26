<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HighlightController;
use App\Http\Controllers\InitiativeController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\MebershipSection2Controller;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\MemberShipsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\Section1Controller;
use App\Http\Controllers\Section2Controller;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Support1Controller;
use App\Http\Controllers\Support2Controller;
use App\Http\Controllers\Support3Controller;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserAuthcontroller;
use App\Http\Controllers\WorkstreamController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

//User Page    
Route::get('/', [UserAuthController::class, 'home']);
//About Page    
Route::get('/our-about', [UserAuthController::class, 'about']);
//portfolio Page    
Route::get('/portfolio', [UserAuthController::class, 'portfolio']);
//services Page    
Route::get('/services', [UserAuthController::class, 'services']);
//contact Page    
Route::get('/our_contact', [UserAuthController::class, 'contact']);
//all-members Page    
Route::get('/members', [UserAuthController::class, 'allmembers']);
//all-teams Page    
Route::get('/about/management', [UserAuthController::class, 'teams']);
//all-board Page    
Route::get('/about/board', [UserAuthController::class, 'board']);
//all-news Page    
Route::get('/all-news', [UserAuthController::class, 'news']);
//event Page    
Route::get('/our-event', [UserAuthController::class, 'event']);
//what_we_do Page    
Route::get('/what_we_do', [UserAuthController::class, 'wedo']);
//resources Page    
Route::get('/resources', [UserAuthController::class, 'resources']);
//join_us Page    
Route::get('/join_us', [UserAuthController::class, 'joinus']);
//membership Page    
Route::get('/membership', [UserAuthController::class, 'memberships']);
//membership Page    
Route::get('/support_our_work', [UserAuthController::class, 'supportourwork']);
//join_our_team Page    
Route::get('/join_our_team', [UserAuthController::class, 'joinourteam']);
//to open register page
Route::get("register", [RegisterController::class, "register"]);
//to open login page
Route::get("login", [RegisterController::class, "login"])->name('login');;
//register
Route::post("register",[UserAuthcontroller::class,"register"]);
//Login
Route::post("login",[UserAuthcontroller::class,"login"]);
Route::group([
    "middleware" => ["auth:sanctum"]
],function(){
//Logout
Route::post("logout",[UserAuthcontroller::class,"logout"]);
//to logout normal user
Route::post('logoutuser', [UserAuthcontroller::class, 'logoutuser']);
//to change password
Route::post("changePassword",[UserAuthcontroller::class,"changePassword"]);
});
    Route::group(['middleware' => ['admin.auth'], 'prefix' => 'admin'], function() {
    Route::get("", [UserAuthcontroller::class, "admin"]);
    Route::get("users", [UserAuthcontroller::class, "users"]);
    Route::get("messages", [MessageController::class, "message"]);
    Route::get("website-settings", [SettingsController::class, "websitesettings"]);
    Route::get("add-banner-details", [BannerController::class, "addbannerdetails"]);
    Route::get("add-highlight", [HighlightController::class, "highlight"]);
    Route::get("add-overview", [OverviewController::class, "overview"]);
    Route::get("add-workstream", [WorkstreamController::class, "workstream"]);
    Route::get("add-network", [NetworkController::class, "network"]);
    Route::get("add-Working_Group_Participation", [MemberController::class, "member"]);
    Route::get("add-members", [MembersController::class, "addmembers"]);
    Route::get("add-team", [TeamController::class, "team"]);
    Route::get("add-news", [NewsController::class, "khabar"]);
    Route::get("add-about", [AboutController::class, "about"]);
    Route::get("add-initiative", [InitiativeController::class, "initiative"]);
    Route::get("add-section-1", [Section1Controller::class, "section1"]);
    Route::get("add-section-2", [Section2Controller::class, "section2"]);
    Route::get("add-resource", [ResourceController::class, "resource"]);
    Route::get("add-join", [JoinController::class, "join"]);
    Route::get("add", [MemberShipsController::class, "membership"]);
    Route::get("add-membership-section2", [MebershipSection2Controller::class, "membershipsection2"]);
    Route::get("add-membership-category", [CategoryController::class, "category"]);
    Route::get("add-support-section1", [Support1Controller::class, "support1"]);
    Route::get("add-support-section2", [Support2Controller::class, "support2"]);
    Route::get("add-support-section3", [Support3Controller::class, "support3"]);
    Route::get("add-career-opportunities", [CareerController::class, "career"]);
    Route::get("admin_profile", [SettingsController::class, "adminprofile"]);
});
 
Route::get('/download-prospectus', function () {
    return redirect(asset('pdf/membership_prospectus.pdf'));
});

Route::get('/download-membership', function () {
    return redirect(asset('pdf/membership_policy.pdf'));
});

Route::get('/download-application_form', function () {
    return redirect(asset('pdf/application_form.pdf'));
});

Route::get('/download-fee_schedule', function () {
    return redirect(asset('pdf/fee_schedule.pdf'));
});

//to get user data
Route::post('/get-user-data', [UserAuthcontroller::class, 'getUserData'])->name('user.getData');
//to edit user
Route::post('/users/{id}/edit', [UserAuthController::class, 'editUser']);
//to delet user
Route::post('/delete-user', [UserAuthcontroller::class, 'deleteUser'])->name('delete.user');
// to save customer message
Route::post('/submit-message', [MessageController::class, 'submitMessage'])->name('submit.message');
//to delet msg
Route::post('/delete-message', [MessageController::class, 'deletemessage'])->name('delete.message');
//to chng msg status
Route::post('/update-status', [MessageController::class, 'updateStatus']);
//to add settings
Route::post('/settings/store', [SettingsController::class, 'store'])->name('settings.store');
//to get settings
Route::get('/get-setting/{id}', [SettingsController::class, 'getSetting']);
//to edit settings
Route::post('/update-setting/{id}', [SettingsController::class, 'updateSetting'])->name('update.setting');
//to add banner data
Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
//to get banner data
Route::get('/banner/{id}', [BannerController::class, 'show'])->name('banner.show');
// Update banner data
Route::post('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
//to delet banner
Route::post('/delete-banner', [BannerController::class, 'deletebanner'])->name('delete.banner');
//to add highlight data
Route::post('/highlight/store', [HighlightController::class, 'store'])->name('highlight.store');
//to get highlight data
Route::get('/highlight/{id}', [HighlightController::class, 'show'])->name('highlight.show');
// Update highlight data
Route::post('/highlight/{id}', [HighlightController::class, 'update'])->name('highlight.update');
//to delet highlight
Route::post('/delete-highlight', [HighlightController::class, 'deletehighlight'])->name('delete.highlight');
//to add overview data
Route::post('/overview/store', [OverviewController::class, 'store'])->name('overview.store');
//to get overview data
Route::get('/overview/{id}', [OverviewController::class, 'show'])->name('overview.show');
// Update overview data
Route::post('/overview/{id}', [OverviewController::class, 'update'])->name('overview.update');
//to delet overview
Route::post('/delete-overview', [OverviewController::class, 'deleteoverview'])->name('delete.overview');
//to add workstream data
Route::post('/workstream/store', [WorkstreamController::class, 'store'])->name('workstream.store');
//to get workstream data
Route::get('/workstream/{id}', [WorkstreamController::class, 'show'])->name('workstream.show');
// Update workstream data
Route::post('/workstream/{id}', [WorkstreamController::class, 'update'])->name('workstream.update');
//to delet workstream
Route::post('/delete-workstream', [WorkstreamController::class, 'deleteworkstream'])->name('delete.workstream');
//to add network data
Route::post('/network/store', [NetworkController::class, 'store'])->name('network.store');
//to get network data
Route::get('/network/{id}', [NetworkController::class, 'show'])->name('network.show');
// Update network data
Route::post('/network/{id}', [NetworkController::class, 'update'])->name('network.update');
//to delet network
Route::post('/delete-network', [NetworkController::class, 'deletenetwork'])->name('delete.network');
//to add member data
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
//to get member data
Route::get('/member/{id}', [MemberController::class, 'show'])->name('member.show');
// Update member data
Route::post('/member/{id}', [MemberController::class, 'update'])->name('member.update');
//to delet member
Route::post('/delete-member', [MemberController::class, 'deletemember'])->name('delete.member');
//to add addmember data
Route::post('/addmember/store', [MembersController::class, 'store'])->name('addmember.store');
//to get addmember data
Route::get('/addmember/{id}', [MembersController::class, 'show'])->name('addmember.show');
// Update addmember data
Route::post('/addmember/{id}', [MembersController::class, 'update'])->name('addmember.update');
//to delet addmember
Route::post('/delete-addmember', [MembersController::class, 'deleteaddmember'])->name('delete.addmember');
//to add team data
Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
//to get team data
Route::get('/team/{id}', [TeamController::class, 'show'])->name('team.show');
// Update team data
Route::post('/team/{id}', [TeamController::class, 'update'])->name('team.update');
//to delet team
Route::post('/delete-team', [TeamController::class, 'deleteteam'])->name('delete.team');
//to add khabar data
Route::post('/khabar/store', [NewsController::class, 'store'])->name('khabar.store');
//to get khabar data
Route::get('/khabar/{id}', [NewsController::class, 'show'])->name('khabar.show');
// Update khabar data
Route::post('/khabar/{id}', [NewsController::class, 'update'])->name('khabar.update');
//to delet khabar
Route::post('/delete-khabar', [NewsController::class, 'deletekhabar'])->name('delete.khabar');
//to add about data
Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
//to get about data
Route::get('/about/{id}', [AboutController::class, 'show'])->name('about.show');
// Update about data
Route::post('/about/{id}', [AboutController::class, 'update'])->name('about.update');
//to delet about
Route::post('/delete-about', [AboutController::class, 'deleteabout'])->name('delete.about');
//to add initiative data
Route::post('/initiative/store', [InitiativeController::class, 'store'])->name('initiative.store');
//to get initiative data
Route::get('/initiative/{id}', [InitiativeController::class, 'show'])->name('initiative.show');
// Update initiative data
Route::post('/initiative/{id}', [InitiativeController::class, 'update'])->name('initiative.update');
//to delet initiative
Route::post('/delete-initiative', [InitiativeController::class, 'deleteinitiative'])->name('delete.initiative');
//to add section1 data
Route::post('/section1/store', [Section1Controller::class, 'store'])->name('section1.store');
//to get section1 data
Route::get('/section1/{id}', [Section1Controller::class, 'show'])->name('section1.show');
// Update section1 data
Route::post('/section1/{id}', [Section1Controller::class, 'update'])->name('section1.update');
//to delet section1
Route::post('/delete-section1', [Section1Controller::class, 'deletesection1'])->name('delete.section1');
//to add section2 data
Route::post('/section2/store', [Section2Controller::class, 'store'])->name('section2.store');
//to get section2 data
Route::get('/section2/{id}', [Section2Controller::class, 'show'])->name('section2.show');
// Update section2 data
Route::post('/section2/{id}', [Section2Controller::class, 'update'])->name('section2.update');
//to delet section2
Route::post('/delete-section2', [Section2Controller::class, 'deletesection2'])->name('delete.section2');
//to add resource data
Route::post('/resource/store', [ResourceController::class, 'store'])->name('resource.store');
//to get resource data
Route::get('/resource/{id}', [ResourceController::class, 'show'])->name('resource.show');
// Update resource data
Route::post('/resource/{id}', [ResourceController::class, 'update'])->name('resource.update');
//to delet resource
Route::post('/delete-resource', [ResourceController::class, 'deleteresource'])->name('delete.resource');
//to add join data
Route::post('/join/store', [JoinController::class, 'store'])->name('join.store');
//to get join data
Route::get('/join/{id}', [JoinController::class, 'show'])->name('join.show');
// Update join data
Route::post('/join/{id}', [JoinController::class, 'update'])->name('join.update');
//to delet join
Route::post('/delete-join', [JoinController::class, 'deletejoin'])->name('delete.join');
//to add membership data
Route::post('/membership/store', [MemberShipsController::class, 'store'])->name('membership.store');
//to get membership data
Route::get('/membership/{id}', [MemberShipsController::class, 'show'])->name('membership.show');
// Update membership data
Route::post('/membership/{id}', [MemberShipsController::class, 'update'])->name('membership.update');
//to delet membership
Route::post('/delete-membership', [MemberShipsController::class, 'deletemembership'])->name('delete.membership');
//to add membershipsection2 data
Route::post('/membershipsection2/store', [MebershipSection2Controller::class, 'store'])->name('membershipsection2.store');
//to get membershipsection2 data
Route::get('/membershipsection2/{id}', [MebershipSection2Controller::class, 'show'])->name('membershipsection2.show');
// Update membershipsection2 data
Route::post('/membershipsection2/{id}', [MebershipSection2Controller::class, 'update'])->name('membershipsection2.update');
//to delet membershipsection2
Route::post('/delete-membershipsection2', [MebershipSection2Controller::class, 'deletemembershipsection2'])->name('delete.membershipsection2');
//to add category data
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
//to get category data
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
// Update category data
Route::post('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
//to delet category
Route::post('/delete-category', [CategoryController::class, 'deletecategory'])->name('delete.category');
//to add support1 data
Route::post('/support1/store', [Support1Controller::class, 'store'])->name('support1.store');
//to get support1 data
Route::get('/support1/{id}', [Support1Controller::class, 'show'])->name('support1.show');
// Update support1 data
Route::post('/support1/{id}', [Support1Controller::class, 'update'])->name('support1.update');
//to delet support1
Route::post('/delete-support1', [Support1Controller::class, 'deletesupport1'])->name('delete.support1');
//to add support2 data
Route::post('/support2/store', [Support2Controller::class, 'store'])->name('support2.store');
//to get support2 data
Route::get('/support2/{id}', [Support2Controller::class, 'show'])->name('support2.show');
// Update support2 data
Route::post('/support2/{id}', [Support2Controller::class, 'update'])->name('support2.update');
//to delet support2
Route::post('/delete-support2', [Support2Controller::class, 'deletesupport2'])->name('delete.support2');
//to add support3 data
Route::post('/support3/store', [Support3Controller::class, 'store'])->name('support3.store');
//to get support3 data
Route::get('/support3/{id}', [Support3Controller::class, 'show'])->name('support3.show');
// Update support3 data
Route::post('/support3/{id}', [Support3Controller::class, 'update'])->name('support3.update');
//to delet support3
Route::post('/delete-support3', [Support3Controller::class, 'deletesupport3'])->name('delete.support3');
//to add career data
Route::post('/career/store', [CareerController::class, 'store'])->name('career.store');
//to get career data
Route::get('/career/{id}', [CareerController::class, 'show'])->name('career.show');
// Update career data
Route::post('/career/{id}', [CareerController::class, 'update'])->name('career.update');
//to delet career
Route::post('/delete-career', [CareerController::class, 'deletecareer'])->name('delete.career');
//to open forgot password page
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
//to send reset link
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
//to open reset password page
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
//to reset password
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
//to update profile
Route::post('/update-profile', [SettingsController::class, 'updateProfile'])->name('update.profile');
