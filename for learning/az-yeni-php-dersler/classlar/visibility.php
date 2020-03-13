<?php
error_reporting(E_ALL);
ini_set("display",1);
//public = hami
//private = ancaq sinif icinden alina biler
//protected =private kimidir ama ferqi miras ile basqa classlarda isledile biliner

class Test{
    public $ad="Zaur";
    private $backend="php";
    protected $seriyaNomresi="123456789";
    public function returnB(){ //private elesem yene islemeyecek
        return $this->backend;
    }
}

$test=new Test;
echo $test->ad.'<br>';
//echo $test->backend;   bu olmaz
echo $test->returnB();

?>