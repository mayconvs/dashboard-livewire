<?php

namespace App\Livewire;

use App\Services\UserPasswordService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use App\Services\SubscriptionService;



class Configuracoes extends Component
{
    use WithFileUploads;

    // BRANDING
    public $primary_color_hex;
    public $secondary_color_hex;

    public $new_logo_light;
    public $new_logo_dark;
    public $new_logo_light_mini;
    public $new_logo_dark_mini;
    public $new_logo_dark_email;
    public $new_favicon;

    public $light_logo_path;
    public $dark_logo_path;
    public $light_logo_tablet_path;
    public $dark_logo_tablet_path;
    public $logo_dark_email_path;
    public $favicon_path;

    // COMPANY INFO
    public $company_name;
    public $company_cnpj;
    public $company_phone;
    public $company_email;
    public $url_site;
    public $url_whatsapp;
    public $url_linkedin;
    public $url_facebook;
    public $url_instagram;
    public $url_github;

    public $cnpj_formated;

    // ALTER PASSWORD
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    // MY PLANS
    public $current_plan;
    public $status_plan;
    public $expiration_plan;
    public $invoices = [];

    public $success_message_save_branding_settings = null;
    public $success_message_save_company_settings = null;
    public $success_message_change_password = null;







    public function mount(SubscriptionService $subscriptionService)
    {
        $settings = Setting::first();
        $this->primary_color_hex = $settings->primary_color_hex ?? '#000000';
        $this->secondary_color_hex = $settings->secondary_color_hex ?? '#000000';
        /* $this->new_logo_light = $settings->light_logo_path;
        $this->new_logo_dark = $settings->dark_logo_path;
        $this->new_logo_light_mini = $settings->light_logo_tablet_path;
        $this->new_logo_dark_mini = $settings->dark_logo_tablet_path;
        $this->new_favicon = $settings->favicon_path; */
        $this->light_logo_path = $settings->light_logo_path;
        $this->dark_logo_path = $settings->dark_logo_path;
        $this->light_logo_tablet_path = $settings->light_logo_tablet_path;
        $this->dark_logo_tablet_path = $settings->dark_logo_tablet_path;
        $this->logo_dark_email_path = $settings->logo_dark_email_path;
        $this->favicon_path = $settings->favicon_path;

        $this->company_name = $settings->app_name;
        /* $this->company_cnpj = $settings->cnpj; */
        $this->company_cnpj = $settings->get_cnpj_formated() ?? env('CNPJ_COMPANY') ?? null;
        $this->company_phone = $settings->company_phone;
        $this->company_email = $settings->company_email;
        $this->url_site = $settings->url_site;
        $this->url_whatsapp = $settings->url_whatsapp;
        $this->url_linkedin = $settings->url_linkedin;
        $this->url_facebook = $settings->url_facebook;
        $this->url_instagram = $settings->url_instagram;
        $this->url_github = $settings->url_github;


        $data = $subscriptionService->getSubscriptionData(auth()->user());

        $this->current_plan = $data['current_plan'];
        $this->status_plan = $data['status_plan'];
        $this->expiration_plan = $data['expiration_plan'];

        $this->invoices = $subscriptionService->getInvoices(auth()->user());

        






    }

    public function render()
    {
        
        return view('livewire.configuracoes');
    }

    public function save_branding_settings()
    {
        $this->validate(
            [
                'new_logo_light' => 'nullable|mimes:png,svg|max:2048',
                'new_logo_dark' => 'nullable|mimes:png,svg|max:2048',
                'new_logo_light_mini' => 'nullable|mimes:png,svg|max:2048',
                'new_logo_dark_mini' => 'nullable|mimes:png,svg|max:2048',
                'new_logo_dark_email' => 'nullable|mimes:png|max:2048',
                'new_favicon' => 'nullable|mimes:ico|max:1024',
            ],
            [
                'new_logo_light.mimes' => 'O logo claro deve ser um arquivo PNG ou SVG.',
                'new_logo_dark.mimes' => 'O logo escuro deve ser um arquivo PNG ou SVG.',
                'new_logo_light_mini.mimes' => 'O logo mini claro deve ser PNG ou SVG.',
                'new_logo_dark_mini.mimes' => 'O logo mini escuro deve ser PNG ou SVG.',
                'new_logo_dark_email.mimes' => 'O logo de email só pode ser PNG.',

                'new_logo_light.max' => 'O logo claro não pode ultrapassar 2MB.',
                'new_logo_dark.max' => 'O logo escuro não pode ultrapassar 2MB.',
                'new_logo_light_mini.max' => 'O logo mini claro não pode ultrapassar 2MB.',
                'new_logo_dark_mini.max' => 'O logo mini escuro não pode ultrapassar 2MB.',
                'new_logo_dark_email.max' => 'O logo do email não pode ultrapassar 2MB.',

                'new_favicon.mimes' => 'O favicon deve ser um arquivo .ico.',
                'new_favicon.max' => 'O favicon deve ter no máximo 1MB.',
            ]
        );

        $settings = Setting::first();

        // 🔥 Logo modo claro
        if ($this->new_logo_light) {
            $ext = $this->new_logo_light->getClientOriginalExtension();
            // apaga a imagem antiga
            if ($settings->light_logo_path && Storage::exists($settings->light_logo_path)) {
                Storage::delete($settings->light_logo_path);
            }

            $settings->light_logo_path = $this->new_logo_light->storeAs('branding', "logo-light.$ext", 'public');
        }

        // 🔥 Logo modo escuro
        if ($this->new_logo_dark) {
            $ext = $this->new_logo_dark->getClientOriginalExtension();
            if ($settings->dark_logo_path && Storage::exists($settings->dark_logo_path)) {
                Storage::delete($settings->dark_logo_path);
            }

            $settings->dark_logo_path = $this->new_logo_dark->storeAs('branding', "logo-dark.$ext", 'public');
        }

        // 🔥 Logo tablet claro
        if ($this->new_logo_light_mini) {
            $ext = $this->new_logo_light_mini->getClientOriginalExtension();
            if ($settings->light_logo_tablet_path && Storage::exists($settings->light_logo_tablet_path)) {
                Storage::delete($settings->light_logo_tablet_path);
            }

            $settings->light_logo_tablet_path = $this->new_logo_light_mini->storeAs('branding', "logo-light-mini.$ext", 'public');
        }

        // 🔥 Logo tablet escuro
        if ($this->new_logo_dark_mini) {
            $ext = $this->new_logo_dark_mini->getClientOriginalExtension();
            if ($settings->dark_logo_tablet_path && Storage::exists($settings->dark_logo_tablet_path)) {
                Storage::delete($settings->dark_logo_tablet_path);
            }

            $settings->dark_logo_tablet_path = $this->new_logo_dark_mini->storeAs('branding', "logo-dark-mini.$ext", 'public');
        }

        // 🔥 Logo E-mail
        if ($this->new_logo_dark_email) {
            $ext = $this->new_logo_dark_email->getClientOriginalExtension();
            // apaga a imagem antiga
            if ($settings->logo_dark_email_path && Storage::exists($settings->logo_dark_email_path)) {
                Storage::delete($settings->logo_dark_email_path);
            }

            $settings->logo_dark_email_path = $this->new_logo_dark_email->storeAs('branding', "logo-dark-email.$ext", 'public');
        }

        // 🔥 Favicon
        if ($this->new_favicon) {

            $ext = $this->new_favicon->getClientOriginalExtension();

            // Salvar temporariamente dentro de storage/app/public/favicon/
            $tempPath = $this->new_favicon->storeAs('favicon_temp', "uploaded.$ext", 'public');

            // Caminho absoluto do arquivo dentro de storage
            $absoluteTempPath = storage_path('app/public/' . $tempPath);

            // Caminho final no /public
            $finalPath = public_path('favicon.ico');

            // Remove favicon antigo
            @unlink($finalPath);

            // Copia o arquivo
            copy($absoluteTempPath, $finalPath);

            // Salva no banco
            $settings->favicon_path = 'favicon.ico';
        }

        // 🔥 Cores
        $settings->primary_color_hex = $this->primary_color_hex;
        $settings->secondary_color_hex = $this->secondary_color_hex;

        $settings->save();


        // Limpando inputs de upload
        $this->reset([
            'new_logo_light',
            'new_logo_dark',
            'new_logo_light_mini',
            'new_logo_dark_mini',
            'new_logo_dark_email',
            'new_favicon',
        ]);

        //session()->flash('success', 'Configurações salvas com sucesso!');
        $this->success_message_save_branding_settings = 'Configurações salvas com sucesso!';



    }

    public function save_company_settings()
    {

        if ($this->company_cnpj) {
            // Usa preg_replace para remover tudo que não é dígito (caracteres de máscara)
            $this->company_cnpj = preg_replace('/\D/', '', $this->company_cnpj);
        }


        logger()->info('===== ANTES DA VALIDAÇÃO =====');
        logger()->info('company_phone recebido: ' . ($this->company_phone ?? 'NULL'));
        logger()->info('Tipo: ' . gettype($this->company_phone));

        $this->validate(
            [
                'company_name' => 'nullable|string|max:255',
                // O CNPJ é um campo de 14 dígitos (após limpeza da máscara)
                'company_cnpj' => 'nullable|string|size:14|regex:/^\d{14}$/',
                'company_email' => 'nullable|email:rfc,dns|max:255',

                // Telefone (deve vir no formato E.164, ex: +5511999999999)
                // Se estiver usando o intl-tel-input, use o regex E.164
                'company_phone' => 'nullable|string|max:20|regex:/^\+[1-9]\d{1,14}$/',

                // URLs
                'url_site' => 'nullable|url|max:255',
                'url_facebook' => 'nullable|url|max:255|starts_with:http://facebook.com,https://facebook.com,https://www.facebook.com',
                'url_linkedin' => 'nullable|url|max:255|starts_with:http://linkedin.com,https://linkedin.com,https://www.linkedin.com',
                'url_whatsapp' => 'nullable|url|max:255|starts_with:http://wa.me,https://wa.me', // Padrão wa.me
                'url_instagram' => 'nullable|url|max:255|starts_with:http://instagram.com,https://instagram.com,https://www.instagram.com',
                'url_github' => 'nullable|url|max:255|starts_with:http://github.com,https://github.com',
            ],
            [
                'company_name.max' => 'O nome da empresa não pode ter mais de :max caracteres.',

                // CNPJ
                'company_cnpj.size' => 'O CNPJ deve conter exatamente :size dígitos (após a limpeza da máscara).',
                'company_cnpj.regex' => 'O formato do CNPJ está incorreto.',

                // Email e Telefone
                'company_email.email' => 'O endereço de e-mail é inválido.',
                'company_phone.regex' => 'O telefone deve estar no formato internacional (E.164), ex: +5511999999999.',

                // URLs
                'url_site.url' => 'O campo Site deve ser uma URL válida.',
                'url_facebook.url' => 'O URL do Facebook é inválido.',
                'url_facebook.starts_with' => 'O URL do Facebook deve começar com https://www.facebook.com.',
                // Repita para outros URLs se necessário, ou crie uma mensagem genérica para url.
                'url_whatsapp.url' => 'O URL do WhatsApp é inválido.',
                'url_whatsapp.starts_with' => 'O URL do WhatsApp deve começar com https://wa.me.',
            ]
        );

        try {
            DB::beginTransaction();

            // 2. Limpeza e formatação de dados antes do salvamento
            $data = $this->all();

            // Garante que o CNPJ seja salvo LIMPO (apenas dígitos)
            if ($data['company_cnpj']) {
                $data['company_cnpj'] = preg_replace('/\D/', '', $data['company_cnpj']);
            }

            // Garante que o telefone seja salvo LIMPO (já deveria ser E.164 do front-end)
            // Se você não está usando o intl-tel-input, precisaria de uma limpeza mais robusta aqui.

            // 3. Atualiza o objeto settings (Mass Assignment)
            $settings = Setting::firstOrCreate([]);

            $settings->app_name = $this->company_name;
            $settings->cnpj = $this->company_cnpj; // Já está limpo aqui
            $settings->company_email = $this->company_email;
            $settings->company_phone = $this->company_phone;
            $settings->url_site = $this->url_site;
            $settings->url_facebook = $this->url_facebook;
            $settings->url_linkedin = $this->url_linkedin;
            $settings->url_whatsapp = $this->url_whatsapp;
            $settings->url_instagram = $this->url_instagram;
            $settings->url_github = $this->url_github;

            logger()->info('===== SALVANDO NO BANCO =====');
            logger()->info('company_phone para salvar: ' . ($settings->company_phone ?? 'NULL'));

            // 5. SALVA O MODELO
            $settings->save();

            // Voltando o valor normal para o value do input CNPJ
            $this->company_cnpj = $settings->get_cnpj_formated() ?? env('CNPJ_COMPANY') ?? null;

            DB::commit();

            // 4. Feedback
            //$this->success_message_save_company_settings = 'Configurações da empresa salvas com sucesso!';

            $this->dispatch('saved-company-notify', [
                'type' => 'success',
                'title' => 'Sucesso!',
                'message' => 'Configurações da empresa salvas com sucesso!'
            ]);
            //$this->dispatch('saved');

        } catch (\Exception $e) {
            DB::rollBack();
            // Loga o erro para depuração
            logger()->error("Erro ao salvar configurações da empresa: " . $e->getMessage());

            // 5. Feedback de erro seguro para o usuário
            $this->dispatch('saved-company-notify', [
                'type' => 'error',
                'title' => 'Error!',
                'message' => 'Ocorreu um erro interno ao salvar as configurações. Tente novamente.'
            ]);
            //session()->flash('server_error', 'Ocorreu um erro interno ao salvar as configurações. Tente novamente.');
        }

    }

    public function change_password(UserPasswordService $service)
    {
        // form validation 
        $this->validate(
            // rules
            [
                'current_password' => 'required|string|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/',
                'new_password' => 'required|string|min:8|max:32|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/|different:current_password',
                'new_password_confirmation' => 'required|same:new_password',
            ],
            // messages
            [
                'current_password.required' => 'O senha atual é obrigatória.',
                'current_password.min' => 'O senha atual deve ter no mínimo :min caracteres.',
                'current_password.max' => 'O senha atual deve ter no máximo :max caracteres.',
                'current_password.regex' => 'O senha atual deve ter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caracter especial (!@#$%^&*()).',

                'new_password.required' => 'O nova senha é obrigatória.',
                'new_password.min' => 'O nova senha deve ter no mínimo :min caracteres.',
                'new_password.max' => 'O nova senha deve ter no máximo :max caracteres.',
                'new_password.regex' => 'O nova senha deve ter pelo menos uma letra maiúscula, uma letra minúscula, um número e um caracter especial (!@#$%^&*()).',
                'new_password.different' => 'O nova senha deve ser diferente da senha atual.',
                'new_password.confirmed' => 'O valor da nova senha deve ser igual à confirmação de senha.',

                'new_password_confirmation.required' => 'O campo de confirmação de senha nova é obrigatório.',
                'new_password_confirmation.same' => 'O valor da confirmação da senha nova deve ser igual à senha nova.',
            ]
        );


        if (!Hash::check($this->current_password, auth()->user()->password)) {
            $this->addError('server_error', 'Senha atual incorreta.');
            return;
        }

        $service->change(auth()->user(), $this->new_password);

        $this->success_message_change_password = 'Senha alterada com sucesso.';
    }
}
