<!DOCTYPE html>
<html>
<head>
  @include('admin.css')
  <style>
      .container {
          margin-top: 50px;
      }
      h1 {
          text-align: center;
          margin-bottom: 30px;
      }
      .table {
          width: 100%;
          margin-bottom: 20px;
          border-collapse: collapse;
          border: 2px solid #ddd; 
      }
      .table th, .table td {
          padding: 15px;
          text-align: left;
          border-bottom: 1px solid #ddd;
      }
      .table th {
          border-top: 2px solid #ddd; 
          border-left: 1px solid #ddd; 
          border-right: 1px solid #ddd;
      }
      .table th:not(:last-child) {
          border-right: 2px solid #ddd; 
      }
      .table td {
          border-right: 1px solid #ddd; 
      }
      .table td:last-child {
          border-right: none; 
      }
      .btn {
          padding: 10px 20px;
          border: none;
          color: white;
          cursor: pointer;
      }
      .btn-danger {
          background-color: #dc3545;
      }
  </style>
  <!-- SweetAlert2 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  @include('admin.header')
  <div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content container">
      <h1 class="title_deg">All Users</h1>
      <table class="table">
        <thead>
          <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $user)
            <tr align="center">
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @if ($user->usertype == "user")
                <td>
                  <button class="btn btn-danger" onclick="confirmDelete('{{ url('/deleteuser', $user->id) }}')">Delete</button>
                </td>
              @else
                <td>Not Allow</td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @include('admin.footer')
  </div>
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
  </script>
</body>
</html>
