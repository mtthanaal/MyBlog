<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic -->
      <base href="/public">
      @include('home.homecss')
   </head>

   <body>
      <!-- Header section start -->
      <div class="header_section">
         @include('home.header')
      </div>

      <!-- Post Details section -->
      <div style="text-align: center;" class="col-md-12">
         <h3><b>{{$post->title}}</b></h3>
         <div>
            <img id="postImage" style="padding: 20px; cursor: pointer;" src="/postimage/{{$post->image}}" class="services_img">
         </div>
        
         <h4 class="description_text">{{$post->description}}</h4>
         <div class="description_line"></div>
         <p>Post by <b>{{$post->name}}</b></p>
      </div>

      <div class="video_section">
         <h4>Watch This Blog's Video:</h4>
         <iframe width="853" height="480" src="https://www.youtube.com/embed/q0mbKsKG-ng" title="Sri Lanka - Heart of the Indian Ocean" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>

      <!-- Review section -->
      <div class="review-section">
         <h4>Leave a Review</h4>
         <form action="{{route('submit_review')}}" method="POST" class="review-form">
            @csrf
            <div class="rating">
               <input type="radio" name="rating" value="5" id="5" required>
               <label for="5">★</label>
               <input type="radio" name="rating" value="4" id="4">
               <label for="4">★</label>
               <input type="radio" name="rating" value="3" id="3">
               <label for="3">★</label>
               <input type="radio" name="rating" value="2" id="2">
               <label for="2">★</label>
               <input type="radio" name="rating" value="1" id="1">
               <label for="1">★</label>
            </div>
            <div>
               <label for="comment">Comment:</label>
               <textarea name="comment" id="comment" rows="4" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="submit" value="Submit Review">
         </form>

         <div class="review-display">
            <h4>Reviews:</h4>
            @foreach ($reviews as $review)
               <div class="review">
                  <h5>{{ $review->user_name }}</h5>
                  <div class="rating">
                        @for ($i = 0; $i < $review->rating; $i++)
                        ★
                        @endfor
                  </div>
                  <p>{{ $review->comment }}</p>
               </div>
            @endforeach
         </div>

      </div>

      <!-- Footer section start -->
      @include('home.footer')
      <!-- Footer section end -->

      <!-- Copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">2024 All Rights Reserved. Design by <a href="https://thanaal-portfolio.vercel.app/">MT.Thanaal Fowkhan</a></p>
         </div>
      </div>
      <!-- Copyright section end -->

      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- Sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- Javascript -->
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

      <!-- Custom JavaScript for Zoom Out Effect -->
      <script>
         document.getElementById('postImage').addEventListener('click', function () {
            this.classList.toggle('zoom-out');
         });
      </script>
   </body>
</html>
