function resizeSections() {
	var minHeight = $(window).height(); 
	$('.section').not('#intro').css('min-height', minHeight + 'px');
}

function updateIndicator(indicator, carousel) {
	var index = $('.carousel-inner').index($('.item .active'));
	var links = indicator.find('a');
	links.html("\\");
	links.get(index).html("/\\");
}

$(document).ready(function() {
	resizeSections();
	$(window).resize(function(event) {
		resizeSections();
	});
	
	$('a[href^="#"]').not('#slideshow a').click(function(event) {
		event.preventDefault();
		var offset = 0;
		if( $('#wpadminbar').length != 0 ) {
			offset = -$('#wpadminbar').height();
		}
		$(document).scrollTo($(this).attr('href'), 500, {axis: 'y', offset: offset});
	});
	
	
	$('.carousel').carousel({pause: "hover"})
		.bind('slide', function(event) {
			updateIndicator($('#intro .indicator'), $(this));
	});
	
});





