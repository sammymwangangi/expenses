<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
class Season extends Component
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
        $total_expenses = Expense::where('user_id', Auth::user()->id)->get()->sum('cost');
        $today_expenses = Expense::whereDate('date', \Carbon\Carbon::today())->where('user_id', Auth::user()->id)->get()->sum('cost');
        $yesterday_expenses = Expense::whereDate('date', \Carbon\Carbon::yesterday())->where('user_id', Auth::user()->id)->get()->sum('cost');
        $last_seven_days_expenses = Expense::whereDate('date', '>', \Carbon\Carbon::now()->subDays(7))->where('user_id', Auth::user()->id)->get()->sum('cost');
        $last_thirty_days_expenses = Expense::whereDate('date', '>', \Carbon\Carbon::now()->subDays(30))->where('user_id', Auth::user()->id)->get()->sum('cost');
        $current_year_expenses = Expense::whereYear('date', \Carbon\Carbon::now()->year)->where('user_id', Auth::user()->id)->get()->sum('cost');
        return view('components.season', compact('today_expenses','yesterday_expenses','last_seven_days_expenses','last_thirty_days_expenses','current_year_expenses','total_expenses'));
    }
}
