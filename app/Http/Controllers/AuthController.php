<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $var1="hello hello var1";
        $var2="hello hello var2";
        // return view('new', ["name"=> "parameter from AuthController index method", "agenda"=> "focus"]);
        return view('new', compact('var1', 'var2'))->with("name", "parameter from AuthController index method")->with("agenda", "focus");
        // If new file inside the folder named folder
        // return view('folder.new');   
        // return "This is AuthController : index function";
    }
    // Route::get('/login', [AuthController::class , "index"]);
    // Route::get('/login1/{sno}/{nos}', [AuthController::class , "index1"]);

    function index1($para_id)
    {
        return "from login1 : $para_id | ";
    }

    function create(){
        return "This is create function ";
    }
}


// php artisan make:controller ProvisionServer --invokable
// __invoke function inside class
// If a controller action is particularly complex, you might find it convenient to dedicate an entire controller class to that single action. 
//Route::post('/server', ProvisionServer::class);

// CRUD
// php artisan make:controller PhotoController --resource
// contains all required functions (index, create, store, show, edit, update, destroy)
//Route::resources([
//     'xyz' => PhotoController::class,
//     'posts' => PostController::class,
// ]);
//  URI --- Route Name
// /xyz  ->  xyz.index (GET)
// /xyz/create  -> xyz.create (GET)
// /xyz/     -> xyz.store (POST)
// /xyz/{xyz}  -> xyz.show (GET)
// /xyz/{xyz}/edit  -> xyz.edit (GET)
// /xyz/{xyz}  -> xyz.update (PUT/PATCH)
// /xyz/{xyz}  -> xyz.destroy (DELETE)

// missing method
// Route::resource('photos', PhotoController::class)
//     ->missing(function (Request $request) {
//         return Redirect::route('photos.index');
//     });
// Route::resource('photos', PhotoController::class)->withTrashed(['show']);
// Route::resource('photos', PhotoController::class)->only(['index','show']);
 
// Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

// API routes don’t use HTML forms (returns JSON), so we exclude create and edit when declaring resource routes.
// When you create API routes using Route::resource(), Laravel adds all 7 default routes
// Route::apiResources([
//     'photos' => PhotoController::class,
//     'posts' => PostController::class,
// ]);

// Route::resource('users', AdminUserController::class)->parameters([
//     'users' => 'admin_user'
// ]);

// you may enable automatic scoping as well as instruct Laravel which field the child resource should be retrieved by
// Route::resource('photos.comments', PhotoCommentController::class)->scoped([
//     'comment' => 'slug',
// ]);

// Laravel's scoped implicit model binding feature can automatically scope nested bindings such that the resolved child model is confirmed to belong to the parent model. 
// Route::resource('photos.comments', PhotoCommentController::class)->scoped([
//     'comment' => 'slug',
// ]);

// Middleware and Resource Controllers
// Route::resource('users', UserController::class)
//     ->middleware(['auth', 'verified']);
// ->middlewareFor(['fshow', 'update'], ['auth', 'verified'])