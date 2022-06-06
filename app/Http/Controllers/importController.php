<?php

namespace App\Http\Controllers;

use App\Exports\SellerExport;
use App\Imports\SellerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class importController extends Controller
{
    //

    public function import(Request $request) {
        // dd($request->file);
        Excel::import(new SellerImport,$request->file('file'));
        return back();

    }

    public function export()
    {
        return Excel::download(new SellerExport, 'sellers.xlsx');
    }


}
