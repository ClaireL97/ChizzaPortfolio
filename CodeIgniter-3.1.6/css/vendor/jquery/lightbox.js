$(document).ready(function() {

  var slideIndex = 1;

  $(document).on('click', '.picture', function(e) {
    $("#myModal").show();
    var num = $(this).attr('data-number');
    showSlides(slideIndex = num);
  });

  $(document).on('click', '.demo', function(e) {
    var num = $(this).attr('data-number');
    showSlides(slideIndex = num);
  });

  $('.close').click(function(e) {
    $('#myModal').hide();
  });

  $(document).keyup(function(e) {
    if (e.which == 27) $("#myModal").hide();
  });


  $(".prev").click(function(e) {
    showSlides(slideIndex -= 1);
  });

  $(".next").click(function(e) {
    slideIndex++;
    showSlides(slideIndex);
  });

  function showSlides(n) {
    var i;
    var slides = $(".mySlides");
    var dots = $(".demo");
    var captionText = $("#caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      $(slides[i]).hide();
    }
    for (i = 0; i < dots.length; i++) {
      $(dots[i]).removeClass('active');
     // dots[i].className = dots[i].className.replace(" active", "");
    }
    $(slides[slideIndex-1]).show();
    // dots[slideIndex-1].className += " active";
    $(dots[slideIndex-1]).addClass('active');
	var title = $(dots[slideIndex-1]).attr('data-title');
	var caption = $(dots[slideIndex-1]).attr('data-caption');
    captionText.html("<i>" + title + "</i> - " + caption);
  }
});