"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["rating-app"],{

/***/ "./assets/js/components/StarRating.jsx":
/*!*********************************************!*\
  !*** ./assets/js/components/StarRating.jsx ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.array.includes.js */ "./node_modules/core-js/modules/es.array.includes.js");
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.array.map.js */ "./node_modules/core-js/modules/es.array.map.js");
/* harmony import */ var core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_map_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.array.push.js */ "./node_modules/core-js/modules/es.array.push.js");
/* harmony import */ var core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_array_unshift_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.array.unshift.js */ "./node_modules/core-js/modules/es.array.unshift.js");
/* harmony import */ var core_js_modules_es_array_unshift_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_unshift_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.number.to-fixed.js */ "./node_modules/core-js/modules/es.number.to-fixed.js");
/* harmony import */ var core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_number_to_fixed_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.object.create.js */ "./node_modules/core-js/modules/es.object.create.js");
/* harmony import */ var core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_create_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.object.define-property.js */ "./node_modules/core-js/modules/es.object.define-property.js");
/* harmony import */ var core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_define_property_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/es.object.get-prototype-of.js */ "./node_modules/core-js/modules/es.object.get-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_get_prototype_of_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! core-js/modules/es.object.proto.js */ "./node_modules/core-js/modules/es.object.proto.js");
/* harmony import */ var core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_proto_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! core-js/modules/es.object.set-prototype-of.js */ "./node_modules/core-js/modules/es.object.set-prototype-of.js");
/* harmony import */ var core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_set_prototype_of_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
/* harmony import */ var core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_promise_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_25___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_25__);
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_26___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_26__);
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string.js */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_27___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string_js__WEBPACK_IMPORTED_MODULE_27__);
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_28___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_28__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_29___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_29__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_30___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_30__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_31___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_31__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_32___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_32__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_33__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_33___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_33__);
/* harmony import */ var core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_34__ = __webpack_require__(/*! core-js/modules/web.timers.js */ "./node_modules/core-js/modules/web.timers.js");
/* harmony import */ var core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_34___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_timers_js__WEBPACK_IMPORTED_MODULE_34__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_35__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_35___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_35__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'axios'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module './StarRating.css'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }



































function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/babel/babel/blob/main/packages/babel-helpers/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return r; }; var t, r = {}, e = Object.prototype, n = e.hasOwnProperty, o = "function" == typeof Symbol ? Symbol : {}, i = o.iterator || "@@iterator", a = o.asyncIterator || "@@asyncIterator", u = o.toStringTag || "@@toStringTag"; function c(t, r, e, n) { return Object.defineProperty(t, r, { value: e, enumerable: !n, configurable: !n, writable: !n }); } try { c({}, ""); } catch (t) { c = function c(t, r, e) { return t[r] = e; }; } function h(r, e, n, o) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype); return c(a, "_invoke", function (r, e, n) { var o = 1; return function (i, a) { if (3 === o) throw Error("Generator is already running"); if (4 === o) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var u = n.delegate; if (u) { var c = d(u, n); if (c) { if (c === f) continue; return c; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (1 === o) throw o = 4, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = 3; var h = s(r, e, n); if ("normal" === h.type) { if (o = n.done ? 4 : 2, h.arg === f) continue; return { value: h.arg, done: n.done }; } "throw" === h.type && (o = 4, n.method = "throw", n.arg = h.arg); } }; }(r, n, new Context(o || [])), !0), a; } function s(t, r, e) { try { return { type: "normal", arg: t.call(r, e) }; } catch (t) { return { type: "throw", arg: t }; } } r.wrap = h; var f = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var l = {}; c(l, i, function () { return this; }); var p = Object.getPrototypeOf, y = p && p(p(x([]))); y && y !== e && n.call(y, i) && (l = y); var v = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(l); function g(t) { ["next", "throw", "return"].forEach(function (r) { c(t, r, function (t) { return this._invoke(r, t); }); }); } function AsyncIterator(t, r) { function e(o, i, a, u) { var c = s(t[o], t, i); if ("throw" !== c.type) { var h = c.arg, f = h.value; return f && "object" == _typeof(f) && n.call(f, "__await") ? r.resolve(f.__await).then(function (t) { e("next", t, a, u); }, function (t) { e("throw", t, a, u); }) : r.resolve(f).then(function (t) { h.value = t, a(h); }, function (t) { return e("throw", t, a, u); }); } u(c.arg); } var o; c(this, "_invoke", function (t, n) { function i() { return new r(function (r, o) { e(t, n, r, o); }); } return o = o ? o.then(i, i) : i(); }, !0); } function d(r, e) { var n = e.method, o = r.i[n]; if (o === t) return e.delegate = null, "throw" === n && r.i["return"] && (e.method = "return", e.arg = t, d(r, e), "throw" === e.method) || "return" !== n && (e.method = "throw", e.arg = new TypeError("The iterator does not provide a '" + n + "' method")), f; var i = s(o, r.i, e.arg); if ("throw" === i.type) return e.method = "throw", e.arg = i.arg, e.delegate = null, f; var a = i.arg; return a ? a.done ? (e[r.r] = a.value, e.next = r.n, "return" !== e.method && (e.method = "next", e.arg = t), e.delegate = null, f) : a : (e.method = "throw", e.arg = new TypeError("iterator result is not an object"), e.delegate = null, f); } function w(t) { this.tryEntries.push(t); } function m(r) { var e = r[4] || {}; e.type = "normal", e.arg = t, r[4] = e; } function Context(t) { this.tryEntries = [[-1]], t.forEach(w, this), this.reset(!0); } function x(r) { if (null != r) { var e = r[i]; if (e) return e.call(r); if ("function" == typeof r.next) return r; if (!isNaN(r.length)) { var o = -1, a = function e() { for (; ++o < r.length;) if (n.call(r, o)) return e.value = r[o], e.done = !1, e; return e.value = t, e.done = !0, e; }; return a.next = a; } } throw new TypeError(_typeof(r) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, c(v, "constructor", GeneratorFunctionPrototype), c(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = c(GeneratorFunctionPrototype, u, "GeneratorFunction"), r.isGeneratorFunction = function (t) { var r = "function" == typeof t && t.constructor; return !!r && (r === GeneratorFunction || "GeneratorFunction" === (r.displayName || r.name)); }, r.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, c(t, u, "GeneratorFunction")), t.prototype = Object.create(v), t; }, r.awrap = function (t) { return { __await: t }; }, g(AsyncIterator.prototype), c(AsyncIterator.prototype, a, function () { return this; }), r.AsyncIterator = AsyncIterator, r.async = function (t, e, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(h(t, e, n, o), i); return r.isGeneratorFunction(e) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, g(v), c(v, u, "Generator"), c(v, i, function () { return this; }), c(v, "toString", function () { return "[object Generator]"; }), r.keys = function (t) { var r = Object(t), e = []; for (var n in r) e.unshift(n); return function t() { for (; e.length;) if ((n = e.pop()) in r) return t.value = n, t.done = !1, t; return t.done = !0, t; }; }, r.values = x, Context.prototype = { constructor: Context, reset: function reset(r) { if (this.prev = this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(m), !r) for (var e in this) "t" === e.charAt(0) && n.call(this, e) && !isNaN(+e.slice(1)) && (this[e] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0][4]; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(r) { if (this.done) throw r; var e = this; function n(t) { a.type = "throw", a.arg = r, e.next = t; } for (var o = e.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i[4], u = this.prev, c = i[1], h = i[2]; if (-1 === i[0]) return n("end"), !1; if (!c && !h) throw Error("try statement without catch or finally"); if (null != i[0] && i[0] <= u) { if (u < c) return this.method = "next", this.arg = t, n(c), !0; if (u < h) return n(h), !1; } } }, abrupt: function abrupt(t, r) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var n = this.tryEntries[e]; if (n[0] > -1 && n[0] <= this.prev && this.prev < n[2]) { var o = n; break; } } o && ("break" === t || "continue" === t) && o[0] <= r && r <= o[2] && (o = null); var i = o ? o[4] : {}; return i.type = t, i.arg = r, o ? (this.method = "next", this.next = o[2], f) : this.complete(i); }, complete: function complete(t, r) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && r && (this.next = r), f; }, finish: function finish(t) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var e = this.tryEntries[r]; if (e[2] === t) return this.complete(e[4], e[3]), m(e), f; } }, "catch": function _catch(t) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var e = this.tryEntries[r]; if (e[0] === t) { var n = e[4]; if ("throw" === n.type) { var o = n.arg; m(e); } return o; } } throw Error("illegal catch attempt"); }, delegateYield: function delegateYield(r, e, n) { return this.delegate = { i: x(r), r: e, n: n }, "next" === this.method && (this.arg = t), f; } }, r; }
function asyncGeneratorStep(n, t, e, r, o, a, c) { try { var i = n[a](c), u = i.value; } catch (n) { return void e(n); } i.done ? t(u) : Promise.resolve(u).then(r, o); }
function _asyncToGenerator(n) { return function () { var t = this, e = arguments; return new Promise(function (r, o) { var a = n.apply(t, e); function _next(n) { asyncGeneratorStep(a, r, o, _next, _throw, "next", n); } function _throw(n) { asyncGeneratorStep(a, r, o, _next, _throw, "throw", n); } _next(void 0); }); }; }
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }




var StarRating = function StarRating(_ref) {
  var showId = _ref.showId,
    isLoggedIn = _ref.isLoggedIn;
  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(0),
    _useState2 = _slicedToArray(_useState, 2),
    rating = _useState2[0],
    setRating = _useState2[1];
  var _useState3 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(0),
    _useState4 = _slicedToArray(_useState3, 2),
    hoverRating = _useState4[0],
    setHoverRating = _useState4[1];
  var _useState5 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(0),
    _useState6 = _slicedToArray(_useState5, 2),
    averageRating = _useState6[0],
    setAverageRating = _useState6[1];
  var _useState7 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(0),
    _useState8 = _slicedToArray(_useState7, 2),
    totalRatings = _useState8[0],
    setTotalRatings = _useState8[1];
  var _useState9 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(0),
    _useState0 = _slicedToArray(_useState9, 2),
    userRating = _useState0[0],
    setUserRating = _useState0[1];
  var _useState1 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(''),
    _useState10 = _slicedToArray(_useState1, 2),
    message = _useState10[0],
    setMessage = _useState10[1];
  var _useState11 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(true),
    _useState12 = _slicedToArray(_useState11, 2),
    loading = _useState12[0],
    setLoading = _useState12[1];
  var _useState13 = (0,react__WEBPACK_IMPORTED_MODULE_35__.useState)(null),
    _useState14 = _slicedToArray(_useState13, 2),
    error = _useState14[0],
    setError = _useState14[1];

  // Logs de débogage
  (0,react__WEBPACK_IMPORTED_MODULE_35__.useEffect)(function () {
    console.log('StarRating component mounted with props:', {
      showId: showId,
      isLoggedIn: isLoggedIn
    });
  }, [showId, isLoggedIn]);

  // Charger les données de notation au chargement du composant
  (0,react__WEBPACK_IMPORTED_MODULE_35__.useEffect)(function () {
    if (showId) {
      fetchRatings();
    }
  }, [showId]);
  var fetchRatings = /*#__PURE__*/function () {
    var _ref2 = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
      var response;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) switch (_context.prev = _context.next) {
          case 0:
            _context.prev = 0;
            setLoading(true);
            console.log("Fetching ratings for show ".concat(showId, "..."));
            _context.next = 5;
            return Object(function webpackMissingModule() { var e = new Error("Cannot find module 'axios'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())("/api/shows/".concat(showId, "/ratings"));
          case 5:
            response = _context.sent;
            console.log('API response:', response.data);
            setAverageRating(response.data.averageRating || 0);
            setTotalRatings(response.data.totalRatings || 0);
            if (response.data.userRating) {
              setUserRating(response.data.userRating);
              setRating(response.data.userRating);
            }
            setError(null);
            _context.next = 17;
            break;
          case 13:
            _context.prev = 13;
            _context.t0 = _context["catch"](0);
            console.error('Error fetching ratings:', _context.t0);
            setError('Impossible de charger les notations');
          case 17:
            _context.prev = 17;
            setLoading(false);
            return _context.finish(17);
          case 20:
          case "end":
            return _context.stop();
        }
      }, _callee, null, [[0, 13, 17, 20]]);
    }));
    return function fetchRatings() {
      return _ref2.apply(this, arguments);
    };
  }();
  var handleMouseOver = function handleMouseOver(index) {
    if (isLoggedIn) {
      setHoverRating(index);
    }
  };
  var handleMouseLeave = function handleMouseLeave() {
    setHoverRating(0);
  };
  var handleClick = /*#__PURE__*/function () {
    var _ref3 = _asyncToGenerator(/*#__PURE__*/_regeneratorRuntime().mark(function _callee2(index) {
      var response;
      return _regeneratorRuntime().wrap(function _callee2$(_context2) {
        while (1) switch (_context2.prev = _context2.next) {
          case 0:
            if (isLoggedIn) {
              _context2.next = 4;
              break;
            }
            setMessage('Veuillez vous connecter pour noter ce spectacle');
            setTimeout(function () {
              return setMessage('');
            }, 3000);
            return _context2.abrupt("return");
          case 4:
            _context2.prev = 4;
            console.log("Submitting rating ".concat(index, " for show ").concat(showId, "..."));
            _context2.next = 8;
            return Object(function webpackMissingModule() { var e = new Error("Cannot find module 'axios'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())("/api/shows/".concat(showId, "/rate"), {
              score: index
            });
          case 8:
            response = _context2.sent;
            console.log('Rating submitted:', response.data);
            setRating(index);
            setUserRating(index);
            setAverageRating(response.data.averageRating || 0);
            setTotalRatings(response.data.totalRatings || 0);
            setMessage("Vous avez not\xE9 ce spectacle ".concat(index, " \xE9toile").concat(index > 1 ? 's' : '', " !"));
            setTimeout(function () {
              return setMessage('');
            }, 3000);
            _context2.next = 23;
            break;
          case 18:
            _context2.prev = 18;
            _context2.t0 = _context2["catch"](4);
            console.error('Error submitting rating:', _context2.t0);
            setMessage('Une erreur est survenue lors de la notation');
            setTimeout(function () {
              return setMessage('');
            }, 3000);
          case 23:
          case "end":
            return _context2.stop();
        }
      }, _callee2, null, [[4, 18]]);
    }));
    return function handleClick(_x) {
      return _ref3.apply(this, arguments);
    };
  }();
  if (loading) {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("div", {
      className: "star-rating-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("p", {
        children: "Chargement des notations..."
      })
    });
  }
  if (error) {
    return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("div", {
      className: "star-rating-container",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("p", {
        className: "error-message",
        children: error
      })
    });
  }
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)("div", {
    className: "star-rating-container",
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("div", {
      className: "stars",
      children: [1, 2, 3, 4, 5].map(function (index) {
        return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("span", {
          className: "star ".concat(hoverRating >= index ? 'hover' : '', " ").concat(rating >= index ? 'selected' : ''),
          onMouseOver: function onMouseOver() {
            return handleMouseOver(index);
          },
          onMouseLeave: handleMouseLeave,
          onClick: function onClick() {
            return handleClick(index);
          },
          title: isLoggedIn ? "Noter ".concat(index, " \xE9toile").concat(index > 1 ? 's' : '') : 'Connectez-vous pour noter',
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("i", {
            className: "".concat(hoverRating >= index || rating >= index ? 'fas' : 'far', " fa-star")
          })
        }, index);
      })
    }), message && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("div", {
      className: "rating-message ".concat(message.includes('erreur') ? 'error' : 'success'),
      children: message
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("div", {
      className: "rating-info",
      children: averageRating > 0 ? /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.Fragment, {
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)("span", {
          className: "average-rating",
          children: ["Note moyenne: ", averageRating.toFixed(1), "/5"]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)("span", {
          className: "total-ratings",
          children: ["(", totalRatings, " avis)"]
        })]
      }) : /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("span", {
        children: "Aucune note pour le moment"
      })
    }), !isLoggedIn && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)("div", {
      className: "login-message",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsx)("a", {
        href: "/login",
        children: "Connectez-vous"
      }), " pour noter ce spectacle"]
    }), isLoggedIn && userRating > 0 && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_37__.jsxs)("div", {
      className: "user-rating",
      children: ["Votre note : ", userRating, "/5"]
    })]
  });
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (StarRating);

/***/ }),

/***/ "./assets/js/rating-app.js":
/*!*********************************!*\
  !*** ./assets/js/rating-app.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_dom_client__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom/client */ "./node_modules/react-dom/client.js");
/* harmony import */ var _components_StarRating__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/StarRating */ "./assets/js/components/StarRating.jsx");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "./node_modules/react/jsx-runtime.js");




// Initialisation du composant lorsque le DOM est chargé

document.addEventListener('DOMContentLoaded', function () {
  var starRatingElement = document.getElementById('star-rating-component');
  if (starRatingElement) {
    var showId = starRatingElement.dataset.showId;
    var userLoggedIn = starRatingElement.dataset.userLoggedIn;
    var root = (0,react_dom_client__WEBPACK_IMPORTED_MODULE_1__.createRoot)(starRatingElement);
    root.render(/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_components_StarRating__WEBPACK_IMPORTED_MODULE_2__["default"], {
      showId: showId
    }));
  }
});

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_a-constructor_js-node_modules_core-js_internals_this-n-922b27","vendors-node_modules_core-js_internals_array-method-is-strict_js-node_modules_core-js_interna-e75963","vendors-node_modules_react-dom_client_js-node_modules_react_jsx-runtime_js-node_modules_core--bfd62e"], () => (__webpack_exec__("./assets/js/rating-app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q3pCekIsd0RBQUE7TUFBSytELFNBQVMsRUFBQyxhQUFhO01BQUFDLFFBQUEsR0FBQyxlQUNaLEVBQUN2QyxVQUFVLEVBQUMsSUFDN0I7SUFBQSxDQUFLLENBQ1I7RUFBQSxDQUNBLENBQUM7QUFFZCxDQUFDO0FBRUQsaUVBQWV0QixVQUFVOzs7Ozs7Ozs7Ozs7Ozs7O0FDaEtDO0FBQ29CO0FBQ0c7O0FBRWpEO0FBQUE7QUFDQXVFLFFBQVEsQ0FBQ0MsZ0JBQWdCLENBQUMsa0JBQWtCLEVBQUUsWUFBTTtFQUNoRCxJQUFNQyxpQkFBaUIsR0FBR0YsUUFBUSxDQUFDRyxjQUFjLENBQUMsdUJBQXVCLENBQUM7RUFFMUUsSUFBSUQsaUJBQWlCLEVBQUU7SUFDbkIsSUFBTXZFLE1BQU0sR0FBR3VFLGlCQUFpQixDQUFDRSxPQUFPLENBQUN6RSxNQUFNO0lBQy9DLElBQU0wRSxZQUFZLEdBQUdILGlCQUFpQixDQUFDRSxPQUFPLENBQUNDLFlBQVk7SUFFM0QsSUFBTUMsSUFBSSxHQUFHUCw0REFBVSxDQUFDRyxpQkFBaUIsQ0FBQztJQUMxQ0ksSUFBSSxDQUFDQyxNQUFNLGNBQUNuRixzREFBQSxDQUFDSyw4REFBVTtNQUFDRSxNQUFNLEVBQUVBO0lBQU8sQ0FBRSxDQUFDLENBQUM7RUFDL0M7QUFDSixDQUFDLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvY29tcG9uZW50cy9TdGFyUmF0aW5nLmpzeCIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvcmF0aW5nLWFwcC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgUmVhY3QsIHsgdXNlU3RhdGUsIHVzZUVmZmVjdCB9IGZyb20gJ3JlYWN0JztcbmltcG9ydCBheGlvcyBmcm9tICdheGlvcyc7XG5pbXBvcnQgJy4vU3RhclJhdGluZy5jc3MnO1xuXG5jb25zdCBTdGFyUmF0aW5nID0gKHsgc2hvd0lkLCBpc0xvZ2dlZEluIH0pID0+IHtcbiAgICBjb25zdCBbcmF0aW5nLCBzZXRSYXRpbmddID0gdXNlU3RhdGUoMCk7XG4gICAgY29uc3QgW2hvdmVyUmF0aW5nLCBzZXRIb3ZlclJhdGluZ10gPSB1c2VTdGF0ZSgwKTtcbiAgICBjb25zdCBbYXZlcmFnZVJhdGluZywgc2V0QXZlcmFnZVJhdGluZ10gPSB1c2VTdGF0ZSgwKTtcbiAgICBjb25zdCBbdG90YWxSYXRpbmdzLCBzZXRUb3RhbFJhdGluZ3NdID0gdXNlU3RhdGUoMCk7XG4gICAgY29uc3QgW3VzZXJSYXRpbmcsIHNldFVzZXJSYXRpbmddID0gdXNlU3RhdGUoMCk7XG4gICAgY29uc3QgW21lc3NhZ2UsIHNldE1lc3NhZ2VdID0gdXNlU3RhdGUoJycpO1xuICAgIGNvbnN0IFtsb2FkaW5nLCBzZXRMb2FkaW5nXSA9IHVzZVN0YXRlKHRydWUpO1xuICAgIGNvbnN0IFtlcnJvciwgc2V0RXJyb3JdID0gdXNlU3RhdGUobnVsbCk7XG5cbiAgICAvLyBMb2dzIGRlIGTDqWJvZ2FnZVxuICAgIHVzZUVmZmVjdCgoKSA9PiB7XG4gICAgICAgIGNvbnNvbGUubG9nKCdTdGFyUmF0aW5nIGNvbXBvbmVudCBtb3VudGVkIHdpdGggcHJvcHM6JywgeyBzaG93SWQsIGlzTG9nZ2VkSW4gfSk7XG4gICAgfSwgW3Nob3dJZCwgaXNMb2dnZWRJbl0pO1xuXG4gICAgLy8gQ2hhcmdlciBsZXMgZG9ubsOpZXMgZGUgbm90YXRpb24gYXUgY2hhcmdlbWVudCBkdSBjb21wb3NhbnRcbiAgICB1c2VFZmZlY3QoKCkgPT4ge1xuICAgICAgICBpZiAoc2hvd0lkKSB7XG4gICAgICAgICAgICBmZXRjaFJhdGluZ3MoKTtcbiAgICAgICAgfVxuICAgIH0sIFtzaG93SWRdKTtcblxuICAgIGNvbnN0IGZldGNoUmF0aW5ncyA9IGFzeW5jICgpID0+IHtcbiAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgIHNldExvYWRpbmcodHJ1ZSk7XG4gICAgICAgICAgICBjb25zb2xlLmxvZyhgRmV0Y2hpbmcgcmF0aW5ncyBmb3Igc2hvdyAke3Nob3dJZH0uLi5gKTtcblxuICAgICAgICAgICAgY29uc3QgcmVzcG9uc2UgPSBhd2FpdCBheGlvcy5nZXQoYC9hcGkvc2hvd3MvJHtzaG93SWR9L3JhdGluZ3NgKTtcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKCdBUEkgcmVzcG9uc2U6JywgcmVzcG9uc2UuZGF0YSk7XG5cbiAgICAgICAgICAgIHNldEF2ZXJhZ2VSYXRpbmcocmVzcG9uc2UuZGF0YS5hdmVyYWdlUmF0aW5nIHx8IDApO1xuICAgICAgICAgICAgc2V0VG90YWxSYXRpbmdzKHJlc3BvbnNlLmRhdGEudG90YWxSYXRpbmdzIHx8IDApO1xuXG4gICAgICAgICAgICBpZiAocmVzcG9uc2UuZGF0YS51c2VyUmF0aW5nKSB7XG4gICAgICAgICAgICAgICAgc2V0VXNlclJhdGluZyhyZXNwb25zZS5kYXRhLnVzZXJSYXRpbmcpO1xuICAgICAgICAgICAgICAgIHNldFJhdGluZyhyZXNwb25zZS5kYXRhLnVzZXJSYXRpbmcpO1xuICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICBzZXRFcnJvcihudWxsKTtcbiAgICAgICAgfSBjYXRjaCAoZXJyb3IpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoJ0Vycm9yIGZldGNoaW5nIHJhdGluZ3M6JywgZXJyb3IpO1xuICAgICAgICAgICAgc2V0RXJyb3IoJ0ltcG9zc2libGUgZGUgY2hhcmdlciBsZXMgbm90YXRpb25zJyk7XG4gICAgICAgIH0gZmluYWxseSB7XG4gICAgICAgICAgICBzZXRMb2FkaW5nKGZhbHNlKTtcbiAgICAgICAgfVxuICAgIH07XG5cbiAgICBjb25zdCBoYW5kbGVNb3VzZU92ZXIgPSAoaW5kZXgpID0+IHtcbiAgICAgICAgaWYgKGlzTG9nZ2VkSW4pIHtcbiAgICAgICAgICAgIHNldEhvdmVyUmF0aW5nKGluZGV4KTtcbiAgICAgICAgfVxuICAgIH07XG5cbiAgICBjb25zdCBoYW5kbGVNb3VzZUxlYXZlID0gKCkgPT4ge1xuICAgICAgICBzZXRIb3ZlclJhdGluZygwKTtcbiAgICB9O1xuXG4gICAgY29uc3QgaGFuZGxlQ2xpY2sgPSBhc3luYyAoaW5kZXgpID0+IHtcbiAgICAgICAgaWYgKCFpc0xvZ2dlZEluKSB7XG4gICAgICAgICAgICBzZXRNZXNzYWdlKCdWZXVpbGxleiB2b3VzIGNvbm5lY3RlciBwb3VyIG5vdGVyIGNlIHNwZWN0YWNsZScpO1xuICAgICAgICAgICAgc2V0VGltZW91dCgoKSA9PiBzZXRNZXNzYWdlKCcnKSwgMzAwMCk7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICB0cnkge1xuICAgICAgICAgICAgY29uc29sZS5sb2coYFN1Ym1pdHRpbmcgcmF0aW5nICR7aW5kZXh9IGZvciBzaG93ICR7c2hvd0lkfS4uLmApO1xuXG4gICAgICAgICAgICBjb25zdCByZXNwb25zZSA9IGF3YWl0IGF4aW9zLnBvc3QoYC9hcGkvc2hvd3MvJHtzaG93SWR9L3JhdGVgLCB7XG4gICAgICAgICAgICAgICAgc2NvcmU6IGluZGV4XG4gICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgY29uc29sZS5sb2coJ1JhdGluZyBzdWJtaXR0ZWQ6JywgcmVzcG9uc2UuZGF0YSk7XG5cbiAgICAgICAgICAgIHNldFJhdGluZyhpbmRleCk7XG4gICAgICAgICAgICBzZXRVc2VyUmF0aW5nKGluZGV4KTtcbiAgICAgICAgICAgIHNldEF2ZXJhZ2VSYXRpbmcocmVzcG9uc2UuZGF0YS5hdmVyYWdlUmF0aW5nIHx8IDApO1xuICAgICAgICAgICAgc2V0VG90YWxSYXRpbmdzKHJlc3BvbnNlLmRhdGEudG90YWxSYXRpbmdzIHx8IDApO1xuICAgICAgICAgICAgc2V0TWVzc2FnZShgVm91cyBhdmV6IG5vdMOpIGNlIHNwZWN0YWNsZSAke2luZGV4fSDDqXRvaWxlJHtpbmRleCA+IDEgPyAncycgOiAnJ30gIWApO1xuXG4gICAgICAgICAgICBzZXRUaW1lb3V0KCgpID0+IHNldE1lc3NhZ2UoJycpLCAzMDAwKTtcbiAgICAgICAgfSBjYXRjaCAoZXJyb3IpIHtcbiAgICAgICAgICAgIGNvbnNvbGUuZXJyb3IoJ0Vycm9yIHN1Ym1pdHRpbmcgcmF0aW5nOicsIGVycm9yKTtcbiAgICAgICAgICAgIHNldE1lc3NhZ2UoJ1VuZSBlcnJldXIgZXN0IHN1cnZlbnVlIGxvcnMgZGUgbGEgbm90YXRpb24nKTtcbiAgICAgICAgICAgIHNldFRpbWVvdXQoKCkgPT4gc2V0TWVzc2FnZSgnJyksIDMwMDApO1xuICAgICAgICB9XG4gICAgfTtcblxuICAgIGlmIChsb2FkaW5nKSB7XG4gICAgICAgIHJldHVybiAoXG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInN0YXItcmF0aW5nLWNvbnRhaW5lclwiPlxuICAgICAgICAgICAgICAgIDxwPkNoYXJnZW1lbnQgZGVzIG5vdGF0aW9ucy4uLjwvcD5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cblxuICAgIGlmIChlcnJvcikge1xuICAgICAgICByZXR1cm4gKFxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJzdGFyLXJhdGluZy1jb250YWluZXJcIj5cbiAgICAgICAgICAgICAgICA8cCBjbGFzc05hbWU9XCJlcnJvci1tZXNzYWdlXCI+e2Vycm9yfTwvcD5cbiAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICApO1xuICAgIH1cblxuICAgIHJldHVybiAoXG4gICAgICAgIDxkaXYgY2xhc3NOYW1lPVwic3Rhci1yYXRpbmctY29udGFpbmVyXCI+XG4gICAgICAgICAgICA8ZGl2IGNsYXNzTmFtZT1cInN0YXJzXCI+XG4gICAgICAgICAgICAgICAge1sxLCAyLCAzLCA0LCA1XS5tYXAoKGluZGV4KSA9PiAoXG4gICAgICAgICAgICAgICAgICAgIDxzcGFuXG4gICAgICAgICAgICAgICAgICAgICAgICBrZXk9e2luZGV4fVxuICAgICAgICAgICAgICAgICAgICAgICAgY2xhc3NOYW1lPXtgc3RhciAke2hvdmVyUmF0aW5nID49IGluZGV4ID8gJ2hvdmVyJyA6ICcnfSAke3JhdGluZyA+PSBpbmRleCA/ICdzZWxlY3RlZCcgOiAnJ31gfVxuICAgICAgICAgICAgICAgICAgICAgICAgb25Nb3VzZU92ZXI9eygpID0+IGhhbmRsZU1vdXNlT3ZlcihpbmRleCl9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbk1vdXNlTGVhdmU9e2hhbmRsZU1vdXNlTGVhdmV9XG4gICAgICAgICAgICAgICAgICAgICAgICBvbkNsaWNrPXsoKSA9PiBoYW5kbGVDbGljayhpbmRleCl9XG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZT17aXNMb2dnZWRJbiA/IGBOb3RlciAke2luZGV4fSDDqXRvaWxlJHtpbmRleCA+IDEgPyAncycgOiAnJ31gIDogJ0Nvbm5lY3Rlei12b3VzIHBvdXIgbm90ZXInfVxuICAgICAgICAgICAgICAgICAgICA+XG4gICAgICAgICAgICA8aSBjbGFzc05hbWU9e2Akeyhob3ZlclJhdGluZyA+PSBpbmRleCB8fCByYXRpbmcgPj0gaW5kZXgpID8gJ2ZhcycgOiAnZmFyJ30gZmEtc3RhcmB9PjwvaT5cbiAgICAgICAgICA8L3NwYW4+XG4gICAgICAgICAgICAgICAgKSl9XG4gICAgICAgICAgICA8L2Rpdj5cblxuICAgICAgICAgICAge21lc3NhZ2UgJiYgKFxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPXtgcmF0aW5nLW1lc3NhZ2UgJHttZXNzYWdlLmluY2x1ZGVzKCdlcnJldXInKSA/ICdlcnJvcicgOiAnc3VjY2Vzcyd9YH0+XG4gICAgICAgICAgICAgICAgICAgIHttZXNzYWdlfVxuICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgKX1cblxuICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJyYXRpbmctaW5mb1wiPlxuICAgICAgICAgICAgICAgIHthdmVyYWdlUmF0aW5nID4gMCA/IChcbiAgICAgICAgICAgICAgICAgICAgPD5cbiAgICAgICAgICAgIDxzcGFuIGNsYXNzTmFtZT1cImF2ZXJhZ2UtcmF0aW5nXCI+XG4gICAgICAgICAgICAgIE5vdGUgbW95ZW5uZToge2F2ZXJhZ2VSYXRpbmcudG9GaXhlZCgxKX0vNVxuICAgICAgICAgICAgPC9zcGFuPlxuICAgICAgICAgICAgICAgICAgICAgICAgPHNwYW4gY2xhc3NOYW1lPVwidG90YWwtcmF0aW5nc1wiPlxuICAgICAgICAgICAgICAoe3RvdGFsUmF0aW5nc30gYXZpcylcbiAgICAgICAgICAgIDwvc3Bhbj5cbiAgICAgICAgICAgICAgICAgICAgPC8+XG4gICAgICAgICAgICAgICAgKSA6IChcbiAgICAgICAgICAgICAgICAgICAgPHNwYW4+QXVjdW5lIG5vdGUgcG91ciBsZSBtb21lbnQ8L3NwYW4+XG4gICAgICAgICAgICAgICAgKX1cbiAgICAgICAgICAgIDwvZGl2PlxuXG4gICAgICAgICAgICB7IWlzTG9nZ2VkSW4gJiYgKFxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3NOYW1lPVwibG9naW4tbWVzc2FnZVwiPlxuICAgICAgICAgICAgICAgICAgICA8YSBocmVmPVwiL2xvZ2luXCI+Q29ubmVjdGV6LXZvdXM8L2E+IHBvdXIgbm90ZXIgY2Ugc3BlY3RhY2xlXG4gICAgICAgICAgICAgICAgPC9kaXY+XG4gICAgICAgICAgICApfVxuXG4gICAgICAgICAgICB7aXNMb2dnZWRJbiAmJiB1c2VyUmF0aW5nID4gMCAmJiAoXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzc05hbWU9XCJ1c2VyLXJhdGluZ1wiPlxuICAgICAgICAgICAgICAgICAgICBWb3RyZSBub3RlIDoge3VzZXJSYXRpbmd9LzVcbiAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICl9XG4gICAgICAgIDwvZGl2PlxuICAgICk7XG59O1xuXG5leHBvcnQgZGVmYXVsdCBTdGFyUmF0aW5nOyIsImltcG9ydCBSZWFjdCBmcm9tICdyZWFjdCc7XG5pbXBvcnQgeyBjcmVhdGVSb290IH0gZnJvbSAncmVhY3QtZG9tL2NsaWVudCc7XG5pbXBvcnQgU3RhclJhdGluZyBmcm9tICcuL2NvbXBvbmVudHMvU3RhclJhdGluZyc7XG5cbi8vIEluaXRpYWxpc2F0aW9uIGR1IGNvbXBvc2FudCBsb3JzcXVlIGxlIERPTSBlc3QgY2hhcmfDqVxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcbiAgICBjb25zdCBzdGFyUmF0aW5nRWxlbWVudCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzdGFyLXJhdGluZy1jb21wb25lbnQnKTtcblxuICAgIGlmIChzdGFyUmF0aW5nRWxlbWVudCkge1xuICAgICAgICBjb25zdCBzaG93SWQgPSBzdGFyUmF0aW5nRWxlbWVudC5kYXRhc2V0LnNob3dJZDtcbiAgICAgICAgY29uc3QgdXNlckxvZ2dlZEluID0gc3RhclJhdGluZ0VsZW1lbnQuZGF0YXNldC51c2VyTG9nZ2VkSW47XG5cbiAgICAgICAgY29uc3Qgcm9vdCA9IGNyZWF0ZVJvb3Qoc3RhclJhdGluZ0VsZW1lbnQpO1xuICAgICAgICByb290LnJlbmRlcig8U3RhclJhdGluZyBzaG93SWQ9e3Nob3dJZH0gLz4pO1xuICAgIH1cbn0pOyJdLCJuYW1lcyI6WyJfcmVnZW5lcmF0b3JSdW50aW1lIiwiciIsInQiLCJlIiwiT2JqZWN0IiwicHJvdG90eXBlIiwibiIsImhhc093blByb3BlcnR5IiwibyIsIlN5bWJvbCIsImkiLCJpdGVyYXRvciIsImEiLCJhc3luY0l0ZXJhdG9yIiwidSIsInRvU3RyaW5nVGFnIiwiYyIsImRlZmluZVByb3BlcnR5IiwidmFsdWUiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwid3JpdGFibGUiLCJoIiwiR2VuZXJhdG9yIiwiY3JlYXRlIiwiRXJyb3IiLCJkb25lIiwibWV0aG9kIiwiYXJnIiwiZGVsZWdhdGUiLCJkIiwiZiIsInNlbnQiLCJfc2VudCIsImRpc3BhdGNoRXhjZXB0aW9uIiwiYWJydXB0IiwicyIsInR5cGUiLCJDb250ZXh0IiwiY2FsbCIsIndyYXAiLCJHZW5lcmF0b3JGdW5jdGlvbiIsIkdlbmVyYXRvckZ1bmN0aW9uUHJvdG90eXBlIiwibCIsInAiLCJnZXRQcm90b3R5cGVPZiIsInkiLCJ4IiwidiIsImciLCJmb3JFYWNoIiwiX2ludm9rZSIsIkFzeW5jSXRlcmF0b3IiLCJfdHlwZW9mIiwicmVzb2x2ZSIsIl9fYXdhaXQiLCJ0aGVuIiwiVHlwZUVycm9yIiwibmV4dCIsInciLCJ0cnlFbnRyaWVzIiwicHVzaCIsIm0iLCJyZXNldCIsImlzTmFOIiwibGVuZ3RoIiwiZGlzcGxheU5hbWUiLCJpc0dlbmVyYXRvckZ1bmN0aW9uIiwiY29uc3RydWN0b3IiLCJuYW1lIiwibWFyayIsInNldFByb3RvdHlwZU9mIiwiX19wcm90b19fIiwiYXdyYXAiLCJhc3luYyIsIlByb21pc2UiLCJrZXlzIiwidW5zaGlmdCIsInBvcCIsInZhbHVlcyIsInByZXYiLCJjaGFyQXQiLCJzbGljZSIsInN0b3AiLCJydmFsIiwiY29tcGxldGUiLCJmaW5pc2giLCJfY2F0Y2giLCJkZWxlZ2F0ZVlpZWxkIiwiYXN5bmNHZW5lcmF0b3JTdGVwIiwiX2FzeW5jVG9HZW5lcmF0b3IiLCJhcmd1bWVudHMiLCJhcHBseSIsIl9uZXh0IiwiX3Rocm93IiwiX3NsaWNlZFRvQXJyYXkiLCJfYXJyYXlXaXRoSG9sZXMiLCJfaXRlcmFibGVUb0FycmF5TGltaXQiLCJfdW5zdXBwb3J0ZWRJdGVyYWJsZVRvQXJyYXkiLCJfbm9uSXRlcmFibGVSZXN0IiwiX2FycmF5TGlrZVRvQXJyYXkiLCJ0b1N0cmluZyIsIkFycmF5IiwiZnJvbSIsInRlc3QiLCJpc0FycmF5IiwiUmVhY3QiLCJ1c2VTdGF0ZSIsInVzZUVmZmVjdCIsImF4aW9zIiwianN4IiwiX2pzeCIsImpzeHMiLCJfanN4cyIsIkZyYWdtZW50IiwiX0ZyYWdtZW50IiwiU3RhclJhdGluZyIsIl9yZWYiLCJzaG93SWQiLCJpc0xvZ2dlZEluIiwiX3VzZVN0YXRlIiwiX3VzZVN0YXRlMiIsInJhdGluZyIsInNldFJhdGluZyIsIl91c2VTdGF0ZTMiLCJfdXNlU3RhdGU0IiwiaG92ZXJSYXRpbmciLCJzZXRIb3ZlclJhdGluZyIsIl91c2VTdGF0ZTUiLCJfdXNlU3RhdGU2IiwiYXZlcmFnZVJhdGluZyIsInNldEF2ZXJhZ2VSYXRpbmciLCJfdXNlU3RhdGU3IiwiX3VzZVN0YXRlOCIsInRvdGFsUmF0aW5ncyIsInNldFRvdGFsUmF0aW5ncyIsIl91c2VTdGF0ZTkiLCJfdXNlU3RhdGUwIiwidXNlclJhdGluZyIsInNldFVzZXJSYXRpbmciLCJfdXNlU3RhdGUxIiwiX3VzZVN0YXRlMTAiLCJtZXNzYWdlIiwic2V0TWVzc2FnZSIsIl91c2VTdGF0ZTExIiwiX3VzZVN0YXRlMTIiLCJsb2FkaW5nIiwic2V0TG9hZGluZyIsIl91c2VTdGF0ZTEzIiwiX3VzZVN0YXRlMTQiLCJlcnJvciIsInNldEVycm9yIiwiY29uc29sZSIsImxvZyIsImZldGNoUmF0aW5ncyIsIl9yZWYyIiwiX2NhbGxlZSIsInJlc3BvbnNlIiwiX2NhbGxlZSQiLCJfY29udGV4dCIsImNvbmNhdCIsImdldCIsImRhdGEiLCJ0MCIsImhhbmRsZU1vdXNlT3ZlciIsImluZGV4IiwiaGFuZGxlTW91c2VMZWF2ZSIsImhhbmRsZUNsaWNrIiwiX3JlZjMiLCJfY2FsbGVlMiIsIl9jYWxsZWUyJCIsIl9jb250ZXh0MiIsInNldFRpbWVvdXQiLCJwb3N0Iiwic2NvcmUiLCJfeCIsImNsYXNzTmFtZSIsImNoaWxkcmVuIiwibWFwIiwib25Nb3VzZU92ZXIiLCJvbk1vdXNlTGVhdmUiLCJvbkNsaWNrIiwidGl0bGUiLCJpbmNsdWRlcyIsInRvRml4ZWQiLCJocmVmIiwiY3JlYXRlUm9vdCIsImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsInN0YXJSYXRpbmdFbGVtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJkYXRhc2V0IiwidXNlckxvZ2dlZEluIiwicm9vdCIsInJlbmRlciJdLCJzb3VyY2VSb290IjoiIn0=