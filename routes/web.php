<?php

use App\Http\Controllers\FishingBoatController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PassengerBoatController;
use App\Models\FishingBoat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false,'password.reset' => false, 'reset' => false]);

// Route::group(['middleware' => 'auth'], function () {
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//fishing boat routes

Route::get('admin/gallery',[GalleryController::class, 'index'])->name('gallery');
Route::post('admin/gallery',[GalleryController::class, 'store']);
Route::get('fetch-gallery', [GalleryController::class, 'fetchboat']);
Route::get('edit-gallery/{id}', [GalleryController::class, 'edit']);
Route::post('update-gallery/{id}', [GalleryController::class, 'update']);
Route::delete('delete-gallery/{id}', [GalleryController::class, 'destory']);



//fishing boat routes

Route::get('admin/fishingboats',[FishingBoatController::class, 'index'])->name('fishingboats');
Route::post('admin/fishingboats',[FishingBoatController::class, 'store']);
Route::get('fetch-fishingboats', [FishingBoatController::class, 'fetchboat']);
Route::get('edit-fishingboats/{id}', [FishingBoatController::class, 'edit']);
Route::post('update-fishingboats/{id}', [FishingBoatController::class, 'update']);
Route::delete('delete-fishingboats/{id}', [FishingBoatController::class, 'destory']);


// passenger boat routes

Route::get('admin/passengerboats',[PassengerBoatController::class, 'index'])->name('passengerboats');
Route::post('admin/passengerboats',[PassengerBoatController::class, 'store']);
Route::get('fetch-passengerboats', [PassengerBoatController::class, 'fetchboat']);
Route::get('edit-passengerboats/{id}', [PassengerBoatController::class, 'edit']);
Route::post('update-passengerboats/{id}', [PassengerBoatController::class, 'update']);
Route::delete('delete-passengerboats/{id}', [PassengerBoatController::class, 'destory']);





// });


