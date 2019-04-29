<?php

// $dbServername = "ec2-174-129-10-235.compute-1.amazonaws.com";
// $dbUsername = "cedouazthnpjdx";
// $dbPassword = "7bdfe54c4b08f6d270c02762779d2165377465aa4da3dee076b433b6d01d6a44";
// $dbName = "dctt8pi4vphh31";

// $dbConn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");

$dbConn = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['path']);
echo $db['host'].' '.$db['user'].' '.$db['pass'].' '.$db['path'];
?>
