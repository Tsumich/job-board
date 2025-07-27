<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RadioGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options,
        public ?bool $checked = true,
        public ?string $value = null
    )
    {
        //
    }

    public function optionsLabels(): array{
        /**
        *array_combine() — функция, которая объединяет два массива
        * и создаёт новый, используя один массив для ключей, 
        *а другой для значений.
        * проверка нужна на случай если у массива не будет ключей
        */
        return array_is_list($this->options) ?
            array_combine($this->options, $this->options)
            : $this->options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-group');
    }
}
