<?php

class Database{
    private $sql;
    public function from($tabloAdi){
        $this->sql='SELECT * FROM ' . $tabloAdi;
        return $this;
    }
    public function select($column){
        $this->sql=str_replace("*",$column, $this->sql);
        return $this;
    }
    public function get(){
        return $this->sql;
    }
}
$db=new Database;
$sorgu= $db->from("uyeler")->select("uye_id,uye_ad")->get();
echo $sorgu;
?>