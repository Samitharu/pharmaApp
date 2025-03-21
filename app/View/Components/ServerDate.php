<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServerDate extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $label;
    public $name;
    public $value;
    public function __construct($id,$label,$name,$value = null)
    
    {
        $this->id = $id;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value ?? now()->format('Y-m-d');
    }   
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.server-date');
    }
}
