!(function (e, t) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = t(require("window")))
    : "function" == typeof define && define.amd
    ? define(["window"], t)
    : "object" == typeof exports
    ? (exports.NiceSelect = t(require("window")))
    : (e.NiceSelect = t(e.window));
})(this, function (e) {
  return (function (e) {
    var t = {};
    function n(i) {
      if (t[i]) return t[i].exports;
      var o = (t[i] = { i: i, l: !1, exports: {} });
      return e[i].call(o.exports, o, o.exports, n), (o.l = !0), o.exports;
    }
    return (
      (n.m = e),
      (n.c = t),
      (n.d = function (e, t, i) {
        n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: i });
      }),
      (n.r = function (e) {
        "undefined" != typeof Symbol &&
          Symbol.toStringTag &&
          Object.defineProperty(e, Symbol.toStringTag, { value: "Module" }),
          Object.defineProperty(e, "__esModule", { value: !0 });
      }),
      (n.t = function (e, t) {
        if ((1 & t && (e = n(e)), 8 & t)) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var i = Object.create(null);
        if (
          (n.r(i),
          Object.defineProperty(i, "default", { enumerable: !0, value: e }),
          2 & t && "string" != typeof e)
        )
          for (var o in e)
            n.d(
              i,
              o,
              function (t) {
                return e[t];
              }.bind(null, o)
            );
        return i;
      }),
      (n.n = function (e) {
        var t =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return n.d(t, "a", t), t;
      }),
      (n.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
      }),
      (n.p = "/"),
      n((n.s = 0))
    );
  })([
    function (e, t, n) {
      "use strict";
      n.r(t),
        function (e) {
          function i(e) {
            var t = document.createEvent("MouseEvents");
            t.initEvent("click", !0, !1), e.dispatchEvent(t);
          }
          function o(e) {
            var t = document.createEvent("HTMLEvents");
            t.initEvent("change", !0, !1), e.dispatchEvent(t);
          }
          function s(e, t) {
            return e.getAttribute(t);
          }
          function r(e, t) {
            return !!e && e.classList.contains(t);
          }
          function d(e, t) {
            if (e) return e.classList.add(t);
          }
          function l(e, t) {
            if (e) return e.classList.remove(t);
          }
          n.d(t, "bind", function () {
            return u;
          }),
            n(2);
          var c = { data: null, searchable: !1 };
          function a(e, t) {
            (this.el = e),
              (this.config = Object.assign({}, c, t || {})),
              (this.data = this.config.data),
              (this.selectedOptions = []),
              (this.placeholder =
                s(this.el, "placeholder") ||
                this.config.placeholder ||
                "Select an option"),
              (this.dropdown = null),
              (this.multiple = s(this.el, "multiple")),
              (this.disabled = s(this.el, "disabled")),
              this.create();
          }
          function u(e, t) {
            return new a(e, t);
          }
          (a.prototype.create = function () {
            (this.el.style.display = "none"),
              this.data ? this.processData(this.data) : this.extractData(),
              this.renderDropdown(),
              this.bindEvent();
          }),
            (a.prototype.processData = function (e) {
              var t = [];
              e.forEach(function (e) {
                t.push({ data: e, attributes: { selected: !1, disabled: !1 } });
              }),
                (this.options = t);
            }),
            (a.prototype.extractData = function () {
              var e = [],
                t = [],
                n = [];
              this.el.querySelectorAll("option").forEach(function (n) {
                var i = { text: n.innerText, value: n.value },
                  o = {
                    selected: null != n.getAttribute("selected"),
                    disabled: null != n.getAttribute("disabled"),
                  };
                e.push(i), t.push({ data: i, attributes: o });
              }),
                (this.data = e),
                (this.options = t),
                this.options.forEach(function (e) {
                  e.attributes.selected && n.push(e);
                }),
                (this.selectedOptions = n);
            }),
            (a.prototype.renderDropdown = function () {
              var e = [
                  "nice-select",
                  s(this.el, "class") || "",
                  this.disabled ? "disabled" : "",
                  this.multiple ? "has-multiple" : "",
                ],
                t = '<div class="'
                  .concat(e.join(" "), '" tabindex="')
                  .concat(this.disabled ? null : 0, '">\n  <span class="')
                  .concat(
                    this.multiple ? "multiple-options" : "current text_dark_blue nice_text",
                    '"></span>\n  <div class="nice-select-dropdown">\n  '
                  )
                  .concat(
                    this.config.searchable
                      ? '<div class="nice-select-search-box">\n<input type="text" class="nice-select-search" placeholder="Search..."/>\n</div>'
                      : "",
                    '\n  <ul class="list"></ul>\n  </div></div>\n'
                  );
              this.el.insertAdjacentHTML("afterend", t),
                (this.dropdown = this.el.nextElementSibling),
                this._renderSelectedItems(),
                this._renderItems();
            }),
            (a.prototype._renderSelectedItems = function () {
              if (this.multiple) {
                var e = "";
                this.selectedOptions.length < 2 ||
                "auto" == this.el.computedStyleMap().get("width").value
                  ? (this.selectedOptions.forEach(function (t) {
                      e += '<span class="current">'.concat(
                        t.data.text,
                        "</span>"
                      );
                    }),
                    (e = "" == e ? this.placeholder : e),
                    (this.dropdown.querySelector(
                      ".multiple-options"
                    ).innerHTML = e))
                  : (this.dropdown.querySelector(
                      ".multiple-options"
                    ).innerHTML = this.selectedOptions.length + " selected");
              } else {
                var t =
                  this.selectedOptions.length > 0
                    ? this.selectedOptions[0].data.text
                    : this.placeholder;
                this.dropdown.querySelector(".current").innerHTML = t;
              }
            }),
            (a.prototype._renderItems = function () {
              var e = this,
                t = this.dropdown.querySelector("ul");
              this.options.forEach(function (n) {
                t.appendChild(e._renderItem(n));
              });
            }),
            (a.prototype._renderItem = function (e) {
              var t,
                n = document.createElement("li");
              n.setAttribute("data-value", e.data.value);
              var i = [
                "option",
                e.attributes.selected ? "selected" : null,
                e.attributes.disabled ? "disabled" : null,
              ];
              return (
                (t = n.classList).add.apply(t, i),
                (n.innerHTML = e.data.text),
                n.addEventListener("click", this._onItemClicked.bind(this, e)),
                (e.element = n),
                n
              );
            }),
            (a.prototype.update = function () {
              if ((this.extractData(), this.dropdown)) {
                var e = r(this.dropdown, "open");
                this.dropdown.parentNode.removeChild(this.dropdown),
                  this.create(),
                  e && i(this.dropdown);
              }
            }),
            (a.prototype.disable = function () {
              this.disabled ||
                ((this.disabled = !0), d(this.dropdown, "disabled"));
            }),
            (a.prototype.enable = function () {
              this.disabled &&
                ((this.disabled = !1), l(this.dropdown, "disabled"));
            }),
            (a.prototype.clear = function () {
              (this.selectedOptions = []),
                this._renderSelectedItems(),
                this.updateSelectValue(),
                o(this.el);
            }),
            (a.prototype.destroy = function () {
              this.dropdown &&
                (this.dropdown.parentNode.removeChild(this.dropdown),
                (this.el.style.display = ""));
            }),
            (a.prototype.bindEvent = function () {
              this.dropdown.addEventListener(
                "click",
                this._onClicked.bind(this)
              ),
                this.dropdown.addEventListener(
                  "keydown",
                  this._onKeyPressed.bind(this)
                ),
                e.addEventListener("click", this._onClickedOutside.bind(this)),
                this.config.searchable && this._bindSearchEvent();
            }),
            (a.prototype._bindSearchEvent = function () {
              var e = this.dropdown.querySelector(".nice-select-search");
              e &&
                e.addEventListener("click", function (e) {
                  return e.stopPropagation(), !1;
                }),
                e.addEventListener("input", this._onSearchChanged.bind(this));
            }),
            (a.prototype._onClicked = function (e) {
              if (
                (this.dropdown.classList.toggle("open"),
                this.dropdown.classList.contains("open"))
              ) {
                var t = this.dropdown.querySelector(".nice-select-search");
                t && ((t.value = ""), t.focus());
                var n = this.dropdown.querySelector(".focus");
                l(n, "focus"),
                  d((n = this.dropdown.querySelector(".selected")), "focus"),
                  this.dropdown.querySelectorAll("ul li").forEach(function (e) {
                    e.style.display = "";
                  });
              } else this.dropdown.focus();
            }),
            (a.prototype._onItemClicked = function (e, t) {
              var n = t.target;
              r(n, "disabled") ||
                (this.multiple
                  ? r(n, "selected") ||
                    (d(n, "selected"), this.selectedOptions.push(e))
                  : (this.selectedOptions.forEach(function (e) {
                      l(e.element, "selected");
                    }),
                    d(n, "selected"),
                    (this.selectedOptions = [e])),
                this._renderSelectedItems(),
                this.updateSelectValue());
            }),
            (a.prototype.updateSelectValue = function () {
              var e = this.el;
              this.multiple
                ? this.selectedOptions.forEach(function (t) {
                    var n = e.querySelector(
                      'option[value="' + t.data.value + '"]'
                    );
                    n && n.setAttribute("selected", !0);
                  })
                : this.selectedOptions.length > 0 &&
                  (this.el.value = this.selectedOptions[0].data.value),
                o(this.el);
            }),
            (a.prototype._onClickedOutside = function (e) {
              this.dropdown.contains(e.target) ||
                this.dropdown.classList.remove("open");
            }),
            (a.prototype._onKeyPressed = function (e) {
              var t = this.dropdown.querySelector(".focus"),
                n = this.dropdown.classList.contains("open");
              if (32 == e.keyCode || 13 == e.keyCode) i(n ? t : this.dropdown);
              else if (40 == e.keyCode) {
                if (n) {
                  var o = this._findNext(t);
                  o &&
                    (l(this.dropdown.querySelector(".focus"), "focus"),
                    d(o, "focus"));
                } else i(this.dropdown);
                e.preventDefault();
              } else if (38 == e.keyCode) {
                if (n) {
                  var s = this._findPrev(t);
                  s &&
                    (l(this.dropdown.querySelector(".focus"), "focus"),
                    d(s, "focus"));
                } else i(this.dropdown);
                e.preventDefault();
              } else 27 == e.keyCode && n && i(this.dropdown);
              return !1;
            }),
            (a.prototype._findNext = function (e) {
              for (
                e = e
                  ? e.nextElementSibling
                  : this.dropdown.querySelector(".list .option");
                e;

              ) {
                if (!r(e, "disabled") && "none" != e.style.display) return e;
                e = e.nextElementSibling;
              }
              return null;
            }),
            (a.prototype._findPrev = function (e) {
              for (
                e = e
                  ? e.previousElementSibling
                  : this.dropdown.querySelector(".list .option:last-child");
                e;

              ) {
                if (!r(e, "disabled") && "none" != e.style.display) return e;
                e = e.previousElementSibling;
              }
              return null;
            }),
            (a.prototype._onSearchChanged = function (e) {
              var t = this.dropdown.classList.contains("open"),
                n = e.target.value;
              if ("" == (n = n.toLowerCase()))
                this.options.forEach(function (e) {
                  e.element.style.display = "";
                });
              else if (t) {
                var i = new RegExp(n);
                this.options.forEach(function (e) {
                  var t = e.data.text.toLowerCase(),
                    n = i.test(t);
                  e.element.style.display = n ? "" : "none";
                });
              }
              this.dropdown.querySelectorAll(".focus").forEach(function (e) {
                l(e, "focus");
              }),
                d(this._findNext(null), "focus");
            });
        }.call(this, n(1));
    },
    function (t, n) {
      t.exports = e;
    },
    function (e, t, n) {},
  ]);
});
