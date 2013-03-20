function generateMap(target, markerPositions) {
	var target = $(target).addClass('maps');

	markerPositions[0] = parseFloat(markerPositions[0]);
	markerPositions[1] = parseFloat(markerPositions[1]);
	var marker = new google.maps.LatLng(markerPositions[0], markerPositions[1]);

	var style = [
		{
			stylers: [
				{ lightness: 5 },
				{ saturation: -99 },
				{ gamma: 0.83 },
				{ visibility: "on" }
			]
		},{
			featureType: "road",
			stylers: [
				{ gamma: 0.89 },
				{ saturation: -22 },
				{ lightness: -5 }
			]
		},{
			featureType: "poi",
			stylers: [
				{ visibility: "off" }
			]
		},{
			featureType: "road",
			elementType: "labels",
			stylers: [
				{ lightness: 39 }
			]
		},{
			featureType: "transit",
			stylers: [
				{ visibility: "off" }
			]
		},{
			featureType: "landscape.man_made",
			stylers: [
				{ visibility: "on" }
			]
		}
	]

	var mapOptions = {
		zoom: 15,
		scrollwheel: false,
		navigationControl: false,
		center: marker,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		disableDefaultUI: true,
		styles: style,
	};
	var map = new google.maps.Map(target.get(0),
		mapOptions);

	var m = new google.maps.Marker({
				position: marker,
				map: map
			});
 }

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






