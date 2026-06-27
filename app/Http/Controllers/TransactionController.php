<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // HALAMAN FORM
    public function create()
    {
        return view('transaction.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        // HAPUS TITIK PEMISAH RIBUAN
        $request->merge([
            'amount' => str_replace('.', '', $request->amount)
        ]);

        // VALIDATION
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
        ], [
            'amount.required' => 'Amount is required',
            'amount.numeric' => 'The amount must be a number',
            'amount.min' => 'Minimum amount 1',

            'type.required' => 'Type must be selected',

            'category.required' => 'Category is required',

            'date.required' => 'Date is required',
            'date.date' => 'Invalid date format',
        ]);

        // SIMPAN KE DATABASE
        Transaction::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'date' => $request->date,
        ]);

        // REDIRECT
        return redirect()->route('dashboard')
            ->with('success', 'Transaction Successfully Added');
    }
}
