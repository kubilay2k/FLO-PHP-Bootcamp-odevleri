<?php

class Mesaj{

    public $gonderen;
    public $alici;
    public $mesaj;
    public $zaman;
    public $baglanti;

    public function __construct()
    {
        $this->baglanti = new PDO('mysql:host=localhost;dbname=bootcamp_proje;charset:utf8', 'root', 'Kubilay.123');
        $this->baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function kaydet()
    {
        //Oluşturulan mesajı veritabanına kaydetme fonksiyonu.
        $sorgu = $this->baglanti->prepare("INSERT into mesaj values(?,?,?,?,?)");
        $sorgu->execute([NULL, $this->gonderen, $this->alici, $this->mesaj,$this->zaman]);
    }

    public function __destruct()
    {
        $this->baglanti = null;
    }

}



?>