<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\bookModel;
use App\favoriteModel;
use App\userModel;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $book = DB::table("book")->orderBy('id', 'desc')->get();
       return view('admin.book.listbook',['book' => $book]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getthembook() { 

               return view('admin.book.thembook');


      
        }
    public function postthembook(Request $request) { 
        
        $this -> validate($request,[
            'title' => 'required|min:5|max:100',
            'description' => 'required',
            'release' => 'required',
            'quantity' => 'required',
        ],
        [
            'title.min' => 'Tên phải dài hơn 5 kí tự',
             'title.max' => 'Tên phải nhỏ hơn 100 kí tự',
            'title.required'=>'Nhập title',
            'description.required'=>'Nhập description',
            'quantity.required'=>'Nhập quantity',
            'release.required'=>'Nhập release',
        ] );
        
        
            $book            = new bookModel;
            $book->title     = $request->title;
            $book->quantity     = $request->quantity;
            $book->description = $request->description;
            $book->release_date     = $request->release;

            $book->save();
             
            // return view ('admin.listbook')->with('thongbao','them thanh công');
  return redirect ('listbook')->with('thongbao','thêm thanh công');
    }






     public function getsuabook($id) { 
            $book  = bookModel::find($id);
           return view('admin.book.suabook',['book'=>$book]);

    }
    
    
        public function postsuabook(Request $request,$id) { 
        
        $this -> validate($request,[
            'title' => 'required|min:5|max:100',
            'description' => 'required',
            'release' => 'required',
            'quantity' => 'required',
        ],
        [
            'title.min' => 'Tên phải dài hơn 5 kí tự',
             'title.max' => 'Tên phải nhỏ hơn 100 kí tự',
            'title.required'=>'Nhập title',
            'description.required'=>'Nhập description',
            'quantity.required'=>'Nhập quantity',
            'release.required'=>'Nhập release',
        ] );
        
        
            $book            = bookModel::find($id);
            $book->title     = $request->title;
            $book->quantity     = $request->quantity;
            $book->description = $request->description;
            $book->release_date     = $request->release;

            $book->save();
            return redirect ('listbook')->with('thongbao','cập nhật thanh công');
  
    }
    
    
    public function postxoabook(Request $request, $id){
        $book = bookModel::find($id);
        $book->delete();
        return redirect('listbook')->with('thongbao','xóa thành công');
    }







         public function addmybook( Request $request)
    {
        $uname=Session::get('username');
        $id=$request->id;
        $mybook = DB::table('favorite')->where('favorite.username','=',$uname)->where('favorite.id','=',$id)->get();
        $kq=$mybook->count();
        if($kq >0){
                        return redirect ('listbook')->with('loiadd','đã có trong my favorite book');
        }else
        {
            // $addmybook        = new favoriteModel();
            // $addmybook->id     = $id;
            // $addmybook->username     =$uname;
            // $addmybook->save();
           $b= DB::table('favorite')->insert([
                'id' => $id,
                'username' =>$uname
            ]);
                    return redirect ('listbook')->with('thongbao','đãthêm thành công vào my favorite book');

        }

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
