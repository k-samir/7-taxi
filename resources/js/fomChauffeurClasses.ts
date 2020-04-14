namespace src{export namespace form{

    interface Field {
    }

    class DifferenceField<T>
        implements Field {

        private __start: T;
        private __end: T;


        public constructor(start?: T, end?: T) {
            this.setBoth(start, end);
        }


        public getStart(): T {
            return this.start;
        }

        private get start(): T {
            return this.__start;
        }

        public setStart(start: T): void {
            this.start = start;
        }

        private set start(start: T) {
            this.__start = start;
        }

        public fSetStart(start: T): this {
            this.setStart(start);
            return this;
        }


        public getEnd(): T {
            return this.end;
        }

        private get end(): T {
            return this.__end;
        }

        public setEnd(end: T): void {
            this.end = end;
        }

        private set end(end: T) {
            this.__end = end;
        }

        public fSetEnd(end: T): this {
            this.setEnd(end);
            return this;
        }


        public setBoth(allValues: T): void;
        public setBoth(startValue: T, endValue: T): void;
        public setBoth(value1: T, value2?: T): void {
            this.fSetStart(value1).fSetEnd((value2 == null) ? value1 : value2);
        }

        public fSetBoth(allValues: T): this;
        public fSetBoth(startValue: T, endValue: T): this;
        public fSetBoth(value1: T, value2?: T): this {
            this.setBoth(value1, value2);
            return this;
        }

    }

    class CalculatedField<T>
        implements Field {

        private ___isCalculated: boolean;
        private readonly __procedureToExecute:()=>T;
        private __field: T;


        public constructor(procedureToExecute: () => T, field?: T) {
            this.__procedureToExecute = procedureToExecute;
            this.setField(field);
        }


        public isCalculated() {
            return this.__isCalculated;
        }

        private get __isCalculated(): boolean {
            return this.___isCalculated;
        }

        public setCalculated(isCalculated: boolean): void {
            this.__isCalculated = isCalculated;
        }

        public setIsNotCalculated(): void {
            this.setCalculated(false);
        }

        public setIsCalculated(): void {
            this.setCalculated(true);
        }

        private set __isCalculated(isCalculated: boolean) {
            this.___isCalculated = isCalculated;
        }


        private get procedureToExecute(): () => T {
            return this.__procedureToExecute;
        }

        public getField(): T {
            return this.field;
        }

        private get field(): T {
            return this.__field;
        }

        public setField(field: T): void {
            this.field = field;
        }

        public fSetField(field: T): this {
            this.setField(field);
            return this;
        }

        private set field(field: T) {
            if (this.isCalculated()) this.fSetField(this.procedureToExecute()).setIsCalculated();
            this.__field = field;
        }


    }


    export class General {

        private readonly __driverNo: number;
        private __taxiNo: number;
        private readonly __dateTime: DifferenceField<Date>;
        private readonly __recette: DifferenceField<number>;
        private __totalFixPrice: number;

        private readonly __recetteReel: CalculatedField<number> = new CalculatedField<number>(() => {
            return this.recette.getEnd() - this.recette.getStart() + this.totalFixPrice;
        });

        public constructor(driverNo: number) {
            this.__driverNo = driverNo;
        }


        public getDriverNo(): number {
            return this.driverNo;
        }

        private get driverNo(): number {
            return this.__driverNo;
        }


        public getTaxiNo(): number {
            return this.taxiNo;
        }

        private get taxiNo(): number {
            return this.__taxiNo;
        }

        public setTaxiNo(taxiNo: number): this {
            this.taxiNo = taxiNo;
            return this;
        }

        private set taxiNo(taxiNo: number) {
            this.__taxiNo = taxiNo;
        }


        public getDateAndTime(): DifferenceField<Date> {
            return this.dateAndTime;
        }

        private get dateAndTime(): DifferenceField<Date> {
            return this.__dateTime;
        }

        public setDateAndTime(allDates: Date): this;
        public setDateAndTime(startingDate: Date, endingDate: Date): this;
        public setDateAndTime(date1: Date, date2?: Date): this {
            this.dateAndTime.setBoth(date1, date2);
            return this;
        }


        public getRecette():DifferenceField<number>{
            return this.recette;
        }
        private get recette(): DifferenceField<number> {
            return this.__recette;
        }

        public setRecette(allRecettes: number): this;
        public setRecette(startingRecette: number, endingRecette: number): this;
        public setRecette(recette1: number, recette2?: number): this {
            this.recette.setBoth(recette1, recette2);
            this.getRecetteReelField().setIsNotCalculated();
            return this;
        }


        public getTotalFixPrice(): number {
            return this.totalFixPrice;
        }

        private get totalFixPrice(): number {
            return this.__totalFixPrice;
        }

        public setTotalFixPrice(totalFixPrice: number): this {
            this.totalFixPrice = totalFixPrice;
            return this;
        }

        private set totalFixPrice(totalFixPrice: number) {
            this.__totalFixPrice = totalFixPrice;
            this.getRecetteReelField().setIsNotCalculated();
        }


        public getRecetteReel(): number {
            return this.getRecetteReelField().getField();
        }

        private getRecetteReelField(): CalculatedField<number> {
            return this.recetteReel;
        }

        public get recetteReel(): CalculatedField<number> {
            return this.__recetteReel;
        }



    }

}}
