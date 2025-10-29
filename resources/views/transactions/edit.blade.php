@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Edit Transaction</h2>

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Book</label>
        <select name="book_id" class="form-control" required>
            @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $transaction->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Borrower</label>
        <select name="borrower_id" class="form-control" required>
            @foreach($borrowers as $borrower)
                <option value="{{ $borrower->id }}" {{ $transaction->borrower_id == $borrower->id ? 'selected' : '' }}>
                    {{ $borrower->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Borrow Date</label>
        <input type="date" name="borrowed_at" value="{{ $transaction->borrowed_at }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_at" value="{{ $transaction->due_at }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Return Date</label>
        <input type="date" name="returned_at" value="{{ $transaction->returned_at }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="borrowed" {{ $transaction->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
            <option value="returned" {{ $transaction->status == 'returned' ? 'selected' : '' }}>Returned</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update Transaction</button>
</form>
@endsection
