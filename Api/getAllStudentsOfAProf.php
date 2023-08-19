<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include "../Class/DB.php";


$id=$_GET['id'] ?? null;

if($id == null)
{
  throw new Exception("id is required");

  die();
}

$arrStud=PDOCommands::get_rows("select ID_Studente from voto where ID_Prof = ?",$id);

//make every element unique
$arrStud=array_unique($arrStud,SORT_REGULAR);

$toReturn=[];

foreach($arrStud as $singleStud)
{
    $toReturn=array_merge($toReturn,PDOCommands::get_rows("select * from studente where id=?",$singleStud['ID_Studente']));
}

echo json_encode($toReturn);
