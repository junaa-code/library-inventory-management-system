<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::orderBy('name')->paginate(12);
        return view('borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        return view('borrowers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'nullable|email|unique:borrowers,email',
            'phone'=>'nullable|string|max:50',
            'student_id'=>'nullable|string|max:100',
        ]);
        Borrower::create($data);
        return redirect()->route('borrowers.index')->with('success','Borrower registered.');
    }

    public function show(Borrower $borrower)
    {
        return view('borrowers.show', compact('borrower'));
    }

    public function edit(Borrower $borrower)
    {
        return view('borrowers.edit', compact('borrower'));
    }

    public function update(Request $request, Borrower $borrower)
    {
        $data = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'nullable|email|unique:borrowers,email,'.$borrower->id,
            'phone'=>'nullable|string|max:50',
            'student_id'=>'nullable|string|max:100',
        ]);
        $borrower->update($data);
        return redirect()->route('borrowers.index')->with('success','Borrower updated.');
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();
        return redirect()->route('borrowers.index')->with('success','Borrower deleted.');
    }
}
