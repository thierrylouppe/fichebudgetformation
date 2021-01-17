<?php

use App\Models\Action;
use App\Models\Direction;
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

Route::get('/formation', function () {
    return Direction::with( 'actions', 'actions.etapes', 'actions.etapes.user', 'actions.etapes.livrables')->get();
});
