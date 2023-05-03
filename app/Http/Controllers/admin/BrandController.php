<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
use App\models\Brand;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(3);
        return view('admin/brand/index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/add_brand');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->brand_name;
        
        if($brand->save()){
            return redirect('admin/brand')->with('successs','create brand success');
        }else{
            return redirect()->withErrors('insert that bai');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id)->toArray();
        // echo "<pre>";
        // dd($brand);
        // $brand = $brand[0];
            return view('admin/brand/edit',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
       $brand = Brand::find($id);
       $brand->name = $request->brand_name;
       if($brand->save()){
           return redirect('admin/brand')->with('success','edit thanh cong');
       }else{
           return redirect()->back()->withErrors('edit that bai');
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if($brand->delete()){
            return redirect()->back()->with('success','delete thanh cong');
        }else{
            return redirect()->back()->withErrors('delete that bai');
        }
    }
}
