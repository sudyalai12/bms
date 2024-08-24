<?php

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Models\Quote;
use App\Models\QuoteItem;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit']);
Route::patch('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
Route::get('/customers/{customer}', [CustomerController::class, 'show']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
Route::patch('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);
Route::get('/products/{product}', [ProductController::class, 'show']);

Route::get('/quotes', [QuoteController::class, 'index']);
Route::get('/quotes/create', [QuoteController::class, 'create']);
Route::post('/quotes', [QuoteController::class, 'store']);
Route::post('/quotes/{quote}', [QuoteController::class, 'storeItem']);
Route::delete('/quotes/{quote}/items/{quoteItem}', [QuoteController::class, 'destroyItem']);
Route::get('/quotes/{quote}/pdf', [PdfController::class, 'quotePdf']);
Route::get('/quotes/{quote}/pdf1', function ($quote) {
    return view('pdf.quote', ['quote' => $quote]);
});
// Route::delete('/quotes/{quote}/items/{quoteItem}', function (Quote $quote, QuoteItem $quoteItem) {
//     $quoteItem->delete();
//     return redirect("/quotes/{$quote->id}");
// });
Route::get('/quotes/{quote}', [QuoteController::class, 'show']);

Route::get('/search', [AutocompleteController::class, 'fetch']);
