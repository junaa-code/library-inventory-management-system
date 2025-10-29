@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary fw-bold mb-0">
                📖 Book Details
            </h2>
            <a href="{{ route('books.index') }}" class="btn btn-secondary rounded-3">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>

        {{-- Book Info --}}
        <div class="row">
            <div class="col-md-6 mb-3">
                <h5 class="fw-semibold text-muted mb-1">Title</h5>
                <p class="fs-5">{{ $book->title }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="fw-semibold text-muted mb-1">Author</h5>
                <p class="fs-5">{{ $book->author }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="fw-semibold text-muted mb-1">ISBN</h5>
                <p class="fs-5">{{ $book->isbn }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="fw-semibold text-muted mb-1">Total Copies</h5>
                <p class="fs-5">{{ $book->total_copies }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <h5 class="fw-semibold text-muted mb-1">Available Copies</h5>
                <p class="fs-5">
                    @if ($book->available_copies > 0)
                        <span class="badge bg-success">{{ $book->available_copies }}</span>
                    @else
                        <span class="badge bg-danger">Out of Stock</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <h5 class="fw-semibold text-muted mb-1">Description</h5>
                <p class="fs-5 text-secondary">{{ $book->description ?: 'No description available.' }}</p>
            </div>
        </div>

        {{-- Actions --}}
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning rounded-3">
                <i class="bi bi-pencil-square"></i> Edit
            </a>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger rounded-3">
                    <i class="bi bi-trash3"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
