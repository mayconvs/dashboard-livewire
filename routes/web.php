<?php
use App\Http\Controllers\SubscriptionController;
use App\Http\Middleware\noSubscription;
use App\Http\Middleware\hasSubscription;
use App\Livewire\Configuracoes;
use App\Livewire\Perfil;
use App\Livewire\Users;
use App\View\Components\PricingCards;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\Contatos;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;

Route::get('/hora', function () {
    return [
        'now' => now()->toDateTimeString(),
        'carbon' => now()->translatedFormat('d/m/Y H:i:s'),
        'timezone' => config('app.timezone'),
        'locale' => app()->getLocale(),
    ];
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('throttle:login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store_user'])->name('store_user');
    Route::get('/new_user_confirmation/{token}', [AuthController::class, 'new_user_confirmation'])->name('new_user_confirmation');
    Route::get('/forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
    Route::post('/send_reset_password_link', [AuthController::class, 'send_reset_password_link'])->name('send_reset_password_link')->middleware('throttle:forgot_password');

    Route::get('/reset_password/{token}', [AuthController::class, 'reset_password'])->name('reset_password');
    Route::post('/reset_password', [AuthController::class, 'reset_password_update'])->name('reset_password_update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware([noSubscription::class])->group(function () {
        Route::get('/plans', [PricingCards::class, 'plans'])->name('plans');
        Route::get('/plan_selected/{id}', [PricingCards::class, 'plan_selected'])->name('plan.selected');
    });
    
    /* Route::middleware([hasSubscription::class])->group(function () { */
        Route::get('/subscription/success', [PricingCards::class, 'subscription_success'])->name('subscription.success');
        Route::get('/', Dashboard::class)->name('/');
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('/perfil', Perfil::class)->name('perfil');
        Route::get('/configuracoes', Configuracoes::class)->name('configuracoes');
        Route::get('/contatos', Contatos::class)->name('contatos');
        Route::get('/users', Users::class)->name('users');
        Route::get('/invoice/{id}', [SubscriptionController::class, 'invoice_download'])->name('invoice.download');
    /* }); */

    //Route::get('/dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');


});



