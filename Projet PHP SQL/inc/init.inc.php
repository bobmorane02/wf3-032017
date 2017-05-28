<?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=sallea','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $message = '';
    $erreur = false;
