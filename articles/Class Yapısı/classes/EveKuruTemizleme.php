<?php
class EveKuruTemizleme extends KuruTemizleme
{
    private $evdenAlim = true;
    private $eveTeslim = true;
    public function setEvdenAlim($durum)
    {
        $this->evdenAlim = $durum;
    }
    public function setEveTeslim($durum)
    {
        $this->eveTeslim = $durum;
    }
    private function evdenAl()
    {
        echo $this->camasir. ' evden alındı';
    }

    private function eveTeslimEt()
    {
        echo $this->camasir. " eve teslim edildi.";
    }

    public function temizle(){
        if($4->evdenAlim)
            $this->evdenAl();
        parent::temizle();
        if($this->eveTeslim)
            $this->eveTeslimEt();
    }


}
