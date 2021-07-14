<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Comment;
use App\Models\Attachment, DB;

class ParticularController extends Controller
{
    function service(Request $request){
    	$services = [];

    	if($request->cat_id){
    		$services = Service::where('cat_id', $request->cat_id)->get();
    	}

    	return response()->json($services);
    }

    function customer (Request $request){
    	$customer = [];

    	if($request->tax_id){
    		$customer = Customer::where('tax_id', $request->tax_id)->first();
    	}
    	return response()->json($customer);
    }

    function newComment (Request $request){
        if($request->tax_id && $request->tax_id){
            $id = Comment::create(
                [
                    'file_id'       => $request->file_id, 
                    'tax_id'        => $request->tax_id, 
                    'comments'      => $request->comments,
                    'is_authority'  => $request->is_authority ?? 0,
                ])->id;
            return response()->json(DB::table('comments')->where('id', $id)->first());
        } 
    }

    function deleteComment ($id){
        if($id){
            Comment::where('id', $id)->delete();
            return response()->json(1);
        }
    }

    function newFile (Request $request){
        $extension = $request->file->getClientOriginalExtension();
        $name      = time().'.'.$extension;
        $path      = "public/attachments/";

        $data = [
            'path'         => $path.$name,
            'file_name'    => $request->file->getClientOriginalName(),
            'file_id'      => $request->file_id,
            'tax_id'       => $request->tax_id,
            'is_authority' => $request->is_authority ?? 0,
        ];

        $request->file->move($path, $name);

        $id = Attachment::create($data)->id;

        return response()->json(DB::table('attachments')->where('id', $id)->first());        
    }

    function deleteFile ($id){
        $attachment = Attachment::where('id', $id)->first();
        if($attachment && file_exists($attachment->path)){
            unlink($attachment->path);
        }
        Attachment::where('id', $id)->delete();
        return response()->json(1);        
    }
}
