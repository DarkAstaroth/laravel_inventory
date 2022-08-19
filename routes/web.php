<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\ProveedorController;
use App\Http\Controllers\Pos\ClienteController;
use App\Http\Controllers\Pos\UnidadController;
use App\Http\Controllers\Pos\CategoriaController;


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

// unidades
Route::controller(UnidadController::class)->group(function () {
    Route::get('/unidad/all', 'unidadAll')->name('unidad.all');
    Route::get('/unidad/add', 'unidadAdd')->name('unidad.add');
    Route::post('/unidad/store', 'unidadStore')->name('unidad.store');
    Route::get('/unidad/edit/{id}', 'unidadEdit')->name('edit.unidad');
    Route::post('/unidad/update', 'unidadUpdate')->name('unidad.update');
    Route::get('/unidad/delete/{id}', 'unidadDelete')->name('delete.unidad');
});

// categorias
Route::controller(CategoriaController::class)->group(function () {
    Route::get('/categoria/all', 'categoriaAll')->name('categoria.all');
    Route::get('/categoria/add', 'categoriaAdd')->name('categoria.add');
    Route::post('/categoria/store', 'categoriaStore')->name('categoria.store');
    Route::get('/categoria/edit/{id}', 'categoriaEdit')->name('edit.categoria');
    Route::post('/categoria/update', 'categoriaUpdate')->name('categoria.update');
    Route::get('/categoria/delete/{id}', 'categoriaDelete')->name('delete.categoria');
});



Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
