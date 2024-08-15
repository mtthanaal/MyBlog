<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <h1 class="title_deg">All Users</h1>

        

<div style="position: relative; top: 60px; right: -150px">
    <table border="3px">
            <tr>
                <th style="padding: 30px">User Name</th>
                <th style="padding: 50px">Email</th>
                <th style="padding: 30px">Action</th>
            </tr>


            @foreach ($data as $data )
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>


                @if ($data->usertype=="user")
                <td><a href="{{url('/deleteuser',$data->id)}}">Delete</a></td>
                @else
                <td><a>Not Allow</a></td>
                @endif


            </tr>
            @endforeach
        
    </table>
</div>


        

      </div>
      @include('admin.footer')

      
  </body>
</html>
