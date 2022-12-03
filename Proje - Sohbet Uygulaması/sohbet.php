<?php
session_start();
if(empty($_SESSION['k_adi'])){
    header('Location:index.php');
}
require_once 'baglanti.php';
setlocale(LC_TIME,"tr_TR");

//Aktif kullanıcı ve sohbet edilen kişiyi değere atama işlemi.
$kullanici_id = $_SESSION['k_id'];
$kullanici_adi = $_SESSION['k_adi'];
$sohbet_edilen_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link href="maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="assets/sohbet.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
        <script src="cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<!--Coded With Love By Mutiullah Samim-->
	<body>
		<div class="container-fluid h-100">

			<div class="row justify-content-center h-100">
				
            <div class="col-12">
                <a href="anasayfa.php" class="text-center pt-4 text-white d-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
                </svg> Ana Sayfaya Geri Dönmek İçin Tıklayınız</a>
            </div>

				<div class="col-md-8 col-xl-6 chat">
					<div class="card">

						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">

								<div class="user_info">
                                    <?php
                                        //Sohbet edilen kişinin bilgileri için sorgu.
                                        $sohbet_edilen_cek = $baglanti->query("SELECT * FROM kullanici WHERE id=$sohbet_edilen_id");
                                        $sohbet_edilen = $sohbet_edilen_cek->fetch(PDO::FETCH_OBJ);

                                    ?>
									<span><?=$sohbet_edilen->adi?></span>
									<p><?=$sohbet_edilen->sohbet == 1 ? 'Sohbet Edilebilir' : 'Sohbet Edilemez';?></p>
								</div>
								
							</div>
						</div>


						<div class="card-body msg_card_body" >
                            <div id="mesaj_alani">

                                <?php

                                //Aktif kişi ve sohbet edilen kişinin konuşmalarını tarihe göre getiren sorgu.
                                $mesaj_cek = $baglanti->query("SELECT * FROM mesaj WHERE alici IN('$sohbet_edilen_id','$kullanici_id') AND gonderen IN('$sohbet_edilen_id','$kullanici_id') ORDER BY zaman ASC");
                                while ($mesaj = $mesaj_cek->fetch(PDO::FETCH_OBJ) ) {

                                    //Mesaj sahibi aktif kişi ise mesajı sağda tutuyoruz.
                                    if ($mesaj->gonderen == $kullanici_id) {
                                        echo '
                                        <div class="d-flex justify-content-end mb-4">
                                            <div class="msg_cotainer_send">
                                                '.$mesaj->mesaj.'
                                                <span class="msg_time_send">'.date('D H:i:s', $mesaj->zaman).'</span>
                                            </div>
                                            
                                        </div>
                                        ';
                                    }

                                    //Mesaj sahibi sohbet edilen kişi ise mesajı solda tutuyoruz.
                                    if ($mesaj->gonderen == $sohbet_edilen_id) {
                                        echo '
                                        <div class="d-flex justify-content-start mb-4">
                                            
                                            <div class="msg_cotainer">
                                                '.$mesaj->mesaj.'
                                                <span class="msg_time">'.date('D H:i:s', $mesaj->zaman).'</span>
                                            </div>
                                        </div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div id="mesaj_gonderme_alani">
                                <div class="input-group">

                                    <!-- Sohbet edilen kişinin sohbet edilebilirlik durumuna göre mesaj gönderme alanı değişiyor. -->
                                    <textarea name="" class="form-control type_msg" id="mesaj" <?=$sohbet_edilen->sohbet == 1 ? 'placeholder="Mesajınızı Yazın..."' : 'placeholder="Bu Kişiye Şu An Mesaj Gönderemezsin!!!" readonly';?>></textarea>
                                    <div class="input-group-append">
                                        <button class="input-group-text send_btn <?=$sohbet_edilen->sohbet == 1 ? '' : 'd-none';?>" id="gonder">Gönder</button>
                                    </div>

                                </div>
                            </div>
                        </div>

					</div>
				</div>
			</div>
		</div>
        <!-- Mesaj gönderilirken ekleme işleminde gönderen ve gönderilen kişilerin bilgisini gizli inputlarda tutuyoruz. -->
       <input type="hidden" id="kullanici_id" value="<?= $kullanici_id?>">
       <input type="hidden" id="sohbet_edilen_id" value="<?= $sohbet_edilen_id?>">

        <script>

            //Gönder butonuna tıklandığında ajax ile islem.php sayfasına veri gönderiyoruz ve gönderdiğimiz sohbetin ekrana eklenmesi için alanı tazeliyoruz.
            $('#gonder').click(function() {
                if ($('#mesaj').val() != '') {
                    $.ajax({
                        url: 'islem.php',
                        type: 'POST',
                        data:{ mesaj_ekle:1, gonderen:$('#kullanici_id').val() ,alici:$('#sohbet_edilen_id').val(), mesaj:$('#mesaj').val()}, 
                        success: function (gelenveri) {

                            //Her mesaj gönderildiğinde canlı olarak ekrana eklemek için mesaj alanını tazeliyoruz.
                            $( "#mesaj_alani" ).load(window.location.href + " #mesaj_alani" );

                            //Mesaj gönderdikten sonra mesaj gönderme kutusunu temizliyoruz.
                            $('#mesaj').val('');
                            $
                        },
                    });
                }
            });

            //Karşı taraftan gelen mesajları canlı görüntüleyebilmek için 2 saniyede bir mesaj alanını tazeliyoruz.
            setInterval(function(){
                $("#mesaj_alani").load(window.location.href + " #mesaj_alani" );
            }, 2000);

            
        </script>
    </body>
</html>
