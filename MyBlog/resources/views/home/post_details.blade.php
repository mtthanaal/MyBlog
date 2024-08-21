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
            transition: background-color .3s, opacity .3s, visibility .3s;
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

        /* Button Styles */
        .review-actions button {
            border: none;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .reply-btn {
            background-color: #4CAF50; /* Green */
        }

        .reply-btn:hover {
            background-color: #45a049; /* Darker green */
            transform: scale(1.05);
        }

        .edit-btn {
            background-color: #2196F3; /* Blue */
        }

        .edit-btn:hover {
            background-color: #0b7dda; /* Darker blue */
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #f44336; /* Red */
        }

        .delete-btn:hover {
            background-color: #e53935; /* Darker red */
            transform: scale(1.05);
        }

        /* Additional Styles */
        .review-form {
            margin: 20px 0;
        }

        .review-display {
            margin-top: 20px;
        }

        .rating {
            display: inline-block;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            color: #FFD700;
            font-size: 1.5em;
            cursor: pointer;
        }

        .rating input[type="radio"]:checked ~ label {
            color: #FFD700;
        }

        .description_text {
            font-size: 16px;
            line-height: 2;
            padding: 20px;
        }

        .description_line {
            border-bottom: 2px solid #FF9800;
            margin: 10px 0;
        }

        .video_section iframe {
            max-width: 100%;
            height: 600px;
        }
        /* Submit Button Styles */
         .submit-btn {
            background-color: #4CAF50; /* Green */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            text-transform: uppercase;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
         }

         .submit-btn:hover {
            background-color: #45a049; /* Darker green */
            transform: scale(1.05);
         }

         .submit-btn:active {
            background-color: #388e3c; /* Even darker green */
            transform: scale(1.02);
         }
         .image-container {
            display: flex;
            justify-content: center; /* Centers the image horizontally */
            align-items: center; /* Centers the image vertically if container has a height */
            height: 100vh; /* Adjust as needed or set a specific height */
        }

        #postImage {
            max-width: 70%; /* Ensures image scales down within container */
            max-height: 70vh; /* Adjust the height as needed */
            padding: 10px;
            cursor: pointer;
        }
        .post-title {
            font-size: 2.5rem; /* Adjust size as needed */
            font-weight: bold;
            color: #333; /* Choose a color that fits your design */
            text-align: center; /* Center-aligns the title */
            margin: 20px 0; /* Adjusts the space above and below the title */
            line-height: 1.3; /* Adjusts the line height for better readability */
            font-family: 'Arial', sans-serif; /* Or use a different font-family if preferred */
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
    <h3 class="post-title">{{$post->title}}</h3>

        <div class="image-container">
            <img id="postImage" src="/postimage/{{$post->image}}" class="services_img">
        </div>

        <h4 class="description_text">{!!$post->description!!}</h4>
        <div class="description_line"></div>
        <p>Post by <b>{{$post->name}}</b></p>
    </div>

    <div class="video_section">
        <h4>Watch This Blog's Video:</h4>
        <iframe width="900" height="600" src="https://www.youtube.com/embed/q0mbKsKG-ng" title="Sri Lanka - Heart of the Indian Ocean" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
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

                        @if ($post->user_id == @auth()->user()->id)
                            <button class="reply-btn" data-review-id="{{ $review->id }}">Reply</button>
                            <button class="edit-btn" data-review-id="{{ $review->id }}">Edit</button>
                            <form action="{{ route('delete_review', $review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        @endif
                        </div>

                        <!-- Reply Form -->
                        <div class="reply-form" id="reply-form-{{ $review->id }}" style="display:none;">
                            <form action="{{ route('submit_reply') }}" method="POST">
                                @csrf
                                <input type="hidden" name="review_id" value="{{ $review->id }}">
                                <textarea name="reply" rows="2" placeholder="Your reply here..."></textarea>
                                <input type="submit" value="Submit Reply" class="submit-btn">
                            </form>
                        </div>

                        <!-- Edit Form -->
                        <div class="edit-form" id="edit-form-{{ $review->id }}" style="display:none;">
                            <form action="{{ route('update_review', $review->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="comment" rows="4">{{ $review->comment }}</textarea>
                                <input type="submit" value="Update Comment" class="submit-btn">
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
