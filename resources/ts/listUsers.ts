import {ajax} from "./AjaxCaller";
import FormAjaxCaller = ajax.FormAjaxCaller;

export namespace src.form {

    export class ListUsers {

        public changeRole(id: number): void {
            new FormAjaxCaller(<HTMLFormElement>document.getElementById("changeForm-" + id)).newCall();
        }

    }

}

import ListUsers = src.form.ListUsers;
(() => {
    let listUsers = new ListUsers();
    window['changeRole'] = (id) => listUsers.changeRole(id);
})();
