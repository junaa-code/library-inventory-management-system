<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Inventory System</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .sidebar {
            background-color: rgba(230, 220, 200, 0.95);
            width: 260px;
            min-height: 100vh;
            padding: 30px 20px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .sidebar img {
            width: 100px;
            display: block;
            margin: 0 auto 10px;
        }

        .sidebar h5 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .sidebar .btn {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 10px;
            font-weight: 500;
            background-color: white;
            border: 1px solid #b4a89f;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            margin: 40px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        label {
            font-weight: 600;
        }

        .btn-submit {
            background-color: #c8b8a5;
            color: #222;
            border: none;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: #b7a58f;
        }

        table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background-color: #c8b8a5 !important;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar">
        <h5>Library Inventory System</h5>
        <a href="{{ route('books.index') }}" class="btn">Books</a>
        <a href="{{ route('borrowers.index') }}" class="btn">Borrowers</a>
        <a href="{{ route('transactions.index') }}" class="btn">Transactions</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
