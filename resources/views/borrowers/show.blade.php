@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">Borrower Details</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Name:</strong> {{ $borrower->name }}</p>
    <p><strong>Email:</strong> {{ $borrower->email }}</p>
    <p><strong>Contact:</strong> {{ $borrower->contact }}</p>
</div>

<a href="{{ route('borrowers.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection
