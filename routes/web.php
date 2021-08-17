<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\MainPagesController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ServicePagesController;
use App\Http\Controllers\PortfolioPagesController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

Route::get('/', [PagesController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    
    Route::get('/', [PagesController::class, 'admin_layout'])->name('admin');

    Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');
    Route::put('/main', [MainPagesController::class, 'update'])->name('admin.main.update');


    Route::get('/services/create', [ServicePagesController::class, 'create'])->name('admin.services.create');
    Route::put('/services/create', [ServicePagesController::class, 'update'])->name('admin.services.store');
    Route::get('/services/list', [ServicePagesController::class, 'list'])->name('admin.services.list');
    Route::get('/services/edit/{id}', [ServicePagesController::class, 'edit'])->name('admin.services.edit');
    Route::delete('/services/destroy/{id}', [ServicePagesController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/portfolios/create', [PortfolioPagesController::class,'create'])->name('admin.portfolio.create');
    Route::put('/portfolios/store', [PortfolioPagesController::class, 'store'])->name('admin.portfolio.store');
    Route::get('/portfolios/list', [PortfolioPagesController::class, 'list'])->name('admin.portfolio.list');


    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('admin.dashboard');

    // Route::get('/main', [MainPagesController::class, 'index'])->name('admin.main');

    // Route::PUT('/main', [MainPagesController::class, 'update'])->name('admin.main.update');

    //Route::get('/services', [ServicesController::class, 'list'])->name('admin.services');

    Route::get('/portfolio', [PagesController::class, 'portfolio'])->name('admin.portfolio');

    Route::get('/about', [PagesController::class, 'about'])->name('admin.about');
});





Route::POST('/contact', [ContactPageController::class, 'store'])->name('contact');