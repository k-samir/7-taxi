export module helper{
  
  export function containInvalidClass() : boolean {
    const elems = document.forms['form_shift'].getElementsByTagName('Input');
    for(let elem of elems){
        if(elem.classList.contains('is-invalid')){
            return true;
        }
    }
    return false;
    }

    export function dateController(date) : boolean{
        let now = new Date().getTime();
        let verified = new Date(date).getTime();
        console.log((now-verified)>0)
        return ((now-verified)>0)
    }
}