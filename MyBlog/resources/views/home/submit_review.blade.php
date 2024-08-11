@if(isset($reviews) && $reviews->isNotEmpty())
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
@else
    <p>No reviews yet.</p>
@endif
