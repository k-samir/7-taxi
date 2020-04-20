import {scr} from "./formContainers";

export namespace src{export namespace form{

    import AccessibleField = scr.form.containers.AccessibleField;
    import CalculatedField = scr.form.containers.CalculatedField;
    import DependantField = scr.form.containers.DependantField;
    import DifferenceField = scr.form.containers.DifferenceField;
    import FinalizeField = scr.form.containers.FinalizeField;
    import ModifiableField = scr.form.containers.ModifiableField;

    export class General {

        private readonly __callbackToReinitializeRealRecipe: () => void = () => {
            this.__realRecipe.setToNotCalculated();
        };

        private readonly __driverNo: FinalizeField<number>;
        private readonly __taxiNo: ModifiableField<number> = new ModifiableField<number>();
        private readonly __dateAndTime: DifferenceField<Date> = new DifferenceField<Date>();
        private readonly __recipe: DifferenceField<number> = new DifferenceField<number>(new DependantField<number>(this.__callbackToReinitializeRealRecipe), new DependantField<number>(this.__callbackToReinitializeRealRecipe));
        private readonly __totalFixPrice: DependantField<number> = new DependantField<number>(this.__callbackToReinitializeRealRecipe);
        private readonly __realRecipe: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.getEndingRecipe() - this.getStartingRecipe() + this.getTotalFixPrice();
        });


        public constructor(driverNo: number) {
            this.__driverNo = new FinalizeField<number>(driverNo);
        }


        public getDriverNo(): number {
            return this.__driverNo.getField();
        }


        public getTaxiNo(): number {
            return this.__taxiNo.getField();
        }

        public setTaxiNo(taxiNo: number | AccessibleField<number>) {
            this.__taxiNo.setField(taxiNo);
        }


        public getStartingDate(): Date {
            return this.getAllDateAndTime().getStart();
        }

        public getEndingDate(): Date {
            return this.getAllDateAndTime().getEnd();
        }

        public getAllDateAndTime(): DifferenceField<Date> {
            return this.__dateAndTime;
        }

        public setStartingDate(startingDate: Date | AccessibleField<Date>): this {
            this.getAllDateAndTime().setStart(startingDate);
            return this;
        }

        public setEndingDate(endingDate: Date | AccessibleField<Date>): this {
            this.getAllDateAndTime().setEnd(endingDate);
            return this;
        }

        public setBothDateAndTime(allDates: Date | AccessibleField<Date>): this;
        public setBothDateAndTime(startingDate: Date | AccessibleField<Date>, endingDate: Date | AccessibleField<Date>): this;
        public setBothDateAndTime(date1: Date | AccessibleField<Date>, date2?: Date | AccessibleField<Date>): this {
            this.getAllDateAndTime().setBothFields(date1, date2);
            return this;
        }


        public getStartingRecipe(): number {
            return this.getAllRecipes().getStart();
        }

        public getEndingRecipe(): number {
            return this.getAllRecipes().getEnd();
        }

        public getAllRecipes(): DifferenceField<number> {
            return this.__recipe;
        }

        public setStartingRecipe(startingRecipe: number | AccessibleField<number>): this {
            this.getAllRecipes().setStart(startingRecipe);
            return this;
        }

        public setEndingRecipe(endingRecipe: number | AccessibleField<number>): this {
            this.getAllRecipes().setEnd(endingRecipe);
            return this;
        }

        public setBothRecipe(allRecipes: number | AccessibleField<number>): this;
        public setBothRecipe(startingRecipe: number | AccessibleField<number>, endingRecipe: number | AccessibleField<number>): this;
        public setBothRecipe(recipe1: number | AccessibleField<number>, recipe2?: number | AccessibleField<number>): this {
            return this.setStartingRecipe(recipe1).setEndingRecipe((recipe2 == undefined) ? recipe1 : recipe2);
        }


        public getTotalFixPrice(): number {
            return this.__totalFixPrice.getField();
        }

        public setTotalFixPrice(totalFixPrice: number | AccessibleField<number>): this {
            this.__totalFixPrice.setField(totalFixPrice);
            return this;
        }


        public getRealRecipe(): number {
            return this.__realRecipe.getField();
        }

    }

    export class Distance {

        private readonly __callbackToReinitializeMileageDifference: () => void = () => {
            this.__mileageDifference.setToNotCalculated();
        };
        private readonly __callbackToReinitializeMileageLadenDifference: () => void = () => {
            this.__mileageLadenDifference.setToNotCalculated();
        };
        private readonly __callbackToReinitializeAmountOfPassengersDifference: () => void = () => {
            this.__amountOfPassengersDifference.setToNotCalculated();
        };
        private readonly __callbackToReinitializeMileageInVehicleDifference: () => void = () => {
            this.__mileageInVehicleDifference.setToNotCalculated();
        };

        private readonly __mileage: DifferenceField<number> = new DifferenceField<number>(new DependantField<number>(this.__callbackToReinitializeMileageDifference), new DependantField<number>(this.__callbackToReinitializeMileageDifference));
        private readonly __mileageDifference: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.getStartingMileage() - this.getEndingMileage()
        });

        private readonly __mileageLaden: DifferenceField<number> = new DifferenceField<number>(new DependantField<number>(this.__callbackToReinitializeMileageLadenDifference), new DependantField<number>(this.__callbackToReinitializeMileageLadenDifference));
        private readonly __mileageLadenDifference: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.getEndingMileageLaden() - this.getStartingMileageLaden();
        });

        private readonly __amountOfPassengers: DifferenceField<number> = new DifferenceField<number>(new DependantField<number>(this.__callbackToReinitializeAmountOfPassengersDifference), new DependantField<number>(this.__callbackToReinitializeAmountOfPassengersDifference));
        private readonly __amountOfPassengersDifference: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.getEndingAmountOfPassengers() - this.getStartingAmountOfPassengers();
        });

        private readonly __mileageInVehicle: DifferenceField<number> = new DifferenceField<number>(new DependantField<number>(this.__callbackToReinitializeMileageInVehicleDifference), new DependantField<number>(this.__callbackToReinitializeMileageInVehicleDifference));
        private readonly __mileageInVehicleDifference: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.getEndingMileageInVehicle() - this.getStartingMileageInVehicle();
        });


        public constructor() {
        }


        public getStartingMileage(): number {
            return this.getAllMileages().getStart();
        }

        public getEndingMileage(): number {
            return this.getAllMileages().getEnd();
        }

        public getAllMileages(): DifferenceField<number> {
            return this.__mileage;
        }

        public setStartingMileage(startingMileage: number | AccessibleField<number>): this {
            this.getAllMileages().setStart(startingMileage);
            return this;
        }

        public setEndingMileage(endingMileage: number | AccessibleField<number>): this {
            this.getAllMileages().setEnd(endingMileage);
            return this;
        }

        public setBothMileage(allMileages: number | AccessibleField<number>): this;
        public setBothMileage(startingMileage: number | AccessibleField<number>, endingMileage: number | AccessibleField<number>): this;
        public setBothMileage(mileage1: number | AccessibleField<number>, mileage2?: number | AccessibleField<number>): this {
            return this.setStartingMileage(mileage1).setEndingMileage((mileage2 == undefined) ? mileage1 : mileage2);
        }

        public getMileageDifference(): number {
            return this.__mileageDifference.getField();
        }


        public getStartingMileageLaden(): number {
            return this.getAllMileageLaden().getStart();
        }

        public getEndingMileageLaden(): number {
            return this.getAllMileageLaden().getEnd();
        }

        public getAllMileageLaden(): DifferenceField<number> {
            return this.__mileageLaden;
        }

        public setStartingMileageLaden(startingMileageLaden: number | AccessibleField<number>): this {
            this.getAllMileageLaden().setStart(startingMileageLaden);
            return this;
        }

        public setEndingMileagesLaden(endingMileageLaden: number | AccessibleField<number>): this {
            this.getAllMileageLaden().setEnd(endingMileageLaden);
            return this;
        }

        public setBothMileageLaden(allMileageLaden: number | AccessibleField<number>): this;
        public setBothMileageLaden(startingMileageLaden: number | AccessibleField<number>, endingMileageLaden: number | AccessibleField<number>): this;
        public setBothMileageLaden(mileageLaden1: number | AccessibleField<number>, mileageLaden2?: number | AccessibleField<number>): this {
            return this.setStartingMileageLaden(mileageLaden1).setEndingMileagesLaden((mileageLaden2 == undefined) ? mileageLaden1 : mileageLaden2);
        }

        public getMileageLaden(): number {
            return this.__mileageLadenDifference.getField();
        }


        public getStartingAmountOfPassengers(): number {
            return this.getAllAmountsOfPassengers().getStart();
        }

        public getEndingAmountOfPassengers(): number {
            return this.getAllAmountsOfPassengers().getEnd();
        }

        public getAllAmountsOfPassengers(): DifferenceField<number> {
            return this.__amountOfPassengers;
        }

        public setStartingAmountOfPassengers(startingAmountOfPassengers: number | AccessibleField<number>): this {
            this.getAllAmountsOfPassengers().setStart(startingAmountOfPassengers);
            return this;
        }

        public setEndingAmountOfPassengers(endingAmountOfPassengers: number | AccessibleField<number>): this {
            this.getAllAmountsOfPassengers().setEnd(endingAmountOfPassengers);
            return this;
        }

        public setBothAmountOfPassengers(allAmountsOfPassengers: number | AccessibleField<number>): this;
        public setBothAmountOfPassengers(startingAmountOfPassengers: number | AccessibleField<number>, endingAmountOfPassengers: number | AccessibleField<number>): this;
        public setBothAmountOfPassengers(amountOfPassengers1: number | AccessibleField<number>, amountOfPassengers2?: number | AccessibleField<number>): this {
            return this.setStartingAmountOfPassengers(amountOfPassengers1).setEndingAmountOfPassengers((amountOfPassengers2 == undefined) ? amountOfPassengers1 : amountOfPassengers2);
        }

        public getAmountOfPassengersDifference(): number {
            return this.__amountOfPassengersDifference.getField();
        }


        public getStartingMileageInVehicle(): number {
            return this.getAllMileagesInVehicles().getStart();
        }

        public getEndingMileageInVehicle(): number {
            return this.getAllMileagesInVehicles().getEnd();
        }

        public getAllMileagesInVehicles(): DifferenceField<number> {
            return this.__mileageInVehicle;
        }

        public setStartingMileageInVehicle(startingMileageInVehicle: number | AccessibleField<number>): this {
            this.getAllMileagesInVehicles().setStart(startingMileageInVehicle);
            return this;
        }

        public setEndingMileageInVehicle(endingMileageInVehicle: number | AccessibleField<number>): this {
            this.getAllMileagesInVehicles().setEnd(endingMileageInVehicle);
            return this;
        }

        public setBothMileageInVehicle(allMileagesInVehicles: number | AccessibleField<number>): this;
        public setBothMileageInVehicle(startingMileageInVehicle: number | AccessibleField<number>, endingMileageInVehicle: number | AccessibleField<number>): this;
        public setBothMileageInVehicle(mileageInVehicle1: number | AccessibleField<number>, mileageInVehicle2?: number | AccessibleField<number>): this {
            return this.setStartingMileageInVehicle(mileageInVehicle1).setEndingMileageInVehicle((mileageInVehicle2 == undefined) ? mileageInVehicle1 : mileageInVehicle2);
        }

        public getMileageInVehicleDifference(): number {
            return this.__mileageInVehicleDifference.getField();
        }


    }

    export class Expense {

        private readonly __callbackToReinitializeTotalExpenses: () => void = () => {
            this.__totalExpenses.setToNotCalculated();
        };

        private readonly __salary: FinalizeField<number>;
        private readonly __gaz: DependantField<number> = new DependantField<number>(this.__callbackToReinitializeTotalExpenses);
        private readonly __credit: DependantField<number> = new DependantField<number>(this.__callbackToReinitializeTotalExpenses);
        private readonly __various: DependantField<number> = new DependantField<number>(this.__callbackToReinitializeTotalExpenses);
        private readonly __totalExpenses: CalculatedField<number> = new CalculatedField(() => {
            return this.getGaz() + this.getCredit() + this.getVarious();
        });

        public constructor(salary: number) {
            this.__salary = new FinalizeField<number>(salary);
        }


        public getSalary(): number {
            return this.__salary.getField();
        }


        public getGaz(): number {
            return this.__gaz.getField();
        }

        public setGaz(gaz: number | AccessibleField<number>): this {
            this.__gaz.setField(gaz);
            return this;
        }


        public getCredit(): number {
            return this.__credit.getField();
        }

        public setCredit(credit: number | AccessibleField<number>): this {
            this.__credit.setField(credit);
            return this;
        }


        public getVarious(): number {
            return this.__various.getField();
        }

        public setVarious(various: number | AccessibleField<number>): this {
            this.__various.setField(various);
            return this;
        }


        public getTotalExpenses(): number {
            return this.__totalExpenses.getField();
        }

    }

}}
