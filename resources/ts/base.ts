export namespace src{export namespace base{

    export class BaseTask {
        private static readonly BODY_ID: string = "base-body";
        private static readonly DELAY_TIME: number = 10000;


        private __isInitializationOnExecuteSet: boolean = false;
        private __isDarkModeEnable: boolean = false;
        private __isChangingColorAutomatically: boolean = true;

        private __currentIndex: number = 0;
        private __currentPossibility: string;
        private readonly possibilities: string[] = ["font-green", "font-turquoise", "font-yellow", "font-orange", "font-orangered", "font-pink", "font-gold", "font-silver"];
        private readonly lastIndexOfPossibilities = this.possibilities.length - 1;

        private __bodyElement: HTMLElement;


        constructor(isDarkModeEnable?: boolean) {
            this.__initElement().setCurrentPossibility(0);
            if (isDarkModeEnable !== undefined)
                this.setDarkMode(isDarkModeEnable);

        }

        private __initElement(): this {
            this.__bodyElement = document.getElementById(BaseTask.BODY_ID);
            return this;
        }


        public isDarkModeEnable(): boolean {
            return this.__isDarkModeEnable;
        }

        public enableDarkMode(): this {
            return this.setDarkMode(true);
        }

        public disableDarkMode(): this {
            return this.setDarkMode(false);
        }

        public setDarkMode(isEnable: boolean): this {
            this.__isDarkModeEnable = isEnable;
            return this;
        }


        public isChangingColorAutomatically(): boolean {
            return this.__isChangingColorAutomatically;
        }

        public enableChangeColorAutomatically() {
            this.setChangeColorAutomatically(true);
        }

        public disableChangeColorAutomatically() {
            this.setChangeColorAutomatically(false);
        }

        public setChangeColorAutomatically(isChangingColorAutomatically: boolean): this {
            this.__isChangingColorAutomatically = isChangingColorAutomatically;
            return this;
        }


        /**
         * Set the new possibility from an index and the call
         * {@link setCurrentPossibility} with the {@link isDarkModeEnable} possibility.
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
                this.setCurrentPossibility(this.possibilities[arg1] + "-" + this.isDarkModeEnable() ? "dark" : "light");
            } else
                this.__currentPossibility = arg1;

            return this;
        }

        private getCurrentPossibility(): string {
            return this.__currentPossibility;
        }


        private getBodyClassList(): DOMTokenList {
            return this.__bodyElement.classList;
        }


        public execute(): void {
            if (!this.__isInitializationOnExecuteSet) {
                this.getBodyClassList().add(this.__currentPossibility);
                this.__isInitializationOnExecuteSet = true;
            }
            setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
        }

        private __execute(): void {
            this.getBodyClassList().remove(this.getCurrentPossibility());
            this.__currentIndex = (this.__currentIndex == this.lastIndexOfPossibilities) ? 0 : this.__currentIndex + 1;

            this.getBodyClassList().add(this.setCurrentPossibility(this.__currentIndex).getCurrentPossibility());


            if (this.isChangingColorAutomatically())//Re-execute itself after
                setTimeout(() => this.__execute(), BaseTask.DELAY_TIME);
        }

    }

}}

import BaseTask = src.base.BaseTask;

let baseTask: BaseTask;
(() => {
    baseTask = new BaseTask();
    baseTask.execute();
})();

export function changeDarkOrLightMode() {
    baseTask.execute();
}
