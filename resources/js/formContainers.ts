export namespace scr{export namespace form{export namespace containers{

    /**
     * The most generic parent on every fields.
     */
    export interface Field {

    }


    /**
     * A field on which it contain an attribute declared by its generic type
     */
    export interface AccessibleField<T>
        extends Field {

        getField(): T;

    }

    /**
     * A field on which it contain a way to set the attribute by another {@link AccessibleField} or just by the attribute itself.
     * Both require to be from the generic type received.
     * @extends AccessibleField
     */
    export interface MutableField<T>
        extends AccessibleField<T> {

        setField(field: T | AccessibleField<T>): this;

    }


    /**
     * A field on which it contain a single value.<br>
     * It require a final/readonly value on the constructor.
     */
    export class FinalizeField<T>
        implements AccessibleField<T> {

        private readonly __field: T;

        public constructor(readonly field: T) {
            this.__field = field;
        }

        public getField(): T {
            return this.__field;
        }

    }

    /**
     * A field on which it contain a single value.<br>
     * It does not require a value on the constructor and can receive a field or the generic type as an argument
     */
    export class ModifiableField<T>
        implements MutableField<T> {
        private __field: T;

        public constructor();
        public constructor(field: T);
        public constructor(field: AccessibleField<T>);
        public constructor(field?: T | AccessibleField<T>) {
            this.setField(field);
        }

        public getField(): T {
            return this.__field;
        }

        public setField(field: T | AccessibleField<T>): this {
            if (field != null) {
                if ('getField' in field)
                    this.__field = field.getField();
                else
                    this.__field = field;
            }
            return this;
        }

    }


    /**
     * A field container with a dependency on another field.<br>
     * It will trigger the {@link #getCallbackOnModification} when a modification is reached for the field.<br>
     * Don't forget, it's only a container, no trigger will be placed on the field received via the constructor.
     */
    export class DependantField<T>
        implements MutableField<T> {

        private readonly __callbackOnModification: () => void;
        private readonly __field: MutableField<T>;

        public constructor(callbackOnModification: () => void);
        public constructor(callbackOnModification: () => void, field: MutableField<T>);
        public constructor(field: MutableField<T>, callbackOnModification: () => void);
        public constructor(readonly value1: MutableField<T> | (() => void), readonly value2?: MutableField<T> | (() => void)) {
            if (value2 == undefined) {
                //only no field and callback (1st) can be received by the constructor.
                this.__field = new ModifiableField();
                this.__callbackOnModification = <(() => void)>value1;
            } else if ('getField' in value2) {
                //only a field (1st) and a callback (2nd) can be received by the constructor.
                this.__field = value2;
                this.__callbackOnModification = <(() => void)>value1;
            } else {
                //only a field (2nd) and a callback (1st) can be received by the constructor.
                this.__field = <MutableField<T>>value1;
                this.__callbackOnModification = value2;
            }
        }


        public getCallbackOnModification(): () => void {
            return this.__callbackOnModification;
        }

        public getField(): T {
            return this.__field.getField();
        }

        public setField(field: AccessibleField<T> | T): this {
            this.__field.setField(field);
            this.getCallbackOnModification()();
            return this;
        }

    }

    /**
     * A field container with a calculated field.<br>
     * The callback will only be executed when getting the value if and only if the field has been calculated.<br>
     * Call {@link #setToNotCalculated} when wanting to call again the callback inside on the next {@link #getField} call.
     */
    export class CalculatedField<T>
        implements MutableField<T> {

        private __isFieldCalculated: boolean = false;
        private readonly __callbackOnModification: () => T;
        private readonly __field: MutableField<T> = new ModifiableField();


        public constructor(readonly callbackOnModification: () => T) {
            this.__callbackOnModification = callbackOnModification;
        }


        public setToCalculated(): this {
            this.__isFieldCalculated = true;
            return this;
        }

        public setToNotCalculated(): this {
            this.__isFieldCalculated = false;
            return this;
        }

        public getField(): T {
            if (!this.__isFieldCalculated) {
                this.__callbackOnModification();
                this.setToCalculated();
            }
            return this.__field.getField();
        }

        public setField(field: AccessibleField<T> | T): this {
            this.__field.setField(field);
            this.setToNotCalculated();
            return this;
        }

    }


    /**
     * A dual field container from 2 {@link MutableField}<br>
     * The fields can be received via the constructor or initialize (by default) to a new {@link ModifiableField}.
     */
    export class DifferenceField<T>
        implements Field {

        private readonly __startField: MutableField<T>;
        private readonly __endField: MutableField<T>;


        public constructor();
        public constructor(startField: MutableField<T>, endField: MutableField<T>);
        public constructor(readonly startField?: MutableField<T>, readonly endField?: MutableField<T>) {
            if (startField == undefined) {
                this.__startField = new ModifiableField();
                this.__endField = new ModifiableField();
            } else {
                this.__startField = startField;
                this.__endField = endField;
            }
        }


        public getStartField(): MutableField<T> {
            return this.__startField;
        }

        public getStart(): T {
            return this.getStartField().getField();
        }

        public setStart(start: T | AccessibleField<T>): this {
            this.getStartField().setField(start);
            return this;
        }


        public getEndField(): MutableField<T> {
            return this.__endField;
        }

        public getEnd(): T {
            return this.getEndField().getField();
        }

        public setEnd(end: T | AccessibleField<T>): this {
            this.getEndField().setField(end);
            return this;
        }


        public setBothFields(allValues: T | AccessibleField<T>): this;
        public setBothFields(startValue: T | AccessibleField<T>, endValue: T | AccessibleField<T>): this;
        public setBothFields(value1: T | AccessibleField<T>, value2?: T | AccessibleField<T>): this {
            return this.setStart(value1)
                .setEnd((value2 == undefined) ? value1 : value2);
        }

    }

}}}
