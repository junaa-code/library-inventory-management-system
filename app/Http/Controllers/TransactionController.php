<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index()
    {
        $transactions = Transaction::with(['book', 'borrower'])->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        $books = Book::all();
        $borrowers = Borrower::all();
        return view('transactions.create', compact('books', 'borrowers'));
    }

    /**
     * Store a newly created transaction in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_id' => 'required|exists:borrowers,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'nullable|date|after_or_equal:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
            'status' => 'required|in:borrowed,returned',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction added successfully.');
    }

    /**
     * Display the specified transaction.
     */
    public function show($id)
    {
        $transaction = Transaction::with(['book', 'borrower'])->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified transaction.
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $books = Book::all();
        $borrowers = Borrower::all();
        return view('transactions.edit', compact('transaction', 'books', 'borrowers'));
    }

    /**
     * Update the specified transaction in storage.
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_id' => 'required|exists:borrowers,id',
            'borrowed_at' => 'required|date',
            'due_at' => 'nullable|date|after_or_equal:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
            'status' => 'required|in:borrowed,returned',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified transaction from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaction deleted successfully.');
    }
}