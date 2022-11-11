<?php

session_start();

if (isset($_POST['veri_yolla'])) {
    echo $_POST['urun1'] ? $_SESSION['sepet']['adet1'] += $_POST['urun1'] : '';
    echo $_POST['urun2'] ? $_SESSION['sepet']['adet2'] += $_POST['urun2'] : '';
    echo $_POST['urun3'] ? $_SESSION['sepet']['adet3'] += $_POST['urun3'] : '';

    header('Location:index.php');
}

if (isset($_POST['temizle'])) {
    $_SESSION['sepet'] = array();
    header('Location:index.php');
}


?>