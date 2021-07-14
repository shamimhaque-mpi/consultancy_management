<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\File;
use App\Models\Service;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_customar = Customer::where('trash', 0)->count();
        $total_file     = File::where('trash', 0)->count();
        $total_service  = Service::where('trash', 0)->count();
        $total_category = Category::where('trash', 0)->count();
        $total_user     = User::count();
        $total_admin     = Admin::where('trash', 0)->count();

        return view('backend.pages.index', compact('total_customar', 'total_file', 'total_service', 'total_category', 'total_user', 'total_admin'));
    }
}
