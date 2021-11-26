<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use DataTables;
class TagController extends Controller
{
    public function index()
    {
        $tags = tag::all();    
         return view('admin.tag.index', compact('tags'));
    }

    public function create()
    {
        $tag = Tag::all();
        return view('admin.tag.add', compact('tag'));
    }
    public function store(Request $request)
    {
        $data =$request->all();
        $validateData=$request->validate([
            'name' => 'required|unique:tags|max:255'
           
        ]);

        $data =$request->all();
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->slug = Str::slug($data['name']);
        $tag->save();
        return redirect()->route('index');
    }
    public function edit($id)
    {
        $tag= Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id){
        $validateData=$request->validate([
            'name' => 'required|unique:tags|max:255'
        ]);
    
    
            $data = $request->all();
            // dd($data);
            $tag= Tag::findOrFail($id);
            $tag->name = $data['name'];
            $tag->save();
            Session::flash('success_message', 'tag  has been updated successfully');
            return redirect()->route('index');
    
        }
        public function delete($id){
            $tag = Tag::findOrFail($id);
            $tag->delete();
            Session::flash('success_message', ' tag Has Been deleted Successfully');
        return redirect()->back();
        }

        public function dataTable(){
            $model = Tag::all();
            return DataTables::of($model)
               ->addColumn('action', function($model){
                   return view('admin.tag._actions', [
                        'model'=> $model,
                        'url_edit' =>route('edittag',$model->id)
                   ]);
                   
               })
               ->addIndexColumn()
               ->rawColumns(['actions'])
                    ->make(true);
        }
        
    

}

