var updatebreadcumb, firstTimeout, slideIndicatorTimeout;

jQuery(document).ready(function ($) {

	Reveal.initialize({
		width: '100%',
		height: '100%',
		margin: 0,
		minScale: 1,
		maxScale: 1,
		center: false,
		progress: true,
		slideNumber: true,
		dependencies: [{
				src: 'scripts/classList.js',
				condition: function () {
					return !document.body.classList;
				}
			},
			{
				src: 'scripts/menu.js',
				async: true
			},
			// { src: 'scripts/breadcrumb.js', async: true }
		],
		menu: {
			side: 'right',
			markers: true,
			openSlideNumber: true,
			themes: false,
			transitions: false,
			custom: [{
					title: 'Population et démographie',
					icon: '<i class="fa fa-users" aria-hidden="true"></i>',
					content: ''
				},
				{
					title: 'Infrastructure de mobilité',
					icon: '<i class="fa fa-train" aria-hidden="true"></i>',
					content: ''
				},
				{
					title: 'Secteurs sociaux',
					icon: '<i class="fa fa-building" aria-hidden="true"></i>',
					content: ''
				},
				{
					title: 'Secteurs économiques',
					icon: '<i class="fa fa-line-chart" aria-hidden="true"></i>',
					content: ''
				},
				{
					title: 'Dynamique Entrepreneuriale',
					icon: '<i class="fa fa-briefcase" aria-hidden="true"></i>',
					content: ''
				}
			]
		}
	});

	Reveal.addEventListener('ready', function (event) {
		// event.currentSlide, event.indexh, event.indexv
		ajustRevealHeight(event.currentSlide);
		/*if ($(document).height() < $(window).height() + $('footer').outerHeight(true)) {
			$("#section03").hide();
		}*/
		setTimeout(function () {
			// $("#section03").hide();
			/*if ($(document).height() > $(window).height() + $('footer').outerHeight(true)) {
				$("#section03").show();
				positionSlideIndicator()
			}*/
			ajustRevealHeight(event.currentSlide);
			positionSlideIndicator();
		}, 1000);
	});

	Reveal.addEventListener('slidechanged', function (event) {
		$("#section03").hide();

		setTimeout(function () {
			// $("#section03").hide();
			ajustRevealHeight(event.currentSlide);
			positionSlideIndicator();  
		}, 1000);
		clearTimeout(firstTimeout);
		// event.previousSlide, event.currentSlide, event.indexh, event.indexv
		ajustRevealHeight(event.currentSlide);
		var currentSlideTitle = $(event.currentSlide).attr("data-menu-title");
		var currentSlideId = $(event.currentSlide).attr("id");
		//update breadcumb
		if ($(event.previousSlide).hasClass('first')) {
			// setTimeout(function() {
			// 	$('#video-background').get(0).play()
			// }, 5);
			$("#grandParentSlide").text('');
			$("#grandParentSlide").text(currentSlideTitle);
			$("#grandParentSlide").attr('href', '#/' + currentSlideId);
			window.location.href = window.location.href.substring(0, window.location.href.indexOf('#/')) + '#/' + currentSlideId
			$("#indicatorGrand").show();
			$("#indicatorParent").hide();
			$("#indicatorChild").hide();
			$("#parentSlide").text('');
			$("#childSlide").text('');
		} else {
			if ($(event.currentSlide).hasClass('first')) {
				$("#grandParentSlide").text('Accueil');
				window.location.href = window.location.href.substring(0, window.location.href.indexOf('#/')) + "#/";
				$("#grandParentSlide").attr('href', '#/');
				$("#indicatorGrand").show();
				$("#indicatorParent").hide();
				$("#indicatorChild").hide();
				$("#parentSlide").text('');
				setTimeout(function () {
					$(".navigate-left").addClass('enabled');
				}, 10);
				$("#childSlide").text('');
				firstTimeout = setTimeout(function () {
					if ($(".reveal").css("display") != "none") {
						Reveal.next();
					}
				}, 3000);
			} else {
				if ($(event.currentSlide).hasClass('parent')) {
					$("#grandParentSlide").text(currentSlideTitle);
					window.location.href = window.location.href.substring(0, window.location.href.indexOf('#/')) + '#/' + currentSlideId
					$("#grandParentSlide").attr('href', '#/' + currentSlideId);
					$("#indicatorGrand").show();
					$("#indicatorParent").hide();
					$("#indicatorChild").hide();
					$("#parentSlide").text('');
					$("#childSlide").text('');
				} else {
					// if (window.location.href.indexOf('#/') !== -1) {
					// 	currentId = window.location.href.substring(window.location.href.indexOf('#/') + 2);
					// 	console.log('updating currentId')
					// }

					var currentSlideOrder = 0,
						parentOfCurrentSlide, parentOfCurrentSlideId;

					if (currentSlideId) {
						currentSlideOrder = parseInt($("#" + currentSlideId).attr("data-order"));
					}
					for (var i = currentSlideOrder - 1; i > 0; i--) {
						if ($($(".slides section:nth-child(" + i + ")")[0]).hasClass('parent')) {
							parentOfCurrentSlide = $($(".slides section:nth-child(" + i + ")")[0]).attr("data-menu-title");
							parentOfCurrentSlideId = $($(".slides section:nth-child(" + i + ")")[0]).attr("id");
							i = 0;
						}

					}
					$("#indicatorGrand").show();
					if (parentOfCurrentSlide) {
						$("#grandParentSlide").text(parentOfCurrentSlide);
						$("#grandParentSlide").attr('href', '#/' + parentOfCurrentSlideId);
					}
					$("#parentSlide").text(currentSlideTitle);
					window.location.href = window.location.href.substring(0, window.location.href.indexOf('#/')) + '#/' + currentSlideId
					$("#parentSlide").attr('href', '#/' + currentSlideId);
					$("#indicatorParent").show();
					$("#indicatorChild").hide();
				}
			}

		}

		if (Reveal.isLastSlide()) {
			setTimeout(function () {
				$(".navigate-right").addClass('enabled');
			}, 10);
		}
	});

	

	$('.reveal .header .hamburger').on('click', function () {
		var panel = "Slides";
		if ($(Reveal.getCurrentSlide()).hasClass('demographie') || $(Reveal.getCurrentSlide()).is('#ruche-demographie')) {
			panel = "Custom0";
		}
		if ($(Reveal.getCurrentSlide()).hasClass('infrastructure') || $(Reveal.getCurrentSlide()).is('#ruche-infrastructure')) {
			panel = "Custom1";
		}
		if ($(Reveal.getCurrentSlide()).hasClass('social') || $(Reveal.getCurrentSlide()).is('#ruche-social')) {
			panel = "Custom2";
		}
		if ($(Reveal.getCurrentSlide()).hasClass('economy') || $(Reveal.getCurrentSlide()).is('#ruche-economy')) {
			panel = "Custom3";
		}
		if ($(Reveal.getCurrentSlide()).hasClass('entreprenariat') || $(Reveal.getCurrentSlide()).is('#ruche-entreprenariat')) {
			panel = "Custom4";
		}
		openTabMenu(panel)
	});

	$('.reveal .slides .section.sommaire ul li').on('click', function () {
		var i = $(this).index();
		Reveal.slide(i++);
	});

	var currentId = null;

	if (window.location.href.indexOf('#/') !== -1) {
		currentId = window.location.href.substring(window.location.href.indexOf('#/') + 2);
	}

	var currentSlideOrder = 0;

	if (currentId) {
		currentSlideOrder = parseInt($("#" + currentId).attr("data-order"));
	}

	var goTo = currentSlideOrder == 0 ? 0 : currentSlideOrder - 1;

	Reveal.slide(goTo, 0, null);

	updatebreadcumb = function () {
		if (window.location.href.indexOf('#/') !== -1) {
			currentId = window.location.href.substring(window.location.href.indexOf('#/') + 2);
		}
		if (currentId) {
			currentSlideOrder = parseInt($("#" + currentId).attr("data-order"));
		}
		if (window.location.href.length == window.location.href.indexOf('#') + 1  || window.location.href.length == window.location.href.indexOf('#/') + 2 || window.location.href.length == window.location.href.indexOf('/') + 1 || window.location.href.indexOf('/') == -1 || window.location.href.indexOf('#') == -1) {
			$("#grandParentSlide").text('Accueil');
			$("#indicatorGrand").show();
			$("#indicatorParent").hide();
			$("#indicatorChild").hide();
			$("#parentSlide").text('');
			$("#childSlide").text('');
			/*setTimeout(function () {
				Reveal.next();
			}, 3000);*/
		}

		if ($(Reveal.getCurrentSlide()).hasClass('parent')) {
			$("#indicatorGrand").show();
			$("#grandParentSlide").text($(Reveal.getCurrentSlide()).attr("data-menu-title"));
			$("#grandParentSlide").attr('href', '#/' + $(Reveal.getCurrentSlide()).attr("id"));
			$("#indicatorParent").hide();
			$("#indicatorChild").hide();
			$("#parentSlide").text('');
			$("#childSlide").text('');
		}

		// if this is a child
		// $("#indicatorGrand").show();
		// $("#grandParentSlide").text(his parent);
		// $("#indicatorParent").show();
		// $("#parentSlide").text($(Reveal.getCurrentSlide()).attr("data-menu-title"));
		// $("#indicatorChild").hide();
		// $("#childSlide").text('');

		// $("#indicatorGrand").show();
		// $("#grandParentSlide").text($($( ".slides section:nth-child(" +  + ")" )[0]).attr("data-menu-title"));
		var parentOfCurrentSlide, parentOfCurrentSlideId;
		if ($(Reveal.getCurrentSlide()).hasClass('parent') == false && $(Reveal.getCurrentSlide()).hasClass('first') == false) {
			for (var i = currentSlideOrder - 1; i > 0; i--) {
				if ($($(".slides section:nth-child(" + i + ")")[0]).hasClass('parent')) {
					parentOfCurrentSlide = $($(".slides section:nth-child(" + i + ")")[0]).attr("data-menu-title");
					parentOfCurrentSlideId = $($(".slides section:nth-child(" + i + ")")[0]).attr("id");
					i = 0;
				}

			}
			$("#indicatorGrand").show();
			if (parentOfCurrentSlide) {
				$("#grandParentSlide").text(parentOfCurrentSlide);
				$("#grandParentSlide").attr('href', '#/' + parentOfCurrentSlideId);
			}
			$("#indicatorParent").show();
			$("#parentSlide").text($(Reveal.getCurrentSlide()).attr("data-menu-title"));
			$("#parentSlide").attr('href', '#/' + $(Reveal.getCurrentSlide()).attr("id"));
			$("#indicatorChild").hide();
			$("#childSlide").text('');
		}
	};

	// updatebreadcumb();

	$(".navigate-left").addClass('enabled');
	$(".navigate-up").hide();
	$(".navigate-down").hide();

	$(".controls").prepend('<div class="round-circle-right"></div>');
	$(".round-circle-right").css({
		"border-radius": "50%",
		"width": "40px",
		"height": "40px",
		"background": "transparent",
		"background-color": "white",
		"border": "2px solid white",
		"margin-top": "-39px",
		"margin-left": "62px"

	});
	$(".controls").prepend('<div class="round-circle-left"></div>');
	$(".round-circle-left").css({
		"border-radius": "50%",
		"width": "40px",
		"height": "40px",
		"background": "transparent",
		"background-color": "white",
		"border": "2px solid white",
		"margin-top": "34px",
		"margin-left": "7px"

	});
	$(".controls").append('<div id="section03" class="demo" style="display: none;"><a href="#" onclick="return false;"><span></span></a></div>');
	// $(".controls").append('<div id="section07" class="demo" style="display: none;"><a href="#" onclick="return false;"><span></span><span></span><span></span></a></div>');


	//menu styling
	$(window).load(function (e) {
		$("div.slide-menu-custom-panel").attr("style", "width: 100%;");
		// $(".toolbar-panel-button").on("click", function () {
		// 	if($(this).attr("data-panel").includes('Custom')) {
		// 		console.log('true')
		// 		closeMenu(e, true)
		// 	}
		// });
		updatebreadcumb();

		buildDataTabs();
	});

	/*$('body').scroll(function () {
		positionSlideIndicator();
	});*/

	var positionSlideIndicator = function () {   
		//alert($("body").hasScrollBar());
		//var div = $("body");
		//if (div[0].scrollHeight - div.scrollTop() < div.height()  ) {
		if ($("body").hasScrollBar()) { 
			$('#section03').show();
		} else {
			$('#section03').hide();
			//$('#section03').css("top", "90%");
		}
	};
});

function buildDataTabs() {
	$("div").find("[data-panel='Slides']")[1].innerHTML = ""
	var slidesPanel = $("div").find("[data-panel='Slides']")[1];
	var panel1 = $("div").find("[data-panel='Custom0']")[1];
	var panel2 = $("div").find("[data-panel='Custom1']")[1];
	var panel3 = $("div").find("[data-panel='Custom2']")[1];
	var panel4 = $("div").find("[data-panel='Custom3']")[1];
	var panel5 = $("div").find("[data-panel='Custom4']")[1];

	var slides = $(".slide-menu-item");

	// tabs content creation
	createContentTabMenu(slidesPanel, 'Slides', '')
	createContentTabMenu(panel1, 'Custom0', '.demographie')
	createContentTabMenu(panel2, 'Custom1', '.infrastructure')
	createContentTabMenu(panel3, 'Custom2', '.social')
	createContentTabMenu(panel4, 'Custom3', '.economy')
	createContentTabMenu(panel5, 'Custom4', '.entreprenariat')

	//
	// Handle mouse overs
	//
	var mouseSelectionEnabled = true;
	selectAll('.slide-menu-items li').forEach(function (item) {
		item.addEventListener('mouseenter', function (event) {
			if (mouseSelectionEnabled) {
				selectAll('.active-menu-panel .slide-menu-items li').forEach(function (i) {
					i.classList.remove('selected');
				});
				event.currentTarget.classList.add('selected');
			}
		});
		item.onclick = clicked;
	});

	if ($('.slide-menu-items li').hasClass('child')) {
		$('.slide-menu-items li.child').css("padding-left", "75px")
	}

	if ($('.slide-menu-items li').hasClass('parent')) {
		$('.slide-menu-items li.parent').css("padding-left", "40px")
	}

	if ($('.slide-menu-items li').hasClass('ruche')) {
		$('.slide-menu-items li.ruche').css("padding-left", "20px")
	}

	$(".sk-circle").hide();
	$(".reveal").show();
}

function createContentTabMenu(panel, dataPanel, categorieSelector) {
	panel.appendChild(create('ul', {
		class: 'slide-menu-items'
	}));
	// panels.appendChild(panel);
	var items = select('.slide-menu-panel[data-panel="' + dataPanel + '"] > .slide-menu-items');
	var slideCount = 0,
		type;
	selectAll('.slides > section' + categorieSelector).forEach(function (section, h) {
		
		h = parseInt($(section).attr("data-order")) - 1;
		type = $(section).is("[data-menu-class]") ? $(section).attr('data-menu-class') : ''; 
		
		var subsections = selectAll('section', section);
		if (subsections.length > 0) {
			subsections.forEach(function (subsection, v) {
				type += (v === 0 ? ' slide-menu-item ' : ' slide-menu-item-vertical ');
				var item = generateItem(type, subsection, slideCount, h, v);
				if (item) {
					slideCount++;
					items.appendChild(item);
				}
			});
		} else {
			type += " slide-menu-item ";
			if ($(section).hasClass('parent') && $(section).hasClass('ruche')) {
				type += ' parent ruche';
			} else {
				if ($(section).hasClass('parent')) {
					type += ' parent ';
				} else {
					type += ' child ';
				}
			}


			var item = generateItem(type, section, slideCount, h);
			if (item) {
				slideCount++;
				items.appendChild(item);
			}
		}
	});
	selectAll('.slide-menu-item, .slide-menu-item-vertical').forEach(function (i) {
		i.onclick = clicked;
	});
	highlightCurrentSlide();
}

function ajustRevealHeight(currentSlide) {
	$('.reveal').css('height', 'auto');
	var h = $(currentSlide).innerHeight();
	//if(h>$(window).height())
	$('.reveal').css('height', h);
}

// tabs menu content generation 
function disableMouseSelection() {
	mouseSelectionEnabled = false;
}

function reenableMouseSelection() {
	// wait until the mouse has moved before re-enabling mouse selection
	// to avoid selections on scroll
	select('nav.slide-menu').addEventListener('mousemove', function fn(e) {
		select('nav.slide-menu').removeEventListener('mousemove', fn);
		//XXX this should select the item under the mouse
		mouseSelectionEnabled = true;
	});
}

//
// Keyboard handling
//
function getOffset(el) {
	var _x = 0;
	var _y = 0;
	while (el && !isNaN(el.offsetLeft) && !isNaN(el.offsetTop)) {
		_x += el.offsetLeft - el.scrollLeft;
		_y += el.offsetTop - el.scrollTop;
		el = el.offsetParent;
	}
	return {
		top: _y,
		left: _x
	};
}

function visibleOffset(el) {
	var offsetFromTop = getOffset(el).top - el.offsetParent.offsetTop;
	if (offsetFromTop < 0) return -offsetFromTop
	var offsetFromBottom = el.offsetParent.offsetHeight - (el.offsetTop - el.offsetParent.scrollTop + el.offsetHeight);
	if (offsetFromBottom < 0) return offsetFromBottom;
	return 0;
}

function keepVisible(el) {
	var offset = visibleOffset(el);
	if (offset) {
		disableMouseSelection();
		el.scrollIntoView(offset > 0);
		reenableMouseSelection();
	}
}

function scrollItemToTop(el) {
	disableMouseSelection();
	el.offsetParent.scrollTop = el.offsetTop;
	reenableMouseSelection();
}

function scrollItemToBottom(el) {
	disableMouseSelection();
	el.offsetParent.scrollTop = el.offsetTop - el.offsetParent.offsetHeight + el.offsetHeight
	reenableMouseSelection();
}

function selectItem(el) {
	el.classList.add('selected');
	keepVisible(el);
	if (sticky && autoOpen) openItem(el);
}

function onDocumentKeyDown(event) {
	if (event.keyCode === 77) {
		toggleMenu();
	} else if (isOpen()) {
		event.stopImmediatePropagation();
		switch (event.keyCode) {
			// h, left - change panel
			case 72:
			case 37:
				prevPanel();
				break;
				// l, right - change panel
			case 76:
			case 39:
				nextPanel();
				break;
				// k, up
			case 75:
			case 38:
				var currItem = select('.active-menu-panel .slide-menu-items li.selected') || select('.active-menu-panel .slide-menu-items li.active');
				if (currItem) {
					selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
						item.classList.remove('selected')
					});
					var nextItem = select('.active-menu-panel .slide-menu-items li[data-item="' + (parseInt(currItem.getAttribute('data-item')) - 1) + '"]') || currItem;
					selectItem(nextItem);
				} else {
					var item = select('.active-menu-panel .slide-menu-items li.slide-menu-item');
					if (item) selectItem(item);
				}
				break;
				// j, down
			case 74:
			case 40:
				var currItem = select('.active-menu-panel .slide-menu-items li.selected') || select('.active-menu-panel .slide-menu-items li.active');
				if (currItem) {
					selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
						item.classList.remove('selected')
					});
					var nextItem = select('.active-menu-panel .slide-menu-items li[data-item="' + (parseInt(currItem.getAttribute('data-item')) + 1) + '"]') || currItem;
					selectItem(nextItem);
				} else {
					var item = select('.active-menu-panel .slide-menu-items li.slide-menu-item');
					if (item) selectItem(item);
				}
				break;
				// pageup, u
			case 33:
			case 85:
				var itemsAbove = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
					return visibleOffset(item) > 0;
				});
				var visibleItems = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
					return visibleOffset(item) == 0;
				});

				var firstVisible = (itemsAbove.length > 0 && Math.abs(visibleOffset(itemsAbove[itemsAbove.length - 1])) < itemsAbove[itemsAbove.length - 1].clientHeight ? itemsAbove[itemsAbove.length - 1] : visibleItems[0]);
				if (firstVisible) {
					if (firstVisible.classList.contains('selected') && itemsAbove.length > 0) {
						// at top of viewport already, page scroll (if not at start)
						// ...move selected item to bottom, and change selection to last fully visible item at top
						scrollItemToBottom(firstVisible);
						visibleItems = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
							return visibleOffset(item) == 0;
						});
						if (visibleItems[0] == firstVisible) {
							// prev item is still beyond the viewport (for custom panels)
							firstVisible = itemsAbove[itemsAbove.length - 1];
						} else {
							firstVisible = visibleItems[0];
						}
					}
					selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
						item.classList.remove('selected')
					});
					selectItem(firstVisible);
					// ensure selected item is positioned at the top of the viewport
					scrollItemToTop(firstVisible);
				}
				break;
				// pagedown, d
			case 34:
			case 68:
				var visibleItems = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
					return visibleOffset(item) == 0;
				});
				var itemsBelow = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
					return visibleOffset(item) < 0;
				});

				var lastVisible = (itemsBelow.length > 0 && Math.abs(visibleOffset(itemsBelow[0])) < itemsBelow[0].clientHeight ? itemsBelow[0] : visibleItems[visibleItems.length - 1]);
				if (lastVisible) {
					if (lastVisible.classList.contains('selected') && itemsBelow.length > 0) {
						// at bottom of viewport already, page scroll (if not at end)
						// ...move selected item to top, and change selection to last fully visible item at bottom
						scrollItemToTop(lastVisible);
						visibleItems = selectAll('.active-menu-panel .slide-menu-items li').filter(function (item) {
							return visibleOffset(item) == 0;
						});
						if (visibleItems[visibleItems.length - 1] == lastVisible) {
							// next item is still beyond the viewport (for custom panels)
							lastVisible = itemsBelow[0];
						} else {
							lastVisible = visibleItems[visibleItems.length - 1];
						}
					}
					selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
						item.classList.remove('selected')
					});
					selectItem(lastVisible);
					// ensure selected item is positioned at the bottom of the viewport
					scrollItemToBottom(lastVisible);
				}
				break;
				// home
			case 36:
				selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
					item.classList.remove('selected')
				});
				var item = select('.active-menu-panel .slide-menu-items li:first-of-type');
				if (item) {
					item.classList.add('selected');
					keepVisible(item);
				}
				break;
				// end
			case 35:
				selectAll('.active-menu-panel .slide-menu-items li').forEach(function (item) {
					item.classList.remove('selected')
				});
				var item = select('.active-menu-panel .slide-menu-items:last-of-type li:last-of-type');
				if (item) {
					item.classList.add('selected');
					keepVisible(item);
				}
				break;
				// space, return
			case 32:
			case 13:
				var currItem = select('.active-menu-panel .slide-menu-items li.selected');
				if (currItem) {
					openItem(currItem, true);
				}
				break;
				// esc
			case 27:
				closeMenu(null, true);
				break;
		}
	}
}

//
// Utilty functions
//

function openMenu(event) {
	if (event) event.preventDefault();
	if (!isOpen()) {
		select('body').classList.add('slide-menu-active');
		select('.reveal').classList.add('has-undefined-right');
		select('.slide-menu').classList.add('active');
		select('.slide-menu-overlay').classList.add('active');

		// identify active theme
		// selectAll('div[data-panel="Themes"] li').forEach(function (i) {
		// 	i.classList.remove('active')
		// });
		// select('li[data-theme="' + select('#theme').getAttribute('href') + '"]').classList.add('active');

		// identify active transition
		// selectAll('div[data-panel="Transitions"] li').forEach(function (i) {
		// 	i.classList.remove('active')
		// });
		// select('li[data-transition="' + Reveal.getConfig().transition + '"]').classList.add('active');

		// set item selections to match active items
		var items = selectAll('.slide-menu-panel li.active')
		items.forEach(function (i) {
			i.classList.add('selected');
			keepVisible(i);
		});
	}
}

function closeMenu(event, force) {
	if (event) event.preventDefault();
	select('body').classList.remove('slide-menu-active');
	select('.reveal').classList.remove('has-undefined-right');
	select('.slide-menu').classList.remove('active');
	select('.slide-menu-overlay').classList.remove('active');
	selectAll('.slide-menu-panel li.selected').forEach(function (i) {
		i.classList.remove('selected')
	});
}

function toggleMenu(event) {
	if (isOpen()) {
		closeMenu(event, true);
	} else {
		openMenu(event);
	}
}

function isOpen() {
	return select('body').classList.contains('slide-menu-active');
}

function openTabMenu(tab) {
	openMenu();
	var panel = tab;
	if (typeof tab !== 'string') {
		panel = tab.currentTarget.getAttribute('data-panel');
	}
	select('.slide-menu-toolbar > li.active-toolbar-button').classList.remove('active-toolbar-button');
	select('li[data-panel="' + panel + '"]').classList.add('active-toolbar-button');
	select('.slide-menu-panel.active-menu-panel').classList.remove('active-menu-panel');
	select('div[data-panel="' + panel + '"]').classList.add('active-menu-panel');

	return false;
}

function openPanel(e) {
	openMenu();
	var panel = e;
	if (typeof e !== 'string') {
		panel = e.currentTarget.getAttribute('data-panel');
	}
	select('.slide-menu-toolbar > li.active-toolbar-button').classList.remove('active-toolbar-button');
	select('li[data-panel="' + panel + '"]').classList.add('active-toolbar-button');
	select('.slide-menu-panel.active-menu-panel').classList.remove('active-menu-panel');
	select('div[data-panel="' + panel + '"]').classList.add('active-menu-panel');
}

function nextPanel() {
	var next = (parseInt(select('.active-toolbar-button').getAttribute('data-button')) + 1) % buttons;
	openPanel(select('.toolbar-panel-button[data-button="' + next + '"]').getAttribute('data-panel'));
}

function prevPanel() {
	var next = parseInt(select('.active-toolbar-button').getAttribute('data-button')) - 1;
	if (next < 0) {
		next = buttons - 1;
	}
	openPanel(select('.toolbar-panel-button[data-button="' + next + '"]').getAttribute('data-panel'));
}

function openItem(item, force) {
	var h = parseInt(item.getAttribute('data-slide-h'));
	var v = parseInt(item.getAttribute('data-slide-v'));
	var theme = item.getAttribute('data-theme');
	var transition = item.getAttribute('data-transition');
	if (!isNaN(h) && !isNaN(v)) {
		Reveal.slide(h, v);
		updatebreadcumb();
		closeMenu();
	} else if (theme) {
		select('#theme').setAttribute('href', theme);
		closeMenu();
	} else if (transition) {
		Reveal.configure({
			transition: transition
		});
		closeMenu();
	} else {
		var link = select('a', item);
		if (link) {
			if (force || !sticky || (autoOpen && link.href.startsWith('#') || link.href.startsWith(window.location.origin + window.location.pathname + '#'))) {
				link.click();
			}
		}
		closeMenu();
	}
}

function clicked(event) {
	if (event.target.nodeName !== 'A') {
		event.preventDefault();
	}
	openItem(event.currentTarget);
}

function highlightCurrentSlide() {
	var state = Reveal.getState();
	selectAll('li.slide-menu-item, li.slide-menu-item-vertical').forEach(function (item) {
		item.classList.remove('past');
		item.classList.remove('active');
		item.classList.remove('future');

		var h = parseInt(item.getAttribute('data-slide-h'));
		var v = parseInt(item.getAttribute('data-slide-v'));
		if (h < state.indexh || (h === state.indexh && v < state.indexv)) {
			item.classList.add('past');
		} else if (h === state.indexh && v === state.indexv) {
			item.classList.add('active');
		} else {
			item.classList.add('future');
		}
	});
}

function generateItem(type, section, i, h, v) {
	var link = '/#/' + h;
	if (typeof v === 'number' && !isNaN(v)) link += '/' + v;

	function text(selector, parent) {
		var el = (parent ? select(selector, section) : select(selector));
		if (el) return el.textContent;
		return null;
	}
	var title = section.getAttribute('data-menu-title') ||
		text('.menu-title', section) ||
		text(titleSelector, section);

	if (!title && useTextContentForMissingTitles) {
		// attempt to figure out a title based on the text in the slide
		title = section.textContent.trim();
		if (title) {
			title = title.split('\n')
				.map(function (t) {
					return t.trim()
				}).join(' ').trim()
				.replace(/^(.{16}[^\s]*).*/, '$1') // limit to 16 chars plus any consecutive non-whitespace chars (to avoid breaking words)
				.replace(/&/g, '&amp;')
				.replace(/</g, '&lt;')
				.replace(/>/g, '&gt;')
				.replace(/"/g, '&quot;')
				.replace(/'/g, '&#039;') + '...';
		}
	}

	if (!title) {
		if (hideMissingTitles) return '';
		type += ' no-title';
		title = 'Slide ' + i;
	}

	var item = create('li', {
		class: type,
		'data-item': i,
		'data-slide-h': h,
		'data-slide-v': (v === undefined ? 0 : v)
	});

	if (type.includes('parent')) {
		item.appendChild(create('i', {
			class: 'fa fa-check-circle past'
		}));
		item.appendChild(create('i', {
			class: 'fa fa-check-circle active'
		}));
		item.appendChild(create('i', {
			class: 'fa fa-check-circle future'
		}));
	} else {
		item.appendChild(create('i', {
			class: 'fa fa-dot-circle-o past'
		}));
		item.appendChild(create('i', {
			class: 'fa fa-dot-circle-o active'
		}));
		item.appendChild(create('i', {
			class: 'fa fa-dot-circle-o future'
		}));
	}


	// if (numbers) {
	// 	// Number formatting taken from reveal.js
	// 	var value = [];
	// 	var format = 'h.v';

	// 	// Check if a custom number format is available
	// 	if (typeof numbers === 'string') {
	// 		format = numbers;
	// 	} else if (typeof config.slideNumber === 'string') {
	// 		// Take user defined number format for slides
	// 		format = config.slideNumber;
	// 	}

	// 	switch (format) {
	// 		case 'c':
	// 			value.push(i);
	// 			break;
	// 		case 'c/t':
	// 			value.push(i, '/', Reveal.getTotalSlides());
	// 			break;
	// 		case 'h/v':
	// 			value.push(h + 1);
	// 			if (typeof v === 'number' && !isNaN(v)) value.push('/', v + 1);
	// 			break;
	// 		default:
	// 			value.push(h + 1);
	// 			if (typeof v === 'number' && !isNaN(v)) value.push('.', v + 1);
	// 	}

	// 	item.appendChild(create('span', {
	// 		class: 'slide-menu-item-number'
	// 	}, value.join('') + '. '));
	// }

	item.appendChild(create('span', {
		class: 'slide-menu-item-title'
	}, title));

	return item;
}

function select(selector, el) {
	if (!el) {
		el = document;
	}
	return el.querySelector(selector);
}

function selectAll(selector, el) {
	if (!el) {
		el = document;
	}
	return Array.prototype.slice.call(el.querySelectorAll(selector));
}

function create(tagName, attrs, content) {
	var el = document.createElement(tagName);
	if (attrs) {
		Object.getOwnPropertyNames(attrs).forEach(function (n) {
			el.setAttribute(n, attrs[n]);
		});
	}
	if (content) el.innerHTML = content;
	return el;
}
/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       // Edge (IE 12+) => return version number
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}
$(window).load(function() {
	//alert('IE ' + detectIE());
	var ie = detectIE();
	if(ie != false && ie != '14'){
		$( ".reveal" ).show();
	}
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");
});
$.fn.hasScrollBar = function() {
    return this.get(0).scrollHeight > this.get(0).clientHeight;
};

var verticalScrollPresent = function()  
{
  return (document.documentElement.scrollHeight !== document.documentElement.clientHeight);
}