<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Home Route
// Route::get('/', function () {
//     return view('welcome');
// });

// Show Add Product Form
Route::any('/addproduct', function () {
    return view('addproducts');
})->name('addproductsfild');

// Handle Product Submission (POST)
Route::any('/add-product', [ProductController::class, 'insertproduct'])->name('insertproduct');
Route::any('/', [ProductController::class, 'showproduct']);
Route::delete('/delete/{id}', [ProductController::class, 'deleteitem']);


Route::get('/viewiteme/{id}',[ProductController::class,'viewitem']);

Route::post('/update/{id}',[ProductController::class,'updateopen']);
Route::post('/updateproduct/{id}',[ProductController::class,'updateproduct'])->name('updateproduct');

// Route::get('/update/{id}',function(){
//     return  view('update');
// });
