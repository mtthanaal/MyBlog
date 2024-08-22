function confirmApproval(ev) {
    ev.preventDefault();
    var form = ev.currentTarget;
    swal({
        title: "Are you sure you want to approve this review?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willApprove) => {
        if (willApprove) {
            form.submit();
        }
    });
    return false; // Prevent form submission until confirmation
}

function confirmRejection(ev) {
    ev.preventDefault();
    var form = ev.currentTarget;
    swal({
        title: "Are you sure you want to reject this review?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willReject) => {
        if (willReject) {
            form.submit();
        }
    });
    return false; // Prevent form submission until confirmation
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Show or hide the "Back to Top" button based on scroll position
window.addEventListener('scroll', function() {
    var button = document.querySelector('.back-to-top');
    if (window.scrollY > 300) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
});