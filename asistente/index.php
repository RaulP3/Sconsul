<?php
require_once "controller/themeController.php";
require_once "../controller/cConPacientes.php";
require_once "../controller/comunController.php";
require_once "../controller/cConCitas.php";
require_once "../controller/cConMedicos.php";
require_once "../controller/cConUsuarios.php";


require_once "../models/mConPacientes.php";
require_once "../models/mCitas.php";
require_once "../models/comunModel.php";
require_once "../models/mConMedicos.php";
require_once "../models/mConUsuarios.php";

$theme = new themeController();
$theme -> theme(); 