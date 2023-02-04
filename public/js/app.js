$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll > 200) {
    $(".scicon").addClass('d-sm-none');
    $('.logo-sec').addClass('shrink');
  } else {
    $(".scicon").removeClass('d-sm-none');
    $('.logo-sec').removeClass('shrink');
  }
});

jQuery(document).ready(function(){
  $(".dropdown").hover(
      function() { $('.dropdown-menu', this).fadeIn("fast");
      },
      function() { $('.dropdown-menu', this).fadeOut("fast");
  });
});