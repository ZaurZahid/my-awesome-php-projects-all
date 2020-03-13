<?php

class UyeBilgileri{
    public $ad;
    public $soyad='Aliyev';
    const YAS=20;
    public function adGoster(){
         return $this-> ad; 
    }    
    public function topla($a,$b=10){
        return $a+$b;
   }    
    public function soyadGoster(){
        return $this-> soyad;
    }  
    //bir methodun icinde basqa methodu isletmek olur
    public function soyadGoster2($a,$b){
        return $this-> topla($a,$b);
    }  
    public function yasGoster2(){
        return self::YAS;
    }  
} 

$uye=new UyeBilgileri();
//echo $uye->soyad."<br>";
//echo $uye::YAS."<br>";
//echo $uye->adGoster()."<br>";
//echo $uye->topla(18)."<br>";
//echo $uye->soyadGoster()."<br>";
//echo $uye->soyadGoster2(15,17)."<br>";
//echo $uye->yasGoster2()."<br>";
$uye->ad="Zaur";
echo $uye->adGoster().' '.$uye->soyadGoster()."<br>";

$uye->soyad="Zahidoglu";
echo $uye->adGoster().' '.$uye->soyadGoster()."<br>";
?>