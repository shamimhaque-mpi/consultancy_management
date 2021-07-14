<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request, Hash;
use App\Models\Admin;

class AdminController extends Controller
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
    public function index()
    {
        return view('backend.pages.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'admin_type' => 'required',
            'password'   => 'required',
            'mobile'     => 'required|unique:admins,mobile',
            'email'      => 'required|unique:admins,email',
            'username'   => 'required|unique:admins,username',
            'confirm_password' => 'required|same:password',
        ]);

        $data = $request->except(['_token', 'confirm_password', 'img']);
        $data['password'] = Hash::make($request->password);

        if($request->img){
            $path = "public/images/admin/";
            $name = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move($path, $name);
            $data['img'] = $path.$name;
        }

        Admin::create($data);
        session()->flash('success', 'Admin Successfully Created');
        return redirect()->route('admin.index');
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
        $admin = Admin::where('id', $id)->first();

        return view('backend.pages.admin.edit', compact('admin'));
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
        $request->validate([
            'name'       => 'required',
            'admin_type' => 'required',
        ]);

        $data  = $request->except(['_token', 'password', 'confirm_password', 'img']);

        $admin = Admin::where('id', $id)->first();

        if($request->mobile!=$admin->mobile){
            $request->validate(['mobile' => 'required|unique:admins,mobile']);
        }

        if($request->email!=$admin->email){
            $request->validate(['email' => 'required|unique:admins,email']);
        }

        if($request->password != ''){
            $request->validate([
                'password'          => 'required',
                'confirm_password'  => 'required|same:password',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        if($request->img){
            $path = "public/images/admin/";
            $name = time().'.'.$request->img->getClientOriginalExtension();
            $request->img->move($path, $name);
            $data['img'] = $path.$name;
            
            if(file_exists($admin->img)){
                unlink($admin->img);
            }
        }

        Admin::where('id', $id)->update($data);
        session()->flash('success', 'Admin Successfully Updated');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile($id){
        $admin = Admin::where('id', $id)->first();
        return view('backend.pages.admin.profile', compact('admin'));
    }

    public function api_fetch_data(Request $request)
    {
        $draw       = $request->get('draw');
        $start      = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr  = $request->get('columns');
        $order_arr       = $request->get('order');
        $search_arr      = $request->get('search');

        $columnIndex     = $columnIndex_arr[0]['column']; // Column index
        $columnName      = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue     = $search_arr['value']; // Search value

        
        $totalRecords=0;
        $requisitions="";

        if($searchValue == null){
            $searchValue="";
        }
        
        
        $totalRecords = Admin::count();
        //return $requisitions;
       
        $admins = new Admin();

        if($request->username && $request->username!=''){
            $admins = $admins->where('username', $request->username);
        }
        if($request->name && $request->name!=''){
            $admins = $admins->where('name', 'LIKE', '%'.$request->name.'%');
        }
        if($request->mobile && $request->mobile!=''){
            $admins = $admins->where('mobile', $request->mobile);
        }
        if($request->email && $request->email!=''){
            $admins = $admins->where('email', $request->email);
        }
        if($request->admin_type && $request->admin_type!=''){
            $admins = $admins->where('admin_type', $request->admin_type);
        }

        $admins = $admins->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($admins as $admin){

            $data_arr[] = array(
                "id"        => $admin->id,
                "username"  => $admin->username,
                "name"      => $admin->name,
                "email"     => $admin->email,
                "mobile"    => $admin->mobile,
                "address"   => $admin->address,              
                "type"      => ucfirst($admin->admin_type),              
                "Actions"   => '',
            );
        }
        $response = array(
            'd'     =>$searchValue,
            "draw"  => intval($draw),
            "data"  => $data_arr,
            "recordsTotal"      => $totalRecords,
            "recordsFiltered"   => $totalRecords
        ); 

        echo json_encode($response);
        exit; 
    }
}
