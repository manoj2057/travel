<?php

namespace App\Http\Controllers;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function site(){
       $site=Site::first();
       return view('admin.information',compact('site'));

    }

    public function updateSite(Request $request, $id){
        $data =$request->all();
        $rule=[
            'phoneno'=> 'required|max:10',
            'email'=> 'required|email|max:255',
            'location'=> 'required',
            'about_info'=> 'required',
            'contact_info'=> 'required',

        ];
        $customMessages= [
            'phoneno.required' => 'Please enter the phone no',
            'phoneno.max' => 'You are not allowed to enter more than 10 characters',
            'email.required' => 'Please enter email',
            'email.max' => 'You are not allowed to enter more than 255 characters',
            'email.email' => 'please a valid email address',
            'location.required' => 'Please enter location',
            'about_info.required' => 'Please fill about_info section',
            'contact_info.required' => 'Please fill contact_info section',
        ];
        $this->validate($request, $rule, $customMessages);
        // dd($data);
        $site= Site::find($request->id);
        $site->phoneno = $data['phoneno'];
        $site->email = $data['email'];
        $site->location = $data['location'];
        $site->about_info = $data['about_info'];
        $site->contact_info= $data['contact_info'];
        $site->save();
        return redirect()->back();
    

    }
    public function siteseo(){
        $site=Site::first();
        return view('admin.seo',compact('site'));
 
     }
     public function updateseo(Request $request, $id){
        $data =$request->all();
        // dd($data);
        $rule=[
            
            'seo_title'=> 'required',
            'seo_subtitle'=> 'required',
            'seo_keywords'=> 'required',
            'seo_description'=> 'required',

        ];
        $customMessages= [
            'seo_title.required' => 'Please enter the seo_title',
            'seo_subtitle.required' => 'Please enter seo_subtitle',
            'seo_keywords.required' => 'Please enter seo_keywords',
            'seo_description.required' => 'Please enter seo_description',
        ];
        $this->validate($request, $rule, $customMessages);

        $site= Site::find($request->id);
        $site->seo_title = $data['seo_title'];
        $site->seo_subtitle = $data['seo_subtitle'];
        $site->seo_keywords = $data['seo_keywords'];
        $site->seo_description = $data['seo_description'];
        
        $site->save();
        return redirect()->back();

}
public function socialsite(){
    $site=Site::first();
    return view('admin.social',compact('site'));

 }

 public function updateSocialmedia(Request $request, $id){
    $data =$request->all();

    $rule=[
            
        'facebook'=> 'required',
        'twitter'=> 'required',
        'insta'=> 'required',
        'linkdin'=> 'required',

    ];
    $customMessages= [
        'facebook.required' => 'Please enter the facebook url',
        'twitter.required' => 'Please enter twitter url',
        'insta.required' => 'Please enter insta url',
        'linkdin.required' => 'Please enter linkdin url',
    ];
    $this->validate($request, $rule, $customMessages);

    $site= Site::find($request->id);
    $site->facebook = $data['facebook'];
    $site->twitter = $data['twitter'];
    $site->insta= $data['insta'];
    $site->linkdin= $data['linkdin'];
    $site->save();
    return redirect()->back();
}

}
