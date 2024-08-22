function toggleDescription(event) {
    event.preventDefault();
    const link = event.currentTarget;
    const row = link.closest('tr');
    const preview = row.querySelector('.description-preview');
    const full = row.querySelector('.description-full');

    if (full.style.display === "none") {
      preview.style.display = "none";
      full.style.display = "block";
      link.textContent = "Read Less";
    } else {
      preview.style.display = "block";
      full.style.display = "none";
      link.textContent = "Read More";
    }
  }

  function confirmDelete(event, urlToRedirect) {
    event.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You won't be able to revert this action.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = urlToRedirect;
      }
    });
  }

  function confirmEdit(event, urlToRedirect) {
    event.preventDefault();
    // Handle edit confirmation if needed
    window.location.href = urlToRedirect;
  }

  function confirmAccept(event, urlToRedirect) {
    event.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You are about to accept this post.",
      icon: "info",
      buttons: true,
      dangerMode: false,
    })
    .then((willAccept) => {
      if (willAccept) {
        window.location.href = urlToRedirect;
      }
    });
  }

  function confirmReject(event, urlToRedirect) {
    event.preventDefault();
    swal({
      title: "Are you sure?",
      text: "You are about to reject this post.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willReject) => {
      if (willReject) {
        window.location.href = urlToRedirect;
      }
    });
  }

  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  window.addEventListener('scroll', function() {
    const button = document.querySelector('.back-to-top');
    button.style.display = window.scrollY > 300 ? 'block' : 'none';
  });

  function searchTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('postTable');
    const trs = table.getElementsByTagName('tr');

    Array.from(trs).slice(1).forEach(row => {
      const tds = row.getElementsByTagName('td');
      const found = Array.from(tds).some(td => td.textContent.toLowerCase().includes(filter));
      row.style.display = found ? '' : 'none';
    });
  }