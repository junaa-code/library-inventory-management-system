<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 📚 Library Inventory Management System

### 📘 Description / Overview

The **Library Inventory Management System** is a web-based application developed using **Laravel MVC framework**. It is designed to help librarians efficiently manage books, track transactions, and monitor inventory in real-time. This system simplifies library operations, reduces manual errors, and provides a user-friendly interface for library staff to maintain records of books, borrowers, and transactions.

---

## 📝 Objectives

- To create a simple and intuitive system for library management.
- To implement **CRUD (Create, Read, Update, Delete)** operations for books, members, and transactions using Laravel.
- To demonstrate relational database integration and data handling.
- To apply web development best practices for interface design and functionality.

---

## 🛠️ Features / Functionality

- Add, edit, and delete books, members, and transaction.
- Track book borrowing and returning transactions.
- Search and books.
- View on inventory and transactions.
- User-friendly interface with responsive design.

---

## 💻 Installation Instructions
1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/inventory-management-system.git
   ```
2. **Navigate to the project folder:**
   ```bash
   cd inventory-management-system
   ```
3. **Install dependencies(if using laravel):**
   ```bash
   composer install
   ```
4. **Run migrations to create database tables:**
   ```bash
   php artisan migrate
   ```
5. **Start your local server:**
   ```bash
   php artisan serve
   ```
6. **Open your browser and go to:**
    ```bash
    http://127.0.0.1:8000
    ```

---

## 💡 Usage

- Navigate to the Books, Members, or Transactions sections.
- Add new books, register members, or record borrow/return transactions.
- Search books for quick access.
- View inventory and transaction 

Example: Adding a New Book
```bash
Book::create([
    'title' => 'Noli Me Tángere',
    'author' => 'José Rizal',
    'isbn' => '9780060935467',
    'quantity' => 3
]);
```
---

## 🖼️ Screenshots or Code Snippets
Add New Member Form:
```bash
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
```

---

## 👩‍💻 Contributors
- Jonalyn Estipular
- Bachelor of Science in Information Technology

---

## ⚖️ License

This project is free to use for educational and personal purposes.
You may copy, modify, and share it as long as proper credit is given.
© 2025 Jonalyn Estipular — All rights reserved.
