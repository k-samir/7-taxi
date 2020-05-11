export namespace src{export namespace form {

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function FloatConversion(id: string): number{
        return getID(id).value != "" ? parseFloat(getID(id).value) :0;
    }

    export class FormDriver {

        private readonly commission = window['commission'];


        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            let realRecipe = FloatConversion("realRecipe");
            getID("salary").value = (realRecipe * this.commission).toString();
        }

        public setDifference(start: string,end:string, diff:string): void{
            const depart = FloatConversion(start);
            const arrive = FloatConversion(end);
            getID(diff).value = (arrive - depart).toString();
        }


        /**
         * Method to calculate the real recipe from the difference of initial recipe and final recipe plus the fix price.<br>
         * If the realRecipe is greater than 0, then, the method {@link updateSalary} will be called.
         */
        public updateRealRecipe(): void {
            let startingRecipe = FloatConversion("startRecipe");
            let endingRecipe = FloatConversion("finalRecipe");
            let fixingPrice = FloatConversion("fixPrice");

            let realRecipe = endingRecipe - startingRecipe + fixingPrice;
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
