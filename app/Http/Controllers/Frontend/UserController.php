<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request, Auth;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Service;
use App\Models\File;

class UserController extends Controller
{
	function __construct(){
		$this->middleware('user');
	}
	/*
	 * ***********************
	 * HOME PAGE/DASHBOARD
	 * **********************
	*/
	public function index(){

        $services = Service::where('trash', 0)->get();
		return view('frontend.pages.dashboard', compact('services'));
	}

	/*
	 * **********************
	 * CUSTOMER MODULE
	 * *****************
	*/
    public function customer(Request $request){
        $where = [['user_id', Auth::user()->id]];

        if($request->isMethod('POST') && is_array($request->search)){
            foreach ($request->search as $key => $value) {
                if($value!='' && $key!='name'){
                    $where[] = [$key, $value];
                }

                else if($value!='' && $key=='name'){
                    $where[] = ['customer_name', 'LIKE', '%'.$value.'%'];
                }
            }
        }


    	$customers = Customer::where($where)->get();
    	return view('frontend.pages.customer.all', compact('customers'));
    }

    public function newCustomer(Request $request){

    	if($request->isMethod('POST')){
            $request->validate([
                'tax_id'=>'required|unique:customers,tax_id'
            ]);
    		$data = $request->except(['_token']);
            $data['customer_name'] = $request->first_name.' '.$request->last_name;
    		// SET USER ID
    		$data['user_id'] = Auth::user()->id;
    		// SET FLASH MESSAGE
    		session()->flash('success', 'Customer Successfully Created');
    		// CREATE NEW CUSTOMER
    		Customer::create($data);
    		// AND REDIRECT TO ALL
    		return redirect()->route('user.customer.all');
    	}
    	return view('frontend.pages.customer.add');
    }

    public function editCustomer(Request $request, $id){
    	$customer = Customer::where('id', $id)->first();

    	if($request->isMethod('POST')){
    		$data = $request->except(['_token']);
    		// EXECUTE UPDATE QUERY
    		Customer::where('id', $id)->update($data);
    		// SET FLASH MESSAGE
    		session()->flash('success', 'Customer Successfully Updated');
    		// AND REDIRECT TO
    		return redirect()->back();
    	}

    	return view('frontend.pages.customer.edit', compact('customer'));
    }


	/*
	 * **********************
	 * FILE MODULE
	 * *****************
	*/
    public function file(Request $request){
        // Conditional Varriable
        $where = ['trash'=>0];

        if($request->isMethod('POST') && is_array($request->search)){
            foreach ($request->search as $key => $value) {
                if($value!=''){
                    $where[$key] = $value;
                }
            }
        }

    	$categories    = Category::where('trash', 0)->get();
        $all_services  = Service::where('trash', 0)->get();
    	$all_files     = File::with(['customer', 'service'])->where($where)->where('user_id', Auth::user()->id)->get();
        
    	return view('frontend.pages.file.all', compact('categories', 'all_files', 'all_services'));
    }

    public function fileStore(Request $request){
    	if($request->isMethod('POST')){
            // DATA VALIDATION
            $request->validate(['service_id'=>'required']);

            // GET ALL REQUESTED DATA
    		$data = $request->except(['_token']);

    		// ASSIGN USER ID
    		$data['user_id'] = Auth::user()->id;

    		// SET FLASH DATA
    		session()->flash('success', 'New File Successfully Created');

    		// CREATE FILES
    		File::create($data);
    		return redirect()->back();
    	}
    }

    public function editFile(Request $request, $id){
        if($request->isMethod('POST')){
            $data = $request->except(['_token']);
            // UPDATE DATA
            File::where('id', $id)->update($data);
            // SET FLASH DATA
            session()->flash('success', 'Customer Successfully Updated');
            // AND REDIRECT TO
            return redirect()->back();
        };

        $file = File::where('id', $id)->with(['customer', 'service', 'comments', 'attachments'])->first();

    	return view('frontend.pages.file.edit', compact('file'));
    }

    public function veiwFile(Request $request, $id){

        $file = File::where('id', $id)->with(['customer', 'service', 'comments', 'attachments'])->first();

        return view('frontend.pages.file.view', compact('file'));
    }

    public function deleteFile(Request $request, $id){
        $file = File::where('id', $id)->update(['trash'=>1]);
        // SET FLASH DATA
        session()->flash('success', 'File Successfully Deleted');
        // AND REDIRECT TO
        return redirect()->route('user.file');
    }


    public function movements(Request $request){
        // Conditional Varriable
        $where = ['trash'=>0, 'user_id'=>Auth::user()->id];
        if($request->isMethod('POST') && is_array($request->search)){
            foreach ($request->search as $key => $value) {
                if($value!=''){
                    $where[$key] = $value;
                }
            }
        }



        $all_files     = File::with(['customer', 'service'])->where($where)->get();
        $all_services  = Service::where('trash', 0)->get();
        
    	return view('frontend.pages.movements', compact('all_files', 'all_services'));
    }
}
