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