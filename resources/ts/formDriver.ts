import {helper} from "./helper";
import containInvalidClass = helper.containInvalidClass;
import dateController = helper.dateController;
export namespace src.form {

    function getID(id: string): HTMLInputElement {
        return (<HTMLInputElement>document.getElementById(id));
    }

    function updateValidation(isValid: boolean, ...ids: string[]): void {
        ids.forEach((id) => {
            let listeId = getID(id).classList;
            if (isValid) {
                listeId.remove("is-invalid");
                listeId.add("is-valid");
            } else {
                listeId.remove("is-valid");
                listeId.add("is-invalid");
            }
        });
    }


    function convertToFloat(elementID: string): number {
        return getID(elementID).value == "" ? 0 : parseFloat(getID(elementID).value);
    }
    
    export const btn = document.forms['form_shift'].getElementsByTagName('button')[0];
    export class FormDriver {

        /**
         * Update the value of the element by id 'salary'
         * to the value 'realRecipe' multiplied by the commission receive.
         */
        public updateSalary(): void {
            //recupration de la commission
            const comm = <HTMLSelectElement>document.getElementById('selectChauffeur');
            const commission = parseFloat(comm.options[comm.selectedIndex].getAttribute('commission'));
            getID("salary").value = String(convertToFloat("realRecipe") * commission);
            this.updateTotalDepense();
        }
        public updateTaximetreSpecs() : void{
            const taxi = <HTMLSelectElement>document.getElementById('taxiNo');
            getID('startingMillage').value= taxi.options[taxi.selectedIndex].getAttribute('millage');
            getID('startingMileageLaden').value= taxi.options[taxi.selectedIndex].getAttribute('millage_charge');
            getID('startingAmountOfPassengers').value= taxi.options[taxi.selectedIndex].getAttribute('prise_en_charge');
            getID('startingMileageInVehicle').value= taxi.options[taxi.selectedIndex].getAttribute('millage_auto');
            getID('startRecipe').value= taxi.options[taxi.selectedIndex].getAttribute('recette');  
        }
        
        public setDifference(startingID: string, endingID: string, elementToSetID: string): void {
            let diff = convertToFloat(endingID) - convertToFloat(startingID);
            getID(elementToSetID).textContent = (diff).toString();
            updateValidation(diff > 0, startingID, endingID);
            btn.disabled = containInvalidClass();
        }

        public dateVerification(dateStart:string , dateEnd:string){
            let start = new Date(getID(dateStart).value);
            let end = new Date(getID(dateEnd).value);
            updateValidation((dateController(start) && dateController(end) && (end.getTime()-start.getTime() >0)),dateStart,dateEnd);
            btn.disabled = containInvalidClass();
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
            updateValidation(parseFloat(getID("salary").value) > 0, 'startRecipe', 'finalRecipe','fixPrice');
            btn.disabled = helper.containInvalidClass();
        }
    }
}

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
    window['dateVerification'] = () => form.dateVerification('dateStart','dateEnd');
    window['updateTaximetreSpecs'] = () =>form.updateTaximetreSpecs();
})();
