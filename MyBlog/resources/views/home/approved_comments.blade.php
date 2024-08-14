<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Reviews</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
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
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            <h1 class="title_deg">Manage Reviews</h1>
            <table class="table_deg">
                <tr class="th_deg">
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->user_name }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->comment }}</td>
                        <td>{{ ucfirst($review->status) }}</td>
                        <td>
                            <form action="{{ url('admin/review/'.$review->id.'/approve') }}" method="POST" style="display:inline-block;" onsubmit="return confirmApproval(event)">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ url('admin/review/'.$review->id.'/reject') }}" method="POST" style="display:inline-block;" onsubmit="return confirmRejection(event)">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    @include('admin.footer')

    <script type="text/javascript">
        function confirmApproval(ev) {
            ev.preventDefault();
            var form = ev.currentTarget;
            swal({
                title: "Are you sure you want to approve this review?",
                // text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willApprove) => {
                if (willApprove) {
                    form.submit();
                }
            });
            return false; // Prevent form submission until confirmation
        }

        function confirmRejection(ev) {
            ev.preventDefault();
            var form = ev.currentTarget;
            swal({
                title: "Are you sure you want to reject this review?",
                // text: "This action cannot be undone.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willReject) => {
                if (willReject) {
                    form.submit();
                }
            });
            return false; // Prevent form submission until confirmation
        }
    </script>
</body>
</html>
