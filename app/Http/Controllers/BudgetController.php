<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budget::where('user_id', Auth::user()->id)->get();
        return view('budgets.index', compact('budgets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('budgets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'from' => ['required', 'date:Y-m-d'],
            'to' => ['required', 'date:Y-m-d'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $budget = new Budget();
        $budget->amount = $request->amount;
        $budget->from = $request->from;
        $budget->to = $request->to;
        $budget->user_id = auth()->user()->id;
        $budget->category_id = $request->category_id;
        $budget->save();

        return redirect()->route('budgets.index')
            ->with('Budget added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::findOrFail($id);
        $from = $budget->from;
        $to = $budget->to;
        $category_id = $budget->category->id;
        $amount = $budget->amount;
        $expenses = DB::table('expenses')
                    ->whereBetween('date',[$from, $to])
                    ->where('category_id', $category_id)
                    ->get()->sum('cost');
        $percbudget = $expenses*100/$amount;
        return view('budgets.show', compact('budget','expenses','percbudget','amount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = Budget::findOrFail($id);
        $categories = Category::all();
        return view('budgets.edit', compact('budget','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'from' => ['required', 'date:Y-m-d'],
            'to' => ['required', 'date:Y-m-d'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $budget = Budget::findOrFail($id);;
        $budget->amount = $request->amount;
        $budget->from = $request->from;
        $budget->to = $request->to;
        $budget->user_id = auth()->user()->id;
        $budget->category_id = $request->category_id;
        $budget->save();

        return redirect()->route('budgets.index')
            ->with('Budget updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return redirect('dashboard/budgets')->with('Budget was DELETED SUCCESSFULLY!');
    }
}
