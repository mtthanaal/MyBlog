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
    .img_deg {
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
  </style>
</head>
<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      @if (session()->has('message'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
      </div>
      @endif

      <h1 class="title_deg">All Post</h1>

      <!-- Search Bar -->
      <div class="search-bar">
        <input type="text" id="searchInput" class="search-input" placeholder="Search...." onkeyup="searchTable()">
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table border="3px" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-black-400 table-padding" id="postTable">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-2 py-3" style="width: 7%;text-align: justify;">Post Title</th>
              <th scope="col" class="px-6 py-3" style="width: 20%;text-align: justify;">Post Description</th>
              <th scope="col" class="px-6 py-3" style="width: 8%;text-align: center;">Post By</th>
              <th scope="col" class="px-6 py-3" style="width: 10%;text-align: center;">Post Status</th>
              <th scope="col" class="px-6 py-3" style="width: 8%;text-align: center;">User Type</th>
              <th scope="col" class="px-6 py-3" style="width: 10%;text-align: center;">Image</th>
              <th scope="col" class="px-6 py-3" style="width: 7%;text-align: right;"></th>
              <th scope="col" class="px-6 py-3" style="width: 7%;text-align: center;"></th>
              <th scope="col" class="px-6 py-3" style="width: 7%;text-align: center;">Actions</th>
              <th scope="col" class="px-6 py-3" style="width: 7%;text-align: center;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post as $post)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="px-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-black" style="width: 2px">
                {{$post->title}}
              </td>
              <td class="px-6 py-4 description-cell" style="width: 20%; text-align: justify;">
                <span class="description-preview">{{ Str::limit($post->description, 100) }}</span>
                <span class="description-full" style="display:none;">{{$post->description}}</span>
                <a href="#" class="read-more" onclick="toggleDescription(event)">Read More</a>
              </td>
              <td class="px-6 py-4" style="width: 8%;text-align: center;">{{$post->name}}</td>
              <td class="px-6 py-4" style="width: 10%;text-align: center;">{{$post->post_status}}</td>
              <td class="px-6 py-4" style="width: 8%; text-align: center;">{{$post->usertype}}</td>
              <td class="px-6 py-4">
                <img class="img_deg" src="postimage/{{$post->image}}">
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a href="{{url('edit_page',$post->id)}}" class="btn btn-info">Edit</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a onclick="return confirm('Are you sure to accept this post ?')" href="{{url('accept_post',$post->id)}}" class="btn btn-success">Accept</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a onclick="return confirm('Are you sure to reject this post ?')" href="{{url('reject_post',$post->id)}}" class="btn btn-info">Reject</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
    @include('admin.footer')

    <button class="back-to-top" onclick="scrollToTop()">Back to Top</button>

    <script type="text/javascript">
      function toggleDescription(event) {
        event.preventDefault();
        var link = event.currentTarget;
        var row = link.closest('tr');
        var preview = row.querySelector('.description-preview');
        var full = row.querySelector('.description-full');

        if (full.style.display === "none") {
          preview.style.display = "none";
          full.style.display = "inline";
          link.textContent = "Read Less";
        } else {
          preview.style.display = "inline";
          full.style.display = "none";
          link.textContent = "Read More";
        }
      }

      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);

        swal({
          title: "Are you sure to delete this ",
          text: "You won't be able to revert this delete",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willCancel) => {
          if (willCancel) {
            window.location.href = urlToRedirect;
          }
        });
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
