<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $value;
    public $required;
    public $class;

    public function __construct($name, $value = null, $required = false, $class = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.text-area');
    }
}