$(function () {
	let sectionIndex = 0;
	let myFullpage = new fullpage('#full',{
		responsiveWidth: 992,
		scrollingSpeed: 1200,
		onLeave: function(origin, destination, direction){
			sectionIndex = destination.index
			lastsection();
		}
	});
	maxCountsection = $('.section').length - 1;

	function lastsection(){
		if(sectionIndex == 0){
			$('#arrow').addClass('first')
		}
		else{
			$('#arrow').removeClass('first')
		}
		if(sectionIndex == maxCountsection){
			$('#arrow').addClass('last')
		}
		else{
			$('#arrow').removeClass('last')
		}
	}
	lastsection()

	function destroyFullpage(){
		if($(window).width() < 992){
			myFullpage.destroy('all');
		}
	}
	
	$(window).resize(function(){
		destroyFullpage()
	})
	destroyFullpage()

	$('.arr-d').click(function () {
		myFullpage.moveSectionDown();
		myFullpage.fitToSection();

	})
	$('.arr-up').click(function () {
		myFullpage.moveSectionUp();
	})
	
	$('#main').scroll(function() {

		var target = $(this).scrollTop();

		if($(window).width() < 992){
			if(target == 0) {

				$('#menu').removeClass('white')
	
			} else {
	
				$('#menu').addClass('white')
	
			}
		}
	
	});

	$('.burger').click(function(){
		$('#menu').toggleClass('open')
		$('html').toggleClass('hidden')
	})

	if($('.slider').length){
		$('.slider-wrap').slick({
			arrows: false,
			dots: true,
			fade: true
		});
	}
	
	
	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
	    $(this)
	    .addClass('active').siblings().removeClass('active')
	    .closest('div.tabs').find('div.tabs__content').hide().eq($(this).index()).fadeIn();
	});

	$('.change-tabs').on('click', 'li:not(.active)', function() {
	    $(this)
	    .addClass('active').siblings().removeClass('active')
	    .closest('.double-tabs').find('div.tabs').hide().eq($(this).index()).fadeIn();
	});
	
	if($('.fixmenu').length){
		
		for (let i = 0; i < $('.fixmenu').length; i++) {
			let contLink = $('.fixmenu').eq(i).find('.s-list').find('a').length
			for (let j = 0; j < contLink; j++) {
				$('.fixmenu').eq(i).find('.s-list').find('a').eq(j).attr('data-count', j+2)
			}
		}

		$('.fixmenu .s-list a').click(function(){
			if($(window).width() < 992){
				$('.burger').click()
			}else{
				myFullpage.moveTo($(this).attr('data-count'));
				return false;
			}
			
		}) 
		
		$('.s-menu a').click(function(){
			if($(window).width() < 992){
				$('.burger').click()
			}else{
				myFullpage.moveTo($(this).attr('data-count'));
				return false;
			}
		}) 
	}
	
	$('.mob-select select').change(function(e) {
 		let index = $(this).find('option:selected').index()
 		$(this).closest('.double-tabs').find('.change-tabs li').eq(index).click()
 		$(this).closest('.double-tabs').find('.mob-select2').removeClass('active')
 		$(this).closest('.double-tabs').find('.mob-select2').eq(index).addClass('active')
	});

	$('.mob-select2 select').change(function(e) {
 		let index = $(this).find('option:selected').index()
 		$(this).closest('.double-tabs').find('.tabs.active .tabs__caption li').eq(index).click()
	});


})

$(document).ready(function () {
	$('.preload').fadeOut();
})