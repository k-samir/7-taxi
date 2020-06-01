import {ajax} from "./AjaxCaller";
import FormAjaxCaller = ajax.FormAjaxCaller;

export namespace src.form {

    export class ListUsers {

        public static changeRole(id: number): void {
            new FormAjaxCaller(<HTMLFormElement>document.getElementById("changeForm-" + id)).newCall();
        }

    }

}

import ListUsers = src.form.ListUsers;

(() => {
    let $ = window['$'];

    window['changeRole'] = (id: number) => ListUsers.changeRole(id);

    $(document).ready(() => $('#listUsers').DataTable());
})();
