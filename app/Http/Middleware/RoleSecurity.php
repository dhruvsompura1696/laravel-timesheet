<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $r, Closure $next)
    {
        $role = get_current_user_role();
        $user_id = get_current_user_id();
        //echo  "role==".$role;
        //echo  "user_id==".$user_id;
        //echo  "edit_user_id==".$r->edit_user_id;
        $user = DB::table('users')->where('email','=',$r->email)->get()->toArray();
        $edit_user_id = count($user) > 0 ? $user[0]->id : '';
        // echo  "role==".$role;
        // echo  "user_id==".$user_id;
        // echo  "edit_user_id==".$edit_user_id;
        // dd($user);

        if($role == 0 || ($edit_user_id == $user_id) )
        {
            return $next($r);
        }
        else
        {
            return redirect('/');
        }
    }
}
