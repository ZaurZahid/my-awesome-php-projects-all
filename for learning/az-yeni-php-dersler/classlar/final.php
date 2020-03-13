
 <?php 
 /* class Marka{

    }

 class Model extends Marka{
      
    }
//eger bunun evveline FINAL yazsam bunnan sonra day class gelmeyecek
 /* final   class Seri extends Model{

    }
 class Urun extends Seri{
    public function test(){
     return 'urun testi';
    }
}

$urun =new Urun;
echo $urun->test(); */
class calisanlar{
   /* final  */public function test(){
        return "calisanlar:test";
    }
}
class it extends calisanlar{
    public function test(){
        return "it:test";
    }
}
$it= new it;
echo $it->test();
    ?>