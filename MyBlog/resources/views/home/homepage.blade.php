<!DOCTYPE html>
<html lang="en">

<head>

  <!-- basic -->
  @include('home.homecss')
  <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
  <!-- CSS for the page -->
  <link rel="stylesheet" href="\css\homepage.css">

</head>

<body>

  <!-- header section start -->
  <div class="header_section">
  @include('home.header')
  <!-- banner section start -->
  @include('home.banner')
  <!-- banner section end -->
  </div>
  <!-- header section end -->


  <!-- services section start -->
  @include('home.services')
  <!-- services section end -->

  <!-- about section start -->
  @include('home.about')
  <!-- about section end -->

  <!-- projects section start -->
  @include('home.projects')
  <!-- projects section end -->


  <!-- copyright section start -->
  <div class="copyright_section">
    <div class="container">
      <p class="copyright_text">2024 All Rights Reserved. Design by <a href="https://thanaal-portfolio.vercel.app/">MT.Thanaal Fowkhan</a></p>
    </div>
  </div>
  <!-- copyright section end -->

  <!-- Back to Top Button -->
  <div id="button"></div>

  <!-- Javascript files -->
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <!-- Back to Top Button Script -->
  <script src="\js\homepage.js"></script>

</body>
</html>
