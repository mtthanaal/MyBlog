<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  @vite('resources/css/app.css')
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  @include('admin.header')

  <div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content container mt-full">
      <h1 class="text-center text-white text-2xl font-bold mb-8">All Users</h1>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">User Name</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3 text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $user)
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4 text-center">
                  @if ($user->usertype == "user")
                    <button class="btn btn-danger" onclick="confirmDelete('{{ url('/deleteuser', $user->id) }}')">Delete</button>
                    <button class="btn btn-info" onclick="window.location.href='{{ url('/editUser', $user->id) }}'">Edit</button>
                  @else
                    Not Allowed
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    @include('admin.footer')
  </div>

  <script>
    // Confirm Delete Function
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
  </script>
</body>
</html>
