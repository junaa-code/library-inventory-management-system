<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title')->paginate(12);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'author'=>'nullable|string|max:255',
            'isbn'=>'nullable|string|max:100',
            'total_copies'=>'required|integer|min:1',
            'description'=>'nullable|string',
        ]);

        $data['available_copies'] = $data['total_copies'];
        Book::create($data);

        return redirect()->route('books.index')->with('success','Book added.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'author'=>'nullable|string|max:255',
            'isbn'=>'nullable|string|max:100',
            'total_copies'=>'required|integer|min:1',
            'description'=>'nullable|string',
        ]);

        // if total_copies decreased, adjust available_copies safely
        $diff = $data['total_copies'] - $book->total_copies;
        $book->fill($data);
        $book->available_copies = max(0, $book->available_copies + $diff);
        $book->save();

        return redirect()->route('books.index')->with('success','Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book deleted.');
    }
}
