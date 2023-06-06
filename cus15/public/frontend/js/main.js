$(document).ready(function() {

    $(".menu-desktop .nav-sub .nav-sub-child").each(function() {
        let length = $(this).find(".nav-sub-item-child").length;
        if (length) {
            $(this).prev("a").append("<i class='fa fa-angle-right pt_icon_right'></i>");
        }
    });
    // $(".menu-desktop .nav-item .nav-sub").each(function() {
    //     if ($(this).find(".nav-sub-item").length) {
    //         $(this).prev("a").append("<i class='fa fa-angle-down' aria-hidden='true'></i>");
    //     }
    // })
    $(".menu_fix_mobile .nav-sub").each(function() {
        if ($(this).find(".nav-sub-item").length) {
            $(this).parent(".nav-item").prepend("<i class='fa fa-chevron-down mm1'></i>");
        }
    })
    $(".menu_fix_mobile .nav-sub-child").each(function() {
            if ($(this).find(".nav-sub-item-child").length) {
                $(this).parent(".nav-sub-item").prepend("<i class='fa fa-chevron-down mm2'></i>");
            }
        })
        // $(".menu_fix_mobile .megamenu-container .list-megamenu").each(function() {
        //     if ($(this).find(".megamenu-item").length) {
        //         $(this).parents(".nav-megamenu").prepend("<i class='fa fa-chevron-down mega-mn1'></i>");
        //     }
        // });
    $('.menu_fix_mobile .mn-icon').click(function() {
        event.preventDefault();
        $(this).parent('a').next('ul').slideToggle();
        $(this).parent().toggleClass('active');
    });

    $(".megamenu-item-sub .submenu-right3").each(function() {
        let length = $(this).find("li").length;
        if (length) {
            $(this).prev("a").append("<div class='openc'></div>");

        }
    })
    $(".megamenu-item-sub .openc").click(function() {
        event.preventDefault();
        $(this).parents(".megamenu-item-sub").find(".submenu-right3").slideToggle();
        $(this).parents(".megamenu-item-sub").toggleClass('active');
    })

    $(".language_selected").click(function() {
        $(this).parent().find(".language_change").toggle();
    });

    $(".language_selected_mb").click(function() {
        $(this).parent().find(".language_change_mb").toggle();
    });

    $(".mega-mn1").click(function() {
        event.preventDefault();
        $(this).parents(".nav-megamenu").find(".megamenu-container").slideToggle();
    });

    $('.list-bar').click(function() {
        $('.menu_fix_mobile').toggleClass('main-menu-show');
        $(this).toggleClass('change');
    });
    $('.list-bar2').click(function() {
        $('.menu_fix_mobile').addClass('main-menu-show');
    });

    $('.close-menu #close-menu-button').click(function() {
        $(this).parent().parent().removeClass('main-menu-show');
        $('.list-bar').removeClass('change');
    });

    $('.menu_fix_mobile .mm1').click(function() {
        $(this).parent().find('.nav-sub').slideToggle();
        $(this).parent().toggleClass('active');
    });
    $('.menu_fix_mobile li:nth-child(3) .mm1').click(function() {
        $(this).parent().find('.nav-sub').css("display", "none");
        $(this).parent().toggleClass('active');
    });
    $('.menu_fix_mobile .mm2').click(function() {
        $(this).parent().find('.nav-sub-child').slideToggle();
        $(this).parent().toggleClass('active');
    });

    $('.show_search a').click(function() {
        $('#search').slideToggle();
    });
    $('.close-search').click(function() {
        $('#search').slideToggle();
    })
    $('.search_mobile').click(function() {
        $('#search').slideToggle();
    });

    $('.list_image_video .image img').click(function() {
        var src = $(this).attr('data-video');

        var link_video = $('#videos').attr('src', src);
    })

    $(window).scroll(function(event) {
        var pos_body = $('html,body').scrollTop();
        if (pos_body > 105) {
            $('.header').addClass('fixed');
        } else {
            $('.header').removeClass('fixed');
        }
    });
    $('.autoplay1-ykkh').slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: false,
    });

    $('.faded').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear',
        prevArrow: '.btn-slider-prev',
        nextArrow: '.btn-slider-next',
        // appendDots: '.dots-item'
    });
    $('.faded-detail').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });
    $('.tin-tuc-home').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,

                }
            }
        ]
    });
	$('.autoplay4-doitac').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
            
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,

                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.autoplay4-ykkh').slick({
        dots: false,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    $('.slide_service5').slick({
        dots: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });



    $('.slide_cate').slick({
        dots: true,
        arrows: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.autoplay5-pro').slick({
        dots: false,
        arrows: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,

                }
            }
        ]
    });
    $('.autoplay5-pro-2').slick({
        dots: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,

                }
            }
        ]
    });
    $('.autoplay4-pro').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.autoplay_height').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        vertical: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }]
    });

    $('.autoplay3-news').slick({
        dots: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 550,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    $('.slide_video').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
    });

    $('.autoplay5').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });

    $('.autoplay5-doitac').slick({
        dots: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });
    $('.autoplay6-tintuc').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        pauseOnHover: true,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.autoplay6-video').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.autoplay6-spkhac').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.autoplay').slick({
        dots: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 551,
            settings: {
                slidesToShow: 1,
                dots: true,
                autoplay: true,
                autoplaySpeed: 2000,
            }
        }]
    });

    $('.faded').slick({
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });

    $('.autoplay1').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        speed: 1000,
        autoplaySpeed: 3000,
    });

    $('.autoplay3').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });



    $(".autoplay6").slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });

    $('.adaptive-1').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        asNavFor: '.sss',
        slidesToShow: 1,
        focusOnSelect: true,
        adaptiveHeight: true
    });

    $('.sss').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        adaptiveHeight: true
    });

    $('.adaptive1-1').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $(".autoplay4").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        speed: 500,
        autoplaySpeed: 1500
    });
});
$('.slider-detail-project').slick({
    dots: false,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,

            }
        }
    ]
});
$('.slider-achievement').slick({
    dots: false,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,

            }
        }
    ]
});






function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function myFunction2(x) {
    x.classList.toggle("change2");
}


$(document).ready(function() {
    var x = $(".header").offset();
    if ((x.top) = 0) {
        $('.header').re('fixed');
    } else {
        $('.header').addClass('fixed');
    }

    $(window).scroll(function(event) {
        var pos_body = $('html').scrollTop();
        if (pos_body > 110) {
            $('#menu').addClass('fixed');
        } else {
            $('#menu').removeClass('fixed');
        }
    });

    $(window).scroll(function(event) {
        var pos_body = $('body').scrollTop();
        if (pos_body > 110) {
            $('#menu').addClass('fixed1');
        } else {
            $('#menu').removeClass('fixed1');
        }
    });
});