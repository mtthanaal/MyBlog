<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Reviews</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    @vite('resources/css/app.css')
    <style>
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .alert {
            padding: 20px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
            position: relative;
        }
        .alert .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        /* Additional custom styles for table borders */
        .full-border-table {
            border-collapse: collapse;
            width: 100%;
        }
        .full-border-table th, .full-border-table td {
            border: 2px solid #ddd; /* Set border width and color */
            padding: 15px;
            text-align: left;
        }
        .full-border-table thead {
            background-color: #f9f9f9;
        }
        .full-border-table thead th {
            border-bottom: 2px solid #ddd;
            text-align: center;
        }
        .full-border-table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: none;
            z-index: 1000;
        }
    </style>
</head>
<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation -->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end -->

        <div class="page-content">
            @if(session('message'))
                <div class="alert">
                    {{ session('message') }}
                    <span class="close" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif

            <h1 class="text-2xl font-bold mb-6">Manage Reviews</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="full-border-table">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{ $review->user_name }}</td>
                                <td>{{ $review->rating }}</td>
                                <td>{{ $review->comment }}</td>
                                <td>{{ ucfirst($review->status) }}</td>
                                <td class="text-right">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.footer')

    <button class="back-to-top" onclick="scrollToTop()">Back to Top</button>

    <script type="text/javascript">
        function confirmApproval(ev) {
            ev.preventDefault();
            var form = ev.currentTarget;
            swal({
                title: "Are you sure you want to approve this review?",
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

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Show or hide the "Back to Top" button based on scroll position
        window.addEventListener('scroll', function() {
            var button = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        });
    </script>
</body>
</html>
