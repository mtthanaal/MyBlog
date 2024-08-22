<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('admin.css')
  @vite('resources/css/app.css')
  <style>
    .table-padding td,
    .table-padding th {
      padding: 10px;
    }
    .read-more {
      color: #007bff; 
      cursor: pointer;
      text-decoration: underline;
    }
    .img-thumbnail {
      width: 300px; 
      height: 150px; 
      object-fit: cover; 
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
    .description-cell {
      max-width: 250px; /* Adjust the max width as needed */
      overflow: hidden;
      position: relative;
    }
    .description-preview {
      display: block;
      max-height: 60px; /* Adjust the height as needed */
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: normal;
      margin-bottom: 5px;
      text-align: justify; /* Justify the text */
    }
    .description-full {
      display: none;
      white-space: normal;
      text-align: justify; /* Justify the text */
    }
    .description-cell .read-more {
      display: block;
      margin-top: 5px;
    }
  </style>
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

      <h1 class="title_deg">All Posts</h1>

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

  <script type="text/javascript">
    function toggleDescription(event) {
      event.preventDefault();
      const link = event.currentTarget;
      const row = link.closest('tr');
      const preview = row.querySelector('.description-preview');
      const full = row.querySelector('.description-full');

      if (full.style.display === "none") {
        preview.style.display = "none";
        full.style.display = "block";
        link.textContent = "Read Less";
      } else {
        preview.style.display = "block";
        full.style.display = "none";
        link.textContent = "Read More";
      }
    }

    function confirmDelete(event, urlToRedirect) {
      event.preventDefault();
      swal({
        title: "Are you sure?",
        text: "You won't be able to revert this action.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = urlToRedirect;
        }
      });
    }

    function confirmEdit(event, urlToRedirect) {
      event.preventDefault();
      // Handle edit confirmation if needed
      window.location.href = urlToRedirect;
    }

    function confirmAccept(event, urlToRedirect) {
      event.preventDefault();
      swal({
        title: "Are you sure?",
        text: "You are about to accept this post.",
        icon: "info",
        buttons: true,
        dangerMode: false,
      })
      .then((willAccept) => {
        if (willAccept) {
          window.location.href = urlToRedirect;
        }
      });
    }

    function confirmReject(event, urlToRedirect) {
      event.preventDefault();
      swal({
        title: "Are you sure?",
        text: "You are about to reject this post.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willReject) => {
        if (willReject) {
          window.location.href = urlToRedirect;
        }
      });
    }

    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    window.addEventListener('scroll', function() {
      const button = document.querySelector('.back-to-top');
      button.style.display = window.scrollY > 300 ? 'block' : 'none';
    });

    function searchTable() {
      const input = document.getElementById('searchInput');
      const filter = input.value.toLowerCase();
      const table = document.getElementById('postTable');
      const trs = table.getElementsByTagName('tr');

      Array.from(trs).slice(1).forEach(row => {
        const tds = row.getElementsByTagName('td');
        const found = Array.from(tds).some(td => td.textContent.toLowerCase().includes(filter));
        row.style.display = found ? '' : 'none';
      });
    }
  </script>
</body>
</html>
