<!DOCTYPE html>
<html lang="en">
<head>

    <title>Ödev 4</title>
</head>
<body>
    <center> 
        <form action="islem.php" method="POST">
            <label>Ad Soyad:</label><br>
            <input type="text" name="adsoyad">

                <br><br>

            <label>TC Kimlik Numarası:</label><br>
            <input type="text" name="tcno">

                <br><br>

            <button type="submit" name="kaydet">Doğrula Ve Kaydet</button>
        </form>

        <table border="1" cellspacing="0">
            <th>Adı Soyadı</th>
            <th>Tc Kimlik Numarası</th>
            <th>Durum</th>

            <?php
                $baglanti = new PDO('mysql:host=localhost;dbname=bootcamp;charset:utf8', 'root', 'Kubilay.123');
                $veriler = $baglanti->query('SELECT * from odev4',PDO::FETCH_OBJ);
                $toplam = $veriler->rowCount();
                foreach ($veriler as $veri) {
                    echo "            
                    <tr>
                        <td>$veri->adsoyad</td>
                        <td>$veri->numara</td>
                        <td>$veri->durum</td>

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
