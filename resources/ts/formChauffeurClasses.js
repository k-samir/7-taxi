"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const formContainers_1 = require("./formContainers");
var src;
(function (src) {
    let form;
    (function (form) {
        var CalculatedField = formContainers_1.scr.form.containers.CalculatedField;
        var DependantField = formContainers_1.scr.form.containers.DependantField;
        var DifferenceField = formContainers_1.scr.form.containers.DifferenceField;
        var FinalizeField = formContainers_1.scr.form.containers.FinalizeField;
        var ModifiableField = formContainers_1.scr.form.containers.ModifiableField;
        class General {
            constructor(driverNo) {
                this.__callbackToReinitializeRealRecipe = () => {
                    this.__realRecipe.setToNotCalculated();
                };
                this.__taxiNo = new ModifiableField();
                this.__dateAndTime = new DifferenceField();
                this.__recipe = new DifferenceField(new DependantField(this.__callbackToReinitializeRealRecipe), new DependantField(this.__callbackToReinitializeRealRecipe));
                this.__totalFixPrice = new DependantField(this.__callbackToReinitializeRealRecipe);
                this.__realRecipe = new CalculatedField(() => {
                    return this.getEndingRecipe() - this.getStartingRecipe() + this.getTotalFixPrice();
                });
                this.__driverNo = new FinalizeField(driverNo);
            }
            getDriverNo() {
                return this.__driverNo.getField();
            }
            getTaxiNo() {
                return this.__taxiNo.getField();
            }
            setTaxiNo(taxiNo) {
                this.__taxiNo.setField(taxiNo);
            }
            getStartingDate() {
                return this.getAllDateAndTime().getStart();
            }
            getEndingDate() {
                return this.getAllDateAndTime().getEnd();
            }
            getAllDateAndTime() {
                return this.__dateAndTime;
            }
            setStartingDate(startingDate) {
                this.getAllDateAndTime().setStart(startingDate);
                return this;
            }
            setEndingDate(endingDate) {
                this.getAllDateAndTime().setEnd(endingDate);
                return this;
            }
            setBothDateAndTime(date1, date2) {
                this.getAllDateAndTime().setBothFields(date1, date2);
                return this;
            }
            getStartingRecipe() {
                return this.getAllRecipes().getStart();
            }
            getEndingRecipe() {
                return this.getAllRecipes().getEnd();
            }
            getAllRecipes() {
                return this.__recipe;
            }
            setStartingRecipe(startingRecipe) {
                this.getAllRecipes().setStart(startingRecipe);
                return this;
            }
            setEndingRecipe(endingRecipe) {
                this.getAllRecipes().setEnd(endingRecipe);
                return this;
            }
            setBothRecipe(recipe1, recipe2) {
                return this.setStartingRecipe(recipe1).setEndingRecipe((recipe2 == undefined) ? recipe1 : recipe2);
            }
            getTotalFixPrice() {
                return this.__totalFixPrice.getField();
            }
            setTotalFixPrice(totalFixPrice) {
                this.__totalFixPrice.setField(totalFixPrice);
                return this;
            }
            getRealRecipe() {
                return this.__realRecipe.getField();
            }
        }
        form.General = General;
        class Distance {
            constructor() {
                this.__callbackToReinitializeMileageDifference = () => {
                    this.__mileageDifference.setToNotCalculated();
                };
                this.__callbackToReinitializeMileageLadenDifference = () => {
                    this.__mileageLadenDifference.setToNotCalculated();
                };
                this.__callbackToReinitializeAmountOfPassengersDifference = () => {
                    this.__amountOfPassengersDifference.setToNotCalculated();
                };
                this.__callbackToReinitializeMileageInVehicleDifference = () => {
                    this.__mileageInVehicleDifference.setToNotCalculated();
                };
                this.__mileage = new DifferenceField(new DependantField(this.__callbackToReinitializeMileageDifference), new DependantField(this.__callbackToReinitializeMileageDifference));
                this.__mileageDifference = new CalculatedField(() => {
                    return this.getStartingMileage() - this.getEndingMileage();
                });
                this.__mileageLaden = new DifferenceField(new DependantField(this.__callbackToReinitializeMileageLadenDifference), new DependantField(this.__callbackToReinitializeMileageLadenDifference));
                this.__mileageLadenDifference = new CalculatedField(() => {
                    return this.getEndingMileageLaden() - this.getStartingMileageLaden();
                });
                this.__amountOfPassengers = new DifferenceField(new DependantField(this.__callbackToReinitializeAmountOfPassengersDifference), new DependantField(this.__callbackToReinitializeAmountOfPassengersDifference));
                this.__amountOfPassengersDifference = new CalculatedField(() => {
                    return this.getEndingAmountOfPassengers() - this.getStartingAmountOfPassengers();
                });
                this.__mileageInVehicle = new DifferenceField(new DependantField(this.__callbackToReinitializeMileageInVehicleDifference), new DependantField(this.__callbackToReinitializeMileageInVehicleDifference));
                this.__mileageInVehicleDifference = new CalculatedField(() => {
                    return this.getEndingMileageInVehicle() - this.getStartingMileageInVehicle();
                });
            }
            getStartingMileage() {
                return this.getAllMileages().getStart();
            }
            getEndingMileage() {
                return this.getAllMileages().getEnd();
            }
            getAllMileages() {
                return this.__mileage;
            }
            setStartingMileage(startingMileage) {
                this.getAllMileages().setStart(startingMileage);
                return this;
            }
            setEndingMileage(endingMileage) {
                this.getAllMileages().setEnd(endingMileage);
                return this;
            }
            setBothMileage(mileage1, mileage2) {
                return this.setStartingMileage(mileage1).setEndingMileage((mileage2 == undefined) ? mileage1 : mileage2);
            }
            getMileageDifference() {
                return this.__mileageDifference.getField();
            }
            getStartingMileageLaden() {
                return this.getAllMileageLaden().getStart();
            }
            getEndingMileageLaden() {
                return this.getAllMileageLaden().getEnd();
            }
            getAllMileageLaden() {
                return this.__mileageLaden;
            }
            setStartingMileageLaden(startingMileageLaden) {
                this.getAllMileageLaden().setStart(startingMileageLaden);
                return this;
            }
            setEndingMileagesLaden(endingMileageLaden) {
                this.getAllMileageLaden().setEnd(endingMileageLaden);
                return this;
            }
            setBothMileageLaden(mileageLaden1, mileageLaden2) {
                return this.setStartingMileageLaden(mileageLaden1).setEndingMileagesLaden((mileageLaden2 == undefined) ? mileageLaden1 : mileageLaden2);
            }
            getMileageLaden() {
                return this.__mileageLadenDifference.getField();
            }
            getStartingAmountOfPassengers() {
                return this.getAllAmountsOfPassengers().getStart();
            }
            getEndingAmountOfPassengers() {
                return this.getAllAmountsOfPassengers().getEnd();
            }
            getAllAmountsOfPassengers() {
                return this.__amountOfPassengers;
            }
            setStartingAmountOfPassengers(startingAmountOfPassengers) {
                this.getAllAmountsOfPassengers().setStart(startingAmountOfPassengers);
                return this;
            }
            setEndingAmountOfPassengers(endingAmountOfPassengers) {
                this.getAllAmountsOfPassengers().setEnd(endingAmountOfPassengers);
                return this;
            }
            setBothAmountOfPassengers(amountOfPassengers1, amountOfPassengers2) {
                return this.setStartingAmountOfPassengers(amountOfPassengers1).setEndingAmountOfPassengers((amountOfPassengers2 == undefined) ? amountOfPassengers1 : amountOfPassengers2);
            }
            getAmountOfPassengersDifference() {
                return this.__amountOfPassengersDifference.getField();
            }
            getStartingMileageInVehicle() {
                return this.getAllMileagesInVehicles().getStart();
            }
            getEndingMileageInVehicle() {
                return this.getAllMileagesInVehicles().getEnd();
            }
            getAllMileagesInVehicles() {
                return this.__mileageInVehicle;
            }
            setStartingMileageInVehicle(startingMileageInVehicle) {
                this.getAllMileagesInVehicles().setStart(startingMileageInVehicle);
                return this;
            }
            setEndingMileageInVehicle(endingMileageInVehicle) {
                this.getAllMileagesInVehicles().setEnd(endingMileageInVehicle);
                return this;
            }
            setBothMileageInVehicle(mileageInVehicle1, mileageInVehicle2) {
                return this.setStartingMileageInVehicle(mileageInVehicle1).setEndingMileageInVehicle((mileageInVehicle2 == undefined) ? mileageInVehicle1 : mileageInVehicle2);
            }
            getMileageInVehicleDifference() {
                return this.__mileageInVehicleDifference.getField();
            }
        }
        form.Distance = Distance;
        class Expense {
            constructor(salary) {
                this.__callbackToReinitializeTotalExpenses = () => {
                    this.__totalExpenses.setToNotCalculated();
                };
                this.__gaz = new DependantField(this.__callbackToReinitializeTotalExpenses);
                this.__credit = new DependantField(this.__callbackToReinitializeTotalExpenses);
                this.__various = new DependantField(this.__callbackToReinitializeTotalExpenses);
                this.__totalExpenses = new CalculatedField(() => {
                    return this.getGaz() + this.getCredit() + this.getVarious();
                });
                this.__salary = new FinalizeField(salary);
            }
            getSalary() {
                return this.__salary.getField();
            }
            getGaz() {
                return this.__gaz.getField();
            }
            setGaz(gaz) {
                this.__gaz.setField(gaz);
                return this;
            }
            getCredit() {
                return this.__credit.getField();
            }
            setCredit(credit) {
                this.__credit.setField(credit);
                return this;
            }
            getVarious() {
                return this.__various.getField();
            }
            setVarious(various) {
                this.__various.setField(various);
                return this;
            }
            getTotalExpenses() {
                return this.__totalExpenses.getField();
            }
        }
        form.Expense = Expense;
    })(form = src.form || (src.form = {}));
})(src = exports.src || (exports.src = {}));
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZm9tQ2hhdWZmZXVyQ2xhc3Nlcy5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzIjpbImZvbUNoYXVmZmV1ckNsYXNzZXMudHMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6Ijs7QUFBQSxxREFBcUM7QUFFckMsSUFBaUIsR0FBRyxDQWlXbEI7QUFqV0YsV0FBaUIsR0FBRztJQUFDLElBQWlCLElBQUksQ0FpV3pDO0lBaldvQixXQUFpQixJQUFJO1FBR3RDLElBQU8sZUFBZSxHQUFHLG9CQUFHLENBQUMsSUFBSSxDQUFDLFVBQVUsQ0FBQyxlQUFlLENBQUM7UUFDN0QsSUFBTyxjQUFjLEdBQUcsb0JBQUcsQ0FBQyxJQUFJLENBQUMsVUFBVSxDQUFDLGNBQWMsQ0FBQztRQUMzRCxJQUFPLGVBQWUsR0FBRyxvQkFBRyxDQUFDLElBQUksQ0FBQyxVQUFVLENBQUMsZUFBZSxDQUFDO1FBQzdELElBQU8sYUFBYSxHQUFHLG9CQUFHLENBQUMsSUFBSSxDQUFDLFVBQVUsQ0FBQyxhQUFhLENBQUM7UUFDekQsSUFBTyxlQUFlLEdBQUcsb0JBQUcsQ0FBQyxJQUFJLENBQUMsVUFBVSxDQUFDLGVBQWUsQ0FBQztRQUU3RCxNQUFhLE9BQU87WUFnQmhCLFlBQW1CLFFBQWdCO2dCQWRsQix1Q0FBa0MsR0FBZSxHQUFHLEVBQUU7b0JBQ25FLElBQUksQ0FBQyxZQUFZLENBQUMsa0JBQWtCLEVBQUUsQ0FBQztnQkFDM0MsQ0FBQyxDQUFDO2dCQUdlLGFBQVEsR0FBNEIsSUFBSSxlQUFlLEVBQVUsQ0FBQztnQkFDbEUsa0JBQWEsR0FBMEIsSUFBSSxlQUFlLEVBQVEsQ0FBQztnQkFDbkUsYUFBUSxHQUE0QixJQUFJLGVBQWUsQ0FBUyxJQUFJLGNBQWMsQ0FBUyxJQUFJLENBQUMsa0NBQWtDLENBQUMsRUFBRSxJQUFJLGNBQWMsQ0FBUyxJQUFJLENBQUMsa0NBQWtDLENBQUMsQ0FBQyxDQUFDO2dCQUMxTSxvQkFBZSxHQUEyQixJQUFJLGNBQWMsQ0FBUyxJQUFJLENBQUMsa0NBQWtD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