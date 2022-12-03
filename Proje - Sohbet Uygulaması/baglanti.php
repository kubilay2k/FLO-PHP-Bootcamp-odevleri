<?php
try {
    $baglanti = new PDO('mysql:host=localhost;dbname=bootcamp_proje;charset:utf8', 'root', 'Kubilay.123');
    $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $th) {
        echo 'Hata: '.$th;
    }


?>