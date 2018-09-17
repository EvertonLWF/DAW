<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require("phpMQTT.php");

$topic = $_POST['topic'];
$server = $_POST['server'];       // change if necessary
$port = $_POST['port'];           // change if necessary
$username = $_POST['user_name'];  // set your username
$password = $_POST['password'];   // set your password
$client_id = $_POST['client_id']; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if(!$mqtt->connect(true, NULL, $username, $password)) {
	exit(1);
}

$topics['Feijo/Temp'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics, 0);
$start_time = time();
$done = 0;
 while(!$done && !hasTimedout() && $mqtt->proc()){
 }
$topics2['Feijo/Umid'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics2, 0);


$start_time = time();
$done = 0;
 while(!$done && !hasTimedout() && $mqtt->proc()){
 }
 $topics3['Feijo/btn'] = array("qos" => 0, "function" => "procmsg");
$mqtt->subscribe($topics3, 0);


$start_time = time();
$done = 0;
 while(!$done && !hasTimedout() && $mqtt->proc()){
 }

$mqtt->close();
function procmsg($topics, $msg){
		global $done;
		$done = 1;
		echo "Msg Recieved:<br>";
		echo "Topic: {$topics}<br>";
		echo "<br>$msg<br>";

}
function hasTimedout() {
	global $start_time;
	return (time() - $start_time > 10);//waits up to 10 sec 
}
?>
