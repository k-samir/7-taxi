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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
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
                    if (field != null) {
                        if ('getField' in field)
                            this.__field = field.getField();
                        else
                            this.__field = field;
                    }
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
                        this.__callbackOnModification();
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
                    return this.setStart(value1)
                        .setEnd((value2 == undefined) ? value1 : value2);
                }
            }
            containers.DifferenceField = DifferenceField;
        })(containers = form.containers || (form.containers = {}));
    })(form = scr.form || (scr.form = {}));
})(scr = exports.scr || (exports.scr = {}));
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZm9ybUNvbnRhaW5lcnMuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJmb3JtQ29udGFpbmVycy50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOztBQUFBLElBQWlCLEdBQUcsQ0E2T2pCO0FBN09ILFdBQWlCLEdBQUc7SUFBQyxJQUFpQixJQUFJLENBNk94QztJQTdPbUIsV0FBaUIsSUFBSTtRQUFDLElBQWlCLFVBQVUsQ0E2T3JFO1FBN08wQyxXQUFpQixVQUFVO1lBcUNsRSxNQUFhLGFBQWE7Z0JBS3RCLFlBQTRCLEtBQVE7b0JBQVIsVUFBSyxHQUFMLEtBQUssQ0FBRztvQkFDaEMsSUFBSSxDQUFDLE9BQU8sR0FBRyxLQUFLLENBQUM7Z0JBQ3pCLENBQUM7Z0JBRU0sUUFBUTtvQkFDWCxPQUFPLElBQUksQ0FBQyxPQUFPLENBQUM7Z0JBQ3hCLENBQUM7YUFFSjtZQWJZLHdCQUFhLGdCQWF6QixDQUFBO1lBTUQsTUFBYSxlQUFlO2dCQU94QixZQUFtQixLQUE4QjtvQkFDN0MsSUFBSSxDQUFDLFFBQVEsQ0FBQyxLQUFLLENBQUMsQ0FBQztnQkFDekIsQ0FBQztnQkFFTSxRQUFRO29CQUNYLE9BQU8sSUFBSSxDQUFDLE9BQU8sQ0FBQztnQkFDeEIsQ0FBQztnQkFFTSxRQUFRLENBQUMsS0FBNkI7b0JBQ3pDLElBQUksS0FBSyxJQUFJLElBQUksRUFBRTt3QkFDZixJQUFJLFVBQVUsSUFBSSxLQUFLOzRCQUNuQixJQUFJLENBQUMsT0FBTyxHQUFHLEtBQUssQ0FBQyxRQUFRLEVBQUUsQ0FBQzs7NEJBRWhDLElBQUksQ0FBQyxPQUFPLEdBQUcsS0FBSyxDQUFDO3FCQUM1QjtvQkFDRCxPQUFPLElBQUksQ0FBQztnQkFDaEIsQ0FBQzthQUVKO1lBekJZLDBCQUFlLGtCQXlCM0IsQ0FBQTtZQVFELE1BQWEsY0FBYztnQkFTdkIsWUFBNEIsTUFBc0MsRUFBVyxNQUF1QztvQkFBeEYsV0FBTSxHQUFOLE1BQU0sQ0FBZ0M7b0JBQVcsV0FBTSxHQUFOLE1B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

/***/ }),

/***/ 1:
/*!**********************************************!*\
  !*** multi ./resources/ts/formContainers.ts ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Projets\ProjetEnInformatiqueDeGestion\Taxi\resources\ts\formContainers.ts */"./resources/ts/formContainers.ts");


/***/ })

/******/ });