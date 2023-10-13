<?php

use App\Http\Controllers\Site\Post\Comment\CommentController;
use App\Http\Controllers\Site\Auth\AuthController;
use App\Http\Controllers\Site\Home\HomeController;
use App\Http\Controllers\Site\Post\PostController;
use App\Http\Controllers\Site\Post\ReactionController;
use App\Http\Controllers\Site\Project\ProjectController;
use App\Http\Controllers\Site\Rating\RatingController;
use App\Models\Detail;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('links',function (){
     Artisan::call('db:seed', [
        '--class' => 'SkillDescSeeder',
        '--force' => true // <--- add this line
    ]);
});


Route::group(['middleware'=>'maintenance'],function (){
    Route::get('/', [HomeController::class,'index']);

    //lightness
    Route::post('lightness',function (Request $request){
        $update = Detail::orderBy('id','desc')->update(['site_lightness'=>$request->mode]);
        if (!$update)
        {
            return 'error';
        }
        return 'done';
    })->name('lightness');





//projects routes
    Route::get('projects',[ProjectController::class,'projects'])->name('projects');
    Route::get('projects/loadMore',[ProjectController::class,'loadMore'])->name('projects.loadMore');
    Route::get('project/{name?}/{id}',[ProjectController::class,'single_project'])->name('projects.single-project');


//posts routes
    Route::get('posts',[PostController::class,'posts'])->name('posts');
    Route::get('posts/loadMore',[PostController::class,'loadMore'])->name('posts.loadMore');
    Route::get('post/{title?}/{id}',[PostController::class,'single_post'])->name('posts.single-post');


    //interview routes
    Route::get('interview',function (){
        $interviews = Interview::get();
        return view('site.pages.interview.index',compact('interviews'));
    })->name('posts');

//auth routes
    Route::group(['middleware'=>'guest:web'],function (){
        Route::view('register','site.pages.auth.register')->name('register.index');
        Route::post('register',[AuthController::class,'register'])->name('register.register');
        Route::view('login','site.pages.auth.login')->name('login.index');
        Route::post('login',[AuthController::class,'login'])->name('login.login');
    });



//Auth Route
    Route::group(['middleware'=>'auth'],function (){
        // profile routes
        Route::view('profile/edit','site.pages.profile.edit')->name('profile.index');
        Route::post('profile/edit',[AuthController::class,'edit_profile'])->name('profile.edit');

        //logout route
        Route::get('logout',[AuthController::class,'logout'])->name('logout');

        //rating routes
        Route::post('store_rating',[RatingController::class,'store_rating'])->name('projects.store_rating');
        Route::post('rating/delete',[RatingController::class,'delete'])->name('rating.delete');


        //reaction route
        Route::post('store_reaction',[ReactionController::class,'store_reaction'])->name('reaction.store_reaction');
        Route::post('remove_reaction',[ReactionController::class,'remove_reaction'])->name('reaction.remove_reaction');


        //comments routes
        Route::post('comment/store_comment',[CommentController::class,'store_comment'])->name('comment.store_comment');
        Route::post('comment/edit_comment',[CommentController::class,'edit_comment'])->name('comment.edit_comment');
        Route::post('comment/delete',[CommentController::class,'delete'])->name('comment.delete');


    });

//rating more load
    Route::post('rating/loadMore',[RatingController::class,'loadMore'])->name('rating.loadMore');
    Route::post('comment/loadMore',[CommentController::class,'loadMore'])->name('comment.loadMore');

});

//maintenance
Route::get('maintenance',function (){
   return settings()->site_status == 'مغلق' ? view('errors.maintenance') : redirect('/');
})->name('maintenance');


/*
    - images project
    - repository design
    - posts
    - single-post
    - login ... register
    - rating system project =>request
    - reaction system post

      2/10/2022
    - show admin
    - permissions
    - sidebar
    - login

 */
