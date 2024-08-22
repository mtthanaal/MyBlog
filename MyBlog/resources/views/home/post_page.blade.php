<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <base href="/public">

   @include('home.homecss')
   <!-- CSS for the page -->
   <link rel="stylesheet" href="\css\update_post_user.css">

</head>
<body>
   @include('sweetalert::alert')

   <!-- header section start -->
   <div class="header_section">
      @include('home.header')
   </div>

   <div class="div_deg">
      @if (session()->has('message'))
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
         {{session()->get('message')}}
      </div>
      @endif

      <h1 class="title_deg">Update Post</h1>

      <form action="{{url('update_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="field_deg">
            <label>Title</label>
            <input type="text" name="title" value="{{$data->title}}" required>
         </div>

         <div class="field_deg">
            <label>Description</label>
            <textarea name="description" id="description" required>{!!$data->description!!}</textarea>
         </div>

         <div class="field_deg">
            <label>Current Image</label>
            <img class="img_deg" src="/postimage/{{$data->image}}">
         </div>

         <div class="field_deg">
            <label>Change Current Image</label>
            <input type="file" name="image">
         </div>

         <div class="field_deg">
            <input type="submit" value="Update" class="btn btn-outline-secondary">
         </div>
      </form>
   </div>

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
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   <!-- CKEditor 5 -->
   <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
   <!-- Java Scripts -->
   <script src="\js\update_post_user.js"></script>

</body>
</html>
