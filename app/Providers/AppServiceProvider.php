<?php
// app/Providers/AppServiceProvider.php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('pt_BR');

        RateLimiter::for('login', function (Request $request) {
            // Limita a 5 tentativas por minuto POR ENDEREÇO DE EMAIL (input 'email')
            // Adicionamos um by(request->ip()) como fallback contra bots,
            // mas o limite por e-mail é o mais importante para login.
            return [
                Limit::perMinute(5)
                ->by($request->input('email'))
                ->response(function (Request $request, array $headers) {
                    $response = redirect('/login')
                           ->withInput() // Mantém os dados do formulário preenchidos
                           ->with([
                               'invalid_login' => 'Muitas tentativas de login! Tente novamente em um minuto.'
                           ]);
                           
                           $response->setStatusCode(429);

                           return $response->withHeaders($headers);
                }),
                Limit::perMinute(60)->by($request->ip()),
            ];
        });

        RateLimiter::for('forgot_password', function (Request $request) {
            return Limit::perMinute(3)
                        ->by($request->ip())
                        ->response(function (Request $request, array $headers) {
                            
                            $response = redirect()->route('forgot_password')
                                       ->with(['server_message' => 'Muitas solicitações de redefinição de senha! Por favor, aguarde.']);
    
                            // Configura a resposta como 429 e adiciona os cabeçalhos
                            $response->setStatusCode(429);
                            return $response->withHeaders($headers);
                        });
        });

        view()->composer('*', function ($view) {
            $view->with('settings', Setting::first());
        });
    }

    
}
