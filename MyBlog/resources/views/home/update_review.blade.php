<form action="{{ route('update_review', $review->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Form fields here -->
    <input type="text" name="comment" value="{{ old('comment', $review->comment) }}">
    <button type="submit">Update Review</button>
</form>
