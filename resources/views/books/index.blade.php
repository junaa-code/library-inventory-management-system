@extends('layouts.app')

@section('content')
<div class="container mt-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-4">📚 Books List</h2>
        <a href="{{ route('books.create') }}" class="btn btn-success rounded-3 px-4">
            <i class="bi bi-plus-circle"></i> Add New Book
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('books.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control rounded-start-3" placeholder="Search by title, author, or ISBN" value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary rounded-end-3">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </form>

    {{-- Books Table --}}
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Total Copies</th>
                            <th>Available</th>
                            <th style="width: 250px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->total_copies }}</td>
                                <td>
                                    @if ($book->available_copies > 0)
                                        <span class="badge bg-success">{{ $book->available_copies }}</span>
                                    @else
                                        <span class="badge bg-danger">Out</span>
                                    @endif
                                </td>
                                <td>
                                    {{-- View --}}
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm rounded-3 me-1">
                                        <i class="bi bi-eye"></i> View
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm rounded-3 me-1 text-white">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-3">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted py-4">No books found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
