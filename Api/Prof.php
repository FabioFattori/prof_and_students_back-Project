<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


include "../Class/DB.php";

$name=$_GET['name'] ?? null;
$p=$_GET['p'] ?? null;

if($name == null || $p == null)
{
  throw new Exception("Name and password are required");

  die();
}

echo json_encode(PDOCommands::get_rows("select * from prof where Nome=? and password=?",$name,$p));