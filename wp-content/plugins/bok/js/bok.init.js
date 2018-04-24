$(document).ready(function() {
    $('.slider-image').viewbox();

    $("#accordion").accordion({
        heightStyle: "content",
        collapsible: true,
        active : 'none'
    });

    $('.youtubeModal').click(function(e) {
        e.preventDefault();
    }).youtubePopup({});

    $('.videoSlider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='/wp-content/plugins/bok/images/arrow-left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='/wp-content/plugins/bok/images/arrow-right.png'>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.restaurantSlider').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        prevArrow: "<img class='a-left control-c prev slick-prev' src='/wp-content/plugins/bok/images/arrow-left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='/wp-content/plugins/bok/images/arrow-right.png'>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
});