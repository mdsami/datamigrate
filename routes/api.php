<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DBController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */



//Data Migration
Route::get('/dbid', [DBController::class, 'index']);

Route::get('/import-dbid', [DBController::class, 'dbid_import_data']);

Route::get('/ubid', [DBController::class, 'ubid']);
// only read data from companyinfo table
Route::get('read-company-info',[DBController::class,'readCompanyInfo']);
Route::get('migration',[DBController::class,'ubidReadData']);