<?php

include "../Class/DB.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$idProd=$_GET['prof_id'] ?? 1;

echo json_encode(PDOCommands::get_rows("select * from studente where ID_Prof=?",$idProd));
