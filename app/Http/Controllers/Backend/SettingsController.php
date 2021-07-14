<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->except(['_token', 'logo', 'fav_icon']);
            $old_settings = Setting::first();


            // LOGO
            if($request->logo){
                $path = "public/images/";
                $name = time().'.'.$request->logo->getClientOriginalExtension();
                $request->logo->move($path, $name);
                $data['logo'] = $path.$name;

                if(file_exists($old_settings->logo)){
                    unlink($old_settings->logo);
                }
            }

            // FAV ICON
            if($request->fav_icon){
                $path = "public/images/";
                $name = (time()+1).'.'.$request->fav_icon->getClientOriginalExtension();
                $request->fav_icon->move($path, $name);
                $data['fav_icon'] = $path.$name;
                
                if(file_exists($old_settings->fav_icon)){
                    unlink($old_settings->fav_icon);
                }
            }

            if($old_settings){
                Setting::whereId($old_settings->id)->update($data);
            }else {
                Setting::create($data);   
            }
            session()->flash('success', 'Setting Successfully Updated');
            return redirect()->back();            
        }

        $settings = Setting::first();

        return view('backend.pages.settings.general', compact('settings'));
    }
}
