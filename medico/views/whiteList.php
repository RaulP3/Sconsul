<!-- Contenido  -->
<?php
    if ($permisos == 'medico'){
        if($pagina=="inicio" ||
             $pagina == "consulta" || 
             $pagina == "vPacienteAdd" || 
             $pagina == "vPacienteList" || 
             $pagina == "vPacienteEdit" || 
             $pagina == "vPacienteDel" || 
             $pagina == "vNuevaCita" || 
             $pagina == "vEstadoCita" || 
             $pagina == "vReagendar" || 
            // $pagina == "salidasAdd" || 
            // $pagina == "salidasList" || 
            // $pagina == "salidasEdita" ||
            // $pagina == "salidasEdit" || 
            // $pagina == "salidaDel" || 
            // $pagina == "entradas" || 
            // $pagina == "entradaAdd" || 
            // $pagina == "entradasList" || 
            // $pagina == "entradasEdit" || 
            // $pagina == "entradaDel" || 
            // $pagina == "salidas" ||
            // $pagina == "venta" ||
            // $pagina == "ventaList" ||
            $pagina == "logOut")
        {
            include "views/".$pagina.".php";
        }
    }
    
?>
<!-- fin de contenido -->