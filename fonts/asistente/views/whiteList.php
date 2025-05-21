<!-- Contenido  -->
<?php
    if ($permisos == 'asistente'){
        if($pagina=="inicio" ||
            $pagina == "vPacienteAdd" || 
            $pagina == "vPacienteEdit" || 
            $pagina == "vPacienteDel" || 
            $pagina == "vPacienteList" ||
            $pagina == "vNuevaCita" ||
            $pagina == "vEstadoCita" ||
            $pagina == "vReagendar" ||
            $pagina == "vMedicoAdd" ||
            $pagina == "vMedicoList" ||
            $pagina == "vMedicoEdit" ||
            $pagina == "vMedicoDel" ||
            $pagina == "blank" ||
            $pagina == "vPagos" ||
            $pagina == "vUserList" ||
            $pagina == "vUserAdd" ||
            $pagina == "vUserEdit" ||
            $pagina == "vUserDel" ||
            $pagina == "vCorteCaja" ||
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