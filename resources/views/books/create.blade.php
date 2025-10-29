@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Add New Book</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Total Copies</label>
            <input type="number" name="total_copies" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Available Copies</label>
            <input type="number" name="available_copies" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection
