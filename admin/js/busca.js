// function buscaJS()
// {
//     let dia = document.getElementById("dia");
//     let mes = document.getElementById("mes");
//     let anio = document.getElementById("anio");
//     let medico = document.getElementById("medico");
//     let hora = document.getElementById("hora");

//     buscaDatos(dia,mes,anio,medico,hora);
// }

// function buscaDatos(dia, mes, anio, medico, hora)
// {
//     fetch('views/liveSearch.php', {
//         method: 'POST',
//         body: new URLSearchParams('dia= '+dia, 'mes= '+mes, 'anio= '+anio, 'medico= '+medico, 'hora= '+hora)
//     })

//     const myJson = '{"name":"Raul","age":26}';

    
//     console.log(myJson)

//     .then(res = res.json())
//     .then(res=>viewResult(res))
//     .then(console.log(data))
//     .catch(e => console.error('Error: ' + e))

    
//     console.log(dia);
//     console.log(mes);
//     console.log(anio);
//     console.log(medico);
//     console.log(hora);
// }

// function viewResult(res)
// {
//     console.log(res);
// }