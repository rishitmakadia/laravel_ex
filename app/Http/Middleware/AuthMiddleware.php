<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// class AfterMiddleware/BeforeMiddleware
class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->input('token') !== 'my-secret-token') {
            return redirect('/home');
        }
 
        return $next($request);
    }

    // to call with route
    // Route::get('/profile', function () { ... })->middleware(EnsureTokenIsValid::class);
    // ->middleware([First::class, Second::class])  (multiple middleware to the route)

    // Route::middleware(['group-name'])->group(function () { ...  });

    // $middleware->web(replace/remove: [StartSession::class => StartCustomSession::class,]);

    // Middleware parameters may be specified when defining the route by separating the middleware name and parameters with a :
        // Route::put('/post/{id}', function (string $id) { ... })->middleware(EnsureUserHasRole::class.':editor,publisher');

    // Sometimes a middleware may need to do some work after the HTTP response has been sent to the browser. the terminate method will automatically be called after the response is sent to the browser:


    // middleware to run during every HTTP request to your application, you may append it to the global middleware stack in your application's bootstrap/app.php file
//     ->withMiddleware(function (Middleware $middleware) {
//      $middleware->append(AuthMiddleware::class);
// })
}
