<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\models\Product;
use App\models\Brand;
use App\models\Cart;

use Image;
// use Intervention\Image\Facades\Image as Image;
use DateTimeZone;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::where('id_user',Auth::id())->orderBy('id', 'desc')->paginate(5);

        return view('frontend/product/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $pro = Cart::select('_id', 'qty')->where('id_product',"62753e0af1bae8b6e00bd7b5")
        //         ->get()->toArray();
        //         echo "<pre>";
        //         var_dump($pro);
        //         // dd($pro);
        //         $pro2 = Cart::where('id_product',"62753e0af1bae8b6e00bd7b5")->get()->toArray();
        //         // echo "<pre>";
        //         // var_dump($pro2);
        //         dd($pro2);
        $categories = Category::all()->toArray();
        $brands = Brand::all()->toArray();

        return view('frontend/product/add_product', compact('categories', 'brands'));
    }


    public function detail($id)
    {
        $product = Product::find($id)->toArray();
        $getArrImage = json_decode($product['image']);
        // dd($getArrImage);
        return view('frontend/product/detail_product', compact('product', 'getArrImage'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // var_dump($request->all());
        // echo "<pre>";
        // var_dump($request->image);

        if (empty($request->image)) {
            return redirect()->back()->withErrors('image ko duoc de trong');
        }
        if (count($request->image) > 3) {
            return redirect()->back()->withErrors('so luong image phai <=3');
        }
        $time = strtotime(date('Y-m-d H:i:s'));
        // echo $time;
        foreach ($request->file('image') as $image) {
            $name1 = $time . "--" . $image->getClientOriginalName();
            $name2 = "w85" . "--" . $time . "--" . $image->getClientOriginalName();
            $name3 = "w329" . "--" . $time . "--" . $image->getClientOriginalName();

            $path1 = public_path('upload/product/' . $name1);
            $path2 = public_path('upload/product/' . $name2);
            $path3 = public_path('upload/product/' . $name3);

            Image::make($image->getRealPath())->save($path1);
            Image::make($image->getRealPath())->resize(85, 84)->save($path2);
            Image::make($image->getRealPath())->resize(329, 380)->save($path3);

            $img[] = $name1;
        }
        // echo "<pre>";
        // var_dump($img);
        $product = new Product();
        $product->name = $request->name;
        $product->price = (int)($request->price);
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->company = $request->company;
        $product->detail = $request->detail;
        $product->image = json_encode($img);
        $product->status = $request->sale;
        $product->id_user = Auth::id();
        if ($request->sale == 1) {
            $product->sale = $request->number_sale;
        } else {
            $product->sale = 0;
        }

        if ($product->save()) {
            return redirect('user/my_product')->with('success', 'add product thanh cong');
        } else {
            return redirect()->back()->withErrors('add that bai');
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
        $categories = Category::all()->toArray();
        $brands = Brand::all()->toArray();
        $product = Product::find($id)->toArray();
        $getArrImage = json_decode($product['image']);

        $product_cate = Category::find($product['category'])->toArray();
        $product_brand = Brand::find($product['brand'])->toArray();

        foreach ($categories as $key => $value) {
            if ($value['name'] == $product_cate['name']) {
                unset($categories[$key]);
            }
        }

        foreach ($brands as $key => $value) {
            if ($value['name'] == $product_brand['name']) {
                unset($brands[$key]);
            }
        }
        // echo "<pre>";
        // var_dump($categories);
        return view('frontend/product/edit_product', compact('categories', 'brands', 'product_cate', 'product_brand', 'getArrImage', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (Auth::check()) {
            $image = Product::find($id)->toArray();
            $getArrImage = json_decode($image['image'], true);

            $img = [];
            if (isset($request->unimage)) {
                foreach ($request->unimage as $key => $value) {
                    $img[] = $key;
                }
            }
            $data = [];
            foreach ($getArrImage as $key => $value) {
                if (in_array($key, $img)) {
                    unset($getArrImage[$key]);
                } else {
                    $data[] = $value;
                }
            }

            if ($request->hasfile('image')) {
                $time = strtotime(date('Y-m-d H:i:s'));

                foreach ($request->file('image') as $image) {
                    // echo $image->getClientOriginalName()."<br>";
                    $name = $time . "--" . $image->getClientOriginalName();
                    $name_2 = "w85" . "--" . $time . "--" . $image->getClientOriginalName();
                    $name_3 = "w329" . "--" . $time . "--" . $image->getClientOriginalName();
                    // $image->move('upload/product/', $name);
                    //  $name->width();
                    $path = public_path('upload/product/' . $name);
                    $path2 = public_path('upload/product/' . $name_2);
                    $path3 = public_path('upload/product/' . $name_3);

                    Image::make($image->getRealPath())->save($path);
                    Image::make($image->getRealPath())->resize(85, 84)->save($path2);
                    Image::make($image->getRealPath())->resize(329, 380)->save($path3);

                    $data[] = $name;
                }
            }
            if (count($data) > 3) {
                return redirect()->back()->withErrors('ko duoc qua 3 file anh');
            } else if (count($data) < 1) {
                return redirect()->back()->withErrors('image khong duoc de trong');
            }
            $product = Product::find($request->id);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->id_category = $request->category;
            $product->id_brand = $request->brand;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->status = $request->sale;
            if ($request->sale == "1") {
                $product->sale = $request->number_sale;
            } else {
                $product->sale = 0;
            }
            $product->company = $request->company;
            $product->image = json_encode($data);
            // dd($product);
            // dd($id)
            if ($product->save()) {
                return redirect('user/my_product')->with('success', 'Edit thanh cong');
            }
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
        // dd($id);
        $product = Product::find($id);
        if ($product->delete()) {
            return redirect()->back()->with('success', 'delete thanh cong');
        } else {
            return redirect()->back()->withErrors('delete that bai');
        }
    }


}
