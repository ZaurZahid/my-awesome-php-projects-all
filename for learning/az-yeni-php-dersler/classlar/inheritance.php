<?php

/* class test{
    protected $ad="Zaur";
    public function merhaba(){
        return $this->ad.' Merhaba ';
    }
}
class test2 extends test{
    public function dunya(){
        return 'dunya '. parent::merhaba();    //
    }
    public function ad(){
        return $this->ad;
    }
    public function merhaba(){
      //  return $this->merhaba;            bele yazsam islemir cunki this 
      //ancaq bir clasin yalniz ozunun icindeki deyisken ve fonksiyonlari cagirir
      return parent::merhaba();
    }
}
$test2=new test2;
//$test->ad="Istifadeci";
//echo $test2->merhaba(). ' '.$test2->dunya()."<br>";
echo $test2->ad()."<br>"; 
echo $test2->merhaba()."<br>"; //eger hem ozunde ,hem de valideyndeki xususiyyeti istesek ozunnen verir
echo $test2->dunya()."<br>"; */

/* ===================================================================================== */

/* class Calisanlar{
    public $adsoyad;
    public $maas;
    public function adsoyad($val){
        return $this->adsoyad=$val;
    }
    public function maas($val2){
        return $this->maas=$val2;
    }
    public function illikMaas(){
        return ($this->maas * 12 ). " AZN ";
    }
}

class muhasibat extends Calisanlar{}
class it extends Calisanlar{
    
        public function illikMaas(){
            return "It calisanimiz ".$this->adsoyad .'-nin illik maasi '.parent::illikMaas().'dir';
    }

}


$muhasibat=new muhasibat;
    $muhasibat->adsoyad("Zaur Aliyev");
    $muhasibat->maas(1000);
    echo  'Muhasibat ucun illik maas ' .$muhasibat->illikMaas().PHP_EOL;

$it=new it;
    $it->adsoyad("Aygul Aliyeva");
    $it->maas(4000);
    echo  $it->illikMaas().PHP_EOL;
 */


 /* ===================================================================================== */

 class a{
    public function test(){
        return 'a-testi';
    }
 }

 class b extends a{
       public function test(){
        return 'b-testi';
    }
}

class c extends b{

    public function test(){
        return 'c-testi';
    }
    public function testMetodlariniGotur(){
        return [
            'c'=>self::test(), //self=this
            'b'=>parent::test(),
            'a'=>a::test()
        ] ;
    }    

}
$c=new c ;
    print_r($c->testMetodlariniGotur());
?>