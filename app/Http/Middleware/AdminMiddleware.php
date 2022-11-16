<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Support;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user()->role_as;
        if ($user == 1) {
            $supports = Support::orderBy('id', 'DESC')->get();
            return response()->view('problem.index',compact('supports'));
        }
        else 
        { 
            return redirect('/home');
        }



    }
}
