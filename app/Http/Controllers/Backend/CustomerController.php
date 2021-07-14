<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
use App\Models\File;
use App\Models\User;

class CustomerController extends Controller
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
        return view('backend.pages.customer.index');
    }
    

    /*
     * ******************
     *  FILE MODULE
     * ***************
    */
    public function file() 
    {
        $services  = Service::where('trash', 0)->get();
        $customers = Customer::where('trash', 0)->get();

        return view('backend.pages.customer.file', compact('services', 'customers'));
    }

    /*
      FILE UPDATE
    */
    public function fileEdit(Request $request, $id) 
    {
        $file = File::where('id', $id)->with(['customer', 'service', 'comments', 'attachments', 'user'])->first();
        if($request->isMethod('POST')){

            $data = $request->except(['_token']);
            // UPDATE DATA
            File::where('id', $id)->update($data);
            // SET FLASH DATA
            session()->flash('success', 'Customer Successfully Updated');
            // AND REDIRECT TO
            return redirect()->back();
        }
        return view('backend.pages.customer.file_edit', compact('file'));
    }


    /*
     * ******************
     *  MOVEMENT MODULE
     * ******************
    */
    public function movements(Request $request) 
    {
        $services  = Service::where('trash', 0)->get();
        $customers = Customer::where('trash', 0)->get();
        $users     = User::get();

        return view('backend.pages.customer.movements', compact('services', 'customers', 'users'));
    }

    
    public function api_get_all(Request $request){
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

        
        $customers     = new Customer();
        $where   = [['trash', 0]];

        if($request->tax_id && $request->tax_id!=''){
            $where[] = ['tax_id', $request->tax_id];
        }

        if($request->customer_name && $request->customer_name!=''){
            $where[] = ['customer_name', 'LIKE', '%'.$request->customer_name.'%'];
        }

        if($request->region && $request->region!=''){
            $where[] = ['region', $request->region];
        }

        if($request->city && $request->city!=''){
            $where[] = ['city', $request->city];
        }

        $totalRecords = Customer::where($where)->count();
        $customers    = $customers->where($where)->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($customers as $customer){

            $data_arr[] = array(
                "tax_id"         => $customer->tax_id,
                "type"           => ucfirst($customer->type),
                "mobile"         => $customer->mobile,
                "date_of_birth"  => $customer->date_of_birth,
                "city"           => $customer->city,
                "region"         => $customer->region,
                "Actions"        => '',
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


    public function api_get_file(Request $request){
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

        
        $files     = new File();
        $where   = [['trash', 0]];

        if($request->tax_id && $request->tax_id!=''){
            $where[] = ['tax_id', $request->tax_id];
        }

        if($request->customer_id && $request->customer_id!=''){
            $where[] = ['tax_id', $request->customer_id];
        }

        if($request->service_id && $request->service_id!=''){
            $where[] = ['service_id', $request->service_id];
        }

        if($request->status && $request->status!=''){
            $where[] = ['status', $request->status];
        }

        $totalRecords = File::where($where)->count();
        $files    = $files->where($where)->with(['customer', 'service', 'user'])->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($files as $key=>$file){

            $type_    = ($file->customer->type ?? '');
            $customer = ($type_=='person' ? ($file->customer->customer_name ?? 'N/A') : ($file->customer->company_name ?? 'N/A'));

            $data_arr[] = array(
                "index"          => ++$key,
                "id"             => $file->id,
                "tax_id"         => $file->tax_id,
                "user"           => $file->user->name ?? 'N/A',
                "name"           => $customer,
                "service"        => $file->service->service_name ?? 'N/A',
                "status"         => ucfirst($file->status),
                "Actions"        => '',
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


    public function api_get_movement(Request $request){
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

        
        $files     = new File();
        $where   = [['trash', 0]];

        if($request->tax_id && $request->tax_id!=''){
            $where[] = ['tax_id', $request->tax_id];
        }

        if($request->customer_id && $request->customer_id!=''){
            $where[] = ['tax_id', $request->customer_id];
        }

        if($request->service_id && $request->service_id!=''){
            $where[] = ['service_id', $request->service_id];
        }

        if($request->user_id && $request->user_id!=''){
            $where[] = ['user_id', $request->user_id];
        }

        if($request->status && $request->status!=''){
            $where[] = ['status', $request->status];
        }

        $totalRecords = File::where($where)->count();
        $files    = $files->where($where)->with(['customer', 'service', 'user'])->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($files as $key=>$file){
            
            $type_    = ($file->customer->type ?? '');
            $customer = ($type_=='person' ? ($file->customer->customer_name ?? 'N/A') : ($file->customer->company_name ?? 'N/A'));

            $data_arr[] = array(
                "index"          => ++$key,
                "id"             => $file->id,
                "created_at"     => $file->created_at,
                "tax_id"         => $file->tax_id,
                "user"           => $file->user->name ?? 'N/A',
                "customer"       => $customer,
                "service"        => $file->service->service_name ?? 'N/A',
                "amount"         => $file->service->service_fee ?? 'N/A',
                "Actions"        => '',
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
}
