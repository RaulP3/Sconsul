<!-- Contenido  -->
<?php
    if ($permisos == 'admin'){
        if($pagina=="inicio" ||
        $pagina == "salidas" || 
        $pagina == "nvaSalidas" || 
        $pagina == "salidasAdd" || 
        $pagina == "salidasList" || 
        $pagina == "salidasEdita" ||
        $pagina == "salidasEdit" || 
        $pagina == "salidaDel" || 
        $pagina == "entradas" || 
        $pagina == "entradaAdd" || 
        $pagina == "entradasList" || 
        $pagina == "entradasEdit" || 
        $pagina == "entradaEdit_" || 
        $pagina == "entradaDel" || 
        $pagina == "salidas" ||
        $pagina == "search" ||
        $pagina == "asistencia" ||
        $pagina == "mensualidad" ||
        $pagina == "venta" ||
        $pagina == "ventaList" ||
        $pagina == "vUserEdit" || 
        $pagina == "vUserList" || 
        $pagina == "vUserAdd" ||
        $pagina == "vUserDel" ||
        $pagina == "proveedorEdit" || 
        $pagina == "proveedorList" || 
        $pagina == "proveedorAdd" ||
        $pagina == "proveedorDel" ||
        $pagina == "brandAdd" ||
        $pagina == "brandList" ||
        $pagina == "brandEdit" ||
        $pagina == "brandDel" ||
        $pagina == "eqTypeAdd" ||
        $pagina == "eqTypeList" ||
        $pagina == "eqTypeEdit" ||
        $pagina == "eqTypeDel" ||
//        $pagina == "clientAdd" ||
//        $pagina == "clientDel" ||
//        $pagina == "clientEdit" ||
//        $pagina == "clientList" ||
        // $pagina == "socioAdd" ||
        // $pagina == "socioDel" ||
        // $pagina == "socioEdit" || 
        // $pagina == "socioList" ||
        $pagina == "productAdd" ||
        $pagina == "productDel" ||
        $pagina == "productEdit" || 
        $pagina == "productList" || 
        $pagina == "productStatus" ||
        $pagina == "vPacienteAdd" ||
        $pagina == "vPacienteList" ||
        $pagina == "vPacienteEdit" ||
        $pagina == "vPacienteDel" ||
        $pagina == "vMedicoAdd" ||
        $pagina == "vMedicoList" ||
        $pagina == "vMedicoEdit" ||
        $pagina == "vMedicoDel" ||
        $pagina == "vNuevaCita" ||
        $pagina == "vReagendar" ||
        $pagina == "vPagos" ||
        $pagina == "vEstadoCita" ||
        $pagina == "vCorteCaja" ||
        $pagina == "consulta" ||
        $pagina == "vUserList" ||
        $pagina == "liveSearch" ||


        $pagina == "logOut")
        {
            include "views/".$pagina.".php";
        }

    }
    else if ($permisos == 'cashier'){
        if($pagina=="inicioCaja" ||
            $pagina == "salidas" || 
            $pagina == "salidasAdd" || 
            $pagina == "salidasList" || 
            $pagina == "salidasEdita" ||
            $pagina == "salidasEdit" || 
            $pagina == "salidaDel" || 
            $pagina == "entradas" || 
            $pagina == "entradaAdd" || 
            $pagina == "entradasList" || 
            $pagina == "entradasEdit" || 
            $pagina == "entradaDel" || 
            $pagina == "salidas" ||
            $pagina == "venta" ||
            $pagina == "ventaList" ||
            $pagina == "logOut")
        {
            include "views/".$pagina.".php";
        }
    }
    
?>
<!-- fin de contenido -->