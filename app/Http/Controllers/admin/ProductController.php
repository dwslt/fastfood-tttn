<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\models\Product;
use App\models\Cart;
use App\models\History;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        // $product = Product::orderBy('id', 'desc')->paginate(5);
        return view('admin/product/index',compact('products'));
    }

    public function history()
    {
        $histories = History::orderBy('id', 'DESC')->paginate(5);
        $his = History::all()->toArray();

        $count = 0;
        $number = count($his);
        // echo $number;
        $top = array();
        // foreach($his as $key=>$value){
        //     $count = History::where('id_user',$value['id_user'])->count();
        //     echo $count."<br>";
        // }

        // echo "<pre>";
        // var_dump($his);
        // foreach($top3 as $key=>$value){

        // }
        // echo "<pre>";
        // var_dump($top);


        return view('admin/product/history',compact('histories'));

    }
    public function history_detail(Request $request){

        $cart = Cart::select()->where('id_user',$request->id)->get()->toArray();
        // echo "<pre>";
        // var_dump($cart);
        // foreach($cart as $key=>$value){
        //     echo $value['id_product'];
        // }
        // echo "<pre>";
        // var_dump($cart);
        return view('admin/product/history_detail',compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $product = Product::find($id);
        if ($product->delete()) {
            return redirect()->back()->with('success', 'delete thanh cong');
        } else {
            return redirect()->back()->withErrors('delete that bai');
        }
    }
}
