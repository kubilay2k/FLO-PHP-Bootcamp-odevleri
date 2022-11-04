<?php
//Örnek 1
echo '<h3>Örnek 1</h3>';
$agil = array("Ağıl 1"=>30,"Ağıl 5"=>30, "Ağıl 2"=>30,"Ağıl 3"=>30,"Ağıl 4"=>30);
$ciftlik_sayi= 73;
krsort($agil);

//Örnek 1 İçin Yazdırma İşlemleri
echo 'Toplam Ağıl: '.count($agil).'<br>';
echo 'Toplam Kapasite: '.array_sum($agil).'<br>';

foreach ($agil as $key => $value) {
    if ($ciftlik_sayi>$value) {
        echo "$key :$value koyun";
        $ciftlik_sayi -= $value;
    }else if($ciftlik_sayi>0){
        echo "$key :$ciftlik_sayi koyun";
        $ciftlik_sayi -= $value;
    }else {
        echo "$key : 0 Koyun";
    }
    echo '<br>';

}
echo '<hr>';
//Örnek 1 Bitiş

//Örnek 2
$agil = array("Ağıl 1"=>45, "Ağıl 2"=>45,"Ağıl 3"=>45);
$ciftlik_sayi= 147;
krsort($agil);


//Örnek 1 İçin Yazdırma İşlemleri
echo '<h3>Örnek 2</h3>';
echo 'Toplam Ağıl: '.count($agil).'<br>';
echo 'Toplam Kapasite: '.array_sum($agil).'<br>';

foreach ($agil as $key => $value) {
    if ($ciftlik_sayi>$value) {
        echo "$key :$value koyun";
        $ciftlik_sayi -= $value;
    }else if($ciftlik_sayi>0){
        echo "$key :$ciftlik_sayi koyun";
        $ciftlik_sayi -= $value;
    }else {
        echo "$key : 0 Koyun";
    }
    echo '<br>';

}
echo "Dışarıda Kalan :$ciftlik_sayi";
?>
