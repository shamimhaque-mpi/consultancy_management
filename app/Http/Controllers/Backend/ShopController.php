<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
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
        return view('backend.pages.shop.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.pages.shop.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["shop_name" => "required|unique:shops,shop_name"]);

        $data = $request->except(['_token']);

        session()->flash('success', 'Shop Successfully Created');

        Shop::create($data);
        return redirect()->route('shop.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::where('id', $id)->first();

        return view('backend.pages.shop.edit', compact('shop'));
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
            $shop = Shop::where('id', $id)->first();
            if($shop->shop_name!=$request->shop_name){
                $request->validate(["shop_name" => "required|unique:shops,shop_name"]);
            }

            $data = $request->except(['_token']);

            session()->flash('success', 'Shop Successfully Updated');
            
            Shop::where('id', $id)->update($data);
        }
        
        return redirect()->route('shop.index');
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
        Shop::where('id', $id)->update(['trash'=>1]);
        session()->flash('success', 'Shop Successfully Deleted');
        return redirect()->route('shop.index');
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

        
        $totalRecords = Shop::count();
        $shops        = new Shop();

        if($request->shop_name && $request->shop_name!=''){
            $shops = $shops->where('shop_name', 'LIKE' ,'%'.$request->shop_name.'%');
        }

        $shops = $shops->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($shops as $shop){

            $data_arr[] = array(
                "id"           	=> $shop->id,
                "shop_name" 	=> $shop->shop_name,
                "shop_address" 	=> $shop->shop_address,
                "Actions"      	=> '',
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
