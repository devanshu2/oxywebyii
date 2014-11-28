$(document).ready(function(){
	
	$(window).scroll(function(){
		if  ($(window).scrollTop() > ($('#headerCntr').outerHeight()+1) ){
			$(".dack").addClass('show');
		}
		else {
			$(".dack").removeClass('show');
		}
		
	});	
	
	$(".navbar").click(function(){
		$(".menuBox").stop().slideToggle();
	});

	if ($(window).width() <= 991) { 
		
		var mouseIn = false;
		$('.menuBox, .navbar').hover(function(){
		  mouseIn = true;
		}, function(){
		  mouseIn = false;
		});
		$('body').click(function(){
		  if (!mouseIn){
			$('.menuBox').stop().slideUp();
		  }
		});
	}

/*	$( window ).resize(function() {
	
		var date_height = $(window).height() - $('#headerCntr').outerHeight();
		
		alert(date_height);
		
		if ($(window).width() > 991) { 
		
			$(".foodBox").height(date_height);
		
		}
	
	});
*/	
	
    $("#fliterjs").click(function(){
        $("#filter-wrapper").stop().slideToggle();
        if(!$('#searchtext').is(':hidden')){
            $('.searchbox').stop().animate({width: '0px'}, 300, function(){ $(this).removeAttr('style'); });
        }
    });
	

		
    $('#searchbtn').click(function() {
        // Hide the trigger image:
        $(this).stop().animate({width:26},1000);
        // At the same time slide the div open
        $('.searchbox').stop().animate({width: 'toggle'},300, function(){
            // This function/ code will be executed on complete:
            $(this).focus();
            $('#filter-wrapper').stop().slideUp();
            //$(this).find('.searchbox')[0].focus(); // For bonus, the input will now get autofocus
        });
    });
    
  
//	 var imageFit = function() {
//        windowHeight = $(window).height();
//        $('.foodBox,.howtouseBox').css('min-height', windowHeight-79);
//    };
        var imageFit = function() {
        
        var windowHeight = $(window).height();
        $('.foodBox').css('min-height', windowHeight-79);
        
        $('.sliderBox li img').css('height', windowHeight-40);
        $('.howtouseBox, .sliderBox li img').css({'height': (windowHeight-40)+'px', 'width' : '100%'});
        
    };

        $(document).ready(imageFit);
        $(window).resize(imageFit);



    $('.faq-info img').click(function(e){
        $('.sidebar').stop().slideToggle(200);
    });

});	

