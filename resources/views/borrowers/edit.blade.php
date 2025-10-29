@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Edit Borrower</h2>

<form action="{{ route('borrowers.update', $borrower->id) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="name" value="{{ $borrower->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $borrower->email }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Contact Number</label>
        <input type="number" name="phone" value="{{ $borrower->phone }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-submit mt-3">Update</button>
</form>
@endsection
