<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\OrderBulkExport;

class OrderBulkExportController extends Controller
{
    public function export(){
        return Excel::download(new OrderBulkExport, 'orders.xlsx');
    }
}
