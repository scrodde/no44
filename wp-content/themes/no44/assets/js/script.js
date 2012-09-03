function resizeSections() {
	var minHeight = $(window).height(); 
	$('.section').not('#intro').css('min-height', minHeight + 'px');
}

function updateIndicator(carousel) {
	var index = $('.item.active', carousel).index();
	var links = $('.indicator a', carousel);
	links.removeClass('active');
	links.eq(index).addClass('active');
}

$(document).ready(function() {
	$(window).resize(function(event) {
		resizeSections();
	});
	
	$('a[href^="#"]').not('.carousel a').click(function(event) {
		event.preventDefault();
		var offset = 0;
		if( $('#wpadminbar').length != 0 ) {
			offset = -$('#wpadminbar').height();
		}
		$(document).scrollTo($(this).attr('href'), 500, {axis: 'y', offset: offset});
	});
	
	
	$('.carousel').carousel({pause: "hover"})
		.bind('slid', function(event) {
			updateIndicator($(this));
	}).each(function() {
		updateIndicator($(this));
	});
	$('.carousel .indicator a').click(function() {
		event.preventDefault();
		var index = $(this).index();
		$(this).closest('.carousel').carousel(index);
		console.log(index);
	});
	
	
	resizeSections();
});






