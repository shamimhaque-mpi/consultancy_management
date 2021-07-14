<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    function __construct()
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
        $categories = Category::where('trash', 0)->get();
        return view('backend.pages.service.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('trash', 0)->get();
        return view('backend.pages.service.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Service::where('trash', 0)->where('service_name', $request->service_name)->exists()){
            $request->validate(["service_name" => "required|unique:services,service_name"]);
        }

        $data = $request->except(['_token']);

        session()->flash('success', 'Service Successfully Created');

        Service::create($data);
        return redirect()->route('service.index');
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
        $categories = Category::where('trash', 0)->get();
        $service = Service::where('id', $id)->first();

        return view('backend.pages.service.edit', compact('service', 'categories'));
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
        if($request->isMethod('POST')){
            $service = Service::where('id', $id)->first();
            if($service->service_name!=$request->service_name){
                $request->validate(["service_name" => "required"]);
            }

            $data = $request->except(['_token']);

            session()->flash('success', 'Service Successfully Updated');
            
            Service::where('id', $id)->update($data);
        }
        
        return redirect()->route('service.index');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        Service::where('id', $id)->update(['trash'=>1]);
        session()->flash('success', 'Service Successfully Deleted');
        return redirect()->route('service.index');
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

        
        $services     = new Service();
        $where   = [['trash', 0]];

        if($request->service_name && $request->service_name!=''){
            $where[] = ['service_name', $request->service_name];
        }

        if($request->cat_id && $request->cat_id!=''){
            $where[] = ['cat_id', $request->cat_id];
        }

        $totalRecords = Service::where($where)->count();
        $services     = $services->where($where)->with(['category'])->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($services as $service){

            $data_arr[] = array(
                "id"           => $service->id,
                "service_name" => $service->service_name,
                "service_fee"  => $service->service_fee,
                "category"     => $service->category->category_name ?? 'N/A',
                "Actions"      => '',
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
