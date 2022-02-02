<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Expense;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $expenses = Expense::where('user_id', Auth::user()->id)->get()->sum('cost');
        $budgets = Budget::where('user_id', Auth::user()->id)->get()->sum('amount');
        return view('components.alert', compact('expenses','budgets'));
    }
}
