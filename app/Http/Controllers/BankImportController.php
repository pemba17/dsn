<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\BankImport;

class BankImportController extends Controller
{
    public function index(){
        return view('bank-import');
    }
    public function import(Request $request){
        Excel::import(new BankImport,$request->file('file'));
    }
}
