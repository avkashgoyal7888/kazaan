<?php

use App\Livewire\Admin\Blog\Add as NewBlog;
use App\Livewire\Admin\Blog\Edit as EditBlog;
use App\Livewire\Admin\Blog\Index as Blog;
use App\Livewire\Admin\Gallery\Index as Gallery;
use App\Livewire\Admin\Booking;
use App\Livewire\Admin\ContactUs;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\PayuTransactions;
use App\Livewire\Admin\Resorts\Index as Resorts;
use App\Livewire\Admin\Resorts\Add as NewResort;
use App\Livewire\Admin\Resorts\Edit as EditResort;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', Login::class)->name('admin.login');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/booking', Booking::class)->name('admin.booking');
    Route::get('/blogs', Blog::class)->name('admin.blogs');
    Route::get('/new-blog', NewBlog::class)->name('admin.new.blog');
    Route::get('/update-blog/{slug}', EditBlog::class)->name('admin.edit.blog');
    Route::get('/gallery', Gallery::class)->name('admin.gallery');
    Route::get('/contact-us', ContactUs::class)->name('admin.contact');
    Route::get('/payments', PayuTransactions::class)->name('admin.payments');
    Route::get('/resorts', Resorts::class)->name('admin.resorts');
    Route::get('/new-resort', NewResort::class)->name('admin.new.resorts');
    Route::get('/update-resort/{slug}', EditResort::class)->name('admin.edit.resort');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('admin.login');
    })->name('admin.logout');
});
