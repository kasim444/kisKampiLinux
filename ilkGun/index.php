<?php
    //Class Tanımlaması
    class KuruTemizleme {
        
        function yika($kiyafetler) {
            if (gettype($kiyafetler) == 'string') {
                echo "$kiyafetler yıkandı<br>"; 
            } else {
                foreach($kiyafetler as $kiyafet){
                    echo "$kiyafet yıkandı<br>";
                }
            }
        
        }
    }
    //Not çift tırnak içerisinde $ ile değişkenleri string içerisinde kullanabiliyoruz. Tek tırnak içerisinde variable kullanamayız.
    $kuruTemizlemeci = new KuruTemizleme; 
    $kuruTemizlemeci -> yika('Pantolan');
    $kuruTemizlemeci -> yika('Gömlek');
    $kuruTemizlemeci -> yika('Kıravat');


    // Bir array içerisinde de toplu olarak verileri yollayabiliriz.
    $yikanacaklar = ["Boxer", "Çorap", "T-shirt"];
    $kuruTemizlemeci->yika($yikanacaklar);
    ?>
