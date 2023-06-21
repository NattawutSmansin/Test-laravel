<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\UserModel;

class AuthController extends Controller
{
    public $user_model;
    public $dt_now;
    function __construct()
    {
        $this->user_model = new UserModel();
        $this->dt_now = Carbon::now();
    }
    
    public function Index()
    {
        return view('auth/sign_in');
    }

    public function SignIn(Request $reqeust)
    {
        $chk_username = $this->user_model->CheckUserSignIn($reqeust->username);
        
        if(empty($chk_username))
        {
            return back()->with("error", "ชื่อผู้ใช้ผิดพลาด");

        } else {
            $hashedPassword = $chk_username->password;
            if (Hash::check($reqeust->password , $hashedPassword)) {
                $list_arr = [
                    "last_login_at" => $this->dt_now,
                    "updated_at" => $this->dt_now,
                ];

                $this->user_model->UpdateFeildLastSingIn($reqeust->username, $list_arr);

                return redirect('/dashboard')->with("success", "ลงชื่อเข้าใช้เสร็จสิ้น");
            } else {
              
                return back()->with("error", "รหัสผ่านผิดพลาด");
            }
        }    
        
    }
}
