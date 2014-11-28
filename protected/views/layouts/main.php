<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/global.css" type="text/css" /> 
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" type="text/css" /> 

<!--	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" ></script>
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.loader.fullscreen.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.loader.fullscreen.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js" ></script>
	<script defer src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo Yii::app()->request->baseUrl; ?>";
		$(window).load(function(){
		  $('.flexslider, .flexslider1').flexslider();
		});
    </script>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mousewheel.js"></script>
    <script defer src="<?php echo Yii::app()->request->baseUrl; ?>/js/demo.js"></script>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.scrollTo-1.4.2-min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/top_bottomscroller.js"></script>	
    <script>
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
              height: '100%',
              width: '100%',
              videoId: 'mbYYYiCza0c',
              playerVars:{'disablekb': 1,'enablejsapi': 1,'fs': 0,'iv_load_policy': 3,'modestbranding': 1,'playsinline': 1,'autohide': 0,'autoplay': 0.0,'controls': 0.0,'rel': 0,'showinfo': 0.0,'theme': 'dark','color': 'white', 'html5': 1}
            });
        }

        $("a#video_play_icon, a.recipe_play_icon, a.listing-play-video, #playplayer").live('click',function(e){
            $('#howtousediv').hide();
            $('#player').show();
            $('#pauseplayer').show();
            $('#playplayer').hide();
            player.playVideo();
        });

        $("#pauseplayer").live("click",function(){
            player.pauseVideo();
            $('#playplayer').show();
            $('#pauseplayer').hide();
        });
        
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        try { $('.menuBox ul, .linkBox ul, .foodBox').localScroll(800);
			} catch(err){ console.log(err); }
			try { 
        $("a.pop_image").fancybox({
		'transitionIn'	: 'none',
		'transitionOut'	: 'none',
                'width': '90%',
                'height':'90%'
	});
	 } catch(err){ console.log(err); }
        
     /*   $("a#video_play_icon, a.recipe_play_icon, a.listing-play-video").live('click',function(e){
            $('#howtousediv').hide();
            $('#player').show();
            player.playVideo();

            e.preventDefault();
            var href= $(this).attr('rel'); 
            var html = '<div id = "youtube-wrap"><iframe src="'+href+'" width="100%" height="100%" frameborder="0" allowfullscreen="1" ></iframe></div>';
            if(!$('#youtube-wrap').length){
                $('#howtouse').html(html);
            }
        });*/
       /* 
        $(document, 'iframe').keyup(function(e) {
            if (e.keyCode == 27) { 
                if($('#youtube-wrap').length){
                    $('#youtube-wrap').remove();
                }
            }
        });
        
        $("#youtube-wrap .close").live("click",function(){
            var html = '<div class="inner-width"><a rel="http://www.youtube.com/embed/mbYYYiCza0c?autoplay=1&rel=0&fs=1" href="javascript:void(0);" class="iframe" id="video_play_icon"><img  src="<?php echo CLOUD_IMG_PATH;?>images/play_icon.png" alt="" /> Watch How to Use</a><div class="text table"><div class="table-cell"><h2>Get Started</h2><p>The revolutionary, new Kenstar Oxy Fryer uses only hot air for cooking. As a result food stays tasty and crispy. Just the way you always like it.</p><img src="<?php echo CLOUD_IMG_PATH;?>images/process_image.png" alt="" /></div></div></div>';
            if($('#youtube-wrap').length){
                $('#howtouse').html(html);
            }
        });*/
        
    });
	</script>
    
	<?php if(($this->uniqueId == 'site') && ($this->action->Id == 'index')): ?>	
            <title>Oil Free Frying</title>
        <?php else : ?>
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php endif; ?>

        <script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 960860966;

var google_custom_params = window.google_tag_params;

var google_remarketing_only = true;

/* ]]> */

</script>

<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

<div style="display:inline;">

<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/960860966/?value=0&amp;guid=ON&amp;script=0"/>

</div>

</noscript>
</head>
<body>
    <div class="overlay"></div>
    <?php if(($this->uniqueId == 'site') && ($this->action->id == 'index')): ?>
    <span id="promotion-close" onclick="javascript:$('a#float-promotion').hide(); $('#promotion-close').hide(); ">x</span>
    <a onclick="trackOutboundLink('http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG'); return false;" href="http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG" target="_blank" id="float-promotion">
        <img src="http://d31mnxm13m6gic.cloudfront.net/images/flipkart.jpg" />
    </a>
    <?php endif; ?>
<!--  Start wrapper -->
<div id="wrapper">

	<!--  Start main container -->
	<div id="mainCntr">
		
		<!--  Start header container -->
		<header id="headerCntr" class="full-width">
        
            <div class="inner-width">
            
            	<!--  Start mobile bar -->
                <div class="navbar">
                    <div class="navicon-line"></div>
                    <div class="navicon-line"></div>
                    <div class="navicon-line"></div>
                </div> 
                <!--  End mobile bar -->
                
                <h1><a href="<?php echo Yii::app()->getHomeUrl(); ?>">GxyFryed</a></h1>
                
                <div class="float-right">
                
                    <a class="flipcard" onclick="trackOutboundLink('http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG'); return false;" href="http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/buy_now_flipcard.gif" alt="" /></a>
                    
                    <a class="kenStar" href="http://www.kenstar-appliances.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/kenStar.png" alt="" /></a>
                    
                </div>
                
                <!--  Start menu box -->
                <nav class="menuBox" role="navigation">
    
                    <ul>
                        <li class="current-menu"><a href="<?php echo Yii::app()->getHomeUrl(); ?>">HOME</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#benefits">Benefits</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#howtouse">how to use</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#recipes">recipes</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>faq">faq</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#about">about</a></li>
                    </ul>
                    
                </nav>
                <!--  End menu box -->
    
            </div>
            
        </header>
		<!--  End header container -->
        
        <div class="dack full-width">
        	
            <div class="inner-width">
            
            	<h1><a href="<?php echo Yii::app()->getHomeUrl(); ?>">GxyFryed</a></h1>
                
                <div class="float-right">
                
                    <a class="flipcard" onclick="trackOutboundLink('http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG'); return false;" href="http://www.flipkart.com/kenstar-of-koa15cj3-3-l-air-fryer/p/itmeyfsb7x3trgb3?pid=ECKEYFS8YQZHVBHG" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/buy_now_flipcard.gif" alt="" /></a>
                    
                    <a class="kenStar" href="http://www.kenstar-appliances.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/kenStar.png" alt="" /></a>
                    
                </div>
                
                <!--  Start link box -->
                <nav class="linkBox">
    
                    <ul>
                        <li class="current-menu"><a href="<?php echo Yii::app()->getHomeUrl(); ?>">HOME</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#benefits">Benefits</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#howtouse">how to use</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#recipes">recipes</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>faq">faq</a></li>
                        <li><a href="<?php echo Yii::app()->getHomeUrl(); ?>#about">about</a></li>
                    </ul>
                    
                </nav>
                <!--  End link box -->
                
            </div>
        
        </div>
		
		<?php echo $content;?>
		
		<!--  Start footer containe -->
		<div id="footerCntr">
			<div class="inner-width">
                            <p>&copy; Kenstar All rights reserved. <a target="_blank" href="<?php echo Yii::app()->getHomeUrl(); ?>terms">Disclaimer*</a></p>
</div>
		</div>
		<!--  End footer container -->
		
	</div>
	<!--  End main container -->
	
</div>
<!--  End wrapper -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 
  ga('create', 'UA-33768341-3', 'auto');
  ga('send', 'pageview');
  
    var trackOutboundLink = function(url) {
        ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
          function () {
            document.location = url;
          }
        });
    }
</script>
</body>
</html>
