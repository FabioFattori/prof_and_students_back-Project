<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:  POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include "../Class/DB.php";


$voto=$_GET['voto'] ?? null;
$idProf=$_GET['idProf'] ?? null;
$idStud=$_GET['idStudente'] ?? null;

if($voto == null||$idProf == null||$idStud == null)
{
  throw new Exception("ids and gradeValue are required");

  die();
}

echo json_encode(PDOCommands::update_row("insert into voto (ID_Prof,ID_Studente,Voto) values (?,?,?)",$idProf,$idStud,$voto));