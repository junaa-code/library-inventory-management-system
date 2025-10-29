@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Add New Transaction</h2>

<form action="{{ route('transactions.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Book</label>
        <select name="book_id" class="form-control" required>
            <option value="">Select a book</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Borrower</label>
        <select name="borrower_id" class="form-control" required>
            <option value="">Select a borrower</option>
            @foreach($borrowers as $borrower)
                <option value="{{ $borrower->id }}">{{ $borrower->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Borrow Date</label>
        <input type="date" name="borrowed_at" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_at" class="form-control">
    </div>

    <div class="mb-3">
        <label>Return Date</label>
        <input type="date" name="returned_at" class="form-control">
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="borrowed">Borrowed</option>
            <option value="returned">Returned</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Save Transaction</button>
</form>
@endsection
