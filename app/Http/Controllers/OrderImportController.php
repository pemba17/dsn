<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Imports\OrderImport;
use Excel;

class OrderImportController extends Controller
{
    public function index(){
        return view('order-import');
    }
    public function import(Request $request){
        Excel::import(new OrderImport,$request->file('file'));
    }
}
