<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function actuallyAddExpense(Request $request){
        $incomingFields=$request->validate([
            'category'=>'required',
            'typeOfExpense'=>'required',
            'amount'=> 'required',
        ]);
        $incomingFields['category']=strip_tags($incomingFields['category']);
        $incomingFields['typeOfExpense']=strip_tags($incomingFields['typeOfExpense']);
        $incomingFields['user_id'] = auth()->id();
        $expense = Expense::create($incomingFields);
        return redirect('dashboard');
    }
}
