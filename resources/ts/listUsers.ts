import {ajax} from "./AjaxCaller";


export namespace src.form {
    import FormAjaxCaller = ajax.FormAjaxCaller;

    export class ListUsers {

        public static changeRole(id: number): void {
            new FormAjaxCaller(<HTMLFormElement>document.getElementById("changeForm-" + id))
                .newCall();
        }

    }

    (() => {
        let $ = window['$'];

        window['changeRole'] = (id: number) => ListUsers.changeRole(id);

        $(document).ready(() => $('#listUsers').DataTable());
    })();
}


