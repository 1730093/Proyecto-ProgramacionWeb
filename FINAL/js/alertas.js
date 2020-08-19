// Elementos HTML de la página con los que vamos a trabajar.
const btnEnviar = document.getElementById('btnEnviar');
const txtNombre = document.getElementById('inSexo');
const txtFecha = document.getElementById('inFecha');

btnEnviar.addEventListener('click', btnEnviar_click);
btnEnviar.addEventListener('click', function (e) {
    console.log('Hola desde el boton sumbit');
});
btnEnviar.addEventListener('click', e => console.log('Hola'));

txtNombre.addEventListener('keyup', e => {
    console.log('txtNombre: ' + txtNombre.value);
});

txtNombre.addEventListener('keyup', e => {
    console.log('txtFecha: ' + txtFecha.value);
});

function btnEnviar_click(e) {
    if (!txtNombre.value) {
        alert('No ha proporcionado el nombre.');
        txtNombre.focus();
        return;
    }
    //alert('Sexo es  ' + txtNombre.value);
    //alert('Fecha ES ' + txtFecha.value);

}