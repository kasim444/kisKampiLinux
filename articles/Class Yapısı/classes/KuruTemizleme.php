<?php
    class KuruTemizleme{

        //KuruTemizlemeci bir çamaşır alarak bunun üstünde tıkama işlemleri uygulanacaktır.

        // Erişim Belirteçleri 
        // public, private, protected
        // var = public
        // protected => mevcut sınıftan bir miras alındığı taktirde erişimi var fakat yeni obje tarafından dışarıdan erişelemez. 
        // private => türetildiği sınıftan dışarıdan hiç bir şekilde erişime izin verilmez.
        


        // Sihirli functionlar
        //__construct => Bir sınıf oluşturulduğunda ilk çağırılan metot. Eğer bu sınıf oluşturulurken parametre yollamak istersek constructor yakalıyoruz.
        //__destruct => Bir sınıf oluşturulduğunda ilk çağırılan metot.

        
        public function __construct(){
            echo "Kuru temizleme'ciye hoşgeldiniz.<br>";
        }
        
        //Eğer farklı bir class bu class ı extend ettiği taktirde camasir degiskenine erişebilir. Fakat private yapsa idik farklı bir class bu class ı extend ettiği taktirde erişemez. Ayrıca protected ve private bu class üzerinden yeni bir nesne oluşturulduğu taktirde dışarıdan erişilemez.
        protected $camasir;



        //eğer sabit bir değişken var ise const olarak tanımlamamız gerekli. ve çağırırken self:: ile çağırılır. ve $ ile tanımlanmazlar const ile sabit ismini  belirtmemiz yeterli.
        //Bütün sınıflar içerisinde sabitlere erişmek için self::sabitIsmi ile çağırıyoruz.
        //$this ise belirli bir sınıf üzerinden oluşturulan nesne üzerinden bir işlem yapılacaksa 
        //yani bir sınıf içerisinden sabitleri en iyi şekilde self::yikanabilirCamasirlar şekilde kullanabiliriz.
        const yikanabilirCamasirlar = [
            "pantolon",
            "gömlek",
            "elbise",
            "ceket"
        ];

        public function setCamasir($disaridanGelenCamasir){
            if (!in_array($disaridanGelenCamasir, self::yikanabilirCamasirlar))
                throw new Exception("Böyle bir çamaşır yıkanamaz.");
            $this->camasir = $disaridanGelenCamasir;
        }

        public function temizle(){
            $this->yikama();
            $this->kurulama();
            $this->utuleme();
        }

        private function yikama(){
            echo $this->camasir. " yıkandı.<br>";
        }

        private function utuleme(){
            echo $this->camasir. " ütülendi.<br>";
        }

        private function kurulama(){
            echo $this->camasir. " kurulandı.<br>";
        }

        public function __destruct(){
            echo "Kuru temizlemi'ciye tekrar bekleriz, iyi günler.<br>";
        }
    }   
    ?>