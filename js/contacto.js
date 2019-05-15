//console.log('funcionando')

var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    console.log('me diste un click')
    
    var datos = new FormData(formulario)
    
    console.log(datos);
    console.log(datos.get('nombre'));
    console.log(datos.get('apellidos'));
    console.log(datos.get('email'));
    console.log(datos.get('telefono'));
    console.log(datos.get('mensaje'));
    
    fetch('../proyecto/post.php', {
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
        console.log(data)
        if(data === 'error'){
            respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    LLena todos los campos.
                </div>
            `
        }else{
           respuesta.innerHTML = `
                <div class="alert alert-success" role="alert">
                    Su mensaje ha sido enviado!
                </div>
            ` 
        }
    })
})