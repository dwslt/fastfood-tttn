<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
use App\models\Blog;
use App\models\Comments;
class BlogController extends Controller
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
        $blogs = Blog::orderBy('id', 'desc')->paginate(3);
        // $blogs = $blogs[0];
        return view('admin/blog/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog/add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // echo "<pre>";
        // var_dump($data);
        $blog = new Blog();
        $blog->title = $data['title'];
        $file = $request->image;
        $blog->image = $file->getClientOriginalName();
        $blog->description = $data['description'];
        $blog->content = $data['content'];
        // $blog->img = $data- 
        echo "<pre>";
        var_dump($blog->toArray());
        if($blog->save()){
            if(!empty($file)){
                $file->move('upload/blog_img',$file->getClientOriginalName());
            }
            return redirect('admin/blog')->with('success','insert thanh cong');
        }else{
            return redirect()->back()->withErrors('insert that bai');
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
        $blog = Blog::find($id)->toArray();
        // echo "<pre>";
        // var_dump($blog);
        return view('admin/blog/edit_blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        // echo "<pre>";
        // var_dump($request->all());
        $blog = Blog::findOrFail($request->id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $file = $request->image;
        if(!empty($file)){
            $file->move('upload/blog_img',$file->getClientOriginalName());  
            $blog->image = $file->getClientOriginalName();
        }
        if($blog->save()){
           
            return redirect('admin/blog')->with('success','edit thanh cong');
        }else{
            return redirect()->back()->withErrors('edit that bai');
        }
        // echo "<pre>";
        // var_dump($blog->toArray());
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
        $blog = Blog::find($id);
        echo "<pre>";
        if($blog->delete()){
            return redirect()->back()->with('success','delete thanh cong');
        }else{
            return redirect()->back()->withErrors('delete that bai');
        }
    }
    public function comment(){
        $comments = Comments::orderBy('blog_id', 'desc')->paginate(5);
        return view('admin/blog/comment_blog',compact('comments'));
    }
    public function delete_comment(Request $request){
        Comments::findOrfail($request->id)->delete();
       // $comment->delete();
       return redirect()->back()->with('success','delete thanh cong');
   }
}
