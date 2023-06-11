<?php

namespace App\View\Components\fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSelect extends Component
{
    public $title, $name, $id, $placeholder, $roles;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $name, $id, $placeholder, $roles)
    {
        $this->title = $title;
        $this->name = $name;
        $this->roles = $roles;
        $this->id = $id;
        $this->placeholder = $placeholder;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.input-select');
    }
}
