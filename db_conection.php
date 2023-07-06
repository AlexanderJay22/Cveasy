<?php
function openConection(){
$dbhost="127.0.0.1";
$dbport="3307";
$dbuser="root";
$dbpass="";

$db="cveasy";
$conn= new mysqli($dbhost,$dbuser,$dbpass,$db,$dbport) or die("eroare la conexiune: %s\n".$conn->error);
return $conn;



}
function closeConection($conn){
$conn->close();
}


?>