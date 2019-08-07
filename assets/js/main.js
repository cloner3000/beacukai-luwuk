$(function() {
	var header = $(".navbar");
	var x = $(".arrow-link");
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 100) {
			header.addClass("navbar-active");
			x.addClass("arrow-none");
		} else {
			header.removeClass("navbar-active");
			x.removeClass("arrow-none");
		}
	});
	
	$("#btnLayanan").click(function() {
		$('html, body').animate({
			scrollTop: $("#myLayanan").offset().top
		}, 200);
	});
	
	$("#js-about-video-close").click(function(){
		$("#js-about-video").hide();
		var video = "about:blank";
		var iframe = $("#myiFrame");
		iframe.attr("src", video); 
	});

	$("#js-play-video").click(function(){
		$("#js-about-video").show();
		var video = $("#js-about-video");
		var iframe = $("#myiFrame");
		iframe.attr("src", video.data("src")); 
	});

	
	$('.slick-kurs').slick({
		slidesToShow: 4,
		autoplay: true,
		autoplaySpeed: 1000,
		arrows : false,
		responsive: [{
			breakpoint: 768,
			settings: {

				slidesToShow: 4
			}
		},
		{
			breakpoint: 480,
			settings: {

				slidesToShow: 1
			}
		}]
	});

	$('.slick-agenda').slick({
		slidesToShow: 4,
		autoplay: true,
		autoplaySpeed: 1000,
		arrows : false,
		responsive: [{
			breakpoint: 768,
			settings: {

				slidesToShow: 4
			}
		},
		{
			breakpoint: 480,
			settings: {

				slidesToShow: 1
			}
		}]
	});

	$('.left').click(function(){
	  $('.slick-agenda').slick('slickPrev');
	})

	$('.right').click(function(){
	  $('.slick-agenda').slick('slickNext');
	})

	$(document).ready(function(){ 
	    $(window).scroll(function(){ 
	        if ($(this).scrollTop() > 100) { 
	            $('#scroll').fadeIn(); 
	        } else { 
	            $('#scroll').fadeOut(); 
	        } 
	    }); 
	    $('#scroll').click(function(){ 
	        $("html, body").animate({ scrollTop: 0 }, 600); 
	        return false; 
	    }); 
	});

	$(function() {
		var selectedClass = "";
		$(".fil-cat").click(function(){ 
			selectedClass = $(this).attr("data-rel"); 
		    $("#portfolio").fadeTo(100, 0.1);
			$("#portfolio div").not("."+selectedClass).fadeOut().removeClass('scale-anm');
		    setTimeout(function() {
		    	$("."+selectedClass).fadeIn().addClass('scale-anm');
		    	$("#portfolio").fadeTo(300, 1);
		    }, 300); 
			
		});
	});

});
