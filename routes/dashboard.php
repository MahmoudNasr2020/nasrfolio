<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Client\ClientController;
use App\Http\Controllers\Dashboard\Detail\DetailController;
use App\Http\Controllers\Dashboard\Interview\InterviewController;
use App\Http\Controllers\Dashboard\Post\PostController;
use App\Http\Controllers\Dashboard\Project\ProjectController;
use App\Http\Controllers\Dashboard\Resume\Category\CategoryController;
use App\Http\Controllers\Dashboard\Resume\ResumeController;
use App\Http\Controllers\Dashboard\Role\RoleController;
use App\Http\Controllers\Dashboard\Service\ServiceControllre;
use App\Http\Controllers\Dashboard\Skill\SkillController;
use App\Http\Controllers\Dashboard\User\UserController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use Illuminate\Support\Facades\Route;




//auth routes
Route::group(['middleware'=>'guest:admin'],function (){
    Route::view('login','dashboard.pages.auth.login')->name('login.index');
    Route::post('login',[AuthController::class,'login'])->name('login.login');
});



Route::group(['middleware'=>'auth:admin'],function (){

    //logout route
    Route::get('logout',[AuthController::class,'logout'])->name('logout');


    //profile route
    Route::view('profile','dashboard.pages.profile.index')->name('profile.index');
    Route::post('/profile/update',[DetailController::class,'profile'])->name('profile.update');

    //home route
    Route::view('/home','dashboard.index')->name('home');

    Route::group(['prefix'=>'details','as'=>'details.'],function (){
        Route::get('/',[DetailController::class,'index'])->name('index');
        Route::post('/update',[DetailController::class,'update'])->name('update');
        Route::post('/setting',[DetailController::class,'setting'])->name('setting');
    });

//skills route
    Route::group(['prefix'=>'skills','as'=>'skill.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [SkillController::class, 'index'])->name('index');
        Route::post('/store', [SkillController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SkillController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SkillController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SkillController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [SkillController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [SkillController::class, 'status'])->name('status');
        Route::post('/textSkill', [SkillController::class, 'textSkill'])->name('textSkill');

    });

//category route
    Route::group(['prefix'=>'categories','as'=>'category.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [CategoryController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [CategoryController::class, 'status'])->name('status');
    });

//resume route
    Route::group(['prefix'=>'resumes','as'=>'resume.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [ResumeController::class, 'index'])->name('index');
        Route::post('/store', [ResumeController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ResumeController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ResumeController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ResumeController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [ResumeController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [ResumeController::class, 'status'])->name('status');
    });


//services route
    Route::group(['prefix'=>'services','as'=>'service.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [ServiceControllre::class, 'index'])->name('index');
        Route::post('/store', [ServiceControllre::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ServiceControllre::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ServiceControllre::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ServiceControllre::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [ServiceControllre::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [ServiceControllre::class, 'status'])->name('status');
    });

//projects route
    Route::group(['prefix'=>'projects','as'=>'project.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::get('/show/{id}/{name?}', [ProjectController::class, 'show'])->name('show');
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/store', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit/{id}/{name?}', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [ProjectController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [ProjectController::class, 'status'])->name('status');
        Route::get('/multi_images/{project_id}/{name?}', [ProjectController::class, 'multi_images'])->name('multi_images');
        Route::post('/upload_multi_images', [ProjectController::class, 'upload_multi_images'])->name('upload_multi_images');
        Route::post('/delete_image', [ProjectController::class, 'delete_image'])->name('delete_image');
        Route::get('/video/{project_id}/{name?}', [ProjectController::class, 'video'])->name('video');
        Route::post('/upload_video', [ProjectController::class, 'upload_video'])->name('upload_video');
        Route::post('/delete_video', [ProjectController::class, 'delete_video'])->name('delete_video');
    });


//clients route
    Route::group(['prefix'=>'clients','as'=>'client.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [ClientController::class, 'index'])->name('index');
        Route::post('/store', [ClientController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ClientController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ClientController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [ClientController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [ClientController::class, 'status'])->name('status');
    });

    //interview route
    Route::group(['prefix'=>'interview','as'=>'interview.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [InterviewController::class, 'index'])->name('index');
        Route::post('/store', [InterviewController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [InterviewController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [InterviewController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [InterviewController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [InterviewController::class, 'multi_delete'])->name('multi_delete');
    });


//users route
    Route::group(['prefix'=>'users','as'=>'user.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [UserController::class, 'multi_delete'])->name('multi_delete');
    });


//  posts route
    Route::group(['prefix'=>'posts','as'=>'post.'],function () {
        //view  -- add -- update -- delete -- delete_all
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/show/{id}/{title?}', [PostController::class, 'show'])->name('show');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{id}/{title?}', [PostController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('delete');
        Route::post('/multi_delete', [PostController::class, 'multi_delete'])->name('multi_delete');
        Route::post('/status', [PostController::class, 'status'])->name('status');
    });

//Roles routes
    Route::group(['prefix'=>'roles','as'=>'role.'],function (){
        Route::get('/',[RoleController::class,'index'])->name('index');
        Route::get('/create',[RoleController::class,'create'])->name('create');
        Route::post('/add',[RoleController::class,'store'])->name('store');
        Route::get('/show/{id}/{name?}',[RoleController::class,'show'])->name('show');
        Route::get('/edit/{id}/{name?}',[RoleController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[RoleController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[RoleController::class,'delete'])->name('delete');
        Route::post('/multi_delete',[RoleController::class,'multi_delete'])->name('multi_delete');
        //Route::post('/status',[RoleController::class,'status'])->name('status');

    });

//Admins routes
    Route::group(['prefix'=>'admins','as'=>'admin.'],function (){
        Route::get('/',[AdminController::class,'index'])->name('index');
        Route::get('/create',[AdminController::class,'create'])->name('create');
        Route::post('/add',[AdminController::class,'store'])->name('add');
        Route::get('/show/{id}/{name?}',[AdminController::class,'show'])->name('show');
        Route::get('/edit/{id}/{name?}',[AdminController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[AdminController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[AdminController::class,'delete'])->name('delete');
        Route::post('/multi_delete',[AdminController::class,'multi_delete'])->name('multi_delete');
        Route::post('/status',[AdminController::class,'status'])->name('status');

    });

});

