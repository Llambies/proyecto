function iniciarModal() {
    document.getElementById('fondoModal').style.display = "flex";
}

function ocultarModal() {
    document.getElementById('fondoModal').style.display = "none";

}

var modal = document.getElementById('fondoModal');
var botonCancelar = document.getElementById('botonCancelar');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById('recuperarPass').style.display = "none";
        document.getElementById('contenidoModal').style.display = "flex";
    }
    if (event.target == botonCancelar) {
        document.getElementById('recuperarPass').style.display = "none";
        document.getElementById('contenidoModal').style.display = "flex";
    }
}

function recuperarPass() {
    document.getElementById('recuperarPass').style.display = "flex";
    document.getElementById('contenidoModal').style.display = "none";


}