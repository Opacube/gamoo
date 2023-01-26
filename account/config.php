

<?php
session_start();

$pdo = new PDO(
    'mysql:host=sql11.freemysqlhosting.net;dbname=sql11592988;',
    'sql11592988',
    'hmSbAfx2rc',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);

/*
$pdo = new PDO(
    'mysql:host=localhost;dbname=gamoo;',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);*/
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
?>
