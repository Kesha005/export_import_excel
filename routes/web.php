<?php

use App\Http\Controllers\ExcelImportController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ExcelImportController::class,'index'])->name('index');

Route::post('/post',[ExcelImportController::class,'import_exel'])->name('import_exel');

