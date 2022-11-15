<?php 
    include 'baglanti.php' 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödev 3</title>
</head>
<style>
td{
    text-align: center;
}
</style>
<body>
    <center>

        <form action="islem.php" method="POST">
            <h2>Adınız Soyadınız:</h2>
            <input type="text" name="adsoyad">
            <h2>Telefon Numaranız:</h2>
            <input type="text" name="numara">
            <br><br>
            <button type="submit" name="kaydet" style="background-color:cadetblue; color:white">Bilgileri Kaydet</button>
        </form>

        <hr>

        <table border="1" cellspacing="0">
            <th>Adı Soyadı</th>
            <th>Telefon Numarası</th>
            <th>İşlem</th>

            <?php

                $veriler = $baglanti->query('SELECT * from odev3',PDO::FETCH_OBJ);
                $toplam = $veriler->rowCount();
                foreach ($veriler as $veri) {
                    echo "            
                    <tr>
                        <td>$veri->adsoyad</td>
                        <td>$veri->numara</td>
                        <td><a href='islem.php?islem=sil&id=$veri->id'><button>Sil</button></a></td>
                    </tr>";
                }

            ?>

            <tr>
                <td colspan="3">Sistemde Toplamda -<?=$toplam?>- Kayıt Bulunmakta</td>
            </tr>
        </table>

    </center>
</body>
</html>