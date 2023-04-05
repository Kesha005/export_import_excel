<?php

namespace App\Http\Controllers;

use App\Imports\ExelImport;
use App\Imports\TestImport;
use App\Jobs\ExceImportJob;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function index()
    {
        return view('import');
    }


    public function import_exel(Request $request)
    {   
        $file=$request->file->store('public');
        dispatch(new ExceImportJob($file));
        return redirect()->route('index');
    }
}
