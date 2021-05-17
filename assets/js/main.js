$(function () {
	let sectionIndex = 0;
	let myFullpage = new fullpage('#full', {
		licenseKey: '66E637F1-1E0E4092-958702CF-7214086E',
		responsiveWidth: 992,
		scrollingSpeed: 1200,
		onLeave: function (origin, destination, direction) {
			sectionIndex = destination.index
			menuListActive();
			lastsection();
			pageMenu();
			downblock();
			sectionFon();
		}
	});
	window.onresize = function (event) {
		myFullpage.reBuild();
	};
	maxCountsection = $('.section').length - 1;
	function pageMenu() {
		if (sectionIndex <= 1) {
			$('#fixmenu-new li a').removeClass('active')
			$('#fixmenu-new li a').eq(0).addClass('active');
		}
		else {
			$('#fixmenu-new li a').removeClass('active')
			$('#fixmenu-new li a').eq(sectionIndex - 1).addClass('active');
		}

	}
	function downblock() {
		if ($('#fixmenu-new').length != 0) {
			if ($(window).width() > 991) {
				if (sectionIndex < 1) {
					$('.schetchik').fadeIn()
					$('.s-menu-btn').hide()
				}
				else {
					$('.schetchik').hide()
					$('.s-menu-btn').fadeIn()
				}
			}
		}
	}
	function sectionFon() {
		if ($('#fixmenu-new').length != 0) {
			if (sectionIndex > 0) {
				if ($('.section').eq(sectionIndex).css('background-image') != "none") {
					$('#menu').addClass('notfon')
				}
				else {
					$('#menu').removeClass('notfon')
				}
			}
			else {
				$('#menu').removeClass('notfon')
			}
		}
	}
	function lastsection() {
		if (sectionIndex == 0) {
			$('#arrow').addClass('first')
		}
		else {
			$('#arrow').removeClass('first')
		}
		if (sectionIndex == maxCountsection) {
			$('#arrow').addClass('last')
		}
		else {
			$('#arrow').removeClass('last')
		}
	}
	lastsection()

	function menuListActive() {
		if ($('#fixmenu-new').length == 0) {
			$('.menu-list ul li a').removeClass('active')
			$('.menu-list ul li a').eq(sectionIndex).addClass('active')
		}
	}
	menuListActive()

	function destroyFullpage() {
		if ($(window).width() < 992) {
			myFullpage.destroy('all');
		}
	}



	$(window).resize(function () {
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

	$('#main').scroll(function () {

		var target = $(this).scrollTop();

		if ($(window).width() < 992) {
			if (target == 0) {

				$('#menu').removeClass('white')

			} else {

				$('#menu').addClass('white')

			}
		}

	});

	$('.burger').click(function () {
		$('#menu').toggleClass('open')
		$('html').toggleClass('hidden')
	})

	if ($('.slider').length) {
		$('.slider-wrap').slick({
			arrows: false,
			dots: true,
			fade: true
		});
	}


	$('ul.tabs__caption').on('click', 'li:not(.active)', function () {
		if ($(window).width() > 767) {
			$(this)
				.addClass('active').siblings().removeClass('active')
				.closest('div.tabs').find('div.tabs__content').hide().eq($(this).index()).fadeIn().addClass('active');
		}
		else {
			$(this)
				.addClass('active').siblings().removeClass('active')
				.closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
		}
	});

	$('.change-tabs').on('click', 'li:not(.active)', function () {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('.double-tabs').find('div.tabs').hide().eq($(this).index()).fadeIn();
	});

	if ($('.fixmenu').length) {

		for (let i = 0; i < $('.fixmenu').length; i++) {
			let contLink = $('.fixmenu').eq(i).find('.s-list').find('a').length
			for (let j = 0; j < contLink; j++) {
				$('.fixmenu').eq(i).find('.s-list').find('a').eq(j).attr('data-count', j + 2)
			}
		}

		$('.fixmenu .s-list a').click(function () {
			if ($(window).width() < 992) {
				$('.burger').click()
			} else {
				myFullpage.moveTo($(this).attr('data-count'));
				return false;
			}

		})

		$('.s-menu a').click(function () {
			if ($(window).width() < 992) {
				$('.burger').click()
			} else {
				myFullpage.moveTo($(this).attr('data-count'));
				return false;
			}
		})

	}

	$('.mob-select1 select').change(function (e) {
		let index = $(this).find('option:selected').index()
		console.log(index)
		$(this).closest('.double-tabs').find('.change-tabs li').eq(index).click()
		$(this).closest('.double-tabs').find('.mob-select2').removeClass('active')
		$(this).closest('.double-tabs').find('.mob-select2').eq(index).addClass('active')
	});

	// $('.mob-select2 select').change(function(e) {
	// 		let index = $(this).find('option:selected').index()
	// 		$(this).closest('.double-tabs').find('.tabs.active .tabs__caption li').eq(index).click()
	// });

	$('.mob-select2 select').change(function (e) {
		let index = $(this).find('option:selected').index()
		$(this).closest('.double-tabs').find('.tabs.active .tabs__caption li').eq(index).click()
	});

	document.ondragstart = noselect;
	document.onselectstart = noselect;
	document.oncontextmenu = noselect;
	function noselect() { return false; }
})

function UpdateCount(id) {
	let count_raw = $('#span-' + id + '').text();
	let link = $('[onclick="UpdateCount(' + id + ')"]').attr('href');
	let count = parseInt(count_raw.replace(/[^\d]/g, ''));
	count = count + 1;
	$.ajax({
		type: "POST",
		url: "/catalog/view/theme/pax/assets/ajax/update_count.php",
		data: { 'article_id': id, 'download_count': count },
		success: function (html) {
			$('#span-' + id + '').html('Скачано: ' + html);
		}
	});
	if (link.indexOf('blog/article/download') > 0) { } else {
		$.ajax({
			type: "POST",
			url: "/index.php?route=blog/article/download&article_id=" + id + "&download_id=",
			data: { 'article_id': id, 'download_count': count },
			success: function () {
				//	console.log('sent 2');
			}
		});
	}
}

// $(document).ready(function () {
// 	$('.preload').fadeOut();
// })

document.addEventListener("DOMContentLoaded", function () {
	var scrollbar = document.body.clientWidth - window.innerWidth + 'px';
	$('.s-menu-btn button').click(function () {
		$('#openModal').fadeIn();
		$('#thanks').hide();
		$("#callback1").show();
		let button = $(this).text();
		$('.modal-title').text(button);
		$("#button").val(button);
		let thread = $('#menu').find('a.active').text();
		if (thread != '') $("#thread").val(thread);
		let block_raw = $(this).parent().siblings('.s-list');
		let block = block_raw.find('a.active').text();
		if (block != '') $("#block").val(block);
	});
	$('.close').click(function () {
		$('#openModal').fadeOut()
		return false;
	});
	var sect = $('.fixmenu.s-menu2').find('li:eq(0)').text();
	$('#block').val(sect);
	$('#thread').val(sect);
});
$('#openModal').mouseup(function (e) {
	var div = $(".modal-dialog");
	if (!div.is(e.target)
		&& div.has(e.target).length === 0) {
		$('#openModal').fadeOut()
	}
});
!function (a) { "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : jQuery) }(function (a) { var b, c = navigator.userAgent, d = /iphone/i.test(c), e = /chrome/i.test(c), f = /android/i.test(c); a.mask = { definitions: { 9: "[0-9]", a: "[A-Za-z]", "*": "[A-Za-z0-9]" }, autoclear: !0, dataName: "rawMaskFn", placeholder: "_" }, a.fn.extend({ caret: function (a, b) { var c; if (0 !== this.length && !this.is(":hidden")) return "number" == typeof a ? (b = "number" == typeof b ? b : a, this.each(function () { this.setSelectionRange ? this.setSelectionRange(a, b) : this.createTextRange && (c = this.createTextRange(), c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", a), c.select()) })) : (this[0].setSelectionRange ? (a = this[0].selectionStart, b = this[0].selectionEnd) : document.selection && document.selection.createRange && (c = document.selection.createRange(), a = 0 - c.duplicate().moveStart("character", -1e5), b = a + c.text.length), { begin: a, end: b }) }, unmask: function () { return this.trigger("unmask") }, mask: function (c, g) { var h, i, j, k, l, m, n, o; if (!c && this.length > 0) { h = a(this[0]); var p = h.data(a.mask.dataName); return p ? p() : void 0 } return g = a.extend({ autoclear: a.mask.autoclear, placeholder: a.mask.placeholder, completed: null }, g), i = a.mask.definitions, j = [], k = n = c.length, l = null, a.each(c.split(""), function (a, b) { "?" == b ? (n--, k = a) : i[b] ? (j.push(new RegExp(i[b])), null === l && (l = j.length - 1), k > a && (m = j.length - 1)) : j.push(null) }), this.trigger("unmask").each(function () { function h() { if (g.completed) { for (var a = l; m >= a; a++)if (j[a] && C[a] === p(a)) return; g.completed.call(B) } } function p(a) { return g.placeholder.charAt(a < g.placeholder.length ? a : 0) } function q(a) { for (; ++a < n && !j[a];); return a } function r(a) { for (; --a >= 0 && !j[a];); return a } function s(a, b) { var c, d; if (!(0 > a)) { for (c = a, d = q(b); n > c; c++)if (j[c]) { if (!(n > d && j[c].test(C[d]))) break; C[c] = C[d], C[d] = p(d), d = q(d) } z(), B.caret(Math.max(l, a)) } } function t(a) { var b, c, d, e; for (b = a, c = p(a); n > b; b++)if (j[b]) { if (d = q(b), e = C[b], C[b] = c, !(n > d && j[d].test(e))) break; c = e } } function u() { var a = B.val(), b = B.caret(); if (o && o.length && o.length > a.length) { for (A(!0); b.begin > 0 && !j[b.begin - 1];)b.begin--; if (0 === b.begin) for (; b.begin < l && !j[b.begin];)b.begin++; B.caret(b.begin, b.begin) } else { for (A(!0); b.begin < n && !j[b.begin];)b.begin++; B.caret(b.begin, b.begin) } h() } function v() { A(), B.val() != E && B.change() } function w(a) { if (!B.prop("readonly")) { var b, c, e, f = a.which || a.keyCode; o = B.val(), 8 === f || 46 === f || d && 127 === f ? (b = B.caret(), c = b.begin, e = b.end, e - c === 0 && (c = 46 !== f ? r(c) : e = q(c - 1), e = 46 === f ? q(e) : e), y(c, e), s(c, e - 1), a.preventDefault()) : 13 === f ? v.call(this, a) : 27 === f && (B.val(E), B.caret(0, A()), a.preventDefault()) } } function x(b) { if (!B.prop("readonly")) { var c, d, e, g = b.which || b.keyCode, i = B.caret(); if (!(b.ctrlKey || b.altKey || b.metaKey || 32 > g) && g && 13 !== g) { if (i.end - i.begin !== 0 && (y(i.begin, i.end), s(i.begin, i.end - 1)), c = q(i.begin - 1), n > c && (d = String.fromCharCode(g), j[c].test(d))) { if (t(c), C[c] = d, z(), e = q(c), f) { var k = function () { a.proxy(a.fn.caret, B, e)() }; setTimeout(k, 0) } else B.caret(e); i.begin <= m && h() } b.preventDefault() } } } function y(a, b) { var c; for (c = a; b > c && n > c; c++)j[c] && (C[c] = p(c)) } function z() { B.val(C.join("")) } function A(a) { var b, c, d, e = B.val(), f = -1; for (b = 0, d = 0; n > b; b++)if (j[b]) { for (C[b] = p(b); d++ < e.length;)if (c = e.charAt(d - 1), j[b].test(c)) { C[b] = c, f = b; break } if (d > e.length) { y(b + 1, n); break } } else C[b] === e.charAt(d) && d++, k > b && (f = b); return a ? z() : k > f + 1 ? g.autoclear || C.join("") === D ? (B.val() && B.val(""), y(0, n)) : z() : (z(), B.val(B.val().substring(0, f + 1))), k ? b : l } var B = a(this), C = a.map(c.split(""), function (a, b) { return "?" != a ? i[a] ? p(b) : a : void 0 }), D = C.join(""), E = B.val(); B.data(a.mask.dataName, function () { return a.map(C, function (a, b) { return j[b] && a != p(b) ? a : null }).join("") }), B.one("unmask", function () { B.off(".mask").removeData(a.mask.dataName) }).on("focus.mask", function () { if (!B.prop("readonly")) { clearTimeout(b); var a; E = B.val(), a = A(), b = setTimeout(function () { B.get(0) === document.activeElement && (z(), a == c.replace("?", "").length ? B.caret(0, a) : B.caret(a)) }, 10) } }).on("blur.mask", v).on("keydown.mask", w).on("keypress.mask", x).on("input.mask paste.mask", function () { B.prop("readonly") || setTimeout(function () { var a = A(!0); B.caret(a), h() }, 0) }), e && f && B.off("input.mask").on("input.mask", u), A() }) } }) });
$(document).ready(function () {
	$("#phone").mask("+7 (999) 999-9999");
});

$("#callback").submit(function () {
	var str = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "/catalog/view/theme/pax/assets/ajax/mail.php",
		data: str,
		success: function (html) {
			$('#thanks').html(html);
			$("#thanks").show();
			$("#callback").hide();
			$('input').val('');
		}
	});
	return false;


});

$(document).ready(function () {
	$('.preload').fadeOut();
});