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

    <!-- CSS for the page -->
    <link rel="stylesheet" href="\css\approved_comments.css">

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

            <h1 class="text-center text-white text-2xl font-bold mb-8">Reviews</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">User Name</th>
                            <th scope="col" class="px-6 py-3">Rating</th>
                            <th scope="col" class="px-6 py-3 comment-cell">Comment</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <td class="px-6 py-4">{{ $review->user_name }}</td>
                                <td class="px-6 py-4">{{ $review->rating }}</td>
                                <td class="px-6 py-4 comment-cell">{{ $review->comment }}</td>
                                <td class="px-6 py-4 ">{{ ucfirst($review->status) }}</td>
                                <td class="px-6 py-4 ">
                                <form action="{{ url('admin/review/'.$review->id.'/approve') }}" method="POST" style="display:inline-block; padding: 10px" onsubmit="return confirmApproval(event)">
                                    @csrf
                                    <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Approve</button>
                                </form>
                                <form action="{{ url('admin/review/'.$review->id.'/reject') }}" method="POST" style="display:inline-block;" onsubmit="return confirmRejection(event)">
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Reject</button>
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

    <!-- Java Scripts -->
    <script src="\js\approved_comments.js"></script>

</body>
</html>
