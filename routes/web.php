<?php

use App\Jobs\FirstJob;
use App\Jobs\SecondJob;
use Illuminate\Support\Facades\Bus;
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

Route::name('welcome')->get('/', function () {
    return view('welcome');
});

Route::name('dispatch.job')->get('job', function () {
    Bus::dispatch(new FirstJob());

    return redirect()->route('welcome');
});

Route::name('dispatch.nested_job')->get('nested-job', function () {
    Bus::dispatch(new SecondJob());

    return redirect()->route('welcome');
});
