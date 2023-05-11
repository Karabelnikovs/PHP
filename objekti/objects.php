<pre>
<?php
class SchoolPerson{
    public $name;
    public $surname;
    private $bDay;
    private $group;
    function __construct($initGroup,$initName,$initSurname,$initbDay){
        $this->group = $initGroup;
        $this->name = $initName;
        $this->surname = $initSurname;
        $this->bDay = $initbDay;
    }
     function getGroup(){
        return $this->group;
    }
     function getFullName(){
        return $this->name. " ". $this->surname;
    }
    function setSurname($new){
        $this->surname = $new;
    }
    function getSurname(){
        return $this->surname;
    }
    function calculateAge(){
        $date1=date_create($this->bDay);
        $date2=date_create(date("Y-m-d"));
        $age=date_diff($date1, $date2);
        return $age->format("Vecums: %Y.");
    }
    function setBday($newDate){
        $this->bDay = $newDate;
    }
}
class Teacher extends SchoolPerson{
    public $salary;
    function __construct($initGroup,$initName,$initSurname,$initbDay,$initSalary){
        parent::__construct($initGroup,$initName,$initSurname,$initbDay);
        $this->salary = $initSalary;
    }
}
class Student extends SchoolPerson{
    public $stipend;
    function __construct($initGroup,$initName,$initSurname,$initbDay,$initStipend){
        parent::__construct($initGroup,$initName,$initSurname,$initbDay);
        $this->stipend = $initStipend;
    }
}

$Turcina = new Teacher("IPa22","Dace","Turcina","12-06-1977",3000);
$nikolajs = new Student("IPa22","Nikolajs","Karabeļņikovs","25-02-2006",10000);

var_dump($nikolajs);
echo "<br><br>";
var_dump($Turcina);
echo "<br><br>";
echo $nikolajs->calculateAge();
echo "<br><br>";
$nikolajs->setBday("27-04-2000");
echo $nikolajs->calculateAge();
// echo "<br><br>";
// echo $nikolajs::SCHOOL;
// echo "<br><br>";
// echo Student::PI;
echo "<br><br><br>";

class Transports{
    public $cena;
    public $gads;
    function __construct($initPrice,$initYear){
        $this->cena = $initPrice;
        $this->gads = $initYear;
    }
}
class Traktors extends Transports{
    public $riteni;
    function setWheels($wheels){
        $this->riteni = $wheels;
    }
}
class Lidmasina extends Transports{
    public $sparni;
    function setWings($wings){
        $this->sparni = $wings;
    }
}
$Lamborghini = new Traktors(12000,1960);
$Cessna = new Lidmasina(100000,2010);
$Lamborghini->setWheels(4);
$Cessna->setWings(5);
var_dump($Lamborghini);
echo "<br>";
var_dump($Cessna);
?>