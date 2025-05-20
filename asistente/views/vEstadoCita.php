<?php
    CitasModel::mEstadoCita($_GET["idEditar"], $_GET["estado"]);  

    echo "<script>
            window.location='index.php?page=inicio';
        </script>";    
?>