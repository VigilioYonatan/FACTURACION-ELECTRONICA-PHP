<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\DespatchController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\NoteController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UploadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/auth/register", [RegisterController::class, "store"]);
Route::post("/auth/login", [AuthController::class, "login"]);
Route::post("/auth/logout", [AuthController::class, "logout"]);
Route::post("/auth/refresh", [AuthController::class, "refresh"]);
Route::get("/auth/me", [AuthController::class, "me"]);

// companies
Route::apiResource("/companies", CompanyController::class)->middleware("auth:api");

// anular
Route::post("/cancel/send", [InvoiceController::class, "send"]);
// invoices
Route::post("/invoices/send", [InvoiceController::class, "send"]);
Route::post("/invoices/xml", [InvoiceController::class, "xml"]);
Route::post("/invoices/pdf", [InvoiceController::class, "pdf"]);

// notes
Route::post("/notes/send", [NoteController::class, "send"]);
Route::post("/notes/xml", [NoteController::class, "xml"]);
Route::post("/notes/pdf", [NoteController::class, "pdf"]);

//  Despatches
Route::post("/despatches/send", [DespatchController::class, "send"]);
Route::post("/despatches/xml", [DespatchController::class, "xml"]);
Route::post("/despatches/pdf", [DespatchController::class, "pdf"]);
// uploads
Route::post("/uploads/{model}/{property}", [UploadController::class, "store"]);