document.addEventListener('DOMContentLoaded', function() {
  function handleScroll() {
    document.querySelectorAll('.contact-text-2').forEach(function(elem) {
      var rect = elem.getBoundingClientRect();
      if (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)) {
        elem.classList.add('active');
      }
    });
    document.querySelectorAll('.contact-text-1').forEach(function(elem) {
      var rect = elem.getBoundingClientRect();
      if (rect.top >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight)) {
        elem.classList.add('active');
      }
    });
  }
  
  window.addEventListener('scroll', handleScroll);
  handleScroll(); // Initial check on page load
});