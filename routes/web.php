<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\ProveedorController;
use App\Http\Controllers\Pos\ClienteController;


Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


 // Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

});

// Proveedores
Route::controller(ProveedorController::class)->group(function () {
    Route::get('/proveedor/all', 'ProveedorAll')->name('proveedor.all');
    Route::get('/proveedor/add', 'ProveedorAdd')->name('proveedor.add');
    Route::post('/proveedor/store', 'ProveedorStore')->name('proveedor.store');
    Route::get('/proveedor/edit/{id}', 'ProveedorEdit')->name('edit.proveedor');
    Route::post('/proveedor/update', 'ProveedorUpdate')->name('proveedor.update');
    Route::get('/proveedor/delete/{id}', 'ProveedorDelete')->name('delete.proveedor');
});

// Clientes
Route::controller(ClienteController::class)->group(function () {
    Route::get('/cliente/all', 'clienteAll')->name('cliente.all');
    Route::get('/cliente/add', 'clienteAdd')->name('cliente.add');
    Route::post('/cliente/store', 'clienteStore')->name('cliente.store');
    Route::get('/cliente/edit/{id}', 'clienteEdit')->name('edit.cliente');
    Route::post('/cliente/update', 'clienteUpdate')->name('cliente.update');
    Route::get('/cliente/delete/{id}', 'clienteDelete')->name('delete.cliente');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
