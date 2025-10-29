@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-4">👥 Borrower List</h2>

<a href="{{ route('borrowers.create') }}" class="btn btn-success mb-3">Register New Borrower</a>

<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($borrowers as $borrower)
        <tr>
            <td>{{ $borrower->id }}</td>
            <td>{{ $borrower->name }}</td>
            <td>{{ $borrower->email }}</td>
            <td>{{ $borrower->phone }}</td>
            <td>
                <a href="{{ route('borrowers.show', $borrower->id) }}" class="btn btn-info btn-sm">View</a>
                <a href="{{ route('borrowers.edit', $borrower->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('borrowers.destroy', $borrower->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete borrower?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center text-muted">No borrowers found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
