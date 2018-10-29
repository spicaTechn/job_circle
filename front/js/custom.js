jQuery(document).ready(function($) {
    $("select.form-control").niceSelect();

    $('#banner').owlCarousel({
        //loop:true,
        nav: true,
        items: 1,
        dots: false,
        autoplay: 2000,
        //transition:'linear',
        autoplayHoverPause: true,

        // responsive:{
        //     0:{
        //         items:1
        //     },
        //     600:{
        //         items:3
        //     },
        //     1000:{
        //         items:5
        //     }
        // }
    });

    $('#job-category-carousel').owlCarousel({
        //loop:true,
        nav: true,
        //items: 1,
        dots: false,
        autoplay: 2000,
        //transition:'linear',
        autoplayHoverPause: true,
        navText : ["<i class='icon-arrow-left-circle'></i>","<i class='icon-arrow-right-circle'></i>"],
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1200:{
                items:5
            },
            1300:{
                items:6
            }
        }
    });

    $('#testimonial').owlCarousel({
        loop:true,
        nav: false,
        center: true,
        items: 3,
        dots: true,
       // autoplay: 2000,
        //transition:'linear',
        autoplayHoverPause: true,

        // responsive:{
        //     0:{
        //         items:1
        //     },
        //     600:{
        //         items:3
        //     },
        //     1000:{
        //         items:5
        //     }
        // }
    });

    $('.testimonial-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1000,
        infinite: true,
        arrows: false,
        dots: true,
        centerMode: true,
        centerPadding: '0px',
        mobileFirst: true,
        cssEase: 'ease-out',

        responsive: [
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
          ]

    });


    //equal height
    equalheight = function(container) {

        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = new Array(),
            $el,
            topPosition = 0;
        $(container).each(function() {

            $el = $(this);
            $($el).height('auto')
            topPostion = $el.position().top;

            if (currentRowStart != topPostion) {
                for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                    rowDivs[currentDiv].height(currentTallest);
                }
                rowDivs.length = 0; // empty the array
                currentRowStart = topPostion;
                currentTallest = $el.height();
                rowDivs.push($el);
            } else {
                rowDivs.push($el);
                currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
        });
    }

    $(".category-section .icon-category").each(function() {
        var $container = $(this),
            imgUrl = $container.find("img").prop("src");
        if (imgUrl) {
            $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("icon-category-bg");
        }
    });

    $('#chooseFile').bind('change', function () {
      var filename = $("#chooseFile").val();
      if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen..."); 
      }
      else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
      }
    });

     $('[data-toggle="tooltip"]').tooltip()

    //on click show and hide
    //step 1
    $('#next-1').click(function(){
        $('#step-2').show();
        $('#step-1').hide();
    });

    //step 2
    $('#back-1').click(function(){
        $('#step-1').show();
        $('#step-2').hide();
    });

    //step3
    $('#next-3').click(function(){
        $('#step-3').show();
        $('#step-2').hide();
    });

     $('#back-1').click(function(){
        $('#step-1').show();
        $('#step-2').hide();
    });

     $('#back-2').click(function(){
        $('#step-2').show();
        $('#step-3').hide();
    });

      $('#next-4').click(function(){
        $('#step-4').show();
        $('#step-3').hide();
    });

    $('#back-3').click(function(){
        $('#step-3').show();
        $('#step-4').hide();
    });

    $('#next-5').click(function(){
        $('#step-5').show();
        $('#step-4').hide();
    });

    $('#back-4').click(function(){
        $('#step-4').show();
        $('#step-5').hide();
    });

    $('#next-6').click(function(){
        $('#step-6').show();
        $('#step-5').hide();
    });

    $('#back-5').click(function(){
        $('#step-5').show();
        $('#step-6').hide();
    });

    // donation-modal
        $(".approved-modal-btn").click(function() {
            $(".approved-modal").fadeIn();
        });

        $(".approved-modal .close").click(function() {
            $(".approved-modal").fadeOut();
        });

        //customization menu slide
        $('.navbar-toggler').click(function(){
            $('.navbar-collapse').toggleClass('slideIn');
            $('.navbar-toggler').toggleClass('open');
            $('.hide-navbar').addClass('show');
        });

         $('.hide-navbar').click(function(){
            $('.navbar-collapse').toggleClass('slideIn');
            $('.hide-navbar').removeClass('show');
        });

        



});



jQuery(window).load(function() {
    if ($(window).width() > 767) {
           
    equalheight('.same-height');
    }
});


jQuery(window).resize(function() {
    if ($(window).width() > 767) {
           
    equalheight('.same-height');
    }
});