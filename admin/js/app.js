//variables
const botonAdd = document.querySelector('#addFeat');
const featList = document.querySelector('#featList');
const ftForm = document.querySelector('#nada');
const featuresBD = document.querySelector('#featuresBD');


let features = [];

//Event Listeners
eventListeners();

function eventListeners(){
    //cuando el usuario agrega un feature
    botonAdd.addEventListener('click', agregarFeat);
    
    // cuando el documento esta listo despues de recargar
    // si el localStorege no se encuentra entonces inicializa con un arreglo vacio
    document.addEventListener('DOMContentLoaded', ()=>{



        
        features = JSON.parse( localStorage.getItem('features')) || [];
        // console.log(features);
        crearHTML();
    });
}

//funciones

function agregarFeat(e){
    e.preventDefault();
    // cargo los valores
    const featName = document.querySelector('#featName');
    const featValue = document.querySelector('#featValue');

    if (featName === '' || featValue === '' ){
        mostrarError('Complete los valores');
        return
    }

    const featureObj ={
        id: Date.now(),
        feature: featName.value,
        featureValue: featValue.value
    }

    //Añadir al arreglo de features
    features = [...features, featureObj];

    crearHTML();
    // reiniciar las cajas de texto 
    featName.value = "";
    featValue.value = "";    
}

function mostrarError(error){
    const mensajeError = document.createElement('p');
    mensajeError.textContent = error;
    //mensajeError.classList.add('');

    // Insertar el contenido
    const contenido = document.querySelector('#contenidoFt');
    contenido.appendChild(mensajeError);

    setTimeout(()=>{
        mensajeError.remove();
    }, 3000);

    console.log(features);
}


function crearHTML(){

    limpiarHTML();
    //console.log(features);

    if (features.length > 0){
        features.forEach( ft =>{

            // agrego un boton para eliminar
            const btnEliminar = document.createElement('button');
            btnEliminar.classList.add('ml-auto');
            btnEliminar.classList.add('btn');
            btnEliminar.classList.add('btn-outline-primary');
            btnEliminar.classList.add('btn-sm');
            btnEliminar.innerText ='X';

            //añadimos la funcion de eliminar
            btnEliminar.onclick = () => {
               borrarFeature(ft.id); 
            }
            
            //añadimos el texto
            const p = document.createElement('p');
            p.classList.add('mt-0');
            p.classList.add('mb-2');
            p.classList.add('d-flex');
            p.classList.add('justify-content-between');
            p.classList.add('align-items-center');

            p.innerText = ft.feature+": "+ft.featureValue;

            //añadimos el boton de eliminar
            p.appendChild(btnEliminar);
            //insertamos en el html
            featList.appendChild(p);
            

        });
    }

    sincronizarStorage();
}


function sincronizarStorage(){
    localStorage.setItem('features', JSON.stringify(features));
    // actualizamos el la caja de texto todas las features para ser insertadas en la BD
    featuresBD.value = JSON.stringify(features);
}


function limpiarHTML(){
    while(featList.firstChild){
        featList.removeChild(featList.firstChild);
    }
}

//eliminar una feature de la lista

function borrarFeature(id){
    features = features.filter(feature => feature.id !== id);
    crearHTML();
}
