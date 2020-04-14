namespace src{export namespace form{

    class Difference<T> {

        public constructor(start?: T, end?: T) {
            this.start = start;
            this.end = end;
        }

        private __start: T;
        private __end: T;


        public getStart(): T {
            return this.start;
        }

        public get start(): T {
            return this.__start;
        }

        public setStart(start: T): void {
            this.start = start;
        }

        public set start(start: T) {
            this.__start = start;
        }

        public fSetStart(start: T): this {
            this.setStart(start);
            return this;
        }


        public getEnd(): T {
            return this.end;
        }

        public get end(): T {
            return this.__end;
        }

        public setEnd(end: T): void {
            this.end = end;
        }

        public set end(end: T) {
            this.__end = end;
        }

        public fSetEnd(end: T): this {
            this.setEnd(end);
            return this;
        }


    }

}}
