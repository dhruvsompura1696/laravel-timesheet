<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\UpdateEmail;

class UserController extends Controller
{
    //
    protected $table = 'users';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function display_users()
    {
        $users =  User::orderBy('id','desc')->paginate(10);
        return view('users.display_users',['users'=>$users]);
    }

    public function add_user_view()
    {
        return view('users.add_user');
    }

    public function create_user(Request $r)
    {
        $r->validate([
            'email' => "unique:users,email,id",
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required|digits:10',
            'admin_type' => 'required',
            'dob' => 'required',
            'designation' => 'required',
            'gender' => 'required',
        ]);
        $imageName = '';
        if($r->avatar)
        {            
            $imageName = time().'.'.$r->avatar->extension();
            $r->avatar->storeAs('images', $imageName);
            $upload = $r->file('avatar')->storeAs('images', $imageName);
            
        }
        // echo $r->dob;
        // echo date('Y-m-d',strtotime($r->dob));

        // dd($r->all());

        User::create([
            'fname' => $r->fname,
            'lname' => $r->lname,
            'email' => $r->email,
            'mobile_number' => $r->phone,
            'profile_picture' => $imageName,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'password' => Hash::make('12345678'),
            'admin_type' => $r->admin_type,
            'basic_salary' => $r->basic_salary,
            'dob' => $r->dob,
            'gender' => $r->gender,
            'designation' => $r->designation,
            'address' => $r->address,
            'about_me' => $r->about_me,
            'account_no' => $r->account_no,
            'bank_name' => $r->bank_name,
            'account_holder_name' => $r->account_holder_name,
            'ifsc_code' => $r->ifsc_code,
            'bank_address' => $r->bank_address,
            'joining_date' => $r->joining_date,
            'last_increment_date' => $r->last_increment_date,
            'next_increment_date' => $r->next_increment_date,
        ]);
        $r->session()->flash('status', 'User created successfully!');
        return redirect('/users');
        
    }

    public function update_user(Request $r)
    {
        $user_data = User::where('email','=',$r->email)->get()->toArray();
        $cuser_data = User::find(get_current_user_id())->get()->toArray();
        // dd($r->all());
        if(isset($user_data[0]) && $user_data[0]['admin_type'] == 0)
        {
            $r->validate([
                'email' => ["required",new UpdateEmail($r->email,$user_data)],
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required|digits:10',
                'admin_type' => 'required',
                'dob' => 'required',
                'designation' => 'required',
                'gender' => 'required',
            ]);
        }
        else
        {
            $r->validate([
                'email' => ["required",new UpdateEmail($r->email,$user_data)],
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required|digits:10',
                'dob' => 'required',
                'designation' => 'required',
                'gender' => 'required',
            ]);
        }
        $imageName = isset($user_data[0]) ? $user_data[0]['profile_picture'] : '';
        if($r->avatar)
        {    
                
            $imageName = time().'.'.$r->avatar->extension();
            $r->avatar->storeAs('images', $imageName);
            $upload = $r->file('avatar')->storeAs('images', $imageName);
            echo "new imageName".$imageName;
            
        }
        // echo $r->dob;
        // echo date('Y-m-d',strtotime($r->dob));

        // echo $r->email;
        if(isset($cuser_data[0]) && $cuser_data[0]['admin_type'] == 0)
        {
            User::where('email','=',$r->email)->update([
                'fname' => $r->fname,
                'lname' => $r->lname,
                'email' => $r->email,
                'mobile_number' => $r->phone,
                'profile_picture' => $imageName,
                'updated_at' => date('Y-m-d h:i:s'),
                'admin_type' => $r->admin_type,
                'basic_salary' => $r->basic_salary,
                'dob' => $r->dob,
                'gender' => $r->gender,
                'designation' => $r->designation,
                'address' => $r->address,
                'about_me' => $r->about_me,
                'account_no' => $r->account_no,
                'bank_name' => $r->bank_name,
                'account_holder_name' => $r->account_holder_name,
                'ifsc_code' => $r->ifsc_code,
                'bank_address' => $r->bank_address,
                'joining_date' => $r->joining_date,
                'last_increment_date' => $r->last_increment_date,
                'next_increment_date' => $r->next_increment_date,
            ]);
        }
        else
        {
            User::where('email','=',$r->email)->update([
                'fname' => $r->fname,
                'lname' => $r->lname,
                'email' => $r->email,
                'mobile_number' => $r->phone,
                'profile_picture' => $imageName,
                'updated_at' => date('Y-m-d h:i:s'),
                'dob' => $r->dob,
                'gender' => $r->gender,
                'designation' => $r->designation,
                'address' => $r->address,
                'about_me' => $r->about_me,
                'account_no' => $r->account_no,
                'bank_name' => $r->bank_name,
                'account_holder_name' => $r->account_holder_name,
                'ifsc_code' => $r->ifsc_code,
                'bank_address' => $r->bank_address,
            ]);
            
        }
        $r->session()->flash('status', 'User updated successfully!');
        return back();
        
    }
    
    public function delete_user(Request $r)
    {
        if($r->delete_user_id && User::find($r->delete_user_id))
        {
            $user = User::find($r->delete_user_id);
            $user->delete();
            $r->session()->flash('status', 'User deleted successfully!');
        }
        return redirect('/users/');
    }

    public function edit_user_view(Request $r)
    {
        $r->edit_user_id;
        $user_data = User::find($r->edit_user_id);
        return view('users.edit_user',['user_data'=>$user_data,'edit_user_id'=>$r->edit_user_id]);
    }
}
