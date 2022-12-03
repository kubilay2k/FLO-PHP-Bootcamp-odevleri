<?php
session_start();

//Kullanıcı oturum açmadıysa giriş sayfaına yönlendiriyor.
if(empty($_SESSION['k_adi'])){
    header('Location:index.php');
}

require_once 'baglanti.php';
$kullanici_id = $_SESSION['k_id'];
$kullanici_adi = $_SESSION['k_adi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/anasayfa.css">
    <title>Ana Sayfa</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="people-nearby">

                    <?php
                    //Kullanıcıları listelemek için yazılan sorgu.
                    $kullanici_sorgu = $baglanti->query("SELECT * FROM kullanici WHERE NOT id='$kullanici_id'");
                    while($kullanici = $kullanici_sorgu->fetch(PDO::FETCH_OBJ)) 
                    {
                        //Listelenen kullanıcı ile aktif kullanıcn arasında dönen sohbete ait son mesajı alan sorgu.
                        $mesaj_cek = $baglanti->query("SELECT * FROM mesaj WHERE alici IN('$kullanici->id','$kullanici_id') AND gonderen IN('$kullanici->id','$kullanici_id') ORDER BY zaman DESC");
                        $son_mesaj = $mesaj_cek->fetch(PDO::FETCH_OBJ);

                    ?>
                        <div class="nearby-user">
                            <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="profile-photo-lg">
                            </div>
                            <div class="col-md-7 col-sm-7">
                                <h5><a href="#" class="profile-link"><?=$kullanici->adi ?></a></h5>
                                <p><?= $kullanici->sohbet == 1 ? 'Sohbet İçin Uygun' : 'Sohbet İçin Uygun Değil'?></p>

                                <p class="text-muted"><?= $son_mesaj == false ? 'Sohbete başla' : ''.$son_mesaj->mesaj.' '.date('D H:i:s', $son_mesaj->zaman);?></p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="sohbet.php?id=<?=$kullanici->id?>" class="btn btn-primary pull-right">Sohbet</a>
                            </div>
                            </div>
                        </div>
                            
                    <?php 
                    }
                    ?>

                </div>
            </div>

            <div class="col-4">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title"><?=$kullanici_adi?></h5>
                        <p class="card-text">Hoşgeldin <?=$kullanici_adi?>, aşağıdaki butonları kullanarak kullanıcıların sana mesaj göndermesini yönetebilir veya çıkış yapabilirsin. </p>
                            <?php
                                //Aktif kullanıcya air bilgileri almak için sorgu.
                                $kullanici_sorgu = $baglanti->query("SELECT * FROM kullanici WHERE id='$kullanici_id'");
                                $kullanici = $kullanici_sorgu->fetch(PDO::FETCH_OBJ);
                            ?>
                        <p class="card-text">Sohbet Edilebilirliğini Aç/Kapat</p>
                        <div id="asd">
                            <!-- Kullanıcı sohbet edilebilirliğini güncellediğinde aşağıda bulunan tek satırlık if duruma göre Aç/Kapat butonu yazdırıyor -->
                            <?=$kullanici->sohbet == 0 ? '<button id="btnac" class="btn btn-success col-12">Aç</button>' : '<button id="btnkapat" class="btn btn-danger col-12">Kapat</button>';?>
                        </div>

                        <br>

                        <button id="cikis" class="btn btn-primary col-12">Çıkış Yap
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    </ul>
    </div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>

    //Aç butonuna tıklandığında islem.php sayfasına ajax ile veri gönderiyoruz.
     $('#btnac').click(function() {
        $.ajax({
                url: 'islem.php',
                type: 'POST',
                data: "sohbet="+1,
                success: function (gelenveri) {
                    location.reload();
                },
            });
     });

    //Kapat butonuna tıklandığında islem.php sayfasına ajax ile veri gönderiyoruz.
     $('#btnkapat').click(function() {
        $.ajax({
                url: 'islem.php',
                type: 'POST',
                data: "sohbet="+0,
                success: function (gelenveri) {
                    location.reload();
                },
            });
     });

     //Çıkış yap butonuna tıkalndığında islem.php safyaına ajax ile veri dönderiyor
     $('#cikis').click(function() {
        $.ajax({
                url: 'islem.php',
                type: 'POST',
                data: {cikis:1},
                success: function (gelenveri) {
                    location.reload();
                },
            });
     });
</script>
</body>
</html>

