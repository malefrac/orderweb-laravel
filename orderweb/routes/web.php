<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CausalController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\TypeActivityController;
use App\Models\Observation;
use App\Models\TypeActivity;
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

Route::get('/', [AuthController::class, 'index']);

Route::middleware('auth')->get('/index', function () {
    return view('index');
})->name('index');

/*Route::get('/test2', function () {
    return view('test2');
})->name('test2');*/

Route::prefix('auth')->group(function(){
    Route::get('/index', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'create'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
});

Route::middleware(['auth', 'can:administrador'])->prefix('causal')->group(function(){
    Route::get('/index', [CausalController::class, 'index'])->name('causal.index');
    Route::get('/create', [CausalController::class, 'create'])->name('causal.create');
    Route::get('/edit/{id}', [CausalController::class, 'edit'])->name('causal.edit');
    Route::post('/create', [CausalController::class, 'store'])->name('causal.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{id}', [CausalController::class, 'update'])->name('causal.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{id}', [CausalController::class, 'destroy'])->name('causal.destroy'); //se usa get en la ruta destroy para eliminar registros

});

Route::middleware(['auth', 'can:administrador'])->prefix('observation')->group(function(){
    Route::get('/index', [ObservationController::class, 'index'])->name('observation.index');
    Route::get('/create', [ObservationController::class, 'create'])->name('observation.create');
    Route::get('/edit/{id}', [ObservationController::class, 'edit'])->name('observation.edit');
    Route::post('/create', [ObservationController::class, 'store'])->name('observation.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{id}', [ObservationController::class, 'update'])->name('observation.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{id}', [ObservationController::class, 'destroy'])->name('observation.destroy'); //se usa get en la ruta destroy para eliminar registros
});

Route::middleware(['auth', 'can:administrador'])->prefix('type_activity')->group(function(){
    Route::get('/index', [TypeActivityController::class, 'index'])->name('type_activity.index');
    Route::get('/create', [TypeActivityController::class, 'create'])->name('type_activity.create');
    Route::get('/edit/{id}', [TypeActivityController::class, 'edit'])->name('type_activity.edit');
    Route::post('/create', [TypeActivityController::class, 'store'])->name('type_activity.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{id}', [TypeActivityController::class, 'update'])->name('type_activity.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{id}', [TypeActivityController::class, 'destroy'])->name('type_activity.destroy'); //se usa get en la ruta destroy para eliminar registros
});

Route::middleware(['auth', 'can:admin-supervisor'])->prefix('activity')->group(function(){
    Route::get('/index', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/create', [ActivityController::class, 'create'])->name('activity.create');
    Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('/create', [ActivityController::class, 'store'])->name('activity.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{id}', [ActivityController::class, 'update'])->name('activity.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy'); //se usa get en la ruta destroy para eliminar registros
});

Route::middleware(['auth', 'can:supervisor'])->prefix('technician')->group(function(){
    Route::get('/index', [TechnicianController::class, 'index'])->name('technician.index');
    Route::get('/create', [TechnicianController::class, 'create'])->name('technician.create');
    Route::get('/edit/{document}', [TechnicianController::class, 'edit'])->name('technician.edit');
    Route::post('/create', [TechnicianController::class, 'store'])->name('technician.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{document}', [TechnicianController::class, 'update'])->name('technician.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{document}', [TechnicianController::class, 'destroy'])->name('technician.destroy'); //se usa get en la ruta destroy para eliminar registros
});

Route::middleware(['auth', 'can:admin-supervisor'])->prefix('order')->group(function(){
    Route::get('/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/create', [OrderController::class, 'create'])->name('order.create');
    Route::get('/edit/{document}', [OrderController::class, 'edit'])->name('order.edit');
    Route::post('/create', [OrderController::class, 'store'])->name('order.store'); //se usa post en la ruta store para almacenar registros nuevos
    Route::put('/edit/{document}', [OrderController::class, 'update'])->name('order.update'); //se usa put en la ruta update para actualizar registros
    Route::get('/destroy/{document}', [OrderController::class, 'destroy'])->name('order.destroy'); //se usa get en la ruta destroy para eliminar registros
    Route::get('/add_activity/{order_id}/{activity_id}', [OrderController::class, 'add_activity'])->name('order.add_activity'); //se usa get en la ruta destroy para eliminar registros
    Route::get('/remove/{order_id}/{activity_id}', [OrderController::class, 'remove_activity'])->name('order.remove_activity'); //se usa get en la ruta destroy para eliminar registros
});




