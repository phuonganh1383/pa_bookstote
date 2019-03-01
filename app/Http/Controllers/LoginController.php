<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\userModel;
use DB;
class LoginController extends Controller
{
public function login(Request $request)
    {
        $this -> validate($request,[
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required'=>'Nhập username',
            'password.required'=>'nhập password',
        ] );
        // if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
        //     return redirect('listbook');
        // }
        $user= userModel::where("username", $request->username)->where("password",md5($request->password))->first();
        if($user){
            $request->session()->put('username', $user->username);
            $request->session()->put('firstname', $user->firstname);
                return redirect('index');
        }
        else{
            return redirect('dangnhap')->with('loi','Đăng nhập không thành công!');
        }
    
    }


    public function logout(Request $request) {
        
        if($request->session()->exists('username')) $request->session()->forget('username');
        if($request->session()->exists('firsname')) $request->session()->forget('firsname');

        return redirect('dangnhap');
    }


}
