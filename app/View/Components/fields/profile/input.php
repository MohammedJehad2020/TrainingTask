<?php

namespace App\View\Components\fields\profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $title, $name, $id, $type, $value, $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $type, $name, $id, $placeholder, $value)
    {
        $this->title = $title;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.profile.input');
    }
}
