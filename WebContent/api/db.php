<?php
function getDB() {
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="aljhav5_hostaldb";
$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
$dbConnection -> exec("set names utf8");
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
return $dbConnection;
}
