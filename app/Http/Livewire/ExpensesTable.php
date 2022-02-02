<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ExpensesTable extends LivewireDatatable
{
    public $model = Expense::class;

    public function columns()
    {
        return [
            NumberColumn::name('id'),
            DateColumn::name('created_at'),

            Column::name('cost'),

            Column::name('category.name')
                ->label('Category'),
            

        ];
    }

    public function getCategoriesProperty()
    {
        return Category::all();
    }
}