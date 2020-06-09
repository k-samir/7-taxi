import {ajax} from "./AjaxCaller";


export namespace src.form {
    import FormAjaxCaller = ajax.FormAjaxCaller;

    export class ListUsers {

        private static __indexOfMessage = 0;


        public static changeRole(id: number): void {
            new FormAjaxCaller(<HTMLFormElement>document.getElementById("changeForm-" + id))
                .setActionOnSuccess(ListUsers.__createLabel)
                .setActionOnError(ListUsers.__createLabel)
                .newCall();
        }


        private static __createLabel(object: { message: string, type: string }): void {
            let label = document.createElement('label');
            label.textContent = object.message;
            label.classList.add(object.type);
            let labelID = "message" + ListUsers.__indexOfMessage++;
            label.id = labelID
            label.onclick = () => document.getElementById(labelID).hidden = true;
            document.getElementById('messageContainer').appendChild(label);
        }

    }

    (() => {
        let $ = window['$'];

        window['changeRole'] = (id: number) => ListUsers.changeRole(id);

        $(document).ready(() => $('#listUsers').DataTable());
    })();
}


