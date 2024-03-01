<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function actuallyAddExpense(Request $request)
    {
        $incomingFields = $request->validate([
            'category' => 'required',
            'typeOfExpense' => 'required',
            'amount' => 'required',
        ]);
        $incomingFields['user_id'] = auth()->id();
        $expense = Expense::create($incomingFields);
        return redirect('dashboard');
    }

    public function fetchExpensesOfCurrentMonth()
    {
        if (auth()->user()) {
            $date = Carbon::now()->format('Y') . '-' . Carbon::now()->format('m');
            $currentMonth = Carbon::now()->format('m');
            $currentYear = Carbon::now()->format('Y');
            $expenses = auth()->user()
                ->usersExpenses()
                ->whereMonth('created_at', $currentMonth)
                ->whereYear('created_at', $currentYear)
                ->latest()
                ->get();
            return view('dashboard', ['expenses' => $expenses, 'date' => $date]);
        } else {
            return redirect('/');
        }
    }

    public function fetchExpensesOfDesiredMonth(Request $request)
    {
        $date = $request['date'];
        $desiredYear = substr($date, 0, 4);
        $desiredMonth = substr($date, 5, 2);

        $expenses = auth()->user()
            ->usersExpenses()
            ->whereMonth('created_at', $desiredMonth)
            ->whereYear('created_at', $desiredYear)
            ->latest()
            ->get();

        return view('dashboard', ['expenses' => $expenses, 'date' => $date]);
    }

    public function showEditScreen(Expense $expense)
    {
        if (auth()->user()->id !== $expense->user_id) {
            return redirect('/');
        } else {
            return view('add-expense', ['expense' => $expense]);
        }
    }

    public function actuallyEditExpense(Request $request, Expense $expense){
        $incomingFields = $request->validate([
            'category' => 'required',
            'typeOfExpense' => 'required',
            'amount' => 'required',
        ]);
        $expense->update($incomingFields);
        return redirect('/dashboard');
    }

    public function deleteExpense(Expense $expense)
    {
        $expense->delete();
        return redirect('/dashboard');
    }
}
