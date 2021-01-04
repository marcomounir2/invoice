<?php
use Illuminate\Support\Facades\Route;
Route::get('/', 'productController@addproduct');
Route::post('/saveproduct', 'productController@saveproduct');
Route::get('/product', 'productController@product');
Route::get('/stock', 'productController@stock');
Route::get('/addbill', 'productController@addbill');
Route::post('/savebill', 'productController@savebill');
Route::get('/bill', 'productController@bill');

