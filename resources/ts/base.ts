export namespace src{export namespace base{


    abstract class BaseList {

        private constructor() {
        }


        private static getID(id: string): DOMTokenList {
            let objectByID = document.getElementById(id);
            return objectByID == null ? null : objectByID.classList;
        }

        private static getClass(clazz: string): DOMTokenList[] {
            let returnedElement = [];
            let objectByClass = document.getElementsByClassName(clazz);
            for (let i = 0; i < objectByClass.length; i++)
                returnedElement[i] = objectByClass[i].classList;
            return returnedElement;
        }

        private static getClassWithTransparency(clazz: string): { dom: DOMTokenList, transparent: boolean }[] {
            let returnedElement = [];
            let objectByClass = document.getElementsByClassName(clazz);
            for (let i = 0; i < objectByClass.length; i++)
                returnedElement[i] = {
                    "dom": objectByClass[i].classList,
                    "transparent": objectByClass[i].classList.contains("bg-transparent"),
                };

            return returnedElement;
        }


        public static getBodyClassList(): DOMTokenList {
            return BaseList.getID("base-body");
        }

        public static getNavigationBarClassList(): DOMTokenList {
            return BaseList.getID("navigation-bar");
        }

        public static getNavigationsTabClassList(): DOMTokenList[] {
            return BaseList.getClass("dropdown-menu");
        }

        public static getNavigationsTextClassList(): DOMTokenList[] {
            return BaseList.getClass("dropdown-item");
        }

        public static getLabelFormControlList(): { dom: DOMTokenList, transparent: boolean }[] {
            return BaseList.getClassWithTransparency("input-group-text");
        }

        public static getFormControlList(): { dom: DOMTokenList, transparent: boolean }[] {
            return BaseList.getClassWithTransparency("form-control");
        }


    }

    export class BaseTask {

        private static readonly DELAY_TIME: number = 10000;

        private __isInitializationOnExecuteSet: boolean = false;
        private __isDarkModeEnable: boolean = false;
        private __isChangingColorAutomatically: boolean = true;

        private __currentIndex: number = 0;
        private __currentPossibility: string;
        private readonly possibilities: string[] = ["font-green", "font-turquoise", "font-yellow", "font-orange", "font-orangered", "font-pink", "font-gold", "font-silver"];
        private readonly lastIndexOfPossibilities = this.possibilities.length - 1;

        constructor(isDarkModeEnable?: boolean) {
            this.setCurrentPossibility(0);
            if (isDarkModeEnable !== undefined)
                this.setDarkMode(isDarkModeEnable);

        }


        public isDarkModeEnable(): boolean {
            return this.__isDarkModeEnable;
        }

        public setDarkMode(isEnable: boolean): this {
            if (isEnable !== this.__isDarkModeEnable) {
                this.__isDarkModeEnable = isEnable;

                if (isEnable) {
                    BaseList.getNavigationBarClassList().add("navbar-dark", "bg-dark");
                    BaseList.getNavigationsTabClassList().forEach((navTab) => navTab.add("bg-dark"));
                    BaseList.getNavigationsTextClassList().forEach((navText) => navText.add("text-light"));
                    BaseList.getLabelFormControlList().forEach((form) => {
                        if (!form.transparent) form.dom.add("text-light", "bg-dark");
                    });
                    BaseList.getFormControlList().forEach((form) => {
                        if (!form.transparent) form.dom.add("text-light", "bg-dark");
                    });
                } else {
                    BaseList.getNavigationBarClassList().remove("navbar-dark", "bg-dark");
                    BaseList.getNavigationsTabClassList().forEach((navTab) => navTab.remove("bg-dark"));
                    BaseList.getNavigationsTextClassList().forEach((navText) => navText.remove("text-light"));
                    BaseList.getLabelFormControlList().forEach((form) => form.dom.remove("text-light", "bg-dark"));
                    BaseList.getFormControlList().forEach((form) => form.dom.remove("text-light", "bg-dark"));
                }

                document.getElementById("btn-obscur-light").textContent = "Mode " + (isEnable ? "clair" : "obscur");
            }
            return this;
        }

        public getActiveDarkMode(): string {
            return this.isDarkModeEnable() ? "dark" : "light";
        }

        public getReverseActiveDarkMode(): string {
            return this.isDarkModeEnable() ? "light" : "dark";
        }


        public isChangingColorAutomatically(): boolean {
            return this.__isChangingColorAutomatically;
        }

        public setChangeColorAutomatically(isChangingColorAutomatically: boolean): this {
            this.__isChangingColorAutomatically = isChangingColorAutomatically;
            return this;
        }


        /**
         * Set the new possibility from an index and the call
         * {@link setCurrentPossibility} concatenated with the {@link getActiveDarkMode}.
         * @param newIndex - the new possible index
         * @throws RangeError if the index is exceeding the last value of {@link lastIndexOfPossibilities}.
         * @throws ReferenceError - if the value received is null or undefined
         */
        private setCurrentPossibility(newIndex: number): this
        /**
         * Set the new possibility from a brute string value.
         * @param value - the brute value
         * @throws ReferenceError - if the value received is null or undefined
         */
        private setCurrentPossibility(value: string): this
        private setCurrentPossibility(arg1: string | number): this {
            if (arg1 === undefined || arg1 === null)
                new ReferenceError("The value received is not initialize");

            if (typeof arg1 == "number") {
                if (arg1 > this.lastIndexOfPossibilities)
                    throw new RangeError("The index \"" + arg1 + "\" is out of the limit received : \"" + this.lastIndexOfPossibilities + "\".");
                this.setCurrentPossibility(this.possibilities[arg1] + "-" + this.getActiveDarkMode());
            } else
                this.__currentPossibility = arg1;

            return this;
        }

        private getCurrentPossibility(): string {
            return this.__currentPossibility;
        }

        public execute(): void {
            if (!this.__isInitializationOnExecuteSet) {
                BaseList.getBodyClassList().add(this.__currentPossibility);
                this.__isInitializationOnExecuteSet = true;
            }
            setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
        }

        private __execute(): void {
            BaseList.getBodyClassList().remove(this.getCurrentPossibility());
            this.__currentIndex = (this.__currentIndex == this.lastIndexOfPossibilities) ? 0 : this.__currentIndex + 1;

            BaseList.getBodyClassList().add(this.setCurrentPossibility(this.__currentIndex).getCurrentPossibility());


            if (this.isChangingColorAutomatically())//Re-execute itself after
                setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
        }

    }

}
}

import BaseTask = src.base.BaseTask;

let baseTask: BaseTask;

(() => {
    //Export global methods and variable

    baseTask = new BaseTask();
    baseTask.execute();

    window["baseTask"] = baseTask;
    window["changeDarkOrLightMode"] = () => baseTask.setDarkMode(!baseTask.isDarkModeEnable());
    window["changeAutomaticColor"] = () => baseTask.setChangeColorAutomatically(!baseTask.isChangingColorAutomatically());
})();
