!function (n) {
  var e = {};

  function t(o) {
    if (e[o]) return e[o].exports;
    var a = e[o] = {i: o, l: !1, exports: {}};
    return n[o].call(a.exports, a, a.exports, t), a.l = !0, a.exports
  }

  t.m = n, t.c = e, t.d = function (n, e, o) {
    t.o(n, e) || Object.defineProperty(n, e, {enumerable: !0, get: o})
  }, t.r = function (n) {
    "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(n, Symbol.toStringTag, {value: "Module"}), Object.defineProperty(n, "__esModule", {value: !0})
  }, t.t = function (n, e) {
    if (1 & e && (n = t(n)), 8 & e) return n;
    if (4 & e && "object" == typeof n && n && n.__esModule) return n;
    var o = Object.create(null);
    if (t.r(o), Object.defineProperty(o, "default", {
      enumerable: !0,
      value: n
    }), 2 & e && "string" != typeof n) for (var a in n) t.d(o, a, function (e) {
      return n[e]
    }.bind(null, a));
    return o
  }, t.n = function (n) {
    var e = n && n.__esModule ? function () {
      return n.default
    } : function () {
      return n
    };
    return t.d(e, "a", e), e
  }, t.o = function (n, e) {
    return Object.prototype.hasOwnProperty.call(n, e)
  }, t.p = "", t(t.s = 4)
}([function (n, e, t) {
  var o = t(1), a = t(2);
  "string" == typeof (a = a.__esModule ? a.default : a) && (a = [[n.i, a, ""]]);
  var i = {insert: "head", singleton: !1}, r = (o(a, i), a.locals ? a.locals : {});
  n.exports = r
}, function (n, e, t) {
  "use strict";
  var o, a = function () {
    return void 0 === o && (o = Boolean(window && document && document.all && !window.atob)), o
  }, i = function () {
    var n = {};
    return function (e) {
      if (void 0 === n[e]) {
        var t = document.querySelector(e);
        if (window.HTMLIFrameElement && t instanceof window.HTMLIFrameElement) try {
          t = t.contentDocument.head
        } catch (n) {
          t = null
        }
        n[e] = t
      }
      return n[e]
    }
  }(), r = [];

  function s(n) {
    for (var e = -1, t = 0; t < r.length; t++) if (r[t].identifier === n) {
      e = t;
      break
    }
    return e
  }

  function l(n, e) {
    for (var t = {}, o = [], a = 0; a < n.length; a++) {
      var i = n[a], l = e.base ? i[0] + e.base : i[0], c = t[l] || 0, d = "".concat(l, " ").concat(c);
      t[l] = c + 1;
      var m = s(d), p = {css: i[1], media: i[2], sourceMap: i[3]};
      -1 !== m ? (r[m].references++, r[m].updater(p)) : r.push({
        identifier: d,
        updater: v(p, e),
        references: 1
      }), o.push(d)
    }
    return o
  }

  function c(n) {
    var e = document.createElement("style"), o = n.attributes || {};
    if (void 0 === o.nonce) {
      var a = t.nc;
      a && (o.nonce = a)
    }
    if (Object.keys(o).forEach((function (n) {
      e.setAttribute(n, o[n])
    })), "function" == typeof n.insert) n.insert(e); else {
      var r = i(n.insert || "head");
      if (!r) throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
      r.appendChild(e)
    }
    return e
  }

  var d, m = (d = [], function (n, e) {
    return d[n] = e, d.filter(Boolean).join("\n")
  });

  function p(n, e, t, o) {
    var a = t ? "" : o.media ? "@media ".concat(o.media, " {").concat(o.css, "}") : o.css;
    if (n.styleSheet) n.styleSheet.cssText = m(e, a); else {
      var i = document.createTextNode(a), r = n.childNodes;
      r[e] && n.removeChild(r[e]), r.length ? n.insertBefore(i, r[e]) : n.appendChild(i)
    }
  }

  function u(n, e, t) {
    var o = t.css, a = t.media, i = t.sourceMap;
    if (a ? n.setAttribute("media", a) : n.removeAttribute("media"), i && btoa && (o += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i)))), " */")), n.styleSheet) n.styleSheet.cssText = o; else {
      for (; n.firstChild;) n.removeChild(n.firstChild);
      n.appendChild(document.createTextNode(o))
    }
  }

  var f = null, h = 0;

  function v(n, e) {
    var t, o, a;
    if (e.singleton) {
      var i = h++;
      t = f || (f = c(e)), o = p.bind(null, t, i, !1), a = p.bind(null, t, i, !0)
    } else t = c(e), o = u.bind(null, t, e), a = function () {
      !function (n) {
        if (null === n.parentNode) return !1;
        n.parentNode.removeChild(n)
      }(t)
    };
    return o(n), function (e) {
      if (e) {
        if (e.css === n.css && e.media === n.media && e.sourceMap === n.sourceMap) return;
        o(n = e)
      } else a()
    }
  }

  n.exports = function (n, e) {
    (e = e || {}).singleton || "boolean" == typeof e.singleton || (e.singleton = a());
    var t = l(n = n || [], e);
    return function (n) {
      if (n = n || [], "[object Array]" === Object.prototype.toString.call(n)) {
        for (var o = 0; o < t.length; o++) {
          var a = s(t[o]);
          r[a].references--
        }
        for (var i = l(n, e), c = 0; c < t.length; c++) {
          var d = s(t[c]);
          0 === r[d].references && (r[d].updater(), r.splice(d, 1))
        }
        t = i
      }
    }
  }
}, function (n, e, t) {
  (e = t(3)(!1)).push([n.i, '/*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */\n\n/* Document\n   ========================================================================== */\n\n/**\n * 1. Correct the line height in all browsers.\n * 2. Prevent adjustments of font size after orientation changes in iOS.\n */\n\nhtml {\n  line-height: 1.15; /* 1 */\n  -webkit-text-size-adjust: 100%; /* 2 */\n}\n\n/* Sections\n   ========================================================================== */\n\n/**\n * Remove the margin in all browsers.\n */\n\nbody {\n  margin: 0;\n}\n\n/**\n * Render the `main` element consistently in IE.\n */\n\nmain {\n  display: block;\n}\n\n/**\n * Correct the font size and margin on `h1` elements within `section` and\n * `article` contexts in Chrome, Firefox, and Safari.\n */\n\nh1 {\n  font-size: 2em;\n  margin: 0.67em 0;\n}\n\n/* Grouping content\n   ========================================================================== */\n\n/**\n * 1. Add the correct box sizing in Firefox.\n * 2. Show the overflow in Edge and IE.\n */\n\nhr {\n  box-sizing: content-box; /* 1 */\n  height: 0; /* 1 */\n  overflow: visible; /* 2 */\n}\n\n/**\n * 1. Correct the inheritance and scaling of font size in all browsers.\n * 2. Correct the odd `em` font sizing in all browsers.\n */\n\npre {\n  font-family: monospace, monospace; /* 1 */\n  font-size: 1em; /* 2 */\n}\n\n/* Text-level semantics\n   ========================================================================== */\n\n/**\n * Remove the gray background on active links in IE 10.\n */\n\na {\n  background-color: transparent;\n}\n\n/**\n * 1. Remove the bottom border in Chrome 57-\n * 2. Add the correct text decoration in Chrome, Edge, IE, Opera, and Safari.\n */\n\nabbr[title] {\n  border-bottom: none; /* 1 */\n  text-decoration: underline; /* 2 */\n  text-decoration: underline dotted; /* 2 */\n}\n\n/**\n * Add the correct font weight in Chrome, Edge, and Safari.\n */\n\nb,\nstrong {\n  font-weight: bolder;\n}\n\n/**\n * 1. Correct the inheritance and scaling of font size in all browsers.\n * 2. Correct the odd `em` font sizing in all browsers.\n */\n\ncode,\nkbd,\nsamp {\n  font-family: monospace, monospace; /* 1 */\n  font-size: 1em; /* 2 */\n}\n\n/**\n * Add the correct font size in all browsers.\n */\n\nsmall {\n  font-size: 80%;\n}\n\n/**\n * Prevent `sub` and `sup` elements from affecting the line height in\n * all browsers.\n */\n\nsub,\nsup {\n  font-size: 75%;\n  line-height: 0;\n  position: relative;\n  vertical-align: baseline;\n}\n\nsub {\n  bottom: -0.25em;\n}\n\nsup {\n  top: -0.5em;\n}\n\n/* Embedded content\n   ========================================================================== */\n\n/**\n * Remove the border on images inside links in IE 10.\n */\n\nimg {\n  border-style: none;\n}\n\n/* Forms\n   ========================================================================== */\n\n/**\n * 1. Change the font styles in all browsers.\n * 2. Remove the margin in Firefox and Safari.\n */\n\nbutton,\ninput,\noptgroup,\nselect,\ntextarea {\n  font-family: inherit; /* 1 */\n  font-size: 100%; /* 1 */\n  line-height: 1.15; /* 1 */\n  margin: 0; /* 2 */\n}\n\n/**\n * Show the overflow in IE.\n * 1. Show the overflow in Edge.\n */\n\nbutton,\ninput { /* 1 */\n  overflow: visible;\n}\n\n/**\n * Remove the inheritance of text transform in Edge, Firefox, and IE.\n * 1. Remove the inheritance of text transform in Firefox.\n */\n\nbutton,\nselect { /* 1 */\n  text-transform: none;\n}\n\n/**\n * Correct the inability to style clickable types in iOS and Safari.\n */\n\nbutton,\n[type="button"],\n[type="reset"],\n[type="submit"] {\n  -webkit-appearance: button;\n}\n\n/**\n * Remove the inner border and padding in Firefox.\n */\n\nbutton::-moz-focus-inner,\n[type="button"]::-moz-focus-inner,\n[type="reset"]::-moz-focus-inner,\n[type="submit"]::-moz-focus-inner {\n  border-style: none;\n  padding: 0;\n}\n\n/**\n * Restore the focus styles unset by the previous rule.\n */\n\nbutton:-moz-focusring,\n[type="button"]:-moz-focusring,\n[type="reset"]:-moz-focusring,\n[type="submit"]:-moz-focusring {\n  outline: 1px dotted ButtonText;\n}\n\n/**\n * Correct the padding in Firefox.\n */\n\nfieldset {\n  padding: 0.35em 0.75em 0.625em;\n}\n\n/**\n * 1. Correct the text wrapping in Edge and IE.\n * 2. Correct the color inheritance from `fieldset` elements in IE.\n * 3. Remove the padding so developers are not caught out when they zero out\n *    `fieldset` elements in all browsers.\n */\n\nlegend {\n  box-sizing: border-box; /* 1 */\n  color: inherit; /* 2 */\n  display: table; /* 1 */\n  max-width: 100%; /* 1 */\n  padding: 0; /* 3 */\n  white-space: normal; /* 1 */\n}\n\n/**\n * Add the correct vertical alignment in Chrome, Firefox, and Opera.\n */\n\nprogress {\n  vertical-align: baseline;\n}\n\n/**\n * Remove the default vertical scrollbar in IE 10+.\n */\n\ntextarea {\n  overflow: auto;\n}\n\n/**\n * 1. Add the correct box sizing in IE 10.\n * 2. Remove the padding in IE 10.\n */\n\n[type="checkbox"],\n[type="radio"] {\n  box-sizing: border-box; /* 1 */\n  padding: 0; /* 2 */\n}\n\n/**\n * Correct the cursor style of increment and decrement buttons in Chrome.\n */\n\n[type="number"]::-webkit-inner-spin-button,\n[type="number"]::-webkit-outer-spin-button {\n  height: auto;\n}\n\n/**\n * 1. Correct the odd appearance in Chrome and Safari.\n * 2. Correct the outline style in Safari.\n */\n\n[type="search"] {\n  -webkit-appearance: textfield; /* 1 */\n  outline-offset: -2px; /* 2 */\n}\n\n/**\n * Remove the inner padding in Chrome and Safari on macOS.\n */\n\n[type="search"]::-webkit-search-decoration {\n  -webkit-appearance: none;\n}\n\n/**\n * 1. Correct the inability to style clickable types in iOS and Safari.\n * 2. Change font properties to `inherit` in Safari.\n */\n\n::-webkit-file-upload-button {\n  -webkit-appearance: button; /* 1 */\n  font: inherit; /* 2 */\n}\n\n/* Interactive\n   ========================================================================== */\n\n/*\n * Add the correct display in Edge, IE 10+, and Firefox.\n */\n\ndetails {\n  display: block;\n}\n\n/*\n * Add the correct display in all browsers.\n */\n\nsummary {\n  display: list-item;\n}\n\n/* Misc\n   ========================================================================== */\n\n/**\n * Add the correct display in IE 10+.\n */\n\ntemplate {\n  display: none;\n}\n\n/**\n * Add the correct display in IE 10.\n */\n\n[hidden] {\n  display: none;\n}\n', ""]), n.exports = e
}, function (n, e, t) {
  "use strict";
  n.exports = function (n) {
    var e = [];
    return e.toString = function () {
      return this.map((function (e) {
        var t = function (n, e) {
          var t = n[1] || "", o = n[3];
          if (!o) return t;
          if (e && "function" == typeof btoa) {
            var a = (r = o, s = btoa(unescape(encodeURIComponent(JSON.stringify(r)))), l = "sourceMappingURL=data:application/json;charset=utf-8;base64,".concat(s), "/*# ".concat(l, " */")),
              i = o.sources.map((function (n) {
                return "/*# sourceURL=".concat(o.sourceRoot || "").concat(n, " */")
              }));
            return [t].concat(i).concat([a]).join("\n")
          }
          var r, s, l;
          return [t].join("\n")
        }(e, n);
        return e[2] ? "@media ".concat(e[2], " {").concat(t, "}") : t
      })).join("")
    }, e.i = function (n, t, o) {
      "string" == typeof n && (n = [[null, n, ""]]);
      var a = {};
      if (o) for (var i = 0; i < this.length; i++) {
        var r = this[i][0];
        null != r && (a[r] = !0)
      }
      for (var s = 0; s < n.length; s++) {
        var l = [].concat(n[s]);
        o && a[l[0]] || (t && (l[2] ? l[2] = "".concat(t, " and ").concat(l[2]) : l[2] = t), e.push(l))
      }
    }, e
  }
}, function (n, e, t) {
  "use strict";
  t.r(e);
  t(0);
  const o = () => {
    const n = $(".contact-page__list .item"), e = $(event.currentTarget), t = e.attr("id");
    n.removeClass("item--active"), e.addClass("item--active"), $(".contact-page__map").removeClass("contact-page__map--active"), $(`#map-${t}`).addClass("contact-page__map--active")
  }, a = () => {
    const n = $(event.currentTarget);
    n.val() ? n.parent(".input-wrapper").addClass("input-wrapper--input") : n.parent(".input-wrapper").removeClass("input-wrapper--input")
  }, i = () => {
    const n = $(".main-block");
    if ("false" === n.attr("data-sliding")) {
      n.attr("data-sliding", "true");
      const e = $(".main-block__logo .item"), t = $(event.currentTarget), o = t.children("img").attr("alt"),
        a = t.attr("data-desc"), i = t.attr("data-index");
      e.removeClass("item--active"), t.addClass("item--active"), $(".main-block__name").html(o), $(".main-block__desc").html(a), $(".main-block__count .current").html("0" + i);
      $(".main-block__img--first");
      const r = $(".main-block__img--second"), s = $(`#${r.attr("id")}`),
        l = {transform: "translate(200%, 200%) rotate(30deg)"}, c = $(`#img-${i}`);
      c.css(l), c.addClass("main-block__img--next");
      const d = {transform: "translate(-200%, 200%) rotate(-30deg)", opacity: 0},
        m = {transform: "translate(0, 0) rotate(0)", opacity: "1"}, p = {transition: "all 0s"};
      r.css(d), setTimeout(() => {
        c.css(m)
      }, 100), setTimeout(() => {
        r.css({
          ...p,
          transform: "translate(0, 0) rotate(0)"
        }), r.removeClass("main-block__img--second"), c.addClass("main-block__img--second").removeClass("main-block__img--next")
      }, 1100), setTimeout(() => {
        s.removeAttr("style"), c.removeAttr("style")
      }, 1200), setTimeout(() => {
        n.attr("data-sliding", "false")
      }, 1250)
    }
  }, r = () => {
    const n = $(event.currentTarget), e = n.attr("data-id");
    $("html").animate({scrollTop: $(`#${e}`).offset().top}, 500), $(".home-blocks__nav .item-nav").removeClass("item-nav--active"), n.addClass("item-nav--active")
  }, s = () => {
    $(".modal-form--form").css("display", "flex")
  }, l = () => {
    $(".modal-form--form").css("display", "none")
  }, c = () => {
    $(".modal-form--nav").css("display", "flex")
  }, d = () => {
    $(".modal-form--nav").css("display", "none")
  }, m = () => {
    const n = $(".address__wrapper"), e = n.hasClass("show"), t = $(event.currentTarget), o = t.attr("data-tel"),
      a = o.replace(/[^+\d]/g, ""), i = $(".header__address .phone a.text");
    e ? (i.attr("href", `tel:${a}`), i.html(o), n.children(".text").removeClass("text--active"), t.addClass("text--active"), n.removeClass("show"), n.next(".icon").removeAttr("style")) : (n.next(".icon").css("transform", "rotate(180deg)"), n.addClass("show"))
  }, p = () => {
    const n = $(".alert-modal");
    n.fadeIn("slow").css("display", "flex"), setTimeout(() => {
      n.fadeOut("slow")
    }, 2e3)
  };
  $(document).ready(() => {
    (() => {
      const n = $(".slider .item").length < 10 ? `0${$(".slider .item").length}` : $(".slider .item").length;
      $('.fix_home').css('background-image', 'url(' + $('.fix_slider__wrapper .item').eq(0).attr('data-img') + ')');
      $(".slider__count .all").html(n)
    })(), $(".slider__nav .next").on("click", n => (n => {
      const e = $(".item--active"), t = e.next(".item").length > 0 ? e.next(".item") : $(".slider .item").eq(0);
      e.removeClass("item--active"), t.addClass("item--active");
      $('.fix_home').css('background-image', 'url(' + t.attr('data-img') + ')');
      const o = t.index() < 10 ? `0${t.index()}` : t.index();
      $(".slider__count .cur").html(o)
    })()), $(".slider__nav .prev").on("click", n => (() => {
      const n = $(".item--active"), e = n.prev(".item").length > 0 ? n.prev(".item") : $(".slider .item").last();
      n.removeClass("item--active"), e.addClass("item--active");
      $('.fix_home').css('background-image', 'url(' + e.attr('data-img') + ')');
      const t = e.index() < 10 ? `0${e.index()}` : e.index();
      $(".slider__count .cur").html(t)
    })()), $(".contact-page__list .item").on("click", o), $(".form form .input-wrapper input").on("input", a), $(".main-block__logo .item").on("click", i), $(".showForm").on("click", s), $(".modal-form--form .modal-form__close").on("click", l), $(".modal-form--nav .modal-form__close").on("click", d), $(".header__menu-button").on("click", c), $(".address__wrapper .text").on("click", m), $("#contact-form").on("submit", (function (n) {
      n.preventDefault(), $.ajax({
        url: "/wp-content/themes/motodom/send.php",
        type: "POST",
        data: "name=" + $("#input-name").val() + "&tel=" + $("#input-tel").val(),
        success: function (n) {
          $("#input-name").val(""), $("#input-tel").val(""), $("#input-name").parent(".input-wrapper--input").removeClass("input-wrapper--input"), $("#input-tel").parent(".input-wrapper--input").removeClass("input-wrapper--input"), p()
        }
      })
    })), $("#about-form").on("submit", (function (n) {
      n.preventDefault(), $.ajax({
        url: "/wp-content/themes/motodom/send_about.php",
        type: "POST",
        data: "name=" + $("#input-name").val() + "&tel=" + $("#input-tel").val() + "&comment=" + $("#input-comment").val(),
        success: function (n) {
          $("#input-name").val(""), $("#input-tel").val(""), $("#input-comment").val(""), $("#input-name").parent(".input-wrapper--input").removeClass("input-wrapper--input"), $("#input-tel").parent(".input-wrapper--input").removeClass("input-wrapper--input"), $("#input-comment").parent(".input-wrapper--input").removeClass("input-wrapper--input"), p()
        }
      })
    })), $("#modal-form").on("submit", (function (n) {
      n.preventDefault(), $.ajax({
        url: "/wp-content/themes/motodom/send.php",
        type: "POST",
        data: "name=" + $("#input-name-modal").val() + "&tel=" + $("#input-tel-modal").val(),
        success: function (n) {
          $("#input-name-modal").val(""), $("#input-tel-modal").val(""), $("#input-name-modal").parent(".input-wrapper--input").removeClass("input-wrapper--input"), $("#input-tel-modal").parent(".input-wrapper--input").removeClass("input-wrapper--input"), p()
        }
      })
    })), $(".home-blocks__nav .item-nav").on("click", r), $(".click").click((function () {
      $("#modal-catalog").toggleClass("active")
    })), $("ul li a").click((function (e) {
      if($(this).hasClass('click')) {
        e.preventDefault();
      }
      $("#nav").hasClass("in") && ($("#nav").removeClass("in"), $("#nav").addClass("out"))
    })), $("#nav-trigger").not("#modal-catalog").click((function () {
      $("#modal-catalog").removeClass("active")
    }))

    $('.burger-wrap').click(function(){

      $('.main-menu').toggleClass('active');

    })

    $(document).mouseup(function (e){
      var div = $(".main-menu, .burger-wrap");
      if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        div.removeClass('active');
      }
    });

    $(document).mouseup(function (e){
      var div = $("#modal-catalog, .click");
      if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        div.removeClass('active');
      }
    });






  }), $(window).resize((function () {
  })), $(window).scroll(() => {
    (() => {
      const n = $(".parallax-skip"), e = $(".parallax-item"), t = pageYOffset;
      n.length > 0 && $(window).height();
      for (let n = 0; n < e.length; n++) {
        const o = e.eq(n), a = o.parent(".parallax-wrapper").offset().top, i = o.attr("data-parallax"),
          r = o.attr("data-parallax-margin"), s = (t - a) / i * .6;
        o.css({transform: `translateY(${s}%) scale(1.25)`, "margin-top": `${r}px`})
      }
    })(), (() => {
      const n = $(".home-blocks__nav"), e = $(".home-blocks"), t = $(".form--stop").offset().top - n.height() - 160,
        o = e.offset().top - 15;
      pageYOffset > o && pageYOffset < t ? n.css({
        position: "fixed",
        top: "120px",
        bottom: "auto"
      }) : pageYOffset > t ? n.css({position: "absolute", top: "auto", bottom: "40px"}) : n.css({
        position: "absolute",
        top: "120px",
        bottom: "auto"
      })
    })()
  });
  var u, f, h = document.getElementById("nav-trigger"), v = document.getElementById("nav");

  function b(n) {
    for (var e = n; e < f.length; e++) f[e].classList.remove("show"), f[e].classList.add("hide"), u[e].classList.remove("whiteborder")
  }

  function g(n) {
    f[n].classList.contains("hide") && (b(0), u[n].classList.add("whiteborder"), f[n].classList.remove("hide"), f[n].classList.add("show"))
  }

  h.addEventListener("click", (function (n) {
    // h.className.indexOf("close") > 0 ? (h.className = "nav-trigger open", v.className = "out") : (h.className = "nav-trigger close", v.className = "in")
  })), window.onload = function () {
    f = document.getElementsByClassName("tabContent"), u = document.getElementsByClassName("tab"), b(1)
  }, document.getElementById("tabs").onclick = function (n) {
    var e = n.target;
    if ("tab" == e.className) for (var t = 0; t < u.length; t++) if (e == u[t]) {
      g(t);
      break
    }
  }
}]);
