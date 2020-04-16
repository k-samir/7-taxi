"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var scr;
(function (scr) {
    let form;
    (function (form) {
        let containers;
        (function (containers) {
            /**
             * A field on which it contain a single value.<br>
             * It require a final/readonly value on the constructor.
             */
            class FinalizeField {
                constructor(field) {
                    this.field = field;
                    this.__field = field;
                }
                getField() {
                    return this.__field;
                }
            }
            containers.FinalizeField = FinalizeField;
            /**
             * A field on which it contain a single value.<br>
             * It does not require a value on the constructor and can receive a field or the generic type as an argument
             */
            class ModifiableField {
                constructor(field) {
                    this.setField(field);
                }
                getField() {
                    return this.__field;
                }
                setField(field) {
                    if (field != null) {
                        if ('getField' in field)
                            this.__field = field.getField();
                        else
                            this.__field = field;
                    }
                    return this;
                }
            }
            containers.ModifiableField = ModifiableField;
            /**
             * A field container with a dependency on another field.<br>
             * It will trigger the {@link #getCallbackOnModification} when a modification is reached for the field.<br>
             * Don't forget, it's only a container, no trigger will be placed on the field received via the constructor.
             */
            class DependantField {
                constructor(value1, value2) {
                    this.value1 = value1;
                    this.value2 = value2;
                    if (value2 == undefined) {
                        //only no field and callback (1st) can be received by the constructor.
                        this.__field = new ModifiableField();
                        this.__callbackOnModification = value1;
                    }
                    else if ('getField' in value2) {
                        //only a field (1st) and a callback (2nd) can be received by the constructor.
                        this.__field = value2;
                        this.__callbackOnModification = value1;
                    }
                    else {
                        //only a field (2nd) and a callback (1st) can be received by the constructor.
                        this.__field = value1;
                        this.__callbackOnModification = value2;
                    }
                }
                getCallbackOnModification() {
                    return this.__callbackOnModification;
                }
                getField() {
                    return this.__field.getField();
                }
                setField(field) {
                    this.__field.setField(field);
                    this.getCallbackOnModification()();
                    return this;
                }
            }
            containers.DependantField = DependantField;
            /**
             * A field container with a calculated field.<br>
             * The callback will only be executed when getting the value if and only if the field has been calculated.<br>
             * Call {@link #setToNotCalculated} when wanting to call again the callback inside on the next {@link #getField} call.
             */
            class CalculatedField {
                constructor(callbackOnModification) {
                    this.callbackOnModification = callbackOnModification;
                    this.__isFieldCalculated = false;
                    this.__field = new ModifiableField();
                    this.__callbackOnModification = callbackOnModification;
                }
                setToCalculated() {
                    this.__isFieldCalculated = true;
                    return this;
                }
                setToNotCalculated() {
                    this.__isFieldCalculated = false;
                    return this;
                }
                getField() {
                    if (!this.__isFieldCalculated) {
                        this.__callbackOnModification();
                        this.setToCalculated();
                    }
                    return this.__field.getField();
                }
                setField(field) {
                    this.__field.setField(field);
                    this.setToNotCalculated();
                    return this;
                }
            }
            containers.CalculatedField = CalculatedField;
            /**
             * A dual field container from 2 {@link MutableField}<br>
             * The fields can be received via the constructor or initialize (by default) to a new {@link ModifiableField}.
             */
            class DifferenceField {
                constructor(startField, endField) {
                    this.startField = startField;
                    this.endField = endField;
                    if (startField == undefined) {
                        this.__startField = new ModifiableField();
                        this.__endField = new ModifiableField();
                    }
                    else {
                        this.__startField = startField;
                        this.__endField = endField;
                    }
                }
                getStartField() {
                    return this.__startField;
                }
                getStart() {
                    return this.getStartField().getField();
                }
                setStart(start) {
                    this.getStartField().setField(start);
                    return this;
                }
                getEndField() {
                    return this.__endField;
                }
                getEnd() {
                    return this.getEndField().getField();
                }
                setEnd(end) {
                    this.getEndField().setField(end);
                    return this;
                }
                setBothFields(value1, value2) {
                    return this.setStart(value1)
                        .setEnd((value2 == undefined) ? value1 : value2);
                }
            }
            containers.DifferenceField = DifferenceField;
        })(containers = form.containers || (form.containers = {}));
    })(form = scr.form || (scr.form = {}));
})(scr = exports.scr || (exports.scr = {}));
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiZm9ybUNvbnRhaW5lcnMuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJmb3JtQ29udGFpbmVycy50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOztBQUFBLElBQWlCLEdBQUcsQ0E2T2pCO0FBN09ILFdBQWlCLEdBQUc7SUFBQyxJQUFpQixJQUFJLENBNk94QztJQTdPbUIsV0FBaUIsSUFBSTtRQUFDLElBQWlCLFVBQVUsQ0E2T3JFO1FBN08wQyxXQUFpQixVQUFVO1lBaUNsRTs7O2VBR0c7WUFDSCxNQUFhLGFBQWE7Z0JBS3RCLFlBQTRCLEtBQVE7b0JBQVIsVUFBSyxHQUFMLEtBQUssQ0FBRztvQkFDaEMsSUFBSSxDQUFDLE9BQU8sR0FBRyxLQUFLLENBQUM7Z0JBQ3pCLENBQUM7Z0JBRU0sUUFBUTtvQkFDWCxPQUFPLElBQUksQ0FBQyxPQUFPLENBQUM7Z0JBQ3hCLENBQUM7YUFFSjtZQWJZLHdCQUFhLGdCQWF6QixDQUFBO1lBRUQ7OztlQUdHO1lBQ0gsTUFBYSxlQUFlO2dCQU94QixZQUFtQixLQUE4QjtvQkFDN0MsSUFBSSxDQUFDLFFBQVEsQ0FBQyxLQUFLLENBQUMsQ0FBQztnQkFDekIsQ0FBQztnQkFFTSxRQUFRO29CQUNYLE9BQU8sSUFBSSxDQUFDLE9BQU8sQ0FBQztnQkFDeEIsQ0FBQztnQkFFTSxRQUFRLENBQUMsS0FBNkI7b0JBQ3pDLElBQUksS0FBSyxJQUFJLElBQUksRUFBRTt3QkFDZixJQUFJLFVBQVUsSUFBSSxLQUFLOzRCQUNuQixJQUFJLENBQUMsT0FBTyxHQUFHLEtBQUssQ0FBQyxRQUFRLEVBQUUsQ0FBQzs7NEJBRWhDLElBQUksQ0FBQyxPQUFPLEdBQUcsS0FBSyxDQUFDO3FCQUM1QjtvQkFDRCxPQUFPLElBQUksQ0FBQztnQkFDaEIsQ0FBQzthQUVKO1lBekJZLDBCQUFlLGtCQXlCM0IsQ0FBQTtZQUdEOzs7O2VBSUc7WUFDSCxNQUFhLGNBQWM7Z0JBU3ZCLFlBQTRCLE1BQXNDLEVBQVcsTUFBdUM7b0JBQXhGLFdB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