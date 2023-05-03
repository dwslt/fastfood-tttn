<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $admins = User::where('level','admin')->orderBy('id','desc')->paginate('5');
        $members = User::where('level','member')->orderBy('id','desc')->paginate('5');
        return view('admin/member/index',compact('admins','members'));
       
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
    public function update($role, $id)
    {
        if($role=="member"){
            $member =  User::find($id);
            $member->level = "admin";
            if($member->update()){
                return redirect()->back()->with('success_member','xoa quyen admin thanh cong');
            }else{
                echo "asd";
            }
        }
        if($role=="admin"){
            $member =  User::find($id);
            $member->level = "member";
            if($member->update()){
                return redirect()->back()->with('success_admin','cap quyen admin thanh cong');
            }else{
                echo "asd";
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role,$id)
    {
        if($role=="member"){
            $member = User::find($id);
            if($member->delete()){
                return redirect('admin/member')->with('success_member','delete thanh cong');
            }else{
                return redirect('admin/member')->withErrors('delete that bai');

            }
        }elseif($role=="admin"){
            $member = User::find($id);
            if($member->delete()){
                return redirect('admin/member')->with('success_admin','delete thanh cong');
            }else{
                return redirect('admin/member')->withErrors('delete that bai');

            }
        }
    }
}
