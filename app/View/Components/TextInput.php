<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class TextInput extends Component
{
    /**
     * касточный инпут p
     */
    public function __construct(
        public ?string $value = null, 
        public ?string $name = null, 
        public ?string $placeholder = null, 
        // нужно ли отображать крестик на импуте или нет
        public ?string $formRef = null,
        public ?string $formId = null,
        public ?string $type = 'text',
    )
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
