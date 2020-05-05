export namespace src{export namespace form{

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function setDifference(startingValue: number, endingValue: number, elementToSetTheValue: HTMLInputElement): void {
        elementToSetTheValue.value = String(startingValue - endingValue);
    }

    export class FormDriver {

        private readonly commission = window['commission'];


        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            getID("salary").value = String(getID("realRecipe").valueAsNumber * this.commission);
        }

        public setDifference(startingID: string, endingValue: number, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingID: string, elementIDToSetTheValue: string): void
        public setDifference(startingID: string, endingID: string, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingValue: number, elementIDToSetTheValue: string): void
        public setDifference(startingValue: number, endingValue: number, elementToSetTheValue: HTMLInputElement): void
        public setDifference(starting: number | string, ending: number | string, elementToSet: HTMLInputElement | string): void {
            setDifference(
                typeof starting === "string" ? getID(starting).valueAsNumber : starting,
                typeof ending === "string" ? getID(ending).valueAsNumber : ending,
                typeof elementToSet === "string" ? getID(elementToSet) : elementToSet);
        }


        /**
         * Method to calculate the real recipe from the difference of initial recipe and final recipe plu the fix price.<br>
         * If the realRecipe is greater than 0, then, the method {@link updateSalary} will be called.
         */
        public updateRealRecipe(): void {
            let startingRecipe = getID('startRecipe').valueAsNumber;
            let endingRecipe = getID('finalRecipe').valueAsNumber;
            let fixPrice = getID('fixPrice').valueAsNumber;

            let realRecipe = endingRecipe - startingRecipe + fixPrice;
            getID('realRecipe').value = String(realRecipe);
            this.updateSalary();
        }

        public onNumberModification(callback: () => void, ...ids: string[]) {
            let callbackToSend = () => callback();
            ids.forEach(id => {
                let element = getID(id);
                element.onchange = callbackToSend;//Serve when the user change the focus to another field or use the field modification (when it's a number/date)
                element.onkeydown = (keyEvent) => {
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
    form.onNumberModification(() => form.setDifference("startingMillage", "endingMillage", "totalMillage"), "startingMillage", "endingMillage");
    form.onNumberModification(() => form.setDifference("startingMileageLaden", "endingMileageLaden", "totalMileageLaden"), "startingMileageLaden", "endingMileageLaden");
    form.onNumberModification(() => form.setDifference("startingAmountOfPassengers", "endingAmountOrPassengers", "totalAmountOfPassengers"), "startingAmountOfPassengers", "endingAmountOrPassengers");
    form.onNumberModification(() => form.setDifference("startingMileageInVehicle", "endingMileageInVehicle", "totalMileageInVehicle"), "startingMileageInVehicle", "endingMileageInVehicle");

})();
