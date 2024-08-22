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