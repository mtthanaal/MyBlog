<!DOCTYPE html>
<html lang="en">
<head>
  <!-- basic -->
  @include('home.homecss')
  <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>
  <style>
    /* CSS styles for the Back to Top button */
    #button {
      display: inline-block;
      background-color: #FF9800;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s, opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }
    #button::after {
      content: "\f077";
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      font-size: 2em;
      line-height: 50px;
      color: #fff;
    }
    #button:hover {
      cursor: pointer;
      background-color: #333;
    }
    #button:active {
      background-color: #555;
    }
    #button.show {
      opacity: 1;
      visibility: visible;
    }

    /* Styles for the content section */
    .content {
      width: 77%;
      margin: 50px auto;
      font-family: 'Merriweather', serif;
      font-size: 17px;
      color: #6c767a;
      line-height: 1.9;
    }
    @media (min-width: 500px) {
      .content {
        width: 43%;
      }
      #button {
        margin: 30px;
      }
    }
    .content h1 {
      margin-bottom: -10px;
      color: #03a9f4;
      line-height: 1.5;
    }
    .content h3 {
      font-style: italic;
      color: #96a2a7;
    }
  </style>
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

  <!-- blog section start -->
  <!-- @include('home.blogvideos') -->
  <!-- blog section end -->

  <!-- projects section start -->
  @include('home.projects')
  <!-- projects section end -->

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
  <script>
    // Show button when scrolled down
    window.addEventListener('scroll', function() {
      const button = document.getElementById('button');
      if (window.scrollY > 300) {
        button.classList.add('show');
      } else {
        button.classList.remove('show');
      }
    });

    // Scroll to top on button click
    document.getElementById('button').addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  </script>
</body>
</html>
