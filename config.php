<?php

try {
$config['db'] = array(
    'host'      =>  'localhost',
    'username'  =>  'admin',
    'password'  =>  'password',
    'dbname'    =>  'marka'
);

$db = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'],$config['db']['username'],$config['db']['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

} catch (Exception $e) {
die("Oh noes! There's an error in the query!");
}



?>