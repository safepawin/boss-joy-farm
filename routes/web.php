<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\SubFarmController;
use App\Http\Controllers\SubFarmDetailController;
use App\Models\SubFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('farms', FarmController::class);
Route::resource('sub-farms', SubFarmController::class);
Route::resource('sub-farm-details', SubFarmDetailController::class);

Route::get('print-qr', function (Request $request) {
    $subFarm = SubFarm::find($request->sub_farm_id);
    $url = route('sub-farm-details.create', ['sub_farm_id' => $request->sub_farm_id]);
    return view('print-qr', [
        'url' => $url,
        'name' => $subFarm->name
    ]);
})->name('print-qr');

Route::get('print-qr-all', function (Request $request) {
    $subFarms = SubFarm::where('farm_id', session()->get('farm_id'))->get();
    $urls = [];
    foreach ($subFarms as $value) {
        $url = route('sub-farm-details.create', ['sub_farm_id' => $value->id]);
        array_push($urls, [
            'url' => $url,
            'name' => $value->name
        ]);
    }
    return view('print-qr-all', [
        'urls' => $urls
    ]);
})->name('print-qr-all');
