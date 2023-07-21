<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect("/", "/posts");

Route::get("/posts", [App\Http\Controllers\PostController::class, "index"])->name("post.index");
Route::prefix('/post')->group(function () {
    Route::get("/create", [App\Http\Controllers\PostController::class, "create"])->name("post.create");
    Route::get("/trash", [App\Http\Controllers\PostController::class, "trash"])->name("post.trash");
    Route::post("/store", [App\Http\Controllers\PostController::class, "store"])->name("post.store");
    Route::get("/{post:slug}", [App\Http\Controllers\PostController::class, "show"])->name("post.show");
    Route::get("/{post}/edit", [App\Http\Controllers\PostController::class, "edit"])->name("post.edit");
    Route::put("/{post}/update", [App\Http\Controllers\PostController::class, "update"])->name("post.update");
    Route::delete("/{post}/delete", [App\Http\Controllers\PostController::class, "destroy"])->name("post.delete");
    Route::delete("/{post}/force_delete", [App\Http\Controllers\PostController::class, "forceDelete"])->name("post.force_delete");
    Route::post("/{post}/restore", [App\Http\Controllers\PostController::class, "restore"])->name("post.restore");
});
