<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $admins = Admin::get();
        $admin  = false;

        if($request->filter){
            $admin = Admin::where('id', $request->admin_id)->first();
        }

        if($request->save){
            Admin::where('id', $request->admin_id)->update(['permission'=>json_encode($request->status)]);
            $admin = Admin::where('id', $request->admin_id)->first();
            session()->flash('success', 'Permission Successfully Saved');
        }

        return view('backend.pages.privilege.status', compact('admins', 'admin'));
    }

}
