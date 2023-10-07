$(document).ready(function(){


    /* HEADER */ 

    $('header li.current-menu-parent>a.nav-link').append("<img src='http://univers-viager.test/wp-content/uploads/2023/10/icon-arrow.svg';>");

    $('li.current-menu-parent').on('click', function(e) {
        if ( $(this).children('ul.sub-menu').hasClass('open') ) {
            $(this).children('ul.sub-menu').removeClass('open');
        }
        $('li.current-menu-parent>ul.sub-menu').removeClass('open');
        $(this).children('ul.sub-menu').addClass('open');
        
       
    });

   $(document).click(function(e){
        if (!$('li.current-menu-parent').is(e.target)) {
            $('li.current-menu-parent>ul.sub-menu').removeClass('open'); 
        }
    });

    //FORM
    $('div.acf-input>select').find('option:first-child').prop('disabled', true);
    


    $('div.acf-input>select').on('change', function() {

        if ($(this).val() === '') {
            $(this).find('option:first-child').prop('disabled', true);
        } else {
            $(this).find('option:first-child').prop('disabled', false);
        }
    });


    //HOME ACTU
    $('#moreActu').on('click', function() {
        $('div.bloc2').fadeIn(200, function() {
            $(this).css("display", "flex");
        });
    });


    //FAQ
    $('div.accordion-item').on('click', function() {
        console.log('toto');
        if ($(this).hasClass('close')) {
            $('.accordion-item').addClass('close');
            $('.accordion-item').removeClass('open');

            $(this).addClass('open');
            $(this).removeClass('close');
        } 

    });
  
});




    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("custom-slider");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      
    }
    





