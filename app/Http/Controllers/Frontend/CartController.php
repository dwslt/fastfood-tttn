<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use App\models\Cart;
use App\models\History;
use App\User;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/cart/cart');
    //     $pro = Cart::select('_id', 'qty')->where('id_product', "62753e1bf1bae8b6e00bd7b6")
    //     ->get()->toArray();

    // $id = $pro['0']['_id'];
    // $qty = $pro['0']['qty'];
    // $qty++;
    // $cart = Cart::find($id);
    // $cart->qty = $qty;
    // if($cart->save()){
    //     echo "asd";
    // }else{
    //     echo "aaa";
    // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_addtocart(Request $request)
    {
        $carts = Cart::all()->toArray();

        $check = true;

        // dd($request->all());
        foreach ($carts as $key => $value) {
            if ($value['id_product'] == $request->pro_id) {
                $check = false;
            }
        }
        if ($check == false) {

            $pro = Cart::select('_id', 'qty')->where('id_product', $request->pro_id)
                ->get()->toArray();

            $id = $pro['0']['_id'];
            $qty = $pro['0']['qty'];
            $qty++;
            $cart = Cart::find($id);
            $cart->qty = $qty;
        } else {
            $cart = new Cart;
            $cart->image = $request->pro_img;
            $cart->name = $request->pro_name;
            $cart->price = (int)$request->pro_price;
            $cart->qty =1;
            $cart->id_product = $request->pro_id;
            $cart->status = (int)$request->pro_status;
        }


        if (session()->has('carts_session')) {
            $check = true;
            $pro_id = $request->pro_id;
            $cart = session()->get('carts_session');
            foreach ($cart as $key => $value) {
                if ($pro_id == $value['product_id']) {
                    $cart[$key]['product_qty'] += 1;
                    $check = false;
                }
            }
            if ($check) {
                $carts = [];
                $carts = array(
                    "product_id" => (int)$request->pro_id,
                    "product_image" => $request->pro_img,
                    "product_name" => $request->pro_name,
                    "product_qty" => 1,
                    "product_price" => $request->pro_price,
                    "product_status"=>(int)$request->pro_status
                );
                $carts_session = $carts;
                session()->push('carts_session', $carts_session);
            } else {
                session()->put('carts_session', $cart);
            }
        } else {
            $carts = [];
            $carts = array(
                "product_id" => (int)$request->pro_id,
                "product_image" => $request->pro_img,
                "product_name" => $request->pro_name,
                "product_qty" => 1,
                "product_price" => $request->pro_price,
                "product_status"=>(int)$request->pro_status

            );
            $carts_session = $carts;
            session()->push('carts_session', $carts_session);
        }



        //total_item
        if (session()->has('carts_session')) {
            $carts_session = session()->get('carts_session');
            $total_item = 0;
            foreach ($carts_session as $key => $value) {

                $total_item += $carts_session[$key]['product_qty'];
            }
            $total_item = (int)$total_item;
            session()->put('total_item', $total_item);
        }
        // session()->forget('carts_session');
        // session()->forget('total_item');

        if ($cart->save()) {
            return response()->json(['success' => "oke"]);
        } else {
            // return response()->json(['errors' => 'failed']);
            return response()->json(['success' => "oke"]);

        }
    }
    public function ajax_up_product(Request $request)
    {
        if(session()->has('carts_session')){
            $check = true;
            $pro_id = $request->id_product;
            $cart = session()->get('carts_session');
            foreach($cart as $key=>$value){
                if($pro_id==$value['product_id']){
                    $cart[$key]['product_qty']+=1;
                    $check=false;
                }
            }
            if($check==false){
                session()->put('carts_session',$cart);
            }
        }
        if(session()->has('total_item'))
        {
            $total_item = session()->get('total_item') ;
            $total_item++;
            session()->put('total_item',$total_item);
        }
        return response()->json(['success'=>'oke']);
    }

    public function ajax_down_product(Request $request)
    {
        if(session()->has('carts_session')){
            $check = true;
            $check_qty = true;
            $pro_id = $request->id_product;
            $cart = session()->get('carts_session');
            foreach($cart as $key=>$value){
                if($pro_id==$value['product_id']){
                    $cart[$key]['product_qty']-=1;
                    if($cart[$key]['product_qty']==0){
                        unset($cart[$key]);
                    }
                    $check=false;
                }
            }
            if($check==false){
                session()->put('carts_session',$cart);
            }
        }
        if(session()->has('total_item'))
        {
            $total_item = session()->get('total_item') ;
            $total_item--;
            session()->put('total_item',$total_item);
        }
        return response()->json(['success'=>'oke']);
    }
    public function ajax_delete_product(Request $request)
    {
        if(session()->has('carts_session')){
            $check = true;
            $pro_id = $request->id_product;
            $cart = session()->get('carts_session');
            foreach($cart as $key=>$value){
                if($pro_id==$value['product_id']){

                    unset($cart[$key]);
                    $check=false;
                }
            }
            if($check==false){
                session()->put('carts_session',$cart);
            }
        }
        if(session()->has('total_item'))
        {
            $total_item = session()->get('total_item') ;
            $qty = (int)$request->qty_s;
            $total_item-=$qty;
            session()->put('total_item',$total_item);
        }

        return response()->json(['success'=>'oke']);
    }
    public function checkout(){
        $history = new History();
        $user = User::find(Auth::id())->toArray();
        // dd($user);
        $price = 0;
        $item=0;
        $cart = session()->get('carts_session');
        // echo "<pre>";
        // var_dump($cart);
            foreach($cart as $key=>$value){
                // if($pro_id==$value['product_id']){
                //     $cart[$key]['product_qty']+=1;
                //     $check=false;
                // }
                // echo $key."-".$value;
                $price += (int)$cart[$key]['product_price'];
                $item+=(int)$cart[$key]['product_qty'];
            }
            // echo $price;
        $history->email = $user['email'];
        $history->phone = $user['phone'];
        $history->name = $user['name'];
        $history->id_user = $user['_id'];
        $history->price = $price;
        $history->status = "0";
        $history->item = $item;

        if($history->save()){

            // $cart = Cart::all();
            // $cart->delete();
            $carts_session = session()->get('carts_session');
                        foreach ($carts_session as $key => $value) {
                            $cart = new Cart;
                            $cart->image = $value['product_image'];
                            $cart->name = $value['product_name'];
                            $cart->price = $value['product_price'];
                            $cart->qty = $value['product_qty'];
                            $cart->id_product = $value['product_id'];

                            $cart->id_user = Auth::id();

                            $cart->save();
                        }
                        session()->forget('carts_session');
                        session()->forget('total_item');
            return redirect()->back()->with('success','Đặt hàng thành công, chúng tôi sẽ liên hệ với bạn để xác nhận đơn hàng');
        }
    }
    public function lichsumuahang(){
        // $histories = History::all();
        // $histories->where('id_user',Auth::id());
        // echo "<pre>";
        // dd($histories);
        $carts = Cart::select()->where('id_user',Auth::id())->get()->toArray();
        // dd($carts);
        return view('frontend/account/lichsumuahang',compact('carts'));
    }
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
