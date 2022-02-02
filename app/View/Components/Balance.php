<?php

namespace App\View\Components;

use App\Models\Saving;
use App\Models\Expense;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Balance extends Component
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
        $expenses = Expense::where('user_id', Auth::user()->id)->get();
        $total_expenses = $expenses->sum('cost');

        $savings = Saving::where('user_id', Auth::user()->id)->get();
        $total_savings = $savings->sum('amount');
        $balance = $total_savings - $total_expenses;
        return view('components.balance', compact('total_expenses', 'total_savings','balance'));
    }
}
