<?php

use App\Http\Controllers\Web\PayuController;
use App\Livewire\Web\AboutUs;
use App\Livewire\Web\Blogs\Detail;
use App\Livewire\Web\Blogs\Index;
use App\Livewire\Web\Booking;
use App\Livewire\Web\ContactUs;
use App\Livewire\Web\Gallery;
use App\Livewire\Web\Homepage;
use App\Livewire\Web\Login;
use App\Livewire\Web\PrivacyPolicy;
use App\Livewire\Web\Resorts\Detail as ResortsDetail;
use App\Livewire\Web\Resorts\Index as ResortsIndex;
use App\Livewire\Web\ReturnRefund;
use App\Livewire\Web\Services;
use App\Livewire\Web\TermsCondition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/')->group(base_path('routes/admin.php'));

Route::get('/', Homepage::class)->name('web.home');
Route::get('/about-us', AboutUs::class)->name('web.about-us');
Route::get('/services', Services::class)->name('web.services');
Route::get('/terms-condition', TermsCondition::class)->name('web.terms-condition');
Route::get('/return-refund', ReturnRefund::class)->name('web.return-refund');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('web.privacy-policy');
Route::get('/blogs', Index::class)->name('web.blogs');
Route::get('/blog/{slug}', Detail::class)->name('web.blog.detail');
Route::get('/gallery', Gallery::class)->name('web.gallery');
Route::get('/contact-us', ContactUs::class)->name('web.contact');
Route::get('/booking', Booking::class)->name('web.booking');
Route::get('/login', Login::class)->name('web.login');
Route::controller(PayuController::class)->group(function () {
    Route::get('/packages', 'packages')->name('web.packages');
    Route::post('/packages-payment', 'proceedToPayu')->name('web.packages.payment.process');
    Route::post('/payment-success', 'paymentSuccess')->name('web.packages.payment.success');
    Route::post('/payment-failed', 'paymentFailed')->name('web.packages.payment.failed');
});
// authenticate
Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/resorts', ResortsIndex::class)->name('web.resorts');
    Route::get('/resorts/{slug}', ResortsDetail::class)->name('web.resorts.detail');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('web.home');
    })->name('web.logout');
});

// php artisan make:livewire Web/PaymentSuccess
// php artisan make:livewire Web/PaymentFailed