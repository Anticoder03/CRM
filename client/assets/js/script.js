// scripts.js
$(document).ready(function() {
    // Show the scroll-to-top button on scroll
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.scroll-to-top').fadeIn();
      } else {
        $('.scroll-to-top').fadeOut();
      }
    });
  
    // Scroll to top on click
    $('.scroll-to-top').click(function() {
      $('html, body').animate({ scrollTop: 0 }, 'slow');
      return false;
    });
  });
  