//==================
// loading
//==================

var bg = $('.loading'),
    loader = $('.loading__icon');
/* ローディング画面の非表示を解除 */
bg.removeClass('is-hide');
loader.removeClass('is-hide');

/* 読み込み完了 */
$(window).on('load', function(){
    bg.fadeOut(800);
    loader.fadeOut(300);
});

/* 10秒経ったら強制的にローディング画面を非表示にする */
setTimeout('stopload()',10000);


//==================
// header
//==================

$(function(){
    $(window).scroll(function(){    
        var scrollTop = $(window).scrollTop();
        var areaHeight = $('.top').innerHeight();
        
        if(scrollTop > areaHeight/2){
            $('.header').addClass('header--bg_brown');
        } else {
            $('.header').removeClass('header--bg_brown');
        }
    })
})

$(function(){
    $('a[href^="#"]').click(function(){　　  
        var speed = 500;　　　　                                                      
        var adjust = $('.header').innerHeight();                                       
        var href= $(this).attr("href");　　　                                        
        var target = $(href == "#" ? 'html' : href);                                 
        var position = target.offset().top;　                                       
        $("html, body").animate({scrollTop:position - adjust}, speed, "swing");    　
        return false;
      });

})

$(function(){
    $(window).scroll(function(){
        var adjust = $(".header").innerHeight();
        var scrollTop = $(window).scrollTop() + adjust + 1  ;
        var aboutTop = $(".about").offset().top;
        var aboutBottom = aboutTop + $(".about").innerHeight();
        var skillTop = $(".skill").offset().top;
        var skillBottom = skillTop + $(".skill").innerHeight();
        var flowTop = $(".flow").offset().top;
        var flowBottom = flowTop + $(".flow").innerHeight();
        var worksTop = $("#works").offset().top;
        var worksBottom = worksTop + $("#works").innerHeight();
        var contactTop = $(".contact").offset().top;
        var contactBottom = contactTop + $(".contact").innerHeight();

        if(scrollTop >= aboutTop && scrollTop <= aboutBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#about"]').addClass("header__link--active");
        } else if (scrollTop >= skillTop && scrollTop <= skillBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#skill"]').addClass("header__link--active");
        } else if (scrollTop >= flowTop && scrollTop <= flowBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#flow"]').addClass("header__link--active");
        } else if (scrollTop >= worksTop && scrollTop <= worksBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#works"]').addClass("header__link--active");
        } else if (scrollTop >= contactTop && scrollTop <= contactBottom){
            $(".header__link").removeClass("header__link--active");
            $('a[href="#contact"]').addClass("header__link--active");
        } else{
            $(".header__link").removeClass("header__link--active");
        }
    })
})

$(function () {
    // クリック時の動作
    $('.hamberger__line-wrap').on('click', function() {
        var scrollpos;

        if($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.hamberger-menu').removeClass('open');
            $('.overlay').removeClass('open');
            $('body').removeClass('fixed');
        } else {
            $(this).addClass('open');
            $('.hamberger-menu').addClass('open');
            $('.overlay').addClass('open');
            $('body').addClass('fixed');
        }
    });
});



//==================
// top
//==================



TweenMax.staggerFromTo('.top__letter',1,{
    opacity:0,x:'1em',y:'1em'
},{
    opacity:1,x:0,y:0,rotateZ:0,ease:"power2.easeInOut",delay:1,
},0.05);



//==================
// works
//==================

var mySwiper = new Swiper('.swiper-container', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 30,
    initialSlide: 0,
    centeredSlides : true,
    speed: 1000,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true,
    },
    breakpoints:{
        767:{
            slidesPerView: 2,
        }
    }
});

//==================
// contact
//==================

  $(function(){
    let $submit = $('#js-submit')
    $('#form input , #form textarea').on( 'change', function(){
        if(
            $( '#form input[name="name"]').val() !== "" &&
            $( '#form input[name="ruby"]').val() !== "" &&
            $( '#form input[name="email"]').val() !== "" 
        ){
            $submit.prop('disabled', false)
        } else {
            $submit.prop('disabled',true)
        }
    })

    $(window).on( 'load', function(){
        if(
            $( '#form input[name="name"]').val() !== "" &&
            $( '#form input[name="ruby"]').val() !== "" &&
            $( '#form input[name="email"]').val() !== "" 
        ){
            $submit.prop('disabled', false)
        } else {
            $submit.prop('disabled',true)
        }
    })
  })

  

// ===============
// フェードイン
// ===============

$(function(){
    $(window).scroll(function (){
      $(".js-hide").each(function(){
        var position = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > position - windowHeight/1.3){
            $(this).addClass('js-show');
        } 
      });
    });
  });
  