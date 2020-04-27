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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/ts/formContainers.ts":
/*!****************************************!*\
  !*** ./resources/ts/formContainers.ts ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var scr;
(function (scr) {
    let form;
    (function (form) {
        let containers;
        (function (containers) {
            class FinalizeField {
                constructor(field) {
                    this.field = field;
                    this.__field = field;
                }
                getField() {
                    return this.__field;
                }
            }
            containers.FinalizeField = FinalizeField;
            class ModifiableField {
                constructor(field) {
                    this.setField(field);
                }
                getField() {
                    return this.__field;
                }
                setField(field) {
                    if (field != null)
                        this.__field = ('getField' in field) ? field.getField() : field;
                    return this;
                }
            }
            containers.ModifiableField = ModifiableField;
            class DependantField {
                constructor(value1, value2) {
                    this.value1 = value1;
                    this.value2 = value2;
                    if (value2 == undefined) {
                        this.__field = new ModifiableField();
                        this.__callbackOnModification = value1;
                    }
                    else if ('getField' in value2) {
                        this.__field = value2;
                        this.__callbackOnModification = value1;
                    }
                    else {
                        this.__field = value1;
                        this.__callbackOnModification = value2;
                    }
                }
                getCallbackOnModification() {
                    return this.__callbackOnModification;
                }
                getField() {
                    return this.__field.getField();
                }
                setField(field) {
                    this.__field.setField(field);
                    this.getCallbackOnModification()();
                    return this;
                }
            }
            containers.DependantField = DependantField;
            class CalculatedField {
                constructor(callbackOnModification) {
                    this.callbackOnModification = callbackOnModification;
                    this.__isFieldCalculated = false;
                    this.__field = new ModifiableField();
                    this.__callbackOnModification = callbackOnModification;
                }
                setToCalculated() {
                    this.__isFieldCalculated = true;
                    return this;
                }
                setToNotCalculated() {
                    this.__isFieldCalculated = false;
                    return this;
                }
                getField() {
                    if (!this.__isFieldCalculated) {
                        this.__field.setField(this.__callbackOnModification());
                        this.setToCalculated();
                    }
                    return this.__field.getField();
                }
                setField(field) {
                    this.__field.setField(field);
                    this.setToNotCalculated();
                    return this;
                }
            }
            containers.CalculatedField = CalculatedField;
            class DifferenceField {
                constructor(startField, endField) {
                    this.startField = startField;
                    this.endField = endField;
                    if (startField == undefined) {
                        this.__startField = new ModifiableField();
                        this.__endField = new ModifiableField();
                    }
                    else {
                        this.__startField = startField;
                        this.__endField = endField;
                    }
                }
                getStartField() {
                    return this.__startField;
                }
                getStart() {
                    return this.getStartField().getField();
                }
                setStart(start) {
                    this.getStartField().setField(start);
                    return this;
                }
                getEndField() {
                    return this.__endField;
                }
                getEnd() {
                    return this.getEndField().getField();
                }
                setEnd(end) {
                    this.getEndField().setField(end);
                    return this;
                }
                setBothFields(value1, value2) {
                    return this.setStart(value1).setEnd((value2 == undefined) ? value1 : value2);
                }
            }
            containers.DifferenceField = DifferenceField;
        })(containers = form.containers || (form.containers = {}));
    })(form = scr.form || (scr.form = {}));
})(scr = exports.scr || (exports.scr = {}));
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZm9ybUNvbnRhaW5lcnMuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJmb3JtQ29udGFpbmVycy50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOztBQUFBLElBQWlCLEdBQUcsQ0F3T2pCO0FBeE9ILFdBQWlCLEdBQUc7SUFBQyxJQUFpQixJQUFJLENBd094QztJQXhPbUIsV0FBaUIsSUFBSTtRQUFDLElBQWlCLFVBQVUsQ0F3T3JFO1FBeE8wQyxXQUFpQixVQUFVO1lBcUNsRSxNQUFhLGFBQWE7Z0JBS3RCLFlBQTRCLEtBQVE7b0JBQVIsVUFBSyxHQUFMLEtBQUssQ0FBRztvQkFDaEMsSUFBSSxDQUFDLE9BQU8sR0FBRyxLQUFLLENBQUM7Z0JBQ3pCLENBQUM7Z0JBRU0sUUFBUTtvQkFDWCxPQUFPLElBQUksQ0FBQyxPQUFPLENBQUM7Z0JBQ3hCLENBQUM7YUFFSjtZQWJZLHdCQUFhLGdCQWF6QixDQUFBO1lBTUQsTUFBYSxlQUFlO2dCQU94QixZQUFtQixLQUE4QjtvQkFDN0MsSUFBSSxDQUFDLFFBQVEsQ0FBQyxLQUFLLENBQUMsQ0FBQztnQkFDekIsQ0FBQztnQkFFTSxRQUFRO29CQUNYLE9BQU8sSUFBSSxDQUFDLE9BQU8sQ0FBQztnQkFDeEIsQ0FBQztnQkFFTSxRQUFRLENBQUMsS0FBNkI7b0JBQ3pDLElBQUksS0FBSyxJQUFJLElBQUk7d0JBQ2IsSUFBSSxDQUFDLE9BQU8sR0FBRyxDQUFDLFVBQVUsSUFBSSxLQUFLLENBQUMsQ0FBQyxDQUFDLENBQUMsS0FBSyxDQUFDLFFBQVEsRUFBRSxDQUFDLENBQUMsQ0FBQyxLQUFLLENBQUM7b0JBQ3BFLE9BQU8sSUFBSSxDQUFDO2dCQUNoQixDQUFDO2FBRUo7WUFyQlksMEJBQWUsa0JBcUIzQixDQUFBO1lBUUQsTUFBYSxjQUFjO2dCQVN2QixZQUE0QixNQUFzQyxFQUFXLE1BQXVDO29CQUF4RixXQUFNLEdBQU4sTUFBTSxDQUFnQztvQkFBVyxXQUFNLEdBQU4sTUFBTSxDQUFpQztvQkFDaEgs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

/***/ }),

/***/ 3:
/*!**********************************************!*\
  !*** multi ./resources/ts/formContainers.ts ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! c:\xampp\htdocs\public_html\7-taxi\resources\ts\formContainers.ts */"./resources/ts/formContainers.ts");


/***/ })

/******/ });