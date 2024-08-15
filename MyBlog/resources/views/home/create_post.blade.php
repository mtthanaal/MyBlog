<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <style type="text/css">
      body {
         background-color: #f0f2f5;
         font-family: Arial, sans-serif;
      }

      .div_deg {
         width: 50%;
         margin: 50px auto;
         background-color: #fff;
         padding: 40px;
         box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
         border-radius: 10px;
         text-align: center;
      }

      .title_deg {
         font-size: 32px;
         font-weight: bold;
         color: #333;
         padding-bottom: 20px;
         margin-bottom: 30px;
         border-bottom: 2px solid #ddd;
      }

      label {
         display: block;
         font-size: 18px;
         font-weight: bold;
         color: #555;
         margin-bottom: 10px;
         text-align: left;
      }

      .field_deg {
         margin-bottom: 25px;
      }

      .field_deg input[type="text"],
      .field_deg textarea,
      .field_deg input[type="file"] {
         width: 100%;
         padding: 10px;
         font-size: 16px;
         border: 1px solid #ccc;
         border-radius: 5px;
         box-sizing: border-box;
      }

      .field_deg input[type="submit"] {
         background-color: #28a745;
         color: white;
         padding: 10px 20px;
         font-size: 18px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      .field_deg input[type="submit"]:hover {
         background-color: #218838;
      }

      .container {
         text-align: center;
         padding-top: 20px;
      }

      .container a {
         color: #007bff;
         text-decoration: none;
      }

      .container a:hover {
         text-decoration: underline;
      }

      .copyright_section {
         background-color: #333;
         color: #ccc;
         padding: 10px 0;
         text-align: center;
         font-size: 14px;
      }

      .copyright_text a {
         color: #fff;
         text-decoration: none;
      }

      .copyright_text a:hover {
         text-decoration: underline;
      }
   </style>

   <!-- @include('home.homecss') -->
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
            <input type="text" name="title" required>
         </div>

         <div class="field_deg">
            <label>Description</label>
            <textarea name="description" id="description" required></textarea>
         </div>

         <div class="field_deg">
            <label>Add Image</label>
            <input type="file" name="image" required>
         </div>

         <div class="field_deg">
            <input type="submit" value="Add Post" class="btn btn-secondary">
         </div>
      </form>
   </div>

   <!-- @include('home.footer') -->
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
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="js/owl.carousel.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> 

   <!-- CKEditor 5 -->
   <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create(document.querySelector('#description'))
         .catch(error => {
            console.error(error);
         });
   </script>
</body>
</html>
