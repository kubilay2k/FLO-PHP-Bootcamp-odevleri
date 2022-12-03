<?php
session_start();
require_once 'baglanti.php';

    $k_adi = $_POST["k_adi"];
    $sifre = $_POST["sifre"];

    //Giriş bilgileri ile eşleşen kullanıcıyı seçen fonksiyon.
    $kullanici_cek = $baglanti->query("SELECT * FROM kullanici WHERE adi='$k_adi' AND sifre='$sifre'");
    $kullanici = $kullanici_cek->fetch();

    //Giriş bilgileri eşleşen kullanıcı var ise session oluşturma işlemi.
    if (!empty($kullanici)) {
       
        $_SESSION["k_id"] = $kullanici['id'];
        $_SESSION["k_adi"] = $kullanici['adi'];

    }else {
        //Giriş bilgileri yanlış ise uyarı vermek için yazı gönderme işlemi.
        echo 'hata';
    }







?>