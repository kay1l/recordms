<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ClerkController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UnitHeadController;
use App\Http\Controllers\UnitHeadMatrixController;
use App\Http\Controllers\MatrixAdminController;
use App\Http\Controllers\DownloadAdminController;
use App\Http\Controllers\DownloadUheadController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\OverViewController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\FileController;

use Illuminate\Support\Facades\Route;
use App\Models\Hero;

Route::get('/', function () {
    $heroes = Hero::where('status', 1)->get();
    return view('welcome', compact('heroes'));
});

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:Admin'])->group(function () {
    //admin Routes

    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfileView'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::post('/admin/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');
    Route::get('/manage/users/', [AdminController::class, 'UserManagement'])->name('manage.user');
    Route::get('/user/view/{id}', [AdminController::class, 'UserView'])->name('user.view');
    Route::post('/user/change/role', [AdminController::class, 'ChangeUserRole'])->name('user.change.role');
    Route::get('permission/user', [AdminController::class, 'change_permission'])->name('permission');


    Route::get('college/management', [CollegeController::class, 'CollegeManange'])->name('college.manage');
    Route::post('college/store', [CollegeController::class, 'CollegeStore'])->name('college.store');
    // Route::post('college/status/{collegeCode}', [CollegeController::class, 'CollegeStatus'])->name('college.change.status');
    Route::put('/college/toggle-status/{collegeCode}', [CollegeController::class, 'update'])->name('college.update');

    Route::get('/department', [ProgramController::class, 'ProgramManage'])->name('program.manage');
    Route::post('/department/store', [ProgramController::class, 'ProgramStore'])->name('program.store');
    // Route::post('/program/status/{programId}', [ProgramController::class, 'ProgramStatus'])->name('program.change.status');
    Route::put('/department/toggle-status/{programId}', [ProgramController::class, 'update'])->name('program.update');

   Route::get('/matrix-admin', [MatrixAdminController::class, 'Matrix'])->name('matrix');
   Route::get('/matrix-result-admin', [MatrixAdminController::class, 'MatrixResult'])->name('MatrixResult');
   Route::get('/get-activities/admin/progress/{activityCode}', [MatrixAdminController::class, 'AdmingetActivityProgress'])->name('activity.progress.admin');

   Route::get('/activities/management-admin', [ActivityController::class, 'AdminActivityManage'])->name('admin.activity.manage');
   Route::post('activity/store-admin', [ActivityController::class, 'AdminActivityStore'])->name('admin.activity.store');

   Route::put('/activities/admin/update/{activityCode}/', [ActivityController::class, 'activityUpdate'])->name('admin.activity.update');
   Route::get('/getProponentsdirector/{collegeCode}', [ActivityController::class, 'getProponentdirector'])->name('get.proponent.director');
   Route::get('/activities/matrix-admin', [ActivityController::class, 'ActivitiesMatrix'])->name('activities.matrix');
   Route::get('/download-admin-pdf/{activityCode}', [DownloadAdminController::class, 'downloadPdf'])->name('downloadPdf.admin');

   Route::get('admin/download/{filePath}', [MatrixAdminController::class, 'admindownloadFile'])->name('file.download.admin');
   Route::get('admin/overview', [OverViewController::class, 'index'])->name('admin.overview');
   Route::get('activity/overview/', [OverViewController::class, 'show'])->name('overview.result');

   Route::get('generate-report/summary/{year}', [AdminReportController::class, 'generate'])->name('summary.pdf');

   // Only allow the director to manage clerk download permissions
    Route::post('/file-permissions/{id}', [FileController::class, 'updateDownloadPermission'])
    ->name('file-permissions.update')
    ->middleware(['auth', 'role:Admin']);

    Route::post('/clear-file/admin', [MatrixAdminController::class, 'clearFile'])->name('file.clear.admin');
    Route::post('/uploadFileMatrix/admin/{activityCode}', [MatrixAdminController::class, 'uploadFileMatrixAdmin'])->name('uploadFileMatrixAdmin');
    Route::get('/get-activity-progress/{activityCode}', [MatrixAdminController::class, 'getActivityProgress'])->name('admin.activity.progress');
    //end admin routes
});



Route::middleware(['auth', 'role:Clerk'])->group(function () {

    Route::get('/clerk/dashboard', [ClerkController::class, 'ClerkDashboard'])->name('clerk.dashboard');
    Route::get('/clerk-logout', [ClerkController::class, 'ClerkLogout'])->name('clerk.logout');
    Route::get('/clerk/profile', [ClerkController::class, 'ClerkProfile'])->name('clerk.profile');
    Route::post('/clerk/profile/update', [ClerkController::class, 'ClerkProfileUpdate'])->name('clerk.profile.update');
    Route::post('/clerk/password/update', [ClerkController::class, 'ClerkPasswordUpdate'])->name('clerk.password.update');


    Route::get('/activities/matrix', [ActivityController::class, 'ActivityMatrix'])->name('activity.matrix');
    Route::get('/activities/management-clerk', [ActivityController::class, 'ActivityManage'])->name('activity.manage');
    Route::post('activity/store', [ActivityController::class, 'ActivityStore'])->name('activity.store');
    Route::get('/getProponents/{collegeCode}', [ActivityController::class, 'getProponent'])->name('get.proponent');
    Route::get('/completed-activities/clerk/', [ActivityController::class, 'completed'])->name('completed');
    Route::post('/submit-accomplished/{activityCode}', [ActivityController::class, 'submitAccomplished'])->name('submit.accomplished');

     Route::put('/activities/update/{activityCode}/', [ActivityController::class, 'update'])->name('activity.update');

    Route::get('/matrix', [MatrixController::class, 'Matrix'])->name('matrix');
    Route::get('/matrix-result-clerk', [MatrixController::class, 'MatrixResult'])->name('matrixResult.clerk');
    Route::get('/download/{filePath}', [MatrixController::class, 'downloadfile'])->name('file.download');
    Route::post('/uploadFileMatrix/{activityCode}', [MatrixController::class, 'uploadFileMatrix'])->name('uploadFileMatrix');
    Route::get('/get-activity-progress/{activityCode}', [MatrixController::class, 'getActivityProgress'])->name('activity.progress');
    Route::post('/clear-file/clerk', [MatrixController::class, 'clearFile'])->name('file.clear');


   Route::get('hero/section', [HeroController::class, 'index'])->name('hero.manage');
   Route::post('hero/store', [HeroController::class,'store'])->name('hero.store');
   Route::delete('hero/{id}', [HeroController::class, 'destroy'])->name('hero.destroy');
   Route::put('/hero/toggle-status/{id}', [HeroController::class, 'update'])->name('hero.update');

   Route::get('/download-all-files', [FileController::class, 'downloadAllFiles'])
     ->name('files.downloadAll')
     ->middleware(['auth', 'checkDownloadPermission']);

});


Route::middleware(['auth', 'role:UnitHead'])->group(function () {

Route::get('/unithead/dashboard', [UnitHeadController::class, 'unitheadDashboard'])->name('unithead.dashboard');
Route::post('/unithead/profile-update', [UnitHeadController::class, 'UnitheadProfileUpdate'])->name('unithead.profile.update');
Route::post('/unithead/password-update', [UnitHeadController::class, 'UnitheadPasswordUpdate'])->name('unithead.password.update');
Route::get('/unithead/profile', [UnitHeadController::class, 'UnitheadProfile'])->name('unithead.profile');

Route::post('/report/update/{activityCode}', [ActivityController::class, 'updateTarget'])->name('target.update');
Route::get('/matrix', [ActivityController::class, 'activitiesMatrx'])->name('activities.Matrix');
Route::get('/getProponentsunithead/{collegeCode}', [ActivityController::class, 'getProponentunithead'])->name('get.proponent.unithead');

Route::get('/matrix-result/{collegeCode}', [UnitHeadMatrixController::class, 'UheadMatrixResult'])->name('matrixResult.unithead');
Route::get('/get-activities-progress-uhead/{activityCode}', [UnitHeadMatrixController::class, 'ActivityProgress'])->name('activities.progress.unithead');
Route::post('/uploadFileUnithead/{activityCode}', [UnitHeadMatrixController::class, 'upload'])->name('uploadFile');
Route::get('/unithead-matrix', [UnitHeadMatrixController::class, 'matrix'])->name('unithead.matrix');
Route::get('unithead/download/{filePath}', [UnitHeadMatrixController::class, 'uheaddownloadFile'])->name('file.download.uhead');
Route::post('/clear-file', [UnitHeadMatrixController::class, 'clearFile'])->name('clear.file');

Route::get('generate-report/accomplishment/{year}', [ReportController::class, 'generateReport'])->name('accomplishment.pdf');
Route::get('/download-pdf/{activityCode}', [DownloadUheadController::class, 'downloadPdf'])->name('downloadPdf');
});



// Login & Logout Routes
Route::get('/login/page', [IndexController::class, 'IndexLogin'])->name('index.login');
Route::get('/login', [IndexController::class, 'Login'])->name('login');


Route::get('/logout/page', [IndexController::class, 'IndexLogout'])->name('index.logout');
Route::get('register/page', [IndexController::class, 'Register'])->name('index.register');
Route::post('/register-user', [IndexController::class, 'RegisterUser'])->name('register.new');
Route::get('/index-dashboard', [IndexController::class, 'IndexDashboard'])->name('index');

