@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 p-4">
        <h2 class="mb-4 text-primary text-center">Edit Book Information</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Edit Form --}}
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label fw-semibold">Book Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" class="form-control rounded-3" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="author" class="form-label fw-semibold">Author</label>
                    <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" class="form-control rounded-3" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="isbn" class="form-label fw-semibold">ISBN</label>
                    <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}" class="form-control rounded-3" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="total_copies" class="form-label fw-semibold">Total Copies</label>
                    <input type="number" name="total_copies" id="total_copies" value="{{ old('total_copies', $book->total_copies) }}" class="form-control rounded-3" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="available_copies" class="form-label fw-semibold">Available Copies</label>
                    <input type="number" name="available_copies" id="available_copies" value="{{ old('available_copies', $book->available_copies) }}" class="form-control rounded-3" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea name="description" id="description" class="form-control rounded-3" rows="3">{{ old('description', $book->description) }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('books.index') }}" class="btn btn-secondary rounded-3 px-4">Cancel</a>
                <button type="submit" class="btn btn-primary rounded-3 px-4">Update Book</button>
            </div>
        </form>
    </div>
</div>
@endsection
