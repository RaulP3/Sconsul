$('#fechaMovimiento').datepicker({
    format:'mm/dd/yyyy',
}).datepicker("setDate",'now');

function buscaJS(name) {
    if(name != ""){
        fetchSearchData(name);
    }
}


function fetchSearchData(name){
    fetch('views/liveSearch.php', { // ubicacion del archivo que hace la consulta segun el nombre
        method: "POST",            // que le enviamos por metodo POST
        body: new URLSearchParams('name=' + name)
    })
    .then(res => res.json())
    .then(res => viewSearchResult(res))
    .catch(e => console.error('Error: ' + e))
}



function viewSearchResult(data){
    const lista = Object.entries(data).length;
    const contenido = document.getElementById("resultados");

    contenido.innerHTML="";

    var a = 1, b = 2;

    for (let i = 0; i < lista; i++){
        var now = moment();
        var fechaRegistro = moment(data[i]["fechaRegistro"]);
        var ultimoPago = moment(data[i]["fechaUltimoPago"]);
        var diferencia = ultimoPago.isValid() ? Math.floor(now.diff(ultimoPago) / 86400000) : '0'
        
        var div = document.createElement("div");

        const pagoVencido = ultimoPago.isValid() && estaVencido(ultimoPago);

        div.class = "row";
        div.innerHTML = `
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-body" id="resultados">
                            <h3>Nombre:<strong> ${data[i]["nombres"] +" "+data[i]["apellidos"]}</strong></h3>
                            <h3>Día de Pago:<strong> ${ultimoPago.isValid() ? ultimoPago.format().split('T')[0] : 'Nunca'}</h3>
                            <h3>Dias Transcurridos: <strong> ${diferencia}</strong></h3>
                            ${pagoVencido ? '<h3 style="color: tomato;"><b>Pago vencido</b></h3>' : ''}
                            <div class="" style="text-align:right;">
                                <a class="btn btn-app" href="index.php?page=asistencia&socio=${data[i]["idSocio"]}">
                                    <i class="fa fa-check"></i> Asistencia
                                </a>
                                <a class="btn btn-app" href="index.php?page=mensualidad&socio=${data[i]["idSocio"]}">
                                    <i class="fa fa-dollar"></i> Mensualidad
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        contenido.appendChild(div);

    }

    function estaVencido(u) {
        const ultimoPago = new Date(u.format());
        const fechaVencimiento = new Date(ultimoPago.getFullYear(), ultimoPago.getMonth() + 1, ultimoPago.getDate());
        // console.log(fechaVencimiento);

        console.log(ultimoPago);
        const fechaHoy = new Date();

        // console.log(fechaVencimiento.getTime());
        // console.log(fechaHoy.getTime());
        return fechaHoy.getTime() > fechaVencimiento.getTime();
    }
}