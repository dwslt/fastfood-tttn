<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Country;
use App\models\Category;
use App\models\Brand;
use App\models\Product;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $categories = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        return view('frontend/search/search', compact('categories', 'brands'));
    }
    public function post_search(Request $request)
    {
        $products = Product::select();

        // dd($request->all());
        // echo "<pre>";
        // var_dump($request->all());
        // echo "<pre>";
        // var_dump($request->all());
        if ($request->name !="") {
            // echo "asd";
            // echo $request->name;

            $products->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('price')) {
            $price =  $request->price;
            $arr_price = explode('-', $price);
            $count = count($arr_price);
            // echo $count;
            // echo $arr_price['0'];
            // dd($products->get()->toArray());
            if ($count == 1) {
                $price = 0;
                if ($arr_price['0'] == 300) {
                    $price =  (int)$arr_price['0'];
                    $products->where('price', '<', $price);
                    // echo "<pre>";
                    // var_dump($products->get()->toArray());

                } else if($arr_price['0'] == 700) {
                    $price =  700;
                    $products->where('price', '>', $price);
                }
            } else if ($count == 2) {
            // dd($products->get()->toArray());
// dd($arr_price['1']);
                $min = (int)$arr_price['0'];
                $max = (int)$arr_price['1'];
            $products->where('price', '>=', $min)
                    ->where('price', '<', $max);
            }
            // dd($count);
            // dd($products->get()->toArray());
        }

        // dd($products);
        // echo "<pre>";
        // var_dump($products);

        if ($request->has('category')) {
            $check = false;
            $categories = Category::all()->toArray();
            foreach($categories as $key=>$value){
                if($value['_id']==$request->category){
                    $check=true;
                }
            }

            if($check==1){
                $products->where('category', $request->category);
            }
        }

        if ($request->has('brand')) {
            // echo $request->category."<br>";
            $check = false;
            $brands = Brand::all()->toArray();
            foreach($brands as $key=>$value){
                if($value['_id']==$request->brand){
                    $check=true;
                }
            }

            if($check==1){
                $products->where('brand', $request->brand);
            }
            // $products->where('id_brand', $request->brand);
        }

        // if ($request->has('status')) {
        //     // $check = false;
        //     // $status = Product::all()->toArray();

        //     // foreach($status as $key=>$value){
        //     //     if($value['status']==$request->status){
        //     //         $check=true;
        //     //     }
        //     // }
        //     // if($check==1){
        //         $products->where('status', $request->status);
        //     // }
        //     // $products->where('id_brand', $request->brand);
        // }
        // dd($products->get()->toArray());

        // echo "<pre>";
        $products = $products->get()->toArray();

        // var_dump($products);


        $categories = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        return view('frontend/search/search', compact('categories', 'brands','products'));
    }
    public function search_name(Request $request)
    {
        $products = Product::query();
        if ($request->has('name')) {
            $products->where('name', 'like', '%' . $request->name . '%');
        }
        // echo $request->name;
        $products = $products->get()->toArray();
        return view('frontend/search/search_name',compact('products'));
    }
    public function ajax_search_price(Request $request)
    {
        $price = $request->arr_price;
        $arr_price = explode(':',$price);
        $min = (int)$arr_price['0'];
        $max = (int)$arr_price['1'];
        // $products = Product::where('price','>')
        $products = Product::query();
        $products->where('price', '>=',$min)
                 ->where('price','<=',$max);
        $products = $products->get()->toArray();

        return response()->json(['products'=>$products]);
    }
    public function search_cate(Request $request)
    {
        $products = Product::select()->where('category',$request->id)->get()->toArray();
        // echo "<pre>";
        // var_dump($products);
        // return
        return view('frontend/search/search_cate',compact('products'));
    }
    public function search_brand(Request $request)
    {
        $products = Product::select()->where('brand',$request->id)->get()->toArray();
        // echo "<pre>";
        // var_dump($products);
        // return
        return view('frontend/search/search_brand',compact('products'));
    }
    public function index()
    {
        //
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
        //
    }
}
