@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">📖 Transaction Records</h2>

<a href="{{ route('transactions.create') }}" class="btn btn-success mb-3">Add Transaction</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Book</th>
            <th>Borrower</th>
            <th>Borrow Date</th>
            <th>Due Date</th>
            <th>Return Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->book->title }}</td>
            <td>{{ $transaction->borrower->name }}</td>
            <td>{{ $transaction->borrowed_at }}</td>
            <td>{{ $transaction->due_at ?? 'N/A' }}</td>
            <td>{{ $transaction->returned_at ?? 'N/A' }}</td>
            <td>
                <span class="badge {{ $transaction->status == 'returned' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($transaction->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete transaction?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center text-muted">No transactions recorded.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
