<?php
$text="Hello World!";
$dati="dati.txt";
$exist=file_exists("dati.txt");

if($exist==true){
    $content = file_get_contents($dati);
    $mas=explode("\n",$content);
    $npk=count($mas);
}
else if($exist==false){
    $npk=0;
}
$newNpk=$npk-1;

file_put_contents($dati, $newNpk. " ". $text . "\n", FILE_APPEND);

$mas[$_POST['search']]=$_POST['replace'];

foreach($mas as $key){
    echo $key. " " .$mas[$key]; 
}

// echo $newNpk. " ". nl2br($content);

?>