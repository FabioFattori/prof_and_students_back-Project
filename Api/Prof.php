<?php


include "../Class/DB.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$name=$_GET['name'] ?? null;
$surname=$_GET['surname'] ?? null;

if($name == null || $surname == null)
{
  throw new Exception("Name and Surname are required");

  die();
}

echo json_encode(PDOCommands::get_rows("select * from prof where Nome=? and Cognome=?",$name,$surname));