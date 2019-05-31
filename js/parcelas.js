// http://dapasa.webs.upv.es/proyectoGTI1b/api/v1.0/parcelas?id=1


function getParcelas(idUsuario) {
    url = 'https://admallla.upv.edu.es/zonacliente.php?id=' + idUsuario;

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
var aux=[]
var aux2=[]

function seleccionarParcela(seleccionada, idParcela, datosParcelas, punto, color,parcelaID,datos,cajaID,IdNodo) {
    console.log("Parcela " + idParcela + " seleccionada " + seleccionada);

	var nodos=[];
	var b= 0;
	for (var i =  0; punto.length > i; i++) {
		nodos[b] = {lat:Number(punto[i]), lng:Number(punto[i+1])};
		i++;
		b++;
	}
	console.log(nodos);

	var puntos=[];
	var a= 0;
	for (var i =  0; datosParcelas.length > i; i++) {
		puntos[a] = {lat:Number(datosParcelas[i]), lng:Number(datosParcelas[i+1])};
		i++;
		a++;
	}
			console.log(puntos)
			



    if (seleccionada == true) {
        aux[idParcela]=dibujarPoligono(puntos, color);
        aux2[idParcela]=dibujarNodo(nodos,datos,IdNodo);
        document.getElementById(parcelaID).style.display = "block";
        document.getElementById(cajaID).style.background = "#28a745";
        document.getElementById(cajaID).style.color = "#fff";
        


    }

    if (seleccionada == false) {
        aux[idParcela].setMap(null);
        aux2[idParcela].setMap(null);
        document.getElementById(parcelaID).style.display = "none";
        document.getElementById(cajaID).style.color = "#28a745";
        document.getElementById(cajaID).style.background = "#fff";
        


    }

}

function dibujarPoligono(vertices, color) {
    var poligono = new google.maps.Polygon({
        paths: vertices,
        strokeColor: color,
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: color,
        fillOpacity: 0.4,
        map: map,
    });
		return poligono;
}





function dibujarNodo(puntos,datos,IdNodo) {
    
	for (var i = 0; i < puntos.length; i++) {
    var marker = new google.maps.Marker({
        position: puntos[i],
        map: map
    });

    map.setZoom(16);
    map.setCenter(marker.getPosition());
    }


    var contentString='<div class="card" style="width: 18rem;">'+
                      '<div class="card-header" >'+datos[6]+'</div>'+
                      '<ul class="list-group list-group-flush">'+
                        
                        '<li class="list-group-item">Temperatura: '+datos[0]+'º</li>'+
                        '<li class="list-group-item">Humedad: '+datos[1]+'%</li>'+
                        '<li class="list-group-item">Luz: '+datos[2]+'%</li>'+
                        '<li class="list-group-item">Salinidad: '+datos[3]+'%</li>'+
                        '<li class="list-group-item">Presión: '+datos[4]+' mb</li>'+

                      '</ul>'+
                      '<div class="card-footer">Fecha: '+datos[5]+
                      '<form action="grafica.php" method="post">'+
                      '<input type="hidden" name="variable1" value="'+IdNodo+'" />'+
                      '<button type="submit" class="btn btn-outline-info btn-sm">+</button>'+
                      '</form>'+
                      '</div>'+
                    '</div>';
;
    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

    marker.addListener('click', function() {
        map.setZoom(16);
        map.setCenter(marker.getPosition());
        infowindow.open(map, marker);
    });
	return marker;
}

/*------------------------------------*/


/*------------------------------------*/
