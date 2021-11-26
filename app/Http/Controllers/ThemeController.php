<?php

namespace App\Http\Controllers;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class ThemeController extends Controller
{
    public function theme(){
        $theme = Theme::find(1);

        return view('admin.theme',compact('theme'));

    }
    public function updateTheme(Request $request, $id){
        $data =$request->all();
        // dd($data);

        $rule=[
            
            'website_title'=> 'required',
            'website_subtitle'=> 'required',
            
    
        ];
        $customMessages= [
            'website_title.required' => 'Please enter the website_title',
            'website_subtitle.required' => 'Please enter website_subtitle',
            
        ];
        $this->validate($request, $rule, $customMessages);
    


        $theme= Theme::find($request->id);
        $theme->website_title = $data['website_title'];
        $theme->website_subtitle= $data['website_subtitle'];
        $random = Str::random(10);
        if($request->hasFile('logo')){
            $image_tmp = $request->file('logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/theme/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->logo = $filename;
            }
        }
        if($request->hasFile('favicon')){
            $image_tmp = $request->file('favicon');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/uploads/theme/' . $filename;
                Image::make($image_tmp)->save($image_path);
                $theme->favicon = $filename;
            }
        }

        $theme->save();
    return redirect()->back();

}
}