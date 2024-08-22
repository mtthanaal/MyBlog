<!DOCTYPE html>
<html lang="en">
   
   <head>
      
      <!-- CSS for the page -->
      <link rel="stylesheet" href="\css\create_post.css">

      @include('home.homecss')
   </head>

   <body>
      @include('sweetalert::alert')

      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>

      <div class="div_deg">
         <h3 class="title_deg">Add Post</h3>

         <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="field_deg">
               <label>Title</label>
               <input type="text" name="title" required placeholder="Type your title..........✍️">
            </div>
            <div class="field_deg">
               <label>Description</label>
               <textarea name="description" id="description" required placeholder="Describe everything about this post here....................✍️"></textarea>
            </div>
            <div class="field_deg">
               <label>Add Image</label>
               <input type="file" name="image" required>
            </div>
            <div class="field_deg">
               <input type="submit" value="Submit" class="btn btn-secondary">
            </div>
         </form>
      </div>
       
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2024 All Rights Reserved. Design by <a href="https://thanaal-portfolio.vercel.app/">MT.Thanaal Fowkhan</a></p>
      </div>
      <!-- copyright section end -->

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 
      <!-- CKEditor -->
      <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
      <script src="\js\create_post.js"></script>
   </body>
</html>
