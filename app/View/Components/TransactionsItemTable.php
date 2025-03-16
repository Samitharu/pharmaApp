<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TransactionsItemTable extends Component
{
    public $columns;
    public $rows;

    public function __construct($columns = [], $rows = [])
    {
        $this->columns = $columns;
        $this->rows = $rows;
    }

    public function render()
    {
        return view('components.transactions-item-table');
    }
}
