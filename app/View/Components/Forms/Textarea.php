<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $rows;

    public function __construct($name, $label = null, $placeholder = null, $rows = 4)
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.textarea');
    }
}
