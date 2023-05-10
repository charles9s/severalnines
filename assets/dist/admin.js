/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/css/admin.scss":
/*!*******************************!*\
  !*** ./assets/css/admin.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("module.exports = __webpack_require__.p + \"../dist/admin.css\";\n\n//# sourceURL=webpack:///./assets/css/admin.scss?");

/***/ }),

/***/ "./assets/js/app-admin.js":
/*!********************************!*\
  !*** ./assets/js/app-admin.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function ($) {\n  /*\n  Baseline font-size doesn't exits by default in Gutenberg html tag. We need to add the baseline manually here,\n  because we can't do it in the admin.scss file(since it extends every class with .editor-wrapper-styles).\n  Without this the font-sizes(with rems) don't look the same in the backend, so this is a workaround for the issue.\n  FYI https://github.com/WordPress/gutenberg/issues/11043\n  */\n  if ($('body').hasClass('block-editor-page')) {\n    $('html').css('font-size', '16px');\n  }\n\n  if ($('#acf-field_625fe01ea30ab').next().hasClass('-on')) {\n    $('body').addClass('clustercontrol');\n  } else {\n    $('body').addClass('ccx');\n  }\n\n  $('#acf-field_625fe01ea30ab').change(function () {\n    if ($(this).next().hasClass('-on')) {\n      $('body').addClass('ccx');\n      $('body').removeClass('clustercontrol');\n    } else {\n      $('body').addClass('clustercontrol');\n      $('body').removeClass('ccx');\n    }\n  });\n})(jQuery);\n\n//# sourceURL=webpack:///./assets/js/app-admin.js?");

/***/ }),

/***/ 0:
/*!**************************************************************!*\
  !*** multi ./assets/css/admin.scss ./assets/js/app-admin.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./assets/css/admin.scss */\"./assets/css/admin.scss\");\nmodule.exports = __webpack_require__(/*! ./assets/js/app-admin.js */\"./assets/js/app-admin.js\");\n\n\n//# sourceURL=webpack:///multi_./assets/css/admin.scss_./assets/js/app-admin.js?");

/***/ })

/******/ });