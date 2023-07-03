(function($) {
    "use strict";

    /*****************************
     * Commons Variables
     *****************************/
    var $window = $(window),
        $body = $('body');

    /****************************
     * Sticky Menu
     *****************************/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
        } else {
            $(".sticky-header").addClass("sticky");
        }
    });

    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".seperate-sticky-bar").removeClass("sticky");
        } else {
            $(".seperate-sticky-bar").addClass("sticky");
        }
    });

    /************************************************
     * Modal Search 
     ***********************************************/
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });

    $('#search, #search button.close').on('click', function(event) {
        if ( event.target.className == 'close' ) {
            $(this).removeClass('open');
        }
    });

    /*****************************
     * Off Canvas Function
     *****************************/
    (function() {
        var $offCanvasToggle = $('.offcanvas-toggle'),
            $offCanvas = $('.offcanvas'),
            $offCanvasOverlay = $('.offcanvas-overlay'),
            $mobileMenuToggle = $('.mobile-menu-toggle');
        $offCanvasToggle.on('click', function(e) {
            e.preventDefault();
            var $this = $(this),
                $target = $this.attr('href');
            $body.addClass('offcanvas-open');
            $($target).addClass('offcanvas-open');
            $offCanvasOverlay.fadeIn();
            if ($this.parent().hasClass('mobile-menu-toggle')) {
                $this.addClass('close');
            }
        });
        $('.offcanvas-close, .offcanvas-overlay').on('click', function(e) {
            e.preventDefault();
            $body.removeClass('offcanvas-open');
            $offCanvas.removeClass('offcanvas-open');
            $offCanvasOverlay.fadeOut();
            $mobileMenuToggle.find('a').removeClass('close');
        });
    })();


    /**************************
     * Offcanvas: Menu Content
     **************************/
    function mobileOffCanvasMenu() {
        var $offCanvasNav = $('.offcanvas-menu'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.mobile-sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<div class="offcanvas-menu-expand"></div>');

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, .offcanvas-menu-expand', function(e) {
            var $this = $(this);
            if ($this.attr('href') === '#' || $this.hasClass('offcanvas-menu-expand')) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                    $this.parent('li').find('li').removeClass('active');
                    $this.parent('li').find('ul:visible').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });
    }
    mobileOffCanvasMenu();

    /************************************************
     * Nice Select
     ***********************************************/
    $('select').niceSelect();


    /*************************
     *   Hero Slider Active
     **************************/
    var heroSlider = new Swiper('.hero-slider-active.swiper-container', {
        slidesPerView: 1,
        effect: "fade",
        speed: 1500,
        watchSlidesProgress: true,
        loop: true,
        autoplay: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });


    /****************************************
     *   Product Slider Active - 4 Grid 2 Rows
     *****************************************/
    var productSlider4grid2row = new Swiper('.product-default-slider-4grid-2row.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,
        slidesPerColumn: 2,
        slidesPerColumnFill: 'row',

        navigation: {
            nextEl: '.product-slider-default-2rows .swiper-button-next',
            prevEl: '.product-slider-default-2rows .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    /*********************************************
     *   Product Slider Active - 4 Grid Single Rows
     **********************************************/
    var productSlider4grid1row = new Swiper('.product-default-slider-4grid-1row.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,

        navigation: {
            nextEl: '.product-slider-default-1row .swiper-button-next',
            prevEl: '.product-slider-default-1row .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });

    /*********************************************
     *   Product Slider Active - 4 Grid Single 3Rows
     **********************************************/
    var productSliderListview4grid3row = new Swiper('.product-listview-slider-4grid-3rows.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 1500,
        slidesPerColumn: 3,
        slidesPerColumnFill: 'row',

        navigation: {
            nextEl: '.product-list-slider-3rows .swiper-button-next',
            prevEl: '.product-list-slider-3rows .swiper-button-prev',
        },

        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });


    /*********************************************
     *   Blog Slider Active - 3 Grid Single Rows
     **********************************************/
    var blogSlider = new Swiper('.blog-slider.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 1500,

        navigation: {
            nextEl: '.blog-default-slider .swiper-button-next',
            prevEl: '.blog-default-slider .swiper-button-prev',
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        }
    });


    /*********************************************
     *   Company Logo Slider Active - 7 Grid Single Rows
     **********************************************/
    var companyLogoSlider = new Swiper('.company-logo-slider.swiper-container', {
        slidesPerView: 7,
        speed: 1500,

        navigation: {
            nextEl: '.company-logo-slider .swiper-button-next',
            prevEl: '.company-logo-slider .swiper-button-prev',
        },
        breakpoints: {

            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 7,
            },
        }
    });

    /********************************
     *  Product Gallery - Horizontal View
     **********************************/
    var galleryThumbsHorizontal = new Swiper('.product-image-thumb-horizontal.swiper-container', {
        loop: true,
        speed: 1000,
        spaceBetween: 25,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var gallerylargeHorizonatal = new Swiper('.product-large-image-horaizontal.swiper-container', {
        slidesPerView: 1,
        speed: 1500,
        thumbs: {
            swiper: galleryThumbsHorizontal
        }
    });

    /********************************
     *  Product Gallery - Vertical View
     **********************************/
    var galleryThumbsvartical = new Swiper('.product-image-thumb-vartical.swiper-container', {
        direction: 'vertical',
        centeredSlidesBounds: true,
        slidesPerView: 4,
        watchOverflow: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        spaceBetween: 25,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    var gallerylargeVartical = new Swiper('.product-large-image-vartical.swiper-container', {
        slidesPerView: 1,
        speed: 1500,
        thumbs: {
            swiper: galleryThumbsvartical
        }
    });

    /********************************
     *  Product Gallery - Single Slide View
     * *********************************/
    var singleSlide = new Swiper('.product-image-single-slide.swiper-container', {
        loop: true,
        speed: 1000,
        spaceBetween: 25,
        slidesPerView: 4,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
            },
        }

    });

    /******************************************************
     * Quickview Product Gallery - Horizontal
     ******************************************************/
    var modalGalleryThumbs = new Swiper('.modal-product-image-thumb', {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      var modalGalleryTop = new Swiper('.modal-product-image-large', { 
        thumbs: {
          swiper: modalGalleryThumbs
        }
      });

    /********************************
     * Blog List Slider - Single Slide
     * *********************************/
    var blogListSLider = new Swiper('.blog-list-slider.swiper-container', {
        loop: true,
        speed: 1000,
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

    /********************************
     *  Product Gallery - Image Zoom
     **********************************/
    $('.zoom-image-hover').zoom();


    /************************************************
     * Price Slider
     ***********************************************/
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
    



    $.ajax({
        url: '../../php/valores.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          var preco_minimo = data.min;
          var preco_maximo = data.max;
          
          $("#slider-range").slider({
            range: true,
            min: preco_minimo,
            max: preco_maximo,
            values: [preco_minimo, preco_maximo],
            slide: function(event, ui) {
              $("#amount").val("$" + ui.values[0] + " - €" + ui.values[1]);
            }
          });
          $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - €" + $("#slider-range").slider("values", 1));
        },
        error: function() {
          console.log('Erro ao obter valores da tabela de serviços.');
        }
      });
      


    /************************************************
     * Animate on Scroll
     ***********************************************/
    AOS.init({
       
        duration: 1000, 
        once: true, 
        easing: 'ease',
    });
    window.addEventListener('load', AOS.refresh);    

    /************************************************
     * Video  Popup
     ***********************************************/
    $('.video-play-btn').venobox(); 

    /************************************************
     * Scroll Top
     ***********************************************/
    $('body').materialScrollTop();

   /*************************
     *   Login and Register
     **************************/
   document.getElementById("btn__registrarse").addEventListener("click", registro)
   document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion)
   window.addEventListener("resize", anchoPagina);
   
   //Declaración de variables
   var contenedor_login_registro = document.querySelector(".contenedor__login-registro");
   var formulario_login = document.querySelector(".formulario__login");
   var formulario_registro = document.querySelector(".formulario__registro");
   var caja_trasera_login = document.querySelector(".caja__trasera-login");
   var caja_trasera_registro = document.querySelector(".caja__trasera-registro");
   
   
   function anchoPagina() {
       if(window.innerWidth > 850){
           caja_trasera_login.style.display = "block";
           caja_trasera_registro.style.display = "block";
       } else {
           caja_trasera_registro.style.display = "block";
           caja_trasera_registro.style.opacity = "1";
           caja_trasera_login.style.display = "none"
           formulario_login.style.display = "block";
           formulario_registro.style.display = "none";
           contenedor_login_registro.style.left = "0px";
       }
   }
   
   anchoPagina();
   
   
   function iniciarSesion() {
   
       if(window.innerWidth > 850){
           formulario_registro.style.display = "none";
           contenedor_login_registro.style.left = "10px";
           formulario_login.style.display = "block";
           caja_trasera_registro.style.opacity = "1";
           caja_trasera_login.style.opacity = "0";
       } else{
           formulario_registro.style.display = "none";
           contenedor_login_registro.style.left = "0px";
           formulario_login.style.display = "block";
           caja_trasera_registro.style.display = "block";
           caja_trasera_login.style.display = "none";
       }
   }
   
   function registro() {
   
       if(window.innerWidth > 850){
           formulario_registro.style.display = "block";
           contenedor_login_registro.style.left = "410px";
           formulario_login.style.display = "none";
           caja_trasera_registro.style.opacity = "0";
           caja_trasera_login.style.opacity = "1";
       } else {
           formulario_registro.style.display = "block";
           contenedor_login_registro.style.left = "0px";
           formulario_login.style.display = "none";
           caja_trasera_registro.style.display = "none";
           caja_trasera_login.style.display = "block";
           caja_trasera_login.style.opacity = "1";
       }
   }
   

})(jQuery);
