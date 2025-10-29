@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Transaction Details</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Book:</strong> {{ $transaction->book->title }}</p>
    <p><strong>Borrower:</strong> {{ $transaction->borrower->name }}</p>
    <p><strong>Borrow Date:</strong> {{ $transaction->borrowed_at }}</p>
    <p><strong>Due Date:</strong> {{ $transaction->due_at ?? 'N/A' }}</p>
    <p><strong>Return Date:</strong> {{ $transaction->returned_at ?? 'Not yet returned' }}</p>
    <p><strong>Status:</strong> 
        <span class="badge {{ $transaction->status == 'returned' ? 'bg-success' : 'bg-warning' }}">
            {{ ucfirst($transaction->status) }}
        </span>
    </p>
    @if($transaction->notes)
    <p><strong>Notes:</strong> {{ $transaction->notes }}</p>
    @endif
</div>

<a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
