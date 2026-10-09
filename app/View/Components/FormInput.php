<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FormInput extends Component
{
    public string $name;
    public string $label;
    public string $type;
    public mixed $value;

    public function __construct(
        string $name,
        string $label,
        string $type = 'text',
        mixed $value = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
    }

    public function render(): View
    {
        return view('components.form-input');
    }
}