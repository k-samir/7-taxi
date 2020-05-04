export namespace src{export namespace form{

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function setDifference(startingValue: number, endingValue: number, elementToSetTheValue: HTMLInputElement): void {
        elementToSetTheValue.value = String(startingValue - endingValue);
    }

    function convertToNumber(htmlElement: HTMLInputElement): number
    function convertToNumber(value: string): number
    function convertToNumber(var1: string | HTMLInputElement): number {
        return typeof var1 === "string" ? parseInt(var1) : convertToNumber(var1.value);
    }

    export class FormDriver {

        private readonly commission = window['commission'];


        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            getID("salary").value = String(convertToNumber(getID("realRecipe")) * this.commission);
        }

        public setDifference(startingID: string, endingValue: number, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingID: string, elementIDToSetTheValue: string): void
        public setDifference(startingID: string, endingID: string, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingValue: number, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingValue: number, elementToSetTheValue: HTMLInputElement): void
        public setDifference(starting: number | string, ending: number | string, elementToSet: HTMLInputElement | string): void {
            setDifference(
                typeof starting === "string" ? convertToNumber(getID(starting)) : starting,
                typeof ending === "string" ? convertToNumber(getID(ending)) : ending,
                typeof elementToSet === "string" ? getID(elementToSet) : elementToSet);
        }


        /**
         * Method to calculate the real recipe from the difference of initial recipe and final recipe plu the fix price.<br>
         * If the realRecipe is greater than 0, then, the method {@link updateSalary} will be called.
         */
        public updateRealRecipe(): void {
            let startingRecipe = convertToNumber(getID('startRecipe'));
            let endingRecipe = convertToNumber(getID('finalRecipe'));
            let fixPrice = convertToNumber(getID('fixPrice'));

            let realRecipe = endingRecipe - startingRecipe + fixPrice;
            getID('realRecipe').value = String(realRecipe);
            if (realRecipe > 0) this.updateSalary();
        }

    }

}}

import FormDriver = src.form.FormDriver;

(() => {
    //Export global methods and variable

    let form = new FormDriver();

    window['updateSalary'] = () => form.updateSalary();
    window['updateRealRecipe'] = () => form.updateRealRecipe();

    window['setDifferenceOnMillage'] = () => form.setDifference("startingMillage", "endingMillage", "totalMillage");
    window['setDifferenceOnMillageLaden'] = () => form.setDifference("startingMileageLaden", "endingMileageLaden", "totalMileageLaden");
    window['setDifferenceOnAmountOfPassengers'] = () => form.setDifference("startingAmountOfPassengers", "endingAmountOrPassengers", "totalAmountOfPassengers");
    window['setDifferenceOnMileageInVehicle'] = () => form.setDifference("startingMileageInVehicle", "endingMileageInVehicle", "totalMileageInVehicle");


})();
