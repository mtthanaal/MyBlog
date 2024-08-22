<!DOCTYPE html>
<html lang="en">
<head>

    <!-- basic -->
    @include('home.homecss')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS for the page -->
    <link rel="stylesheet" href="/css/my_post.css">

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


            @if($data->isEmpty())
                <p class="text-center text-gray-600 dark:text-gray-400">No posts available. Please <a href="{{ url('create_post') }}" class="text-blue-600 dark:text-blue-500 hover:underline">add a post</a> to show in the table.</p>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table id="postTable" class="table_deg w-full text-gray-500 dark:text-gray-400">
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
                            @foreach ($data as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 title_column">
                                    {{$item->title}}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="img_deg" src="/postimage/{{$item->image}}" alt="{{$item->title}}">
                                </td>
                                <td class="px-6 py-4 description_column">
                                    <span id="description_{{$item->id}}" class="description-text">{{ Str::limit(strip_tags($item->description), 150) }}</span>
                                    <a href="{{ url('post_details', $item->id) }}" class="read-more-link">Read More</a>
                                </td>
                                <td class="px-6 py-4 text-right action_column">
                                    <a href="#" onclick="confirmDelete('{{ url('my_post_del', $item->id) }}'); return false;" class="btn btn-danger">Delete</a>
                                    <a href="{{url('post_update_page',$item->id)}}" class="btn btn-primary">Update</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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


    <!-- Java Scripts -->
    <script src="\js\my_post.js"></script>
    
</body>
</html>
