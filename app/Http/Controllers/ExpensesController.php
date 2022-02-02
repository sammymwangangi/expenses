<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Saving;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::where('user_id', Auth::user()->id)->get();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
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
            'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'date' => ['required', 'date:Y-m-d'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $savings = Saving::where('user_id', Auth::user()->id)->get()->sum('amount');
        

        $expense = new Expense();
        $expense->cost = $request->cost;
        $expense->date = $request->date;
        $expense->user_id = auth()->user()->id;
        $expense->category_id = $request->category_id;
        if ($savings < $expense->cost) {
            return redirect()->back()->withErrors("Your savings are below zero, kindly update your savings and try again!");
        }
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('Expense added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();
        return view('expenses.show', compact('expense','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        $categories = Category::all();
        return view('expenses.edit', compact('expense','categories'));

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
            'cost' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'date' => ['required', 'date:Y-m-d'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $expense = Expense::findOrFail($id);
        $expense->cost = $request->cost;
        $expense->date = $request->date;
        $expense->user_id = auth()->user()->id;
        $expense->category_id = $request->category_id;
        $expense->save();

        return redirect()->route('expenses.index')
            ->with('Expense updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect('dashboard/expenses')->with('Expense was DELETED SUCCESSFULLY!');

    }
}
