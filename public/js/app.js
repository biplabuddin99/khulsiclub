$(window).scroll(function() {    
  var scroll = $(window).scrollTop();
    if (window.scrollY > 100 && !$(".scicon").hasClass('d-md-none')) {
      $("header").addClass('sticky-top');
      $(".scicon").addClass('d-md-none');
      $(".small-view").addClass('small-view-nav');
      $('.logo-sec').addClass('shrink');
	} else if (window.scrollY < 100) {
      $("header").removeClass('sticky-top');
      $(".scicon").removeClass('d-md-none');
      $(".small-view").removeClass('small-view-nav');
      $('.logo-sec').removeClass('shrink');
	}
  
});

// Member profile jQuery start
$(document).ready(function() {

  $('.next-step').click(function() {
      var currentTab = $(this).closest('.tab-pane').attr('id');
      var nextTab = $(this).closest('.tab-pane').next().attr('id');

      $('#' + currentTab).removeClass('show active');
      $('#' + currentTab + '-tab').removeClass('active');
      $('#' + nextTab).addClass('show active');
      $('#' + nextTab + '-tab').addClass('active');
  });

  $('.prev-step').click(function() {
      var currentTab = $(this).closest('.tab-pane').attr('id');
      var prevTab = $(this).closest('.tab-pane').prev().attr('id');

      $('#' + currentTab).removeClass('show active');
      $('#' + currentTab + '-tab').removeClass('active');
      $('#' + prevTab).addClass('show active');
      $('#' + prevTab + '-tab').addClass('active');
  });

  $('.nav-item a').click(function(e) {
    var currentTab = $(this).attr('href');
    var prevTab = $('.tab-content .tab-pane.show').attr('id');
    
    $('#' + prevTab).removeClass('show active');
    $('#' + prevTab + '-tab').removeClass('active');
    $(currentTab).addClass('show active');
    $(currentTab + '-tab').addClass('active');
    e.preventDefault();
  });

});

document.addEventListener("DOMContentLoaded", function() {

  $(".mobile-menu .nav-item.dropdown").each(function(dropdownItem) {
    $(this).click(function(event) {
      event.preventDefault();
      if($(this).hasClass('open-dropdown')){
        $(this).removeClass('open-dropdown')
        $(this).find('.dropdown-menu').hide('slow')
      }else{
        $(this).addClass('open-dropdown');
        $(this).find('.dropdown-menu').show('slow')
      }
    });
  });
});
// document.addEventListener("DOMContentLoaded", function() {
//   const dropdownItems = ;
//   let openDropdown = null;

//   $(".mobile-menu .nav-item.dropdown").each(function(dropdownItem) {
//     const dropdownMenu = $(this).find(".dropdown-menu");

//     dropdownItem.addEventListener("click", function(event) {
//       event.preventDefault();

//       if (openDropdown !== dropdownMenu) {
//         if (openDropdown) {
//           openDropdown.style.display = "none";
//         }
//         dropdownMenu.style.display = "block";
//         openDropdown = dropdownMenu;
//       } else {
//         dropdownMenu.style.display = (dropdownMenu.style.display === "block") ? "none" : "block";
//         openDropdown = dropdownMenu.style.display === "block" ? dropdownMenu : null;
//       }
//     });
//   });
// });

//Member profile jQuery end

var activeurl = window.location;
$('a[href="'+activeurl+'"]').addClass('active');
$('a[href="'+activeurl+'"]').closest('li').addClass('activeLi');
