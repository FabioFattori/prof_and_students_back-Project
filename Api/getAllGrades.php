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

echo json_encode(PDOCommands::get_rows("select * from voto inner join prof on prof.id=voto.ID_Prof where ID_Studente=? order by voto.id desc",$id));