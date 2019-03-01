<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\userModel;
use DB;
class userController extends Controller
{
public function index()
    {
       $user = userModel::all();
       return view('admin.user.listuser',['user' => $user]);
    
    }

    public function dangky(Request $request) { 
        

        $this -> validate($request,[
            'username' => 'bail|required|unique:user,username|min:10|max:30|',
            'pass' => 'required|min:8',
            'pass1' => 'required|same:pass',
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required',
        ],
        [
            'username' => 'username không được chứa ký tự đặc biệt',
            'username.min' => 'username phải dài hơn 5 kí tự',
            'username.max' => 'username phải nhỏ hơn 30 kí tự',
            'username.required'=>'Nhập username',
            'username.unique'=>'Trùng tên đăng nhập',
            'pass.required'=>'Nhập password',
            'pass1.required'=>'chưa nhập lại password',
            'pass1.required'=>'password chưa trùng khớp',
            'firstname.required'=>'Nhập firstname',
            'lastname.required'=>'Nhập lastname',
            'birthday.required'=>'Nhập birthday',
        ] );
        
        
            $user            = new userModel;
            $user->username     = $request->username;
            $user->password     = md5($request->pass1);
            $user->firstname = $request->firstname;
            $user->lastname     = $request->lastname;
            $user->birthday     = $request->birthday;
            $user->save();
             
            // return view ('admin.listbook')->with('thongbao','them thanh công');
  return redirect ('dangnhap')->with('thanhcong','Đăng ký thành công! Bạn đã có thể đăng nhập');
    }

    

    
}
