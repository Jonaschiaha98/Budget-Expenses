<?php

namespace App\Http\Controllers;

use App\Models\expenses;
use App\Http\Requests\StoreexpensesRequest;
use App\Http\Requests\UpdateexpensesRequest;
use App\Mail\budget_Mail;
use App\Mail\budget_Mail_2;
use App\Models\budget;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd((budget::with('expenses')->where('id', 1)->first())->id);
        return view('budget.expenses');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $my_budget = (budget::query()->where('id', $id)->first());
        $my_expenses = expenses::query()->where('budget_id', $id)->sum('amount');
        $message = "You've either exceeded your budget or that budget has expired ";

        if ($my_expenses >= ($my_budget * 0.7)) {
            Mail::to(Auth::user()['email'])->send(new budget_Mail_2([
                'my_budget' => $my_budget,
                'my_expenses' => $my_expenses,
            ]));
            return redirect()->route('budget.show', $id)->with($message);
        }
        if ($my_budget->duration = now()->format('D/M/Y') || $my_expenses >= $my_budget) {
            Mail::to(Auth::user()['email'])->send(new budget_Mail([
                'my_budget' => $my_budget,
                'my_expenses' => $my_expenses,
            ]));
            return redirect()->route('budget.show', $id)->with($message);
        }

        return view('budget.create_expenses', [
            "budget" => budget::findOrFail($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreexpensesRequest $request, $id)
    {
        expenses::create([
            "description" => $request->description, 
            "amount" =>$request->amount, 
            "budget_id" => $id,
        ]);
        
        return redirect()->route('budget.show', $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(expenses $expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(expenses $id)
    {
        // dd('here');
        return view('budget.edit_expenses', [
            // "budget" => budget::findOrFail($id->id),
            "expenses" => expenses::findOrFail($id->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateexpensesRequest $request, expenses $id,)
    {
        // dd($request->except(["_token", "_method"]));
        budget::with('expenses')->where('id', $id->id);
        expenses::where('id', $id->id)->update($request->except(["_token", "_method"]));
        return redirect()->route('budget.budget');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(expenses $id)
    {
        expenses::where('id', $id->id)->first()->forceDelete();
        return redirect()->route('budget.budget');
    }
}
