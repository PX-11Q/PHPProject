<?php

$server = "20.0.153.128";
$username = "Jeff";
$password = "NCGRP123";
$dbname = "Jeff";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}