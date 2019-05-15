// http: //dapasa.webs.upv.es/proyectoGTI1b/api/v1.0/parcelas?id=1

var vertices1 = [{
    lat: 38.998776,
    lng: -0.168539
        }, {
    lat: 38.998417,
    lng: -0.167840
        }, {
    lat: 38.997159,
    lng: -0.168892
        }, {
    lat: 38.997501,
    lng: -0.169740
        }];
var punto1 = {
    lat: 38.997921,
    lng: -0.168736
}
var color1 = "#FFFF00";

var vertices2 = [{
    lat: 39.001245,
    lng: -0.169273
        }, {
    lat: 39.000085,
    lng: -0.168133
        }, {
    lat: 38.999418,
    lng: -0.169163
        }, {
    lat: 39.000542,
    lng: -0.170579
        }];
var punto2 = {
    lat: 39.000584,
    lng: -0.169990
}
var color2 = "#0000FF";



function getParcelas(idUsuario) {
    url = 'http://dapasa.webs.upv.es/proyectoGTI1b/api/v1.0/parcelas?id=' + idUsuario;

    fetch(url).then(function (respuesta) {
        //console.log(respuesta);
        return respuesta.json();
    }).then(
        function (datosJson) {
            console.log(datosJson);
            crearListaParcelas(datosJson, 'listaParcelas')
        })
}

function crearListaParcelas(datosParcelas, idContenedor) {
    var contenedor = document.getElementById(idContenedor);
    contenedor.innerHTML = "";
    for (var i = 0; i < datosParcelas.length; i++) {
        var str = `<div>
            <input type="checkbox" id="selParcela-${datosParcelas[i].id}" onchange="seleccionarParcela(this.checked, this.id)">
            <label>${datosParcelas[i].nombre}</label>
        </div>`;
        contenedor.innerHTML += str;

    }
}
var aux =[]
function seleccionarParcela(seleccionada, idCheckbox, datosParcelas, punto, color) {
    var idParcela = idCheckbox.split('-')[1];
    console.log("Parcela " + idParcela + " seleccionada " + seleccionada);
    if (seleccionada == true) {
        aux[idParcela]=dibujarPoligono(datosParcelas, punto, color);
    }

    if (seleccionada == false) {
        aux[idParcela].setMap(null);
    }

}

function dibujarPoligono(vertices, puntos, color) {
    var poligono = new google.maps.Polygon({
        paths: vertices,
        strokeColor: color,
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: color,
        fillOpacity: 0.4,
        map: map,
    });
    var marker = new google.maps.Marker({
        position: puntos,
        map: map
    });
        marker.addListener('click', function() {
          map.setZoom(18);
          map.setCenter(marker.getPosition());
        });
		return poligono;
}

/*------------------------------------*/


/*------------------------------------*/
