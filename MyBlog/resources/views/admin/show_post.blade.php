<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('admin.css')
  @vite('resources/css/app.css')
  
  <!-- CSS for the page -->
  <link rel="stylesheet" href="\css\show_post.css">

</head>
<body>
  @include('admin.header')

  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')
    
    <div class="page-content">
      @if (session()->has('message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
      </div>
      @endif

      <h1 class="title_deg">Posts</h1>

      <!-- Search Bar -->
      <div class="search-bar">
        <input type="text" id="searchInput" class="search-input" placeholder="Search...." onkeyup="searchTable()">
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table border="3" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-black-400 table-padding" id="postTable">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-2 py-3">Post Title</th>
              <th scope="col" class="px-6 py-3">Post Description</th>
              <th scope="col" class="px-6 py-3">Post By</th>
              <th scope="col" class="px-6 py-3">Post Status</th>
              <th scope="col" class="px-6 py-3">User Type</th>
              <th scope="col" class="px-6 py-3">Image</th>
              <th scope="col" class="px-6 py-3"></th>
              <th scope="col" class="px-6 py-3"></th>
              <th scope="col" class="px-6 py-3">Actions</th>
              <th scope="col" class="px-6 py-3"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black">
                {{$post->title}}
              </td>
              <td class="px-6 py-4 description-cell">
                <span class="description-preview">{!! Str::limit(strip_tags($post->description), 100) !!}</span>
                <span class="description-full">{!! $post->description !!}</span>
                <a href="#" class="read-more" onclick="toggleDescription(event)">Read More</a>
              </td>
              <td class="px-6 py-4">{{$post->name}}</td>
              <td class="px-6 py-4">{{$post->post_status}}</td>
              <td class="px-6 py-4">{{$post->usertype}}</td>
              <td class="px-6 py-4">
                <img class="img-thumbnail" src="postimage/{{$post->image}}">
              </td>
              <td class="px-6 py-4 text-center">
                <a href="#" class="btn btn-danger" onclick="confirmDelete(event, '{{ url('delete_post', $post->id) }}')">Delete</a>
              </td>
              <td class="px-6 py-4 text-center">
                <a href="#" class="btn btn-info" onclick="confirmEdit(event, '{{ url('edit_page', $post->id) }}')">Edit</a>
              </td>
              <td class="px-6 py-4 text-center">
                <a href="#" class="btn btn-success" onclick="confirmAccept(event, '{{ url('accept_post', $post->id) }}')">Accept</a>
              </td>
              <td class="px-6 py-4 text-center">
                <a href="#" class="btn btn-info" onclick="confirmReject(event, '{{ url('reject_post', $post->id) }}')">Reject</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    @include('admin.footer')
    <button class="back-to-top" onclick="scrollToTop()">Back to Top</button>
  </div>

 <!-- Java Scripts -->
 <script src="\js\show_post.js"></script>

</body>
</html>
