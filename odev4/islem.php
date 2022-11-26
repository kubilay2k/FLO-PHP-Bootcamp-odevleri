<?php

require_once('vatandas.php');

    if(isset($_POST["kaydet"])) {

        $vatandas = new Vatandas();
        $vatandas->adsoyad = $_POST['adsoyad'];
        $vatandas->tcno = $_POST['tcno'];
        $vatandas->dogrula();
        $kaydet = $vatandas->kaydet();
        
        if ($kaydet) {
            header('Location:index.php');
        }
        else {
            echo 'Kaydedilemedi';
        }
        
        
    }else {
        echo 'Kayıt Eklenemedi';
    }



?>