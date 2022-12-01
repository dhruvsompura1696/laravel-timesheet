<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

function get_user_data()
{
    if(is_user_loggedin())
    {
        return $user = Auth::user();
    }
    
}

function get_current_user_id()
{
    if(is_user_loggedin())
    {
        $user = Auth::user();
        if(isset($user['id']))
        {
            return $user['id'];
        }
        else
        {
            return '';
        }
    }
    return '';
}

function get_current_user_role()
{
    if(is_user_loggedin())
    {
        $user = Auth::user();
        if(isset($user['admin_type']))
        {
            return $user['admin_type'];
        }
        else
        {
            return '';
        }
    }
    return '';
}

function is_user_loggedin()
{
    if (Auth::check()) {
        return true;
    }
    return false;
    
}

function get_current_route()
{
    return $currentPath= Route::getFacadeRoot()->current()->uri();
}