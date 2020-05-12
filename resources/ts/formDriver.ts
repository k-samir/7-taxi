export namespace src{export namespace form {

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function convertToFloat(elementID: string): number {
        return elementID == "" ? 0 :convertToFloat(getID(elementID).value);
    }

    function setSum(elementToSet: HTMLInputElement, elementToSum: number[]): void {
        let sum = 0;
        elementToSum.forEach(element => sum += element);
        elementToSet.value = String(sum);
    }

    export class FormDriver {

        private readonly commission = window['commission'];


        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            getID("salary").value = String(convertToFloat("realRecipe") * this.commission);
        }

        public setDifference(elementToSetID: string, startingID: string, endingID: string): void {
            getID(elementToSetID).value = String(convertToFloat(startingID) - convertToFloat(endingID));
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
            this.__updateTotalExpenses();
            this.updateTotalNet();
        }

        public updateTotalNet(): void {
            this.setDifference("totalNet", "totalExpenses", "realRecipe");
        }

        private __updateTotalExpenses(): void {
            this.setSum("totalExpenses", "salary", "gaz", "credit", "various");
        }

        public updateTotalExpenses(): void {
            this.__updateTotalExpenses();
            this.updateTotalNet();
        }

        public setSum(elementIDToSet: string, ...elementIdsToRetrieveTheSum: string[]): void {
            let tempElementToRetrieveTheSum: number[] = [];
            for (let i = 0; i < elementIdsToRetrieveTheSum.length; i++)
                tempElementToRetrieveTheSum[i] = convertToFloat(elementIdsToRetrieveTheSum[i])[i];

            setSum(getID(elementIDToSet), tempElementToRetrieveTheSum);
        }

        public onNumberModification(callback: () => void, ...ids: string[]) {
            ids.forEach(id => {
                let element = getID(id);
                element.onchange = () => {
                    //Serve when the user change the focus to another field or use the field modification (when it's a number/date)
                    callback();
                }
                element.oninput = () => {
                    //On any change from the input.
                    callback();
                }
                element.onkeydown = (keyEvent) => {
                    //On the key DELETE, BACKSPACE or just a number, the callback is executed if the others fail.
                    if (keyEvent.key === "Backspace" || keyEvent.key === "Delete" || keyEvent.key.match(/\d/)) callback();
                };
            });
        }
    }

}}

import FormDriver = src.form.FormDriver;

(() => {
    //Apply the triggers on the elements

    let form = new FormDriver();

    form.onNumberModification(() => form.updateRealRecipe(), "startRecipe", "finalRecipe", "fixPrice");
    form.onNumberModification(() => form.updateSalary(), "realRecipe");
    form.onNumberModification(() => form.setDifference("totalMillage", "startingMillage", "endingMillage"), "startingMillage", "endingMillage");
    form.onNumberModification(() => form.setDifference("totalMileageLaden", "startingMileageLaden", "endingMileageLaden"), "startingMileageLaden", "endingMileageLaden");
    form.onNumberModification(() => form.setDifference("totalAmountOfPassengers", "startingAmountOfPassengers", "endingAmountOrPassengers"), "startingAmountOfPassengers", "endingAmountOrPassengers");
    form.onNumberModification(() => form.setDifference("totalMileageInVehicle", "startingMileageInVehicle", "endingMileageInVehicle"), "startingMileageInVehicle", "endingMileageInVehicle");
    form.onNumberModification(() => form.updateTotalExpenses(), "salary", "gaz", "credit", "various");

})();
