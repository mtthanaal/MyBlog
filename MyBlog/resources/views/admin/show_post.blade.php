<!DOCTYPE html>
<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @include('admin.css')
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

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table border="3px" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-padding">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3" style="width: 10%;text-align: justify;">Post Title</th>
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
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$post->title}}
              </th>
              <td class="px-6 py-4 description-cell" style="width: 20%; text-align: justify;">
                <span class="description-preview">{{ Str::limit($post->description, 100) }}</span>
                <span class="description-full" style="display:none;">{{$post->description}}</span>
                <a href="#" class="read-more" onclick="toggleDescription(event)">Read More</a>
              </td>
              <td class="px-6 py-4" style="width: 8%;text-align: center;">{{$post->name}}</td>
              <td class="px-6 py-4" style="width: 10%;text-align: center;">{{$post->post_status}}</td>
              <td class="px-6 py-4" style="width: 8%; text-align: center;">{{$post->usertype}}</td>
              <td>
                <img class="img_deg" src="postimage/{{$post->image}}">
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a href="{{url('delete_post',$post->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmation(event)">Delete</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a href="{{url('edit_page',$post->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a onclick="return confirm('Are you sure to accept this post ?')" href="{{url('accept_post',$post->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept</a>
              </td>
              <td class="px-6 py-4 text-center" style="width: 7%;">
                <a onclick="return confirm('Are you sure to reject this post ?')" href="{{url('reject_post',$post->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reject</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
    @include('admin.footer')

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
    </script>
  </body>
</html>
