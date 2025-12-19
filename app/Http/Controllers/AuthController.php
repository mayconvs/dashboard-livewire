<?php

namespace App\Http\Controllers;

use App\Mail\NewUserConfirmation;
use App\Mail\ResetPassword;
use App\Models\Cargo;
use App\Models\User;
use App\Services\UserPasswordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        // form validation 
        $credentials = $request->validate(
            // rules
            [
                'email' => 'required|email|min:2|max:100',
                'password' => 'required|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/'
            ],
            // messages
            [
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.min' => 'O e-mail deve ter no mínimo :min caracteres.',
                'email.max' => 'O e-mail deve ter no máximo :max caracteres.',
                'password.required' => 'O senha é obrigatória.',
                'password.min' => 'O senha deve ter no mínimo :min caracteres.',
                'password.max' => 'O senha deve ter no máximo :max caracteres.',
                'password.regex' => 'O senha deve ter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caracter especial (!@#$%^&*()).',
            ]
        );

        $remember = $request->filled('remember');

        /* if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } */

        // verify user exists
        $user = User::where('email', $credentials['email'])
            ->where('active', true)
            ->where(function ($query) {
                $query->whereNull('blocked_until')->orWhere('blocked_until', '<=', now());
            })
            ->when(env('ADMIN_PERMISSION_TO_REGISTER') == 1, function ($query) {
                $query->whereNotNull('admin_verified_at');
            })
            ->whereNotNull('email_verified_at')
            ->whereNull('deleted_at')
            ->first();

        if (!$user) {
            return back()->withInput()->with([
                'invalid_login' => 'Login inválido. E-mail não encontrado'
            ]);
        }

        // verify if password is valid
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withInput()->with([
                'invalid_login' => 'Login inválido. Senha diferente'
            ]);
        }
        // update last_login_at
        $user->last_login_at = now();
        $user->blocked_until = null;
        $user->save();

        // login
        $request->session()->regenerate();
        // Se o remember for true, ou seja, o usuário marcou o Lembrar-me na hora do login, ele permanecerá logado por mais tempo na aplicação - pelo tempo configurado na opção lifetime do arquivo config/session.php ou a expiração padrão do token de remember_token do Laravel).
        Auth::login($user, $remember);

        // redirect
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function register(Request $request): View
    {

        $cargos = Cargo::where('id', '!=', 1)->orderBy('name')->get();

        return view('auth.register', compact('cargos'));
    }

    public function store_user(Request $request): View|RedirectResponse
    {

        // form validation
        $request->validate(
            //rules
            [
                'name' => 'required',
                'last_name' => 'required',
                'email' => 'required|min:2|max:100|email:rfc,dns|unique:users,email',
                'password' => 'required|string|min:8|max:32|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',
                'password_confirmation' => 'required|same:password',
                'phone' => 'required|regex:/^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/',
                'cargo_id' => 'required|integer|min:1|exists:cargos,id',
            ],
            // messages
            [
                'name.required' => 'O nome é obrigatório.',
                'last_name.required' => 'O sobrenome é obrigatório.',

                'email.required' => 'O e-mail é obrigatório.',
                'email.min' => 'O e-mail deve ter no mínimo :min caracteres.',
                'email.max' => 'O e-mail deve ter no máximo :max caracteres.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.unique' => 'O e-mail deve ser válido.',

                'password.required' => 'O senha é obrigatória.',
                'password.confirmed' => 'O valor da senha deve ser igual à confirmação de senha.',
                'password.min' => 'O senha deve ter no mínimo :min caracteres.',
                'password.max' => 'O senha deve ter no máximo :max caracteres.',
                'password.regex' => 'O senha deve ter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caracter especial (!@#$%^&*()).',
                'password_confirmation.required' => 'O campo de confirmação de senha é obrigatório.',
                'password_confirmation.same' => 'O valor da confirmação de senha deve ser igual à senha.',

                'phone.required' => 'O telefone é obrigatório.',
                'phone.regex' => 'O telefone deve estar em algum desses formatos: "(48) 99999-9999", "48 99999-9999" ou "48999999999"',

                'cargo_id.required' => 'O cargo é obrigatório.',
                'cargo_id.min' => 'O valor deve ser maior do que zero',
                'cargo_id.integer' => 'O cargo deve ser um número.',
                'cargo_id.exists' => 'O cargo deve existir em nosso banco de dados.',
            ]
        );

        // define new user
        $user = new User();
        $user->name = $request->name;
        $user->role_id = 2;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->cargo_id = $request->cargo_id;
        $user->remember_token = Str::random(64);

        // generate link of confirmation email
        $confirmation_link = route('new_user_confirmation', ['token' => $user->remember_token]);

        // send email
        /* $result = Mail::to($user->email)->send(new NewUserConfirmation($user->name, $user->email, $confirmation_link));

        if(!$result) {
            return back()->withInput()->with([
                'server_error' => 'Ocorreu um erro ao enviar o e-mail de confirmação.'
            ]);
        } */

        try {
            Mail::to($user->email)->send(new NewUserConfirmation($user->name, $user->email, $confirmation_link));
        } catch (\Exception $e) {
            return back()->withInput()->with([
                'invalid_login' => 'Erro ao enviar o e-mail de confirmação.'
            ]);
        }

        // save new user
        $user->save();

        // show view of success
        return view('auth.email_sent', ['name' => $user->name, 'email' => $user->email]);

    }

    public function new_user_confirmation($token)
    {
        //verificar se o token é válido
        $user = User::where('remember_token', $token)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        // Update user
        $user->email_verified_at = Carbon::now();
        $user->remember_token = null;
        $user->active = true;
        $user->save();

        // Authenticate
        if(env('ADMIN_PERMISSION_TO_REGISTER')) {
            return view('auth.email_confirmed', ['name' => $user->name]);
        }
        Auth::login($user);

        // Success message
        return view('auth.email_confirmed', ['name' => $user->name]);
        
    }
    
    public function forgot_password(): View {
        return view('auth.forgot_password');
    }
    
    public function send_reset_password_link(Request $request) {

        //form validation
        $credentials = $request->validate(
            // rules
            [
                'email' => 'required|email|min:2|max:100',
            ],
            // messages
            [
                'email.required' => 'O e-mail é obrigatório.',
                'email.email' => 'O e-mail deve ser válido.',
                'email.min' => 'O e-mail deve ter no mínimo :min caracteres.',
                'email.max' => 'O e-mail deve ter no máximo :max caracteres.',
            ]
        );

        $generic_message = "Verifique a sua caixa de entrada do e-mail para prosseguir com a recuperação de senha.";
        
        // verify if email exists
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return back()->with([
                'server_message' => $generic_message
            ]);
        }

        // create a link with token
        $user->remember_token = Str::random(64);
        $token_link = route('reset_password', ['token' => $user->remember_token]);

        // submit email
        $result = Mail::to($user->email)->send(new ResetPassword($user->name, $token_link));

        // verify if email was sended
        if (!$result) {
            return back()->with([
                'server_message' => $generic_message
            ]);
        }

        // save token in database
        $user->save();

        return back()->with([
            'server_message' => $generic_message
        ]);

    }

    public function reset_password($remember_token): View | RedirectResponse
    {
        // verify if token is valid
        $user = User::where('remember_token', $remember_token)->first();

        if(!$user) {
            return redirect()->route('login');
        }

        return view('auth.reset_password', ['remember_token' => $remember_token]);

        /* $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:32|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',
        ]);

        $user = User::where('email', $request->email)->firstOrFail();

        $service->change($user, $request->password);

        return redirect()->route('login')->with('success', 'Senha redefinida com sucesso.'); */
    }

    public function reset_password_update(Request $request): RedirectResponse
    {
        // form validation 
        $request->validate(
            // rules
            [
                'remember_token' => 'required',
                'new_password' => 'required|string|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',
                'new_password_confirmation' => 'required|same:new_password',
            ],
            // messages
            [
                'remember_token.required' => 'Token inválido!',

                'new_password.required' => 'O nova senha é obrigatória.',
                'new_password.min' => 'O nova senha deve ter no mínimo :min caracteres.',
                'new_password.max' => 'O nova senha deve ter no máximo :max caracteres.',
                'new_password.regex' => 'O nova senha deve ter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caracter especial (!@#$%^&*()).',
                
                'new_password_confirmation.required' => 'O campo de confirmação de senha nova é obrigatório.',
                'new_password_confirmation.same' => 'O valor da confirmação da senha nova deve ser igual à senha nova.',
            ]
        );

        // verify if token is valid
        $user = User::where('remember_token', $request->remember_token)->first();
        if(!$user) {
            return redirect()->route('login');
        }

        // update password in database
        $user->password = Hash::make($request->new_password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('login')->with([
            'success' => true
        ]);
    }

    
}
