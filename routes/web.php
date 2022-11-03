<?php

use App\Http\Controllers\ComentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);
Route::get('/events/edit/{id}', [ComentController::class, 'index']);

//create
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [ComentController::class, 'store']);
Route::post('/events/{id}', [ComentController::class, 'store']);

//edit
Route::get('/events/edit/{id}', [EventController::class,'edit'])->middleware('auth');
Route::put('/events/edit/{id}', [EventController::class, 'update']);

//show
Route::get('/events/{id}', [EventController::class,'show']);

//dashboard
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

//delete
Route::delete('/events/{id}', [EventController::class, 'destroy']);

//presença
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

//saindo do evento
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');

