$(window).scroll(function(e) {
	
	var scroller_anchor = $('.scroller_anchor').offset().top;
	var scroller_1_anchor = $('.scroller_1_anchor').offset().top;
	var scroller_2_anchor = $('.scroller_2_anchor').offset().top;
	var scroller_3_anchor = $('.scroller_3_anchor').offset().top;

	
	if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed')
	{    
		$('.hook').css({
			'position': 'fixed',
			'top': '0px',
			'width':'100%',
			'background-color':'rgba(0, 0, 150)',
			'padding':'1%',
			'box-shadow':'#ccc 2px 2px 2px'
		});
		$('.scroller .hook_link').css({
			'color': '#ccc',
			'text-decoration': 'none',
			'font-size': '25px',
			'font-weight': '400',
			'font-style':'tahoma',
			'font-weight':'400',
			'margin-left':'15%' 
		});
		$('.scroller .float_nav').css({'display':'block'});
	}
	else if ($(this).scrollTop() < scroller_anchor && $('.scroller').css('position') != 'relative')
	{   
		$('.scroller').css({'position': 'relative', 'display': 'inline-block', 'width':'100%'});
		$('.scroller .hook_link').css({'color': '#ccc', 'text-decoration': 'none', 'font-size': '18px', 'font-weight': '200', 'font-style':'tahoma', 'margin-left':'15%' });
		$('.scroller .float_nav').css({'display':'none'});
	} 

	if ($(this).scrollTop() >= scroller_1_anchor && $('.scroller_1').css('position') != 'fixed')
	{    
		$('.hook').css({
			'position': 'fixed',
			'top': '0px',
			'width':'100%',
			'background-color':'rgba(0, 0, 150)',
			'padding':'1%',
			'box-shadow':'#ccc 2px 2px 2px'
		});
		$('.scroller_1 .hook_link').css({
			'color': '#ccc',
			'text-decoration': 'none',
			'font-size': '25px',
			'font-weight': '400',
			'font-style':'tahoma',
			'font-weight':'400',
			'margin-left':'15%' 
		});
		$('.scroller_1 .float_nav').css({'display':'block'});
	}
	else if ($(this).scrollTop() < scroller_1_anchor && $('.scroller_1').css('position') != 'relative')
	{    
		$('.scroller_1').css({'position': 'relative', 'display': 'inline-block', 'width':'100%'});
		$('.scroller_1 .hook_link').css({'color': '#ccc', 'text-decoration': 'none', 'font-size': '18px', 'font-weight': '200', 'font-style':'tahoma', 'margin-left':'15%' });
		$('.scroller_1 .float_nav').css({'display':'none'});
	}


	if ($(this).scrollTop() >= scroller_2_anchor && $('.scroller_2').css('position') != 'fixed')
	{   
		$('.hook').css({
			'position': 'fixed',
			'top': '0px',
			'width':'100%',
			'background-color':'rgba(0, 0, 150)',
			'padding':'1%',
			'box-shadow':'#ccc 2px 2px 2px'
		});
		$('.scroller_2 .hook_link').css({
			'color': '#ccc',
			'text-decoration': 'none',
			'font-size': '25px',
			'font-weight': '400',
			'font-style':'tahoma',
			'font-weight':'400',
			'margin-left':'15%' 
		});
		$('.scroller_2 .float_nav').css({'display':'block'});
	}
	else if ($(this).scrollTop() < scroller_2_anchor && $('.scroller_2').css('position') != 'relative')
	{    
		$('.scroller_2').css({'position': 'relative', 'display': 'inline-block', 'width':'100%'});
		$('.scroller_2 .hook_link').css({'color': '#ccc', 'text-decoration': 'none', 'font-size': '18px', 'font-weight': '200', 'font-style':'tahoma', 'margin-left':'15%' });
		$('.scroller_2 .float_nav').css({'display':'none'});
	}

	if ($(this).scrollTop() >= scroller_3_anchor && $('.scroller_3').css('position') != 'fixed')
	{    
		$('.hook').css({
			'position': 'fixed',
			'top': '0px',
			'width':'100%',
			'background-color':'rgba(0, 0, 150)',
			'padding':'1%',
			'box-shadow':'#ccc 2px 2px 2px'
		});
		$('.scroller_3 .hook_link').css({
			'color': '#ccc',
			'text-decoration': 'none',
			'font-size': '25px',
			'font-weight': '400',
			'font-style':'tahoma',
			'font-weight':'400',
			'margin-left':'15%' 
		});
		$('.scroller_3 .float_nav').css({'display':'block'});

	}
	else if ($(this).scrollTop() < scroller_3_anchor && $('.scroller_3').css('position') != 'relative')
	{   
		$('.scroller_3').css({'position': 'relative', 'display': 'inline-block', 'width':'100%'});
		$('.scroller_3 .hook_link').css({'color': '#ccc', 'text-decoration': 'none', 'font-size': '18px', 'font-weight': '200', 'font-style':'tahoma', 'margin-left':'15%' });
		$('.scroller_3 .float_nav').css({'display':'none'});
	}
});




var _qevents = _qevents || [];
(function() {
	var elem = document.createElement('script');
	elem.src = (document.location.protocol == 'https:' ? 'https://secure' : 'http://edge') + '.quantserve.com/quant.js';
	elem.async = true;
	elem.type = 'text/javascript';
	var scpt = document.getElementsByTagName('script')[0];
	scpt.parentNode.insertBefore(elem, scpt);
})();
_qevents.push({
	qacct:'p-dgZ4_09vZKC4w'
});
// Using jQuery Event API v1.3
jQuery('#article_link').on('click', function() {
	ga('send', 'event', 'article', 'http://www.virendrachandak.com/techtalk/make-a-div-stick-to-top-when-scrolled-to/', 'go-to-article', 1);
	_gaq.push(['_trackEvent', 'article', 'http://www.virendrachandak.com/techtalk/make-a-div-stick-to-top-when-scrolled-to/', 'go-to-article', 1, true]);
});
jQuery('#source_link').on('click', function() {
	ga('send', 'event', 'download', 'http://www.virendrachandak.com/demos/make-a-div-stick-to-top-when-scrolled-to.zip', 'download-source', 1);
	_gaq.push(['_trackEvent', 'download', 'http://www.virendrachandak.com/demos/make-a-div-stick-to-top-when-scrolled-to.zip', 'download-source', 1, true]);
});