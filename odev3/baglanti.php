<?php 

$baglanti = new PDO('mysql:host=localhost;dbname=bootcamp;charset:utf8', 'root', '');

$baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>