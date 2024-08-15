<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    @include('home.homecss')

    <style type="text/css">
        .table_container {
            padding: 30px;
            /* background-color:#122c2d; */
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
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Title
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
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="img_deg" src="/postimage/{{$data->image}}" alt="{{$data->title}}">
                            </td>
                            <td class="px-6 py-4">
                                {{$data->title}}
                            </td>
                            <td class="px-6 py-4">
                                {{$data->description}}
                            </td>
                            <td class="px-6 py-4 text-right action_btns">
                                <a onclick="return confirm('Are you sure to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
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

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>
