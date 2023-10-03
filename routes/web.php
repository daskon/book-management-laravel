<?php

use App\Livewire\AdminDashboard;
use App\Livewire\AssignBook;
use App\Livewire\Book;
use App\Livewire\EditorDashboard;
use App\Livewire\ReaderDashboard;
use App\Livewire\ViewerDashboard;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/book', Book::class);
Route::get('/assigned-book', AssignBook::class);

Route::get('/book/edit', [Book::class, 'updateBook'])->name('book.edit');

Route::get('/reader', ReaderDashboard::class)->name('reader')->middleware('reader');

Route::group(['prefix' => 'staff', 'middleware' => 'auth:sanctum'],function(){
    Route::get('admin', AdminDashboard::class)->name('staff.admin')->middleware('admin.user');
    Route::get('viewer', ViewerDashboard::class)->name('staff.viewer')->middleware('viewer.user');
    Route::get('editor', EditorDashboard::class)->name('staff.editor')->middleware('editor.user');
});

require __DIR__.'/auth.php';
