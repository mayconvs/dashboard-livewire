<?php
// app/View/Components/Forms/Select.php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public ?string $label;
    public ?string $placeholder;
    public $items;
    public string $itemValue;
    public string $itemLabel;
    public bool $required;
    public $cargo_id;


    public function __construct(
        string $name,
        ?string $label = null,
        $items = [],
        string $itemValue = 'id',
        string $itemLabel = 'name',
        ?string $placeholder = 'Selecione...',
        bool $required = false
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->items = collect($items);
        $this->itemValue = $itemValue;
        $this->itemLabel = $itemLabel;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }
}