<?php

    class Vatandas{

        public $adsoyad;
        public $tcno;
        public $durum = "Doğrulanamadı";

        public function dogrula()
        {
            $tcno = $this->tcno;
            $dogruluk = false;
            $toplam1 = ($tcno[0] + $tcno[2] + $tcno[4] + $tcno[6] + $tcno[8]) * 7;
            $toplam2 = $tcno[1] + $tcno[3] + $tcno[5] + $tcno[7];
            $toplam3 = $tcno[0] + $tcno[1] + $tcno[2] + $tcno[3] + $tcno[4] + $tcno[5] + $tcno[6] + $tcno[7] + $tcno[8] + $tcno[9];

            if (($toplam1 - $toplam2) % 10 == $tcno[9]) 
            {
                if($toplam3 % 10 == $tcno[10])
                {
                    $dogruluk = true;   
                }
            }

            if(strlen($tcno) == 11)
            {
                if (is_numeric($tcno)) 
                {
                    if($tcno[0] != 0)
                    {   
                        if ($dogruluk) {
                            $this->durum = "Doğrulandı";
                        }
                    }
                }
            }

        }

        public function kaydet()
        { 
            $baglanti = new PDO('mysql:host=localhost;dbname=bootcamp;charset:utf8', 'root', 'Kubilay.123');
            $sorgu = $baglanti->prepare("INSERT INTO odev4 VALUES(?,?,?,?)");
            $sorgu->execute(array(NULL, $this->adsoyad, $this->tcno,$this->durum));
            $baglanti = null;
            return true;
        
        }


    }

?>
