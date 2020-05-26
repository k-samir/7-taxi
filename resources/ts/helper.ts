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
}