<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
      @include('home.homecss')

      <style>
         .review-section {
            width: 80%;
            margin: 50px auto;
            text-align: left;
         }

         .review-form {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
         }

         .review-form label {
            font-size: 16px;
            font-weight: bold;
         }

         .review-form input[type="text"],
         .review-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
         }

         .review-form .rating {
            display: flex;
            gap: 5px;
            margin-bottom: 15px;
         }

         .review-form .rating input {
            display: none;
         }

         .review-form .rating label {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
         }

         .review-form .rating input:checked ~ label {
            color: #f39c12;
         }

         .review-form input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
         }

         .review-form input[type="submit"]:hover {
            background-color: #218838;
         }

         .review-display {
            margin-top: 40px;
         }

         .review-display .review {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
         }

         .review-display .review:last-child {
            border-bottom: none;
         }

         .review-display .review h5 {
            margin-bottom: 5px;
            font-weight: bold;
         }

         .review-display .review .rating {
            color: #f39c12;
            margin-bottom: 10px;
         }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>

      <div style="text-align: center;" class="col-md-12">
         <div><img style="padding: 20px;" src="/postimage/{{$post->image}}" class="services_img"></div>
         <h3><b>{{$post->title}}</b></h3>
         <h4>{{$post->description}}</h4>
         <p>Post by <b>{{$post->name}}</b> </p>
      </div>

      <div class="review-section">
         <h4>Leave a Review</h4>
         <form action="{{url('submit_review')}}" method="POST" class="review-form">
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
            <input type="submit" value="Submit Review">
         </form>

         <div class="review-display">
            <h4>Reviews:</h4>
            @foreach ($reviews as $review)
            <div class="review">
               <h5>{{$review->user_name}}</h5>
               <div class="rating">
                  @for ($i = 0; $i < $review->rating; $i++)
                  ★
                  @endfor
               </div>
               <p>{{$review->comment}}</p>
            </div>
            @endforeach
         </div>
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
