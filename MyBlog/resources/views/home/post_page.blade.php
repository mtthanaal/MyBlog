<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->

      <base href="/public">




      @include('home.homecss')

      <style type="text/css">

         .div_deg
         {
            text-align: center;
            background-color: black;
         }

         .img_deg
         {
            height: 150px; 
            width: 250px;
            margin: auto;
         }

         label
         {
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: white;

         }

         .input_deg
         {
            padding: 30px;
         }

         .title_deg
         {
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
            color: white;
         }


      </style>



   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

         <div class="div_deg">
         @if (session()->has('message'))

         <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

            {{session()->get('message')}}


         </div>

         @endif



            <h1 class="title_deg">Update Post</h1>

            <form action="{{url('update_post_data',$data->id)}}" method="POST" enctype="multipart/form-data">


               @csrf

               <div class="input_deg">
                  <label>Title</label>
                  <input type="text" name="title" value="{{$data->title}}">
               </div>

               <div class="input_deg">
                  <label>Description</label>
                  <textarea name="description">{{$data->description}}</textarea>
               </div>

               <div class="input_deg">
                  <label>Current Image</label>
                  <img class="img_deg"  src="/postimage/{{$data->image}}">
               </div>

               <div class="input_deg">
                  <label>Change Current Image</label>
                  <input type="file" name="image">
               </div>

               <div class="input_deg">
                  
                  <input type="submit" class="btn btn-outline-secondary" value="Update">
               </div>



            </form>


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