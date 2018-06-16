<?php
$dbn = 'mysql:host=localhost;dbname=g2db';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dbn, $username, $password, $options);
} catch(PDOException $e) {

}