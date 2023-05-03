<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class CategoryController extends Controller
// class CategoryController extends Eloquent

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        // return view('admin/category/index');
        $categories = Category::orderBy('id', 'desc')->paginate(3);
        // echo "<pre>";
        // var_dump($categories);
        // dd($categories);
        // foreach($categories as $key=>$value){
        //     echo $value['_id'];
        // }
        return view('admin/category/index',compact('categories'));

    }
    public function edit(Request $request){
        
        $cat = Category::where("_id",$request->id)->get()->toArray();
    // echo "<pre>";
    // dd($category);
    $cat = $cat[0];
        return view('admin/category/edit',compact('cat'));
        
    }
    public function post_edit(Request $request,Category $cat){
        $cat = Category::find($request->id);
        $cat->name = $request->cat_name;
    
        if($cat->save()){
            return redirect('admin/category')->with('success','edit thanh cong');
        }else{
            return redirect()->back()->withErrors('edit that bai');
            
        }
         
    }
    public function insert(){
        return view('admin/category/add_category');
    }
    public function post_insert(Request $request){
        // echo $request->category_name;
        $cate = new Category();
        $cate->name = $request->category_name;
        if($cate->save()){
            return redirect('admin/category')->with('success','insert thanh cong');
        }
    }
    public function delete_asd(Request $request){
        $cate = Category::find($request->id);
        // echo "<pre>";
        // var_dump($cate);
        if($cate->delete()){
            return redirect('admin/category')->with('success','delete thanh cong');
        }
    }
}
