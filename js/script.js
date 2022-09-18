const targetElement = document.querySelectorAll(".animationTarget");
console.log("画面の高さ", window.innerHeight)
document.addEventListener("scroll", function(){
    for (let i = 0; i < targetElement.length; i++) {
        const getElementDistance = targetElement[i].
        getBoundingClientRect().top + targetElement[i].clientHeight * .3
        if (window.innerHeight > getElementDistance) {
        targetElement[i].classList.add("show");
        }
    }
})

function GethashID (hashIDName){
    if(hashIDName){
        $('.tab li').find('a').each(function(){
            const idName = $(this).attr('href');
            if(idName == hashIDName){
                const parentElem = $(this).parent();
                $('.tab li').removeClass("active");
                $(parentElem).addClass("active");
                $(".area").removeClass("is-active");
                $(hashIDName).addClass("is-active");
            }
        });
    }
}

$('.tab a').on('click', function() {
    const idName = $(this).attr('href');
    GethashID (idName);
    return false;
});

$(window).on('load', function(){
    $('.tab li:first-of-type').addClass("active");
    $('.area:first-of-type').addClass("is-active");
    const hashName=location.hash;
    GethashID (hashName);
});

$(function(){
    $("ul.nav-menu li").hover(
        function(){
            $(".nav-submenu:not(:animated)", this).slideDown("slow");
        },
        function(){
            $(".nav-submenu", this).slideUp("fast");
        }
    );
});

$(function(){
    $(".koeSlider").slick({
        infinite:true,
        slidesToShow:3,
        slidesToScroll:3,
        arrows:true,
        dots:true,
        autoplay:true,
        autoplaySpeed:4000,
    });
});

$(function(){
    $(".productSlider").slick({
        infinite:true,
        slidesToShow:3,
        slidesToScroll:3,
        arrows:true,
        dots:true,
        autoplay:true,
        autoplaySpeed:4000,
    });
});

$(function(){
    $(".reskoeSlider").slick({
        infinite:true,
        slidesToShow:1,
        // slidesToScroll:3,
        arrows:true,
        dots:true,
        autoplay:true,
        autoplaySpeed:4000,
    });
});

$(function(){
    $(".resproductSlider").slick({
        infinite:true,
        slidesToShow:1,
        // slidesToScroll:3,
        arrows:true,
        dots:true,
        autoplay:true,
        autoplaySpeed:4000,
    });
});


$(function(){
    $('.backToTop').hide();
    $(window).scroll(function(){
        if($(this).scrollTop() > 300){
            $('.backToTop').fadeIn();
        } else{
            $('.backToTop').fadeOut();
        }
    });

    $('.backToTop').click(function(){
        $('body,html').animate({
            scrollTop:0
        }, 500)
    });
});