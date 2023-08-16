<?php


include "../Class/DB.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$name=$_GET['name'] ?? null;
$cognome=$_GET['surname'] ?? null;
$p=$_GET['p'] ?? null;

if($name == null || $p == null)
{
  throw new Exception("Name and password are required");

  die();
}

echo json_encode(PDOCommands::get_row("Insert into student (Nome,Cognome,password) values (?,?,?)",$name,$cognome,$p));