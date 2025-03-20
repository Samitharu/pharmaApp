<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowCountBadge extends Component
{
    public $tableId;

    // Constructor to pass the tableId
    public function __construct($tableId)
    {
        $this->tableId = $tableId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.row-count-badge');
    }
}
