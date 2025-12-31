<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);
// Route::match(['get', 'post'], '/', function () { ... });
// Route::any('/', function () { ... });


Route::prefix('guest')->middleware('guest')->group(function () {
    Route::view('/welcome', 'welcome', ['detail' => 'from prefix->middleware->group']);
});

Route::get('/', function (){
    return view('welcome');
});

// Route::get('/', function () {
//     $url = route('home', ['id' => 1, 'check' => 'yes']);
//     return view('welcome', [
//         'detail' => 'from Route::get',
//         'url' => $url
//     ]);
// })->name('home');

Route::get('/login/create', [AuthController::class , "create"] );
Route::get('/login', [AuthController::class , "index"]);
Route::get('/login/{sno}', [AuthController::class , "index1"]);

Route::get('/page1', function () {
    return "Page 1 Return";
    // return response("<h3>Page 1 Response</h3>", 200)->header("Content-Type", "application/json"); 
    // 👆 Network->File->Response Header
});

Route::redirect('/page2', '/');

Route::get('/page2/{id?}', function (string $id = 'default') {
    return "Page 2 Return   " . $id;
})->where(['id' => '[a-z]+']);

Route::get('/user/{id}', function (Request $request, string $id) {
    dd($request);
    $token1 = $request->session()->token();
    $token = csrf_token();
    // return 'User : ' . $id . ' | ' . $token . ' | ' . $token1;
    //.  /user/a=okay
    // dd($request->a);
});

// Route::get('/user/{name?}', function (?string $name = 'No Route Parameter') {
//     return $name;
// });


// Middleware (Middleware are executed in the order they are listed in the array)
// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         // Uses first & second middleware...
//     });

//     Route::get('/user/profile', function () {
//         // Uses first & second middleware...
//     });
// });

//Controller 
// use App\Http\Controllers\OrderController;
// Route::controller(OrderController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

/* executed when no other route matches the incoming request / renders 404 error */
// Route::fallback(function () {   ...  });

//Rate Limits
// RateLimiter::for('uploads', function (Request $request) {
//     return $request->user()
//         ? Limit::perMinute(100)->by($request->user()->id)
//         : Limit::perMinute(10)->by($request->ip());
// });


// HTML forms do not support PUT, PATCH, or DELETE actions. So, when defining PUT, PATCH, or DELETE routes that are called from an HTML form, you will need to add a hidden _method field to the form. The value sent with the _method field will be used as the HTTP request method:
// <form action="/example" method="POST">
//     <input type="hidden" name="_method" value="PUT">

//Current Route
// You may use the current, currentRouteName, and currentRouteAction methods on the Route facade to access information about the route handling the incoming request: