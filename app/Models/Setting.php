<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // A tabela padrão é 'settings', mas é bom definir.
    protected $table = 'settings';

    /**
     * Os atributos que são mass assignable.
     * Inclua todos os campos que você definiu na sua migration.
     */
    protected $fillable = [
        'app_name', 
        'primary_color_hex', 
        'secondary_color_hex', 
        'light_logo_path', 
        'dark_logo_path', 
        'light_logo_tablet_path', 
        'dark_logo_tablet_path', 
        'logo_dark_email_path', 
        'favicon_path', 
        'company_email', 
        'company_phone', 
        'cnpj', 
    ];

    /**
     * Defina o método para carregar o registro único.
     * Isso facilita a inicialização em qualquer lugar da aplicação.
     */
    public static function get_app_settings(): self
    {
        // Pega o primeiro registro, ou o cria se não existir.
        return self::firstOrCreate([]);
    }

    public function get_cnpj_formated()
{
    // Obtém o valor limpo (ex: 99999999999999)
    $cnpj = $this->cnpj; 

    // Aplica a máscara e retorna
    if (strlen($cnpj) === 14) {
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
    }
    return $cnpj; // Retorna o valor original se não for 14 dígitos
}
}
