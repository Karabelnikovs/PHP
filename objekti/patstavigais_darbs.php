<pre>
<?php

class Dators{
    public $Processor;
    public $Videocard;
    private $RAM;
    private $SSD;

    function __construct($initProcessor,$initVideocard,$initRAM,$initSSD){
        $this->Processor = $initProcessor;
        $this->Videocard = $initVideocard;
        $this->RAM = $initRAM;
        $this->SSD = $initSSD;
    }
    function get_RAM(){
        return $this->RAM;
    }
    function get_SSD(){
        return $this->SSD;
    }
    function set_RAM($newRAM){
        $this->RAM = $newRAM;
    }
    function set_SSD($newSSD){
        $this->SSD = $newSSD;
    }

    function get_Processor(){
        return $this->Processor;
    }
    function upgrade_RAM(){
        $this->RAM = $this->RAM + 8;
        return $this->RAM;
    }
    function user_upgrade($userRam){
        $this->RAM = $this->RAM + $userRam;
        return $this->RAM;
    }
    function createProperty($name, $value, $newVideo){
        $this->{$name} = $value;
        $this->Videocard = $newVideo;
    }
    function set_RAMandSSD($newRAM, $newSSD){
        $this->set_RAM($newRAM);
        $this->set_SSD($newSSD);
        $this->get_RAM();
        $this->get_SSD();
    }
}

$lenovo = new Dators("Intel","RTX 3060",32,"1 TB");
$asus = new Dators("AMD","RTX 3050",16,"2 TB");
$dell = new Dators("Intel Xeon","GTX 1650",8,"512 GB");

var_dump($lenovo);
echo "<br><br>";

$lenovo->Processor="AMD";

var_dump($lenovo);
echo "<br><br>";

echo $lenovo->get_RAM();
echo "<br>";
echo $lenovo->get_SSD();
echo "<br>";

$lenovo->set_SSD("4 TB");
$lenovo->set_RAM(64);

echo $lenovo->get_RAM();
echo "<br>";
echo $lenovo->get_SSD();
echo "<br><br>";
echo $asus->get_Processor();
echo "<br>";
echo $lenovo->upgrade_RAM();
echo "<br>";
echo $lenovo->user_upgrade(-8);
echo "<br><br>10 uzd:<br><br>";
var_dump($lenovo);
echo "<br><br>";
$lenovo-> createProperty("name","lenovo legion","RTX 3090");
var_dump($lenovo);
echo "<br><br>11 uzd:<br><br>";
var_dump($lenovo);
echo "<br><br>";
echo $lenovo->set_RAMandSSD(16,"512 GB");
echo "<br><br>";
var_dump($lenovo);

?>