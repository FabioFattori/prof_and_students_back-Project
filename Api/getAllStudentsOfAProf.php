<?php

include "../Class/DB.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$idProd=$_GET['prof_id'] ?? 1;

//get all the students of a prof, where ID_Profs contains the id of the prof
$sql = "SELECT * FROM `students` WHERE `ID_Profs` LIKE ?";

echo json_encode(PDOCommands::get_rows($sql,$idProd));
