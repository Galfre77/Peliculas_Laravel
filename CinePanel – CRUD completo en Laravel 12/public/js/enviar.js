function enviarForm(metodo){
    document.querySelector('input[name="_method"]').value = metodo;
    document.querySelector('form').submit();
}
