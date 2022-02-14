<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\ProductImport;
use Excel;

class ProductImportController extends Controller
{
    public function index(){
        return view('product-import');
    }
    public function import(Request $request){
        Excel::import(new ProductImport,$request->file('file'));
    }
}
