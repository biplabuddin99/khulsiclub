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
//Member profile jQuery end

var activeurl = window.location;
$('a[href="'+activeurl+'"]').addClass('active');