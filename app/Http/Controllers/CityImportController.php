<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CityImport;
use Excel;

class CityImportController extends Controller
{
    public function index(){
        return view('city-import');
    }
    public function import(Request $request){
        Excel::import(new CityImport,$request->file('file'));
    }
}
