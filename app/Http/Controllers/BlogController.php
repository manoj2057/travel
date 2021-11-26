<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Category;
use DataTables;



class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::latest()->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function addBlog(){
        $categories = Category::orderBy('category_name', 'ASC')->get();
        return view('admin.blog.add', compact('categories'));
    }
    public function storeBlog(Request $request){
        $data=$request->all();
        $validateData=$request->validate([
    
        ]);
        $blog = new Blog();
        $blog->blog_title = $data['blog_title'];
        $blog->slug = Str::slug($data['blog_title']);
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;

            }
        }
        $blog->content = $data['content'];
    
        if(empty($data['status'])){
            $blog->status = 0;
        }
        else{
            $blog->status = 1;
        }
        if($request->hasFile('image')){
            $image_tmp = $request->file('background_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->background_image = $filename;

            }
        }

        $blog->category_id = $data['category_id'];
        $blog->viewcount = 0;

        $blog->admin_id = Auth::guard('admin')->user()->id;
        $blog->save();
        Session::flash('success_message', 'category Has Been Added Successfully');
        return redirect()->back(); 
    }
    public function editBlog($id){
        $blog= Blog::findOrFail($id);
        return view('admin.blog.edit',compact('blog'));
    }
    public function updateBlog(Request $request, $id){
        $data=$request->all();
        $blog= Blog::findOrFail($id);
        $blog->blog_title = $data['blog_title'];
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->image = $filename;

            }
        }
        $blog->content = $data['content'];
        $blog->slug = Str::slug($data['blog_title']);
        if (empty($data['status'])){
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        if($request->hasFile('image')){
            $image_tmp = $request->file('background_image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/blog/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $blog->background_image = $filename;

            }
        }

        $category->save();
        Session::flash('success_message', 'Blog has been updated Successfully');
        return redirect()->back(); 
    }
    public function dataTable(){
        $model = Blog::all();
        return DataTables::of($model)
           ->addColumn('action', function($model){
               return view('admin.category._actions', [
                    'model'=> $model,
                    'url_edit' =>route('editBlog',$model->id)
               ]);
               
           })
           ->addIndexColumn()
           ->rawColumns(['actions'])
                ->make(true);
    }
}
