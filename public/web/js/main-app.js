 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	var isMobile = {
		Android: function() {
			return navigator.userAgent.match(/Android/i);
		},
			BlackBerry: function() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
			iOS: function() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
			Opera: function() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
			Windows: function() {
			return navigator.userAgent.match(/IEMobile/i);
		},
			any: function() {
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
		}
	};


	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll'
  });


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
	
		$('.product-slider').owlCarousel({
			autoplay: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding: 0,
			nav: false,
			dots: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});
		$('.carousel-testimony').owlCarousel({
			autoplay: true,
			loop: true,
			items:1,
			margin: 0,
			stagePadding: 0,
			nav: false,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 1
				},
				1000:{
					items: 1
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: false,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });



	var goHere = function() {

		$('.mouse-icon').on('click', function(event){
			
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $('.goto-here').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});
	};
	goHere();

        

})(jQuery);


/*Jasanchez*/
//function detailView(elem){ /*Se elimina el evento onclik del html*/
//$(".detailModel").click(function(){
$(document).on("click",".detailModel", function () {
    
    //var dataId = $(elem).attr("data-id");
    var dataId = $(this).attr("data-id");
    console.log("3idProduct -> "+dataId);
    
    $(".test").html("En este momento tenemos un alto volumen de visitas, es posible que la información no se visualice correctamente...intenta más tarde");
    
    $(".imgList").html("");
    $(".rangesYear").html("");
    $(".listTales").html("");
    $(".valorPrenda").html("<br />");
    $(".mediosPago").html("");
    
    $.ajax({
        type: 'GET',
        url: 'https://tiendacarrusel.com/CPrincipal/detailProduct/'+dataId,
        //method: 'post',
        crossDomain: true,
        headers: {  'Access-Control-Allow-Origin': 'https://tiendacarrusel.com' },
        //data: {idProduct: dataId},
        //dataType: 'json',
        //contentType: 'application/json; charset=utf-8',
        cache : false,
        success: function (data) {
            var json = JSON.parse(data);
            var dataDetail = json.dataProduct;
            var dataImage = json.imagesProduct;
            var dataRanges = json.rangesProduct;
            
            //$(".test").html("Load data ok...");
            
            $(".nameModalLabel").html(""+
                    dataDetail[0].nombreProducto+
                    "<br /><span style='font-size: 15px; color: gray;'>REF: "+dataDetail[0].referenciaProducto+"</span>"+
                    "<br /><span style='font-size: 15px; color: gray;'>DESCRIPCION: "+dataDetail[0].descProducto+"</span>"
                    );
            
            for (var i in dataImage) {
                
                $('.imgList').append(
                    '<div class="row">' +
                    '<div class="col-md-12">' +
                        '<div class="">' +
                        '<div class="item">' +
                            '<div class="product">' +
                                '<img class="img-fluid" src="'+dataImage[i].urlImagen+'" alt="Ropa Infantil" />'+
                                '<span class="status">'+dataImage[i].etiqueta+'</span>'+
                            '</div>' +
                        '</div>' +
                        '</div>' +
                    '</div>' +
                    '</div>'
                );
            }
            
            if (dataDetail[0].idCategoria == 1){
                $('.rangesYear').append(
                    '<option value="0"disabled selected>Selecciona la Edad</option>'
                );

                for (var b in dataRanges) {

                    $('.rangesYear').append(
                        '<option value="'+dataRanges[b].idRango+'" data-value="'+dataRanges[b].valorItemSite+'" data-range="'+dataRanges[b].nombreRango+'" data-sku="'+dataDetail[0].referenciaProducto+'" data-desc="'+dataDetail[0].nombreProducto+'" >'+dataRanges[b].nombreRango+'</option>'
                    );
                }
            } else {
                $(".valorPrenda").html("<span style='font-size: 35px; color: gray'>$</span>"+parseInt(dataDetail[0].valueItemSite).toLocaleString()+" <span style='font-size: 25px; color: gray'>CO</span>"+
                                   "<br /><img src='https://tiendacarrusel.com/public/web/images/pagobancolombia.png' style='max-width:80%; margin-top: -18px;'>");
                $(".mediosPago").html("<span style='font-size: 14px; color: gray; line-height: 14px'>También recibimos tarjetas de crédito y otros medios de pago:</span><br />"+
                                       "<img src='https://tiendacarrusel.com/public/web/images/medios_pago.png' style='max-width:100%'>");
                
                var open = "Hola buen dia, me interesa comprar el siguiente producto:%0D%0A%0D%0A";
                var det1 = "> "+dataDetail[0].nombreProducto+"%0D%0A";
                var det2 = "> "+dataDetail[0].referenciaProducto+"%0D%0A";
                var det3 = "> $"+parseInt(dataDetail[0].valueItemSite).toLocaleString()+" CO";
                //var det4 = "https://tiendacarrusel.com/CPrincipal/img/"+dataDetail[0].referenciaProducto;
                var msg = open+det1+det2+det3;
                $(".btn-contact").html("<a href='https://api.whatsapp.com/send?phone=573163309422&text="+msg+"' target='_blank' class='btn btn-primary' style='background-color: red; color: #fff'><i class='fa fa-whatsapp'></i> Proceso de compra</a>");
                
            }
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            //alert("data error "+jqXHR.statusText);
            console.log("data error"+errorThrown);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        //alert("Fail: "+jqXHR.responseText);
        console.log("Fail");
    });
    
});


//function viewTales(elem){ /*se elimina el evento onchange del html*/
$('.rangesYear').on('change', function() {
    
    /*var valueProduct = $(elem).find('option:selected').attr('data-value');
    var rangeProduct = $(elem).find('option:selected').attr('data-range');
    var refProduct = $(elem).find('option:selected').attr('data-sku');
    var nameProduct = $(elem).find('option:selected').attr('data-desc');
    var idRange = elem.value; */
    
    var valueProduct = $(this).find('option:selected').attr('data-value');
    var rangeProduct = $(this).find('option:selected').attr('data-range');
    var refProduct = $(this).find('option:selected').attr('data-sku');
    var nameProduct = $(this).find('option:selected').attr('data-desc');
    var idRange = this.value;
    
    console.log("2idRange -> "+idRange);
    
    $(".listTales").html("");
    $(".valorPrenda").html("");
    
    $.ajax({
        url: 'https://tiendacarrusel.com/CPrincipal/getTales',
        method: 'post',
        data: {idRange: idRange},
        //dataType: 'json',
        success: function (data) {
            var json = JSON.parse(data);
            var listTales = json.dataTales;
            
            $('.listTales').append(
                '<option value="0"disabled selected>Talla</option>'
            );
    
            for (var c in listTales) {
                $('.listTales').append(
                    '<option value="'+listTales[c].idTalla+'">'+listTales[c].descTalla+'</option>'
                );
            }
            
            $(".valorPrenda").html("<span style='font-size: 35px; color: gray'>$</span>"+parseInt(valueProduct).toLocaleString()+" <span style='font-size: 25px; color: gray'>CO</span>"+
                                   "<br /><img src='https://tiendacarrusel.com/public/web/images/pagobancolombia.png' style='max-width:80%; margin-top: -18px;'>");
            $(".mediosPago").html("<span style='font-size: 14px; color: gray; line-height: 14px'>También recibimos tarjetas de crédito y otros medios de pago:</span><br />"+
                                   "<img src='https://tiendacarrusel.com/public/web/images/medios_pago.png' style='max-width:100%'>");
            
            var open = "Hola buen dia, me interesa comprar la siguiente prenda:%0D%0A%0D%0A";
            var det1 = "> "+nameProduct+"%0D%0A";
            var det2 = "> "+refProduct+"%0D%0A";
            var det3 = "> "+rangeProduct+"%0D%0A";
            var det4 = "> $"+parseInt(valueProduct).toLocaleString()+" CO";
            var msg = open+det1+det2+det3+det4;
            $(".btn-contact").html("<a href='https://api.whatsapp.com/send?phone=573163309422&text="+msg+"' target='_blank' class='btn btn-primary' style='background-color: red; color: #fff'><i class='fa fa-whatsapp'></i> Proceso de compra</a>");
            
        },
        error: function( jqXHR, textStatus, errorThrown ) {
            console.log("data error"+errorThrown);
        }
    }).fail( function( jqXHR, textStatus, errorThrown ) {
        console.log("Fail");
    });
    
});

function disableSend(){
    console.log("disable Button");
    document.getElementById("btn-register").disabled = true;
};

/*Chat BOT*/
/*function mariabot(){
    console.log("Maria");
    $('.chat-info').css('display','none');
    $('.chat-go').css('display','block');
}; */
