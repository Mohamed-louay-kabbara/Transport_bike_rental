<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\workerController;
use App\Http\Controllers\OutlayController;
use App\Http\Controllers\PorterController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\StraplesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {

    return view('auth.login');
});
Route::get('/dashboard', function () {
    return redirect()->route('worker.index');
})->middleware(['auth'])->name('dashboard');
Route::resource('Buy',BuyController::class)->middleware(['auth']);
Route::resource('Outlay',OutlayController::class)->middleware(['auth']);
Route::resource('Porter',PorterController::class)->middleware(['auth']);
Route::resource('Sale',SaleController::class)->middleware(['auth']);
Route::resource('Straples',StraplesController::class)->middleware(['auth']);
Route::resource('worker',WorkerController::class)->middleware(['auth']);
Auth::routes();
Route::get('/owner_straples', [HomeController::class, 'index'])->name('owner_straples');
Route::get('/workers', [WorkerController::class, 'workers'])->name('workers');
Route::delete('/users.destroy/{id}', [HomeController::class, 'destroy'])->name('users.destroy');
Route::put('/users.update/{id}', [HomeController::class, 'update'])->name('users.update');
Route::post('/users.store', [HomeController::class, 'store'])->name('users.store');
Route::post('/Outlay.store', [OutlayController::class, 'store'])->name('Outlay.store');

require __DIR__.'/auth.php';
