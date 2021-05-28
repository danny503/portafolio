<?php

use App\Http\Livewire\Admin\ShowProjects;
use App\Http\Livewire\ContactForm;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $projects = Project::all();
    return view('public.home', compact('projects'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowProjects::class)->name('dashboard');

//Route::get('contactanos', ContactForm::class);
