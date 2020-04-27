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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/ts/base.ts":
/*!******************************!*\
  !*** ./resources/ts/base.ts ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

Object.defineProperty(exports, "__esModule", { value: true });
var src;
(function (src) {
    let base;
    (function (base) {
        function getBodyClassList() {
            return document.getElementById("base-body").classList;
        }
        function getNavigationBarClassList() {
            return document.getElementById("navigation-bar").classList;
        }
        function getNavigationsTabClassList() {
            let returnedElement = [];
            let menus = document.getElementsByClassName("dropdown-menu");
            for (let i = 0; i < menus.length; i++)
                returnedElement[i] = menus.item(i).classList;
            return returnedElement;
        }
        function getNavigationsTextClassList() {
            let returnedElement = [];
            let menus = document.getElementsByClassName("dropdown-item");
            for (let i = 0; i < menus.length; i++)
                returnedElement[i] = menus.item(i).classList;
            return returnedElement;
        }
        class BaseTask {
            constructor(isDarkModeEnable) {
                this.__isInitializationOnExecuteSet = false;
                this.__isDarkModeEnable = false;
                this.__isChangingColorAutomatically = true;
                this.__currentIndex = 0;
                this.possibilities = ["font-green", "font-turquoise", "font-yellow", "font-orange", "font-orangered", "font-pink", "font-gold", "font-silver"];
                this.lastIndexOfPossibilities = this.possibilities.length - 1;
                this.setCurrentPossibility(0);
                if (isDarkModeEnable !== undefined)
                    this.setDarkMode(isDarkModeEnable);
            }
            isDarkModeEnable() {
                return this.__isDarkModeEnable;
            }
            setDarkMode(isEnable) {
                if (isEnable !== this.__isDarkModeEnable) {
                    this.__isDarkModeEnable = isEnable;
                    if (isEnable) {
                        getNavigationBarClassList().remove("navbar-light", "bg-light");
                        getNavigationsTabClassList().forEach((navTab) => navTab.remove("bg-light"));
                        getNavigationsTextClassList().forEach((navText) => navText.remove("text-dark"));
                    }
                    else {
                        getNavigationBarClassList().remove("navbar-dark", "bg-dark");
                        getNavigationsTabClassList().forEach((navTab) => navTab.remove("bg-dark"));
                        getNavigationsTextClassList().forEach((navText) => navText.remove("text-light"));
                    }
                    getNavigationBarClassList().add("navbar-" + this.getActiveDarkMode(), "bg-" + this.getActiveDarkMode());
                    getNavigationsTabClassList().forEach((navTab) => navTab.add("bg-" + this.getActiveDarkMode()));
                    getNavigationsTextClassList().forEach((navText) => navText.add("text-" + this.getReverseActiveDarkMode()));
                    document.getElementById("btn-obscur-light").textContent = "Mode " + (isEnable ? "clair" : "obscur");
                }
                return this;
            }
            getActiveDarkMode() {
                return this.isDarkModeEnable() ? "dark" : "light";
            }
            getReverseActiveDarkMode() {
                return this.isDarkModeEnable() ? "light" : "dark";
            }
            isChangingColorAutomatically() {
                return this.__isChangingColorAutomatically;
            }
            setChangeColorAutomatically(isChangingColorAutomatically) {
                this.__isChangingColorAutomatically = isChangingColorAutomatically;
                return this;
            }
            setCurrentPossibility(arg1) {
                if (arg1 === undefined || arg1 === null)
                    new ReferenceError("The value received is not initialize");
                if (typeof arg1 == "number") {
                    if (arg1 > this.lastIndexOfPossibilities)
                        throw new RangeError("The index \"" + arg1 + "\" is out of the limit received : \"" + this.lastIndexOfPossibilities + "\".");
                    this.setCurrentPossibility(this.possibilities[arg1] + "-" + this.getActiveDarkMode());
                }
                else
                    this.__currentPossibility = arg1;
                return this;
            }
            getCurrentPossibility() {
                return this.__currentPossibility;
            }
            execute() {
                if (!this.__isInitializationOnExecuteSet) {
                    getBodyClassList().add(this.__currentPossibility);
                    this.__isInitializationOnExecuteSet = true;
                }
                setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
            }
            __execute() {
                getBodyClassList().remove(this.getCurrentPossibility());
                this.__currentIndex = (this.__currentIndex == this.lastIndexOfPossibilities) ? 0 : this.__currentIndex + 1;
                getBodyClassList().add(this.setCurrentPossibility(this.__currentIndex).getCurrentPossibility());
                if (this.isChangingColorAutomatically())
                    setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
            }
        }
        BaseTask.DELAY_TIME = 10000;
        base.BaseTask = BaseTask;
    })(base = src.base || (src.base = {}));
})(src = exports.src || (exports.src = {}));
var BaseTask = src.base.BaseTask;
let baseTask;
(() => {
    baseTask = new BaseTask();
    baseTask.execute();
    window["baseTask"] = baseTask;
    window["changeDarkOrLightMode"] = () => baseTask.setDarkMode(!baseTask.isDarkModeEnable());
    window["changeAutomaticColor"] = () => baseTask.setChangeColorAutomatically(!baseTask.isChangingColorAutomatically());
})();
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYmFzZS5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbImJhc2UudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7QUFBQSxJQUFpQixHQUFHLENBa0puQjtBQWxKRCxXQUFpQixHQUFHO0lBQUMsSUFBaUIsSUFBSSxDQWlKekM7SUFqSm9CLFdBQWlCLElBQUk7UUFFdEMsU0FBUyxnQkFBZ0I7WUFDckIsT0FBTyxRQUFRLENBQUMsY0FBYyxDQUFDLFdBQVcsQ0FBQyxDQUFDLFNBQVMsQ0FBQztRQUMxRCxDQUFDO1FBRUQsU0FBUyx5QkFBeUI7WUFDOUIsT0FBTyxRQUFRLENBQUMsY0FBYyxDQUFDLGdCQUFnQixDQUFDLENBQUMsU0FBUyxDQUFDO1FBQy9ELENBQUM7UUFFRCxTQUFTLDBCQUEwQjtZQUMvQixJQUFJLGVBQWUsR0FBRyxFQUFFLENBQUM7WUFDekIsSUFBSSxLQUFLLEdBQUcsUUFBUSxDQUFDLHNCQUFzQixDQUFDLGVBQWUsQ0FBQyxDQUFDO1lBQzdELEtBQUssSUFBSSxDQUFDLEdBQUcsQ0FBQyxFQUFFLENBQUMsR0FBRyxLQUFLLENBQUMsTUFBTSxFQUFFLENBQUMsRUFBRTtnQkFDakMsZUFBZSxDQUFDLENBQUMsQ0FBQyxHQUFHLEtBQUssQ0FBQyxJQUFJLENBQUMsQ0FBQyxDQUFDLENBQUMsU0FBUyxDQUFDO1lBQ2pELE9BQU8sZUFBZSxDQUFDO1FBQzNCLENBQUM7UUFFRCxTQUFTLDJCQUEyQjtZQUNoQyxJQUFJLGVBQWUsR0FBRyxFQUFFLENBQUM7WUFDekIsSUFBSSxLQUFLLEdBQUcsUUFBUSxDQUFDLHNCQUFzQixDQUFDLGVBQWUsQ0FBQyxDQUFDO1lBQzdELEtBQUssSUFBSSxDQUFDLEdBQUcsQ0FBQyxFQUFFLENBQUMsR0FBRyxLQUFLLENBQUMsTUFBTSxFQUFFLENBQUMsRUFBRTtnQkFDakMsZUFBZSxDQUFDLENBQUMsQ0FBQyxHQUFHLEtBQUssQ0FBQyxJQUFJLENBQUMsQ0FBQyxDQUFDLENBQUMsU0FBUyxDQUFDO1lBQ2pE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

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/ts/base.ts ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! c:\xampp\htdocs\public_html\7-taxi\resources\ts\base.ts */"./resources/ts/base.ts");


/***/ })

/******/ });