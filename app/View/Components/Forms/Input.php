<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $placeholder;

    public function __construct(
        $type = 'text', 
        $name, 
        $label = null, 
        $placeholder = null
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
