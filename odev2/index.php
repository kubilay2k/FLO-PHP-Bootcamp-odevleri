<?php 
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align:center ;">
    <form action="config.php" method="POST">

        <table border="1" style="text-align:center; margin-left:auto;margin-right: auto; padding:0px; border-spacing:0px;">
            <th>Ürün Adı</th>
            <th>Ürün Fiyatı</th>
            <th>Adet</th>

            <tr>
                <td>Ülker Çikolatalı Gofret 40 gr.</td>
                <td>10 TL.</td>
                <td><input type="number" name="urun1"></td>
            </tr>

            <tr>
                <td>Eti Damak Kare Çikolata 60 gr.</td>
                <td>20 TL.</td>
                <td><input type="number" name="urun2"></td>
            </tr>

            <tr>
                <td>Nestle Bitter Çikolata 50 gr.</td>
                <td>20 TL.</td>
                <td><input type="number" name="urun3"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="veri_yolla">Sepete Ekle</button></td>
            </tr>
        </table>

    </form>
 <hr>


    
    <?php

 
    if ($_SESSION['sepet'] != null || $_SESSION['sepet'] != [])  { ?>
    <h3>Sepetiniz:</h3>
        <table border="1" style="text-align:center; margin-left:auto;margin-right: auto; padding:0px; border-spacing:0px;">
        <th>Ürün Adı</th>
        <th>Adet</th>
        <th>Toplam</th>

        <tr>
            <td>Ülker Çikolatalı Gofret 40 gr.</td>
            <td><?=$_SESSION['sepet']['adet1']?></td>
            <td><?= $_SESSION['sepet']['adet1'] * 10 ?> TL.</td>
        </tr>


        <tr>
            <td>Eti Damak Kare Çikolata 60 gr.</td>
            <td><?=$_SESSION['sepet']['adet2']?></td>
            <td><?= $_SESSION['sepet']['adet2'] * 20 ?> TL.</td>
        </tr>

        <tr>
            <td>Nestle Bitter Çikolata 50 gr.</td>
            <td><?=$_SESSION['sepet']['adet3']?></td>
            <td><?= $_SESSION['sepet']['adet3'] * 20 ?> TL.</td>            
        </tr>

        <tr>
            <td></td>
            <td><form action="config.php" method="POST"><button type="submit" name="temizle">Sepeti Temizle</button></form></td>
            <td><?= ($_SESSION['sepet']['adet3'] * 20) + ( $_SESSION['sepet']['adet2'] * 20) + ($_SESSION['sepet']['adet1'] * 10)?> TL</td>
        </tr>
    </table> 
    <?php }else {
        echo "<h3> Sepetiniz Boş :( </h3>";
    }
            

    ?>


</body>
</html>
<?php 
        

?>
