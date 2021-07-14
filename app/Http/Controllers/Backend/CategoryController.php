<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
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
        return view('backend.pages.category.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["category_name" => "required|unique:categories,category_name"]);

        $data = $request->except(['_token']);

        session()->flash('success', 'Category Successfully Created');

        Category::create($data);
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('backend.pages.category.edit', compact('category'));
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
            $category = Category::where('id', $id)->first();
            if($category->category_name!=$request->category_name){
                $request->validate(["category_name" => "required|unique:categories,category_name"]);
            }

            $data = $request->except(['_token']);

            session()->flash('success', 'Category Successfully Updated');
            
            Category::where('id', $id)->update($data);
        }
        
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {
        Category::where('id', $id)->update(['trash'=>1]);
        session()->flash('success', 'Category Successfully Deleted');
        return redirect()->route('category.index');
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

        
        $totalRecords = Category::where('trash', 0)->count();
        $categories     = new Category();

        if($request->category_name && $request->category_name!=''){
            $categories = $categories->where('category_name', 'LIKE' ,'%'.$request->category_name.'%');
        }

        $categories = $categories->where('trash', 0)->skip($start)->take($rowperpage)->get();
       
        $data_arr = array();
        foreach($categories as $category){

            $data_arr[] = array(
                "id"           => $category->id,
                "category_name" => $category->category_name,
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
