<?php
$name="";
$country="";
$found=[];
$all=false;
if(!empty($_POST['search'])){
    $name=strtolower(trim($_POST['search']));
}
// var_dump($_POST);
$check=[];
if(!empty($_POST['check'])){
    $check=$_POST['check'];
}
if(empty(in_array('name',$check))
&&empty(in_array('travel',$check))
&&empty(in_array('surname',$check))
&&empty(in_array('birthdate',$check))
&&empty(in_array('grupa',$check))
&&empty(in_array('city',$check))
&&empty(in_array('languages',$check))
){
    $all=true;
}


if($all==true && strlen($name)){
    $json=@json_decode(file_get_contents('https://ej.uz/vtdt-php-json1'),true);

    foreach($json as $key=>$value){
        $names=explode(' ',strtolower(trim($value['Vārds'])));
    
        $surnames=explode(' ',strtolower(trim($value['Uzvārds'])));
    
        $grupas=explode(' ',strtolower(trim($value['Grupa'])));
    
        $dzimsanasd=explode(' ',strtolower(trim($value['Dzimšanasdiena'])));
    
        $dzivesvieta=explode(' ',strtolower(trim($value['Dzīvesvieta'])));
    
        $value["Valodas"]=str_replace(["\n",","],"\n",$value["Valodas"]);
        $languages=explode(' ',strtolower(trim($value['Valodas'])));
    
        $value["Ceļojumi"]=str_replace(["\n",","],"\n",$value["Ceļojumi"]);
        $countries=explode(' ',strtolower(trim($value['Ceļojumi'])));
    
        if(in_array($name, $names)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $countries)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $surnames)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $grupas)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $dzimsanasd)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $dzivesvieta)){
            array_push($found, implode(', ',$value));
        }
        else if(in_array($name, $languages)){
            array_push($found, implode(', ',$value));
        }
    }
    echo"atrada: ";
    echo implode('<br><br>', $found);
}
 if($all==false && strlen($name)){
$json=@json_decode(file_get_contents('https://ej.uz/vtdt-php-json1'),true);

foreach($json as $key=>$value){
    $names=explode(' ',strtolower(trim($value['Vārds'])));

    $surnames=explode(' ',strtolower(trim($value['Uzvārds'])));

    $grupas=explode(' ',strtolower(trim($value['Grupa'])));

    $dzimsanasd=explode(' ',strtolower(trim($value['Dzimšanasdiena'])));

    $dzivesvieta=explode(' ',strtolower(trim($value['Dzīvesvieta'])));

    $value["Valodas"]=str_replace(["\n",","],"\n",$value["Valodas"]);
    $languages=explode(' ',strtolower(trim($value['Valodas'])));

    $value["Ceļojumi"]=str_replace(["\n",","],"\n",$value["Ceļojumi"]);
    $countries=explode(' ',strtolower(trim($value['Ceļojumi'])));

    if(in_array($name, $names)&&!empty(in_array('name',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $countries)&&!empty(in_array('travel',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $surnames)&&!empty(in_array('surname',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $grupas)&&!empty(in_array('grupa',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $dzimsanasd)&&!empty(in_array('birthdate',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $dzivesvieta)&&!empty(in_array('city',$check))){
        array_push($found, implode(', ',$value));
    }
    else if(in_array($name, $languages)&&!empty(in_array('languages',$check))){
        array_push($found, implode(', ',$value));
    }
}
if(!empty($found)){
echo"atrada: ";
echo implode('<br><br>', $found);
}
else{
    echo"tukss";
}
}
else{
    echo"tukss";
}
?>