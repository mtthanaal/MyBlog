<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')

      <style type="text/css">
         .table_container {
            padding: 30px;
            background-color: ;
            color: white;
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
            <table class="table_deg">
               <thead>
                  <tr>
                     <th>Image</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ( $data as $data )
                  <tr>
                     <td><img class="img_deg" src="/postimage/{{$data->image}}" alt="{{$data->title}}"></td>
                     <td>{{$data->title}}</td>
                     <td>{{$data->description}}</td>
                     <td class="action_btns">
                        <a onclick="return confirm('Are you sure to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>

      <!-- footer section start -->
      @include('home.footer')
      <!-- footer section end -->

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
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>
