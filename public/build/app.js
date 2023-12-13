(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var bootstrap_dist_js_bootstrap_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! bootstrap/dist/js/bootstrap.js */ "./node_modules/bootstrap/dist/js/bootstrap.js");
/* harmony import */ var bootstrap_dist_js_bootstrap_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(bootstrap_dist_js_bootstrap_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _js_common_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/common.js */ "./assets/js/common.js");
/* harmony import */ var _js_common_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_js_common_js__WEBPACK_IMPORTED_MODULE_2__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)




/***/ }),

/***/ "./assets/js/common.js":
/*!*****************************!*\
  !*** ./assets/js/common.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
__webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
__webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
__webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");
__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
__webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
__webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
__webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
__webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
__webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
__webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
__webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
__webpack_require__(/*! core-js/modules/es.symbol.async-iterator.js */ "./node_modules/core-js/modules/es.symbol.async-iterator.js");
__webpack_require__(/*! core-js/modules/es.symbol.to-string-tag.js */ "./node_modules/core-js/modules/es.symbol.to-string-tag.js");
__webpack_require__(/*! core-js/modules/es.json.to-string-tag.js */ "./node_modules/core-js/modules/es.json.to-string-tag.js");
__webpack_require__(/*! core-js/modules/es.math.to-string-tag.js */ "./node_modules/core-js/modules/es.math.to-string-tag.js");
__webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
__webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
__webpack_require__(/*! core-js/modules/es.array.push.js */ "./node_modules/core-js/modules/es.array.push.js");
__webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
__webpack_require__(/*! core-js/modules/es.array.reverse.js */ "./node_modules/core-js/modules/es.array.reverse.js");
__webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
function fetchDataPhone(_x) {
  return _fetchDataPhone.apply(this, arguments);
}
function _fetchDataPhone() {
  _fetchDataPhone = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(file) {
    var response, data;
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          _context.prev = 0;
          _context.next = 3;
          return fetch(file);
        case 3:
          response = _context.sent;
          if (!response.ok) {
            _context.next = 11;
            break;
          }
          _context.next = 7;
          return response.json();
        case 7:
          data = _context.sent;
          return _context.abrupt("return", data);
        case 11:
          throw new Error("Échec de la récupération des données");
        case 12:
          _context.next = 17;
          break;
        case 14:
          _context.prev = 14;
          _context.t0 = _context["catch"](0);
          console.error("Erreur lors de la récupération des données : " + _context.t0);
        case 17:
        case "end":
          return _context.stop();
      }
    }, _callee, null, [[0, 14]]);
  }));
  return _fetchDataPhone.apply(this, arguments);
}
function fetchCountry() {
  return _fetchCountry.apply(this, arguments);
}
function _fetchCountry() {
  _fetchCountry = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
    var file,
      _args2 = arguments;
    return _regeneratorRuntime().wrap(function _callee2$(_context2) {
      while (1) switch (_context2.prev = _context2.next) {
        case 0:
          file = _args2.length > 0 && _args2[0] !== undefined ? _args2[0] : "https://ip-api.io/json";
          fetch(file, {
            method: "GET"
          }).then(function (response) {
            return response.json();
          }).then(function (data) {
            var country = data.country;
            return country;
          })["catch"](function (error) {
            console.error("Erreur lors de la récupération des données de géolocalisation par adresse IP : " + error);
          });
        case 2:
        case "end":
          return _context2.stop();
      }
    }, _callee2);
  }));
  return _fetchCountry.apply(this, arguments);
}
function fetchIPAddress() {
  return _fetchIPAddress.apply(this, arguments);
}
function _fetchIPAddress() {
  _fetchIPAddress = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3() {
    var file,
      _args3 = arguments;
    return _regeneratorRuntime().wrap(function _callee3$(_context3) {
      while (1) switch (_context3.prev = _context3.next) {
        case 0:
          file = _args3.length > 0 && _args3[0] !== undefined ? _args3[0] : "https://api.ipify.org?format=json";
          return _context3.abrupt("return", new Promise(function (resolve, reject) {
            fetch(file).then(function (response) {
              return response.json();
            }).then(function (data) {
              var userIP = data.ip;
              resolve(userIP);
            })["catch"](function (error) {
              console.error("Erreur lors de la récupération des données de géolocalisation par adresse IP : " + error);
            });
          }));
        case 2:
        case "end":
          return _context3.stop();
      }
    }, _callee3);
  }));
  return _fetchIPAddress.apply(this, arguments);
}
function getCountryFromIP(_x2) {
  return _getCountryFromIP.apply(this, arguments);
}
function _getCountryFromIP() {
  _getCountryFromIP = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4(ip) {
    return _regeneratorRuntime().wrap(function _callee4$(_context4) {
      while (1) switch (_context4.prev = _context4.next) {
        case 0:
          return _context4.abrupt("return", new Promise(function (resolve, reject) {
            fetch("https://ipinfo.io/json?token=98406dd2b8e2b5").then(function (response) {
              return response.json();
            }).then(function (data) {
              return resolve(data.country);
            })["catch"](function (error) {
              reject(error);
            });
          }));
        case 1:
        case "end":
          return _context4.stop();
      }
    }, _callee4);
  }));
  return _getCountryFromIP.apply(this, arguments);
}
function loadJson(_x3) {
  return _loadJson.apply(this, arguments);
}
function _loadJson() {
  _loadJson = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee5(file) {
    return _regeneratorRuntime().wrap(function _callee5$(_context5) {
      while (1) switch (_context5.prev = _context5.next) {
        case 0:
          return _context5.abrupt("return", new Promise(function (resolve, reject) {
            fetch(file).then(function (response) {
              return response.json();
            }).then(function (data) {
              return resolve(data);
            })["catch"](function (error) {
              reject(error);
            });
          }));
        case 1:
        case "end":
          return _context5.stop();
      }
    }, _callee5);
  }));
  return _loadJson.apply(this, arguments);
}
function loadCountryToSelect(file) {
  var selectedCountry = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "FR";
  var tag = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "countrySelect";
  fetchDataPhone(file).then(function (data) {
    if (data) {
      var selectElement = document.getElementById(tag);
      data.forEach(function (country) {
        var option = document.createElement("option");
        option.value = country.indicatif;
        if (selectedCountry == country.name) {
          option.text = "".concat(country.name, " +(").concat(country.indicatif, ") ");
          option.setAttribute("selected", true);
        } else option.text = "".concat(country.name, " +(").concat(country.indicatif, ")");
        selectElement.appendChild(option);
      });
    }
  });
}
function getCountry(_x4) {
  return _getCountry.apply(this, arguments);
}
function _getCountry() {
  _getCountry = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee6(filename) {
    var countries, ip, code, val;
    return _regeneratorRuntime().wrap(function _callee6$(_context6) {
      while (1) switch (_context6.prev = _context6.next) {
        case 0:
          countries = [];
          _context6.next = 3;
          return fetchIPAddress();
        case 3:
          ip = _context6.sent;
          _context6.next = 6;
          return getCountryFromIP(ip);
        case 6:
          code = _context6.sent;
          _context6.next = 9;
          return loadJson(filename);
        case 9:
          countries = _context6.sent;
          val = countries.find(function (country) {
            return country.code === code;
          });
          return _context6.abrupt("return", val);
        case 12:
        case "end":
          return _context6.stop();
      }
    }, _callee6);
  }));
  return _getCountry.apply(this, arguments);
}
function alertVanish() {
  var _alert = document.querySelector(".alert");
  setTimeout(function () {
    if (_alert == null) return;
    var alert = bootstrap.Alert.getOrCreateInstance(_alert);
    if (alert) {
      alert.close();
    }
  }, 3000);
}
function loadPanelAccount(_x5) {
  return _loadPanelAccount.apply(this, arguments);
}
function _loadPanelAccount() {
  _loadPanelAccount = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee7(file) {
    var _grid, data;
    return _regeneratorRuntime().wrap(function _callee7$(_context7) {
      while (1) switch (_context7.prev = _context7.next) {
        case 0:
          _grid = document.querySelector(".grid-3");
          _context7.next = 3;
          return loadJson(file);
        case 3:
          data = _context7.sent;
          data.forEach(function (panel) {
            _grid.innerHTML += "<div onclick=\"onNavigate('".concat(panel.path, "');\" class=\"card-xs shadow rounded p-3\">").concat(panel.icon, "<h6 class=\"mt-3\"><b>").concat(panel.title, "</b></h6><span class=\"gray\">").concat(panel.text, "</span></div>");
          });
        case 5:
        case "end":
          return _context7.stop();
      }
    }, _callee7);
  }));
  return _loadPanelAccount.apply(this, arguments);
}
function loadCountryOnlyToSelect(_x6, _x7) {
  return _loadCountryOnlyToSelect.apply(this, arguments);
} // Telephone
function _loadCountryOnlyToSelect() {
  _loadCountryOnlyToSelect = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee8(file, selectedCountry) {
    var tagId,
      isOnlyCountry,
      _args8 = arguments;
    return _regeneratorRuntime().wrap(function _callee8$(_context8) {
      while (1) switch (_context8.prev = _context8.next) {
        case 0:
          tagId = _args8.length > 2 && _args8[2] !== undefined ? _args8[2] : "countryOnlySelect";
          isOnlyCountry = _args8.length > 3 && _args8[3] !== undefined ? _args8[3] : true;
          fetchDataPhone(file).then(function (data) {
            if (data) {
              // Ici, vous pouvez utiliser les données JSON récupérées
              // Par exemple, vous pouvez créer et remplir le select avec ces données
              var selectElement = document.getElementById(tagId);
              data.forEach(function (country) {
                var option = document.createElement("option");
                option.value = country.indicatif;
                if (selectedCountry == country.name) {
                  option.setAttribute("selected", true);
                }
                if (isOnlyCountry == true) {
                  option.text = "".concat(country.name);
                } else {
                  option.text = "".concat(country.name, " +(").concat(country.indicatif, ") ");
                }
                selectElement.appendChild(option);
              });
            }
          });
        case 3:
        case "end":
          return _context8.stop();
      }
    }, _callee8);
  }));
  return _loadCountryOnlyToSelect.apply(this, arguments);
}
var maskTelOptions = {
  mask: "+00[0] 0 00 00 00 00",
  lazy: false,
  // rendre placeholder toujours visible
  placeholderChar: "X"
};

// Carte CB
var maskCardOptions = {
  mask: "0000 0000 0000 0000",
  lazy: false // rendre placeholder toujours visible
  //placeholderChar: '0'
};

// Date MM/AA
var maskExpireOptions = {
  mask: "00/00",
  lazy: false // rendre placeholder toujours visible
  //placeholderChar: '_'
};

// mot de passe visible ou non

function togglePasswordVisibility(elem) {
  elem = elem.firstElementChild;
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    elem.classList = "bi bi-eye-slash";
  } else {
    passwordInput.type = "password";
    elem.classList = "bi bi-eye";
  }
}

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_bootstrap_dist_js_bootstrap_js-node_modules_fortawesome_fontawesome-free-0ba1c9"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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c2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2pzL2NvbW1vbi5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBXZSByZWNvbW1lbmQgaW5jbHVkaW5nIHRoZSBidWlsdCB2ZXJzaW9uIG9mIHRoaXMgSmF2YVNjcmlwdCBmaWxlXG4gKiAoYW5kIGl0cyBDU1MgZmlsZSkgaW4geW91ciBiYXNlIGxheW91dCAoYmFzZS5odG1sLnR3aWcpLlxuICovXG5cbi8vIGFueSBDU1MgeW91IGltcG9ydCB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbmltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xuaW1wb3J0ICdib290c3RyYXAvZGlzdC9qcy9ib290c3RyYXAuanMnOyBcbmltcG9ydCAnLi9qcy9jb21tb24uanMnO1xuXG5cbiIsImFzeW5jIGZ1bmN0aW9uIGZldGNoRGF0YVBob25lKGZpbGUpIHtcclxuICB0cnkge1xyXG4gICAgY29uc3QgcmVzcG9uc2UgPSBhd2FpdCBmZXRjaChmaWxlKTtcclxuICAgIGlmIChyZXNwb25zZS5vaykge1xyXG4gICAgICBjb25zdCBkYXRhID0gYXdhaXQgcmVzcG9uc2UuanNvbigpO1xyXG4gICAgICByZXR1cm4gZGF0YTtcclxuICAgIH0gZWxzZSB7XHJcbiAgICAgIHRocm93IG5ldyBFcnJvcihcIsOJY2hlYyBkZSBsYSByw6ljdXDDqXJhdGlvbiBkZXMgZG9ubsOpZXNcIik7XHJcbiAgICB9XHJcbiAgfSBjYXRjaCAoZXJyb3IpIHtcclxuICAgIGNvbnNvbGUuZXJyb3IoXCJFcnJldXIgbG9ycyBkZSBsYSByw6ljdXDDqXJhdGlvbiBkZXMgZG9ubsOpZXMgOiBcIiArIGVycm9yKTtcclxuICB9XHJcbn1cclxuXHJcbmFzeW5jIGZ1bmN0aW9uIGZldGNoQ291bnRyeShmaWxlID0gXCJodHRwczovL2lwLWFwaS5pby9qc29uXCIpIHtcclxuICBmZXRjaChmaWxlLCB7XHJcbiAgICBtZXRob2Q6IFwiR0VUXCIsXHJcbiAgfSlcclxuICAgIC50aGVuKChyZXNwb25zZSkgPT4gcmVzcG9uc2UuanNvbigpKVxyXG4gICAgLnRoZW4oKGRhdGEpID0+IHtcclxuICAgICAgY29uc3QgY291bnRyeSA9IGRhdGEuY291bnRyeTtcclxuICAgICAgcmV0dXJuIGNvdW50cnk7XHJcbiAgICB9KVxyXG4gICAgLmNhdGNoKChlcnJvcikgPT4ge1xyXG4gICAgICBjb25zb2xlLmVycm9yKFxyXG4gICAgICAgIFwiRXJyZXVyIGxvcnMgZGUgbGEgcsOpY3Vww6lyYXRpb24gZGVzIGRvbm7DqWVzIGRlIGfDqW9sb2NhbGlzYXRpb24gcGFyIGFkcmVzc2UgSVAgOiBcIiArXHJcbiAgICAgICAgICBlcnJvclxyXG4gICAgICApO1xyXG4gICAgfSk7XHJcbn1cclxuXHJcbmFzeW5jIGZ1bmN0aW9uIGZldGNoSVBBZGRyZXNzKGZpbGUgPSBcImh0dHBzOi8vYXBpLmlwaWZ5Lm9yZz9mb3JtYXQ9anNvblwiKSB7XHJcbiAgcmV0dXJuIG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgIGZldGNoKGZpbGUpXHJcbiAgICAgIC50aGVuKChyZXNwb25zZSkgPT4gcmVzcG9uc2UuanNvbigpKVxyXG4gICAgICAudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgICAgIGNvbnN0IHVzZXJJUCA9IGRhdGEuaXA7XHJcbiAgICAgICAgcmVzb2x2ZSh1c2VySVApO1xyXG4gICAgICB9KVxyXG4gICAgICAuY2F0Y2goKGVycm9yKSA9PiB7XHJcbiAgICAgICAgY29uc29sZS5lcnJvcihcclxuICAgICAgICAgIFwiRXJyZXVyIGxvcnMgZGUgbGEgcsOpY3Vww6lyYXRpb24gZGVzIGRvbm7DqWVzIGRlIGfDqW9sb2NhbGlzYXRpb24gcGFyIGFkcmVzc2UgSVAgOiBcIiArXHJcbiAgICAgICAgICAgIGVycm9yXHJcbiAgICAgICAgKTtcclxuICAgICAgfSk7XHJcbiAgfSk7XHJcbn1cclxuXHJcbmFzeW5jIGZ1bmN0aW9uIGdldENvdW50cnlGcm9tSVAoaXApIHtcclxuICByZXR1cm4gbmV3IFByb21pc2UoKHJlc29sdmUsIHJlamVjdCkgPT4ge1xyXG4gICAgZmV0Y2goYGh0dHBzOi8vaXBpbmZvLmlvL2pzb24/dG9rZW49OTg0MDZkZDJiOGUyYjVgKVxyXG4gICAgICAudGhlbigocmVzcG9uc2UpID0+IHJlc3BvbnNlLmpzb24oKSlcclxuICAgICAgLnRoZW4oKGRhdGEpID0+IHJlc29sdmUoZGF0YS5jb3VudHJ5KSlcclxuICAgICAgLmNhdGNoKChlcnJvcikgPT4ge1xyXG4gICAgICAgIHJlamVjdChlcnJvcik7XHJcbiAgICAgIH0pO1xyXG4gIH0pO1xyXG59XHJcblxyXG5hc3luYyBmdW5jdGlvbiBsb2FkSnNvbihmaWxlKSB7XHJcbiAgcmV0dXJuIG5ldyBQcm9taXNlKChyZXNvbHZlLCByZWplY3QpID0+IHtcclxuICAgIGZldGNoKGZpbGUpXHJcbiAgICAgIC50aGVuKChyZXNwb25zZSkgPT4gcmVzcG9uc2UuanNvbigpKVxyXG4gICAgICAudGhlbigoZGF0YSkgPT4gcmVzb2x2ZShkYXRhKSlcclxuICAgICAgLmNhdGNoKChlcnJvcikgPT4ge1xyXG4gICAgICAgIHJlamVjdChlcnJvcik7XHJcbiAgICAgIH0pO1xyXG4gIH0pO1xyXG59XHJcblxyXG5mdW5jdGlvbiBsb2FkQ291bnRyeVRvU2VsZWN0KFxyXG4gIGZpbGUsXHJcbiAgc2VsZWN0ZWRDb3VudHJ5ID0gXCJGUlwiLFxyXG4gIHRhZyA9IFwiY291bnRyeVNlbGVjdFwiXHJcbikge1xyXG4gIGZldGNoRGF0YVBob25lKGZpbGUpLnRoZW4oKGRhdGEpID0+IHtcclxuICAgIGlmIChkYXRhKSB7XHJcbiAgICAgIGNvbnN0IHNlbGVjdEVsZW1lbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCh0YWcpO1xyXG4gICAgICBkYXRhLmZvckVhY2goKGNvdW50cnkpID0+IHtcclxuICAgICAgICBjb25zdCBvcHRpb24gPSBkb2N1bWVudC5jcmVhdGVFbGVtZW50KFwib3B0aW9uXCIpO1xyXG4gICAgICAgIG9wdGlvbi52YWx1ZSA9IGNvdW50cnkuaW5kaWNhdGlmO1xyXG4gICAgICAgIGlmIChzZWxlY3RlZENvdW50cnkgPT0gY291bnRyeS5uYW1lKSB7XHJcbiAgICAgICAgICBvcHRpb24udGV4dCA9IGAke2NvdW50cnkubmFtZX0gKygke2NvdW50cnkuaW5kaWNhdGlmfSkgYDtcclxuICAgICAgICAgIG9wdGlvbi5zZXRBdHRyaWJ1dGUoXCJzZWxlY3RlZFwiLCB0cnVlKTtcclxuICAgICAgICB9IGVsc2Ugb3B0aW9uLnRleHQgPSBgJHtjb3VudHJ5Lm5hbWV9ICsoJHtjb3VudHJ5LmluZGljYXRpZn0pYDtcclxuICAgICAgICBzZWxlY3RFbGVtZW50LmFwcGVuZENoaWxkKG9wdGlvbik7XHJcbiAgICAgIH0pO1xyXG4gICAgfVxyXG4gIH0pO1xyXG59XHJcblxyXG5hc3luYyBmdW5jdGlvbiBnZXRDb3VudHJ5KGZpbGVuYW1lKSB7XHJcbiAgbGV0IGNvdW50cmllcyA9IFtdO1xyXG4gIGNvbnN0IGlwID0gYXdhaXQgZmV0Y2hJUEFkZHJlc3MoKTtcclxuICBjb25zdCBjb2RlID0gYXdhaXQgZ2V0Q291bnRyeUZyb21JUChpcCk7XHJcbiAgY291bnRyaWVzID0gYXdhaXQgbG9hZEpzb24oZmlsZW5hbWUpO1xyXG4gIGxldCB2YWwgPSBjb3VudHJpZXMuZmluZCgoY291bnRyeSkgPT4gY291bnRyeS5jb2RlID09PSBjb2RlKTtcclxuICByZXR1cm4gdmFsO1xyXG59XHJcblxyXG5mdW5jdGlvbiBhbGVydFZhbmlzaCgpIHtcclxuICBsZXQgX2FsZXJ0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcihcIi5hbGVydFwiKTtcclxuICBzZXRUaW1lb3V0KCgpID0+IHtcclxuICAgIGlmIChfYWxlcnQgPT0gbnVsbCkgcmV0dXJuO1xyXG4gICAgY29uc3QgYWxlcnQgPSBib290c3RyYXAuQWxlcnQuZ2V0T3JDcmVhdGVJbnN0YW5jZShfYWxlcnQpO1xyXG4gICAgaWYgKGFsZXJ0KSB7XHJcbiAgICAgIGFsZXJ0LmNsb3NlKCk7XHJcbiAgICB9XHJcbiAgfSwgMzAwMCk7XHJcbn1cclxuXHJcbmFzeW5jIGZ1bmN0aW9uIGxvYWRQYW5lbEFjY291bnQoZmlsZSkge1xyXG4gIGxldCBfZ3JpZCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoXCIuZ3JpZC0zXCIpO1xyXG4gIGNvbnN0IGRhdGEgPSBhd2FpdCBsb2FkSnNvbihmaWxlKTtcclxuICBkYXRhLmZvckVhY2goKHBhbmVsKSA9PiB7XHJcbiAgICBfZ3JpZC5pbm5lckhUTUwgKz0gYDxkaXYgb25jbGljaz1cIm9uTmF2aWdhdGUoJyR7cGFuZWwucGF0aH0nKTtcIiBjbGFzcz1cImNhcmQteHMgc2hhZG93IHJvdW5kZWQgcC0zXCI+JHtwYW5lbC5pY29ufTxoNiBjbGFzcz1cIm10LTNcIj48Yj4ke3BhbmVsLnRpdGxlfTwvYj48L2g2PjxzcGFuIGNsYXNzPVwiZ3JheVwiPiR7cGFuZWwudGV4dH08L3NwYW4+PC9kaXY+YDtcclxuICB9KTtcclxufVxyXG5cclxuYXN5bmMgZnVuY3Rpb24gbG9hZENvdW50cnlPbmx5VG9TZWxlY3QoXHJcbiAgZmlsZSxcclxuICBzZWxlY3RlZENvdW50cnksXHJcbiAgdGFnSWQgPSBcImNvdW50cnlPbmx5U2VsZWN0XCIsXHJcbiAgaXNPbmx5Q291bnRyeSA9IHRydWVcclxuKSB7XHJcbiAgZmV0Y2hEYXRhUGhvbmUoZmlsZSkudGhlbigoZGF0YSkgPT4ge1xyXG4gICAgaWYgKGRhdGEpIHtcclxuICAgICAgLy8gSWNpLCB2b3VzIHBvdXZleiB1dGlsaXNlciBsZXMgZG9ubsOpZXMgSlNPTiByw6ljdXDDqXLDqWVzXHJcbiAgICAgIC8vIFBhciBleGVtcGxlLCB2b3VzIHBvdXZleiBjcsOpZXIgZXQgcmVtcGxpciBsZSBzZWxlY3QgYXZlYyBjZXMgZG9ubsOpZXNcclxuICAgICAgY29uc3Qgc2VsZWN0RWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKHRhZ0lkKTtcclxuXHJcbiAgICAgIGRhdGEuZm9yRWFjaCgoY291bnRyeSkgPT4ge1xyXG4gICAgICAgIGNvbnN0IG9wdGlvbiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJvcHRpb25cIik7XHJcbiAgICAgICAgb3B0aW9uLnZhbHVlID0gY291bnRyeS5pbmRpY2F0aWY7XHJcbiAgICAgICAgaWYgKHNlbGVjdGVkQ291bnRyeSA9PSBjb3VudHJ5Lm5hbWUpIHtcclxuICAgICAgICAgIG9wdGlvbi5zZXRBdHRyaWJ1dGUoXCJzZWxlY3RlZFwiLCB0cnVlKTtcclxuICAgICAgICB9XHJcbiAgICAgICAgaWYgKGlzT25seUNvdW50cnkgPT0gdHJ1ZSkge1xyXG4gICAgICAgICAgb3B0aW9uLnRleHQgPSBgJHtjb3VudHJ5Lm5hbWV9YDtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgb3B0aW9uLnRleHQgPSBgJHtjb3VudHJ5Lm5hbWV9ICsoJHtjb3VudHJ5LmluZGljYXRpZn0pIGA7XHJcbiAgICAgICAgfVxyXG4gICAgICAgIHNlbGVjdEVsZW1lbnQuYXBwZW5kQ2hpbGQob3B0aW9uKTtcclxuICAgICAgfSk7XHJcbiAgICB9XHJcbiAgfSk7XHJcbn1cclxuXHJcbi8vIFRlbGVwaG9uZVxyXG5jb25zdCBtYXNrVGVsT3B0aW9ucyA9IHtcclxuICBtYXNrOiBcIiswMFswXSAwIDAwIDAwIDAwIDAwXCIsXHJcbiAgbGF6eTogZmFsc2UsIC8vIHJlbmRyZSBwbGFjZWhvbGRlciB0b3Vqb3VycyB2aXNpYmxlXHJcbiAgcGxhY2Vob2xkZXJDaGFyOiBcIlhcIixcclxufTtcclxuXHJcbi8vIENhcnRlIENCXHJcbmNvbnN0IG1hc2tDYXJkT3B0aW9ucyA9IHtcclxuICBtYXNrOiBcIjAwMDAgMDAwMCAwMDAwIDAwMDBcIixcclxuICBsYXp5OiBmYWxzZSwgLy8gcmVuZHJlIHBsYWNlaG9sZGVyIHRvdWpvdXJzIHZpc2libGVcclxuICAvL3BsYWNlaG9sZGVyQ2hhcjogJzAnXHJcbn07XHJcblxyXG4vLyBEYXRlIE1NL0FBXHJcbmNvbnN0IG1hc2tFeHBpcmVPcHRpb25zID0ge1xyXG4gIG1hc2s6IFwiMDAvMDBcIixcclxuICBsYXp5OiBmYWxzZSwgLy8gcmVuZHJlIHBsYWNlaG9sZGVyIHRvdWpvdXJzIHZpc2libGVcclxuICAvL3BsYWNlaG9sZGVyQ2hhcjogJ18nXHJcbn07XHJcblxyXG4vLyBtb3QgZGUgcGFzc2UgdmlzaWJsZSBvdSBub25cclxuXHJcbmZ1bmN0aW9uIHRvZ2dsZVBhc3N3b3JkVmlzaWJpbGl0eShlbGVtKSB7XHJcbiAgZWxlbSA9IGVsZW0uZmlyc3RFbGVtZW50Q2hpbGQ7XHJcbiAgaWYgKHBhc3N3b3JkSW5wdXQudHlwZSA9PT0gXCJwYXNzd29yZFwiKSB7XHJcbiAgICBwYXNzd29yZElucHV0LnR5cGUgPSBcInRleHRcIjtcclxuICAgIGVsZW0uY2xhc3NMaXN0ID0gXCJiaSBiaS1leWUtc2xhc2hcIjtcclxuICB9IGVsc2Uge1xyXG4gICAgcGFzc3dvcmRJbnB1dC50eXBlID0gXCJwYXNzd29yZFwiO1xyXG4gICAgZWxlbS5jbGFzc0xpc3QgPSBcImJpIGJpLWV5ZVwiO1xyXG4gIH1cclxufVxyXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiX3JlZ2VuZXJhdG9yUnVudGltZSIsImUiLCJ0IiwiciIsIk9iamVjdCIsInByb3RvdHlwZSIsIm4iLCJoYXNPd25Qcm9wZXJ0eSIsIm8iLCJkZWZpbmVQcm9wZXJ0eSIsInZhbHVlIiwiaSIsIlN5bWJvbCIsImEiLCJpdGVyYXRvciIsImMiLCJhc3luY0l0ZXJhdG9yIiwidSIsInRvU3RyaW5nVGFnIiwiZGVmaW5lIiwiZW51bWVyYWJsZSIsImNvbmZpZ3VyYWJsZSIsIndyaXRhYmxlIiwid3JhcCIsIkdlbmVyYXRvciIsImNyZWF0ZSIsIkNvbnRleHQiLCJtYWtlSW52b2tlTWV0aG9kIiwidHJ5Q2F0Y2giLCJ0eXBlIiwiYXJnIiwiY2FsbCIsImgiLCJsIiwiZiIsInMiLCJ5IiwiR2VuZXJhdG9yRnVuY3Rpb24iLCJHZW5lcmF0b3JGdW5jdGlvblByb3RvdHlwZSIsInAiLCJkIiwiZ2V0UHJvdG90eXBlT2YiLCJ2IiwidmFsdWVzIiwiZyIsImRlZmluZUl0ZXJhdG9yTWV0aG9kcyIsImZvckVhY2giLCJfaW52b2tlIiwiQXN5bmNJdGVyYXRvciIsImludm9rZSIsIl90eXBlb2YiLCJyZXNvbHZlIiwiX19hd2FpdCIsInRoZW4iLCJjYWxsSW52b2tlV2l0aE1ldGhvZEFuZEFyZyIsIkVycm9yIiwiZG9uZSIsIm1ldGhvZCIsImRlbGVnYXRlIiwibWF5YmVJbnZva2VEZWxlZ2F0ZSIsInNlbnQiLCJfc2VudCIsImRpc3BhdGNoRXhjZXB0aW9uIiwiYWJydXB0IiwiVHlwZUVycm9yIiwicmVzdWx0TmFtZSIsIm5leHQiLCJuZXh0TG9jIiwicHVzaFRyeUVudHJ5IiwidHJ5TG9jIiwiY2F0Y2hMb2MiLCJmaW5hbGx5TG9jIiwiYWZ0ZXJMb2MiLCJ0cnlFbnRyaWVzIiwicHVzaCIsInJlc2V0VHJ5RW50cnkiLCJjb21wbGV0aW9uIiwicmVzZXQiLCJpc05hTiIsImxlbmd0aCIsImRpc3BsYXlOYW1lIiwiaXNHZW5lcmF0b3JGdW5jdGlvbiIsImNvbnN0cnVjdG9yIiwibmFtZSIsIm1hcmsiLCJzZXRQcm90b3R5cGVPZiIsIl9fcHJvdG9fXyIsImF3cmFwIiwiYXN5bmMiLCJQcm9taXNlIiwia2V5cyIsInJldmVyc2UiLCJwb3AiLCJwcmV2IiwiY2hhckF0Iiwic2xpY2UiLCJzdG9wIiwicnZhbCIsImhhbmRsZSIsImNvbXBsZXRlIiwiZmluaXNoIiwiX2NhdGNoIiwiZGVsZWdhdGVZaWVsZCIsInJlcXVpcmUiLCJhc3luY0dlbmVyYXRvclN0ZXAiLCJnZW4iLCJyZWplY3QiLCJfbmV4dCIsIl90aHJvdyIsImtleSIsImluZm8iLCJlcnJvciIsIl9hc3luY1RvR2VuZXJhdG9yIiwiZm4iLCJzZWxmIiwiYXJncyIsImFyZ3VtZW50cyIsImFwcGx5IiwiZXJyIiwidW5kZWZpbmVkIiwiZmV0Y2hEYXRhUGhvbmUiLCJfeCIsIl9mZXRjaERhdGFQaG9uZSIsIl9jYWxsZWUiLCJmaWxlIiwicmVzcG9uc2UiLCJkYXRhIiwiX2NhbGxlZSQiLCJfY29udGV4dCIsImZldGNoIiwib2siLCJqc29uIiwidDAiLCJjb25zb2xlIiwiZmV0Y2hDb3VudHJ5IiwiX2ZldGNoQ291bnRyeSIsIl9jYWxsZWUyIiwiX2FyZ3MyIiwiX2NhbGxlZTIkIiwiX2NvbnRleHQyIiwiY291bnRyeSIsImZldGNoSVBBZGRyZXNzIiwiX2ZldGNoSVBBZGRyZXNzIiwiX2NhbGxlZTMiLCJfYXJnczMiLCJfY2FsbGVlMyQiLCJfY29udGV4dDMiLCJ1c2VySVAiLCJpcCIsImdldENvdW50cnlGcm9tSVAiLCJfeDIiLCJfZ2V0Q291bnRyeUZyb21JUCIsIl9jYWxsZWU0IiwiX2NhbGxlZTQkIiwiX2NvbnRleHQ0IiwibG9hZEpzb24iLCJfeDMiLCJfbG9hZEpzb24iLCJfY2FsbGVlNSIsIl9jYWxsZWU1JCIsIl9jb250ZXh0NSIsImxvYWRDb3VudHJ5VG9TZWxlY3QiLCJzZWxlY3RlZENvdW50cnkiLCJ0YWciLCJzZWxlY3RFbGVtZW50IiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsIm9wdGlvbiIsImNyZWF0ZUVsZW1lbnQiLCJpbmRpY2F0aWYiLCJ0ZXh0IiwiY29uY2F0Iiwic2V0QXR0cmlidXRlIiwiYXBwZW5kQ2hpbGQiLCJnZXRDb3VudHJ5IiwiX3g0IiwiX2dldENvdW50cnkiLCJfY2FsbGVlNiIsImZpbGVuYW1lIiwiY291bnRyaWVzIiwiY29kZSIsInZhbCIsIl9jYWxsZWU2JCIsIl9jb250ZXh0NiIsImZpbmQiLCJhbGVydFZhbmlzaCIsIl9hbGVydCIsInF1ZXJ5U2VsZWN0b3IiLCJzZXRUaW1lb3V0IiwiYWxlcnQiLCJib290c3RyYXAiLCJBbGVydCIsImdldE9yQ3JlYXRlSW5zdGFuY2UiLCJjbG9zZSIsImxvYWRQYW5lbEFjY291bnQiLCJfeDUiLCJfbG9hZFBhbmVsQWNjb3VudCIsIl9jYWxsZWU3IiwiX2dyaWQiLCJfY2FsbGVlNyQiLCJfY29udGV4dDciLCJwYW5lbCIsImlubmVySFRNTCIsInBhdGgiLCJpY29uIiwidGl0bGUiLCJsb2FkQ291bnRyeU9ubHlUb1NlbGVjdCIsIl94NiIsIl94NyIsIl9sb2FkQ291bnRyeU9ubHlUb1NlbGVjdCIsIl9jYWxsZWU4IiwidGFnSWQiLCJpc09ubHlDb3VudHJ5IiwiX2FyZ3M4IiwiX2NhbGxlZTgkIiwiX2NvbnRleHQ4IiwibWFza1RlbE9wdGlvbnMiLCJtYXNrIiwibGF6eSIsInBsYWNlaG9sZGVyQ2hhciIsIm1hc2tDYXJkT3B0aW9ucyIsIm1hc2tFeHBpcmVPcHRpb25zIiwidG9nZ2xlUGFzc3dvcmRWaXNpYmlsaXR5IiwiZWxlbSIsImZpcnN0RWxlbWVudENoaWxkIiwicGFzc3dvcmRJbnB1dCIsImNsYXNzTGlzdCJdLCJzb3VyY2VSb290IjoiIn0=