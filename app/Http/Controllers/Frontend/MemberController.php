<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\Country;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all()->toArray();
        // echo "<pre>";
        // var_dump($countries);
        return view('frontend/member/register',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->address = $data['address'];
        $user->country = $data['country'];
        $user->password = bcrypt($data['password']);
        $user->level = "member";
        // $user->avatar = $data['avatar']->getClientOriginalName();
        // echo $data['password'];
        // echo "<pre>";
        // var_dump($user->toArray());
        if (!empty($request->avatar)) {
            $user->avatar = $data['avatar']->getClientOriginalName();
        }else{
            $user->avatar = "avatar.png";
        }
        if($user->save()){
            if (!empty($request->avatar)) {
                $request->avatar->move('upload/user/avatar', $data['avatar']->getClientOriginalName());
            }
            return redirect('user/login');
        }else{
            return redirect()->back('register that bai');
        }
    }
    public function showLogin(){
        return view('frontend/member/login');
    }

    public function postLogin(Request $request){

        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => "member"
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
        $check = false;
        if (Auth::attempt($login, $remember)) {
            $check = true;
            // return view('frontend/index',compact('check'));
            // return redirect('frontend/index')->with(compact('check'));
            return redirect('user/')->with('success', 'check');
        } else {
            return redirect()->back()->withErrors('email or password is not correct');
        }

    }

    public function logout(){
        Auth::logout();
            // return view('frontend/home/index');
            return redirect('/user')->with('success','logout success');
            // $request->session()->invalidate();

            // $request->session()->regenerateToken();

            // return redirect('/');


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
