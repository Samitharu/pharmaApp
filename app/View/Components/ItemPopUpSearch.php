<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemPopUpSearch extends Component
{
    public $id;
    public $title;
    public $size;
    public $footer;

    public function __construct($id, $title = 'Modal Title', $size = '', $footer = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        $this->footer = $footer;
    }

    public function render()
    {
        return view('components.item-pop-up-search');
    }
}
