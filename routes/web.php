<?php

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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('vocabulary.index');
});

Route::get('vocabulary/json', 'VocabularyController@indexJson')
    ->middleware('auth')
    ->name('vocabulary.json');

Route::get('vocabulary/xml', 'VocabularyController@getXml')->name('vocabulary.xml');

Auth::routes();

Route::resource('/vocabulary','VocabularyController')->middleware('auth');

Route::match(['post','get'],'/vocabulary/hasher','VocabularyController@hasher')
    ->name('vocabulary.hasher');



