<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputPassword extends Component
{
    public $name;
    public $label;
    public $placeholder;

    public function __construct($name, $label = null, $placeholder = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input-password');
    }
}
