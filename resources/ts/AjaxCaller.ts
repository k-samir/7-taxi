export module ajax {
    const $ = window['$'];

    export abstract class Method {
        private readonly __method:string;
        private constructor(method:string) {
            this.__method=method;
        }

        public static readonly GET = new class extends Method{
            constructor() {
                super("get");
            }
        };
        public static readonly POST = new class extends Method{
            constructor() {
                super("post");
            }
        };

        public get method():string{
            return this.__method;
        }
    }


    export abstract class AjaxCaller {

        private __callbackActionOnSuccess: (success: object, textStatus?: string, jQueryXMLHTTPRequest?) => void;
        private __callbackActionOnError: (error: object, textStatus?: string, jQueryXMLHTTPRequest?) => void;
        private __callbackOnError: (jQueryXMLHTTPRequest, textStatus?: string, errorThrown?) => void;

        protected constructor() {
        }


        public setActionOnSuccess(callback: (success: object, textStatus?: string, jQueryXMLHTTPRequest?) => void): this {
            this.__callbackActionOnSuccess = callback;
            return this;
        }

        public setActionOnError(callback: (error: object, textStatus?: string, jQueryXMLHTTPRequest?) => void): this {
            this.__callbackActionOnError = callback;
            return this;
        }

        public setOnError(callback: (jQueryXMLHTTPRequest, textStatus?: string, errorThrown?) => void): this {
            this.__callbackOnError = callback;
            return this;
        }


        protected abstract ajaxData():object


        public newCall(): void {
            $.ajax(this.ajaxData())
                .done((data: { error: object, success: object }, textStatus: string, jQueryXMLHTTPRequest) => this.__onSuccess(data, textStatus, jQueryXMLHTTPRequest))
                .fail((jQueryXMLHTTPRequest, textStatus: string, errorThrown) => this.__onError(jQueryXMLHTTPRequest, textStatus, errorThrown));
        }

        private __onSuccess(data: { error: object, success: object }, textStatus: string, jQueryXMLHTTPRequest): void {
            if (data.error == null) {
                if (this.callbackActionOnSuccess != null) this.callbackActionOnSuccess(data, textStatus, jQueryXMLHTTPRequest);
            } else {
                if (this.callbackActionOnError != null) this.callbackActionOnError(data, textStatus, jQueryXMLHTTPRequest);
            }
        }

        private __onError(jQueryXMLHTTPRequest, textStatus: string, errorThrown): void {
            if (this.callbackOnError != null) this.callbackOnError(jQueryXMLHTTPRequest, textStatus, errorThrown);
        }


        protected get callbackActionOnSuccess(): (success: object, textStatus?: string, jQueryXMLHTTPRequest?) => void {
            return this.__callbackActionOnSuccess;
        }

        protected get callbackActionOnError(): (error: object, textStatus?: string, jQueryXMLHTTPRequest?) => void {
            return this.__callbackActionOnError;
        }

        protected get callbackOnError(): (jQueryXMLHTTPRequest, textStatus?: string, errorThrown?) => void {
            return this.__callbackOnError;
        }

    }


    export class FormAjaxCaller
        extends AjaxCaller {

        private readonly form: HTMLFormElement;


        public constructor(form: HTMLFormElement) {
            super();
            this.form = form;
        }

        protected ajaxData(): object {
            return {
                method: this.form.attr('method'),
                url: this.form.attr('action'),
                data: this.form.serialize(undefined),
            };
        }

    }

    export class EmptyAjaxCaller
        extends AjaxCaller {

        private readonly method: Method;
        private readonly url: string;

        public constructor(method: Method, url: string) {
            super();
            this.method = method;
            this.url = url;
        }

        protected ajaxData(): object {
            return {
                method: this.method.method,
                url: this.url,
            };
        }

    }

}
