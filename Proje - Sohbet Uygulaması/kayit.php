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
    <title>Kayıt Ol</title>
</head>
<body>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="islem.php" id="loginform">
        <h3>Kayıt Formu</h3>

        <input type="hidden" name="kayit">
        <label for="k_adi">Kullanıcı Adı</label>
        <input type="text" placeholder="Kullanıcı Adı" name="k_adi" id="k_adi" required>

        <label for="sifre">Şifre</label>
        <input type="text" placeholder="Şifre" name="sifre" id="sifre" required>

        <h6 id="errormessage">Kayıt yapılamadı! Kullanıcı adı daha önce alınmış olabilir </h6>
        <button type="submit" name="veri_gonder">Kayıt Ol</button>
        <h6>Üye Misin? <a href="index.php">Giriş Yap!</a></h6>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        //Kayıt olunurken çıkan uyarı mesajını ilk başta gizli tutuyoruz.
        $('#errormessage').hide();

        //Girilen kayıt bilgilerini ajax ile islem.php ye yolluyoruz.
        $('#loginform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'islem.php',
                type: 'POST',
                data: $('#loginform').serialize(),
                success: function (gelenveri) {
                    if (gelenveri == 'Başarılı') {
                        alert('Başarıyla Kayıt Oldundu');
                        $('#k_adi').val('');
                        $('#sifre').val('');                
                        $('#errormessage').hide();
                    }
                    else{
                        $('#errormessage').show();
                    }
                },
            });
        });

</script>
</body>
</html>