namespace src{export namespace form{

    class Difference<T> {

        private __start: T;
        private __end: T;


        public constructor(start?: T, end?: T) {
            this.setBoth(start,end);
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

    export class General {

        private readonly __driverNo: number;
        private __taxiNo: number;
        private __dateTime: Difference<Date>;
        private __recette: Difference<number>;
        private __totalFixPrice: number;

        private __recetteReelCalcule = false;
        private __recetteReel: number;


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


        public getDateAndTime(): Difference<Date> {
            return this.dateAndTime;
        }

        private get dateAndTime(): Difference<Date> {
            return this.__dateTime;
        }

        public setDateAndTime(allDates: Date): this;
        public setDateAndTime(startingDate: Date, endingDate: Date): this;
        public setDateAndTime(date1: Date, date2?: Date): this {
            this.dateAndTime.setBoth(date1, date2);
            return this;
        }

        private set dateAndTime(dateAndTime: Difference<Date>) {
            this.__dateTime = dateAndTime;
        }


        public getRecette():Difference<number>{
            return this.recette;
        }
        private get recette(): Difference<number> {
            return this.__recette;
        }

        public setRecette(allRecettes: number): this;
        public setRecette(startingRecette: number, endingRecette: number): this;
        public setRecette(recette1: number, recette2?: number): this {
            this.recette.setBoth(recette1, recette2);
            return this;
        }
        private set recette(recette: Difference<number>) {
            this.__recette = recette;
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
        }


        private get recetteReelCalcule(): boolean {
            return this.__recetteReelCalcule;
        }

        private set recetteReelCalcule(recetteReelCalcule: boolean) {
            this.__recetteReelCalcule = recetteReelCalcule;
        }


        public getRecetteReel(): number {
            return this.recetteReel;
        }

        private get recetteReel(): number {
            if (!this.recetteReelCalcule)
                this.__calculerRecetteReel();
            return this.__recetteReel;
        }

        private set recetteReel(recetteReel: number) {
            this.__recetteReel = recetteReel;
        }

        private __calculerRecetteReel() {
            this.recetteReel = this.recette.getEnd() - this.recette.getStart() + this.totalFixPrice;
            this.recetteReelCalcule = true;
        }


    }

}}
