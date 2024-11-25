<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[EventController::class,'home']);

Route::get('/event',[EventController::class,'show']);

Route::get('/event/create',[EventController::class,'create'])->middleware('auth');

Route::get('/event/{id}',[EventController::class,'index'])->name('event');

Route::delete('/event/{id}',[EventController::class,'destroy'])->middleware(('auth'));

Route::post('/event',[EventController::class,'store']);

Route::get('/dashboard',[EventController::class,'board'])->middleware('auth');

Route::get('/event/edit/{id}',[EventController::class,'edit'])->middleware('auth');

Route::put('/event/update/{id}',[EventController::class, 'update'])->middleware('auth');

Route::post('/event/buy/{id}',[EventController::class,'buyEvent'])->name('event.reservar')->middleware('auth');

Route::delete('/event/leave/{id}',[EventController::class,'leaveEvent'])->middleware('auth');
