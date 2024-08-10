<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')

      <style type="text/css">
         
        .post_deg
        {
            padding: 30px;
            text-align: center;
            background-color:black ;
        }
        .title_deg
        {
            font-size: 30px;
            font-weight:bold ;
            padding: 15px;
            color: white;
        }
        .des_deg
        {
            font-size: 18px;
            font-weight:bold ;
            padding: 15px;
            color: whitesmoke;
        }
        .img_deg
        {
            height: 200px;
            width: 300px;
            padding: 30px;
            margin: auto;
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

         @foreach ( $data as $data )
         
         

         <div class="post_deg">
            <img class="img_deg" src="/postimage/{{$data->image}}">
            <h4 class="title_deg">{{$data->title}}</h4>
            <p class="des_deg">{{$data->description}}</p>

            <a onclick="return confirm('Are you sure to delete this?')" href="{{url('my_post_del',$data->id)}}" class="btn btn-danger">Delete</a>

            <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>




         </div>

         @endforeach

         

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