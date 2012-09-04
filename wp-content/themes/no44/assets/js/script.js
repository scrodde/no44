

function resizeSections() {
	var minHeight = $(window).height(); 
	$('.section').css('min-height', minHeight + 'px');
}

function updateIndicator(carousel) {
	var index = $('.item.active', carousel).index();
	var links = $('.indicator a', carousel);
	links.removeClass('active');
	links.eq(index).addClass('active');
}

function positionFloats() {
	
	$('#widget-area-one').css('left', $('#work').offset().left - $('#widget-area-one').width() +'px');
	$('#widget-area-two').css('left', $('#work').offset().left + $('#work').width() - 50 + 'px');
}

$(document).ready(function() {
	$(window).resize(function(event) {
		resizeSections();
		positionFloats();
	});
	
	$('a[href^="#"]').not('.carousel a').click(function(event) {
		event.preventDefault();
		var offset = 0;
		if( $('#wpadminbar').length != 0 ) {
			offset = -$('#wpadminbar').height()+2;
		}
		$(document).scrollTo($(this).attr('href'), 500, {axis: 'y', offset: offset});
	});
	
	
	$('#slideshow.carousel').carousel({
		pause: "hover",
		interval: 5000
	});
	
	$('#project-listing .carousel').carousel({
		pause: "hover",
		interval: 5000000
	});
	
	$('.carousel').bind('slid', function(event) {
			updateIndicator($(this));
	}).each(function() {
		updateIndicator($(this));
	});
	
	$('.carousel .indicator a').click(function() {
		event.preventDefault();
		var index = $(this).index();
		$(this).closest('.carousel').carousel(index);
	});
	
	$('.nav').scrollspy();
	
	var usPage = $('#us');
	$(window).scroll(function(event) {
		
		$('.nav a').each(function() {
			$this = $(this);
			if( (($this.offset().top + $this.height())  > usPage.offset().top) &&
				(($this.offset().top + $(this).height()) < (usPage.offset().top + usPage.height())) ){
				$this.addClass('white');
			}else {
				$this.removeClass('white');
			}
		});
	});
	
	resizeSections();
	positionFloats();
});






