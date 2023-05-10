/*!
 * Chart.js
 * http://chartjs.org/
 * Version: 2.4.0
 *
 * Copyright 2016 Nick Downie
 * Released under the MIT license
 * https://github.com/chartjs/Chart.js/blob/master/LICENSE.md
 */
!(function (t) {
  if ("object" == typeof exports && "undefined" != typeof module)
    module.exports = t();
  else if ("function" == typeof define && define.amd) define([], t);
  else {
    var e;
    (e =
      "undefined" != typeof window
        ? window
        : "undefined" != typeof global
        ? global
        : "undefined" != typeof self
        ? self
        : this),
      (e.Chart = t());
  }
})(function () {
  return (function t(e, a, i) {
    function n(r, l) {
      if (!a[r]) {
        if (!e[r]) {
          var s = "function" == typeof require && require;
          if (!l && s) return s(r, !0);
          if (o) return o(r, !0);
          var d = new Error("Cannot find module '" + r + "'");
          throw ((d.code = "MODULE_NOT_FOUND"), d);
        }
        var u = (a[r] = { exports: {} });
        e[r][0].call(
          u.exports,
          function (t) {
            var a = e[r][1][t];
            return n(a ? a : t);
          },
          u,
          u.exports,
          t,
          e,
          a,
          i
        );
      }
      return a[r].exports;
    }
    for (
      var o = "function" == typeof require && require, r = 0;
      r < i.length;
      r++
    )
      n(i[r]);
    return n;
  })(
    {
      1: [function (t, e, a) {}, {}],
      2: [
        function (t, e, a) {
          function i(t) {
            if (t) {
              var e = /^#([a-fA-F0-9]{3})$/,
                a = /^#([a-fA-F0-9]{6})$/,
                i =
                  /^rgba?\(\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*,\s*([+-]?\d+)\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/,
                n =
                  /^rgba?\(\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*,\s*([+-]?[\d\.]+)\%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)$/,
                o = /(\w+)/,
                r = [0, 0, 0],
                l = 1,
                s = t.match(e);
              if (s) {
                s = s[1];
                for (var d = 0; d < r.length; d++)
                  r[d] = parseInt(s[d] + s[d], 16);
              } else if ((s = t.match(a))) {
                s = s[1];
                for (var d = 0; d < r.length; d++)
                  r[d] = parseInt(s.slice(2 * d, 2 * d + 2), 16);
              } else if ((s = t.match(i))) {
                for (var d = 0; d < r.length; d++) r[d] = parseInt(s[d + 1]);
                l = parseFloat(s[4]);
              } else if ((s = t.match(n))) {
                for (var d = 0; d < r.length; d++)
                  r[d] = Math.round(2.55 * parseFloat(s[d + 1]));
                l = parseFloat(s[4]);
              } else if ((s = t.match(o))) {
                if ("transparent" == s[1]) return [0, 0, 0, 0];
                if (((r = y[s[1]]), !r)) return;
              }
              for (var d = 0; d < r.length; d++) r[d] = v(r[d], 0, 255);
              return (l = l || 0 == l ? v(l, 0, 1) : 1), (r[3] = l), r;
            }
          }
          function n(t) {
            if (t) {
              var e =
                  /^hsla?\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/,
                a = t.match(e);
              if (a) {
                var i = parseFloat(a[4]),
                  n = v(parseInt(a[1]), 0, 360),
                  o = v(parseFloat(a[2]), 0, 100),
                  r = v(parseFloat(a[3]), 0, 100),
                  l = v(isNaN(i) ? 1 : i, 0, 1);
                return [n, o, r, l];
              }
            }
          }
          function o(t) {
            if (t) {
              var e =
                  /^hwb\(\s*([+-]?\d+)(?:deg)?\s*,\s*([+-]?[\d\.]+)%\s*,\s*([+-]?[\d\.]+)%\s*(?:,\s*([+-]?[\d\.]+)\s*)?\)/,
                a = t.match(e);
              if (a) {
                var i = parseFloat(a[4]),
                  n = v(parseInt(a[1]), 0, 360),
                  o = v(parseFloat(a[2]), 0, 100),
                  r = v(parseFloat(a[3]), 0, 100),
                  l = v(isNaN(i) ? 1 : i, 0, 1);
                return [n, o, r, l];
              }
            }
          }
          function r(t) {
            var e = i(t);
            return e && e.slice(0, 3);
          }
          function l(t) {
            var e = n(t);
            return e && e.slice(0, 3);
          }
          function s(t) {
            var e = i(t);
            return e ? e[3] : (e = n(t)) ? e[3] : (e = o(t)) ? e[3] : void 0;
          }
          function d(t) {
            return "#" + x(t[0]) + x(t[1]) + x(t[2]);
          }
          function u(t, e) {
            return 1 > e || (t[3] && t[3] < 1)
              ? c(t, e)
              : "rgb(" + t[0] + ", " + t[1] + ", " + t[2] + ")";
          }
          function c(t, e) {
            return (
              void 0 === e && (e = void 0 !== t[3] ? t[3] : 1),
              "rgba(" + t[0] + ", " + t[1] + ", " + t[2] + ", " + e + ")"
            );
          }
          function h(t, e) {
            if (1 > e || (t[3] && t[3] < 1)) return f(t, e);
            var a = Math.round((t[0] / 255) * 100),
              i = Math.round((t[1] / 255) * 100),
              n = Math.round((t[2] / 255) * 100);
            return "rgb(" + a + "%, " + i + "%, " + n + "%)";
          }
          function f(t, e) {
            var a = Math.round((t[0] / 255) * 100),
              i = Math.round((t[1] / 255) * 100),
              n = Math.round((t[2] / 255) * 100);
            return (
              "rgba(" +
              a +
              "%, " +
              i +
              "%, " +
              n +
              "%, " +
              (e || t[3] || 1) +
              ")"
            );
          }
          function g(t, e) {
            return 1 > e || (t[3] && t[3] < 1)
              ? p(t, e)
              : "hsl(" + t[0] + ", " + t[1] + "%, " + t[2] + "%)";
          }
          function p(t, e) {
            return (
              void 0 === e && (e = void 0 !== t[3] ? t[3] : 1),
              "hsla(" + t[0] + ", " + t[1] + "%, " + t[2] + "%, " + e + ")"
            );
          }
          function m(t, e) {
            return (
              void 0 === e && (e = void 0 !== t[3] ? t[3] : 1),
              "hwb(" +
                t[0] +
                ", " +
                t[1] +
                "%, " +
                t[2] +
                "%" +
                (void 0 !== e && 1 !== e ? ", " + e : "") +
                ")"
            );
          }
          function b(t) {
            return k[t.slice(0, 3)];
          }
          function v(t, e, a) {
            return Math.min(Math.max(e, t), a);
          }
          function x(t) {
            var e = t.toString(16).toUpperCase();
            return e.length < 2 ? "0" + e : e;
          }
          var y = t(6);
          e.exports = {
            getRgba: i,
            getHsla: n,
            getRgb: r,
            getHsl: l,
            getHwb: o,
            getAlpha: s,
            hexString: d,
            rgbString: u,
            rgbaString: c,
            percentString: h,
            percentaString: f,
            hslString: g,
            hslaString: p,
            hwbString: m,
            keyword: b,
          };
          var k = {};
          for (var S in y) k[y[S]] = S;
        },
        { 6: 6 },
      ],
      3: [
        function (t, e, a) {
          var i = t(5),
            n = t(2),
            o = function (t) {
              if (t instanceof o) return t;
              if (!(this instanceof o)) return new o(t);
              this.values = {
                rgb: [0, 0, 0],
                hsl: [0, 0, 0],
                hsv: [0, 0, 0],
                hwb: [0, 0, 0],
                cmyk: [0, 0, 0, 0],
                alpha: 1,
              };
              var e;
              if ("string" == typeof t)
                if ((e = n.getRgba(t))) this.setValues("rgb", e);
                else if ((e = n.getHsla(t))) this.setValues("hsl", e);
                else {
                  if (!(e = n.getHwb(t)))
                    throw new Error(
                      'Unable to parse color from string "' + t + '"'
                    );
                  this.setValues("hwb", e);
                }
              else if ("object" == typeof t)
                if (((e = t), void 0 !== e.r || void 0 !== e.red))
                  this.setValues("rgb", e);
                else if (void 0 !== e.l || void 0 !== e.lightness)
                  this.setValues("hsl", e);
                else if (void 0 !== e.v || void 0 !== e.value)
                  this.setValues("hsv", e);
                else if (void 0 !== e.w || void 0 !== e.whiteness)
                  this.setValues("hwb", e);
                else {
                  if (void 0 === e.c && void 0 === e.cyan)
                    throw new Error(
                      "Unable to parse color from object " + JSON.stringify(t)
                    );
                  this.setValues("cmyk", e);
                }
            };
          (o.prototype = {
            rgb: function () {
              return this.setSpace("rgb", arguments);
            },
            hsl: function () {
              return this.setSpace("hsl", arguments);
            },
            hsv: function () {
              return this.setSpace("hsv", arguments);
            },
            hwb: function () {
              return this.setSpace("hwb", arguments);
            },
            cmyk: function () {
              return this.setSpace("cmyk", arguments);
            },
            rgbArray: function () {
              return this.values.rgb;
            },
            hslArray: function () {
              return this.values.hsl;
            },
            hsvArray: function () {
              return this.values.hsv;
            },
            hwbArray: function () {
              var t = this.values;
              return 1 !== t.alpha ? t.hwb.concat([t.alpha]) : t.hwb;
            },
            cmykArray: function () {
              return this.values.cmyk;
            },
            rgbaArray: function () {
              var t = this.values;
              return t.rgb.concat([t.alpha]);
            },
            hslaArray: function () {
              var t = this.values;
              return t.hsl.concat([t.alpha]);
            },
            alpha: function (t) {
              return void 0 === t
                ? this.values.alpha
                : (this.setValues("alpha", t), this);
            },
            red: function (t) {
              return this.setChannel("rgb", 0, t);
            },
            green: function (t) {
              return this.setChannel("rgb", 1, t);
            },
            blue: function (t) {
              return this.setChannel("rgb", 2, t);
            },
            hue: function (t) {
              return (
                t && ((t %= 360), (t = 0 > t ? 360 + t : t)),
                this.setChannel("hsl", 0, t)
              );
            },
            saturation: function (t) {
              return this.setChannel("hsl", 1, t);
            },
            lightness: function (t) {
              return this.setChannel("hsl", 2, t);
            },
            saturationv: function (t) {
              return this.setChannel("hsv", 1, t);
            },
            whiteness: function (t) {
              return this.setChannel("hwb", 1, t);
            },
            blackness: function (t) {
              return this.setChannel("hwb", 2, t);
            },
            value: function (t) {
              return this.setChannel("hsv", 2, t);
            },
            cyan: function (t) {
              return this.setChannel("cmyk", 0, t);
            },
            magenta: function (t) {
              return this.setChannel("cmyk", 1, t);
            },
            yellow: function (t) {
              return this.setChannel("cmyk", 2, t);
            },
            black: function (t) {
              return this.setChannel("cmyk", 3, t);
            },
            hexString: function () {
              return n.hexString(this.values.rgb);
            },
            rgbString: function () {
              return n.rgbString(this.values.rgb, this.values.alpha);
            },
            rgbaString: function () {
              return n.rgbaString(this.values.rgb, this.values.alpha);
            },
            percentString: function () {
              return n.percentString(this.values.rgb, this.values.alpha);
            },
            hslString: function () {
              return n.hslString(this.values.hsl, this.values.alpha);
            },
            hslaString: function () {
              return n.hslaString(this.values.hsl, this.values.alpha);
            },
            hwbString: function () {
              return n.hwbString(this.values.hwb, this.values.alpha);
            },
            keyword: function () {
              return n.keyword(this.values.rgb, this.values.alpha);
            },
            rgbNumber: function () {
              var t = this.values.rgb;
              return (t[0] << 16) | (t[1] << 8) | t[2];
            },
            luminosity: function () {
              for (var t = this.values.rgb, e = [], a = 0; a < t.length; a++) {
                var i = t[a] / 255;
                e[a] =
                  0.03928 >= i ? i / 12.92 : Math.pow((i + 0.055) / 1.055, 2.4);
              }
              return 0.2126 * e[0] + 0.7152 * e[1] + 0.0722 * e[2];
            },
            contrast: function (t) {
              var e = this.luminosity(),
                a = t.luminosity();
              return e > a ? (e + 0.05) / (a + 0.05) : (a + 0.05) / (e + 0.05);
            },
            level: function (t) {
              var e = this.contrast(t);
              return e >= 7.1 ? "AAA" : e >= 4.5 ? "AA" : "";
            },
            dark: function () {
              var t = this.values.rgb,
                e = (299 * t[0] + 587 * t[1] + 114 * t[2]) / 1e3;
              return 128 > e;
            },
            light: function () {
              return !this.dark();
            },
            negate: function () {
              for (var t = [], e = 0; 3 > e; e++)
                t[e] = 255 - this.values.rgb[e];
              return this.setValues("rgb", t), this;
            },
            lighten: function (t) {
              var e = this.values.hsl;
              return (e[2] += e[2] * t), this.setValues("hsl", e), this;
            },
            darken: function (t) {
              var e = this.values.hsl;
              return (e[2] -= e[2] * t), this.setValues("hsl", e), this;
            },
            saturate: function (t) {
              var e = this.values.hsl;
              return (e[1] += e[1] * t), this.setValues("hsl", e), this;
            },
            desaturate: function (t) {
              var e = this.values.hsl;
              return (e[1] -= e[1] * t), this.setValues("hsl", e), this;
            },
            whiten: function (t) {
              var e = this.values.hwb;
              return (e[1] += e[1] * t), this.setValues("hwb", e), this;
            },
            blacken: function (t) {
              var e = this.values.hwb;
              return (e[2] += e[2] * t), this.setValues("hwb", e), this;
            },
            greyscale: function () {
              var t = this.values.rgb,
                e = 0.3 * t[0] + 0.59 * t[1] + 0.11 * t[2];
              return this.setValues("rgb", [e, e, e]), this;
            },
            clearer: function (t) {
              var e = this.values.alpha;
              return this.setValues("alpha", e - e * t), this;
            },
            opaquer: function (t) {
              var e = this.values.alpha;
              return this.setValues("alpha", e + e * t), this;
            },
            rotate: function (t) {
              var e = this.values.hsl,
                a = (e[0] + t) % 360;
              return (
                (e[0] = 0 > a ? 360 + a : a), this.setValues("hsl", e), this
              );
            },
            mix: function (t, e) {
              var a = this,
                i = t,
                n = void 0 === e ? 0.5 : e,
                o = 2 * n - 1,
                r = a.alpha() - i.alpha(),
                l = ((o * r === -1 ? o : (o + r) / (1 + o * r)) + 1) / 2,
                s = 1 - l;
              return this.rgb(
                l * a.red() + s * i.red(),
                l * a.green() + s * i.green(),
                l * a.blue() + s * i.blue()
              ).alpha(a.alpha() * n + i.alpha() * (1 - n));
            },
            toJSON: function () {
              return this.rgb();
            },
            clone: function () {
              var t,
                e,
                a = new o(),
                i = this.values,
                n = a.values;
              for (var r in i)
                i.hasOwnProperty(r) &&
                  ((t = i[r]),
                  (e = {}.toString.call(t)),
                  "[object Array]" === e
                    ? (n[r] = t.slice(0))
                    : "[object Number]" === e
                    ? (n[r] = t)
                    : console.error("unexpected color value:", t));
              return a;
            },
          }),
            (o.prototype.spaces = {
              rgb: ["red", "green", "blue"],
              hsl: ["hue", "saturation", "lightness"],
              hsv: ["hue", "saturation", "value"],
              hwb: ["hue", "whiteness", "blackness"],
              cmyk: ["cyan", "magenta", "yellow", "black"],
            }),
            (o.prototype.maxes = {
              rgb: [255, 255, 255],
              hsl: [360, 100, 100],
              hsv: [360, 100, 100],
              hwb: [360, 100, 100],
              cmyk: [100, 100, 100, 100],
            }),
            (o.prototype.getValues = function (t) {
              for (var e = this.values, a = {}, i = 0; i < t.length; i++)
                a[t.charAt(i)] = e[t][i];
              return 1 !== e.alpha && (a.a = e.alpha), a;
            }),
            (o.prototype.setValues = function (t, e) {
              var a,
                n = this.values,
                o = this.spaces,
                r = this.maxes,
                l = 1;
              if ("alpha" === t) l = e;
              else if (e.length)
                (n[t] = e.slice(0, t.length)), (l = e[t.length]);
              else if (void 0 !== e[t.charAt(0)]) {
                for (a = 0; a < t.length; a++) n[t][a] = e[t.charAt(a)];
                l = e.a;
              } else if (void 0 !== e[o[t][0]]) {
                var s = o[t];
                for (a = 0; a < t.length; a++) n[t][a] = e[s[a]];
                l = e.alpha;
              }
              if (
                ((n.alpha = Math.max(
                  0,
                  Math.min(1, void 0 === l ? n.alpha : l)
                )),
                "alpha" === t)
              )
                return !1;
              var d;
              for (a = 0; a < t.length; a++)
                (d = Math.max(0, Math.min(r[t][a], n[t][a]))),
                  (n[t][a] = Math.round(d));
              for (var u in o) u !== t && (n[u] = i[t][u](n[t]));
              return !0;
            }),
            (o.prototype.setSpace = function (t, e) {
              var a = e[0];
              return void 0 === a
                ? this.getValues(t)
                : ("number" == typeof a && (a = Array.prototype.slice.call(e)),
                  this.setValues(t, a),
                  this);
            }),
            (o.prototype.setChannel = function (t, e, a) {
              var i = this.values[t];
              return void 0 === a
                ? i[e]
                : a === i[e]
                ? this
                : ((i[e] = a), this.setValues(t, i), this);
            }),
            "undefined" != typeof window && (window.Color = o),
            (e.exports = o);
        },
        { 2: 2, 5: 5 },
      ],
      4: [
        function (t, e, a) {
          function i(t) {
            var e,
              a,
              i,
              n = t[0] / 255,
              o = t[1] / 255,
              r = t[2] / 255,
              l = Math.min(n, o, r),
              s = Math.max(n, o, r),
              d = s - l;
            return (
              s == l
                ? (e = 0)
                : n == s
                ? (e = (o - r) / d)
                : o == s
                ? (e = 2 + (r - n) / d)
                : r == s && (e = 4 + (n - o) / d),
              (e = Math.min(60 * e, 360)),
              0 > e && (e += 360),
              (i = (l + s) / 2),
              (a = s == l ? 0 : 0.5 >= i ? d / (s + l) : d / (2 - s - l)),
              [e, 100 * a, 100 * i]
            );
          }
          function n(t) {
            var e,
              a,
              i,
              n = t[0],
              o = t[1],
              r = t[2],
              l = Math.min(n, o, r),
              s = Math.max(n, o, r),
              d = s - l;
            return (
              (a = 0 == s ? 0 : ((d / s) * 1e3) / 10),
              s == l
                ? (e = 0)
                : n == s
                ? (e = (o - r) / d)
                : o == s
                ? (e = 2 + (r - n) / d)
                : r == s && (e = 4 + (n - o) / d),
              (e = Math.min(60 * e, 360)),
              0 > e && (e += 360),
              (i = ((s / 255) * 1e3) / 10),
              [e, a, i]
            );
          }
          function o(t) {
            var e = t[0],
              a = t[1],
              n = t[2],
              o = i(t)[0],
              r = (1 / 255) * Math.min(e, Math.min(a, n)),
              n = 1 - (1 / 255) * Math.max(e, Math.max(a, n));
            return [o, 100 * r, 100 * n];
          }
          function l(t) {
            var e,
              a,
              i,
              n,
              o = t[0] / 255,
              r = t[1] / 255,
              l = t[2] / 255;
            return (
              (n = Math.min(1 - o, 1 - r, 1 - l)),
              (e = (1 - o - n) / (1 - n) || 0),
              (a = (1 - r - n) / (1 - n) || 0),
              (i = (1 - l - n) / (1 - n) || 0),
              [100 * e, 100 * a, 100 * i, 100 * n]
            );
          }
          function s(t) {
            return G[JSON.stringify(t)];
          }
          function d(t) {
            var e = t[0] / 255,
              a = t[1] / 255,
              i = t[2] / 255;
            (e = e > 0.04045 ? Math.pow((e + 0.055) / 1.055, 2.4) : e / 12.92),
              (a =
                a > 0.04045 ? Math.pow((a + 0.055) / 1.055, 2.4) : a / 12.92),
              (i =
                i > 0.04045 ? Math.pow((i + 0.055) / 1.055, 2.4) : i / 12.92);
            var n = 0.4124 * e + 0.3576 * a + 0.1805 * i,
              o = 0.2126 * e + 0.7152 * a + 0.0722 * i,
              r = 0.0193 * e + 0.1192 * a + 0.9505 * i;
            return [100 * n, 100 * o, 100 * r];
          }
          function u(t) {
            var e,
              a,
              i,
              n = d(t),
              o = n[0],
              r = n[1],
              l = n[2];
            return (
              (o /= 95.047),
              (r /= 100),
              (l /= 108.883),
              (o = o > 0.008856 ? Math.pow(o, 1 / 3) : 7.787 * o + 16 / 116),
              (r = r > 0.008856 ? Math.pow(r, 1 / 3) : 7.787 * r + 16 / 116),
              (l = l > 0.008856 ? Math.pow(l, 1 / 3) : 7.787 * l + 16 / 116),
              (e = 116 * r - 16),
              (a = 500 * (o - r)),
              (i = 200 * (r - l)),
              [e, a, i]
            );
          }
          function c(t) {
            return W(u(t));
          }
          function h(t) {
            var e,
              a,
              i,
              n,
              o,
              r = t[0] / 360,
              l = t[1] / 100,
              s = t[2] / 100;
            if (0 == l) return (o = 255 * s), [o, o, o];
            (a = 0.5 > s ? s * (1 + l) : s + l - s * l),
              (e = 2 * s - a),
              (n = [0, 0, 0]);
            for (var d = 0; 3 > d; d++)
              (i = r + (1 / 3) * -(d - 1)),
                0 > i && i++,
                i > 1 && i--,
                (o =
                  1 > 6 * i
                    ? e + 6 * (a - e) * i
                    : 1 > 2 * i
                    ? a
                    : 2 > 3 * i
                    ? e + (a - e) * (2 / 3 - i) * 6
                    : e),
                (n[d] = 255 * o);
            return n;
          }
          function f(t) {
            var e,
              a,
              i = t[0],
              n = t[1] / 100,
              o = t[2] / 100;
            return 0 === o
              ? [0, 0, 0]
              : ((o *= 2),
                (n *= 1 >= o ? o : 2 - o),
                (a = (o + n) / 2),
                (e = (2 * n) / (o + n)),
                [i, 100 * e, 100 * a]);
          }
          function p(t) {
            return o(h(t));
          }
          function m(t) {
            return l(h(t));
          }
          function v(t) {
            return s(h(t));
          }
          function x(t) {
            var e = t[0] / 60,
              a = t[1] / 100,
              i = t[2] / 100,
              n = Math.floor(e) % 6,
              o = e - Math.floor(e),
              r = 255 * i * (1 - a),
              l = 255 * i * (1 - a * o),
              s = 255 * i * (1 - a * (1 - o)),
              i = 255 * i;
            switch (n) {
              case 0:
                return [i, s, r];
              case 1:
                return [l, i, r];
              case 2:
                return [r, i, s];
              case 3:
                return [r, l, i];
              case 4:
                return [s, r, i];
              case 5:
                return [i, r, l];
            }
          }
          function y(t) {
            var e,
              a,
              i = t[0],
              n = t[1] / 100,
              o = t[2] / 100;
            return (
              (a = (2 - n) * o),
              (e = n * o),
              (e /= 1 >= a ? a : 2 - a),
              (e = e || 0),
              (a /= 2),
              [i, 100 * e, 100 * a]
            );
          }
          function k(t) {
            return o(x(t));
          }
          function S(t) {
            return l(x(t));
          }
          function w(t) {
            return s(x(t));
          }
          function M(t) {
            var e,
              a,
              i,
              n,
              o = t[0] / 360,
              l = t[1] / 100,
              s = t[2] / 100,
              d = l + s;
            switch (
              (d > 1 && ((l /= d), (s /= d)),
              (e = Math.floor(6 * o)),
              (a = 1 - s),
              (i = 6 * o - e),
              0 != (1 & e) && (i = 1 - i),
              (n = l + i * (a - l)),
              e)
            ) {
              default:
              case 6:
              case 0:
                (r = a), (g = n), (b = l);
                break;
              case 1:
                (r = n), (g = a), (b = l);
                break;
              case 2:
                (r = l), (g = a), (b = n);
                break;
              case 3:
                (r = l), (g = n), (b = a);
                break;
              case 4:
                (r = n), (g = l), (b = a);
                break;
              case 5:
                (r = a), (g = l), (b = n);
            }
            return [255 * r, 255 * g, 255 * b];
          }
          function C(t) {
            return i(M(t));
          }
          function D(t) {
            return n(M(t));
          }
          function I(t) {
            return l(M(t));
          }
          function A(t) {
            return s(M(t));
          }
          function T(t) {
            var e,
              a,
              i,
              n = t[0] / 100,
              o = t[1] / 100,
              r = t[2] / 100,
              l = t[3] / 100;
            return (
              (e = 1 - Math.min(1, n * (1 - l) + l)),
              (a = 1 - Math.min(1, o * (1 - l) + l)),
              (i = 1 - Math.min(1, r * (1 - l) + l)),
              [255 * e, 255 * a, 255 * i]
            );
          }
          function P(t) {
            return i(T(t));
          }
          function F(t) {
            return n(T(t));
          }
          function _(t) {
            return o(T(t));
          }
          function R(t) {
            return s(T(t));
          }
          function V(t) {
            var e,
              a,
              i,
              n = t[0] / 100,
              o = t[1] / 100,
              r = t[2] / 100;
            return (
              (e = 3.2406 * n + -1.5372 * o + r * -0.4986),
              (a = n * -0.9689 + 1.8758 * o + 0.0415 * r),
              (i = 0.0557 * n + o * -0.204 + 1.057 * r),
              (e =
                e > 0.0031308
                  ? 1.055 * Math.pow(e, 1 / 2.4) - 0.055
                  : (e = 12.92 * e)),
              (a =
                a > 0.0031308
                  ? 1.055 * Math.pow(a, 1 / 2.4) - 0.055
                  : (a = 12.92 * a)),
              (i =
                i > 0.0031308
                  ? 1.055 * Math.pow(i, 1 / 2.4) - 0.055
                  : (i = 12.92 * i)),
              (e = Math.min(Math.max(0, e), 1)),
              (a = Math.min(Math.max(0, a), 1)),
              (i = Math.min(Math.max(0, i), 1)),
              [255 * e, 255 * a, 255 * i]
            );
          }
          function L(t) {
            var e,
              a,
              i,
              n = t[0],
              o = t[1],
              r = t[2];
            return (
              (n /= 95.047),
              (o /= 100),
              (r /= 108.883),
              (n = n > 0.008856 ? Math.pow(n, 1 / 3) : 7.787 * n + 16 / 116),
              (o = o > 0.008856 ? Math.pow(o, 1 / 3) : 7.787 * o + 16 / 116),
              (r = r > 0.008856 ? Math.pow(r, 1 / 3) : 7.787 * r + 16 / 116),
              (e = 116 * o - 16),
              (a = 500 * (n - o)),
              (i = 200 * (o - r)),
              [e, a, i]
            );
          }
          function O(t) {
            return W(L(t));
          }
          function B(t) {
            var e,
              a,
              i,
              n,
              o = t[0],
              r = t[1],
              l = t[2];
            return (
              8 >= o
                ? ((a = (100 * o) / 903.3), (n = 7.787 * (a / 100) + 16 / 116))
                : ((a = 100 * Math.pow((o + 16) / 116, 3)),
                  (n = Math.pow(a / 100, 1 / 3))),
              (e =
                0.008856 >= e / 95.047
                  ? (e = (95.047 * (r / 500 + n - 16 / 116)) / 7.787)
                  : 95.047 * Math.pow(r / 500 + n, 3)),
              (i =
                0.008859 >= i / 108.883
                  ? (i = (108.883 * (n - l / 200 - 16 / 116)) / 7.787)
                  : 108.883 * Math.pow(n - l / 200, 3)),
              [e, a, i]
            );
          }
          function W(t) {
            var e,
              a,
              i,
              n = t[0],
              o = t[1],
              r = t[2];
            return (
              (e = Math.atan2(r, o)),
              (a = (360 * e) / 2 / Math.PI),
              0 > a && (a += 360),
              (i = Math.sqrt(o * o + r * r)),
              [n, i, a]
            );
          }
          function z(t) {
            return V(B(t));
          }
          function N(t) {
            var e,
              a,
              i,
              n = t[0],
              o = t[1],
              r = t[2];
            return (
              (i = (r / 360) * 2 * Math.PI),
              (e = o * Math.cos(i)),
              (a = o * Math.sin(i)),
              [n, e, a]
            );
          }
          function E(t) {
            return B(N(t));
          }
          function H(t) {
            return z(N(t));
          }
          function U(t) {
            return Z[t];
          }
          function j(t) {
            return i(U(t));
          }
          function q(t) {
            return n(U(t));
          }
          function Y(t) {
            return o(U(t));
          }
          function X(t) {
            return l(U(t));
          }
          function K(t) {
            return u(U(t));
          }
          function J(t) {
            return d(U(t));
          }
          e.exports = {
            rgb2hsl: i,
            rgb2hsv: n,
            rgb2hwb: o,
            rgb2cmyk: l,
            rgb2keyword: s,
            rgb2xyz: d,
            rgb2lab: u,
            rgb2lch: c,
            hsl2rgb: h,
            hsl2hsv: f,
            hsl2hwb: p,
            hsl2cmyk: m,
            hsl2keyword: v,
            hsv2rgb: x,
            hsv2hsl: y,
            hsv2hwb: k,
            hsv2cmyk: S,
            hsv2keyword: w,
            hwb2rgb: M,
            hwb2hsl: C,
            hwb2hsv: D,
            hwb2cmyk: I,
            hwb2keyword: A,
            cmyk2rgb: T,
            cmyk2hsl: P,
            cmyk2hsv: F,
            cmyk2hwb: _,
            cmyk2keyword: R,
            keyword2rgb: U,
            keyword2hsl: j,
            keyword2hsv: q,
            keyword2hwb: Y,
            keyword2cmyk: X,
            keyword2lab: K,
            keyword2xyz: J,
            xyz2rgb: V,
            xyz2lab: L,
            xyz2lch: O,
            lab2xyz: B,
            lab2rgb: z,
            lab2lch: W,
            lch2lab: N,
            lch2xyz: E,
            lch2rgb: H,
          };
          var Z = {
              aliceblue: [240, 248, 255],
              antiquewhite: [250, 235, 215],
              aqua: [0, 255, 255],
              aquamarine: [127, 255, 212],
              azure: [240, 255, 255],
              beige: [245, 245, 220],
              bisque: [255, 228, 196],
              black: [0, 0, 0],
              blanchedalmond: [255, 235, 205],
              blue: [0, 0, 255],
              blueviolet: [138, 43, 226],
              brown: [165, 42, 42],
              burlywood: [222, 184, 135],
              cadetblue: [95, 158, 160],
              chartreuse: [127, 255, 0],
              chocolate: [210, 105, 30],
              coral: [255, 127, 80],
              cornflowerblue: [100, 149, 237],
              cornsilk: [255, 248, 220],
              crimson: [220, 20, 60],
              cyan: [0, 255, 255],
              darkblue: [0, 0, 139],
              darkcyan: [0, 139, 139],
              darkgoldenrod: [184, 134, 11],
              darkgray: [169, 169, 169],
              darkgreen: [0, 100, 0],
              darkgrey: [169, 169, 169],
              darkkhaki: [189, 183, 107],
              darkmagenta: [139, 0, 139],
              darkolivegreen: [85, 107, 47],
              darkorange: [255, 140, 0],
              darkorchid: [153, 50, 204],
              darkred: [139, 0, 0],
              darksalmon: [233, 150, 122],
              darkseagreen: [143, 188, 143],
              darkslateblue: [72, 61, 139],
              darkslategray: [47, 79, 79],
              darkslategrey: [47, 79, 79],
              darkturquoise: [0, 206, 209],
              darkviolet: [148, 0, 211],
              deeppink: [255, 20, 147],
              deepskyblue: [0, 191, 255],
              dimgray: [105, 105, 105],
              dimgrey: [105, 105, 105],
              dodgerblue: [30, 144, 255],
              firebrick: [178, 34, 34],
              floralwhite: [255, 250, 240],
              forestgreen: [34, 139, 34],
              fuchsia: [255, 0, 255],
              gainsboro: [220, 220, 220],
              ghostwhite: [248, 248, 255],
              gold: [255, 215, 0],
              goldenrod: [218, 165, 32],
              gray: [128, 128, 128],
              green: [0, 128, 0],
              greenyellow: [173, 255, 47],
              grey: [128, 128, 128],
              honeydew: [240, 255, 240],
              hotpink: [255, 105, 180],
              indianred: [205, 92, 92],
              indigo: [75, 0, 130],
              ivory: [255, 255, 240],
              khaki: [240, 230, 140],
              lavender: [230, 230, 250],
              lavenderblush: [255, 240, 245],
              lawngreen: [124, 252, 0],
              lemonchiffon: [255, 250, 205],
              lightblue: [173, 216, 230],
              lightcoral: [240, 128, 128],
              lightcyan: [224, 255, 255],
              lightgoldenrodyellow: [250, 250, 210],
              lightgray: [211, 211, 211],
              lightgreen: [144, 238, 144],
              lightgrey: [211, 211, 211],
              lightpink: [255, 182, 193],
              lightsalmon: [255, 160, 122],
              lightseagreen: [32, 178, 170],
              lightskyblue: [135, 206, 250],
              lightslategray: [119, 136, 153],
              lightslategrey: [119, 136, 153],
              lightsteelblue: [176, 196, 222],
              lightyellow: [255, 255, 224],
              lime: [0, 255, 0],
              limegreen: [50, 205, 50],
              linen: [250, 240, 230],
              magenta: [255, 0, 255],
              maroon: [128, 0, 0],
              mediumaquamarine: [102, 205, 170],
              mediumblue: [0, 0, 205],
              mediumorchid: [186, 85, 211],
              mediumpurple: [147, 112, 219],
              mediumseagreen: [60, 179, 113],
              mediumslateblue: [123, 104, 238],
              mediumspringgreen: [0, 250, 154],
              mediumturquoise: [72, 209, 204],
              mediumvioletred: [199, 21, 133],
              midnightblue: [25, 25, 112],
              mintcream: [245, 255, 250],
              mistyrose: [255, 228, 225],
              moccasin: [255, 228, 181],
              navajowhite: [255, 222, 173],
              navy: [0, 0, 128],
              oldlace: [253, 245, 230],
              olive: [128, 128, 0],
              olivedrab: [107, 142, 35],
              orange: [255, 165, 0],
              orangered: [255, 69, 0],
              orchid: [218, 112, 214],
              palegoldenrod: [238, 232, 170],
              palegreen: [152, 251, 152],
              paleturquoise: [175, 238, 238],
              palevioletred: [219, 112, 147],
              papayawhip: [255, 239, 213],
              peachpuff: [255, 218, 185],
              peru: [205, 133, 63],
              pink: [255, 192, 203],
              plum: [221, 160, 221],
              powderblue: [176, 224, 230],
              purple: [128, 0, 128],
              rebeccapurple: [102, 51, 153],
              red: [255, 0, 0],
              rosybrown: [188, 143, 143],
              royalblue: [65, 105, 225],
              saddlebrown: [139, 69, 19],
              salmon: [250, 128, 114],
              sandybrown: [244, 164, 96],
              seagreen: [46, 139, 87],
              seashell: [255, 245, 238],
              sienna: [160, 82, 45],
              silver: [192, 192, 192],
              skyblue: [135, 206, 235],
              slateblue: [106, 90, 205],
              slategray: [112, 128, 144],
              slategrey: [112, 128, 144],
              snow: [255, 250, 250],
              springgreen: [0, 255, 127],
              steelblue: [70, 130, 180],
              tan: [210, 180, 140],
              teal: [0, 128, 128],
              thistle: [216, 191, 216],
              tomato: [255, 99, 71],
              turquoise: [64, 224, 208],
              violet: [238, 130, 238],
              wheat: [245, 222, 179],
              white: [255, 255, 255],
              whitesmoke: [245, 245, 245],
              yellow: [255, 255, 0],
              yellowgreen: [154, 205, 50],
            },
            G = {};
          for (var Q in Z) G[JSON.stringify(Z[Q])] = Q;
        },
        {},
      ],
      5: [
        function (t, e, a) {
          var i = t(4),
            n = function () {
              return new d();
            };
          for (var o in i) {
            n[o + "Raw"] = (function (t) {
              return function (e) {
                return (
                  "number" == typeof e &&
                    (e = Array.prototype.slice.call(arguments)),
                  i[t](e)
                );
              };
            })(o);
            var r = /(\w+)2(\w+)/.exec(o),
              l = r[1],
              s = r[2];
            (n[l] = n[l] || {}),
              (n[l][s] = n[o] =
                (function (t) {
                  return function (e) {
                    "number" == typeof e &&
                      (e = Array.prototype.slice.call(arguments));
                    var a = i[t](e);
                    if ("string" == typeof a || void 0 === a) return a;
                    for (var n = 0; n < a.length; n++) a[n] = Math.round(a[n]);
                    return a;
                  };
                })(o));
          }
          var d = function () {
            this.convs = {};
          };
          (d.prototype.routeSpace = function (t, e) {
            var a = e[0];
            return void 0 === a
              ? this.getValues(t)
              : ("number" == typeof a && (a = Array.prototype.slice.call(e)),
                this.setValues(t, a));
          }),
            (d.prototype.setValues = function (t, e) {
              return (
                (this.space = t), (this.convs = {}), (this.convs[t] = e), this
              );
            }),
            (d.prototype.getValues = function (t) {
              var e = this.convs[t];
              if (!e) {
                var a = this.space,
                  i = this.convs[a];
                (e = n[a][t](i)), (this.convs[t] = e);
              }
              return e;
            }),
            ["rgb", "hsl", "hsv", "cmyk", "keyword"].forEach(function (t) {
              d.prototype[t] = function (e) {
                return this.routeSpace(t, arguments);
              };
            }),
            (e.exports = n);
        },
        { 4: 4 },
      ],
      6: [
        function (t, e, a) {
          e.exports = {
            aliceblue: [240, 248, 255],
            antiquewhite: [250, 235, 215],
            aqua: [0, 255, 255],
            aquamarine: [127, 255, 212],
            azure: [240, 255, 255],
            beige: [245, 245, 220],
            bisque: [255, 228, 196],
            black: [0, 0, 0],
            blanchedalmond: [255, 235, 205],
            blue: [0, 0, 255],
            blueviolet: [138, 43, 226],
            brown: [165, 42, 42],
            burlywood: [222, 184, 135],
            cadetblue: [95, 158, 160],
            chartreuse: [127, 255, 0],
            chocolate: [210, 105, 30],
            coral: [255, 127, 80],
            cornflowerblue: [100, 149, 237],
            cornsilk: [255, 248, 220],
            crimson: [220, 20, 60],
            cyan: [0, 255, 255],
            darkblue: [0, 0, 139],
            darkcyan: [0, 139, 139],
            darkgoldenrod: [184, 134, 11],
            darkgray: [169, 169, 169],
            darkgreen: [0, 100, 0],
            darkgrey: [169, 169, 169],
            darkkhaki: [189, 183, 107],
            darkmagenta: [139, 0, 139],
            darkolivegreen: [85, 107, 47],
            darkorange: [255, 140, 0],
            darkorchid: [153, 50, 204],
            darkred: [139, 0, 0],
            darksalmon: [233, 150, 122],
            darkseagreen: [143, 188, 143],
            darkslateblue: [72, 61, 139],
            darkslategray: [47, 79, 79],
            darkslategrey: [47, 79, 79],
            darkturquoise: [0, 206, 209],
            darkviolet: [148, 0, 211],
            deeppink: [255, 20, 147],
            deepskyblue: [0, 191, 255],
            dimgray: [105, 105, 105],
            dimgrey: [105, 105, 105],
            dodgerblue: [30, 144, 255],
            firebrick: [178, 34, 34],
            floralwhite: [255, 250, 240],
            forestgreen: [34, 139, 34],
            fuchsia: [255, 0, 255],
            gainsboro: [220, 220, 220],
            ghostwhite: [248, 248, 255],
            gold: [255, 215, 0],
            goldenrod: [218, 165, 32],
            gray: [128, 128, 128],
            green: [0, 128, 0],
            greenyellow: [173, 255, 47],
            grey: [128, 128, 128],
            honeydew: [240, 255, 240],
            hotpink: [255, 105, 180],
            indianred: [205, 92, 92],
            indigo: [75, 0, 130],
            ivory: [255, 255, 240],
            khaki: [240, 230, 140],
            lavender: [230, 230, 250],
            lavenderblush: [255, 240, 245],
            lawngreen: [124, 252, 0],
            lemonchiffon: [255, 250, 205],
            lightblue: [173, 216, 230],
            lightcoral: [240, 128, 128],
            lightcyan: [224, 255, 255],
            lightgoldenrodyellow: [250, 250, 210],
            lightgray: [211, 211, 211],
            lightgreen: [144, 238, 144],
            lightgrey: [211, 211, 211],
            lightpink: [255, 182, 193],
            lightsalmon: [255, 160, 122],
            lightseagreen: [32, 178, 170],
            lightskyblue: [135, 206, 250],
            lightslategray: [119, 136, 153],
            lightslategrey: [119, 136, 153],
            lightsteelblue: [176, 196, 222],
            lightyellow: [255, 255, 224],
            lime: [0, 255, 0],
            limegreen: [50, 205, 50],
            linen: [250, 240, 230],
            magenta: [255, 0, 255],
            maroon: [128, 0, 0],
            mediumaquamarine: [102, 205, 170],
            mediumblue: [0, 0, 205],
            mediumorchid: [186, 85, 211],
            mediumpurple: [147, 112, 219],
            mediumseagreen: [60, 179, 113],
            mediumslateblue: [123, 104, 238],
            mediumspringgreen: [0, 250, 154],
            mediumturquoise: [72, 209, 204],
            mediumvioletred: [199, 21, 133],
            midnightblue: [25, 25, 112],
            mintcream: [245, 255, 250],
            mistyrose: [255, 228, 225],
            moccasin: [255, 228, 181],
            navajowhite: [255, 222, 173],
            navy: [0, 0, 128],
            oldlace: [253, 245, 230],
            olive: [128, 128, 0],
            olivedrab: [107, 142, 35],
            orange: [255, 165, 0],
            orangered: [255, 69, 0],
            orchid: [218, 112, 214],
            palegoldenrod: [238, 232, 170],
            palegreen: [152, 251, 152],
            paleturquoise: [175, 238, 238],
            palevioletred: [219, 112, 147],
            papayawhip: [255, 239, 213],
            peachpuff: [255, 218, 185],
            peru: [205, 133, 63],
            pink: [255, 192, 203],
            plum: [221, 160, 221],
            powderblue: [176, 224, 230],
            purple: [128, 0, 128],
            rebeccapurple: [102, 51, 153],
            red: [255, 0, 0],
            rosybrown: [188, 143, 143],
            royalblue: [65, 105, 225],
            saddlebrown: [139, 69, 19],
            salmon: [250, 128, 114],
            sandybrown: [244, 164, 96],
            seagreen: [46, 139, 87],
            seashell: [255, 245, 238],
            sienna: [160, 82, 45],
            silver: [192, 192, 192],
            skyblue: [135, 206, 235],
            slateblue: [106, 90, 205],
            slategray: [112, 128, 144],
            slategrey: [112, 128, 144],
            snow: [255, 250, 250],
            springgreen: [0, 255, 127],
            steelblue: [70, 130, 180],
            tan: [210, 180, 140],
            teal: [0, 128, 128],
            thistle: [216, 191, 216],
            tomato: [255, 99, 71],
            turquoise: [64, 224, 208],
            violet: [238, 130, 238],
            wheat: [245, 222, 179],
            white: [255, 255, 255],
            whitesmoke: [245, 245, 245],
            yellow: [255, 255, 0],
            yellowgreen: [154, 205, 50],
          };
        },
        {},
      ],
      7: [
        function (t, e, a) {
          var i = t(28)();
          t(26)(i),
            t(22)(i),
            t(25)(i),
            t(21)(i),
            t(23)(i),
            t(24)(i),
            t(29)(i),
            t(33)(i),
            t(31)(i),
            t(34)(i),
            t(32)(i),
            t(35)(i),
            t(30)(i),
            t(27)(i),
            t(36)(i),
            t(37)(i),
            t(38)(i),
            t(39)(i),
            t(40)(i),
            t(43)(i),
            t(41)(i),
            t(42)(i),
            t(44)(i),
            t(45)(i),
            t(46)(i),
            t(15)(i),
            t(16)(i),
            t(17)(i),
            t(18)(i),
            t(19)(i),
            t(20)(i),
            t(8)(i),
            t(9)(i),
            t(10)(i),
            t(11)(i),
            t(12)(i),
            t(13)(i),
            t(14)(i),
            (window.Chart = e.exports = i);
        },
        {
          10: 10,
          11: 11,
          12: 12,
          13: 13,
          14: 14,
          15: 15,
          16: 16,
          17: 17,
          18: 18,
          19: 19,
          20: 20,
          21: 21,
          22: 22,
          23: 23,
          24: 24,
          25: 25,
          26: 26,
          27: 27,
          28: 28,
          29: 29,
          30: 30,
          31: 31,
          32: 32,
          33: 33,
          34: 34,
          35: 35,
          36: 36,
          37: 37,
          38: 38,
          39: 39,
          40: 40,
          41: 41,
          42: 42,
          43: 43,
          44: 44,
          45: 45,
          46: 46,
          8: 8,
          9: 9,
        },
      ],
      8: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.Bar = function (e, a) {
              return (a.type = "bar"), new t(e, a);
            };
          };
        },
        {},
      ],
      9: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.Bubble = function (e, a) {
              return (a.type = "bubble"), new t(e, a);
            };
          };
        },
        {},
      ],
      10: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.Doughnut = function (e, a) {
              return (a.type = "doughnut"), new t(e, a);
            };
          };
        },
        {},
      ],
      11: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.Line = function (e, a) {
              return (a.type = "line"), new t(e, a);
            };
          };
        },
        {},
      ],
      12: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.PolarArea = function (e, a) {
              return (a.type = "polarArea"), new t(e, a);
            };
          };
        },
        {},
      ],
      13: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            t.Radar = function (e, a) {
              return (a.type = "radar"), new t(e, a);
            };
          };
        },
        {},
      ],
      14: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = {
              hover: { mode: "single" },
              scales: {
                xAxes: [{ type: "linear", position: "bottom", id: "x-axis-1" }],
                yAxes: [{ type: "linear", position: "left", id: "y-axis-1" }],
              },
              tooltips: {
                callbacks: {
                  title: function () {
                    return "";
                  },
                  label: function (t) {
                    return "(" + t.xLabel + ", " + t.yLabel + ")";
                  },
                },
              },
            };
            (t.defaults.scatter = e),
              (t.controllers.scatter = t.controllers.line),
              (t.Scatter = function (e, a) {
                return (a.type = "scatter"), new t(e, a);
              });
          };
        },
        {},
      ],
      15: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.bar = {
              hover: { mode: "label" },
              scales: {
                xAxes: [
                  {
                    type: "category",
                    categoryPercentage: 0.8,
                    barPercentage: 0.9,
                    gridLines: { offsetGridLines: !0 },
                  },
                ],
                yAxes: [{ type: "linear" }],
              },
            }),
              (t.controllers.bar = t.DatasetController.extend({
                dataElementType: t.elements.Rectangle,
                initialize: function (e, a) {
                  t.DatasetController.prototype.initialize.call(this, e, a),
                    (this.getMeta().bar = !0);
                },
                getBarCount: function () {
                  var t = this,
                    a = 0;
                  return (
                    e.each(
                      t.chart.data.datasets,
                      function (e, i) {
                        var n = t.chart.getDatasetMeta(i);
                        n.bar && t.chart.isDatasetVisible(i) && ++a;
                      },
                      t
                    ),
                    a
                  );
                },
                update: function (t) {
                  var a = this;
                  e.each(
                    a.getMeta().data,
                    function (e, i) {
                      a.updateElement(e, i, t);
                    },
                    a
                  );
                },
                updateElement: function (t, a, i) {
                  var n = this,
                    o = n.getMeta(),
                    r = n.getScaleForId(o.xAxisID),
                    l = n.getScaleForId(o.yAxisID),
                    s = l.getBasePixel(),
                    d = n.chart.options.elements.rectangle,
                    u = t.custom || {},
                    c = n.getDataset();
                  (t._xScale = r),
                    (t._yScale = l),
                    (t._datasetIndex = n.index),
                    (t._index = a);
                  var h = n.getRuler(a);
                  (t._model = {
                    x: n.calculateBarX(a, n.index, h),
                    y: i ? s : n.calculateBarY(a, n.index),
                    label: n.chart.data.labels[a],
                    datasetLabel: c.label,
                    base: i ? s : n.calculateBarBase(n.index, a),
                    width: n.calculateBarWidth(h),
                    backgroundColor: u.backgroundColor
                      ? u.backgroundColor
                      : e.getValueAtIndexOrDefault(
                          c.backgroundColor,
                          a,
                          d.backgroundColor
                        ),
                    borderSkipped: u.borderSkipped
                      ? u.borderSkipped
                      : d.borderSkipped,
                    borderColor: u.borderColor
                      ? u.borderColor
                      : e.getValueAtIndexOrDefault(
                          c.borderColor,
                          a,
                          d.borderColor
                        ),
                    borderWidth: u.borderWidth
                      ? u.borderWidth
                      : e.getValueAtIndexOrDefault(
                          c.borderWidth,
                          a,
                          d.borderWidth
                        ),
                  }),
                    t.pivot();
                },
                calculateBarBase: function (t, e) {
                  var a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.yAxisID),
                    o = 0;
                  if (n.options.stacked) {
                    for (
                      var r = a.chart,
                        l = r.data.datasets,
                        s = Number(l[t].data[e]),
                        d = 0;
                      t > d;
                      d++
                    ) {
                      var u = l[d],
                        c = r.getDatasetMeta(d);
                      if (
                        c.bar &&
                        c.yAxisID === n.id &&
                        r.isDatasetVisible(d)
                      ) {
                        var h = Number(u.data[e]);
                        o += 0 > s ? Math.min(h, 0) : Math.max(h, 0);
                      }
                    }
                    return n.getPixelForValue(o);
                  }
                  return n.getBasePixel();
                },
                getRuler: function (t) {
                  var e,
                    a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.xAxisID),
                    o = a.getBarCount();
                  e =
                    "category" === n.options.type
                      ? n.getPixelForTick(t + 1) - n.getPixelForTick(t)
                      : n.width / n.ticks.length;
                  var r = e * n.options.categoryPercentage,
                    l = (e - e * n.options.categoryPercentage) / 2,
                    s = r / o;
                  if (n.ticks.length !== a.chart.data.labels.length) {
                    var d = n.ticks.length / a.chart.data.labels.length;
                    s *= d;
                  }
                  var u = s * n.options.barPercentage,
                    c = s - s * n.options.barPercentage;
                  return {
                    datasetCount: o,
                    tickWidth: e,
                    categoryWidth: r,
                    categorySpacing: l,
                    fullBarWidth: s,
                    barWidth: u,
                    barSpacing: c,
                  };
                },
                calculateBarWidth: function (t) {
                  var e = this.getScaleForId(this.getMeta().xAxisID);
                  return e.options.barThickness
                    ? e.options.barThickness
                    : e.options.stacked
                    ? t.categoryWidth
                    : t.barWidth;
                },
                getBarIndex: function (t) {
                  var e,
                    a,
                    i = 0;
                  for (a = 0; t > a; ++a)
                    (e = this.chart.getDatasetMeta(a)),
                      e.bar && this.chart.isDatasetVisible(a) && ++i;
                  return i;
                },
                calculateBarX: function (t, e, a) {
                  var i = this,
                    n = i.getMeta(),
                    o = i.getScaleForId(n.xAxisID),
                    r = i.getBarIndex(e),
                    l = o.getPixelForValue(null, t, e, i.chart.isCombo);
                  return (
                    (l -= i.chart.isCombo ? a.tickWidth / 2 : 0),
                    o.options.stacked
                      ? l + a.categoryWidth / 2 + a.categorySpacing
                      : l +
                        a.barWidth / 2 +
                        a.categorySpacing +
                        a.barWidth * r +
                        a.barSpacing / 2 +
                        a.barSpacing * r
                  );
                },
                calculateBarY: function (t, e) {
                  var a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.yAxisID),
                    o = Number(a.getDataset().data[t]);
                  if (n.options.stacked) {
                    for (var r = 0, l = 0, s = 0; e > s; s++) {
                      var d = a.chart.data.datasets[s],
                        u = a.chart.getDatasetMeta(s);
                      if (
                        u.bar &&
                        u.yAxisID === n.id &&
                        a.chart.isDatasetVisible(s)
                      ) {
                        var c = Number(d.data[t]);
                        0 > c ? (l += c || 0) : (r += c || 0);
                      }
                    }
                    return 0 > o
                      ? n.getPixelForValue(l + o)
                      : n.getPixelForValue(r + o);
                  }
                  return n.getPixelForValue(o);
                },
                draw: function (t) {
                  var e,
                    a,
                    i = this,
                    n = t || 1,
                    o = i.getMeta().data,
                    r = i.getDataset();
                  for (e = 0, a = o.length; a > e; ++e) {
                    var l = r.data[e];
                    null === l ||
                      void 0 === l ||
                      isNaN(l) ||
                      o[e].transition(n).draw();
                  }
                },
                setHoverStyle: function (t) {
                  var a = this.chart.data.datasets[t._datasetIndex],
                    i = t._index,
                    n = t.custom || {},
                    o = t._model;
                  (o.backgroundColor = n.hoverBackgroundColor
                    ? n.hoverBackgroundColor
                    : e.getValueAtIndexOrDefault(
                        a.hoverBackgroundColor,
                        i,
                        e.getHoverColor(o.backgroundColor)
                      )),
                    (o.borderColor = n.hoverBorderColor
                      ? n.hoverBorderColor
                      : e.getValueAtIndexOrDefault(
                          a.hoverBorderColor,
                          i,
                          e.getHoverColor(o.borderColor)
                        )),
                    (o.borderWidth = n.hoverBorderWidth
                      ? n.hoverBorderWidth
                      : e.getValueAtIndexOrDefault(
                          a.hoverBorderWidth,
                          i,
                          o.borderWidth
                        ));
                },
                removeHoverStyle: function (t) {
                  var a = this.chart.data.datasets[t._datasetIndex],
                    i = t._index,
                    n = t.custom || {},
                    o = t._model,
                    r = this.chart.options.elements.rectangle;
                  (o.backgroundColor = n.backgroundColor
                    ? n.backgroundColor
                    : e.getValueAtIndexOrDefault(
                        a.backgroundColor,
                        i,
                        r.backgroundColor
                      )),
                    (o.borderColor = n.borderColor
                      ? n.borderColor
                      : e.getValueAtIndexOrDefault(
                          a.borderColor,
                          i,
                          r.borderColor
                        )),
                    (o.borderWidth = n.borderWidth
                      ? n.borderWidth
                      : e.getValueAtIndexOrDefault(
                          a.borderWidth,
                          i,
                          r.borderWidth
                        ));
                },
              })),
              (t.defaults.horizontalBar = {
                hover: { mode: "label" },
                scales: {
                  xAxes: [{ type: "linear", position: "bottom" }],
                  yAxes: [
                    {
                      position: "left",
                      type: "category",
                      categoryPercentage: 0.8,
                      barPercentage: 0.9,
                      gridLines: { offsetGridLines: !0 },
                    },
                  ],
                },
                elements: { rectangle: { borderSkipped: "left" } },
                tooltips: {
                  callbacks: {
                    title: function (t, e) {
                      var a = "";
                      return (
                        t.length > 0 &&
                          (t[0].yLabel
                            ? (a = t[0].yLabel)
                            : e.labels.length > 0 &&
                              t[0].index < e.labels.length &&
                              (a = e.labels[t[0].index])),
                        a
                      );
                    },
                    label: function (t, e) {
                      var a = e.datasets[t.datasetIndex].label || "";
                      return a + ": " + t.xLabel;
                    },
                  },
                },
              }),
              (t.controllers.horizontalBar = t.controllers.bar.extend({
                updateElement: function (t, a, i) {
                  var n = this,
                    o = n.getMeta(),
                    r = n.getScaleForId(o.xAxisID),
                    l = n.getScaleForId(o.yAxisID),
                    s = r.getBasePixel(),
                    d = t.custom || {},
                    u = n.getDataset(),
                    c = n.chart.options.elements.rectangle;
                  (t._xScale = r),
                    (t._yScale = l),
                    (t._datasetIndex = n.index),
                    (t._index = a);
                  var h = n.getRuler(a);
                  (t._model = {
                    x: i ? s : n.calculateBarX(a, n.index),
                    y: n.calculateBarY(a, n.index, h),
                    label: n.chart.data.labels[a],
                    datasetLabel: u.label,
                    base: i ? s : n.calculateBarBase(n.index, a),
                    height: n.calculateBarHeight(h),
                    backgroundColor: d.backgroundColor
                      ? d.backgroundColor
                      : e.getValueAtIndexOrDefault(
                          u.backgroundColor,
                          a,
                          c.backgroundColor
                        ),
                    borderSkipped: d.borderSkipped
                      ? d.borderSkipped
                      : c.borderSkipped,
                    borderColor: d.borderColor
                      ? d.borderColor
                      : e.getValueAtIndexOrDefault(
                          u.borderColor,
                          a,
                          c.borderColor
                        ),
                    borderWidth: d.borderWidth
                      ? d.borderWidth
                      : e.getValueAtIndexOrDefault(
                          u.borderWidth,
                          a,
                          c.borderWidth
                        ),
                  }),
                    (t.draw = function () {
                      function t(t) {
                        return s[(u + t) % 4];
                      }
                      var e = this._chart.ctx,
                        a = this._view,
                        i = a.height / 2,
                        n = a.y - i,
                        o = a.y + i,
                        r = a.base - (a.base - a.x),
                        l = a.borderWidth / 2;
                      a.borderWidth && ((n += l), (o -= l), (r += l)),
                        e.beginPath(),
                        (e.fillStyle = a.backgroundColor),
                        (e.strokeStyle = a.borderColor),
                        (e.lineWidth = a.borderWidth);
                      var s = [
                          [a.base, o],
                          [a.base, n],
                          [r, n],
                          [r, o],
                        ],
                        d = ["bottom", "left", "top", "right"],
                        u = d.indexOf(a.borderSkipped, 0);
                      -1 === u && (u = 0), e.moveTo.apply(e, t(0));
                      for (var c = 1; 4 > c; c++) e.lineTo.apply(e, t(c));
                      e.fill(), a.borderWidth && e.stroke();
                    }),
                    t.pivot();
                },
                calculateBarBase: function (t, e) {
                  var a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.xAxisID),
                    o = 0;
                  if (n.options.stacked) {
                    for (
                      var r = a.chart,
                        l = r.data.datasets,
                        s = Number(l[t].data[e]),
                        d = 0;
                      t > d;
                      d++
                    ) {
                      var u = l[d],
                        c = r.getDatasetMeta(d);
                      if (
                        c.bar &&
                        c.xAxisID === n.id &&
                        r.isDatasetVisible(d)
                      ) {
                        var h = Number(u.data[e]);
                        o += 0 > s ? Math.min(h, 0) : Math.max(h, 0);
                      }
                    }
                    return n.getPixelForValue(o);
                  }
                  return n.getBasePixel();
                },
                getRuler: function (t) {
                  var e,
                    a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.yAxisID),
                    o = a.getBarCount();
                  e =
                    "category" === n.options.type
                      ? n.getPixelForTick(t + 1) - n.getPixelForTick(t)
                      : n.width / n.ticks.length;
                  var r = e * n.options.categoryPercentage,
                    l = (e - e * n.options.categoryPercentage) / 2,
                    s = r / o;
                  if (n.ticks.length !== a.chart.data.labels.length) {
                    var d = n.ticks.length / a.chart.data.labels.length;
                    s *= d;
                  }
                  var u = s * n.options.barPercentage,
                    c = s - s * n.options.barPercentage;
                  return {
                    datasetCount: o,
                    tickHeight: e,
                    categoryHeight: r,
                    categorySpacing: l,
                    fullBarHeight: s,
                    barHeight: u,
                    barSpacing: c,
                  };
                },
                calculateBarHeight: function (t) {
                  var e = this,
                    a = e.getScaleForId(e.getMeta().yAxisID);
                  return a.options.barThickness
                    ? a.options.barThickness
                    : a.options.stacked
                    ? t.categoryHeight
                    : t.barHeight;
                },
                calculateBarX: function (t, e) {
                  var a = this,
                    i = a.getMeta(),
                    n = a.getScaleForId(i.xAxisID),
                    o = Number(a.getDataset().data[t]);
                  if (n.options.stacked) {
                    for (var r = 0, l = 0, s = 0; e > s; s++) {
                      var d = a.chart.data.datasets[s],
                        u = a.chart.getDatasetMeta(s);
                      if (
                        u.bar &&
                        u.xAxisID === n.id &&
                        a.chart.isDatasetVisible(s)
                      ) {
                        var c = Number(d.data[t]);
                        0 > c ? (l += c || 0) : (r += c || 0);
                      }
                    }
                    return 0 > o
                      ? n.getPixelForValue(l + o)
                      : n.getPixelForValue(r + o);
                  }
                  return n.getPixelForValue(o);
                },
                calculateBarY: function (t, e, a) {
                  var i = this,
                    n = i.getMeta(),
                    o = i.getScaleForId(n.yAxisID),
                    r = i.getBarIndex(e),
                    l = o.getPixelForValue(null, t, e, i.chart.isCombo);
                  return (
                    (l -= i.chart.isCombo ? a.tickHeight / 2 : 0),
                    o.options.stacked
                      ? l + a.categoryHeight / 2 + a.categorySpacing
                      : l +
                        a.barHeight / 2 +
                        a.categorySpacing +
                        a.barHeight * r +
                        a.barSpacing / 2 +
                        a.barSpacing * r
                  );
                },
              }));
          };
        },
        {},
      ],
      16: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.bubble = {
              hover: { mode: "single" },
              scales: {
                xAxes: [{ type: "linear", position: "bottom", id: "x-axis-0" }],
                yAxes: [{ type: "linear", position: "left", id: "y-axis-0" }],
              },
              tooltips: {
                callbacks: {
                  title: function () {
                    return "";
                  },
                  label: function (t, e) {
                    var a = e.datasets[t.datasetIndex].label || "",
                      i = e.datasets[t.datasetIndex].data[t.index];
                    return (
                      a + ": (" + t.xLabel + ", " + t.yLabel + ", " + i.r + ")"
                    );
                  },
                },
              },
            }),
              (t.controllers.bubble = t.DatasetController.extend({
                dataElementType: t.elements.Point,
                update: function (t) {
                  var a = this,
                    i = a.getMeta(),
                    n = i.data;
                  e.each(n, function (e, i) {
                    a.updateElement(e, i, t);
                  });
                },
                updateElement: function (a, i, n) {
                  var o = this,
                    r = o.getMeta(),
                    l = o.getScaleForId(r.xAxisID),
                    s = o.getScaleForId(r.yAxisID),
                    d = a.custom || {},
                    u = o.getDataset(),
                    c = u.data[i],
                    h = o.chart.options.elements.point,
                    f = o.index;
                  e.extend(a, {
                    _xScale: l,
                    _yScale: s,
                    _datasetIndex: f,
                    _index: i,
                    _model: {
                      x: n
                        ? l.getPixelForDecimal(0.5)
                        : l.getPixelForValue(
                            "object" == typeof c ? c : NaN,
                            i,
                            f,
                            o.chart.isCombo
                          ),
                      y: n ? s.getBasePixel() : s.getPixelForValue(c, i, f),
                      radius: n ? 0 : d.radius ? d.radius : o.getRadius(c),
                      hitRadius: d.hitRadius
                        ? d.hitRadius
                        : e.getValueAtIndexOrDefault(
                            u.hitRadius,
                            i,
                            h.hitRadius
                          ),
                    },
                  }),
                    t.DatasetController.prototype.removeHoverStyle.call(
                      o,
                      a,
                      h
                    );
                  var g = a._model;
                  (g.skip = d.skip ? d.skip : isNaN(g.x) || isNaN(g.y)),
                    a.pivot();
                },
                getRadius: function (t) {
                  return t.r || this.chart.options.elements.point.radius;
                },
                setHoverStyle: function (a) {
                  var i = this;
                  t.DatasetController.prototype.setHoverStyle.call(i, a);
                  var n = i.chart.data.datasets[a._datasetIndex],
                    o = a._index,
                    r = a.custom || {},
                    l = a._model;
                  l.radius = r.hoverRadius
                    ? r.hoverRadius
                    : e.getValueAtIndexOrDefault(
                        n.hoverRadius,
                        o,
                        i.chart.options.elements.point.hoverRadius
                      ) + i.getRadius(n.data[o]);
                },
                removeHoverStyle: function (e) {
                  var a = this;
                  t.DatasetController.prototype.removeHoverStyle.call(
                    a,
                    e,
                    a.chart.options.elements.point
                  );
                  var i = a.chart.data.datasets[e._datasetIndex].data[e._index],
                    n = e.custom || {},
                    o = e._model;
                  o.radius = n.radius ? n.radius : a.getRadius(i);
                },
              }));
          };
        },
        {},
      ],
      17: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = t.defaults;
            (a.doughnut = {
              animation: { animateRotate: !0, animateScale: !1 },
              aspectRatio: 1,
              hover: { mode: "single" },
              legendCallback: function (t) {
                var e = [];
                e.push('<ul class="' + t.id + '-legend">');
                var a = t.data,
                  i = a.datasets,
                  n = a.labels;
                if (i.length)
                  for (var o = 0; o < i[0].data.length; ++o)
                    e.push(
                      '<li><span style="background-color:' +
                        i[0].backgroundColor[o] +
                        '"></span>'
                    ),
                      n[o] && e.push(n[o]),
                      e.push("</li>");
                return e.push("</ul>"), e.join("");
              },
              legend: {
                labels: {
                  generateLabels: function (t) {
                    var a = t.data;
                    return a.labels.length && a.datasets.length
                      ? a.labels.map(function (i, n) {
                          var o = t.getDatasetMeta(0),
                            r = a.datasets[0],
                            l = o.data[n],
                            s = (l && l.custom) || {},
                            d = e.getValueAtIndexOrDefault,
                            u = t.options.elements.arc,
                            c = s.backgroundColor
                              ? s.backgroundColor
                              : d(r.backgroundColor, n, u.backgroundColor),
                            h = s.borderColor
                              ? s.borderColor
                              : d(r.borderColor, n, u.borderColor),
                            f = s.borderWidth
                              ? s.borderWidth
                              : d(r.borderWidth, n, u.borderWidth);
                          return {
                            text: i,
                            fillStyle: c,
                            strokeStyle: h,
                            lineWidth: f,
                            hidden: isNaN(r.data[n]) || o.data[n].hidden,
                            index: n,
                          };
                        })
                      : [];
                  },
                },
                onClick: function (t, e) {
                  var a,
                    i,
                    n,
                    o = e.index,
                    r = this.chart;
                  for (a = 0, i = (r.data.datasets || []).length; i > a; ++a)
                    (n = r.getDatasetMeta(a)),
                      n.data[o] && (n.data[o].hidden = !n.data[o].hidden);
                  r.update();
                },
              },
              cutoutPercentage: 50,
              rotation: Math.PI * -0.5,
              circumference: 2 * Math.PI,
              tooltips: {
                callbacks: {
                  title: function () {
                    return "";
                  },
                  label: function (t, a) {
                    var i = a.labels[t.index],
                      n = ": " + a.datasets[t.datasetIndex].data[t.index];
                    return (
                      e.isArray(i) ? ((i = i.slice()), (i[0] += n)) : (i += n),
                      i
                    );
                  },
                },
              },
            }),
              (a.pie = e.clone(a.doughnut)),
              e.extend(a.pie, { cutoutPercentage: 0 }),
              (t.controllers.doughnut = t.controllers.pie =
                t.DatasetController.extend({
                  dataElementType: t.elements.Arc,
                  linkScales: e.noop,
                  getRingIndex: function (t) {
                    for (var e = 0, a = 0; t > a; ++a)
                      this.chart.isDatasetVisible(a) && ++e;
                    return e;
                  },
                  update: function (t) {
                    var a = this,
                      i = a.chart,
                      n = i.chartArea,
                      o = i.options,
                      r = o.elements.arc,
                      l = n.right - n.left - r.borderWidth,
                      s = n.bottom - n.top - r.borderWidth,
                      d = Math.min(l, s),
                      u = { x: 0, y: 0 },
                      c = a.getMeta(),
                      h = o.cutoutPercentage,
                      f = o.circumference;
                    if (f < 2 * Math.PI) {
                      var g = o.rotation % (2 * Math.PI);
                      g +=
                        2 *
                        Math.PI *
                        (g >= Math.PI ? -1 : g < -Math.PI ? 1 : 0);
                      var p = g + f,
                        m = { x: Math.cos(g), y: Math.sin(g) },
                        b = { x: Math.cos(p), y: Math.sin(p) },
                        v =
                          (0 >= g && p >= 0) ||
                          (g <= 2 * Math.PI && 2 * Math.PI <= p),
                        x =
                          (g <= 0.5 * Math.PI && 0.5 * Math.PI <= p) ||
                          (g <= 2.5 * Math.PI && 2.5 * Math.PI <= p),
                        y =
                          (g <= -Math.PI && -Math.PI <= p) ||
                          (g <= Math.PI && Math.PI <= p),
                        k =
                          (g <= 0.5 * -Math.PI && 0.5 * -Math.PI <= p) ||
                          (g <= 1.5 * Math.PI && 1.5 * Math.PI <= p),
                        S = h / 100,
                        w = {
                          x: y
                            ? -1
                            : Math.min(
                                m.x * (m.x < 0 ? 1 : S),
                                b.x * (b.x < 0 ? 1 : S)
                              ),
                          y: k
                            ? -1
                            : Math.min(
                                m.y * (m.y < 0 ? 1 : S),
                                b.y * (b.y < 0 ? 1 : S)
                              ),
                        },
                        M = {
                          x: v
                            ? 1
                            : Math.max(
                                m.x * (m.x > 0 ? 1 : S),
                                b.x * (b.x > 0 ? 1 : S)
                              ),
                          y: x
                            ? 1
                            : Math.max(
                                m.y * (m.y > 0 ? 1 : S),
                                b.y * (b.y > 0 ? 1 : S)
                              ),
                        },
                        C = {
                          width: 0.5 * (M.x - w.x),
                          height: 0.5 * (M.y - w.y),
                        };
                      (d = Math.min(l / C.width, s / C.height)),
                        (u = { x: (M.x + w.x) * -0.5, y: (M.y + w.y) * -0.5 });
                    }
                    (i.borderWidth = a.getMaxBorderWidth(c.data)),
                      (i.outerRadius = Math.max((d - i.borderWidth) / 2, 0)),
                      (i.innerRadius = Math.max(
                        h ? (i.outerRadius / 100) * h : 1,
                        0
                      )),
                      (i.radiusLength =
                        (i.outerRadius - i.innerRadius) /
                        i.getVisibleDatasetCount()),
                      (i.offsetX = u.x * i.outerRadius),
                      (i.offsetY = u.y * i.outerRadius),
                      (c.total = a.calculateTotal()),
                      (a.outerRadius =
                        i.outerRadius -
                        i.radiusLength * a.getRingIndex(a.index)),
                      (a.innerRadius = a.outerRadius - i.radiusLength),
                      e.each(c.data, function (e, i) {
                        a.updateElement(e, i, t);
                      });
                  },
                  updateElement: function (t, a, i) {
                    var n = this,
                      o = n.chart,
                      r = o.chartArea,
                      l = o.options,
                      s = l.animation,
                      d = (r.left + r.right) / 2,
                      u = (r.top + r.bottom) / 2,
                      c = l.rotation,
                      h = l.rotation,
                      f = n.getDataset(),
                      g =
                        i && s.animateRotate
                          ? 0
                          : t.hidden
                          ? 0
                          : n.calculateCircumference(f.data[a]) *
                            (l.circumference / (2 * Math.PI)),
                      p = i && s.animateScale ? 0 : n.innerRadius,
                      m = i && s.animateScale ? 0 : n.outerRadius,
                      b = e.getValueAtIndexOrDefault;
                    e.extend(t, {
                      _datasetIndex: n.index,
                      _index: a,
                      _model: {
                        x: d + o.offsetX,
                        y: u + o.offsetY,
                        startAngle: c,
                        endAngle: h,
                        circumference: g,
                        outerRadius: m,
                        innerRadius: p,
                        label: b(f.label, a, o.data.labels[a]),
                      },
                    });
                    var v = t._model;
                    this.removeHoverStyle(t),
                      (i && s.animateRotate) ||
                        (0 === a
                          ? (v.startAngle = l.rotation)
                          : (v.startAngle =
                              n.getMeta().data[a - 1]._model.endAngle),
                        (v.endAngle = v.startAngle + v.circumference)),
                      t.pivot();
                  },
                  removeHoverStyle: function (e) {
                    t.DatasetController.prototype.removeHoverStyle.call(
                      this,
                      e,
                      this.chart.options.elements.arc
                    );
                  },
                  calculateTotal: function () {
                    var t,
                      a = this.getDataset(),
                      i = this.getMeta(),
                      n = 0;
                    return (
                      e.each(i.data, function (e, i) {
                        (t = a.data[i]),
                          isNaN(t) || e.hidden || (n += Math.abs(t));
                      }),
                      n
                    );
                  },
                  calculateCircumference: function (t) {
                    var e = this.getMeta().total;
                    return e > 0 && !isNaN(t) ? 2 * Math.PI * (t / e) : 0;
                  },
                  getMaxBorderWidth: function (t) {
                    for (
                      var e, a, i = 0, n = this.index, o = t.length, r = 0;
                      o > r;
                      r++
                    )
                      (e = t[r]._model ? t[r]._model.borderWidth : 0),
                        (a = t[r]._chart
                          ? t[r]._chart.config.data.datasets[n].hoverBorderWidth
                          : 0),
                        (i = e > i ? e : i),
                        (i = a > i ? a : i);
                    return i;
                  },
                }));
          };
        },
        {},
      ],
      18: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              return a.getValueOrDefault(t.showLine, e.showLines);
            }
            var a = t.helpers;
            (t.defaults.line = {
              showLines: !0,
              spanGaps: !1,
              hover: { mode: "label" },
              scales: {
                xAxes: [{ type: "category", id: "x-axis-0" }],
                yAxes: [{ type: "linear", id: "y-axis-0" }],
              },
            }),
              (t.controllers.line = t.DatasetController.extend({
                datasetElementType: t.elements.Line,
                dataElementType: t.elements.Point,
                update: function (t) {
                  var i,
                    n,
                    o,
                    r = this,
                    l = r.getMeta(),
                    s = l.dataset,
                    d = l.data || [],
                    u = r.chart.options,
                    c = u.elements.line,
                    h = r.getScaleForId(l.yAxisID),
                    f = r.getDataset(),
                    g = e(f, u);
                  for (
                    g &&
                      ((o = s.custom || {}),
                      void 0 !== f.tension &&
                        void 0 === f.lineTension &&
                        (f.lineTension = f.tension),
                      (s._scale = h),
                      (s._datasetIndex = r.index),
                      (s._children = d),
                      (s._model = {
                        spanGaps: f.spanGaps ? f.spanGaps : u.spanGaps,
                        tension: o.tension
                          ? o.tension
                          : a.getValueOrDefault(f.lineTension, c.tension),
                        backgroundColor: o.backgroundColor
                          ? o.backgroundColor
                          : f.backgroundColor || c.backgroundColor,
                        borderWidth: o.borderWidth
                          ? o.borderWidth
                          : f.borderWidth || c.borderWidth,
                        borderColor: o.borderColor
                          ? o.borderColor
                          : f.borderColor || c.borderColor,
                        borderCapStyle: o.borderCapStyle
                          ? o.borderCapStyle
                          : f.borderCapStyle || c.borderCapStyle,
                        borderDash: o.borderDash
                          ? o.borderDash
                          : f.borderDash || c.borderDash,
                        borderDashOffset: o.borderDashOffset
                          ? o.borderDashOffset
                          : f.borderDashOffset || c.borderDashOffset,
                        borderJoinStyle: o.borderJoinStyle
                          ? o.borderJoinStyle
                          : f.borderJoinStyle || c.borderJoinStyle,
                        fill: o.fill
                          ? o.fill
                          : void 0 !== f.fill
                          ? f.fill
                          : c.fill,
                        steppedLine: o.steppedLine
                          ? o.steppedLine
                          : a.getValueOrDefault(f.steppedLine, c.stepped),
                        cubicInterpolationMode: o.cubicInterpolationMode
                          ? o.cubicInterpolationMode
                          : a.getValueOrDefault(
                              f.cubicInterpolationMode,
                              c.cubicInterpolationMode
                            ),
                        scaleTop: h.top,
                        scaleBottom: h.bottom,
                        scaleZero: h.getBasePixel(),
                      }),
                      s.pivot()),
                      i = 0,
                      n = d.length;
                    n > i;
                    ++i
                  )
                    r.updateElement(d[i], i, t);
                  for (
                    g &&
                      0 !== s._model.tension &&
                      r.updateBezierControlPoints(),
                      i = 0,
                      n = d.length;
                    n > i;
                    ++i
                  )
                    d[i].pivot();
                },
                getPointBackgroundColor: function (t, e) {
                  var i = this.chart.options.elements.point.backgroundColor,
                    n = this.getDataset(),
                    o = t.custom || {};
                  return (
                    o.backgroundColor
                      ? (i = o.backgroundColor)
                      : n.pointBackgroundColor
                      ? (i = a.getValueAtIndexOrDefault(
                          n.pointBackgroundColor,
                          e,
                          i
                        ))
                      : n.backgroundColor && (i = n.backgroundColor),
                    i
                  );
                },
                getPointBorderColor: function (t, e) {
                  var i = this.chart.options.elements.point.borderColor,
                    n = this.getDataset(),
                    o = t.custom || {};
                  return (
                    o.borderColor
                      ? (i = o.borderColor)
                      : n.pointBorderColor
                      ? (i = a.getValueAtIndexOrDefault(
                          n.pointBorderColor,
                          e,
                          i
                        ))
                      : n.borderColor && (i = n.borderColor),
                    i
                  );
                },
                getPointBorderWidth: function (t, e) {
                  var i = this.chart.options.elements.point.borderWidth,
                    n = this.getDataset(),
                    o = t.custom || {};
                  return (
                    o.borderWidth
                      ? (i = o.borderWidth)
                      : n.pointBorderWidth
                      ? (i = a.getValueAtIndexOrDefault(
                          n.pointBorderWidth,
                          e,
                          i
                        ))
                      : n.borderWidth && (i = n.borderWidth),
                    i
                  );
                },
                updateElement: function (t, e, i) {
                  var n,
                    o,
                    r = this,
                    l = r.getMeta(),
                    s = t.custom || {},
                    d = r.getDataset(),
                    u = r.index,
                    c = d.data[e],
                    h = r.getScaleForId(l.yAxisID),
                    f = r.getScaleForId(l.xAxisID),
                    g = r.chart.options.elements.point,
                    p = r.chart.data.labels || [],
                    m =
                      1 === p.length || 1 === d.data.length || r.chart.isCombo;
                  void 0 !== d.radius &&
                    void 0 === d.pointRadius &&
                    (d.pointRadius = d.radius),
                    void 0 !== d.hitRadius &&
                      void 0 === d.pointHitRadius &&
                      (d.pointHitRadius = d.hitRadius),
                    (n = f.getPixelForValue(
                      "object" == typeof c ? c : NaN,
                      e,
                      u,
                      m
                    )),
                    (o = i ? h.getBasePixel() : r.calculatePointY(c, e, u)),
                    (t._xScale = f),
                    (t._yScale = h),
                    (t._datasetIndex = u),
                    (t._index = e),
                    (t._model = {
                      x: n,
                      y: o,
                      skip: s.skip || isNaN(n) || isNaN(o),
                      radius:
                        s.radius ||
                        a.getValueAtIndexOrDefault(d.pointRadius, e, g.radius),
                      pointStyle:
                        s.pointStyle ||
                        a.getValueAtIndexOrDefault(
                          d.pointStyle,
                          e,
                          g.pointStyle
                        ),
                      backgroundColor: r.getPointBackgroundColor(t, e),
                      borderColor: r.getPointBorderColor(t, e),
                      borderWidth: r.getPointBorderWidth(t, e),
                      tension: l.dataset._model ? l.dataset._model.tension : 0,
                      steppedLine: l.dataset._model
                        ? l.dataset._model.steppedLine
                        : !1,
                      hitRadius:
                        s.hitRadius ||
                        a.getValueAtIndexOrDefault(
                          d.pointHitRadius,
                          e,
                          g.hitRadius
                        ),
                    });
                },
                calculatePointY: function (t, e, a) {
                  var i,
                    n,
                    o,
                    r = this,
                    l = r.chart,
                    s = r.getMeta(),
                    d = r.getScaleForId(s.yAxisID),
                    u = 0,
                    c = 0;
                  if (d.options.stacked) {
                    for (i = 0; a > i; i++)
                      if (
                        ((n = l.data.datasets[i]),
                        (o = l.getDatasetMeta(i)),
                        "line" === o.type &&
                          o.yAxisID === d.id &&
                          l.isDatasetVisible(i))
                      ) {
                        var h = Number(d.getRightValue(n.data[e]));
                        0 > h ? (c += h || 0) : (u += h || 0);
                      }
                    var f = Number(d.getRightValue(t));
                    return 0 > f
                      ? d.getPixelForValue(c + f)
                      : d.getPixelForValue(u + f);
                  }
                  return d.getPixelForValue(t);
                },
                updateBezierControlPoints: function () {
                  function t(t, e, a) {
                    return Math.max(Math.min(t, a), e);
                  }
                  var e,
                    i,
                    n,
                    o,
                    r,
                    l = this,
                    s = l.getMeta(),
                    d = l.chart.chartArea,
                    u = s.data || [];
                  if (
                    (s.dataset._model.spanGaps &&
                      (u = u.filter(function (t) {
                        return !t._model.skip;
                      })),
                    "monotone" === s.dataset._model.cubicInterpolationMode)
                  )
                    a.splineCurveMonotone(u);
                  else
                    for (e = 0, i = u.length; i > e; ++e)
                      (n = u[e]),
                        (o = n._model),
                        (r = a.splineCurve(
                          a.previousItem(u, e)._model,
                          o,
                          a.nextItem(u, e)._model,
                          s.dataset._model.tension
                        )),
                        (o.controlPointPreviousX = r.previous.x),
                        (o.controlPointPreviousY = r.previous.y),
                        (o.controlPointNextX = r.next.x),
                        (o.controlPointNextY = r.next.y);
                  if (l.chart.options.elements.line.capBezierPoints)
                    for (e = 0, i = u.length; i > e; ++e)
                      (o = u[e]._model),
                        (o.controlPointPreviousX = t(
                          o.controlPointPreviousX,
                          d.left,
                          d.right
                        )),
                        (o.controlPointPreviousY = t(
                          o.controlPointPreviousY,
                          d.top,
                          d.bottom
                        )),
                        (o.controlPointNextX = t(
                          o.controlPointNextX,
                          d.left,
                          d.right
                        )),
                        (o.controlPointNextY = t(
                          o.controlPointNextY,
                          d.top,
                          d.bottom
                        ));
                },
                draw: function (t) {
                  var a,
                    i,
                    n = this,
                    o = n.getMeta(),
                    r = o.data || [],
                    l = t || 1;
                  for (a = 0, i = r.length; i > a; ++a) r[a].transition(l);
                  for (
                    e(n.getDataset(), n.chart.options) &&
                      o.dataset.transition(l).draw(),
                      a = 0,
                      i = r.length;
                    i > a;
                    ++a
                  )
                    r[a].draw();
                },
                setHoverStyle: function (t) {
                  var e = this.chart.data.datasets[t._datasetIndex],
                    i = t._index,
                    n = t.custom || {},
                    o = t._model;
                  (o.radius =
                    n.hoverRadius ||
                    a.getValueAtIndexOrDefault(
                      e.pointHoverRadius,
                      i,
                      this.chart.options.elements.point.hoverRadius
                    )),
                    (o.backgroundColor =
                      n.hoverBackgroundColor ||
                      a.getValueAtIndexOrDefault(
                        e.pointHoverBackgroundColor,
                        i,
                        a.getHoverColor(o.backgroundColor)
                      )),
                    (o.borderColor =
                      n.hoverBorderColor ||
                      a.getValueAtIndexOrDefault(
                        e.pointHoverBorderColor,
                        i,
                        a.getHoverColor(o.borderColor)
                      )),
                    (o.borderWidth =
                      n.hoverBorderWidth ||
                      a.getValueAtIndexOrDefault(
                        e.pointHoverBorderWidth,
                        i,
                        o.borderWidth
                      ));
                },
                removeHoverStyle: function (t) {
                  var e = this,
                    i = e.chart.data.datasets[t._datasetIndex],
                    n = t._index,
                    o = t.custom || {},
                    r = t._model;
                  void 0 !== i.radius &&
                    void 0 === i.pointRadius &&
                    (i.pointRadius = i.radius),
                    (r.radius =
                      o.radius ||
                      a.getValueAtIndexOrDefault(
                        i.pointRadius,
                        n,
                        e.chart.options.elements.point.radius
                      )),
                    (r.backgroundColor = e.getPointBackgroundColor(t, n)),
                    (r.borderColor = e.getPointBorderColor(t, n)),
                    (r.borderWidth = e.getPointBorderWidth(t, n));
                },
              }));
          };
        },
        {},
      ],
      19: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.polarArea = {
              scale: {
                type: "radialLinear",
                lineArc: !0,
                ticks: { beginAtZero: !0 },
              },
              animation: { animateRotate: !0, animateScale: !0 },
              startAngle: -0.5 * Math.PI,
              aspectRatio: 1,
              legendCallback: function (t) {
                var e = [];
                e.push('<ul class="' + t.id + '-legend">');
                var a = t.data,
                  i = a.datasets,
                  n = a.labels;
                if (i.length)
                  for (var o = 0; o < i[0].data.length; ++o)
                    e.push(
                      '<li><span style="background-color:' +
                        i[0].backgroundColor[o] +
                        '"></span>'
                    ),
                      n[o] && e.push(n[o]),
                      e.push("</li>");
                return e.push("</ul>"), e.join("");
              },
              legend: {
                labels: {
                  generateLabels: function (t) {
                    var a = t.data;
                    return a.labels.length && a.datasets.length
                      ? a.labels.map(function (i, n) {
                          var o = t.getDatasetMeta(0),
                            r = a.datasets[0],
                            l = o.data[n],
                            s = l.custom || {},
                            d = e.getValueAtIndexOrDefault,
                            u = t.options.elements.arc,
                            c = s.backgroundColor
                              ? s.backgroundColor
                              : d(r.backgroundColor, n, u.backgroundColor),
                            h = s.borderColor
                              ? s.borderColor
                              : d(r.borderColor, n, u.borderColor),
                            f = s.borderWidth
                              ? s.borderWidth
                              : d(r.borderWidth, n, u.borderWidth);
                          return {
                            text: i,
                            fillStyle: c,
                            strokeStyle: h,
                            lineWidth: f,
                            hidden: isNaN(r.data[n]) || o.data[n].hidden,
                            index: n,
                          };
                        })
                      : [];
                  },
                },
                onClick: function (t, e) {
                  var a,
                    i,
                    n,
                    o = e.index,
                    r = this.chart;
                  for (a = 0, i = (r.data.datasets || []).length; i > a; ++a)
                    (n = r.getDatasetMeta(a)),
                      (n.data[o].hidden = !n.data[o].hidden);
                  r.update();
                },
              },
              tooltips: {
                callbacks: {
                  title: function () {
                    return "";
                  },
                  label: function (t, e) {
                    return e.labels[t.index] + ": " + t.yLabel;
                  },
                },
              },
            }),
              (t.controllers.polarArea = t.DatasetController.extend({
                dataElementType: t.elements.Arc,
                linkScales: e.noop,
                update: function (t) {
                  var a = this,
                    i = a.chart,
                    n = i.chartArea,
                    o = a.getMeta(),
                    r = i.options,
                    l = r.elements.arc,
                    s = Math.min(n.right - n.left, n.bottom - n.top);
                  (i.outerRadius = Math.max((s - l.borderWidth / 2) / 2, 0)),
                    (i.innerRadius = Math.max(
                      r.cutoutPercentage
                        ? (i.outerRadius / 100) * r.cutoutPercentage
                        : 1,
                      0
                    )),
                    (i.radiusLength =
                      (i.outerRadius - i.innerRadius) /
                      i.getVisibleDatasetCount()),
                    (a.outerRadius = i.outerRadius - i.radiusLength * a.index),
                    (a.innerRadius = a.outerRadius - i.radiusLength),
                    (o.count = a.countVisibleElements()),
                    e.each(o.data, function (e, i) {
                      a.updateElement(e, i, t);
                    });
                },
                updateElement: function (t, a, i) {
                  for (
                    var n = this,
                      o = n.chart,
                      r = n.getDataset(),
                      l = o.options,
                      s = l.animation,
                      d = o.scale,
                      u = e.getValueAtIndexOrDefault,
                      c = o.data.labels,
                      h = n.calculateCircumference(r.data[a]),
                      f = d.xCenter,
                      g = d.yCenter,
                      p = 0,
                      m = n.getMeta(),
                      b = 0;
                    a > b;
                    ++b
                  )
                    isNaN(r.data[b]) || m.data[b].hidden || ++p;
                  var v = l.startAngle,
                    x = t.hidden
                      ? 0
                      : d.getDistanceFromCenterForValue(r.data[a]),
                    y = v + h * p,
                    k = y + (t.hidden ? 0 : h),
                    S = s.animateScale
                      ? 0
                      : d.getDistanceFromCenterForValue(r.data[a]);
                  e.extend(t, {
                    _datasetIndex: n.index,
                    _index: a,
                    _scale: d,
                    _model: {
                      x: f,
                      y: g,
                      innerRadius: 0,
                      outerRadius: i ? S : x,
                      startAngle: i && s.animateRotate ? v : y,
                      endAngle: i && s.animateRotate ? v : k,
                      label: u(c, a, c[a]),
                    },
                  }),
                    n.removeHoverStyle(t),
                    t.pivot();
                },
                removeHoverStyle: function (e) {
                  t.DatasetController.prototype.removeHoverStyle.call(
                    this,
                    e,
                    this.chart.options.elements.arc
                  );
                },
                countVisibleElements: function () {
                  var t = this.getDataset(),
                    a = this.getMeta(),
                    i = 0;
                  return (
                    e.each(a.data, function (e, a) {
                      isNaN(t.data[a]) || e.hidden || i++;
                    }),
                    i
                  );
                },
                calculateCircumference: function (t) {
                  var e = this.getMeta().count;
                  return e > 0 && !isNaN(t) ? (2 * Math.PI) / e : 0;
                },
              }));
          };
        },
        {},
      ],
      20: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.radar = {
              aspectRatio: 1,
              scale: { type: "radialLinear" },
              elements: { line: { tension: 0 } },
            }),
              (t.controllers.radar = t.DatasetController.extend({
                datasetElementType: t.elements.Line,
                dataElementType: t.elements.Point,
                linkScales: e.noop,
                update: function (t) {
                  var a = this,
                    i = a.getMeta(),
                    n = i.dataset,
                    o = i.data,
                    r = n.custom || {},
                    l = a.getDataset(),
                    s = a.chart.options.elements.line,
                    d = a.chart.scale;
                  void 0 !== l.tension &&
                    void 0 === l.lineTension &&
                    (l.lineTension = l.tension),
                    e.extend(i.dataset, {
                      _datasetIndex: a.index,
                      _children: o,
                      _loop: !0,
                      _model: {
                        tension: r.tension
                          ? r.tension
                          : e.getValueOrDefault(l.lineTension, s.tension),
                        backgroundColor: r.backgroundColor
                          ? r.backgroundColor
                          : l.backgroundColor || s.backgroundColor,
                        borderWidth: r.borderWidth
                          ? r.borderWidth
                          : l.borderWidth || s.borderWidth,
                        borderColor: r.borderColor
                          ? r.borderColor
                          : l.borderColor || s.borderColor,
                        fill: r.fill
                          ? r.fill
                          : void 0 !== l.fill
                          ? l.fill
                          : s.fill,
                        borderCapStyle: r.borderCapStyle
                          ? r.borderCapStyle
                          : l.borderCapStyle || s.borderCapStyle,
                        borderDash: r.borderDash
                          ? r.borderDash
                          : l.borderDash || s.borderDash,
                        borderDashOffset: r.borderDashOffset
                          ? r.borderDashOffset
                          : l.borderDashOffset || s.borderDashOffset,
                        borderJoinStyle: r.borderJoinStyle
                          ? r.borderJoinStyle
                          : l.borderJoinStyle || s.borderJoinStyle,
                        scaleTop: d.top,
                        scaleBottom: d.bottom,
                        scaleZero: d.getBasePosition(),
                      },
                    }),
                    i.dataset.pivot(),
                    e.each(
                      o,
                      function (e, i) {
                        a.updateElement(e, i, t);
                      },
                      a
                    ),
                    a.updateBezierControlPoints();
                },
                updateElement: function (t, a, i) {
                  var n = this,
                    o = t.custom || {},
                    r = n.getDataset(),
                    l = n.chart.scale,
                    s = n.chart.options.elements.point,
                    d = l.getPointPositionForValue(a, r.data[a]);
                  e.extend(t, {
                    _datasetIndex: n.index,
                    _index: a,
                    _scale: l,
                    _model: {
                      x: i ? l.xCenter : d.x,
                      y: i ? l.yCenter : d.y,
                      tension: o.tension
                        ? o.tension
                        : e.getValueOrDefault(
                            r.tension,
                            n.chart.options.elements.line.tension
                          ),
                      radius: o.radius
                        ? o.radius
                        : e.getValueAtIndexOrDefault(
                            r.pointRadius,
                            a,
                            s.radius
                          ),
                      backgroundColor: o.backgroundColor
                        ? o.backgroundColor
                        : e.getValueAtIndexOrDefault(
                            r.pointBackgroundColor,
                            a,
                            s.backgroundColor
                          ),
                      borderColor: o.borderColor
                        ? o.borderColor
                        : e.getValueAtIndexOrDefault(
                            r.pointBorderColor,
                            a,
                            s.borderColor
                          ),
                      borderWidth: o.borderWidth
                        ? o.borderWidth
                        : e.getValueAtIndexOrDefault(
                            r.pointBorderWidth,
                            a,
                            s.borderWidth
                          ),
                      pointStyle: o.pointStyle
                        ? o.pointStyle
                        : e.getValueAtIndexOrDefault(
                            r.pointStyle,
                            a,
                            s.pointStyle
                          ),
                      hitRadius: o.hitRadius
                        ? o.hitRadius
                        : e.getValueAtIndexOrDefault(
                            r.hitRadius,
                            a,
                            s.hitRadius
                          ),
                    },
                  }),
                    (t._model.skip = o.skip
                      ? o.skip
                      : isNaN(t._model.x) || isNaN(t._model.y));
                },
                updateBezierControlPoints: function () {
                  var t = this.chart.chartArea,
                    a = this.getMeta();
                  e.each(a.data, function (i, n) {
                    var o = i._model,
                      r = e.splineCurve(
                        e.previousItem(a.data, n, !0)._model,
                        o,
                        e.nextItem(a.data, n, !0)._model,
                        o.tension
                      );
                    (o.controlPointPreviousX = Math.max(
                      Math.min(r.previous.x, t.right),
                      t.left
                    )),
                      (o.controlPointPreviousY = Math.max(
                        Math.min(r.previous.y, t.bottom),
                        t.top
                      )),
                      (o.controlPointNextX = Math.max(
                        Math.min(r.next.x, t.right),
                        t.left
                      )),
                      (o.controlPointNextY = Math.max(
                        Math.min(r.next.y, t.bottom),
                        t.top
                      )),
                      i.pivot();
                  });
                },
                draw: function (t) {
                  var a = this.getMeta(),
                    i = t || 1;
                  e.each(a.data, function (t) {
                    t.transition(i);
                  }),
                    a.dataset.transition(i).draw(),
                    e.each(a.data, function (t) {
                      t.draw();
                    });
                },
                setHoverStyle: function (t) {
                  var a = this.chart.data.datasets[t._datasetIndex],
                    i = t.custom || {},
                    n = t._index,
                    o = t._model;
                  (o.radius = i.hoverRadius
                    ? i.hoverRadius
                    : e.getValueAtIndexOrDefault(
                        a.pointHoverRadius,
                        n,
                        this.chart.options.elements.point.hoverRadius
                      )),
                    (o.backgroundColor = i.hoverBackgroundColor
                      ? i.hoverBackgroundColor
                      : e.getValueAtIndexOrDefault(
                          a.pointHoverBackgroundColor,
                          n,
                          e.getHoverColor(o.backgroundColor)
                        )),
                    (o.borderColor = i.hoverBorderColor
                      ? i.hoverBorderColor
                      : e.getValueAtIndexOrDefault(
                          a.pointHoverBorderColor,
                          n,
                          e.getHoverColor(o.borderColor)
                        )),
                    (o.borderWidth = i.hoverBorderWidth
                      ? i.hoverBorderWidth
                      : e.getValueAtIndexOrDefault(
                          a.pointHoverBorderWidth,
                          n,
                          o.borderWidth
                        ));
                },
                removeHoverStyle: function (t) {
                  var a = this.chart.data.datasets[t._datasetIndex],
                    i = t.custom || {},
                    n = t._index,
                    o = t._model,
                    r = this.chart.options.elements.point;
                  (o.radius = i.radius
                    ? i.radius
                    : e.getValueAtIndexOrDefault(a.radius, n, r.radius)),
                    (o.backgroundColor = i.backgroundColor
                      ? i.backgroundColor
                      : e.getValueAtIndexOrDefault(
                          a.pointBackgroundColor,
                          n,
                          r.backgroundColor
                        )),
                    (o.borderColor = i.borderColor
                      ? i.borderColor
                      : e.getValueAtIndexOrDefault(
                          a.pointBorderColor,
                          n,
                          r.borderColor
                        )),
                    (o.borderWidth = i.borderWidth
                      ? i.borderWidth
                      : e.getValueAtIndexOrDefault(
                          a.pointBorderWidth,
                          n,
                          r.borderWidth
                        ));
                },
              }));
          };
        },
        {},
      ],
      21: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.global.animation = {
              duration: 1e3,
              easing: "easeOutQuart",
              onProgress: e.noop,
              onComplete: e.noop,
            }),
              (t.Animation = t.Element.extend({
                currentStep: null,
                numSteps: 60,
                easing: "",
                render: null,
                onAnimationProgress: null,
                onAnimationComplete: null,
              })),
              (t.animationService = {
                frameDuration: 17,
                animations: [],
                dropFrames: 0,
                request: null,
                addAnimation: function (t, e, a, i) {
                  var n = this;
                  i || (t.animating = !0);
                  for (var o = 0; o < n.animations.length; ++o)
                    if (n.animations[o].chartInstance === t)
                      return void (n.animations[o].animationObject = e);
                  n.animations.push({ chartInstance: t, animationObject: e }),
                    1 === n.animations.length && n.requestAnimationFrame();
                },
                cancelAnimation: function (t) {
                  var a = e.findIndex(this.animations, function (e) {
                    return e.chartInstance === t;
                  });
                  -1 !== a &&
                    (this.animations.splice(a, 1), (t.animating = !1));
                },
                requestAnimationFrame: function () {
                  var t = this;
                  null === t.request &&
                    (t.request = e.requestAnimFrame.call(window, function () {
                      (t.request = null), t.startDigest();
                    }));
                },
                startDigest: function () {
                  var t = this,
                    e = Date.now(),
                    a = 0;
                  t.dropFrames > 1 &&
                    ((a = Math.floor(t.dropFrames)),
                    (t.dropFrames = t.dropFrames % 1));
                  for (var i = 0; i < t.animations.length; )
                    null === t.animations[i].animationObject.currentStep &&
                      (t.animations[i].animationObject.currentStep = 0),
                      (t.animations[i].animationObject.currentStep += 1 + a),
                      t.animations[i].animationObject.currentStep >
                        t.animations[i].animationObject.numSteps &&
                        (t.animations[i].animationObject.currentStep =
                          t.animations[i].animationObject.numSteps),
                      t.animations[i].animationObject.render(
                        t.animations[i].chartInstance,
                        t.animations[i].animationObject
                      ),
                      t.animations[i].animationObject.onAnimationProgress &&
                        t.animations[i].animationObject.onAnimationProgress
                          .call &&
                        t.animations[
                          i
                        ].animationObject.onAnimationProgress.call(
                          t.animations[i].chartInstance,
                          t.animations[i]
                        ),
                      t.animations[i].animationObject.currentStep ===
                      t.animations[i].animationObject.numSteps
                        ? (t.animations[i].animationObject
                            .onAnimationComplete &&
                            t.animations[i].animationObject.onAnimationComplete
                              .call &&
                            t.animations[
                              i
                            ].animationObject.onAnimationComplete.call(
                              t.animations[i].chartInstance,
                              t.animations[i]
                            ),
                          (t.animations[i].chartInstance.animating = !1),
                          t.animations.splice(i, 1))
                        : ++i;
                  var n = Date.now(),
                    o = (n - e) / t.frameDuration;
                  (t.dropFrames += o),
                    t.animations.length > 0 && t.requestAnimationFrame();
                },
              });
          };
        },
        {},
      ],
      22: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = (t.canvasHelpers = {});
            e.drawPoint = function (t, e, a, i, n) {
              var o, r, l, s, d, u;
              if (
                "object" == typeof e &&
                ((o = e.toString()),
                "[object HTMLImageElement]" === o ||
                  "[object HTMLCanvasElement]" === o)
              )
                return void t.drawImage(e, i - e.width / 2, n - e.height / 2);
              if (!(isNaN(a) || 0 >= a)) {
                switch (e) {
                  default:
                    t.beginPath(),
                      t.arc(i, n, a, 0, 2 * Math.PI),
                      t.closePath(),
                      t.fill();
                    break;
                  case "triangle":
                    t.beginPath(),
                      (r = (3 * a) / Math.sqrt(3)),
                      (d = (r * Math.sqrt(3)) / 2),
                      t.moveTo(i - r / 2, n + d / 3),
                      t.lineTo(i + r / 2, n + d / 3),
                      t.lineTo(i, n - (2 * d) / 3),
                      t.closePath(),
                      t.fill();
                    break;
                  case "rect":
                    (u = (1 / Math.SQRT2) * a),
                      t.beginPath(),
                      t.fillRect(i - u, n - u, 2 * u, 2 * u),
                      t.strokeRect(i - u, n - u, 2 * u, 2 * u);
                    break;
                  case "rectRot":
                    (u = (1 / Math.SQRT2) * a),
                      t.beginPath(),
                      t.moveTo(i - u, n),
                      t.lineTo(i, n + u),
                      t.lineTo(i + u, n),
                      t.lineTo(i, n - u),
                      t.closePath(),
                      t.fill();
                    break;
                  case "cross":
                    t.beginPath(),
                      t.moveTo(i, n + a),
                      t.lineTo(i, n - a),
                      t.moveTo(i - a, n),
                      t.lineTo(i + a, n),
                      t.closePath();
                    break;
                  case "crossRot":
                    t.beginPath(),
                      (l = Math.cos(Math.PI / 4) * a),
                      (s = Math.sin(Math.PI / 4) * a),
                      t.moveTo(i - l, n - s),
                      t.lineTo(i + l, n + s),
                      t.moveTo(i - l, n + s),
                      t.lineTo(i + l, n - s),
                      t.closePath();
                    break;
                  case "star":
                    t.beginPath(),
                      t.moveTo(i, n + a),
                      t.lineTo(i, n - a),
                      t.moveTo(i - a, n),
                      t.lineTo(i + a, n),
                      (l = Math.cos(Math.PI / 4) * a),
                      (s = Math.sin(Math.PI / 4) * a),
                      t.moveTo(i - l, n - s),
                      t.lineTo(i + l, n + s),
                      t.moveTo(i - l, n + s),
                      t.lineTo(i + l, n - s),
                      t.closePath();
                    break;
                  case "line":
                    t.beginPath(),
                      t.moveTo(i - a, n),
                      t.lineTo(i + a, n),
                      t.closePath();
                    break;
                  case "dash":
                    t.beginPath(),
                      t.moveTo(i, n),
                      t.lineTo(i + a, n),
                      t.closePath();
                }
                t.stroke();
              }
            };
          };
        },
        {},
      ],
      23: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              var a = r.getStyle(t, e),
                i = a && a.match(/(\d+)px/);
              return i ? Number(i[1]) : void 0;
            }
            function a(t, a) {
              var i = t.style,
                n = t.getAttribute("height"),
                o = t.getAttribute("width");
              if (
                ((t._chartjs = {
                  initial: {
                    height: n,
                    width: o,
                    style: {
                      display: i.display,
                      height: i.height,
                      width: i.width,
                    },
                  },
                }),
                (i.display = i.display || "block"),
                null === o || "" === o)
              ) {
                var r = e(t, "width");
                void 0 !== r && (t.width = r);
              }
              if (null === n || "" === n)
                if ("" === t.style.height)
                  t.height = t.width / (a.options.aspectRatio || 2);
                else {
                  var l = e(t, "height");
                  void 0 !== r && (t.height = l);
                }
              return t;
            }
            function i(t) {
              if (t._chartjs) {
                var e = t._chartjs.initial;
                ["height", "width"].forEach(function (a) {
                  var i = e[a];
                  void 0 === i || null === i
                    ? t.removeAttribute(a)
                    : t.setAttribute(a, i);
                }),
                  r.each(e.style || {}, function (e, a) {
                    t.style[a] = e;
                  }),
                  (t.width = t.width),
                  delete t._chartjs;
              }
            }
            function n(t, e) {
              if (
                ("string" == typeof t
                  ? (t = document.getElementById(t))
                  : t.length && (t = t[0]),
                t && t.canvas && (t = t.canvas),
                t instanceof HTMLCanvasElement)
              ) {
                var i = t.getContext && t.getContext("2d");
                if (i instanceof CanvasRenderingContext2D) return a(t, e), i;
              }
              return null;
            }
            function o(e) {
              e = e || {};
              var a = (e.data = e.data || {});
              return (
                (a.datasets = a.datasets || []),
                (a.labels = a.labels || []),
                (e.options = r.configMerge(
                  t.defaults.global,
                  t.defaults[e.type],
                  e.options || {}
                )),
                e
              );
            }
            var r = t.helpers;
            (t.types = {}),
              (t.instances = {}),
              (t.controllers = {}),
              (t.Controller = function (e, a, i) {
                var l = this;
                a = o(a);
                var s = n(e, a),
                  d = s && s.canvas,
                  u = d && d.height,
                  c = d && d.width;
                return (
                  (i.ctx = s),
                  (i.canvas = d),
                  (i.config = a),
                  (i.width = c),
                  (i.height = u),
                  (i.aspectRatio = u ? c / u : null),
                  (l.id = r.uid()),
                  (l.chart = i),
                  (l.config = a),
                  (l.options = a.options),
                  (l._bufferedRender = !1),
                  (t.instances[l.id] = l),
                  Object.defineProperty(l, "data", {
                    get: function () {
                      return l.config.data;
                    },
                  }),
                  s && d
                    ? (r.retinaScale(i),
                      l.options.responsive &&
                        (r.addResizeListener(d.parentNode, function () {
                          l.resize();
                        }),
                        l.resize(!0)),
                      l.initialize(),
                      l)
                    : (console.error(
                        "Failed to create chart: can't acquire context from the given item"
                      ),
                      l)
                );
              }),
              r.extend(t.Controller.prototype, {
                initialize: function () {
                  var e = this;
                  return (
                    t.plugins.notify("beforeInit", [e]),
                    e.bindEvents(),
                    e.ensureScalesHaveIDs(),
                    e.buildOrUpdateControllers(),
                    e.buildScales(),
                    e.updateLayout(),
                    e.resetElements(),
                    e.initToolTip(),
                    e.update(),
                    t.plugins.notify("afterInit", [e]),
                    e
                  );
                },
                clear: function () {
                  return r.clear(this.chart), this;
                },
                stop: function () {
                  return t.animationService.cancelAnimation(this), this;
                },
                resize: function (e) {
                  var a = this,
                    i = a.chart,
                    n = a.options,
                    o = i.canvas,
                    l = (n.maintainAspectRatio && i.aspectRatio) || null,
                    s = Math.floor(r.getMaximumWidth(o)),
                    d = Math.floor(l ? s / l : r.getMaximumHeight(o));
                  if (i.width !== s || i.height !== d) {
                    (o.width = i.width = s),
                      (o.height = i.height = d),
                      (o.style.width = s + "px"),
                      (o.style.height = d + "px"),
                      r.retinaScale(i);
                    var u = { width: s, height: d };
                    t.plugins.notify("resize", [a, u]),
                      a.options.onResize && a.options.onResize(a, u),
                      e ||
                        (a.stop(),
                        a.update(a.options.responsiveAnimationDuration));
                  }
                },
                ensureScalesHaveIDs: function () {
                  var t = this.options,
                    e = t.scales || {},
                    a = t.scale;
                  r.each(e.xAxes, function (t, e) {
                    t.id = t.id || "x-axis-" + e;
                  }),
                    r.each(e.yAxes, function (t, e) {
                      t.id = t.id || "y-axis-" + e;
                    }),
                    a && (a.id = a.id || "scale");
                },
                buildScales: function () {
                  var e = this,
                    a = e.options,
                    i = (e.scales = {}),
                    n = [];
                  a.scales &&
                    (n = n.concat(
                      (a.scales.xAxes || []).map(function (t) {
                        return { options: t, dtype: "category" };
                      }),
                      (a.scales.yAxes || []).map(function (t) {
                        return { options: t, dtype: "linear" };
                      })
                    )),
                    a.scale &&
                      n.push({
                        options: a.scale,
                        dtype: "radialLinear",
                        isDefault: !0,
                      }),
                    r.each(n, function (a) {
                      var n = a.options,
                        o = r.getValueOrDefault(n.type, a.dtype),
                        l = t.scaleService.getScaleConstructor(o);
                      if (l) {
                        var s = new l({
                          id: n.id,
                          options: n,
                          ctx: e.chart.ctx,
                          chart: e,
                        });
                        (i[s.id] = s), a.isDefault && (e.scale = s);
                      }
                    }),
                    t.scaleService.addScalesToLayout(this);
                },
                updateLayout: function () {
                  t.layoutService.update(
                    this,
                    this.chart.width,
                    this.chart.height
                  );
                },
                buildOrUpdateControllers: function () {
                  var e = this,
                    a = [],
                    i = [];
                  if (
                    (r.each(
                      e.data.datasets,
                      function (n, o) {
                        var r = e.getDatasetMeta(o);
                        r.type || (r.type = n.type || e.config.type),
                          a.push(r.type),
                          r.controller
                            ? r.controller.updateIndex(o)
                            : ((r.controller = new t.controllers[r.type](e, o)),
                              i.push(r.controller));
                      },
                      e
                    ),
                    a.length > 1)
                  )
                    for (var n = 1; n < a.length; n++)
                      if (a[n] !== a[n - 1]) {
                        e.isCombo = !0;
                        break;
                      }
                  return i;
                },
                resetElements: function () {
                  var t = this;
                  r.each(
                    t.data.datasets,
                    function (e, a) {
                      t.getDatasetMeta(a).controller.reset();
                    },
                    t
                  );
                },
                reset: function () {
                  this.resetElements(), this.tooltip.initialize();
                },
                update: function (e, a) {
                  var i = this;
                  t.plugins.notify("beforeUpdate", [i]),
                    (i.tooltip._data = i.data);
                  var n = i.buildOrUpdateControllers();
                  r.each(
                    i.data.datasets,
                    function (t, e) {
                      i.getDatasetMeta(e).controller.buildOrUpdateElements();
                    },
                    i
                  ),
                    t.layoutService.update(i, i.chart.width, i.chart.height),
                    t.plugins.notify("afterScaleUpdate", [i]),
                    r.each(n, function (t) {
                      t.reset();
                    }),
                    i.updateDatasets(),
                    t.plugins.notify("afterUpdate", [i]),
                    i._bufferedRender
                      ? (i._bufferedRequest = { lazy: a, duration: e })
                      : i.render(e, a);
                },
                updateDatasets: function () {
                  var e,
                    a,
                    i = this;
                  if (t.plugins.notify("beforeDatasetsUpdate", [i])) {
                    for (e = 0, a = i.data.datasets.length; a > e; ++e)
                      i.getDatasetMeta(e).controller.update();
                    t.plugins.notify("afterDatasetsUpdate", [i]);
                  }
                },
                render: function (e, a) {
                  var i = this;
                  t.plugins.notify("beforeRender", [i]);
                  var n = i.options.animation;
                  if (
                    n &&
                    (("undefined" != typeof e && 0 !== e) ||
                      ("undefined" == typeof e && 0 !== n.duration))
                  ) {
                    var o = new t.Animation();
                    (o.numSteps = (e || n.duration) / 16.66),
                      (o.easing = n.easing),
                      (o.render = function (t, e) {
                        var a = r.easingEffects[e.easing],
                          i = e.currentStep / e.numSteps,
                          n = a(i);
                        t.draw(n, i, e.currentStep);
                      }),
                      (o.onAnimationProgress = n.onProgress),
                      (o.onAnimationComplete = n.onComplete),
                      t.animationService.addAnimation(i, o, e, a);
                  } else
                    i.draw(),
                      n &&
                        n.onComplete &&
                        n.onComplete.call &&
                        n.onComplete.call(i);
                  return i;
                },
                draw: function (e) {
                  var a = this,
                    i = e || 1;
                  a.clear(),
                    t.plugins.notify("beforeDraw", [a, i]),
                    r.each(
                      a.boxes,
                      function (t) {
                        t.draw(a.chartArea);
                      },
                      a
                    ),
                    a.scale && a.scale.draw(),
                    t.plugins.notify("beforeDatasetsDraw", [a, i]),
                    r.each(
                      a.data.datasets,
                      function (t, i) {
                        a.isDatasetVisible(i) &&
                          a.getDatasetMeta(i).controller.draw(e);
                      },
                      a,
                      !0
                    ),
                    t.plugins.notify("afterDatasetsDraw", [a, i]),
                    a.tooltip.transition(i).draw(),
                    t.plugins.notify("afterDraw", [a, i]);
                },
                getElementAtEvent: function (e) {
                  return t.Interaction.modes.single(this, e);
                },
                getElementsAtEvent: function (e) {
                  return t.Interaction.modes.label(this, e, { intersect: !0 });
                },
                getElementsAtXAxis: function (e) {
                  return t.Interaction.modes["x-axis"](this, e, {
                    intersect: !0,
                  });
                },
                getElementsAtEventForMode: function (e, a, i) {
                  var n = t.Interaction.modes[a];
                  return "function" == typeof n ? n(this, e, i) : [];
                },
                getDatasetAtEvent: function (e) {
                  return t.Interaction.modes.dataset(this, e);
                },
                getDatasetMeta: function (t) {
                  var e = this,
                    a = e.data.datasets[t];
                  a._meta || (a._meta = {});
                  var i = a._meta[e.id];
                  return (
                    i ||
                      (i = a._meta[e.id] =
                        {
                          type: null,
                          data: [],
                          dataset: null,
                          controller: null,
                          hidden: null,
                          xAxisID: null,
                          yAxisID: null,
                        }),
                    i
                  );
                },
                getVisibleDatasetCount: function () {
                  for (
                    var t = 0, e = 0, a = this.data.datasets.length;
                    a > e;
                    ++e
                  )
                    this.isDatasetVisible(e) && t++;
                  return t;
                },
                isDatasetVisible: function (t) {
                  var e = this.getDatasetMeta(t);
                  return "boolean" == typeof e.hidden
                    ? !e.hidden
                    : !this.data.datasets[t].hidden;
                },
                generateLegend: function () {
                  return this.options.legendCallback(this);
                },
                destroy: function () {
                  var e,
                    a,
                    n,
                    o = this,
                    l = o.chart.canvas;
                  for (o.stop(), a = 0, n = o.data.datasets.length; n > a; ++a)
                    (e = o.getDatasetMeta(a)),
                      e.controller &&
                        (e.controller.destroy(), (e.controller = null));
                  l &&
                    (r.unbindEvents(o, o.events),
                    r.removeResizeListener(l.parentNode),
                    r.clear(o.chart),
                    i(l),
                    (o.chart.canvas = null),
                    (o.chart.ctx = null)),
                    t.plugins.notify("destroy", [o]),
                    delete t.instances[o.id];
                },
                toBase64Image: function () {
                  return this.chart.canvas.toDataURL.apply(
                    this.chart.canvas,
                    arguments
                  );
                },
                initToolTip: function () {
                  var e = this;
                  (e.tooltip = new t.Tooltip(
                    {
                      _chart: e.chart,
                      _chartInstance: e,
                      _data: e.data,
                      _options: e.options.tooltips,
                    },
                    e
                  )),
                    e.tooltip.initialize();
                },
                bindEvents: function () {
                  var t = this;
                  r.bindEvents(t, t.options.events, function (e) {
                    t.eventHandler(e);
                  });
                },
                updateHoverStyle: function (t, e, a) {
                  var i,
                    n,
                    o,
                    r = a ? "setHoverStyle" : "removeHoverStyle";
                  for (n = 0, o = t.length; o > n; ++n)
                    (i = t[n]),
                      i &&
                        this.getDatasetMeta(i._datasetIndex).controller[r](i);
                },
                eventHandler: function (t) {
                  var e = this,
                    a = e.legend,
                    i = e.tooltip,
                    n = e.options.hover;
                  (e._bufferedRender = !0), (e._bufferedRequest = null);
                  var o = e.handleEvent(t);
                  (o |= a && a.handleEvent(t)), (o |= i && i.handleEvent(t));
                  var r = e._bufferedRequest;
                  return (
                    r
                      ? e.render(r.duration, r.lazy)
                      : o &&
                        !e.animating &&
                        (e.stop(), e.render(n.animationDuration, !0)),
                    (e._bufferedRender = !1),
                    (e._bufferedRequest = null),
                    e
                  );
                },
                handleEvent: function (t) {
                  var e = this,
                    a = e.options || {},
                    i = a.hover,
                    n = !1;
                  return (
                    (e.lastActive = e.lastActive || []),
                    "mouseout" === t.type
                      ? (e.active = [])
                      : (e.active = e.getElementsAtEventForMode(t, i.mode, i)),
                    i.onHover && i.onHover.call(e, e.active),
                    ("mouseup" === t.type || "click" === t.type) &&
                      a.onClick &&
                      a.onClick.call(e, t, e.active),
                    e.lastActive.length &&
                      e.updateHoverStyle(e.lastActive, i.mode, !1),
                    e.active.length &&
                      i.mode &&
                      e.updateHoverStyle(e.active, i.mode, !0),
                    (n = !r.arrayEquals(e.active, e.lastActive)),
                    (e.lastActive = e.active),
                    n
                  );
                },
              });
          };
        },
        {},
      ],
      24: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              return t._chartjs
                ? void t._chartjs.listeners.push(e)
                : (Object.defineProperty(t, "_chartjs", {
                    configurable: !0,
                    enumerable: !1,
                    value: { listeners: [e] },
                  }),
                  void n.forEach(function (e) {
                    var a = "onData" + e.charAt(0).toUpperCase() + e.slice(1),
                      n = t[e];
                    Object.defineProperty(t, e, {
                      configurable: !0,
                      enumerable: !1,
                      value: function () {
                        var e = Array.prototype.slice.call(arguments),
                          o = n.apply(this, e);
                        return (
                          i.each(t._chartjs.listeners, function (t) {
                            "function" == typeof t[a] && t[a].apply(t, e);
                          }),
                          o
                        );
                      },
                    });
                  }));
            }
            function a(t, e) {
              var a = t._chartjs;
              if (a) {
                var i = a.listeners,
                  o = i.indexOf(e);
                -1 !== o && i.splice(o, 1),
                  i.length > 0 ||
                    (n.forEach(function (e) {
                      delete t[e];
                    }),
                    delete t._chartjs);
              }
            }
            var i = t.helpers,
              n = ["push", "pop", "shift", "splice", "unshift"];
            (t.DatasetController = function (t, e) {
              this.initialize(t, e);
            }),
              i.extend(t.DatasetController.prototype, {
                datasetElementType: null,
                dataElementType: null,
                initialize: function (t, e) {
                  var a = this;
                  (a.chart = t), (a.index = e), a.linkScales(), a.addElements();
                },
                updateIndex: function (t) {
                  this.index = t;
                },
                linkScales: function () {
                  var t = this,
                    e = t.getMeta(),
                    a = t.getDataset();
                  null === e.xAxisID &&
                    (e.xAxisID =
                      a.xAxisID || t.chart.options.scales.xAxes[0].id),
                    null === e.yAxisID &&
                      (e.yAxisID =
                        a.yAxisID || t.chart.options.scales.yAxes[0].id);
                },
                getDataset: function () {
                  return this.chart.data.datasets[this.index];
                },
                getMeta: function () {
                  return this.chart.getDatasetMeta(this.index);
                },
                getScaleForId: function (t) {
                  return this.chart.scales[t];
                },
                reset: function () {
                  this.update(!0);
                },
                destroy: function () {
                  this._data && a(this._data, this);
                },
                createMetaDataset: function () {
                  var t = this,
                    e = t.datasetElementType;
                  return (
                    e &&
                    new e({ _chart: t.chart.chart, _datasetIndex: t.index })
                  );
                },
                createMetaData: function (t) {
                  var e = this,
                    a = e.dataElementType;
                  return (
                    a &&
                    new a({
                      _chart: e.chart.chart,
                      _datasetIndex: e.index,
                      _index: t,
                    })
                  );
                },
                addElements: function () {
                  var t,
                    e,
                    a = this,
                    i = a.getMeta(),
                    n = a.getDataset().data || [],
                    o = i.data;
                  for (t = 0, e = n.length; e > t; ++t)
                    o[t] = o[t] || a.createMetaData(t);
                  i.dataset = i.dataset || a.createMetaDataset();
                },
                addElementAndReset: function (t) {
                  var e = this.createMetaData(t);
                  this.getMeta().data.splice(t, 0, e),
                    this.updateElement(e, t, !0);
                },
                buildOrUpdateElements: function () {
                  var t = this,
                    i = t.getDataset(),
                    n = i.data || (i.data = []);
                  t._data !== n &&
                    (t._data && a(t._data, t), e(n, t), (t._data = n)),
                    t.resyncElements();
                },
                update: i.noop,
                draw: function (t) {
                  var e,
                    a,
                    i = t || 1,
                    n = this.getMeta().data;
                  for (e = 0, a = n.length; a > e; ++e)
                    n[e].transition(i).draw();
                },
                removeHoverStyle: function (t, e) {
                  var a = this.chart.data.datasets[t._datasetIndex],
                    n = t._index,
                    o = t.custom || {},
                    r = i.getValueAtIndexOrDefault,
                    l = t._model;
                  (l.backgroundColor = o.backgroundColor
                    ? o.backgroundColor
                    : r(a.backgroundColor, n, e.backgroundColor)),
                    (l.borderColor = o.borderColor
                      ? o.borderColor
                      : r(a.borderColor, n, e.borderColor)),
                    (l.borderWidth = o.borderWidth
                      ? o.borderWidth
                      : r(a.borderWidth, n, e.borderWidth));
                },
                setHoverStyle: function (t) {
                  var e = this.chart.data.datasets[t._datasetIndex],
                    a = t._index,
                    n = t.custom || {},
                    o = i.getValueAtIndexOrDefault,
                    r = i.getHoverColor,
                    l = t._model;
                  (l.backgroundColor = n.hoverBackgroundColor
                    ? n.hoverBackgroundColor
                    : o(e.hoverBackgroundColor, a, r(l.backgroundColor))),
                    (l.borderColor = n.hoverBorderColor
                      ? n.hoverBorderColor
                      : o(e.hoverBorderColor, a, r(l.borderColor))),
                    (l.borderWidth = n.hoverBorderWidth
                      ? n.hoverBorderWidth
                      : o(e.hoverBorderWidth, a, l.borderWidth));
                },
                resyncElements: function () {
                  var t = this,
                    e = t.getMeta(),
                    a = t.getDataset().data,
                    i = e.data.length,
                    n = a.length;
                  i > n
                    ? e.data.splice(n, i - n)
                    : n > i && t.insertElements(i, n - i);
                },
                insertElements: function (t, e) {
                  for (var a = 0; e > a; ++a) this.addElementAndReset(t + a);
                },
                onDataPush: function () {
                  this.insertElements(
                    this.getDataset().data.length - 1,
                    arguments.length
                  );
                },
                onDataPop: function () {
                  this.getMeta().data.pop();
                },
                onDataShift: function () {
                  this.getMeta().data.shift();
                },
                onDataSplice: function (t, e) {
                  this.getMeta().data.splice(t, e),
                    this.insertElements(t, arguments.length - 2);
                },
                onDataUnshift: function () {
                  this.insertElements(0, arguments.length);
                },
              }),
              (t.DatasetController.extend = i.inherits);
          };
        },
        {},
      ],
      25: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.elements = {}),
              (t.Element = function (t) {
                e.extend(this, t), this.initialize.apply(this, arguments);
              }),
              e.extend(t.Element.prototype, {
                initialize: function () {
                  this.hidden = !1;
                },
                pivot: function () {
                  var t = this;
                  return (
                    t._view || (t._view = e.clone(t._model)),
                    (t._start = e.clone(t._view)),
                    t
                  );
                },
                transition: function (t) {
                  var a = this;
                  return (
                    a._view || (a._view = e.clone(a._model)),
                    1 === t
                      ? ((a._view = a._model), (a._start = null), a)
                      : (a._start || a.pivot(),
                        e.each(
                          a._model,
                          function (i, n) {
                            if ("_" === n[0]);
                            else if (a._view.hasOwnProperty(n))
                              if (i === a._view[n]);
                              else if ("string" == typeof i)
                                try {
                                  var o = e
                                    .color(a._model[n])
                                    .mix(e.color(a._start[n]), t);
                                  a._view[n] = o.rgbString();
                                } catch (r) {
                                  a._view[n] = i;
                                }
                              else if ("number" == typeof i) {
                                var l =
                                  void 0 !== a._start[n] &&
                                  isNaN(a._start[n]) === !1
                                    ? a._start[n]
                                    : 0;
                                a._view[n] = (a._model[n] - l) * t + l;
                              } else a._view[n] = i;
                            else
                              "number" != typeof i || isNaN(a._view[n])
                                ? (a._view[n] = i)
                                : (a._view[n] = i * t);
                          },
                          a
                        ),
                        a)
                  );
                },
                tooltipPosition: function () {
                  return { x: this._model.x, y: this._model.y };
                },
                hasValue: function () {
                  return e.isNumber(this._model.x) && e.isNumber(this._model.y);
                },
              }),
              (t.Element.extend = e.inherits);
          };
        },
        {},
      ],
      26: [
        function (t, e, a) {
          "use strict";
          var i = t(3);
          e.exports = function (t) {
            function e(t, e, a) {
              var i;
              return (
                "string" == typeof t
                  ? ((i = parseInt(t, 10)),
                    -1 !== t.indexOf("%") && (i = (i / 100) * e.parentNode[a]))
                  : (i = t),
                i
              );
            }
            function a(t) {
              return void 0 !== t && null !== t && "none" !== t;
            }
            function n(t, i, n) {
              var o = document.defaultView,
                r = t.parentNode,
                l = o.getComputedStyle(t)[i],
                s = o.getComputedStyle(r)[i],
                d = a(l),
                u = a(s),
                c = Number.POSITIVE_INFINITY;
              return d || u
                ? Math.min(d ? e(l, t, n) : c, u ? e(s, r, n) : c)
                : "none";
            }
            var o = (t.helpers = {});
            (o.each = function (t, e, a, i) {
              var n, r;
              if (o.isArray(t))
                if (((r = t.length), i))
                  for (n = r - 1; n >= 0; n--) e.call(a, t[n], n);
                else for (n = 0; r > n; n++) e.call(a, t[n], n);
              else if ("object" == typeof t) {
                var l = Object.keys(t);
                for (r = l.length, n = 0; r > n; n++) e.call(a, t[l[n]], l[n]);
              }
            }),
              (o.clone = function (t) {
                var e = {};
                return (
                  o.each(t, function (t, a) {
                    o.isArray(t)
                      ? (e[a] = t.slice(0))
                      : "object" == typeof t && null !== t
                      ? (e[a] = o.clone(t))
                      : (e[a] = t);
                  }),
                  e
                );
              }),
              (o.extend = function (t) {
                for (
                  var e = function (e, a) {
                      t[a] = e;
                    },
                    a = 1,
                    i = arguments.length;
                  i > a;
                  a++
                )
                  o.each(arguments[a], e);
                return t;
              }),
              (o.configMerge = function (e) {
                var a = o.clone(e);
                return (
                  o.each(
                    Array.prototype.slice.call(arguments, 1),
                    function (e) {
                      o.each(e, function (e, i) {
                        var n = a.hasOwnProperty(i),
                          r = n ? a[i] : {};
                        "scales" === i
                          ? (a[i] = o.scaleMerge(r, e))
                          : "scale" === i
                          ? (a[i] = o.configMerge(
                              r,
                              t.scaleService.getScaleDefaults(e.type),
                              e
                            ))
                          : !n ||
                            "object" != typeof r ||
                            o.isArray(r) ||
                            null === r ||
                            "object" != typeof e ||
                            o.isArray(e)
                          ? (a[i] = e)
                          : (a[i] = o.configMerge(r, e));
                      });
                    }
                  ),
                  a
                );
              }),
              (o.scaleMerge = function (e, a) {
                var i = o.clone(e);
                return (
                  o.each(a, function (e, a) {
                    "xAxes" === a || "yAxes" === a
                      ? i.hasOwnProperty(a)
                        ? o.each(e, function (e, n) {
                            var r = o.getValueOrDefault(
                                e.type,
                                "xAxes" === a ? "category" : "linear"
                              ),
                              l = t.scaleService.getScaleDefaults(r);
                            n >= i[a].length || !i[a][n].type
                              ? i[a].push(o.configMerge(l, e))
                              : e.type && e.type !== i[a][n].type
                              ? (i[a][n] = o.configMerge(i[a][n], l, e))
                              : (i[a][n] = o.configMerge(i[a][n], e));
                          })
                        : ((i[a] = []),
                          o.each(e, function (e) {
                            var n = o.getValueOrDefault(
                              e.type,
                              "xAxes" === a ? "category" : "linear"
                            );
                            i[a].push(
                              o.configMerge(
                                t.scaleService.getScaleDefaults(n),
                                e
                              )
                            );
                          }))
                      : i.hasOwnProperty(a) &&
                        "object" == typeof i[a] &&
                        null !== i[a] &&
                        "object" == typeof e
                      ? (i[a] = o.configMerge(i[a], e))
                      : (i[a] = e);
                  }),
                  i
                );
              }),
              (o.getValueAtIndexOrDefault = function (t, e, a) {
                return void 0 === t || null === t
                  ? a
                  : o.isArray(t)
                  ? e < t.length
                    ? t[e]
                    : a
                  : t;
              }),
              (o.getValueOrDefault = function (t, e) {
                return void 0 === t ? e : t;
              }),
              (o.indexOf = Array.prototype.indexOf
                ? function (t, e) {
                    return t.indexOf(e);
                  }
                : function (t, e) {
                    for (var a = 0, i = t.length; i > a; ++a)
                      if (t[a] === e) return a;
                    return -1;
                  }),
              (o.where = function (t, e) {
                if (o.isArray(t) && Array.prototype.filter) return t.filter(e);
                var a = [];
                return (
                  o.each(t, function (t) {
                    e(t) && a.push(t);
                  }),
                  a
                );
              }),
              (o.findIndex = Array.prototype.findIndex
                ? function (t, e, a) {
                    return t.findIndex(e, a);
                  }
                : function (t, e, a) {
                    a = void 0 === a ? t : a;
                    for (var i = 0, n = t.length; n > i; ++i)
                      if (e.call(a, t[i], i, t)) return i;
                    return -1;
                  }),
              (o.findNextWhere = function (t, e, a) {
                (void 0 === a || null === a) && (a = -1);
                for (var i = a + 1; i < t.length; i++) {
                  var n = t[i];
                  if (e(n)) return n;
                }
              }),
              (o.findPreviousWhere = function (t, e, a) {
                (void 0 === a || null === a) && (a = t.length);
                for (var i = a - 1; i >= 0; i--) {
                  var n = t[i];
                  if (e(n)) return n;
                }
              }),
              (o.inherits = function (t) {
                var e = this,
                  a =
                    t && t.hasOwnProperty("constructor")
                      ? t.constructor
                      : function () {
                          return e.apply(this, arguments);
                        },
                  i = function () {
                    this.constructor = a;
                  };
                return (
                  (i.prototype = e.prototype),
                  (a.prototype = new i()),
                  (a.extend = o.inherits),
                  t && o.extend(a.prototype, t),
                  (a.__super__ = e.prototype),
                  a
                );
              }),
              (o.noop = function () {}),
              (o.uid = (function () {
                var t = 0;
                return function () {
                  return t++;
                };
              })()),
              (o.isNumber = function (t) {
                return !isNaN(parseFloat(t)) && isFinite(t);
              }),
              (o.almostEquals = function (t, e, a) {
                return Math.abs(t - e) < a;
              }),
              (o.max = function (t) {
                return t.reduce(function (t, e) {
                  return isNaN(e) ? t : Math.max(t, e);
                }, Number.NEGATIVE_INFINITY);
              }),
              (o.min = function (t) {
                return t.reduce(function (t, e) {
                  return isNaN(e) ? t : Math.min(t, e);
                }, Number.POSITIVE_INFINITY);
              }),
              (o.sign = Math.sign
                ? function (t) {
                    return Math.sign(t);
                  }
                : function (t) {
                    return (t = +t), 0 === t || isNaN(t) ? t : t > 0 ? 1 : -1;
                  }),
              (o.log10 = Math.log10
                ? function (t) {
                    return Math.log10(t);
                  }
                : function (t) {
                    return Math.log(t) / Math.LN10;
                  }),
              (o.toRadians = function (t) {
                return t * (Math.PI / 180);
              }),
              (o.toDegrees = function (t) {
                return t * (180 / Math.PI);
              }),
              (o.getAngleFromPoint = function (t, e) {
                var a = e.x - t.x,
                  i = e.y - t.y,
                  n = Math.sqrt(a * a + i * i),
                  o = Math.atan2(i, a);
                return (
                  o < -0.5 * Math.PI && (o += 2 * Math.PI),
                  { angle: o, distance: n }
                );
              }),
              (o.distanceBetweenPoints = function (t, e) {
                return Math.sqrt(
                  Math.pow(e.x - t.x, 2) + Math.pow(e.y - t.y, 2)
                );
              }),
              (o.aliasPixel = function (t) {
                return t % 2 === 0 ? 0 : 0.5;
              }),
              (o.splineCurve = function (t, e, a, i) {
                var n = t.skip ? e : t,
                  o = e,
                  r = a.skip ? e : a,
                  l = Math.sqrt(
                    Math.pow(o.x - n.x, 2) + Math.pow(o.y - n.y, 2)
                  ),
                  s = Math.sqrt(
                    Math.pow(r.x - o.x, 2) + Math.pow(r.y - o.y, 2)
                  ),
                  d = l / (l + s),
                  u = s / (l + s);
                (d = isNaN(d) ? 0 : d), (u = isNaN(u) ? 0 : u);
                var c = i * d,
                  h = i * u;
                return {
                  previous: {
                    x: o.x - c * (r.x - n.x),
                    y: o.y - c * (r.y - n.y),
                  },
                  next: { x: o.x + h * (r.x - n.x), y: o.y + h * (r.y - n.y) },
                };
              }),
              (o.EPSILON = Number.EPSILON || 1e-14),
              (o.splineCurveMonotone = function (t) {
                var e,
                  a,
                  i,
                  n,
                  r = (t || []).map(function (t) {
                    return { model: t._model, deltaK: 0, mK: 0 };
                  }),
                  l = r.length;
                for (e = 0; l > e; ++e)
                  (i = r[e]),
                    i.model.skip ||
                      ((a = e > 0 ? r[e - 1] : null),
                      (n = l - 1 > e ? r[e + 1] : null),
                      n &&
                        !n.model.skip &&
                        (i.deltaK =
                          (n.model.y - i.model.y) / (n.model.x - i.model.x)),
                      !a || a.model.skip
                        ? (i.mK = i.deltaK)
                        : !n || n.model.skip
                        ? (i.mK = a.deltaK)
                        : this.sign(a.deltaK) !== this.sign(i.deltaK)
                        ? (i.mK = 0)
                        : (i.mK = (a.deltaK + i.deltaK) / 2));
                var s, d, u, c;
                for (e = 0; l - 1 > e; ++e)
                  (i = r[e]),
                    (n = r[e + 1]),
                    i.model.skip ||
                      n.model.skip ||
                      (o.almostEquals(i.deltaK, 0, this.EPSILON)
                        ? (i.mK = n.mK = 0)
                        : ((s = i.mK / i.deltaK),
                          (d = n.mK / i.deltaK),
                          (c = Math.pow(s, 2) + Math.pow(d, 2)),
                          9 >= c ||
                            ((u = 3 / Math.sqrt(c)),
                            (i.mK = s * u * i.deltaK),
                            (n.mK = d * u * i.deltaK))));
                var h;
                for (e = 0; l > e; ++e)
                  (i = r[e]),
                    i.model.skip ||
                      ((a = e > 0 ? r[e - 1] : null),
                      (n = l - 1 > e ? r[e + 1] : null),
                      a &&
                        !a.model.skip &&
                        ((h = (i.model.x - a.model.x) / 3),
                        (i.model.controlPointPreviousX = i.model.x - h),
                        (i.model.controlPointPreviousY = i.model.y - h * i.mK)),
                      n &&
                        !n.model.skip &&
                        ((h = (n.model.x - i.model.x) / 3),
                        (i.model.controlPointNextX = i.model.x + h),
                        (i.model.controlPointNextY = i.model.y + h * i.mK)));
              }),
              (o.nextItem = function (t, e, a) {
                return a
                  ? e >= t.length - 1
                    ? t[0]
                    : t[e + 1]
                  : e >= t.length - 1
                  ? t[t.length - 1]
                  : t[e + 1];
              }),
              (o.previousItem = function (t, e, a) {
                return a
                  ? 0 >= e
                    ? t[t.length - 1]
                    : t[e - 1]
                  : 0 >= e
                  ? t[0]
                  : t[e - 1];
              }),
              (o.niceNum = function (t, e) {
                var a,
                  i = Math.floor(o.log10(t)),
                  n = t / Math.pow(10, i);
                return (
                  (a = e
                    ? 1.5 > n
                      ? 1
                      : 3 > n
                      ? 2
                      : 7 > n
                      ? 5
                      : 10
                    : 1 >= n
                    ? 1
                    : 2 >= n
                    ? 2
                    : 5 >= n
                    ? 5
                    : 10),
                  a * Math.pow(10, i)
                );
              });
            var r = (o.easingEffects = {
              linear: function (t) {
                return t;
              },
              easeInQuad: function (t) {
                return t * t;
              },
              easeOutQuad: function (t) {
                return -1 * t * (t - 2);
              },
              easeInOutQuad: function (t) {
                return (t /= 0.5) < 1
                  ? 0.5 * t * t
                  : -0.5 * (--t * (t - 2) - 1);
              },
              easeInCubic: function (t) {
                return t * t * t;
              },
              easeOutCubic: function (t) {
                return 1 * ((t = t / 1 - 1) * t * t + 1);
              },
              easeInOutCubic: function (t) {
                return (t /= 0.5) < 1
                  ? 0.5 * t * t * t
                  : 0.5 * ((t -= 2) * t * t + 2);
              },
              easeInQuart: function (t) {
                return t * t * t * t;
              },
              easeOutQuart: function (t) {
                return -1 * ((t = t / 1 - 1) * t * t * t - 1);
              },
              easeInOutQuart: function (t) {
                return (t /= 0.5) < 1
                  ? 0.5 * t * t * t * t
                  : -0.5 * ((t -= 2) * t * t * t - 2);
              },
              easeInQuint: function (t) {
                return 1 * (t /= 1) * t * t * t * t;
              },
              easeOutQuint: function (t) {
                return 1 * ((t = t / 1 - 1) * t * t * t * t + 1);
              },
              easeInOutQuint: function (t) {
                return (t /= 0.5) < 1
                  ? 0.5 * t * t * t * t * t
                  : 0.5 * ((t -= 2) * t * t * t * t + 2);
              },
              easeInSine: function (t) {
                return -1 * Math.cos((t / 1) * (Math.PI / 2)) + 1;
              },
              easeOutSine: function (t) {
                return 1 * Math.sin((t / 1) * (Math.PI / 2));
              },
              easeInOutSine: function (t) {
                return -0.5 * (Math.cos((Math.PI * t) / 1) - 1);
              },
              easeInExpo: function (t) {
                return 0 === t ? 1 : 1 * Math.pow(2, 10 * (t / 1 - 1));
              },
              easeOutExpo: function (t) {
                return 1 === t ? 1 : 1 * (-Math.pow(2, (-10 * t) / 1) + 1);
              },
              easeInOutExpo: function (t) {
                return 0 === t
                  ? 0
                  : 1 === t
                  ? 1
                  : (t /= 0.5) < 1
                  ? 0.5 * Math.pow(2, 10 * (t - 1))
                  : 0.5 * (-Math.pow(2, -10 * --t) + 2);
              },
              easeInCirc: function (t) {
                return t >= 1 ? t : -1 * (Math.sqrt(1 - (t /= 1) * t) - 1);
              },
              easeOutCirc: function (t) {
                return 1 * Math.sqrt(1 - (t = t / 1 - 1) * t);
              },
              easeInOutCirc: function (t) {
                return (t /= 0.5) < 1
                  ? -0.5 * (Math.sqrt(1 - t * t) - 1)
                  : 0.5 * (Math.sqrt(1 - (t -= 2) * t) + 1);
              },
              easeInElastic: function (t) {
                var e = 1.70158,
                  a = 0,
                  i = 1;
                return 0 === t
                  ? 0
                  : 1 === (t /= 1)
                  ? 1
                  : (a || (a = 0.3),
                    i < Math.abs(1)
                      ? ((i = 1), (e = a / 4))
                      : (e = (a / (2 * Math.PI)) * Math.asin(1 / i)),
                    -(
                      i *
                      Math.pow(2, 10 * (t -= 1)) *
                      Math.sin(((1 * t - e) * (2 * Math.PI)) / a)
                    ));
              },
              easeOutElastic: function (t) {
                var e = 1.70158,
                  a = 0,
                  i = 1;
                return 0 === t
                  ? 0
                  : 1 === (t /= 1)
                  ? 1
                  : (a || (a = 0.3),
                    i < Math.abs(1)
                      ? ((i = 1), (e = a / 4))
                      : (e = (a / (2 * Math.PI)) * Math.asin(1 / i)),
                    i *
                      Math.pow(2, -10 * t) *
                      Math.sin(((1 * t - e) * (2 * Math.PI)) / a) +
                      1);
              },
              easeInOutElastic: function (t) {
                var e = 1.70158,
                  a = 0,
                  i = 1;
                return 0 === t
                  ? 0
                  : 2 === (t /= 0.5)
                  ? 1
                  : (a || (a = 1 * (0.3 * 1.5)),
                    i < Math.abs(1)
                      ? ((i = 1), (e = a / 4))
                      : (e = (a / (2 * Math.PI)) * Math.asin(1 / i)),
                    1 > t
                      ? -0.5 *
                        (i *
                          Math.pow(2, 10 * (t -= 1)) *
                          Math.sin(((1 * t - e) * (2 * Math.PI)) / a))
                      : i *
                          Math.pow(2, -10 * (t -= 1)) *
                          Math.sin(((1 * t - e) * (2 * Math.PI)) / a) *
                          0.5 +
                        1);
              },
              easeInBack: function (t) {
                var e = 1.70158;
                return 1 * (t /= 1) * t * ((e + 1) * t - e);
              },
              easeOutBack: function (t) {
                var e = 1.70158;
                return 1 * ((t = t / 1 - 1) * t * ((e + 1) * t + e) + 1);
              },
              easeInOutBack: function (t) {
                var e = 1.70158;
                return (t /= 0.5) < 1
                  ? 0.5 * (t * t * (((e *= 1.525) + 1) * t - e))
                  : 0.5 * ((t -= 2) * t * (((e *= 1.525) + 1) * t + e) + 2);
              },
              easeInBounce: function (t) {
                return 1 - r.easeOutBounce(1 - t);
              },
              easeOutBounce: function (t) {
                return (t /= 1) < 1 / 2.75
                  ? 1 * (7.5625 * t * t)
                  : 2 / 2.75 > t
                  ? 1 * (7.5625 * (t -= 1.5 / 2.75) * t + 0.75)
                  : 2.5 / 2.75 > t
                  ? 1 * (7.5625 * (t -= 2.25 / 2.75) * t + 0.9375)
                  : 1 * (7.5625 * (t -= 2.625 / 2.75) * t + 0.984375);
              },
              easeInOutBounce: function (t) {
                return 0.5 > t
                  ? 0.5 * r.easeInBounce(2 * t)
                  : 0.5 * r.easeOutBounce(2 * t - 1) + 0.5;
              },
            });
            (o.requestAnimFrame = (function () {
              return (
                window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function (t) {
                  return window.setTimeout(t, 1e3 / 60);
                }
              );
            })()),
              (o.cancelAnimFrame = (function () {
                return (
                  window.cancelAnimationFrame ||
                  window.webkitCancelAnimationFrame ||
                  window.mozCancelAnimationFrame ||
                  window.oCancelAnimationFrame ||
                  window.msCancelAnimationFrame ||
                  function (t) {
                    return window.clearTimeout(t, 1e3 / 60);
                  }
                );
              })()),
              (o.getRelativePosition = function (t, e) {
                var a,
                  i,
                  n = t.originalEvent || t,
                  r = t.currentTarget || t.srcElement,
                  l = r.getBoundingClientRect(),
                  s = n.touches;
                s && s.length > 0
                  ? ((a = s[0].clientX), (i = s[0].clientY))
                  : ((a = n.clientX), (i = n.clientY));
                var d = parseFloat(o.getStyle(r, "padding-left")),
                  u = parseFloat(o.getStyle(r, "padding-top")),
                  c = parseFloat(o.getStyle(r, "padding-right")),
                  h = parseFloat(o.getStyle(r, "padding-bottom")),
                  f = l.right - l.left - d - c,
                  g = l.bottom - l.top - u - h;
                return (
                  (a = Math.round(
                    (((a - l.left - d) / f) * r.width) /
                      e.currentDevicePixelRatio
                  )),
                  (i = Math.round(
                    (((i - l.top - u) / g) * r.height) /
                      e.currentDevicePixelRatio
                  )),
                  { x: a, y: i }
                );
              }),
              (o.addEvent = function (t, e, a) {
                t.addEventListener
                  ? t.addEventListener(e, a)
                  : t.attachEvent
                  ? t.attachEvent("on" + e, a)
                  : (t["on" + e] = a);
              }),
              (o.removeEvent = function (t, e, a) {
                t.removeEventListener
                  ? t.removeEventListener(e, a, !1)
                  : t.detachEvent
                  ? t.detachEvent("on" + e, a)
                  : (t["on" + e] = o.noop);
              }),
              (o.bindEvents = function (t, e, a) {
                var i = (t.events = t.events || {});
                o.each(e, function (e) {
                  (i[e] = function () {
                    a.apply(t, arguments);
                  }),
                    o.addEvent(t.chart.canvas, e, i[e]);
                });
              }),
              (o.unbindEvents = function (t, e) {
                var a = t.chart.canvas;
                o.each(e, function (t, e) {
                  o.removeEvent(a, e, t);
                });
              }),
              (o.getConstraintWidth = function (t) {
                return n(t, "max-width", "clientWidth");
              }),
              (o.getConstraintHeight = function (t) {
                return n(t, "max-height", "clientHeight");
              }),
              (o.getMaximumWidth = function (t) {
                var e = t.parentNode,
                  a = parseInt(o.getStyle(e, "padding-left"), 10),
                  i = parseInt(o.getStyle(e, "padding-right"), 10),
                  n = e.clientWidth - a - i,
                  r = o.getConstraintWidth(t);
                return isNaN(r) ? n : Math.min(n, r);
              }),
              (o.getMaximumHeight = function (t) {
                var e = t.parentNode,
                  a = parseInt(o.getStyle(e, "padding-top"), 10),
                  i = parseInt(o.getStyle(e, "padding-bottom"), 10),
                  n = e.clientHeight - a - i,
                  r = o.getConstraintHeight(t);
                return isNaN(r) ? n : Math.min(n, r);
              }),
              (o.getStyle = function (t, e) {
                return t.currentStyle
                  ? t.currentStyle[e]
                  : document.defaultView
                      .getComputedStyle(t, null)
                      .getPropertyValue(e);
              }),
              (o.retinaScale = function (t) {
                var e = (t.currentDevicePixelRatio =
                  window.devicePixelRatio || 1);
                if (1 !== e) {
                  var a = t.canvas,
                    i = t.height,
                    n = t.width;
                  (a.height = i * e),
                    (a.width = n * e),
                    t.ctx.scale(e, e),
                    (a.style.height = i + "px"),
                    (a.style.width = n + "px");
                }
              }),
              (o.clear = function (t) {
                t.ctx.clearRect(0, 0, t.width, t.height);
              }),
              (o.fontString = function (t, e, a) {
                return e + " " + t + "px " + a;
              }),
              (o.longestText = function (t, e, a, i) {
                i = i || {};
                var n = (i.data = i.data || {}),
                  r = (i.garbageCollect = i.garbageCollect || []);
                i.font !== e &&
                  ((n = i.data = {}),
                  (r = i.garbageCollect = []),
                  (i.font = e)),
                  (t.font = e);
                var l = 0;
                o.each(a, function (e) {
                  void 0 !== e && null !== e && o.isArray(e) !== !0
                    ? (l = o.measureText(t, n, r, l, e))
                    : o.isArray(e) &&
                      o.each(e, function (e) {
                        void 0 === e ||
                          null === e ||
                          o.isArray(e) ||
                          (l = o.measureText(t, n, r, l, e));
                      });
                });
                var s = r.length / 2;
                if (s > a.length) {
                  for (var d = 0; s > d; d++) delete n[r[d]];
                  r.splice(0, s);
                }
                return l;
              }),
              (o.measureText = function (t, e, a, i, n) {
                var o = e[n];
                return (
                  o || ((o = e[n] = t.measureText(n).width), a.push(n)),
                  o > i && (i = o),
                  i
                );
              }),
              (o.numberOfLabelLines = function (t) {
                var e = 1;
                return (
                  o.each(t, function (t) {
                    o.isArray(t) && t.length > e && (e = t.length);
                  }),
                  e
                );
              }),
              (o.drawRoundedRectangle = function (t, e, a, i, n, o) {
                t.beginPath(),
                  t.moveTo(e + o, a),
                  t.lineTo(e + i - o, a),
                  t.quadraticCurveTo(e + i, a, e + i, a + o),
                  t.lineTo(e + i, a + n - o),
                  t.quadraticCurveTo(e + i, a + n, e + i - o, a + n),
                  t.lineTo(e + o, a + n),
                  t.quadraticCurveTo(e, a + n, e, a + n - o),
                  t.lineTo(e, a + o),
                  t.quadraticCurveTo(e, a, e + o, a),
                  t.closePath();
              }),
              (o.color = function (e) {
                return i
                  ? i(
                      e instanceof CanvasGradient
                        ? t.defaults.global.defaultColor
                        : e
                    )
                  : (console.error("Color.js not found!"), e);
              }),
              (o.addResizeListener = function (t, e) {
                var a = document.createElement("iframe");
                (a.className = "chartjs-hidden-iframe"),
                  (a.style.cssText =
                    "display:block;overflow:hidden;border:0;margin:0;top:0;left:0;bottom:0;right:0;height:100%;width:100%;position:absolute;pointer-events:none;z-index:-1;"),
                  (a.tabIndex = -1);
                var i = (t._chartjs = { resizer: a, ticking: !1 }),
                  n = function () {
                    i.ticking ||
                      ((i.ticking = !0),
                      o.requestAnimFrame.call(window, function () {
                        return i.resizer ? ((i.ticking = !1), e()) : void 0;
                      }));
                  };
                o.addEvent(a, "load", function () {
                  o.addEvent(a.contentWindow || a, "resize", n), n();
                }),
                  t.insertBefore(a, t.firstChild);
              }),
              (o.removeResizeListener = function (t) {
                if (t && t._chartjs) {
                  var e = t._chartjs.resizer;
                  e &&
                    (e.parentNode.removeChild(e), (t._chartjs.resizer = null)),
                    delete t._chartjs;
                }
              }),
              (o.isArray = Array.isArray
                ? function (t) {
                    return Array.isArray(t);
                  }
                : function (t) {
                    return (
                      "[object Array]" === Object.prototype.toString.call(t)
                    );
                  }),
              (o.arrayEquals = function (t, e) {
                var a, i, n, r;
                if (!t || !e || t.length !== e.length) return !1;
                for (a = 0, i = t.length; i > a; ++a)
                  if (
                    ((n = t[a]),
                    (r = e[a]),
                    n instanceof Array && r instanceof Array)
                  ) {
                    if (!o.arrayEquals(n, r)) return !1;
                  } else if (n !== r) return !1;
                return !0;
              }),
              (o.callCallback = function (t, e, a) {
                t && "function" == typeof t.call && t.apply(a, e);
              }),
              (o.getHoverColor = function (t) {
                return t instanceof CanvasPattern
                  ? t
                  : o.color(t).saturate(0.5).darken(0.1).rgbString();
              });
          };
        },
        { 3: 3 },
      ],
      27: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              var a,
                i,
                n,
                o,
                r,
                l = t.data.datasets;
              for (i = 0, o = l.length; o > i; ++i)
                if (t.isDatasetVisible(i))
                  for (
                    a = t.getDatasetMeta(i), n = 0, r = a.data.length;
                    r > n;
                    ++n
                  ) {
                    var s = a.data[n];
                    s._view.skip || e(s);
                  }
            }
            function a(t, a) {
              var i = [];
              return (
                e(t, function (t) {
                  t.inRange(a.x, a.y) && i.push(t);
                }),
                i
              );
            }
            function i(t, a, i, n) {
              var r = Number.POSITIVE_INFINITY,
                l = [];
              return (
                n || (n = o.distanceBetweenPoints),
                e(t, function (t) {
                  if (!i || t.inRange(a.x, a.y)) {
                    var e = t.getCenterPoint(),
                      o = n(a, e);
                    r > o ? ((l = [t]), (r = o)) : o === r && l.push(t);
                  }
                }),
                l
              );
            }
            function n(t, e, n) {
              var r = o.getRelativePosition(e, t.chart),
                l = function (t, e) {
                  return Math.abs(t.x - e.x);
                },
                s = n.intersect ? a(t, r) : i(t, r, !1, l),
                d = [];
              return s.length
                ? (t.data.datasets.forEach(function (e, a) {
                    if (t.isDatasetVisible(a)) {
                      var i = t.getDatasetMeta(a),
                        n = i.data[s[0]._index];
                      n && !n._view.skip && d.push(n);
                    }
                  }),
                  d)
                : [];
            }
            var o = t.helpers;
            t.Interaction = {
              modes: {
                single: function (t, a) {
                  var i = o.getRelativePosition(a, t.chart),
                    n = [];
                  return (
                    e(t, function (t) {
                      return t.inRange(i.x, i.y) ? (n.push(t), n) : void 0;
                    }),
                    n.slice(0, 1)
                  );
                },
                label: n,
                index: n,
                dataset: function (t, e, n) {
                  var r = o.getRelativePosition(e, t.chart),
                    l = n.intersect ? a(t, r) : i(t, r, !1);
                  return (
                    l.length > 0 &&
                      (l = t.getDatasetMeta(l[0]._datasetIndex).data),
                    l
                  );
                },
                "x-axis": function (t, e) {
                  return n(t, e, !0);
                },
                point: function (t, e) {
                  var i = o.getRelativePosition(e, t.chart);
                  return a(t, i);
                },
                nearest: function (t, e, a) {
                  var n = o.getRelativePosition(e, t.chart),
                    r = i(t, n, a.intersect);
                  return (
                    r.length > 1 &&
                      r.sort(function (t, e) {
                        var a = t.getArea(),
                          i = e.getArea(),
                          n = a - i;
                        return (
                          0 === n && (n = t._datasetIndex - e._datasetIndex), n
                        );
                      }),
                    r.slice(0, 1)
                  );
                },
                x: function (t, a, i) {
                  var n = o.getRelativePosition(a, t.chart),
                    r = [],
                    l = !1;
                  return (
                    e(t, function (t) {
                      t.inXRange(n.x) && r.push(t),
                        t.inRange(n.x, n.y) && (l = !0);
                    }),
                    i.intersect && !l && (r = []),
                    r
                  );
                },
                y: function (t, a, i) {
                  var n = o.getRelativePosition(a, t.chart),
                    r = [],
                    l = !1;
                  return (
                    e(t, function (t) {
                      t.inYRange(n.y) && r.push(t),
                        t.inRange(n.x, n.y) && (l = !0);
                    }),
                    i.intersect && !l && (r = []),
                    r
                  );
                },
              },
            };
          };
        },
        {},
      ],
      28: [
        function (t, e, a) {
          "use strict";
          e.exports = function () {
            var t = function (e, a) {
              return (
                (this.controller = new t.Controller(e, a, this)),
                this.controller
              );
            };
            return (
              (t.defaults = {
                global: {
                  responsive: !0,
                  responsiveAnimationDuration: 0,
                  maintainAspectRatio: !0,
                  events: [
                    "mousemove",
                    "mouseout",
                    "click",
                    "touchstart",
                    "touchmove",
                  ],
                  hover: {
                    onHover: null,
                    mode: "nearest",
                    intersect: !0,
                    animationDuration: 400,
                  },
                  onClick: null,
                  defaultColor: "rgba(0,0,0,0.1)",
                  defaultFontColor: "#666",
                  defaultFontFamily:
                    "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                  defaultFontSize: 12,
                  defaultFontStyle: "normal",
                  showLines: !0,
                  elements: {},
                  legendCallback: function (t) {
                    var e = [];
                    e.push('<ul class="' + t.id + '-legend">');
                    for (var a = 0; a < t.data.datasets.length; a++)
                      e.push(
                        '<li><span style="background-color:' +
                          t.data.datasets[a].backgroundColor +
                          '"></span>'
                      ),
                        t.data.datasets[a].label &&
                          e.push(t.data.datasets[a].label),
                        e.push("</li>");
                    return e.push("</ul>"), e.join("");
                  },
                },
              }),
              (t.Chart = t),
              t
            );
          };
        },
        {},
      ],
      29: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            t.layoutService = {
              defaults: {},
              addBox: function (t, e) {
                t.boxes || (t.boxes = []), t.boxes.push(e);
              },
              removeBox: function (t, e) {
                t.boxes && t.boxes.splice(t.boxes.indexOf(e), 1);
              },
              update: function (t, a, i) {
                function n(t) {
                  var e,
                    a = t.isHorizontal();
                  a
                    ? ((e = t.update(t.options.fullWidth ? x : C, M)),
                      (D -= e.height))
                    : ((e = t.update(w, S)), (C -= e.width)),
                    I.push({ horizontal: a, minSize: e, box: t });
                }
                function o(t) {
                  var a = e.findNextWhere(I, function (e) {
                    return e.box === t;
                  });
                  if (a)
                    if (t.isHorizontal()) {
                      var i = { left: A, right: T, top: 0, bottom: 0 };
                      t.update(t.options.fullWidth ? x : C, y / 2, i);
                    } else t.update(a.minSize.width, D);
                }
                function r(t) {
                  var a = e.findNextWhere(I, function (e) {
                      return e.box === t;
                    }),
                    i = { left: 0, right: 0, top: P, bottom: F };
                  a && t.update(a.minSize.width, D, i);
                }
                function l(t) {
                  t.isHorizontal()
                    ? ((t.left = t.options.fullWidth ? u : A),
                      (t.right = t.options.fullWidth ? a - c : A + C),
                      (t.top = L),
                      (t.bottom = L + t.height),
                      (L = t.bottom))
                    : ((t.left = V),
                      (t.right = V + t.width),
                      (t.top = P),
                      (t.bottom = P + D),
                      (V = t.right));
                }
                if (t) {
                  var s = t.options.layout,
                    d = s ? s.padding : null,
                    u = 0,
                    c = 0,
                    h = 0,
                    f = 0;
                  isNaN(d)
                    ? ((u = d.left || 0),
                      (c = d.right || 0),
                      (h = d.top || 0),
                      (f = d.bottom || 0))
                    : ((u = d), (c = d), (h = d), (f = d));
                  var g = e.where(t.boxes, function (t) {
                      return "left" === t.options.position;
                    }),
                    p = e.where(t.boxes, function (t) {
                      return "right" === t.options.position;
                    }),
                    m = e.where(t.boxes, function (t) {
                      return "top" === t.options.position;
                    }),
                    b = e.where(t.boxes, function (t) {
                      return "bottom" === t.options.position;
                    }),
                    v = e.where(t.boxes, function (t) {
                      return "chartArea" === t.options.position;
                    });
                  m.sort(function (t, e) {
                    return (
                      (e.options.fullWidth ? 1 : 0) -
                      (t.options.fullWidth ? 1 : 0)
                    );
                  }),
                    b.sort(function (t, e) {
                      return (
                        (t.options.fullWidth ? 1 : 0) -
                        (e.options.fullWidth ? 1 : 0)
                      );
                    });
                  var x = a - u - c,
                    y = i - h - f,
                    k = x / 2,
                    S = y / 2,
                    w = (a - k) / (g.length + p.length),
                    M = (i - S) / (m.length + b.length),
                    C = x,
                    D = y,
                    I = [];
                  e.each(g.concat(p, m, b), n);
                  var A = u,
                    T = c,
                    P = h,
                    F = f;
                  e.each(g.concat(p), o),
                    e.each(g, function (t) {
                      A += t.width;
                    }),
                    e.each(p, function (t) {
                      T += t.width;
                    }),
                    e.each(m.concat(b), o),
                    e.each(m, function (t) {
                      P += t.height;
                    }),
                    e.each(b, function (t) {
                      F += t.height;
                    }),
                    e.each(g.concat(p), r),
                    (A = u),
                    (T = c),
                    (P = h),
                    (F = f),
                    e.each(g, function (t) {
                      A += t.width;
                    }),
                    e.each(p, function (t) {
                      T += t.width;
                    }),
                    e.each(m, function (t) {
                      P += t.height;
                    }),
                    e.each(b, function (t) {
                      F += t.height;
                    });
                  var _ = i - P - F,
                    R = a - A - T;
                  (R !== C || _ !== D) &&
                    (e.each(g, function (t) {
                      t.height = _;
                    }),
                    e.each(p, function (t) {
                      t.height = _;
                    }),
                    e.each(m, function (t) {
                      t.options.fullWidth || (t.width = R);
                    }),
                    e.each(b, function (t) {
                      t.options.fullWidth || (t.width = R);
                    }),
                    (D = _),
                    (C = R));
                  var V = u,
                    L = h;
                  e.each(g.concat(m), l),
                    (V += C),
                    (L += D),
                    e.each(p, l),
                    e.each(b, l),
                    (t.chartArea = {
                      left: A,
                      top: P,
                      right: A + C,
                      bottom: P + D,
                    }),
                    e.each(v, function (e) {
                      (e.left = t.chartArea.left),
                        (e.top = t.chartArea.top),
                        (e.right = t.chartArea.right),
                        (e.bottom = t.chartArea.bottom),
                        e.update(C, D);
                    });
                }
              },
            };
          };
        },
        {},
      ],
      30: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              return t.usePointStyle ? e * Math.SQRT2 : t.boxWidth;
            }
            var a = t.helpers,
              i = a.noop;
            (t.defaults.global.legend = {
              display: !0,
              position: "top",
              fullWidth: !0,
              reverse: !1,
              onClick: function (t, e) {
                var a = e.datasetIndex,
                  i = this.chart,
                  n = i.getDatasetMeta(a);
                (n.hidden =
                  null === n.hidden ? !i.data.datasets[a].hidden : null),
                  i.update();
              },
              onHover: null,
              labels: {
                boxWidth: 40,
                padding: 10,
                generateLabels: function (t) {
                  var e = t.data;
                  return a.isArray(e.datasets)
                    ? e.datasets.map(function (e, i) {
                        return {
                          text: e.label,
                          fillStyle: a.isArray(e.backgroundColor)
                            ? e.backgroundColor[0]
                            : e.backgroundColor,
                          hidden: !t.isDatasetVisible(i),
                          lineCap: e.borderCapStyle,
                          lineDash: e.borderDash,
                          lineDashOffset: e.borderDashOffset,
                          lineJoin: e.borderJoinStyle,
                          lineWidth: e.borderWidth,
                          strokeStyle: e.borderColor,
                          pointStyle: e.pointStyle,
                          datasetIndex: i,
                        };
                      }, this)
                    : [];
                },
              },
            }),
              (t.Legend = t.Element.extend({
                initialize: function (t) {
                  a.extend(this, t),
                    (this.legendHitBoxes = []),
                    (this.doughnutMode = !1);
                },
                beforeUpdate: i,
                update: function (t, e, a) {
                  var i = this;
                  return (
                    i.beforeUpdate(),
                    (i.maxWidth = t),
                    (i.maxHeight = e),
                    (i.margins = a),
                    i.beforeSetDimensions(),
                    i.setDimensions(),
                    i.afterSetDimensions(),
                    i.beforeBuildLabels(),
                    i.buildLabels(),
                    i.afterBuildLabels(),
                    i.beforeFit(),
                    i.fit(),
                    i.afterFit(),
                    i.afterUpdate(),
                    i.minSize
                  );
                },
                afterUpdate: i,
                beforeSetDimensions: i,
                setDimensions: function () {
                  var t = this;
                  t.isHorizontal()
                    ? ((t.width = t.maxWidth),
                      (t.left = 0),
                      (t.right = t.width))
                    : ((t.height = t.maxHeight),
                      (t.top = 0),
                      (t.bottom = t.height)),
                    (t.paddingLeft = 0),
                    (t.paddingTop = 0),
                    (t.paddingRight = 0),
                    (t.paddingBottom = 0),
                    (t.minSize = { width: 0, height: 0 });
                },
                afterSetDimensions: i,
                beforeBuildLabels: i,
                buildLabels: function () {
                  var t = this;
                  (t.legendItems = t.options.labels.generateLabels.call(
                    t,
                    t.chart
                  )),
                    t.options.reverse && t.legendItems.reverse();
                },
                afterBuildLabels: i,
                beforeFit: i,
                fit: function () {
                  var i = this,
                    n = i.options,
                    o = n.labels,
                    r = n.display,
                    l = i.ctx,
                    s = t.defaults.global,
                    d = a.getValueOrDefault,
                    u = d(o.fontSize, s.defaultFontSize),
                    c = d(o.fontStyle, s.defaultFontStyle),
                    h = d(o.fontFamily, s.defaultFontFamily),
                    f = a.fontString(u, c, h),
                    g = (i.legendHitBoxes = []),
                    p = i.minSize,
                    m = i.isHorizontal();
                  if (
                    (m
                      ? ((p.width = i.maxWidth), (p.height = r ? 10 : 0))
                      : ((p.width = r ? 10 : 0), (p.height = i.maxHeight)),
                    r)
                  )
                    if (((l.font = f), m)) {
                      var b = (i.lineWidths = [0]),
                        v = i.legendItems.length ? u + o.padding : 0;
                      (l.textAlign = "left"),
                        (l.textBaseline = "top"),
                        a.each(i.legendItems, function (t, a) {
                          var n = e(o, u),
                            r = n + u / 2 + l.measureText(t.text).width;
                          b[b.length - 1] + r + o.padding >= i.width &&
                            ((v += u + o.padding), (b[b.length] = i.left)),
                            (g[a] = { left: 0, top: 0, width: r, height: u }),
                            (b[b.length - 1] += r + o.padding);
                        }),
                        (p.height += v);
                    } else {
                      var x = o.padding,
                        y = (i.columnWidths = []),
                        k = o.padding,
                        S = 0,
                        w = 0,
                        M = u + x;
                      a.each(i.legendItems, function (t, a) {
                        var i = e(o, u),
                          n = i + u / 2 + l.measureText(t.text).width;
                        w + M > p.height &&
                          ((k += S + o.padding), y.push(S), (S = 0), (w = 0)),
                          (S = Math.max(S, n)),
                          (w += M),
                          (g[a] = { left: 0, top: 0, width: n, height: u });
                      }),
                        (k += S),
                        y.push(S),
                        (p.width += k);
                    }
                  (i.width = p.width), (i.height = p.height);
                },
                afterFit: i,
                isHorizontal: function () {
                  return (
                    "top" === this.options.position ||
                    "bottom" === this.options.position
                  );
                },
                draw: function () {
                  var i = this,
                    n = i.options,
                    o = n.labels,
                    r = t.defaults.global,
                    l = r.elements.line,
                    s = i.width,
                    d = i.lineWidths;
                  if (n.display) {
                    var u,
                      c = i.ctx,
                      h = a.getValueOrDefault,
                      f = h(o.fontColor, r.defaultFontColor),
                      g = h(o.fontSize, r.defaultFontSize),
                      p = h(o.fontStyle, r.defaultFontStyle),
                      m = h(o.fontFamily, r.defaultFontFamily),
                      b = a.fontString(g, p, m);
                    (c.textAlign = "left"),
                      (c.textBaseline = "top"),
                      (c.lineWidth = 0.5),
                      (c.strokeStyle = f),
                      (c.fillStyle = f),
                      (c.font = b);
                    var v = e(o, g),
                      x = i.legendHitBoxes,
                      y = function (e, a, i) {
                        if (!(isNaN(v) || 0 >= v)) {
                          c.save(),
                            (c.fillStyle = h(i.fillStyle, r.defaultColor)),
                            (c.lineCap = h(i.lineCap, l.borderCapStyle)),
                            (c.lineDashOffset = h(
                              i.lineDashOffset,
                              l.borderDashOffset
                            )),
                            (c.lineJoin = h(i.lineJoin, l.borderJoinStyle)),
                            (c.lineWidth = h(i.lineWidth, l.borderWidth)),
                            (c.strokeStyle = h(i.strokeStyle, r.defaultColor));
                          var o = 0 === h(i.lineWidth, l.borderWidth);
                          if (
                            (c.setLineDash &&
                              c.setLineDash(h(i.lineDash, l.borderDash)),
                            n.labels && n.labels.usePointStyle)
                          ) {
                            var s = (g * Math.SQRT2) / 2,
                              d = s / Math.SQRT2,
                              u = e + d,
                              f = a + d;
                            t.canvasHelpers.drawPoint(c, i.pointStyle, s, u, f);
                          } else
                            o || c.strokeRect(e, a, v, g),
                              c.fillRect(e, a, v, g);
                          c.restore();
                        }
                      },
                      k = function (t, e, a, i) {
                        c.fillText(a.text, v + g / 2 + t, e),
                          a.hidden &&
                            (c.beginPath(),
                            (c.lineWidth = 2),
                            c.moveTo(v + g / 2 + t, e + g / 2),
                            c.lineTo(v + g / 2 + t + i, e + g / 2),
                            c.stroke());
                      },
                      S = i.isHorizontal();
                    u = S
                      ? {
                          x: i.left + (s - d[0]) / 2,
                          y: i.top + o.padding,
                          line: 0,
                        }
                      : {
                          x: i.left + o.padding,
                          y: i.top + o.padding,
                          line: 0,
                        };
                    var w = g + o.padding;
                    a.each(i.legendItems, function (t, e) {
                      var a = c.measureText(t.text).width,
                        n = v + g / 2 + a,
                        r = u.x,
                        l = u.y;
                      S
                        ? r + n >= s &&
                          ((l = u.y += w),
                          u.line++,
                          (r = u.x = i.left + (s - d[u.line]) / 2))
                        : l + w > i.bottom &&
                          ((r = u.x = r + i.columnWidths[u.line] + o.padding),
                          (l = u.y = i.top),
                          u.line++),
                        y(r, l, t),
                        (x[e].left = r),
                        (x[e].top = l),
                        k(r, l, t, a),
                        S ? (u.x += n + o.padding) : (u.y += w);
                    });
                  }
                },
                handleEvent: function (t) {
                  var e = this,
                    i = e.options,
                    n = "mouseup" === t.type ? "click" : t.type,
                    o = !1;
                  if ("mousemove" === n) {
                    if (!i.onHover) return;
                  } else {
                    if ("click" !== n) return;
                    if (!i.onClick) return;
                  }
                  var r = a.getRelativePosition(t, e.chart.chart),
                    l = r.x,
                    s = r.y;
                  if (
                    l >= e.left &&
                    l <= e.right &&
                    s >= e.top &&
                    s <= e.bottom
                  )
                    for (var d = e.legendHitBoxes, u = 0; u < d.length; ++u) {
                      var c = d[u];
                      if (
                        l >= c.left &&
                        l <= c.left + c.width &&
                        s >= c.top &&
                        s <= c.top + c.height
                      ) {
                        if ("click" === n) {
                          i.onClick.call(e, t, e.legendItems[u]), (o = !0);
                          break;
                        }
                        if ("mousemove" === n) {
                          i.onHover.call(e, t, e.legendItems[u]), (o = !0);
                          break;
                        }
                      }
                    }
                  return o;
                },
              })),
              t.plugins.register({
                beforeInit: function (e) {
                  var a = e.options,
                    i = a.legend;
                  i &&
                    ((e.legend = new t.Legend({
                      ctx: e.chart.ctx,
                      options: i,
                      chart: e,
                    })),
                    t.layoutService.addBox(e, e.legend));
                },
              });
          };
        },
        {},
      ],
      31: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers.noop;
            (t.plugins = {
              _plugins: [],
              register: function (t) {
                var e = this._plugins;
                [].concat(t).forEach(function (t) {
                  -1 === e.indexOf(t) && e.push(t);
                });
              },
              unregister: function (t) {
                var e = this._plugins;
                [].concat(t).forEach(function (t) {
                  var a = e.indexOf(t);
                  -1 !== a && e.splice(a, 1);
                });
              },
              clear: function () {
                this._plugins = [];
              },
              count: function () {
                return this._plugins.length;
              },
              getAll: function () {
                return this._plugins;
              },
              notify: function (t, e) {
                var a,
                  i,
                  n = this._plugins,
                  o = n.length;
                for (a = 0; o > a; ++a)
                  if (
                    ((i = n[a]),
                    "function" == typeof i[t] && i[t].apply(i, e || []) === !1)
                  )
                    return !1;
                return !0;
              },
            }),
              (t.PluginBase = t.Element.extend({
                beforeInit: e,
                afterInit: e,
                beforeUpdate: e,
                afterUpdate: e,
                beforeDraw: e,
                afterDraw: e,
                destroy: e,
              })),
              (t.pluginService = t.plugins);
          };
        },
        {},
      ],
      32: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            (t.defaults.scale = {
              display: !0,
              position: "left",
              gridLines: {
                display: !0,
                color: "rgba(0, 0, 0, 0.1)",
                lineWidth: 1,
                drawBorder: !0,
                drawOnChartArea: !0,
                drawTicks: !0,
                tickMarkLength: 10,
                zeroLineWidth: 1,
                zeroLineColor: "rgba(0,0,0,0.25)",
                offsetGridLines: !1,
                borderDash: [],
                borderDashOffset: 0,
              },
              scaleLabel: { labelString: "", display: !1 },
              ticks: {
                beginAtZero: !1,
                minRotation: 0,
                maxRotation: 50,
                mirror: !1,
                padding: 10,
                reverse: !1,
                display: !0,
                autoSkip: !0,
                autoSkipPadding: 0,
                labelOffset: 0,
                callback: t.Ticks.formatters.values,
              },
            }),
              (t.Scale = t.Element.extend({
                beforeUpdate: function () {
                  e.callCallback(this.options.beforeUpdate, [this]);
                },
                update: function (t, a, i) {
                  var n = this;
                  return (
                    n.beforeUpdate(),
                    (n.maxWidth = t),
                    (n.maxHeight = a),
                    (n.margins = e.extend(
                      { left: 0, right: 0, top: 0, bottom: 0 },
                      i
                    )),
                    n.beforeSetDimensions(),
                    n.setDimensions(),
                    n.afterSetDimensions(),
                    n.beforeDataLimits(),
                    n.determineDataLimits(),
                    n.afterDataLimits(),
                    n.beforeBuildTicks(),
                    n.buildTicks(),
                    n.afterBuildTicks(),
                    n.beforeTickToLabelConversion(),
                    n.convertTicksToLabels(),
                    n.afterTickToLabelConversion(),
                    n.beforeCalculateTickRotation(),
                    n.calculateTickRotation(),
                    n.afterCalculateTickRotation(),
                    n.beforeFit(),
                    n.fit(),
                    n.afterFit(),
                    n.afterUpdate(),
                    n.minSize
                  );
                },
                afterUpdate: function () {
                  e.callCallback(this.options.afterUpdate, [this]);
                },
                beforeSetDimensions: function () {
                  e.callCallback(this.options.beforeSetDimensions, [this]);
                },
                setDimensions: function () {
                  var t = this;
                  t.isHorizontal()
                    ? ((t.width = t.maxWidth),
                      (t.left = 0),
                      (t.right = t.width))
                    : ((t.height = t.maxHeight),
                      (t.top = 0),
                      (t.bottom = t.height)),
                    (t.paddingLeft = 0),
                    (t.paddingTop = 0),
                    (t.paddingRight = 0),
                    (t.paddingBottom = 0);
                },
                afterSetDimensions: function () {
                  e.callCallback(this.options.afterSetDimensions, [this]);
                },
                beforeDataLimits: function () {
                  e.callCallback(this.options.beforeDataLimits, [this]);
                },
                determineDataLimits: e.noop,
                afterDataLimits: function () {
                  e.callCallback(this.options.afterDataLimits, [this]);
                },
                beforeBuildTicks: function () {
                  e.callCallback(this.options.beforeBuildTicks, [this]);
                },
                buildTicks: e.noop,
                afterBuildTicks: function () {
                  e.callCallback(this.options.afterBuildTicks, [this]);
                },
                beforeTickToLabelConversion: function () {
                  e.callCallback(this.options.beforeTickToLabelConversion, [
                    this,
                  ]);
                },
                convertTicksToLabels: function () {
                  var t = this,
                    e = t.options.ticks;
                  t.ticks = t.ticks.map(e.userCallback || e.callback);
                },
                afterTickToLabelConversion: function () {
                  e.callCallback(this.options.afterTickToLabelConversion, [
                    this,
                  ]);
                },
                beforeCalculateTickRotation: function () {
                  e.callCallback(this.options.beforeCalculateTickRotation, [
                    this,
                  ]);
                },
                calculateTickRotation: function () {
                  var a = this,
                    i = a.ctx,
                    n = t.defaults.global,
                    o = a.options.ticks,
                    r = e.getValueOrDefault(o.fontSize, n.defaultFontSize),
                    l = e.getValueOrDefault(o.fontStyle, n.defaultFontStyle),
                    s = e.getValueOrDefault(o.fontFamily, n.defaultFontFamily),
                    d = e.fontString(r, l, s);
                  i.font = d;
                  var u,
                    c = i.measureText(a.ticks[0]).width,
                    h = i.measureText(a.ticks[a.ticks.length - 1]).width;
                  if (
                    ((a.labelRotation = o.minRotation || 0),
                    (a.paddingRight = 0),
                    (a.paddingLeft = 0),
                    a.options.display && a.isHorizontal())
                  ) {
                    (a.paddingRight = h / 2 + 3),
                      (a.paddingLeft = c / 2 + 3),
                      a.longestTextCache || (a.longestTextCache = {});
                    for (
                      var f,
                        g,
                        p = e.longestText(i, d, a.ticks, a.longestTextCache),
                        m = p,
                        b = a.getPixelForTick(1) - a.getPixelForTick(0) - 6;
                      m > b && a.labelRotation < o.maxRotation;

                    ) {
                      if (
                        ((f = Math.cos(e.toRadians(a.labelRotation))),
                        (g = Math.sin(e.toRadians(a.labelRotation))),
                        (u = f * c),
                        u + r / 2 > a.yLabelWidth &&
                          (a.paddingLeft = u + r / 2),
                        (a.paddingRight = r / 2),
                        g * p > a.maxHeight)
                      ) {
                        a.labelRotation--;
                        break;
                      }
                      a.labelRotation++, (m = f * p);
                    }
                  }
                  a.margins &&
                    ((a.paddingLeft = Math.max(
                      a.paddingLeft - a.margins.left,
                      0
                    )),
                    (a.paddingRight = Math.max(
                      a.paddingRight - a.margins.right,
                      0
                    )));
                },
                afterCalculateTickRotation: function () {
                  e.callCallback(this.options.afterCalculateTickRotation, [
                    this,
                  ]);
                },
                beforeFit: function () {
                  e.callCallback(this.options.beforeFit, [this]);
                },
                fit: function () {
                  var a = this,
                    i = (a.minSize = { width: 0, height: 0 }),
                    n = a.options,
                    o = t.defaults.global,
                    r = n.ticks,
                    l = n.scaleLabel,
                    s = n.gridLines,
                    d = n.display,
                    u = a.isHorizontal(),
                    c = e.getValueOrDefault(r.fontSize, o.defaultFontSize),
                    h = e.getValueOrDefault(r.fontStyle, o.defaultFontStyle),
                    f = e.getValueOrDefault(r.fontFamily, o.defaultFontFamily),
                    g = e.fontString(c, h, f),
                    p = e.getValueOrDefault(l.fontSize, o.defaultFontSize),
                    m = n.gridLines.tickMarkLength;
                  if (
                    (u
                      ? (i.width = a.isFullWidth()
                          ? a.maxWidth - a.margins.left - a.margins.right
                          : a.maxWidth)
                      : (i.width = d && s.drawTicks ? m : 0),
                    u
                      ? (i.height = d && s.drawTicks ? m : 0)
                      : (i.height = a.maxHeight),
                    l.display &&
                      d &&
                      (u ? (i.height += 1.5 * p) : (i.width += 1.5 * p)),
                    r.display && d)
                  ) {
                    a.longestTextCache || (a.longestTextCache = {});
                    var b = e.longestText(
                        a.ctx,
                        g,
                        a.ticks,
                        a.longestTextCache
                      ),
                      v = e.numberOfLabelLines(a.ticks),
                      x = 0.5 * c;
                    if (u) {
                      a.longestLabelWidth = b;
                      var y =
                        Math.sin(e.toRadians(a.labelRotation)) *
                          a.longestLabelWidth +
                        c * v +
                        x * v;
                      (i.height = Math.min(a.maxHeight, i.height + y)),
                        (a.ctx.font = g);
                      var k = a.ctx.measureText(a.ticks[0]).width,
                        S = a.ctx.measureText(
                          a.ticks[a.ticks.length - 1]
                        ).width,
                        w = Math.cos(e.toRadians(a.labelRotation)),
                        M = Math.sin(e.toRadians(a.labelRotation));
                      (a.paddingLeft =
                        0 !== a.labelRotation ? w * k + 3 : k / 2 + 3),
                        (a.paddingRight =
                          0 !== a.labelRotation ? M * (c / 2) + 3 : S / 2 + 3);
                    } else {
                      var C = a.maxWidth - i.width,
                        D = r.mirror;
                      D ? (b = 0) : (b += a.options.ticks.padding),
                        C > b ? (i.width += b) : (i.width = a.maxWidth),
                        (a.paddingTop = c / 2),
                        (a.paddingBottom = c / 2);
                    }
                  }
                  a.margins &&
                    ((a.paddingLeft = Math.max(
                      a.paddingLeft - a.margins.left,
                      0
                    )),
                    (a.paddingTop = Math.max(a.paddingTop - a.margins.top, 0)),
                    (a.paddingRight = Math.max(
                      a.paddingRight - a.margins.right,
                      0
                    )),
                    (a.paddingBottom = Math.max(
                      a.paddingBottom - a.margins.bottom,
                      0
                    ))),
                    (a.width = i.width),
                    (a.height = i.height);
                },
                afterFit: function () {
                  e.callCallback(this.options.afterFit, [this]);
                },
                isHorizontal: function () {
                  return (
                    "top" === this.options.position ||
                    "bottom" === this.options.position
                  );
                },
                isFullWidth: function () {
                  return this.options.fullWidth;
                },
                getRightValue: function (t) {
                  return null === t || "undefined" == typeof t
                    ? NaN
                    : "number" != typeof t || isFinite(t)
                    ? "object" == typeof t
                      ? t instanceof Date || t.isValid
                        ? t
                        : this.getRightValue(this.isHorizontal() ? t.x : t.y)
                      : t
                    : NaN;
                },
                getLabelForIndex: e.noop,
                getPixelForValue: e.noop,
                getValueForPixel: e.noop,
                getPixelForTick: function (t, e) {
                  var a = this;
                  if (a.isHorizontal()) {
                    var i = a.width - (a.paddingLeft + a.paddingRight),
                      n =
                        i /
                        Math.max(
                          a.ticks.length -
                            (a.options.gridLines.offsetGridLines ? 0 : 1),
                          1
                        ),
                      o = n * t + a.paddingLeft;
                    e && (o += n / 2);
                    var r = a.left + Math.round(o);
                    return (r += a.isFullWidth() ? a.margins.left : 0);
                  }
                  var l = a.height - (a.paddingTop + a.paddingBottom);
                  return a.top + t * (l / (a.ticks.length - 1));
                },
                getPixelForDecimal: function (t) {
                  var e = this;
                  if (e.isHorizontal()) {
                    var a = e.width - (e.paddingLeft + e.paddingRight),
                      i = a * t + e.paddingLeft,
                      n = e.left + Math.round(i);
                    return (n += e.isFullWidth() ? e.margins.left : 0);
                  }
                  return e.top + t * e.height;
                },
                getBasePixel: function () {
                  var t = this,
                    e = t.min,
                    a = t.max;
                  return t.getPixelForValue(
                    t.beginAtZero
                      ? 0
                      : 0 > e && 0 > a
                      ? a
                      : e > 0 && a > 0
                      ? e
                      : 0
                  );
                },
                draw: function (a) {
                  var i = this,
                    n = i.options;
                  if (n.display) {
                    var o,
                      r,
                      l = i.ctx,
                      s = t.defaults.global,
                      d = n.ticks,
                      u = n.gridLines,
                      c = n.scaleLabel,
                      h = 0 !== i.labelRotation,
                      f = d.autoSkip,
                      g = i.isHorizontal();
                    d.maxTicksLimit && (r = d.maxTicksLimit);
                    var p = e.getValueOrDefault(
                        d.fontColor,
                        s.defaultFontColor
                      ),
                      m = e.getValueOrDefault(d.fontSize, s.defaultFontSize),
                      b = e.getValueOrDefault(d.fontStyle, s.defaultFontStyle),
                      v = e.getValueOrDefault(
                        d.fontFamily,
                        s.defaultFontFamily
                      ),
                      x = e.fontString(m, b, v),
                      y = u.tickMarkLength,
                      k = e.getValueOrDefault(u.borderDash, s.borderDash),
                      S = e.getValueOrDefault(
                        u.borderDashOffset,
                        s.borderDashOffset
                      ),
                      w = e.getValueOrDefault(c.fontColor, s.defaultFontColor),
                      M = e.getValueOrDefault(c.fontSize, s.defaultFontSize),
                      C = e.getValueOrDefault(c.fontStyle, s.defaultFontStyle),
                      D = e.getValueOrDefault(
                        c.fontFamily,
                        s.defaultFontFamily
                      ),
                      I = e.fontString(M, C, D),
                      A = e.toRadians(i.labelRotation),
                      T = Math.cos(A),
                      P = i.longestLabelWidth * T;
                    l.fillStyle = p;
                    var F = [];
                    if (g) {
                      if (
                        ((o = !1),
                        h && (P /= 2),
                        (P + d.autoSkipPadding) * i.ticks.length >
                          i.width - (i.paddingLeft + i.paddingRight) &&
                          (o =
                            1 +
                            Math.floor(
                              ((P + d.autoSkipPadding) * i.ticks.length) /
                                (i.width - (i.paddingLeft + i.paddingRight))
                            )),
                        r && i.ticks.length > r)
                      )
                        for (; !o || i.ticks.length / (o || 1) > r; )
                          o || (o = 1), (o += 1);
                      f || (o = !1);
                    }
                    var _ = "right" === n.position ? i.left : i.right - y,
                      R = "right" === n.position ? i.left + y : i.right,
                      V = "bottom" === n.position ? i.top : i.bottom - y,
                      L = "bottom" === n.position ? i.top + y : i.bottom;
                    if (
                      (e.each(i.ticks, function (t, r) {
                        if (void 0 !== t && null !== t) {
                          var l = i.ticks.length === r + 1,
                            s =
                              (o > 1 && r % o > 0) ||
                              (r % o === 0 && r + o >= i.ticks.length);
                          if ((!s || l) && void 0 !== t && null !== t) {
                            var c, f;
                            r ===
                            ("undefined" != typeof i.zeroLineIndex
                              ? i.zeroLineIndex
                              : 0)
                              ? ((c = u.zeroLineWidth), (f = u.zeroLineColor))
                              : ((c = e.getValueAtIndexOrDefault(
                                  u.lineWidth,
                                  r
                                )),
                                (f = e.getValueAtIndexOrDefault(u.color, r)));
                            var p,
                              m,
                              b,
                              v,
                              x,
                              w,
                              M,
                              C,
                              D,
                              I,
                              T = "middle",
                              P = "middle";
                            if (g) {
                              h ||
                                (P = "top" === n.position ? "bottom" : "top"),
                                (T = h ? "right" : "center");
                              var O = i.getPixelForTick(r) + e.aliasPixel(c);
                              (D =
                                i.getPixelForTick(r, u.offsetGridLines) +
                                d.labelOffset),
                                (I = h
                                  ? i.top + 12
                                  : "top" === n.position
                                  ? i.bottom - y
                                  : i.top + y),
                                (p = b = x = M = O),
                                (m = V),
                                (v = L),
                                (w = a.top),
                                (C = a.bottom);
                            } else {
                              "left" === n.position
                                ? d.mirror
                                  ? ((D = i.right + d.padding), (T = "left"))
                                  : ((D = i.right - d.padding), (T = "right"))
                                : d.mirror
                                ? ((D = i.left - d.padding), (T = "right"))
                                : ((D = i.left + d.padding), (T = "left"));
                              var B = i.getPixelForTick(r);
                              (B += e.aliasPixel(c)),
                                (I = i.getPixelForTick(r, u.offsetGridLines)),
                                (p = _),
                                (b = R),
                                (x = a.left),
                                (M = a.right),
                                (m = v = w = C = B);
                            }
                            F.push({
                              tx1: p,
                              ty1: m,
                              tx2: b,
                              ty2: v,
                              x1: x,
                              y1: w,
                              x2: M,
                              y2: C,
                              labelX: D,
                              labelY: I,
                              glWidth: c,
                              glColor: f,
                              glBorderDash: k,
                              glBorderDashOffset: S,
                              rotation: -1 * A,
                              label: t,
                              textBaseline: P,
                              textAlign: T,
                            });
                          }
                        }
                      }),
                      e.each(F, function (t) {
                        if (
                          (u.display &&
                            (l.save(),
                            (l.lineWidth = t.glWidth),
                            (l.strokeStyle = t.glColor),
                            l.setLineDash &&
                              (l.setLineDash(t.glBorderDash),
                              (l.lineDashOffset = t.glBorderDashOffset)),
                            l.beginPath(),
                            u.drawTicks &&
                              (l.moveTo(t.tx1, t.ty1), l.lineTo(t.tx2, t.ty2)),
                            u.drawOnChartArea &&
                              (l.moveTo(t.x1, t.y1), l.lineTo(t.x2, t.y2)),
                            l.stroke(),
                            l.restore()),
                          d.display)
                        ) {
                          l.save(),
                            l.translate(t.labelX, t.labelY),
                            l.rotate(t.rotation),
                            (l.font = x),
                            (l.textBaseline = t.textBaseline),
                            (l.textAlign = t.textAlign);
                          var a = t.label;
                          if (e.isArray(a))
                            for (
                              var i = 0, n = -(a.length - 1) * m * 0.75;
                              i < a.length;
                              ++i
                            )
                              l.fillText("" + a[i], 0, n), (n += 1.5 * m);
                          else l.fillText(a, 0, 0);
                          l.restore();
                        }
                      }),
                      c.display)
                    ) {
                      var O,
                        B,
                        W = 0;
                      if (g)
                        (O = i.left + (i.right - i.left) / 2),
                          (B =
                            "bottom" === n.position
                              ? i.bottom - M / 2
                              : i.top + M / 2);
                      else {
                        var z = "left" === n.position;
                        (O = z ? i.left + M / 2 : i.right - M / 2),
                          (B = i.top + (i.bottom - i.top) / 2),
                          (W = z ? -0.5 * Math.PI : 0.5 * Math.PI);
                      }
                      l.save(),
                        l.translate(O, B),
                        l.rotate(W),
                        (l.textAlign = "center"),
                        (l.textBaseline = "middle"),
                        (l.fillStyle = w),
                        (l.font = I),
                        l.fillText(c.labelString, 0, 0),
                        l.restore();
                    }
                    if (u.drawBorder) {
                      (l.lineWidth = e.getValueAtIndexOrDefault(
                        u.lineWidth,
                        0
                      )),
                        (l.strokeStyle = e.getValueAtIndexOrDefault(
                          u.color,
                          0
                        ));
                      var N = i.left,
                        E = i.right,
                        H = i.top,
                        U = i.bottom,
                        j = e.aliasPixel(l.lineWidth);
                      g
                        ? ((H = U = "top" === n.position ? i.bottom : i.top),
                          (H += j),
                          (U += j))
                        : ((N = E = "left" === n.position ? i.right : i.left),
                          (N += j),
                          (E += j)),
                        l.beginPath(),
                        l.moveTo(N, H),
                        l.lineTo(E, U),
                        l.stroke();
                    }
                  }
                },
              }));
          };
        },
        {},
      ],
      33: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            t.scaleService = {
              constructors: {},
              defaults: {},
              registerScaleType: function (t, a, i) {
                (this.constructors[t] = a), (this.defaults[t] = e.clone(i));
              },
              getScaleConstructor: function (t) {
                return this.constructors.hasOwnProperty(t)
                  ? this.constructors[t]
                  : void 0;
              },
              getScaleDefaults: function (a) {
                return this.defaults.hasOwnProperty(a)
                  ? e.scaleMerge(t.defaults.scale, this.defaults[a])
                  : {};
              },
              updateScaleDefaults: function (t, a) {
                var i = this.defaults;
                i.hasOwnProperty(t) && (i[t] = e.extend(i[t], a));
              },
              addScalesToLayout: function (a) {
                e.each(a.scales, function (e) {
                  t.layoutService.addBox(a, e);
                });
              },
            };
          };
        },
        {},
      ],
      34: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            t.Ticks = {
              generators: {
                linear: function (t, a) {
                  var i,
                    n = [];
                  if (t.stepSize && t.stepSize > 0) i = t.stepSize;
                  else {
                    var o = e.niceNum(a.max - a.min, !1);
                    i = e.niceNum(o / (t.maxTicks - 1), !0);
                  }
                  var r = Math.floor(a.min / i) * i,
                    l = Math.ceil(a.max / i) * i;
                  if (t.min && t.max && t.stepSize) {
                    var s = (t.max - t.min) % t.stepSize === 0;
                    s && ((r = t.min), (l = t.max));
                  }
                  var d = (l - r) / i;
                  (d = e.almostEquals(d, Math.round(d), i / 1e3)
                    ? Math.round(d)
                    : Math.ceil(d)),
                    n.push(void 0 !== t.min ? t.min : r);
                  for (var u = 1; d > u; ++u) n.push(r + u * i);
                  return n.push(void 0 !== t.max ? t.max : l), n;
                },
                logarithmic: function (t, a) {
                  for (
                    var i = [],
                      n = e.getValueOrDefault,
                      o = n(t.min, Math.pow(10, Math.floor(e.log10(a.min))));
                    o < a.max;

                  ) {
                    i.push(o);
                    var r, l;
                    0 === o
                      ? ((r = Math.floor(e.log10(a.minNotZero))),
                        (l = Math.round(a.minNotZero / Math.pow(10, r))))
                      : ((r = Math.floor(e.log10(o))),
                        (l = Math.floor(o / Math.pow(10, r)) + 1)),
                      10 === l && ((l = 1), ++r),
                      (o = l * Math.pow(10, r));
                  }
                  var s = n(t.max, o);
                  return i.push(s), i;
                },
              },
              formatters: {
                values: function (t) {
                  return e.isArray(t) ? t : "" + t;
                },
                linear: function (t, a, i) {
                  var n = i.length > 3 ? i[2] - i[1] : i[1] - i[0];
                  Math.abs(n) > 1 &&
                    t !== Math.floor(t) &&
                    (n = t - Math.floor(t));
                  var o = e.log10(Math.abs(n)),
                    r = "";
                  if (0 !== t) {
                    var l = -1 * Math.floor(o);
                    (l = Math.max(Math.min(l, 20), 0)), (r = t.toFixed(l));
                  } else r = "0";
                  return r;
                },
                logarithmic: function (t, a, i) {
                  var n = t / Math.pow(10, Math.floor(e.log10(t)));
                  return 0 === t
                    ? "0"
                    : 1 === n ||
                      2 === n ||
                      5 === n ||
                      0 === a ||
                      a === i.length - 1
                    ? t.toExponential()
                    : "";
                },
              },
            };
          };
        },
        {},
      ],
      35: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers;
            t.defaults.global.title = {
              display: !1,
              position: "top",
              fullWidth: !0,
              fontStyle: "bold",
              padding: 10,
              text: "",
            };
            var a = e.noop;
            (t.Title = t.Element.extend({
              initialize: function (a) {
                var i = this;
                e.extend(i, a),
                  (i.options = e.configMerge(
                    t.defaults.global.title,
                    a.options
                  )),
                  (i.legendHitBoxes = []);
              },
              beforeUpdate: function () {
                var a = this.chart.options;
                a &&
                  a.title &&
                  (this.options = e.configMerge(
                    t.defaults.global.title,
                    a.title
                  ));
              },
              update: function (t, e, a) {
                var i = this;
                return (
                  i.beforeUpdate(),
                  (i.maxWidth = t),
                  (i.maxHeight = e),
                  (i.margins = a),
                  i.beforeSetDimensions(),
                  i.setDimensions(),
                  i.afterSetDimensions(),
                  i.beforeBuildLabels(),
                  i.buildLabels(),
                  i.afterBuildLabels(),
                  i.beforeFit(),
                  i.fit(),
                  i.afterFit(),
                  i.afterUpdate(),
                  i.minSize
                );
              },
              afterUpdate: a,
              beforeSetDimensions: a,
              setDimensions: function () {
                var t = this;
                t.isHorizontal()
                  ? ((t.width = t.maxWidth), (t.left = 0), (t.right = t.width))
                  : ((t.height = t.maxHeight),
                    (t.top = 0),
                    (t.bottom = t.height)),
                  (t.paddingLeft = 0),
                  (t.paddingTop = 0),
                  (t.paddingRight = 0),
                  (t.paddingBottom = 0),
                  (t.minSize = { width: 0, height: 0 });
              },
              afterSetDimensions: a,
              beforeBuildLabels: a,
              buildLabels: a,
              afterBuildLabels: a,
              beforeFit: a,
              fit: function () {
                var a = this,
                  i = e.getValueOrDefault,
                  n = a.options,
                  o = t.defaults.global,
                  r = n.display,
                  l = i(n.fontSize, o.defaultFontSize),
                  s = a.minSize;
                a.isHorizontal()
                  ? ((s.width = a.maxWidth),
                    (s.height = r ? l + 2 * n.padding : 0))
                  : ((s.width = r ? l + 2 * n.padding : 0),
                    (s.height = a.maxHeight)),
                  (a.width = s.width),
                  (a.height = s.height);
              },
              afterFit: a,
              isHorizontal: function () {
                var t = this.options.position;
                return "top" === t || "bottom" === t;
              },
              draw: function () {
                var a = this,
                  i = a.ctx,
                  n = e.getValueOrDefault,
                  o = a.options,
                  r = t.defaults.global;
                if (o.display) {
                  var l,
                    s,
                    d,
                    u = n(o.fontSize, r.defaultFontSize),
                    c = n(o.fontStyle, r.defaultFontStyle),
                    h = n(o.fontFamily, r.defaultFontFamily),
                    f = e.fontString(u, c, h),
                    g = 0,
                    p = a.top,
                    m = a.left,
                    b = a.bottom,
                    v = a.right;
                  (i.fillStyle = n(o.fontColor, r.defaultFontColor)),
                    (i.font = f),
                    a.isHorizontal()
                      ? ((l = m + (v - m) / 2),
                        (s = p + (b - p) / 2),
                        (d = v - m))
                      : ((l = "left" === o.position ? m + u / 2 : v - u / 2),
                        (s = p + (b - p) / 2),
                        (d = b - p),
                        (g = Math.PI * ("left" === o.position ? -0.5 : 0.5))),
                    i.save(),
                    i.translate(l, s),
                    i.rotate(g),
                    (i.textAlign = "center"),
                    (i.textBaseline = "middle"),
                    i.fillText(o.text, 0, 0, d),
                    i.restore();
                }
              },
            })),
              t.plugins.register({
                beforeInit: function (e) {
                  var a = e.options,
                    i = a.title;
                  i &&
                    ((e.titleBlock = new t.Title({
                      ctx: e.chart.ctx,
                      options: i,
                      chart: e,
                    })),
                    t.layoutService.addBox(e, e.titleBlock));
                },
              });
          };
        },
        {},
      ],
      36: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t, e) {
              var a = s.color(t);
              return a.alpha(e * a.alpha()).rgbaString();
            }
            function a(t, e) {
              return (
                e &&
                  (s.isArray(e) ? Array.prototype.push.apply(t, e) : t.push(e)),
                t
              );
            }
            function i(t) {
              var e = t._xScale,
                a = t._yScale || t._scale,
                i = t._index,
                n = t._datasetIndex;
              return {
                xLabel: e ? e.getLabelForIndex(i, n) : "",
                yLabel: a ? a.getLabelForIndex(i, n) : "",
                index: i,
                datasetIndex: n,
                x: t._model.x,
                y: t._model.y,
              };
            }
            function n(e) {
              var a = t.defaults.global,
                i = s.getValueOrDefault;
              return {
                xPadding: e.xPadding,
                yPadding: e.yPadding,
                xAlign: e.xAlign,
                yAlign: e.yAlign,
                bodyFontColor: e.bodyFontColor,
                _bodyFontFamily: i(e.bodyFontFamily, a.defaultFontFamily),
                _bodyFontStyle: i(e.bodyFontStyle, a.defaultFontStyle),
                _bodyAlign: e.bodyAlign,
                bodyFontSize: i(e.bodyFontSize, a.defaultFontSize),
                bodySpacing: e.bodySpacing,
                titleFontColor: e.titleFontColor,
                _titleFontFamily: i(e.titleFontFamily, a.defaultFontFamily),
                _titleFontStyle: i(e.titleFontStyle, a.defaultFontStyle),
                titleFontSize: i(e.titleFontSize, a.defaultFontSize),
                _titleAlign: e.titleAlign,
                titleSpacing: e.titleSpacing,
                titleMarginBottom: e.titleMarginBottom,
                footerFontColor: e.footerFontColor,
                _footerFontFamily: i(e.footerFontFamily, a.defaultFontFamily),
                _footerFontStyle: i(e.footerFontStyle, a.defaultFontStyle),
                footerFontSize: i(e.footerFontSize, a.defaultFontSize),
                _footerAlign: e.footerAlign,
                footerSpacing: e.footerSpacing,
                footerMarginTop: e.footerMarginTop,
                caretSize: e.caretSize,
                cornerRadius: e.cornerRadius,
                backgroundColor: e.backgroundColor,
                opacity: 0,
                legendColorBackground: e.multiKeyBackground,
                displayColors: e.displayColors,
              };
            }
            function o(t, e) {
              var a = t._chart.ctx,
                i = 2 * e.yPadding,
                n = 0,
                o = e.body,
                r = o.reduce(function (t, e) {
                  return t + e.before.length + e.lines.length + e.after.length;
                }, 0);
              r += e.beforeBody.length + e.afterBody.length;
              var l = e.title.length,
                d = e.footer.length,
                u = e.titleFontSize,
                c = e.bodyFontSize,
                h = e.footerFontSize;
              (i += l * u),
                (i += l ? (l - 1) * e.titleSpacing : 0),
                (i += l ? e.titleMarginBottom : 0),
                (i += r * c),
                (i += r ? (r - 1) * e.bodySpacing : 0),
                (i += d ? e.footerMarginTop : 0),
                (i += d * h),
                (i += d ? (d - 1) * e.footerSpacing : 0);
              var f = 0,
                g = function (t) {
                  n = Math.max(n, a.measureText(t).width + f);
                };
              return (
                (a.font = s.fontString(
                  u,
                  e._titleFontStyle,
                  e._titleFontFamily
                )),
                s.each(e.title, g),
                (a.font = s.fontString(c, e._bodyFontStyle, e._bodyFontFamily)),
                s.each(e.beforeBody.concat(e.afterBody), g),
                (f = e.displayColors ? c + 2 : 0),
                s.each(o, function (t) {
                  s.each(t.before, g), s.each(t.lines, g), s.each(t.after, g);
                }),
                (f = 0),
                (a.font = s.fontString(
                  h,
                  e._footerFontStyle,
                  e._footerFontFamily
                )),
                s.each(e.footer, g),
                (n += 2 * e.xPadding),
                { width: n, height: i }
              );
            }
            function r(t, e) {
              var a = t._model,
                i = t._chart,
                n = t._chartInstance.chartArea,
                o = "center",
                r = "center";
              a.y < e.height
                ? (r = "top")
                : a.y > i.height - e.height && (r = "bottom");
              var l,
                s,
                d,
                u,
                c,
                h = (n.left + n.right) / 2,
                f = (n.top + n.bottom) / 2;
              "center" === r
                ? ((l = function (t) {
                    return h >= t;
                  }),
                  (s = function (t) {
                    return t > h;
                  }))
                : ((l = function (t) {
                    return t <= e.width / 2;
                  }),
                  (s = function (t) {
                    return t >= i.width - e.width / 2;
                  })),
                (d = function (t) {
                  return t + e.width > i.width;
                }),
                (u = function (t) {
                  return t - e.width < 0;
                }),
                (c = function (t) {
                  return f >= t ? "top" : "bottom";
                }),
                l(a.x)
                  ? ((o = "left"), d(a.x) && ((o = "center"), (r = c(a.y))))
                  : s(a.x) &&
                    ((o = "right"), u(a.x) && ((o = "center"), (r = c(a.y))));
              var g = t._options;
              return {
                xAlign: g.xAlign ? g.xAlign : o,
                yAlign: g.yAlign ? g.yAlign : r,
              };
            }
            function l(t, e, a) {
              var i = t.x,
                n = t.y,
                o = t.caretSize,
                r = t.caretPadding,
                l = t.cornerRadius,
                s = a.xAlign,
                d = a.yAlign,
                u = o + r,
                c = l + r;
              return (
                "right" === s
                  ? (i -= e.width)
                  : "center" === s && (i -= e.width / 2),
                "top" === d
                  ? (n += u)
                  : (n -= "bottom" === d ? e.height + u : e.height / 2),
                "center" === d
                  ? "left" === s
                    ? (i += u)
                    : "right" === s && (i -= u)
                  : "left" === s
                  ? (i -= c)
                  : "right" === s && (i += c),
                { x: i, y: n }
              );
            }
            var s = t.helpers;
            (t.defaults.global.tooltips = {
              enabled: !0,
              custom: null,
              mode: "nearest",
              position: "average",
              intersect: !0,
              backgroundColor: "rgba(0,0,0,0.8)",
              titleFontStyle: "bold",
              titleSpacing: 2,
              titleMarginBottom: 6,
              titleFontColor: "#fff",
              titleAlign: "left",
              bodySpacing: 2,
              bodyFontColor: "#fff",
              bodyAlign: "left",
              footerFontStyle: "bold",
              footerSpacing: 2,
              footerMarginTop: 6,
              footerFontColor: "#fff",
              footerAlign: "left",
              yPadding: 6,
              xPadding: 6,
              caretSize: 5,
              cornerRadius: 6,
              multiKeyBackground: "#fff",
              displayColors: !0,
              callbacks: {
                beforeTitle: s.noop,
                title: function (t, e) {
                  var a = "",
                    i = e.labels,
                    n = i ? i.length : 0;
                  if (t.length > 0) {
                    var o = t[0];
                    o.xLabel
                      ? (a = o.xLabel)
                      : n > 0 && o.index < n && (a = i[o.index]);
                  }
                  return a;
                },
                afterTitle: s.noop,
                beforeBody: s.noop,
                beforeLabel: s.noop,
                label: function (t, e) {
                  var a = e.datasets[t.datasetIndex].label || "";
                  return a + ": " + t.yLabel;
                },
                labelColor: function (t, e) {
                  var a = e.getDatasetMeta(t.datasetIndex),
                    i = a.data[t.index],
                    n = i._view;
                  return {
                    borderColor: n.borderColor,
                    backgroundColor: n.backgroundColor,
                  };
                },
                afterLabel: s.noop,
                afterBody: s.noop,
                beforeFooter: s.noop,
                footer: s.noop,
                afterFooter: s.noop,
              },
            }),
              (t.Tooltip = t.Element.extend({
                initialize: function () {
                  this._model = n(this._options);
                },
                getTitle: function () {
                  var t = this,
                    e = t._options,
                    i = e.callbacks,
                    n = i.beforeTitle.apply(t, arguments),
                    o = i.title.apply(t, arguments),
                    r = i.afterTitle.apply(t, arguments),
                    l = [];
                  return (l = a(l, n)), (l = a(l, o)), (l = a(l, r));
                },
                getBeforeBody: function () {
                  var t = this._options.callbacks.beforeBody.apply(
                    this,
                    arguments
                  );
                  return s.isArray(t) ? t : void 0 !== t ? [t] : [];
                },
                getBody: function (t, e) {
                  var i = this,
                    n = i._options.callbacks,
                    o = [];
                  return (
                    s.each(t, function (t) {
                      var r = { before: [], lines: [], after: [] };
                      a(r.before, n.beforeLabel.call(i, t, e)),
                        a(r.lines, n.label.call(i, t, e)),
                        a(r.after, n.afterLabel.call(i, t, e)),
                        o.push(r);
                    }),
                    o
                  );
                },
                getAfterBody: function () {
                  var t = this._options.callbacks.afterBody.apply(
                    this,
                    arguments
                  );
                  return s.isArray(t) ? t : void 0 !== t ? [t] : [];
                },
                getFooter: function () {
                  var t = this,
                    e = t._options.callbacks,
                    i = e.beforeFooter.apply(t, arguments),
                    n = e.footer.apply(t, arguments),
                    o = e.afterFooter.apply(t, arguments),
                    r = [];
                  return (r = a(r, i)), (r = a(r, n)), (r = a(r, o));
                },
                update: function (e) {
                  var a,
                    d,
                    u = this,
                    c = u._options,
                    h = u._model,
                    f = (u._model = n(c)),
                    g = u._active,
                    p = u._data,
                    m = u._chartInstance,
                    b = { xAlign: h.xAlign, yAlign: h.yAlign },
                    v = { x: h.x, y: h.y },
                    x = { width: h.width, height: h.height },
                    y = { x: h.caretX, y: h.caretY };
                  if (g.length) {
                    f.opacity = 1;
                    var k = [];
                    y = t.Tooltip.positioners[c.position](g, u._eventPosition);
                    var S = [];
                    for (a = 0, d = g.length; d > a; ++a) S.push(i(g[a]));
                    c.filter &&
                      (S = S.filter(function (t) {
                        return c.filter(t, p);
                      })),
                      c.itemSort &&
                        (S = S.sort(function (t, e) {
                          return c.itemSort(t, e, p);
                        })),
                      s.each(S, function (t) {
                        k.push(c.callbacks.labelColor.call(u, t, m));
                      }),
                      (f.title = u.getTitle(S, p)),
                      (f.beforeBody = u.getBeforeBody(S, p)),
                      (f.body = u.getBody(S, p)),
                      (f.afterBody = u.getAfterBody(S, p)),
                      (f.footer = u.getFooter(S, p)),
                      (f.x = Math.round(y.x)),
                      (f.y = Math.round(y.y)),
                      (f.caretPadding = s.getValueOrDefault(y.padding, 2)),
                      (f.labelColors = k),
                      (f.dataPoints = S),
                      (x = o(this, f)),
                      (b = r(this, x)),
                      (v = l(f, x, b));
                  } else f.opacity = 0;
                  return (
                    (f.xAlign = b.xAlign),
                    (f.yAlign = b.yAlign),
                    (f.x = v.x),
                    (f.y = v.y),
                    (f.width = x.width),
                    (f.height = x.height),
                    (f.caretX = y.x),
                    (f.caretY = y.y),
                    (u._model = f),
                    e && c.custom && c.custom.call(u, f),
                    u
                  );
                },
                drawCaret: function (t, a, i) {
                  var n,
                    o,
                    r,
                    l,
                    s,
                    d,
                    u = this._view,
                    c = this._chart.ctx,
                    h = u.caretSize,
                    f = u.cornerRadius,
                    g = u.xAlign,
                    p = u.yAlign,
                    m = t.x,
                    b = t.y,
                    v = a.width,
                    x = a.height;
                  "center" === p
                    ? ("left" === g
                        ? ((n = m), (o = n - h), (r = n))
                        : ((n = m + v), (o = n + h), (r = n)),
                      (s = b + x / 2),
                      (l = s - h),
                      (d = s + h))
                    : ("left" === g
                        ? ((n = m + f), (o = n + h), (r = o + h))
                        : "right" === g
                        ? ((n = m + v - f), (o = n - h), (r = o - h))
                        : ((o = m + v / 2), (n = o - h), (r = o + h)),
                      "top" === p
                        ? ((l = b), (s = l - h), (d = l))
                        : ((l = b + x), (s = l + h), (d = l))),
                    (c.fillStyle = e(u.backgroundColor, i)),
                    c.beginPath(),
                    c.moveTo(n, l),
                    c.lineTo(o, s),
                    c.lineTo(r, d),
                    c.closePath(),
                    c.fill();
                },
                drawTitle: function (t, a, i, n) {
                  var o = a.title;
                  if (o.length) {
                    (i.textAlign = a._titleAlign), (i.textBaseline = "top");
                    var r = a.titleFontSize,
                      l = a.titleSpacing;
                    (i.fillStyle = e(a.titleFontColor, n)),
                      (i.font = s.fontString(
                        r,
                        a._titleFontStyle,
                        a._titleFontFamily
                      ));
                    var d, u;
                    for (d = 0, u = o.length; u > d; ++d)
                      i.fillText(o[d], t.x, t.y),
                        (t.y += r + l),
                        d + 1 === o.length && (t.y += a.titleMarginBottom - l);
                  }
                },
                drawBody: function (t, a, i, n) {
                  var o = a.bodyFontSize,
                    r = a.bodySpacing,
                    l = a.body;
                  (i.textAlign = a._bodyAlign), (i.textBaseline = "top");
                  var d = e(a.bodyFontColor, n);
                  (i.fillStyle = d),
                    (i.font = s.fontString(
                      o,
                      a._bodyFontStyle,
                      a._bodyFontFamily
                    ));
                  var u = 0,
                    c = function (e) {
                      i.fillText(e, t.x + u, t.y), (t.y += o + r);
                    };
                  s.each(a.beforeBody, c);
                  var h = a.displayColors;
                  (u = h ? o + 2 : 0),
                    s.each(l, function (r, l) {
                      s.each(r.before, c),
                        s.each(r.lines, function (r) {
                          h &&
                            ((i.fillStyle = e(a.legendColorBackground, n)),
                            i.fillRect(t.x, t.y, o, o),
                            (i.strokeStyle = e(
                              a.labelColors[l].borderColor,
                              n
                            )),
                            i.strokeRect(t.x, t.y, o, o),
                            (i.fillStyle = e(
                              a.labelColors[l].backgroundColor,
                              n
                            )),
                            i.fillRect(t.x + 1, t.y + 1, o - 2, o - 2),
                            (i.fillStyle = d)),
                            c(r);
                        }),
                        s.each(r.after, c);
                    }),
                    (u = 0),
                    s.each(a.afterBody, c),
                    (t.y -= r);
                },
                drawFooter: function (t, a, i, n) {
                  var o = a.footer;
                  o.length &&
                    ((t.y += a.footerMarginTop),
                    (i.textAlign = a._footerAlign),
                    (i.textBaseline = "top"),
                    (i.fillStyle = e(a.footerFontColor, n)),
                    (i.font = s.fontString(
                      a.footerFontSize,
                      a._footerFontStyle,
                      a._footerFontFamily
                    )),
                    s.each(o, function (e) {
                      i.fillText(e, t.x, t.y),
                        (t.y += a.footerFontSize + a.footerSpacing);
                    }));
                },
                drawBackground: function (t, a, i, n, o) {
                  (i.fillStyle = e(a.backgroundColor, o)),
                    s.drawRoundedRectangle(
                      i,
                      t.x,
                      t.y,
                      n.width,
                      n.height,
                      a.cornerRadius
                    ),
                    i.fill();
                },
                draw: function () {
                  var t = this._chart.ctx,
                    e = this._view;
                  if (0 !== e.opacity) {
                    var a = { width: e.width, height: e.height },
                      i = { x: e.x, y: e.y },
                      n = Math.abs(e.opacity < 0.001) ? 0 : e.opacity;
                    this._options.enabled &&
                      (this.drawBackground(i, e, t, a, n),
                      this.drawCaret(i, a, n),
                      (i.x += e.xPadding),
                      (i.y += e.yPadding),
                      this.drawTitle(i, e, t, n),
                      this.drawBody(i, e, t, n),
                      this.drawFooter(i, e, t, n));
                  }
                },
                handleEvent: function (t) {
                  var e = this,
                    a = e._options,
                    i = !1;
                  if (
                    ((e._lastActive = e._lastActive || []),
                    "mouseout" === t.type
                      ? (e._active = [])
                      : (e._active = e._chartInstance.getElementsAtEventForMode(
                          t,
                          a.mode,
                          a
                        )),
                    (i = !s.arrayEquals(e._active, e._lastActive)),
                    (e._lastActive = e._active),
                    a.enabled || a.custom)
                  ) {
                    e._eventPosition = s.getRelativePosition(t, e._chart);
                    var n = e._model;
                    e.update(!0),
                      e.pivot(),
                      (i |= n.x !== e._model.x || n.y !== e._model.y);
                  }
                  return i;
                },
              })),
              (t.Tooltip.positioners = {
                average: function (t) {
                  if (!t.length) return !1;
                  var e,
                    a,
                    i = 0,
                    n = 0,
                    o = 0;
                  for (e = 0, a = t.length; a > e; ++e) {
                    var r = t[e];
                    if (r && r.hasValue()) {
                      var l = r.tooltipPosition();
                      (i += l.x), (n += l.y), ++o;
                    }
                  }
                  return { x: Math.round(i / o), y: Math.round(n / o) };
                },
                nearest: function (t, e) {
                  var a,
                    i,
                    n,
                    o = e.x,
                    r = e.y,
                    l = Number.POSITIVE_INFINITY;
                  for (i = 0, n = t.length; n > i; ++i) {
                    var d = t[i];
                    if (d && d.hasValue()) {
                      var u = d.getCenterPoint(),
                        c = s.distanceBetweenPoints(e, u);
                      l > c && ((l = c), (a = d));
                    }
                  }
                  if (a) {
                    var h = a.tooltipPosition();
                    (o = h.x), (r = h.y);
                  }
                  return { x: o, y: r };
                },
              });
          };
        },
        {},
      ],
      37: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = t.defaults.global;
            (a.elements.arc = {
              backgroundColor: a.defaultColor,
              borderColor: "#fff",
              borderWidth: 2,
            }),
              (t.elements.Arc = t.Element.extend({
                inLabelRange: function (t) {
                  var e = this._view;
                  return e
                    ? Math.pow(t - e.x, 2) <
                        Math.pow(e.radius + e.hoverRadius, 2)
                    : !1;
                },
                inRange: function (t, a) {
                  var i = this._view;
                  if (i) {
                    for (
                      var n = e.getAngleFromPoint(i, { x: t, y: a }),
                        o = n.angle,
                        r = n.distance,
                        l = i.startAngle,
                        s = i.endAngle;
                      l > s;

                    )
                      s += 2 * Math.PI;
                    for (; o > s; ) o -= 2 * Math.PI;
                    for (; l > o; ) o += 2 * Math.PI;
                    var d = o >= l && s >= o,
                      u = r >= i.innerRadius && r <= i.outerRadius;
                    return d && u;
                  }
                  return !1;
                },
                getCenterPoint: function () {
                  var t = this._view,
                    e = (t.startAngle + t.endAngle) / 2,
                    a = (t.innerRadius + t.outerRadius) / 2;
                  return { x: t.x + Math.cos(e) * a, y: t.y + Math.sin(e) * a };
                },
                getArea: function () {
                  var t = this._view;
                  return (
                    Math.PI *
                    ((t.endAngle - t.startAngle) / (2 * Math.PI)) *
                    (Math.pow(t.outerRadius, 2) - Math.pow(t.innerRadius, 2))
                  );
                },
                tooltipPosition: function () {
                  var t = this._view,
                    e = t.startAngle + (t.endAngle - t.startAngle) / 2,
                    a = (t.outerRadius - t.innerRadius) / 2 + t.innerRadius;
                  return { x: t.x + Math.cos(e) * a, y: t.y + Math.sin(e) * a };
                },
                draw: function () {
                  var t = this._chart.ctx,
                    e = this._view,
                    a = e.startAngle,
                    i = e.endAngle;
                  t.beginPath(),
                    t.arc(e.x, e.y, e.outerRadius, a, i),
                    t.arc(e.x, e.y, e.innerRadius, i, a, !0),
                    t.closePath(),
                    (t.strokeStyle = e.borderColor),
                    (t.lineWidth = e.borderWidth),
                    (t.fillStyle = e.backgroundColor),
                    t.fill(),
                    (t.lineJoin = "bevel"),
                    e.borderWidth && t.stroke();
                },
              }));
          };
        },
        {},
      ],
      38: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = t.defaults.global;
            (t.defaults.global.elements.line = {
              tension: 0.4,
              backgroundColor: a.defaultColor,
              borderWidth: 3,
              borderColor: a.defaultColor,
              borderCapStyle: "butt",
              borderDash: [],
              borderDashOffset: 0,
              borderJoinStyle: "miter",
              capBezierPoints: !0,
              fill: !0,
            }),
              (t.elements.Line = t.Element.extend({
                draw: function () {
                  function t(t, e) {
                    var a = e._view;
                    e._view.steppedLine === !0
                      ? (s.lineTo(a.x, t._view.y), s.lineTo(a.x, a.y))
                      : 0 === e._view.tension
                      ? s.lineTo(a.x, a.y)
                      : s.bezierCurveTo(
                          t._view.controlPointNextX,
                          t._view.controlPointNextY,
                          a.controlPointPreviousX,
                          a.controlPointPreviousY,
                          a.x,
                          a.y
                        );
                  }
                  var i = this,
                    n = i._view,
                    o = n.spanGaps,
                    r = n.scaleZero,
                    l = i._loop;
                  l ||
                    ("top" === n.fill
                      ? (r = n.scaleTop)
                      : "bottom" === n.fill && (r = n.scaleBottom));
                  var s = i._chart.ctx;
                  s.save();
                  var d = i._children.slice(),
                    u = -1;
                  l && d.length && d.push(d[0]);
                  var c, h, f, g;
                  if (d.length && n.fill) {
                    for (s.beginPath(), c = 0; c < d.length; ++c)
                      (h = d[c]),
                        (f = e.previousItem(d, c)),
                        (g = h._view),
                        0 === c
                          ? (l ? s.moveTo(r.x, r.y) : s.moveTo(g.x, r),
                            g.skip || ((u = c), s.lineTo(g.x, g.y)))
                          : ((f = -1 === u ? f : d[u]),
                            g.skip
                              ? o ||
                                u !== c - 1 ||
                                (l
                                  ? s.lineTo(r.x, r.y)
                                  : s.lineTo(f._view.x, r))
                              : (u !== c - 1
                                  ? o && -1 !== u
                                    ? t(f, h)
                                    : l
                                    ? s.lineTo(g.x, g.y)
                                    : (s.lineTo(g.x, r), s.lineTo(g.x, g.y))
                                  : t(f, h),
                                (u = c)));
                    l || -1 === u || s.lineTo(d[u]._view.x, r),
                      (s.fillStyle = n.backgroundColor || a.defaultColor),
                      s.closePath(),
                      s.fill();
                  }
                  var p = a.elements.line;
                  for (
                    s.lineCap = n.borderCapStyle || p.borderCapStyle,
                      s.setLineDash &&
                        s.setLineDash(n.borderDash || p.borderDash),
                      s.lineDashOffset =
                        n.borderDashOffset || p.borderDashOffset,
                      s.lineJoin = n.borderJoinStyle || p.borderJoinStyle,
                      s.lineWidth = n.borderWidth || p.borderWidth,
                      s.strokeStyle = n.borderColor || a.defaultColor,
                      s.beginPath(),
                      u = -1,
                      c = 0;
                    c < d.length;
                    ++c
                  )
                    (h = d[c]),
                      (f = e.previousItem(d, c)),
                      (g = h._view),
                      0 === c
                        ? g.skip || (s.moveTo(g.x, g.y), (u = c))
                        : ((f = -1 === u ? f : d[u]),
                          g.skip ||
                            ((u !== c - 1 && !o) || -1 === u
                              ? s.moveTo(g.x, g.y)
                              : t(f, h),
                            (u = c)));
                  s.stroke(), s.restore();
                },
              }));
          };
        },
        {},
      ],
      39: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t) {
              var e = this._view;
              return e
                ? Math.pow(t - e.x, 2) < Math.pow(e.radius + e.hitRadius, 2)
                : !1;
            }
            function a(t) {
              var e = this._view;
              return e
                ? Math.pow(t - e.y, 2) < Math.pow(e.radius + e.hitRadius, 2)
                : !1;
            }
            var i = t.helpers,
              n = t.defaults.global,
              o = n.defaultColor;
            (n.elements.point = {
              radius: 3,
              pointStyle: "circle",
              backgroundColor: o,
              borderWidth: 1,
              borderColor: o,
              hitRadius: 1,
              hoverRadius: 4,
              hoverBorderWidth: 1,
            }),
              (t.elements.Point = t.Element.extend({
                inRange: function (t, e) {
                  var a = this._view;
                  return a
                    ? Math.pow(t - a.x, 2) + Math.pow(e - a.y, 2) <
                        Math.pow(a.hitRadius + a.radius, 2)
                    : !1;
                },
                inLabelRange: e,
                inXRange: e,
                inYRange: a,
                getCenterPoint: function () {
                  var t = this._view;
                  return { x: t.x, y: t.y };
                },
                getArea: function () {
                  return Math.PI * Math.pow(this._view.radius, 2);
                },
                tooltipPosition: function () {
                  var t = this._view;
                  return { x: t.x, y: t.y, padding: t.radius + t.borderWidth };
                },
                draw: function () {
                  var e = this._view,
                    a = this._chart.ctx,
                    r = e.pointStyle,
                    l = e.radius,
                    s = e.x,
                    d = e.y;
                  e.skip ||
                    ((a.strokeStyle = e.borderColor || o),
                    (a.lineWidth = i.getValueOrDefault(
                      e.borderWidth,
                      n.elements.point.borderWidth
                    )),
                    (a.fillStyle = e.backgroundColor || o),
                    t.canvasHelpers.drawPoint(a, r, l, s, d));
                },
              }));
          };
        },
        {},
      ],
      40: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            function e(t) {
              return void 0 !== t._view.width;
            }
            function a(t) {
              var a,
                i,
                n,
                o,
                r = t._view;
              if (e(t)) {
                var l = r.width / 2;
                (a = r.x - l),
                  (i = r.x + l),
                  (n = Math.min(r.y, r.base)),
                  (o = Math.max(r.y, r.base));
              } else {
                var s = r.height / 2;
                (a = Math.min(r.x, r.base)),
                  (i = Math.max(r.x, r.base)),
                  (n = r.y - s),
                  (o = r.y + s);
              }
              return { left: a, top: n, right: i, bottom: o };
            }
            var i = t.defaults.global;
            (i.elements.rectangle = {
              backgroundColor: i.defaultColor,
              borderWidth: 0,
              borderColor: i.defaultColor,
              borderSkipped: "bottom",
            }),
              (t.elements.Rectangle = t.Element.extend({
                draw: function () {
                  function t(t) {
                    return s[(u + t) % 4];
                  }
                  var e = this._chart.ctx,
                    a = this._view,
                    i = a.width / 2,
                    n = a.x - i,
                    o = a.x + i,
                    r = a.base - (a.base - a.y),
                    l = a.borderWidth / 2;
                  a.borderWidth && ((n += l), (o -= l), (r += l)),
                    e.beginPath(),
                    (e.fillStyle = a.backgroundColor),
                    (e.strokeStyle = a.borderColor),
                    (e.lineWidth = a.borderWidth);
                  var s = [
                      [n, a.base],
                      [n, r],
                      [o, r],
                      [o, a.base],
                    ],
                    d = ["bottom", "left", "top", "right"],
                    u = d.indexOf(a.borderSkipped, 0);
                  -1 === u && (u = 0);
                  var c = t(0);
                  e.moveTo(c[0], c[1]);
                  for (var h = 1; 4 > h; h++) (c = t(h)), e.lineTo(c[0], c[1]);
                  e.fill(), a.borderWidth && e.stroke();
                },
                height: function () {
                  var t = this._view;
                  return t.base - t.y;
                },
                inRange: function (t, e) {
                  var i = !1;
                  if (this._view) {
                    var n = a(this);
                    i =
                      t >= n.left &&
                      t <= n.right &&
                      e >= n.top &&
                      e <= n.bottom;
                  }
                  return i;
                },
                inLabelRange: function (t, i) {
                  var n = this;
                  if (!n._view) return !1;
                  var o = !1,
                    r = a(n);
                  return (o = e(n)
                    ? t >= r.left && t <= r.right
                    : i >= r.top && i <= r.bottom);
                },
                inXRange: function (t) {
                  var e = a(this);
                  return t >= e.left && t <= e.right;
                },
                inYRange: function (t) {
                  var e = a(this);
                  return t >= e.top && t <= e.bottom;
                },
                getCenterPoint: function () {
                  var t,
                    a,
                    i = this._view;
                  return (
                    e(this)
                      ? ((t = i.x), (a = (i.y + i.base) / 2))
                      : ((t = (i.x + i.base) / 2), (a = i.y)),
                    { x: t, y: a }
                  );
                },
                getArea: function () {
                  var t = this._view;
                  return t.width * Math.abs(t.y - t.base);
                },
                tooltipPosition: function () {
                  var t = this._view;
                  return { x: t.x, y: t.y };
                },
              }));
          };
        },
        {},
      ],
      41: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = { position: "bottom" },
              i = t.Scale.extend({
                getLabels: function () {
                  var t = this.chart.data;
                  return (
                    (this.isHorizontal() ? t.xLabels : t.yLabels) || t.labels
                  );
                },
                determineDataLimits: function () {
                  var t = this,
                    a = t.getLabels();
                  (t.minIndex = 0), (t.maxIndex = a.length - 1);
                  var i;
                  void 0 !== t.options.ticks.min &&
                    ((i = e.indexOf(a, t.options.ticks.min)),
                    (t.minIndex = -1 !== i ? i : t.minIndex)),
                    void 0 !== t.options.ticks.max &&
                      ((i = e.indexOf(a, t.options.ticks.max)),
                      (t.maxIndex = -1 !== i ? i : t.maxIndex)),
                    (t.min = a[t.minIndex]),
                    (t.max = a[t.maxIndex]);
                },
                buildTicks: function () {
                  var t = this,
                    e = t.getLabels();
                  t.ticks =
                    0 === t.minIndex && t.maxIndex === e.length - 1
                      ? e
                      : e.slice(t.minIndex, t.maxIndex + 1);
                },
                getLabelForIndex: function (t, e) {
                  var a = this,
                    i = a.chart.data,
                    n = a.isHorizontal();
                  return (i.xLabels && n) || (i.yLabels && !n)
                    ? a.getRightValue(i.datasets[e].data[t])
                    : a.ticks[t];
                },
                getPixelForValue: function (t, e, a, i) {
                  var n = this,
                    o = Math.max(
                      n.maxIndex +
                        1 -
                        n.minIndex -
                        (n.options.gridLines.offsetGridLines ? 0 : 1),
                      1
                    );
                  if (void 0 !== t && isNaN(e)) {
                    var r = n.getLabels(),
                      l = r.indexOf(t);
                    e = -1 !== l ? l : e;
                  }
                  if (n.isHorizontal()) {
                    var s = n.width - (n.paddingLeft + n.paddingRight),
                      d = s / o,
                      u = d * (e - n.minIndex) + n.paddingLeft;
                    return (
                      ((n.options.gridLines.offsetGridLines && i) ||
                        (n.maxIndex === n.minIndex && i)) &&
                        (u += d / 2),
                      n.left + Math.round(u)
                    );
                  }
                  var c = n.height - (n.paddingTop + n.paddingBottom),
                    h = c / o,
                    f = h * (e - n.minIndex) + n.paddingTop;
                  return (
                    n.options.gridLines.offsetGridLines && i && (f += h / 2),
                    n.top + Math.round(f)
                  );
                },
                getPixelForTick: function (t, e) {
                  return this.getPixelForValue(
                    this.ticks[t],
                    t + this.minIndex,
                    null,
                    e
                  );
                },
                getValueForPixel: function (t) {
                  var e,
                    a = this,
                    i = Math.max(
                      a.ticks.length -
                        (a.options.gridLines.offsetGridLines ? 0 : 1),
                      1
                    ),
                    n = a.isHorizontal(),
                    o = n
                      ? a.width - (a.paddingLeft + a.paddingRight)
                      : a.height - (a.paddingTop + a.paddingBottom),
                    r = o / i;
                  return (
                    (t -= n ? a.left : a.top),
                    a.options.gridLines.offsetGridLines && (t -= r / 2),
                    (t -= n ? a.paddingLeft : a.paddingTop),
                    (e = 0 >= t ? 0 : Math.round(t / r))
                  );
                },
                getBasePixel: function () {
                  return this.bottom;
                },
              });
            t.scaleService.registerScaleType("category", i, a);
          };
        },
        {},
      ],
      42: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = {
                position: "left",
                ticks: { callback: t.Ticks.formatters.linear },
              },
              i = t.LinearScaleBase.extend({
                determineDataLimits: function () {
                  function t(t) {
                    return l ? t.xAxisID === a.id : t.yAxisID === a.id;
                  }
                  var a = this,
                    i = a.options,
                    n = a.chart,
                    o = n.data,
                    r = o.datasets,
                    l = a.isHorizontal();
                  if (((a.min = null), (a.max = null), i.stacked)) {
                    var s = {};
                    e.each(r, function (o, r) {
                      var l = n.getDatasetMeta(r);
                      void 0 === s[l.type] &&
                        (s[l.type] = {
                          positiveValues: [],
                          negativeValues: [],
                        });
                      var d = s[l.type].positiveValues,
                        u = s[l.type].negativeValues;
                      n.isDatasetVisible(r) &&
                        t(l) &&
                        e.each(o.data, function (t, e) {
                          var n = +a.getRightValue(t);
                          isNaN(n) ||
                            l.data[e].hidden ||
                            ((d[e] = d[e] || 0),
                            (u[e] = u[e] || 0),
                            i.relativePoints
                              ? (d[e] = 100)
                              : 0 > n
                              ? (u[e] += n)
                              : (d[e] += n));
                        });
                    }),
                      e.each(s, function (t) {
                        var i = t.positiveValues.concat(t.negativeValues),
                          n = e.min(i),
                          o = e.max(i);
                        (a.min = null === a.min ? n : Math.min(a.min, n)),
                          (a.max = null === a.max ? o : Math.max(a.max, o));
                      });
                  } else
                    e.each(r, function (i, o) {
                      var r = n.getDatasetMeta(o);
                      n.isDatasetVisible(o) &&
                        t(r) &&
                        e.each(i.data, function (t, e) {
                          var i = +a.getRightValue(t);
                          isNaN(i) ||
                            r.data[e].hidden ||
                            (null === a.min
                              ? (a.min = i)
                              : i < a.min && (a.min = i),
                            null === a.max
                              ? (a.max = i)
                              : i > a.max && (a.max = i));
                        });
                    });
                  this.handleTickRangeOptions();
                },
                getTickLimit: function () {
                  var a,
                    i = this,
                    n = i.options.ticks;
                  if (i.isHorizontal())
                    a = Math.min(
                      n.maxTicksLimit ? n.maxTicksLimit : 11,
                      Math.ceil(i.width / 50)
                    );
                  else {
                    var o = e.getValueOrDefault(
                      n.fontSize,
                      t.defaults.global.defaultFontSize
                    );
                    a = Math.min(
                      n.maxTicksLimit ? n.maxTicksLimit : 11,
                      Math.ceil(i.height / (2 * o))
                    );
                  }
                  return a;
                },
                handleDirectionalChanges: function () {
                  this.isHorizontal() || this.ticks.reverse();
                },
                getLabelForIndex: function (t, e) {
                  return +this.getRightValue(
                    this.chart.data.datasets[e].data[t]
                  );
                },
                getPixelForValue: function (t) {
                  var e,
                    a,
                    i = this,
                    n = i.paddingLeft,
                    o = i.paddingBottom,
                    r = i.start,
                    l = +i.getRightValue(t),
                    s = i.end - r;
                  return i.isHorizontal()
                    ? ((a = i.width - (n + i.paddingRight)),
                      (e = i.left + (a / s) * (l - r)),
                      Math.round(e + n))
                    : ((a = i.height - (i.paddingTop + o)),
                      (e = i.bottom - o - (a / s) * (l - r)),
                      Math.round(e));
                },
                getValueForPixel: function (t) {
                  var e = this,
                    a = e.isHorizontal(),
                    i = e.paddingLeft,
                    n = e.paddingBottom,
                    o = a
                      ? e.width - (i + e.paddingRight)
                      : e.height - (e.paddingTop + n),
                    r = (a ? t - e.left - i : e.bottom - n - t) / o;
                  return e.start + (e.end - e.start) * r;
                },
                getPixelForTick: function (t) {
                  return this.getPixelForValue(this.ticksAsNumbers[t]);
                },
              });
            t.scaleService.registerScaleType("linear", i, a);
          };
        },
        {},
      ],
      43: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = e.noop;
            t.LinearScaleBase = t.Scale.extend({
              handleTickRangeOptions: function () {
                var t = this,
                  a = t.options,
                  i = a.ticks;
                if (i.beginAtZero) {
                  var n = e.sign(t.min),
                    o = e.sign(t.max);
                  0 > n && 0 > o ? (t.max = 0) : n > 0 && o > 0 && (t.min = 0);
                }
                void 0 !== i.min
                  ? (t.min = i.min)
                  : void 0 !== i.suggestedMin &&
                    (t.min = Math.min(t.min, i.suggestedMin)),
                  void 0 !== i.max
                    ? (t.max = i.max)
                    : void 0 !== i.suggestedMax &&
                      (t.max = Math.max(t.max, i.suggestedMax)),
                  t.min === t.max && (t.max++, i.beginAtZero || t.min--);
              },
              getTickLimit: a,
              handleDirectionalChanges: a,
              buildTicks: function () {
                var a = this,
                  i = a.options,
                  n = i.ticks,
                  o = a.getTickLimit();
                o = Math.max(2, o);
                var r = {
                    maxTicks: o,
                    min: n.min,
                    max: n.max,
                    stepSize: e.getValueOrDefault(n.fixedStepSize, n.stepSize),
                  },
                  l = (a.ticks = t.Ticks.generators.linear(r, a));
                a.handleDirectionalChanges(),
                  (a.max = e.max(l)),
                  (a.min = e.min(l)),
                  n.reverse
                    ? (l.reverse(), (a.start = a.max), (a.end = a.min))
                    : ((a.start = a.min), (a.end = a.max));
              },
              convertTicksToLabels: function () {
                var e = this;
                (e.ticksAsNumbers = e.ticks.slice()),
                  (e.zeroLineIndex = e.ticks.indexOf(0)),
                  t.Scale.prototype.convertTicksToLabels.call(e);
              },
            });
          };
        },
        {},
      ],
      44: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = {
                position: "left",
                ticks: { callback: t.Ticks.formatters.logarithmic },
              },
              i = t.Scale.extend({
                determineDataLimits: function () {
                  function t(t) {
                    return d ? t.xAxisID === a.id : t.yAxisID === a.id;
                  }
                  var a = this,
                    i = a.options,
                    n = i.ticks,
                    o = a.chart,
                    r = o.data,
                    l = r.datasets,
                    s = e.getValueOrDefault,
                    d = a.isHorizontal();
                  if (
                    ((a.min = null),
                    (a.max = null),
                    (a.minNotZero = null),
                    i.stacked)
                  ) {
                    var u = {};
                    e.each(l, function (n, r) {
                      var l = o.getDatasetMeta(r);
                      o.isDatasetVisible(r) &&
                        t(l) &&
                        (void 0 === u[l.type] && (u[l.type] = []),
                        e.each(n.data, function (t, e) {
                          var n = u[l.type],
                            o = +a.getRightValue(t);
                          isNaN(o) ||
                            l.data[e].hidden ||
                            ((n[e] = n[e] || 0),
                            i.relativePoints ? (n[e] = 100) : (n[e] += o));
                        }));
                    }),
                      e.each(u, function (t) {
                        var i = e.min(t),
                          n = e.max(t);
                        (a.min = null === a.min ? i : Math.min(a.min, i)),
                          (a.max = null === a.max ? n : Math.max(a.max, n));
                      });
                  } else
                    e.each(l, function (i, n) {
                      var r = o.getDatasetMeta(n);
                      o.isDatasetVisible(n) &&
                        t(r) &&
                        e.each(i.data, function (t, e) {
                          var i = +a.getRightValue(t);
                          isNaN(i) ||
                            r.data[e].hidden ||
                            (null === a.min
                              ? (a.min = i)
                              : i < a.min && (a.min = i),
                            null === a.max
                              ? (a.max = i)
                              : i > a.max && (a.max = i),
                            0 !== i &&
                              (null === a.minNotZero || i < a.minNotZero) &&
                              (a.minNotZero = i));
                        });
                    });
                  (a.min = s(n.min, a.min)),
                    (a.max = s(n.max, a.max)),
                    a.min === a.max &&
                      (0 !== a.min && null !== a.min
                        ? ((a.min = Math.pow(
                            10,
                            Math.floor(e.log10(a.min)) - 1
                          )),
                          (a.max = Math.pow(
                            10,
                            Math.floor(e.log10(a.max)) + 1
                          )))
                        : ((a.min = 1), (a.max = 10)));
                },
                buildTicks: function () {
                  var a = this,
                    i = a.options,
                    n = i.ticks,
                    o = { min: n.min, max: n.max },
                    r = (a.ticks = t.Ticks.generators.logarithmic(o, a));
                  a.isHorizontal() || r.reverse(),
                    (a.max = e.max(r)),
                    (a.min = e.min(r)),
                    n.reverse
                      ? (r.reverse(), (a.start = a.max), (a.end = a.min))
                      : ((a.start = a.min), (a.end = a.max));
                },
                convertTicksToLabels: function () {
                  (this.tickValues = this.ticks.slice()),
                    t.Scale.prototype.convertTicksToLabels.call(this);
                },
                getLabelForIndex: function (t, e) {
                  return +this.getRightValue(
                    this.chart.data.datasets[e].data[t]
                  );
                },
                getPixelForTick: function (t) {
                  return this.getPixelForValue(this.tickValues[t]);
                },
                getPixelForValue: function (t) {
                  var a,
                    i,
                    n,
                    o = this,
                    r = o.start,
                    l = +o.getRightValue(t),
                    s = o.paddingTop,
                    d = o.paddingBottom,
                    u = o.paddingLeft,
                    c = o.options,
                    h = c.ticks;
                  return (
                    o.isHorizontal()
                      ? ((n = e.log10(o.end) - e.log10(r)),
                        0 === l
                          ? (i = o.left + u)
                          : ((a = o.width - (u + o.paddingRight)),
                            (i = o.left + (a / n) * (e.log10(l) - e.log10(r))),
                            (i += u)))
                      : ((a = o.height - (s + d)),
                        0 !== r || h.reverse
                          ? 0 === o.end && h.reverse
                            ? ((n = e.log10(o.start) - e.log10(o.minNotZero)),
                              (i =
                                l === o.end
                                  ? o.top + s
                                  : l === o.minNotZero
                                  ? o.top + s + 0.02 * a
                                  : o.top +
                                    s +
                                    0.02 * a +
                                    ((0.98 * a) / n) *
                                      (e.log10(l) - e.log10(o.minNotZero))))
                            : ((n = e.log10(o.end) - e.log10(r)),
                              (a = o.height - (s + d)),
                              (i =
                                o.bottom -
                                d -
                                (a / n) * (e.log10(l) - e.log10(r))))
                          : ((n = e.log10(o.end) - e.log10(o.minNotZero)),
                            (i =
                              l === r
                                ? o.bottom - d
                                : l === o.minNotZero
                                ? o.bottom - d - 0.02 * a
                                : o.bottom -
                                  d -
                                  0.02 * a -
                                  ((0.98 * a) / n) *
                                    (e.log10(l) - e.log10(o.minNotZero))))),
                    i
                  );
                },
                getValueForPixel: function (t) {
                  var a,
                    i,
                    n = this,
                    o = e.log10(n.end) - e.log10(n.start);
                  return (
                    n.isHorizontal()
                      ? ((i = n.width - (n.paddingLeft + n.paddingRight)),
                        (a =
                          n.start *
                          Math.pow(10, ((t - n.left - n.paddingLeft) * o) / i)))
                      : ((i = n.height - (n.paddingTop + n.paddingBottom)),
                        (a =
                          Math.pow(
                            10,
                            ((n.bottom - n.paddingBottom - t) * o) / i
                          ) / n.start)),
                    a
                  );
                },
              });
            t.scaleService.registerScaleType("logarithmic", i, a);
          };
        },
        {},
      ],
      45: [
        function (t, e, a) {
          "use strict";
          e.exports = function (t) {
            var e = t.helpers,
              a = t.defaults.global,
              i = {
                display: !0,
                animate: !0,
                lineArc: !1,
                position: "chartArea",
                angleLines: {
                  display: !0,
                  color: "rgba(0, 0, 0, 0.1)",
                  lineWidth: 1,
                },
                ticks: {
                  showLabelBackdrop: !0,
                  backdropColor: "rgba(255,255,255,0.75)",
                  backdropPaddingY: 2,
                  backdropPaddingX: 2,
                  callback: t.Ticks.formatters.linear,
                },
                pointLabels: {
                  fontSize: 10,
                  callback: function (t) {
                    return t;
                  },
                },
              },
              n = t.LinearScaleBase.extend({
                getValueCount: function () {
                  return this.chart.data.labels.length;
                },
                setDimensions: function () {
                  var t = this,
                    i = t.options,
                    n = i.ticks;
                  (t.width = t.maxWidth),
                    (t.height = t.maxHeight),
                    (t.xCenter = Math.round(t.width / 2)),
                    (t.yCenter = Math.round(t.height / 2));
                  var o = e.min([t.height, t.width]),
                    r = e.getValueOrDefault(n.fontSize, a.defaultFontSize);
                  t.drawingArea = i.display
                    ? o / 2 - (r / 2 + n.backdropPaddingY)
                    : o / 2;
                },
                determineDataLimits: function () {
                  var t = this,
                    a = t.chart;
                  (t.min = null),
                    (t.max = null),
                    e.each(a.data.datasets, function (i, n) {
                      if (a.isDatasetVisible(n)) {
                        var o = a.getDatasetMeta(n);
                        e.each(i.data, function (e, a) {
                          var i = +t.getRightValue(e);
                          isNaN(i) ||
                            o.data[a].hidden ||
                            (null === t.min
                              ? (t.min = i)
                              : i < t.min && (t.min = i),
                            null === t.max
                              ? (t.max = i)
                              : i > t.max && (t.max = i));
                        });
                      }
                    }),
                    t.handleTickRangeOptions();
                },
                getTickLimit: function () {
                  var t = this.options.ticks,
                    i = e.getValueOrDefault(t.fontSize, a.defaultFontSize);
                  return Math.min(
                    t.maxTicksLimit ? t.maxTicksLimit : 11,
                    Math.ceil(this.drawingArea / (1.5 * i))
                  );
                },
                convertTicksToLabels: function () {
                  var e = this;
                  t.LinearScaleBase.prototype.convertTicksToLabels.call(e),
                    (e.pointLabels = e.chart.data.labels.map(
                      e.options.pointLabels.callback,
                      e
                    ));
                },
                getLabelForIndex: function (t, e) {
                  return +this.getRightValue(
                    this.chart.data.datasets[e].data[t]
                  );
                },
                fit: function () {
                  var t,
                    i,
                    n,
                    o,
                    r,
                    l,
                    s,
                    d,
                    u,
                    c,
                    h,
                    f,
                    g = this.options.pointLabels,
                    p = e.getValueOrDefault(g.fontSize, a.defaultFontSize),
                    m = e.getValueOrDefault(g.fontStyle, a.defaultFontStyle),
                    b = e.getValueOrDefault(g.fontFamily, a.defaultFontFamily),
                    v = e.fontString(p, m, b),
                    x = e.min([this.height / 2 - p - 5, this.width / 2]),
                    y = this.width,
                    k = 0;
                  for (
                    this.ctx.font = v, i = 0;
                    i < this.getValueCount();
                    i++
                  ) {
                    (t = this.getPointPosition(i, x)),
                      (n =
                        this.ctx.measureText(
                          this.pointLabels[i] ? this.pointLabels[i] : ""
                        ).width + 5);
                    var S = this.getIndexAngle(i) + Math.PI / 2,
                      w = ((360 * S) / (2 * Math.PI)) % 360;
                    0 === w || 180 === w
                      ? ((o = n / 2),
                        t.x + o > y && ((y = t.x + o), (r = i)),
                        t.x - o < k && ((k = t.x - o), (s = i)))
                      : 180 > w
                      ? t.x + n > y && ((y = t.x + n), (r = i))
                      : t.x - n < k && ((k = t.x - n), (s = i));
                  }
                  (u = k),
                    (c = Math.ceil(y - this.width)),
                    (l = this.getIndexAngle(r)),
                    (d = this.getIndexAngle(s)),
                    (h = c / Math.sin(l + Math.PI / 2)),
                    (f = u / Math.sin(d + Math.PI / 2)),
                    (h = e.isNumber(h) ? h : 0),
                    (f = e.isNumber(f) ? f : 0),
                    (this.drawingArea = Math.round(x - (f + h) / 2)),
                    this.setCenterPoint(f, h);
                },
                setCenterPoint: function (t, e) {
                  var a = this,
                    i = a.width - e - a.drawingArea,
                    n = t + a.drawingArea;
                  (a.xCenter = Math.round((n + i) / 2 + a.left)),
                    (a.yCenter = Math.round(a.height / 2 + a.top));
                },
                getIndexAngle: function (t) {
                  var e = (2 * Math.PI) / this.getValueCount(),
                    a =
                      this.chart.options && this.chart.options.startAngle
                        ? this.chart.options.startAngle
                        : 0,
                    i = (a * Math.PI * 2) / 360;
                  return t * e - Math.PI / 2 + i;
                },
                getDistanceFromCenterForValue: function (t) {
                  var e = this;
                  if (null === t) return 0;
                  var a = e.drawingArea / (e.max - e.min);
                  return e.options.reverse ? (e.max - t) * a : (t - e.min) * a;
                },
                getPointPosition: function (t, e) {
                  var a = this,
                    i = a.getIndexAngle(t);
                  return {
                    x: Math.round(Math.cos(i) * e) + a.xCenter,
                    y: Math.round(Math.sin(i) * e) + a.yCenter,
                  };
                },
                getPointPositionForValue: function (t, e) {
                  return this.getPointPosition(
                    t,
                    this.getDistanceFromCenterForValue(e)
                  );
                },
                getBasePosition: function () {
                  var t = this,
                    e = t.min,
                    a = t.max;
                  return t.getPointPositionForValue(
                    0,
                    t.beginAtZero
                      ? 0
                      : 0 > e && 0 > a
                      ? a
                      : e > 0 && a > 0
                      ? e
                      : 0
                  );
                },
                draw: function () {
                  var t = this,
                    i = t.options,
                    n = i.gridLines,
                    o = i.ticks,
                    r = i.angleLines,
                    l = i.pointLabels,
                    s = e.getValueOrDefault;
                  if (i.display) {
                    var d = t.ctx,
                      u = s(o.fontSize, a.defaultFontSize),
                      c = s(o.fontStyle, a.defaultFontStyle),
                      h = s(o.fontFamily, a.defaultFontFamily),
                      f = e.fontString(u, c, h);
                    if (
                      (e.each(t.ticks, function (r, l) {
                        if (l > 0 || i.reverse) {
                          var c = t.getDistanceFromCenterForValue(
                              t.ticksAsNumbers[l]
                            ),
                            h = t.yCenter - c;
                          if (n.display && 0 !== l)
                            if (
                              ((d.strokeStyle = e.getValueAtIndexOrDefault(
                                n.color,
                                l - 1
                              )),
                              (d.lineWidth = e.getValueAtIndexOrDefault(
                                n.lineWidth,
                                l - 1
                              )),
                              i.lineArc)
                            )
                              d.beginPath(),
                                d.arc(t.xCenter, t.yCenter, c, 0, 2 * Math.PI),
                                d.closePath(),
                                d.stroke();
                            else {
                              d.beginPath();
                              for (var g = 0; g < t.getValueCount(); g++) {
                                var p = t.getPointPosition(g, c);
                                0 === g
                                  ? d.moveTo(p.x, p.y)
                                  : d.lineTo(p.x, p.y);
                              }
                              d.closePath(), d.stroke();
                            }
                          if (o.display) {
                            var m = s(o.fontColor, a.defaultFontColor);
                            if (((d.font = f), o.showLabelBackdrop)) {
                              var b = d.measureText(r).width;
                              (d.fillStyle = o.backdropColor),
                                d.fillRect(
                                  t.xCenter - b / 2 - o.backdropPaddingX,
                                  h - u / 2 - o.backdropPaddingY,
                                  b + 2 * o.backdropPaddingX,
                                  u + 2 * o.backdropPaddingY
                                );
                            }
                            (d.textAlign = "center"),
                              (d.textBaseline = "middle"),
                              (d.fillStyle = m),
                              d.fillText(r, t.xCenter, h);
                          }
                        }
                      }),
                      !i.lineArc)
                    ) {
                      (d.lineWidth = r.lineWidth), (d.strokeStyle = r.color);
                      for (
                        var g = t.getDistanceFromCenterForValue(
                            i.reverse ? t.min : t.max
                          ),
                          p = s(l.fontSize, a.defaultFontSize),
                          m = s(l.fontStyle, a.defaultFontStyle),
                          b = s(l.fontFamily, a.defaultFontFamily),
                          v = e.fontString(p, m, b),
                          x = t.getValueCount() - 1;
                        x >= 0;
                        x--
                      ) {
                        if (r.display) {
                          var y = t.getPointPosition(x, g);
                          d.beginPath(),
                            d.moveTo(t.xCenter, t.yCenter),
                            d.lineTo(y.x, y.y),
                            d.stroke(),
                            d.closePath();
                        }
                        var k = t.getPointPosition(x, g + 5),
                          S = s(l.fontColor, a.defaultFontColor);
                        (d.font = v), (d.fillStyle = S);
                        var w = t.pointLabels,
                          M = this.getIndexAngle(x) + Math.PI / 2,
                          C = ((360 * M) / (2 * Math.PI)) % 360;
                        0 === C || 180 === C
                          ? (d.textAlign = "center")
                          : 180 > C
                          ? (d.textAlign = "left")
                          : (d.textAlign = "right"),
                          90 === C || 270 === C
                            ? (d.textBaseline = "middle")
                            : C > 270 || 90 > C
                            ? (d.textBaseline = "bottom")
                            : (d.textBaseline = "top"),
                          d.fillText(w[x] ? w[x] : "", k.x, k.y);
                      }
                    }
                  }
                },
              });
            t.scaleService.registerScaleType("radialLinear", n, i);
          };
        },
        {},
      ],
      46: [
        function (t, e, a) {
          "use strict";
          var i = t(1);
          (i = "function" == typeof i ? i : window.moment),
            (e.exports = function (t) {
              var e = t.helpers,
                a = {
                  units: [
                    {
                      name: "millisecond",
                      steps: [1, 2, 5, 10, 20, 50, 100, 250, 500],
                    },
                    { name: "second", steps: [1, 2, 5, 10, 30] },
                    { name: "minute", steps: [1, 2, 5, 10, 30] },
                    { name: "hour", steps: [1, 2, 3, 6, 12] },
                    { name: "day", steps: [1, 2, 5] },
                    { name: "week", maxStep: 4 },
                    { name: "month", maxStep: 3 },
                    { name: "quarter", maxStep: 4 },
                    { name: "year", maxStep: !1 },
                  ],
                },
                n = {
                  position: "bottom",
                  time: {
                    parser: !1,
                    format: !1,
                    unit: !1,
                    round: !1,
                    displayFormat: !1,
                    isoWeekday: !1,
                    minUnit: "millisecond",
                    displayFormats: {
                      millisecond: "h:mm:ss.SSS a",
                      second: "h:mm:ss a",
                      minute: "h:mm:ss a",
                      hour: "MMM D, hA",
                      day: "ll",
                      week: "ll",
                      month: "MMM YYYY",
                      quarter: "[Q]Q - YYYY",
                      year: "YYYY",
                    },
                  },
                  ticks: { autoSkip: !1 },
                },
                o = t.Scale.extend({
                  initialize: function () {
                    if (!i)
                      throw new Error(
                        "Chart.js - Moment.js could not be found! You must include it before Chart.js to use the time scale. Download at https://momentjs.com"
                      );
                    t.Scale.prototype.initialize.call(this);
                  },
                  getLabelMoment: function (t, e) {
                    return null === t || null === e
                      ? null
                      : "undefined" != typeof this.labelMoments[t]
                      ? this.labelMoments[t][e]
                      : null;
                  },
                  getLabelDiff: function (t, e) {
                    var a = this;
                    return null === t || null === e
                      ? null
                      : (void 0 === a.labelDiffs && a.buildLabelDiffs(),
                        "undefined" != typeof a.labelDiffs[t]
                          ? a.labelDiffs[t][e]
                          : null);
                  },
                  getMomentStartOf: function (t) {
                    var e = this;
                    return "week" === e.options.time.unit &&
                      e.options.time.isoWeekday !== !1
                      ? t
                          .clone()
                          .startOf("isoWeek")
                          .isoWeekday(e.options.time.isoWeekday)
                      : t.clone().startOf(e.tickUnit);
                  },
                  determineDataLimits: function () {
                    var t = this;
                    t.labelMoments = [];
                    var a = [];
                    t.chart.data.labels && t.chart.data.labels.length > 0
                      ? (e.each(
                          t.chart.data.labels,
                          function (e) {
                            var i = t.parseTime(e);
                            i.isValid() &&
                              (t.options.time.round &&
                                i.startOf(t.options.time.round),
                              a.push(i));
                          },
                          t
                        ),
                        (t.firstTick = i.min.call(t, a)),
                        (t.lastTick = i.max.call(t, a)))
                      : ((t.firstTick = null), (t.lastTick = null)),
                      e.each(
                        t.chart.data.datasets,
                        function (n, o) {
                          var r = [],
                            l = t.chart.isDatasetVisible(o);
                          "object" == typeof n.data[0] && null !== n.data[0]
                            ? e.each(
                                n.data,
                                function (e) {
                                  var a = t.parseTime(t.getRightValue(e));
                                  a.isValid() &&
                                    (t.options.time.round &&
                                      a.startOf(t.options.time.round),
                                    r.push(a),
                                    l &&
                                      ((t.firstTick =
                                        null !== t.firstTick
                                          ? i.min(t.firstTick, a)
                                          : a),
                                      (t.lastTick =
                                        null !== t.lastTick
                                          ? i.max(t.lastTick, a)
                                          : a)));
                                },
                                t
                              )
                            : (r = a),
                            t.labelMoments.push(r);
                        },
                        t
                      ),
                      t.options.time.min &&
                        (t.firstTick = t.parseTime(t.options.time.min)),
                      t.options.time.max &&
                        (t.lastTick = t.parseTime(t.options.time.max)),
                      (t.firstTick = (t.firstTick || i()).clone()),
                      (t.lastTick = (t.lastTick || i()).clone());
                  },
                  buildLabelDiffs: function () {
                    var t = this;
                    t.labelDiffs = [];
                    var a = [];
                    t.chart.data.labels &&
                      t.chart.data.labels.length > 0 &&
                      e.each(
                        t.chart.data.labels,
                        function (e) {
                          var i = t.parseTime(e);
                          i.isValid() &&
                            (t.options.time.round &&
                              i.startOf(t.options.time.round),
                            a.push(i.diff(t.firstTick, t.tickUnit, !0)));
                        },
                        t
                      ),
                      e.each(
                        t.chart.data.datasets,
                        function (i) {
                          var n = [];
                          "object" == typeof i.data[0] && null !== i.data[0]
                            ? e.each(
                                i.data,
                                function (e) {
                                  var a = t.parseTime(t.getRightValue(e));
                                  a.isValid() &&
                                    (t.options.time.round &&
                                      a.startOf(t.options.time.round),
                                    n.push(
                                      a.diff(t.firstTick, t.tickUnit, !0)
                                    ));
                                },
                                t
                              )
                            : (n = a),
                            t.labelDiffs.push(n);
                        },
                        t
                      );
                  },
                  buildTicks: function () {
                    var i = this;
                    i.ctx.save();
                    var n = e.getValueOrDefault(
                        i.options.ticks.fontSize,
                        t.defaults.global.defaultFontSize
                      ),
                      o = e.getValueOrDefault(
                        i.options.ticks.fontStyle,
                        t.defaults.global.defaultFontStyle
                      ),
                      r = e.getValueOrDefault(
                        i.options.ticks.fontFamily,
                        t.defaults.global.defaultFontFamily
                      ),
                      l = e.fontString(n, o, r);
                    if (
                      ((i.ctx.font = l),
                      (i.ticks = []),
                      (i.unitScale = 1),
                      (i.scaleSizeInUnits = 0),
                      i.options.time.unit)
                    )
                      (i.tickUnit = i.options.time.unit || "day"),
                        (i.displayFormat =
                          i.options.time.displayFormats[i.tickUnit]),
                        (i.scaleSizeInUnits = i.lastTick.diff(
                          i.firstTick,
                          i.tickUnit,
                          !0
                        )),
                        (i.unitScale = e.getValueOrDefault(
                          i.options.time.unitStepSize,
                          1
                        ));
                    else {
                      var s = i.isHorizontal()
                          ? i.width - (i.paddingLeft + i.paddingRight)
                          : i.height - (i.paddingTop + i.paddingBottom),
                        d = i.tickFormatFunction(i.firstTick, 0, []),
                        u = i.ctx.measureText(d).width,
                        c = Math.cos(e.toRadians(i.options.ticks.maxRotation)),
                        h = Math.sin(e.toRadians(i.options.ticks.maxRotation));
                      u = u * c + n * h;
                      var f = s / u;
                      (i.tickUnit = i.options.time.minUnit),
                        (i.scaleSizeInUnits = i.lastTick.diff(
                          i.firstTick,
                          i.tickUnit,
                          !0
                        )),
                        (i.displayFormat =
                          i.options.time.displayFormats[i.tickUnit]);
                      for (var g = 0, p = a.units[g]; g < a.units.length; ) {
                        if (
                          ((i.unitScale = 1),
                          e.isArray(p.steps) &&
                            Math.ceil(i.scaleSizeInUnits / f) < e.max(p.steps))
                        ) {
                          for (var m = 0; m < p.steps.length; ++m)
                            if (
                              p.steps[m] >= Math.ceil(i.scaleSizeInUnits / f)
                            ) {
                              i.unitScale = e.getValueOrDefault(
                                i.options.time.unitStepSize,
                                p.steps[m]
                              );
                              break;
                            }
                          break;
                        }
                        if (
                          p.maxStep === !1 ||
                          Math.ceil(i.scaleSizeInUnits / f) < p.maxStep
                        ) {
                          i.unitScale = e.getValueOrDefault(
                            i.options.time.unitStepSize,
                            Math.ceil(i.scaleSizeInUnits / f)
                          );
                          break;
                        }
                        ++g, (p = a.units[g]), (i.tickUnit = p.name);
                        var b = i.firstTick.diff(
                            i.getMomentStartOf(i.firstTick),
                            i.tickUnit,
                            !0
                          ),
                          v = i
                            .getMomentStartOf(
                              i.lastTick.clone().add(1, i.tickUnit)
                            )
                            .diff(i.lastTick, i.tickUnit, !0);
                        (i.scaleSizeInUnits =
                          i.lastTick.diff(i.firstTick, i.tickUnit, !0) + b + v),
                          (i.displayFormat =
                            i.options.time.displayFormats[p.name]);
                      }
                    }
                    var x;
                    if (
                      (i.options.time.min
                        ? (x = i.getMomentStartOf(i.firstTick))
                        : ((i.firstTick = i.getMomentStartOf(i.firstTick)),
                          (x = i.firstTick)),
                      !i.options.time.max)
                    ) {
                      var y = i.getMomentStartOf(i.lastTick),
                        k = y.diff(i.lastTick, i.tickUnit, !0);
                      0 > k
                        ? (i.lastTick = i.getMomentStartOf(
                            i.lastTick.add(1, i.tickUnit)
                          ))
                        : k >= 0 && (i.lastTick = y),
                        (i.scaleSizeInUnits = i.lastTick.diff(
                          i.firstTick,
                          i.tickUnit,
                          !0
                        ));
                    }
                    i.options.time.displayFormat &&
                      (i.displayFormat = i.options.time.displayFormat),
                      i.ticks.push(i.firstTick.clone());
                    for (var S = 1; S <= i.scaleSizeInUnits; ++S) {
                      var w = x.clone().add(S, i.tickUnit);
                      if (
                        i.options.time.max &&
                        w.diff(i.lastTick, i.tickUnit, !0) >= 0
                      )
                        break;
                      S % i.unitScale === 0 && i.ticks.push(w);
                    }
                    var M = i.ticks[i.ticks.length - 1].diff(
                      i.lastTick,
                      i.tickUnit
                    );
                    (0 !== M || 0 === i.scaleSizeInUnits) &&
                      (i.options.time.max
                        ? (i.ticks.push(i.lastTick.clone()),
                          (i.scaleSizeInUnits = i.lastTick.diff(
                            i.ticks[0],
                            i.tickUnit,
                            !0
                          )))
                        : (i.ticks.push(i.lastTick.clone()),
                          (i.scaleSizeInUnits = i.lastTick.diff(
                            i.firstTick,
                            i.tickUnit,
                            !0
                          )))),
                      i.ctx.restore(),
                      (i.labelDiffs = void 0);
                  },
                  getLabelForIndex: function (t, e) {
                    var a = this,
                      i =
                        a.chart.data.labels && t < a.chart.data.labels.length
                          ? a.chart.data.labels[t]
                          : "";
                    return (
                      "object" == typeof a.chart.data.datasets[e].data[0] &&
                        (i = a.getRightValue(a.chart.data.datasets[e].data[t])),
                      a.options.time.tooltipFormat &&
                        (i = a
                          .parseTime(i)
                          .format(a.options.time.tooltipFormat)),
                      i
                    );
                  },
                  tickFormatFunction: function (t, a, i) {
                    var n = t.format(this.displayFormat),
                      o = this.options.ticks,
                      r = e.getValueOrDefault(o.callback, o.userCallback);
                    return r ? r(n, a, i) : n;
                  },
                  convertTicksToLabels: function () {
                    var t = this;
                    (t.tickMoments = t.ticks),
                      (t.ticks = t.ticks.map(t.tickFormatFunction, t));
                  },
                  getPixelForValue: function (t, e, a) {
                    var i = this,
                      n = null;
                    if (
                      (void 0 !== e &&
                        void 0 !== a &&
                        (n = i.getLabelDiff(a, e)),
                      null === n &&
                        ((t && t.isValid) ||
                          (t = i.parseTime(i.getRightValue(t))),
                        t &&
                          t.isValid &&
                          t.isValid() &&
                          (n = t.diff(i.firstTick, i.tickUnit, !0))),
                      null !== n)
                    ) {
                      var o = 0 !== n ? n / i.scaleSizeInUnits : n;
                      if (i.isHorizontal()) {
                        var r = i.width - (i.paddingLeft + i.paddingRight),
                          l = r * o + i.paddingLeft;
                        return i.left + Math.round(l);
                      }
                      var s = i.height - (i.paddingTop + i.paddingBottom),
                        d = s * o + i.paddingTop;
                      return i.top + Math.round(d);
                    }
                  },
                  getPixelForTick: function (t) {
                    return this.getPixelForValue(
                      this.tickMoments[t],
                      null,
                      null
                    );
                  },
                  getValueForPixel: function (t) {
                    var e = this,
                      a = e.isHorizontal()
                        ? e.width - (e.paddingLeft + e.paddingRight)
                        : e.height - (e.paddingTop + e.paddingBottom),
                      n =
                        (t -
                          (e.isHorizontal()
                            ? e.left + e.paddingLeft
                            : e.top + e.paddingTop)) /
                        a;
                    return (
                      (n *= e.scaleSizeInUnits),
                      e.firstTick
                        .clone()
                        .add(i.duration(n, e.tickUnit).asSeconds(), "seconds")
                    );
                  },
                  parseTime: function (t) {
                    var e = this;
                    return "string" == typeof e.options.time.parser
                      ? i(t, e.options.time.parser)
                      : "function" == typeof e.options.time.parser
                      ? e.options.time.parser(t)
                      : "function" == typeof t.getMonth || "number" == typeof t
                      ? i(t)
                      : t.isValid && t.isValid()
                      ? t
                      : "string" != typeof e.options.time.format &&
                        e.options.time.format.call
                      ? (console.warn(
                          "options.time.format is deprecated and replaced by options.time.parser. See http://nnnick.github.io/Chart.js/docs-v2/#scales-time-scale"
                        ),
                        e.options.time.format(t))
                      : i(t, e.options.time.format);
                  },
                });
              t.scaleService.registerScaleType("time", o, n);
            });
        },
        { 1: 1 },
      ],
    },
    {},
    [7]
  )(7);
});
