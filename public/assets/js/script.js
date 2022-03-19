$('.scroll').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
});
$(function(){
    var navbar = $('.navbar');
    var booking = $('.book-botton-container');
    var reservation = $('.reservation-form');

    $(window).scroll(function(){
        if($(window).scrollTop() <= 20){
            navbar.removeClass('navbar-scroll');
            booking.removeClass('booking-button-scroll');
            reservation.removeClass('reservation-form-scroll');
        } else {
            navbar.addClass('navbar-scroll');
            booking.addClass('booking-button-scroll');
            reservation.addClass('reservation-form-scroll');
        }
    });
});

$("#news-slider").owlCarousel({
    items : 3,
    nav:true,
    pagination:true,
    autoPlay:true,
    navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
});

$(function() {
    $('.scroll-down').click (function() {
        $('html, body').animate({scrollTop: $('.direct-book').offset().top }, 'slow');
        return false;
    });
});
