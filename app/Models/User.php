<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'created_at',
        'updated_at',
        'remember_token',
        'profile_picture',
        'admin_type',
        'mobile_number',
        'email_verified_at',
        'alternative_mobile_number',
        'parent_mobile_number',
        'address',
        'dob',
        'designation',
        'account_no',
        'account_holder_name',
        'ifsc_code',
        'bank_address',
        'joining_date',
        'basic_salary',
        'last_increment_date',
        'next_increment_date',
        'user_status',
        'about_me',
        'number_of_project',
        'login_cookie',
        'push_notification',
        'no_of_off_leave',
        'allowance_pf',
        'professional_tax',
        'pf_percentage',
        'allow_show_to_client',
        'allow_show_to_project',
        'allow_show_to_pf',
        'credit_leave',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
