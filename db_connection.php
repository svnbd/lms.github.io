<?php 
//Establishing connection with the database
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','xme123456+');
define('DB_DATABASE','books');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//$db = mysqli_connect("localhost","root","xme123456+","college") or die("Connection failed.Please check your mysqli connection.");
// if($db){
//     echo "Database Successfully Connected";
// }else{
//     echo "Connection failed.Check your mysql database.Is on/off?";
// }
?>