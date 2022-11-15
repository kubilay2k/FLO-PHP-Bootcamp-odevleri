<?php

include 'baglanti.php';

if (isset($_POST['kaydet'])) {

    $sorgu = $baglanti->prepare("INSERT into odev3 values(?,?,?)");
    $ekle = $sorgu->execute(array(NULL, $_POST['adsoyad'], $_POST['numara']));

    if ($ekle) {
        header('Location:index.php');
    }else {
        echo 'Ekleme İşlemi Başarısız Oldu.';
    }
}

if (isset($_GET['id']) && isset($_GET['islem']) && $_GET['islem'] == 'sil' && $_GET['id'] != '') {

    $islem = $baglanti->prepare("DELETE FROM odev3 where id=?");
    $sil = $islem->execute(array($_GET['id']));

    if ($sil) {
        header('Location:index.php');
    }
    else {
        echo 'Silme İşlemi Başarısız';
    }

}


?>