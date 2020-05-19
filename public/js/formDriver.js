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

/***/ "./resources/ts/formDriver.ts":
/*!************************************!*\
  !*** ./resources/ts/formDriver.ts ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var src;
(function (src) {
    let form;
    (function (form) {
        function getID(id) {
            return document.getElementById(id);
        }
        function updateValidation(isValid, ...ids) {
            ids.forEach((id) => {
                let listeId = getID(id).classList;
                if (isValid) {
                    listeId.remove("is-invalid");
                    listeId.add("is-valid");
                }
                else {
                    listeId.remove("is-valid");
                    listeId.add("is-invalid");
                }
            });
        }
        function convertToFloat(elementID) {
            return getID(elementID).value == "" ? 0 : parseFloat(getID(elementID).value);
        }
        class FormDriver {
            constructor() {
                this.commission = window['commission'];
            }
            updateSalary() {
                getID("salary").value = String(convertToFloat("realRecipe") * this.commission);
                this.updateTotalDepense();
            }
            setDifference(startingID, endingID, elementToSetID) {
                let diff = convertToFloat(endingID) - convertToFloat(startingID);
                getID(elementToSetID).value = (diff).toString();
                updateValidation(diff > 0, startingID, endingID);
            }
            updateTotalDepense() {
                getID('totalExpenses').value = (convertToFloat('gaz') + convertToFloat('credit') + convertToFloat('various') + convertToFloat('salary')).toString();
                this.updateTotalNet();
            }
            updateTotalNet() {
                getID('totalNet').value = (convertToFloat('realRecipe') - convertToFloat('totalExpenses')).toString();
            }
            updateRealRecipe() {
                let startingRecipe = convertToFloat('startRecipe');
                let endingRecipe = convertToFloat('finalRecipe');
                let fixPrice = convertToFloat('fixPrice');
                let realRecipe = endingRecipe - startingRecipe + fixPrice;
                getID('realRecipe').value = String(realRecipe);
                this.updateSalary();
            }
        }
        form.FormDriver = FormDriver;
    })(form = src.form || (src.form = {}));
})(src = exports.src || (exports.src = {}));
var FormDriver = src.form.FormDriver;
(() => {
    let form = new FormDriver();
    window['updateSalary'] = () => form.updateSalary();
    window['updateRealRecipe'] = () => form.updateRealRecipe();
    window['setDifferenceOnMillage'] = () => form.setDifference("startingMillage", "endingMillage", "totalMillage");
    window['setDifferenceOnMillageLaden'] = () => form.setDifference("startingMileageLaden", "endingMileageLaden", "totalMileageLaden");
    window['setDifferenceOnAmountOfPassengers'] = () => form.setDifference("startingAmountOfPassengers", "endingAmountOrPassengers", "totalAmountOfPassengers");
    window['setDifferenceOnMileageInVehicle'] = () => form.setDifference("startingMileageInVehicle", "endingMileageInVehicle", "totalMileageInVehicle");
    window['updateTotalDepense'] = () => form.updateTotalDepense();
})();
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZm9ybURyaXZlci5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbImZvcm1Ecml2ZXIudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7QUFBQSxJQUFpQixHQUFHLENBbUVsQjtBQW5FRixXQUFpQixHQUFHO0lBQUMsSUFBaUIsSUFBSSxDQW1FekM7SUFuRW9CLFdBQWlCLElBQUk7UUFFdEMsU0FBUyxLQUFLLENBQUMsRUFBVTtZQUNyQixPQUEwQixRQUFRLENBQUMsY0FBYyxDQUFDLEVBQUUsQ0FBRSxDQUFDO1FBQzNELENBQUM7UUFFRCxTQUFTLGdCQUFnQixDQUFDLE9BQWdCLEVBQUMsR0FBRyxHQUFhO1lBQ3ZELEdBQUcsQ0FBQyxPQUFPLENBQUMsQ0FBQyxFQUFFLEVBQUMsRUFBRTtnQkFDZCxJQUFJLE9BQU8sR0FBRyxLQUFLLENBQUMsRUFBRSxDQUFDLENBQUMsU0FBUyxDQUFDO2dCQUNsQyxJQUFHLE9BQU8sRUFBQztvQkFDUCxPQUFPLENBQUMsTUFBTSxDQUFDLFlBQVksQ0FBQyxDQUFDO29CQUM3QixPQUFPLENBQUMsR0FBRyxDQUFDLFVBQVUsQ0FBQyxDQUFDO2lCQUMzQjtxQkFBSTtvQkFDRCxPQUFPLENBQUMsTUFBTSxDQUFDLFVBQVUsQ0FBQyxDQUFDO29CQUMzQixPQUFPLENBQUMsR0FBRyxDQUFDLFlBQVksQ0FBQyxDQUFDO2lCQUM3QjtZQUNMLENBQUMsQ0FBQyxDQUFDO1FBQ1AsQ0FBQztRQUVELFNBQVMsY0FBYyxDQUFDLFNBQWlCO1lBQ3JDLE9BQU8sS0FBSyxDQUFDLFNBQVMsQ0FBQyxDQUFDLEtBQUssSUFBRSxFQUFFLENBQUEsQ0FBQyxDQUFBLENBQUMsQ0FBQSxDQUFDLENBQUEsVUFBVSxDQUFDLEtBQUssQ0FBQyxTQUFTLENBQUMsQ0FBQyxLQUFLLENBQUMsQ0FBQztRQUMzRSxDQUFDO1FBRUQsTUFBYSxVQUFVO1lBQXZCO2dCQUVxQixlQUFVLEdBQUcsTUFBTSxDQUFDLFlBQVksQ0FBQyxDQUFDO1lBeUN2RCxDQUFD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

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/ts/formDriver.ts ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\7-taxi\resources\ts\formDriver.ts */"./resources/ts/formDriver.ts");


/***/ })

/******/ });