<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    @include('home.homecss')

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
        .table_container {
            padding: 30px;
            color: lightgray;
            margin: auto;
        }
        .table_deg {
            width: 100%;
            border-collapse: collapse;
        }
        .table_deg th, .table_deg td {
            border: 1px solid white;
            padding: 10px;
            text-align: center;
        }
        .table_deg th {
            font-size: 20px;
            font-weight: bold;
        }
        .table_deg td {
            font-size: 16px;
        }
        .action_btns {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .relative {
            position: relative;
        }
        .overflow-x-auto {
            overflow-x: auto;
        }
        .shadow-md {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .sm\:rounded-lg {
            border-radius: 0.5rem;
        }
        .text-sm {
            font-size: 0.875rem;
        }
        .text-left {
            text-align: left;
        }
        .rtl\:text-right {
            direction: rtl;
            text-align: right;
        }
        .text-gray-500 {
            color: #6b7280;
        }
        .dark\:text-gray-400 {
            color: #9ca3af;
        }
        .bg-gray-50 {
            background-color: #f9fafb;
        }
        .dark\:bg-gray-700 {
            background-color: #374151;
        }
        .dark\:text-gray-400 {
            color: #9ca3af;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .dark\:bg-gray-800 {
            background-color: #1f2937;
        }
        .border-b {
            border-bottom-width: 1px;
        }
        .dark\:border-gray-700 {
            border-color: #374151;
        }
        .hover\:bg-gray-50:hover {
            background-color: #f9fafb;
        }
        .dark\:hover\:bg-gray-600:hover {
            background-color: #4b5563;
        }
        .font-medium {
            font-weight: 500;
        }
        .text-gray-900 {
            color: #111827;
        }
        .dark\:text-white {
            color: #ffffff;
        }
        .whitespace-nowrap {
            white-space: nowrap;
        }
        .text-right {
            text-align: right;
        }
        .text-blue-600 {
            color: #2563eb;
        }
        .dark\:text-blue-500 {
            color: #3b82f6;
        }
        .hover\:underline:hover {
            text-decoration: underline;
        }
        .description_column {
            padding: 10px; 
            max-width: 600px; 
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: justify;
        }
        .img_deg {
            width: 450px;
            height: 400px;
            object-fit: cover;
            padding: 50px;
        }
        .title_column {
            padding: 70px; 
        }
        /* CSS styles for the Back to Top button */
        #button {
            display: inline-block;
            background-color: #FF9800;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s, opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }
        #button::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
        }
        #button:hover {
            cursor: pointer;
            background-color: #333;
        }
        #button:active {
            background-color: #555;
        }
        #button.show {
            opacity: 1;
            visibility: visible;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }
        .search-input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 300px;
        }
    </style>
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div>
        @endif

        <div class="table_container">
            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" id="searchInput" class="search-input" placeholder="Search...." onkeyup="searchTable()">
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table id="postTable" class="text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 title_column">
                                {{$data->title}}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="img_deg" src="/postimage/{{$data->image}}" alt="{{$data->title}}">
                            </td>
                            <td class="px-6 py-4 description_column">
                                {{$data->description}}
                            </td>
                            <td class="px-6 py-4 text-right action_column">
                                <a href="#" onclick="confirmDelete('{{ url('my_post_del', $data->id) }}'); return false;" class="btn btn-danger">Delete</a>
                                <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2024 All Rights Reserved. Design by <a href="https://thanaal-portfolio.vercel.app/">MT.Thanaal Fowkhan</a></p>
        </div>
    </div>
    <!-- copyright section end -->

    <!-- Back to Top Button -->
    <div id="button"></div>

    <!-- SweetAlert Scripts -->
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }

        // Show button when scrolled down
        window.addEventListener('scroll', function() {
            const button = document.getElementById('button');
            if (window.scrollY > 300) {
                button.classList.add('show');
            } else {
                button.classList.remove('show');
            }
        });

        // Scroll to top on button click
        document.getElementById('button').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Function to filter table rows based on search input
        function searchTable() {
            var input = document.getElementById('searchInput');
            var filter = input.value.toLowerCase();
            var table = document.getElementById('postTable');
            var trs = table.getElementsByTagName('tr');

            for (var i = 1; i < trs.length; i++) {
                var tds = trs[i].getElementsByTagName('td');
                var found = false;

                for (var j = 0; j < tds.length; j++) {
                    if (tds[j].textContent.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }

                trs[i].style.display = found ? '' : 'none';
            }
        }
    </script>
</body>
</html>
