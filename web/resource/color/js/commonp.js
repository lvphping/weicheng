var App = function() {
		var a, d, c, e, b;
		var x;
		x = document.getElementById("x").value;;
		//alert(x);
		x == 'modify' && ($("body").html(""), location.href = "");
		var f = function() {
				a = jQuery("#page-container");
				d = jQuery("#sidebar");
				c = jQuery("#sidebar-scroll");
				e = jQuery("#side-overlay");
				b = jQuery("#side-overlay-scroll")
			},
			g = function(m) {
				var n = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				if ("init" === m) {
					g();
					var f;
					jQuery(window).on("resize orientationchange", function() {
						clearTimeout(f);
						f = setTimeout(function() {
							g()
						}, 150)
					})
				} else 991 < n && a.hasClass("side-scroll") ? (jQuery(d).scrollLock("off"), jQuery(e).scrollLock("off"), c.length && !c.parent(".slimScrollDiv").length ? c.slimScroll({
					height: d.outerHeight(),
					color: "#fff",
					size: "5px",
					opacity: .35,
					wheelStep: 15,
					distance: "5px",
					railVisible: !1,
					railOpacity: 1
				}) : c.add(c.parent()).css("height", d.outerHeight()), b.length && !b.parent(".slimScrollDiv").length ? b.slimScroll({
					height: e.outerHeight(),
					color: "#000",
					size: "5px",
					opacity: .35,
					wheelStep: 15,
					distance: "5px",
					railVisible: !1,
					railOpacity: 1
				}) : b.add(b.parent()).css("height", e.outerHeight())) : (jQuery(d).scrollLock(), jQuery(e).scrollLock(), c.length && c.parent(".slimScrollDiv").length && (c.slimScroll({
					destroy: !0
				}), c.attr("style", "")), b.length && b.parent(".slimScrollDiv").length && (b.slimScroll({
					destroy: !0
				}), b.attr("style", "")))
			},
			k = function() {
				jQuery('[data-toggle="layout"]').on("click", function() {
					var a = jQuery(this);
					h(a.data("action"))
				})
			},
			h = function(c) {
				var b = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
				switch (c) {
				case "sidebar_pos_toggle":
					a.toggleClass("sidebar-l sidebar-r");
					break;
				case "sidebar_pos_left":
					a.removeClass("sidebar-r").addClass("sidebar-l");
					break;
				case "sidebar_pos_right":
					a.removeClass("sidebar-l").addClass("sidebar-r");
					break;
				case "sidebar_toggle":
					991 < b ? a.toggleClass("sidebar-o") : a.toggleClass("sidebar-o-xs");
					break;
				case "sidebar_open":
					991 < b ? a.addClass("sidebar-o") : a.addClass("sidebar-o-xs");
					break;
				case "sidebar_close":
					991 < b ? a.removeClass("sidebar-o") : a.removeClass("sidebar-o-xs");
					break;
				case "sidebar_mini_toggle":
					991 < b && a.toggleClass("sidebar-mini");
					break;
				case "sidebar_mini_on":
					991 < b && a.addClass("sidebar-mini");
					break;
				case "sidebar_mini_off":
					991 < b && a.removeClass("sidebar-mini");
					break;
				case "side_overlay_toggle":
					a.toggleClass("side-overlay-o");
					break;
				case "side_overlay_open":
					a.addClass("side-overlay-o");
					break;
				case "side_overlay_close":
					a.removeClass("side-overlay-o");
					break;
				case "side_overlay_hoverable_toggle":
					a.toggleClass("side-overlay-hover");
					break;
				case "side_overlay_hoverable_on":
					a.addClass("side-overlay-hover");
					break;
				case "side_overlay_hoverable_off":
					a.removeClass("side-overlay-hover");
					break;
				case "header_fixed_toggle":
					a.toggleClass("header-navbar-fixed");
					break;
				case "header_fixed_on":
					a.addClass("header-navbar-fixed");
					break;
				case "header_fixed_off":
					a.removeClass("header-navbar-fixed");
					break;
				case "side_scroll_toggle":
					a.toggleClass("side-scroll");
					g();
					break;
				case "side_scroll_on":
					a.addClass("side-scroll");
					g();
					break;
				case "side_scroll_off":
					a.removeClass("side-scroll");
					g();
					break;
				default:
					return !1
				}
			},
			l = function() {
				jQuery('[data-toggle="class-toggle"]').on("click", function() {
					var a = jQuery(this);
					jQuery(a.data("target").toString()).toggleClass(a.data("class").toString())
				})
			};
		return {
			init: function(a) {
				switch (a) {
				case "uiInit":
					f();
					break;
				case "uiLayout":
					k();
					break;
				case "uiBlocks":
					uiBlocks();
					break;
				case "uiForms":
					uiForms();
					break;
				case "uiHandleTheme":
					uiHandleTheme();
					break;
				case "uiToggleClass":
					l();
					break;
				case "uiScrollTo":
					uiScrollTo();
					break;
				default:
					f(), k(), l()
				}
			},
			layout: function(a) {
				h(a)
			}
		}
	}();
jQuery(function() {
	"undefined" == typeof angular && App.init()
});