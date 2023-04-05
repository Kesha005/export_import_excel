<?php

use App\Http\Controllers\ExelImportController;
use Illuminate\Support\Facades\Route;


Route::get('/',[ExelImportController::class,'index'])->name('index');

Route::post('/post',[ExelImportController::class,'import_exel'])->name('import_exel');

