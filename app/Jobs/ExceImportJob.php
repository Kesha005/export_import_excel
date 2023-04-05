<?php

namespace App\Jobs;

use App\Imports\TestImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExceImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    public function __construct($file)
    {
        $this->file=$file;
    }

   
    public function handle()
    {
        $file_excel=File::get(storage_path('app/public.'.$this->file));
        Excel::import(new TestImport,$file_excel);
    }
}
