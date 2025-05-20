<?php

// $hora = $_POST['hora'];
// $medico = $_POST['medico'];
// $dia = $_POST['dia'];
// $mes = $_POST['mes'];
// $anio = $_POST['anio'];

$hora = '00:00';
$medico = 35;
$dia = '11';
$mes = '02';
$anio = '2023';

require_once "../models/comunModel.php";
require_once "../models/conexion.php";
require_once "../controller/cConCitas.php";

$b = new ComunModel();
$data = $b->mdlLiveSearch($hora,$medico,$dia,$mes,$anio);

echo json_encode($data);

?>