<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HojeController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\TabController;
use App\Http\Controllers\PiramideController;

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

Route::get('/jogadores', function() {
    echo "1 - Neymar<br>";
    echo "2 - Pelé<br>";
    echo "3 - Zico<br>";
});

Route::get('/tab', function () {
    for($i = 1; $i<=10; $i++){
        echo $i." X 2 = ".($i*2)."</br>";
    }
});

Route::get('/tab/{valor}', function ($valor) {
    for($i = $valor; $i<=10; $i++){
        echo $i." X ".$i. " = ".($i*2)."</br>";
    }
});

Route::get('/tab/{valor}/{inicial}/{final}', function ($valor,$inicial, $final) {
    for($i = $inicial; $i<=$final; $i++){
        echo $i." X " .$valor." = ".($i*$valor)."</br>";
    }
})->where("valor","[0-9]+")->where("inicial","[0-9]+")->where("final","[0-9]+");

Route::redirect('/players', '/jogadores');

Route::get('/hoje', [HojeController::class, 'teste']);
Route::get('/teste', [TesteController::class, 'teste']);

Route::get('/ctab/{valor?}/{inicio?}/{fim?}', [TabController::class, 'tab']);

Route::get('/piramide/{h}/{ab}/{tt?}', [PiramideController::class, 'piramide']);
