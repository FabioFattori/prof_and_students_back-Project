<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include "../Class/DB.php";


$name=$_GET['name'] ?? null;
$password=$_GET['p'] ?? null;

if($name == null || $password == null)
{
  throw new Exception("Name and password are required");

  die();
}

echo json_encode(PDOCommands::get_rows("select * from studente where Nome=? and password=?",$name,$password));