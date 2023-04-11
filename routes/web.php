<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodolistController;


Route::get("/", [TodolistController::class, "home"]);

Route::post("/saveItemRoute", [TodolistController::class, "saveItem"])->name("saveItem");

Route::post("/markComplete/{id}", [TodolistController::class, "markComplete"])->name("markComplete");

Route::post("/deleteItem/{id}", [TodolistController::class, "deleteItem"])->name("deleteItem");