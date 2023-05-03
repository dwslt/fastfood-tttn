<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
use App\models\Country;
use App\User;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        // $user = Auth::all();
        echo "ads";
        // return view('admin/profile/index');
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
    public function show()
    {
        $user = Auth::user();
        // dd($user);
        $countries = Country::all()->toArray();
        // dd($countries);

        return view('admin/profile/index',compact('user','countries'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // echo Auth::id();
        $user = User::find(Auth::id());
        
        $data = $request->all();
        $file = $request->avatar;
        if(!empty($file)){
            $user->avatar = $file->getClientOriginalName();
        }
        if(!empty($data['password'])){
            $user->password = bcrypt($data['password']);
        }
        if(!empty($data['name'])){
            $user->name = $request->name;
        }
        if(!empty($data['phone'])){
            $user->phone = $request->phone;
        }
        if(!empty($data['country'])){
            $user->country = $request->country;
        }
        // echo "<pre>";
        // var_dump($data);
        
        // var_dump($user->toArray());



        if($user->update()){
            if(!empty($file)){
                $file->move('upload/user/avatar',$file->getClientOriginalName());
            }
            return redirect()->back()->with('success','update profile success');
        }
        else{
            return redirect()->back()->withErrors('update profile error.');
        }
       
        // var_dump($avatar->getClientOriginalName());
        // var_dump($asd->getMimeType());
        // $img_fail = $file->getClientOriginalExtension();

      
        
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
