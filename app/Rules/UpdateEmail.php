<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UpdateEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $edit_user_email = '';
    public function __construct($email,$user_data)
    {
        $this->edit_user_email = isset($user_data[0]) ? $user_data[0]['email'] : '';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->edit_user_email;
        if($this->edit_user_email == $value)
        {
            return true;
        }
        else
        {
            $count = DB::table('users')->where('email','=',$value)->count();
            
            if($count > 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
