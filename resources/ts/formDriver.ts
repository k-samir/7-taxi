export namespace src{export namespace form{

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function convertToFloat(elementID: string): number {
        return getID(elementID).value == "" ? 0 : parseFloat(getID(elementID).value);
    }

    export class FormDriver {

        private readonly commission = window['commission'];


        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            getID("salary").value = String(convertToFloat("realRecipe") * this.commission);
            this.updateTotalDepense();
        }

        public setDifference(startingID: string, endingID: string, elementToSetID: string): void {
            getID(elementToSetID).value = (convertToFloat(endingID) - convertToFloat(startingID)).toString();
        }

        public updateTotalDepense(): void {
            getID('totalExpenses').value = (convertToFloat('gaz') + convertToFloat('credit') + convertToFloat('various') + convertToFloat('salary')).toString();
            this.updateTotalNet();
        }

        public updateTotalNet(): void {
            getID('totalNet').value = (convertToFloat('realRecipe') - convertToFloat('totalExpenses')).toString();
        }

        /**
         * Method to calculate the real recipe from the difference of initial recipe and final recipe plus the fix price.<br>
         * Afterward, the method {@link updateSalary} will be called.
         */
        public updateRealRecipe(): void {
            let startingRecipe = convertToFloat('startRecipe');
            let endingRecipe = convertToFloat('finalRecipe');
            let fixPrice = convertToFloat('fixPrice');

            let realRecipe = endingRecipe - startingRecipe + fixPrice;
            getID('realRecipe').value = String(realRecipe);
            this.updateSalary();
        }
    }
}}

import FormDriver = src.form.FormDriver;

(() => {
    //Apply the triggers on the elements

    let form = new FormDriver();

    window['updateSalary'] = () => form.updateSalary();
    window['updateRealRecipe'] = () => form.updateRealRecipe();
    window['setDifferenceOnMillage'] = () => form.setDifference("startingMillage", "endingMillage", "totalMillage");
    window['setDifferenceOnMillageLaden'] = () => form.setDifference("startingMileageLaden", "endingMileageLaden", "totalMileageLaden");
    window['setDifferenceOnAmountOfPassengers'] = () => form.setDifference("startingAmountOfPassengers", "endingAmountOrPassengers", "totalAmountOfPassengers");
    window['setDifferenceOnMileageInVehicle'] = () => form.setDifference("startingMileageInVehicle", "endingMileageInVehicle", "totalMileageInVehicle");
    window['updateTotalDepense'] = () => form.updateTotalDepense();

})();
