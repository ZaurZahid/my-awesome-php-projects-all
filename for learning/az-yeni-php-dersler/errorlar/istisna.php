<?php
//ozum ucun ozellesdirirem
class Hata extends Exception{
    public function printJSON(){
        $data=[
            'satir'=>$this->line,
            'file'=>$this->file,
            'message'=>$this->message
        ];
        return json_encode($data);
    }
    public function printXML(){
        header("Content-type:text/xml");
        $xml=new SimpleXMLElement('<hata/>');
        $xml->addChild('satir',$this->line);
        $xml->addChild('file',$this->file);
        $xml->addChild('message',$this->message);
        return $xml->asXML();
    }
}

try {
    if(!isset($_GET['id'])){
        throw new Hata ('id parametresi yoxdur');
    }elseif(empty($_GET['id'])){
        throw new Hata ('id parametresi bostur');
    }elseif(!is_numeric($_GET['id'])){
        throw new Hata ('id parametresi reqem deyil');
    }elseif($_GET['id']!=10){
        throw new Hata ('id parametresi 10A BERABER DEYIL');
    }else{
      echo  $_GET['id'];
    }
    }
    catch(Hata $hata){
        if($_GET['tip']=='json'){
              echo $hata->printJSON();
        }elseif($_GET['tip']=='xml'){
              echo $hata->printXML();
        }
        
    }

?>