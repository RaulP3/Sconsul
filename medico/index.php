<?php
require_once "controller/themeController.php";
require_once "../controller/cConPacientes.php";
require_once "../controller/comunController.php";
require_once "../controller/cConCitas.php";

require_once "../models/mConPacientes.php";
require_once "../models/comunModel.php";
require_once "../models/mCitas.php";

$theme = new themeController();
$theme -> theme(); 