document.addEventListener('DOMContentLoaded', function() {
  function handleScroll() {
    document.querySelectorAll('.contact-text-2, .contact-text-1').forEach(function(n) {
      var rect = n.getBoundingClientRect();
      if (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)) {
        n.classList.add('active');
      }
    });
  }
  
  window.addEventListener('scroll', handleScroll);
  handleScroll();
});