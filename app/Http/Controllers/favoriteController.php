<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\userModel;
use App\favoriteModel;
use App\bookModel;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;
class favoriteController extends Controller
{


     public function getmybook()
    {
$uname=Session::get('username');
        $mybook = DB::table('favorite')->join('book','book.id','=','favorite.id')->join('user','user.username','=','favorite.username')->select('favorite.created_at','book.title','book.description')->where('favorite.username',$uname)->get();
        return view('admin.mybook.listmybook',['mybook' => $mybook]);
    
    }




}
