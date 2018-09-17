<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require("phpMQTT.php");

$topic = $_POST['topic'];
$msn = $_POST['msn'];
$server = $_POST['server'];     // change if necessary
$port = $_POST['port'];                     // change if necessary
$username = $_POST['user_name'];                   // set your username
$password = $_POST['password'];                   // set your password
$client_id = $_POST['client_id']; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish($topic,$msn, 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}


