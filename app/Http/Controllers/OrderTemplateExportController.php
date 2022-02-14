<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\OrderTemplateExport;

class OrderTemplateExportController extends Controller
{
    public function export(){   
        return Excel::download(new OrderTemplateExport, 'template.xlsx');
    }
}
