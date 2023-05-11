<?php
$dati=@json_decode(file_get_contents('https://ej.uz/vtdt-php-json1'),true);

// if(empty($_GET[0])){
//     echo"nav ievadsits";
// }
// else if(is_int($_GET[0])){
//     for($i=0; $i<$_GET[0]; $i++){
//         echo "Task #" . ($i+1). "<br>";
//     }
//     }
// else{
//     echo"nav cipars";
// }

foreach($dati as $key=>$d){
    if($d["Vārds"]==$_GET[0]){
        // var_export($d);
        echo"atrasts";
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
  <label for="fname">ko meklejat:</label><br>
  <input type="text" id="fname" name="fname" ><br>
</form>
</body>
</html> -->