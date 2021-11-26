<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use DataTables;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }
    public function addCategory(){
        return view('admin.category.add');
    }
    public function storeCategory(Request $request){
        $data=$request->all();
        $validateData=$request->validate([
            'category_name'=> 'required',
            'slug'=>'unique',
            

        ]);
        $category = new Category();
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        if(empty($data['status'])){
            $category->status = 0;
        }
        else{
            $category->status = 1;
        }
        $category->save();
        Session::flash('success_message', 'category Has Been Added Successfully');
        return redirect()->back(); 
    }
    public function editCategory($id){
        $category= Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function updateCategory(Request $request, $id){
        $data=$request->all();
        $category= Category::findOrFail($id);
        $category->category_name = $data['category_name'];
        $category->slug = Str::slug($data['category_name']);
        if (empty($data['status'])){
            $category->status = 0;
        } else {
            $category->status = 1;
        }

        $category->save();
        Session::flash('success_message', 'category has been updated Successfully');
        return redirect()->back(); 
    }
    public function dataTable(){
        $model = Category::all();
        return DataTables::of($model)
           ->addColumn('action', function($model){
               return view('admin.category._actions', [
                    'model'=> $model,
                    'url_edit' =>route('editCategory',$model->id)
               ]);
               
           })
           ->addIndexColumn()
           ->rawColumns(['actions'])
                ->make(true);
    }
}