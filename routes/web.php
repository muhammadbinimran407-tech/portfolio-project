<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\ProfileController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::get('/about', [ContactController::class, 'about'])->name('about');
Route::get('/skills', [ContactController::class, 'skills'])->name('skills');
Route::get('/services', [ContactController::class, 'services'])->name('services');
Route::get('/projects', [ContactController::class, 'projects'])->name('projects');
Route::get('/blog', [ContactController::class, 'blog'])->name('blog');
Route::get('/resume', [ContactController::class, 'resume'])->name('resume');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.subscribe');

Route::post('/payment/stripe', [PaymentController::class, 'stripe'])->name('payment.stripe');
Route::post('/payment/stripe/intent', [PaymentController::class, 'stripeIntent'])->name('payment.stripe.intent');
Route::post('/payment/paypal', [PaymentController::class, 'paypal'])->name('payment.paypal');
Route::post('/payment/jazzcash', [PaymentController::class, 'jazzcash'])->name('payment.jazzcash');
Route::post('/payment/jazzcash/return', [PaymentController::class, 'jazzcashReturn'])->name('payment.jazzcash.return');

// Breeze dashboard (plain logged-in users land here)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze profile pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin panel routes (Breeze auth, admins only).
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/{view?}', function ($view = null) {
        return view('admin.index', ['adminView' => $view]);
    })->where('view', '[a-z-]*')->name('admin.index');
});

// Admin API (model/file-backed CRUD, protected by admin session)
Route::prefix('admin/api')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
	Route::get('{entity}', [AdminApiController::class, 'index']);
	Route::post('{entity}', [AdminApiController::class, 'store']);
	Route::put('{entity}/{id}', [AdminApiController::class, 'update']);
	Route::patch('{entity}/{id}', [AdminApiController::class, 'update']);
	Route::delete('{entity}/{id}', [AdminApiController::class, 'destroy']);
});