<?php
session_start();
if(!empty($_SESSION['k_adi'])){
    header('Location:anasayfa.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/login.css">
    <title>Giriş Yap</title>
</head>
<body>
   
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="session.php" id="loginform">
        <h3>Giriş Yap</h3>

        <label for="k_adi">Kullanıcı Adı</label>
        <input type="text" placeholder="Kullanıcı Adı" name="k_adi" id="k_adi" required>

        <label for="sifre">Şifre</label>
        <input type="text" placeholder="Şifre" name="sifre" id="sifre" required>
        <h6 id="errormessage">Kullanıcı Adı Veya Şifre Hatalı</h6>
        <button type="submit" name="veri_gonder">Giriş Yap</button>

        <h6>Üye Değil Misin? <a href="kayit.php">Kayıt Ol!</a></h6>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        //Kullanıcı Adı veya şifre hatalı gidildiğinde çıkan hata mesajını başlangıçta gizli tutuyoruz.
        $('#errormessage').hide();

        //Form'a girilen verileri ajax ile session.php sayfasına yolluyoruz.
        $('#loginform').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: 'session.php',
                type: 'POST',
                data: $('#loginform').serialize(),
                success: function (gelenveri) {
                    if (gelenveri == 'hata') {
                        $('#errormessage').show();
                    }
                    else{
                        alert('Başarıyla Giriş Yapıldı');
                        $('#k_adi').val();
                        $('#sifre').val();                
                        $('#errormessage').hide();
                        window.location.href= 'anasayfa.php';
                    }
                    
                },
            });
        });

</script>
</body>
</html>