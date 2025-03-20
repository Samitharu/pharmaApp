<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableSearch extends Component
{
    public $tableId;
    /**
     * Create a new component instance.
     */
    public function __construct($tableId)
    {
        $this->tableId = $tableId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-search');
    }
}
