<?php

namespace App\Http\Controllers;

use App\Imports\ExelImport;
use App\Imports\TestImport;
use App\Jobs\ExceImportJob;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExelImportController extends Controller
{
    public function index()
    {
        return view('import');
    }


    public function import_exel(Request $request)
    {   
        dispatch(new ExceImportJob($request->file('file')));
        return redirect()->route('index');
    }
}
