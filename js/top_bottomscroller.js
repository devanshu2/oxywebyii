
var _scrollTop;
var _sideNavRight = -55;
var _windowResizeInterval = 0;
var _hasEnoughContentforScroll = false;

$(document).ready(function(e) {
	navigationHandler();
});
function navigationHandler(){
	
	$('.scroll_top_btn > a').bind('click', function(){
		moveToTopHandler(0);
		return false;
	});
	$('.scroll_bottom_btn > a').bind('click', function(){
		var scrollOffset = $(window).scrollTop() + $(window).height();
		$('html, body').stop(true, false);
		$('html, body').animate({'scrollTop':scrollOffset}, {duration:"slow"});
		return false;
	});
	
	
};

function sitemapShowHideHandler(){
	var _isHide = false;
	var sitemapDiv = $('#sitemap');
	var sitemapWrapper = $(".site_map_wrapper");
	sitemapDiv.bind('click', function(){
		_isHide = !_isHide;
		sitemapWrapper.stop(true, false);
		if(_isHide){
			sitemapDiv.text('Sitemap -');
			sitemapWrapper.css('display', 'block');
		}else{
			sitemapDiv.text('Sitemap +');
			sitemapWrapper.css('display', 'none');
		}
		var elementposition = sitemapWrapper.offset().top;
		moveToTopHandler(elementposition);
		return false;
	});
}
function moveToTopHandler(pos){
	$('html, body').stop(true, false);
	$('html, body').animate({'scrollTop':pos});
	return false;
}


/* -------------------------------- window load handler -------------------------------- */

$(window).load(function(e){
	bodyContentResizeHandler();

});


/* -------------------------------- window resize handler -------------------------------- */
$(window).resize(bodyContentResizeHandler);
function bodyContentResizeHandler(){
	
	
	clearInterval(_windowResizeInterval);
	_windowResizeInterval = setInterval(function(){
		clearInterval(_windowResizeInterval);
		
	}, 500);
	
	/* If scrollbar is not available Start */
	if($(document).height() > $(window).height()) {
		_hasEnoughContentforScroll = true;
    }else{
		_hasEnoughContentforScroll = false;
	}
	showhideScrollSignHandler();
	/* If scrollbar is not available End */
}


/* -------------------------------- window scroll handler -------------------------------- */
var topOffset = 28;
var indicatorInterval = 0;
$(document).ready(function(e) {
    animateOnWindowScrollHandler();
});
$(window).bind("scroll", function(e){
	animateOnWindowScrollHandler();
	//manageScrollIndicatorHandler();
});
function manageScrollIndicatorHandler(){
	clearInterval(indicatorInterval);
	indicatorInterval = setInterval(function(){
		clearInterval(indicatorInterval);
	}, 100);
}
function animateOnWindowScrollHandler(){
	_scrollTop = $(window).scrollTop();
	showhideScrollSignHandler();
}

function IsScrollbarAtBottom() {
    var documentHeight = $(document).height();
    var scrollDifference = $(window).height() + $(window).scrollTop();
    var x = documentHeight - scrollDifference;
    return (x <= 60);
    //return (documentHeight == scrollDifference);
}
function showhideScrollSignHandler(){
	$('.scroll_top_btn').css('display', 'none');
	$('.scroll_bottom_btn').css('display', 'none');
	
	if(_hasEnoughContentforScroll){
		if(IsScrollbarAtBottom()){
			$('.scroll_top_btn').css('display', 'block');
		}else{
			$('.scroll_bottom_btn').css('display', 'block');
		}
	}
}