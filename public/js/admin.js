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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(45);
__webpack_require__(46);
module.exports = __webpack_require__(47);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

(function ($) {

    $(document).ready(function () {
        $('[data-toggle="popover"],.popovered').popover();
        $('[data-toggle="tooltip"],.tooltiped').tooltip();
    });
})(jQuery);

/***/ }),

/***/ 46:
/***/ (function(module, exports) {

(function ($) {
   $(function () {
      var clientSideForm = 'form.ajax-form,form.axios-form';

      $(document).on('submit', clientSideForm, function (e) {
         console.log(this, e);
      });
   });
})(jQuery);

/***/ }),

/***/ 47:
/***/ (function(module, exports) {

(function ($) {

    $(function () {
        var disabledTogglers = '.toggle-disabled,[data-toggle-prop]';

        $(document).find(disabledTogglers).each(function () {

            var defaultTrigger = $(this).is(':input') ? 'change' : 'click';
            var currentTrigger = $(this).data('trigger') || defaultTrigger;
            var destinedTarget = $(this).data('target') || this.hash;
            var attrPropToggled = $(this).data('toggleProp') || $(this).data('value');
            console.log(defaultTrigger, currentTrigger, destinedTarget);

            $(destinedTarget, document).on(currentTrigger, function (e) {
                console.log(this, e);
                $(this).prop(attrPropToggled, !this.is(attrPropToggled));
            });
        });
    });

    $(function () {
        var disabledTogglers = '.toggle-swap,[data-swap]';

        $(document).find(disabledTogglers).each(function () {

            var destinedTarget = $(this).data('target') || this.hash || this;
            var defaultTrigger = $(this).is(':input') ? 'change' : 'click';
            var currentTrigger = $(this).data('trigger') || defaultTrigger;
            console.log(defaultTrigger, currentTrigger, destinedTarget);

            $(destinedTarget, document).on(currentTrigger, function (e) {
                console.log(this, e);
                $(this).text('disabled', !this.disabled);
            });
        });
    });

    var previewFile = function previewFile(event, _id_) {
        console.log(event, _id_);
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.querySelector(_id_);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
})(jQuery);

/***/ })

/******/ });