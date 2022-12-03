<?php
session_start();
    require_once 'baglanti.php';
    include 'class/Mesaj.php';

        //Kayıt formundan gelen verilerle kullanıcı oluşturma işlemi.
        if(isset($_POST['kayit'])){
        $sorgu = $baglanti->prepare("INSERT INTO kullanici VALUES(?,?,?,?)");
        $ekle = $sorgu->execute([NULL, $_POST['k_adi'],1, $_POST['sifre']]);
        if ($ekle) {
            echo 'Başarılı';
        }
        }

        //Kullanıcının sohbet edilebilme özelliğini gelen veriye göre güncelleme işlemi.
        if (isset($_POST['sohbet'])) {
            $deger = $_POST['sohbet'];
            $kullanici_id = $_SESSION['k_id'];
            $baglanti->exec("UPDATE kullanici set sohbet='$deger' where id='$kullanici_id'");
        }

        //Aktif kullanıcının oturumunu sonrandırma işlemi.
        if (isset($_POST['cikis'])) {
            unset($_SESSION['k_id'],$_SESSION['k_adi']);
        }

        //Sohbet ekranında gönderilen mesajların kaydedilme işlemi.
        if (isset($_POST['mesaj_ekle'])) {
            $mesaj = new Mesaj();
            $mesaj->gonderen = $_POST['gonderen'];
            $mesaj->alici = $_POST['alici'];
            $mesaj->mesaj = $_POST['mesaj'];
            $mesaj->zaman = time();
            $mesaj->kaydet();
        }
        
?>