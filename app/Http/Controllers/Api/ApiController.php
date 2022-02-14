<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;

class ApiController extends Controller
{
    public function getHotDeals(){
        $product=Product::orderBy('id','desc')->limit(10)->get();
        return response()->json($product);
    }

    public function getParentCategories(){
        $category=Category::whereNull('parent_id')->orderBy('id','desc')->limit(6)->get();
        return response()->json($category);
    }

    public function saveContactDetails(Request $request){
        $contact=Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'contact'=>$request->contact
        ]);
        if($contact) return response()->json(['msg'=>'Contact Form Submitted Successfully']);
        else return response()->json(['msg'=>'Something went wrong. Please Try Again']);
    }
}
