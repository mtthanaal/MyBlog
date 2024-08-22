<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Reviews</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Manage Reviews</h1>

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->user_name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>
                            <form action="{{ url('admin/review/'.$review->id.'/approve') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ url('admin/review/'.$review->id.'/reject') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
