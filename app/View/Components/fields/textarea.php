<?php

namespace App\View\Components\fields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textarea extends Component
{
    public $title, $name, $id, $type, $value, $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $type, $name, $id,$value, $placeholder)
    {
        $this->title = $title;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.textarea');
    }
}
