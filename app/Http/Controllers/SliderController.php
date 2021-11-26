<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Datatable;

class SliderController extends Controller
{
   public function slider()
    {
        $Sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('Sliders'));
    }
    

    public function create()
    {
        $slider = Slider::all();
        return view('admin.slider.add', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->all();
        $validateData=$request->validate([
            'title'=> 'required',
            'image'=>'required',
            'content'=>'required',
            'order'=> 'required',
            'status'=>'required',

        ]);

        $data =$request->all();
        $slider = new Slider();
        $slider->title = $request->input('title');
        $slider->content = $request->input('content');
        $slider->order = $data['order'];
        $slider->status = $data['status'];
        $slider->url = $data['url'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/slider/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $slider->image = $filename;
            }
        $slider->save();
        return redirect()->route('slider');
    }
}
public function edit($id)
    {
        $slider= Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }
  public function update(Request $request, $id){
    $validateData=$request->validate([
        'title'=> 'required',
        'image'=>'required',
        'content'=>'required',
        'order'=> 'required',
        'status'=>'required',

    ]);


        $data = $request->all();
        // dd($data);
        $slider= Slider::findOrFail($id);
        $slider->title = $data['title'];
        $slider->content = $data['content'];
        $slider->order = $data['order'];
        $slider->status = $data['status'];
        $slider->url = $data['url'];
        $random = Str::random(10);
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/slider/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $slider->image = $filename;
            }
        }

        $slider->save();
        Session::flash('success_message', 'slider  has been updated successfully');
        return redirect()->route('slider');

    }
    public function delete($id){
        $slider = Slider::findOrFail($id);
        $slider->delete();
        Session::flash('success_message', ' slider Has Been deleted Successfully');
    return redirect()->back();
    }
    
    public function dataTable(){
        $model = Slider::all();
        return DataTables::of($model)
           ->addColumn('action', function($model){
               return view('admin.slider._actions', [
                    'model'=> $model,
                    'url_edit' =>route('editSlider',$model->id)
               ]);
               
           })
           ->addIndexColumn()
           ->rawColumns(['actions'])
                ->make(true);
    }

}

