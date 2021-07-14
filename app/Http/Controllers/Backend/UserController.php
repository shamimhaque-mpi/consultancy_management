<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, Hash;
use App\Models\User;

class UserController extends Controller
{
    function __construct()
    {
    	$this->middleware('admin');
    }


    public function index(){
    	return view('backend.pages.users.all');
    }

    public function create(Request $request)
    {
        if($request->isMethod('POST')){
            $this->store($request);
            return redirect()->back();
        }

    	return view('backend.pages.users.add');
    }
    
    public function store($request)
    {
        $request->validate([
            "name"      => "required",
            "mobile"    => "required|unique:users,mobile",
            "email"     => "required|unique:users,email",
            "username"  => "required|unique:users,username",
            "password"  => "required",
            "confirm_password" => "required|same:password",
        ]);

        $data             = $request->except(['_token', 'confirm_password']);
        $data['password'] = Hash::make($request->password);
        session()->flash('success', 'User Successfully Created');
        User::create($data);
    }
    
    /*
     * ********************
     *  Show Update Form
     * ******************
    */ 
    public function edit(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if($request->isMethod('POST')){
            $this->update($request, $id, $user);
            return redirect()->route('admin.user.all');
        }

    	return view('backend.pages.users.edit', compact('user'));
    }
    
    
    /*
     * ********************
     *  Update User Data
     * ******************
    */ 
    public function update($request, $id, $user){

        $data = $request->except(['_token', 'confirm_password', 'password']);

        if($request->password){
            $request->validate([
                "password"  => "required",
                "confirm_password" => "required|same:password",
            ]);
            $data['password'] = Hash::make($request->password);
        }

        if($request->mobile!=$user->mobile){
            $request->validate(["mobile"    => "required|unique:users,mobile"]);
        }

        if($request->email!=$user->email){
            $request->validate(["email"    => "required|unique:users,email"]);
        }

        session()->flash('success', 'User Successfully Updated');
        User::where('id', $id)->update($data);

    }

    public function allUser(Request $request){
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

        
        $totalRecords = User::count();
       
        $users = new User();

        if($request->id && $request->id!=''){
            $users = $users->where('id', $request->id);
        }
        if($request->uesrname && $request->uesrname!=''){
            $users = $users->where('uesrname', $request->uesrname);
        }
        if($request->mobile && $request->mobile!=''){
            $users = $users->where('mobile', $request->mobile);
        }
        if($request->email && $request->email!=''){
            $users = $users->where('email', $request->email);
        }

        $users = $users->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($users as $user){

            $data_arr[] = array(
                "id"   => $user->id,
                "name"      => $user->name,
                "username"  => $user->username,
                "email"     => $user->email,
                "mobile"    => $user->mobile,
                "address"   => $user->address,
                "Actions"   => '',
            );
        }
        $response = array(
            'd'                 => $searchValue,
            "draw"              => intval($draw),
            "recordsTotal"      => $totalRecords,
            "recordsFiltered"   => $totalRecords,
            "data"              => $data_arr
        ); 

        echo json_encode($response);
        die;
    }
    

    public function profile($id){
        $admin = User::where('id', $id)->first();
        return view('backend.pages.users.profile', compact('admin'));
    }
}
