<?php

namespace App\View\Components\fields\profile;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class avatar extends Component
{
    public $name, $title, $id, $avatar;
    /**
     * Create a new component instance.
     */
    public function __construct($name, $title, $id, $avatar)
    {
        $this->title = $title;
        $this->id = $id;
        $this->name = $name;
        $this->avatar = $avatar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.fields.profile.avatar');
    }
}
