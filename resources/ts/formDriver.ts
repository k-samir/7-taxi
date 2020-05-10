export namespace src{export namespace form {

        function getID(id: string): HTMLInputElement {
            return (<HTMLInputElement>document.getElementById(id));
        }


        function convertToFloat(htmlElement: HTMLInputElement): number
        function convertToFloat(value: string): number
        function convertToFloat(var1: string | HTMLInputElement): number {
            return typeof var1 === "string" ?
                var1 == "" ? 0 : parseFloat(var1) :
                convertToFloat(var1.value);
        }

        export class FormDriver {

            private readonly commission = window['commission'];


            /**
             * Update the value of the element by id 'salary'
             * to the value 'realRecipe' multiplied by the commission receive.
             */
            public updateSalary(): void {
                getID("salary").value = String(convertToFloat(getID("realRecipe")) * this.commission);
            }

            public setDifference(start: string,end:string, diff:string): void{
                const depart = getID(start).value != "" ? parseFloat(getID(start).value) :0;
                const arrive = getID(end).value != "" ? parseFloat(getID(end).value) :0;
                getID(diff).value = (arrive - depart).toString();
            }


            /**
             * Method to calculate the real recipe from the difference of initial recipe and final recipe plu the fix price.<br>
             * If the realRecipe is greater than 0, then, the method {@link updateSalary} will be called.
             */
            public updateRealRecipe(): void {
                let startingRecipe = convertToFloat(getID('startRecipe'));
                let endingRecipe = convertToFloat(getID('finalRecipe'));
                let fixPrice = convertToFloat(getID('fixPrice'));

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
