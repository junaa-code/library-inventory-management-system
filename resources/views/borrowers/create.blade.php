@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Register Borrower</h2>

<form action="{{ route('borrowers.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
    </div>

    <div class="mb-3">
        <label>Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
    </div>

    <div class="mb-3">
        <label>Contact Number</label>
        <input type="number" name="phone" class="form-control" placeholder="Enter contact number" required>
    </div>

    <button type="submit" class="btn btn-submit mt-3">Register</button>
</form>
@endsection
