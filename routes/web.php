<?php

use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TestController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\CarbonController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\preventUrl;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get("hello/{fname?}/{lname?}" ,function($fname = Null , $lname = Null){
//     $fullName = $fname ." ".$lname;
//     return view("hello")->with("fullname" ,$fullName );
//     // return view("hello")->with(["fname"=>$fname , "lname"=>$lname]);
//     // echo $name ;
// });
Route::get('test', [CarbonController::class, 'testcarbon']);

route::controller(CategoryController::class)->group(function () {
    // route::get("hello", [TestController::class , 'all']);
    route::get("categories", 'all');
    route::get("categories/show/{id}", 'show');


    Route::middleware('auth')->group(function () {

        //insert (2 routes )
        ## 1 to go to the form(create)
        ## 2 to insert (store data)

        route::get('create', 'create');
        route::post('categories', 'store');

        //Update (2 routes )
        ## 1 to go to the form(edit)
        ## 2 to update (update)
        route::get('edit/{id}', 'edit');
        route::PUT('categories/update/{id}',  'update');

        //delete
        route::delete('categories/delete/{id}', [CategoryController::class, 'delete']);
    });
});


// // route::get("hello", [TestController::class , 'all']);
// route::get("categories" , [CategoryController::class , 'all']);
// route::get("categories/show/{id}" , [CategoryController::class , 'show']);

// //insert (2 routes )
// ## 1 to go to the form(create)
// ## 2 to insert (store data)

// route::get('create' , [CategoryController::class , 'create']);
// route::post('categories' , [CategoryController::class , 'store'])->name('store');

// //Update (2 routes )
// ## 1 to go to the form(edit)
// ## 2 to update (update)
// route::get('edit/{id}' , [CategoryController::class , 'edit']);
// route::PUT('categories/update/{id}', [CategoryController::class , 'update']);

// //delete
// route::delete('categories/delete/{id}', [CategoryController::class , 'delete']);

route::controller(BookController::class)->group(function () {
    // route::get("hello", [TestController::class , 'all']);
    route::get("books", 'all');
    route::get("books/show/{id}", 'show');

    //insert (2 routes )
    ## 1 to go to the form(create)
    ## 2 to insert (store data)
    route::middleware('auth')->group(function () {

        route::get('book/create', 'create');
        route::post('books', 'store');

        //Update (2 routes )
        ## 1 to go to the form(edit)
        ## 2 to update (update)
        route::get('book/edit/{id}', 'edit');
        route::PUT('books/update/{id}',  'update');


        //delete
        route::delete('books/delete/{id}', 'delete');
    });
});


Route::controller(AuthController::class)->group(function () {

    Route::middleware('guest')->group(function () {
        //reset password
        route::get('forget-password' , 'forgetPassword');
        route::post('passwordlink' , 'sendlink')->name('password.email');
        route::get('/reset-password/{token}' , 'restpassword')->name('password.reset');
        route::put('passwordupdate' , 'passwordupdate')->name('password.update');
        //register
        route::get("register", "registerForm");
        route::post("register", "register")->name("register");

        //login
        route::get("login", 'loginForm');
        route::post("login", 'login')->name('login');
    });

    //logout
    route::post("logout", "logout")->middleware('auth');
    Route::get('/logout', function () {
        return redirect(url('categories'));
    });
    route::get('allusers', 'allusers')->middleware(['is_admin', "auth"]);
});
