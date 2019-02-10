<?php
//istediğimiz bir class'ı auto loader fonksiyonu projemize dahil edebiliriz.

/* Tek tek girme yöntemi
require_once "classes/KuruTemizleme.php";
require_once "classes/EveKuruTemizleme.php";
*/

//yerine
function autoLoader($class_name){
    require_once "classes/$class_name";
}
//php 7 üzeri için
spl_autoload_register('autoLoader');

/* 7 ve öncesi için sadece aşağıdaki magic function ile çalışır.
function __autoload($className){
    require_once "$className";
}

*/
try {
    $tem  = new EveKuruTemizleme;
    $tem->setEvdenAlim(false);
    $tem->setCamasir("gömlek");
    $tem->temizle();
} catch (Exception $e) {
    echo $e->getMessage().'<br> ';
}
?>