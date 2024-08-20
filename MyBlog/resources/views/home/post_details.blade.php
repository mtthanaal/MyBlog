<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Basic -->
      <base href="/public">
      @include('home.homecss')

      <style>
         /* CSS for Back to Top Button */
         #back-to-top {
            display: inline-block;
            background-color: #FF9800;
            width: 50px;
            height: 50px;
            text-align: center;
            border-radius: 50%;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s, opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
         }
         #back-to-top::after {
            content: "\f077";
            font-family: FontAwesome;
            font-weight: normal;
            font-style: normal;
            font-size: 2em;
            line-height: 50px;
            color: #fff;
         }
         #back-to-top:hover {
            cursor: pointer;
            background-color: #333;
         }
         #back-to-top:active {
            background-color: #555;
         }
         #back-to-top.show {
            opacity: 1;
            visibility: visible;
         }
      </style>
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
    @forelse ($reviews as $review)
        @if ($review->approved)
            <div class="review">
                <h5>{{ $review->user_name }}</h5>
                <div class="rating">
                    @for ($i = 0; $i < $review->rating; $i++)
                        ★
                    @endfor
                </div>
                <p>{{ $review->comment }}</p>
                <div class="review-actions">
                    <button class="reply-btn" data-review-id="{{ $review->id }}">Reply</button>
                    <button class="edit-btn" data-review-id="{{ $review->id }}">Edit</button>
                    <form action="{{ route('delete_review', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </div>

                <!-- Reply Form -->
                <div class="reply-form" id="reply-form-{{ $review->id }}" style="display:none;">
                    <form action="{{ route('submit_reply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <textarea name="reply" rows="2" placeholder="Your reply here..."></textarea>
                        <input type="submit" value="Submit Reply">
                    </form>
                </div>

                <!-- Edit Form -->
                <div class="edit-form" id="edit-form-{{ $review->id }}" style="display:none;">
                    <form action="{{ route('update_review', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="comment" rows="4">{{ $review->comment }}</textarea>
                        <input type="submit" value="Update Comment">
                    </form>
                </div>

                <!-- Display Replies -->
                <div class="replies">
                    @foreach ($review->replies as $reply)
                        <div class="reply">
                            <p>{{ $reply->reply }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @empty
        <p>No reviews yet.</p>
    @endforelse
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

      <!-- Back to Top Button -->
      <div id="back-to-top"></div>

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

      <!-- Custom JavaScript -->
      <script>
         document.getElementById('postImage').addEventListener('click', function () {
            this.classList.toggle('zoom-out');
         });

         // Toggle reply and edit forms
         document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
               const reviewId = this.getAttribute('data-review-id');
               document.getElementById('reply-form-' + reviewId).style.display = 'block';
               document.getElementById('edit-form-' + reviewId).style.display = 'none';
            });
         });

         document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
               const reviewId = this.getAttribute('data-review-id');
               document.getElementById('edit-form-' + reviewId).style.display = 'block';
               document.getElementById('reply-form-' + reviewId).style.display = 'none';
            });
         });

         // Show Back to Top button when scrolled down
         window.addEventListener('scroll', function() {
            const button = document.getElementById('back-to-top');
            if (window.scrollY > 300) {
               button.classList.add('show');
            } else {
               button.classList.remove('show');
            }
         });

         // Scroll to top on button click
         document.getElementById('back-to-top').addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
         });
      </script>
   </body>
</html>
