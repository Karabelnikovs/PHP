<?php
$json=@json_decode(file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=57.15&longitude=24.86&hourly=temperature_2m,snowfall,snow_depth,cloudcover,windspeed_10m&timezone=auto"),true);
$coldest=$json["hourly"]["temperature_2m"][0];
$hottest=$json["hourly"]["temperature_2m"][0];
$cloudcover=$json["hourly"]["cloudcover"][0];
$wind=$json["hourly"]["windspeed_10m"][0];
$snow=$json["hourly"]["snowfall"][0];
$snowD=$json["hourly"]["snow_depth"][0];
$snowWeek=$json["hourly"]["snowfall"][0];
$hottestTime=$json["hourly"]["time"][0];
$coldestTime=$json["hourly"]["time"][0];
$cluodyTime=$json["hourly"]["time"][0];
$windyTime=$json["hourly"]["time"][0];
$snowTime=$json["hourly"]["time"][0];
$snowTimeW=$json["hourly"]["time"][0];
$snowDTimeW=$json["hourly"]["time"][0];

$bestCloud=$json["hourly"]["cloudcover"][0];
$bestTemp=$json["hourly"]["temperature_2m"][0];
$bestWind=$json["hourly"]["windspeed_10m"][0];
$bestTime=$json["hourly"]["time"][0];

for($i=0;$i<24;$i=$i+1){

    if ($json["hourly"]["temperature_2m"][$i] > $hottest){
        $hottest=$json["hourly"]["temperature_2m"][$i];
        $hottestTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["temperature_2m"][$i] < $coldest){
        $coldest=$json["hourly"]["temperature_2m"][$i];
        $coldestTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["cloudcover"][$i] > $cloudcover){
        $cloudcover=$json["hourly"]["cloudcover"][$i];
        $cluodyTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["windspeed_10m"][$i] > $wind){
        $wind=$json["hourly"]["windspeed_10m"][$i];
        $windyTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["snowfall"][$i] > $snow){
        $snow=$json["hourly"]["snowfall"][$i];
        $snowTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["snow_depth"][$i] > $snow){
        $snow=$json["hourly"]["snowfall"][$i];
        $snowTime=$json["hourly"]["time"][$i];
    }
}

for($i=0;$i<count($json["hourly"]["cloudcover"]);$i=$i+1){
    if($json["hourly"]["snowfall"][$i] > $snowWeek){
        $snow=$json["hourly"]["snowfall"][$i];
        $snowTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["snow_depth"][$i] > $snowD && $json["hourly"]["temperature_2m"][$i]<=0){
        $snowD=$json["hourly"]["snow_depth"][$i];
        $snowDTime=$json["hourly"]["time"][$i];
    }
    else if($json["hourly"]["temperature_2m"][$i]>=$bestTemp && $json["hourly"]["cloudcover"][$i]<=$bestCloud && $json["hourly"]["windspeed_10m"][$i]<$bestWind){
        $bestTime==$json["hourly"]["time"][$i];

    }
}

echo "Aukstkais laiks sodien ir ". substr($coldestTime,-5). " un tas ir " .$coldest. ", bet siltkais laiks sodien ir ".substr($hottestTime,-5). " un tas ir " .$hottest. ". \n";
echo "<br>";
echo "Vis vairak makonu sodien bus ".  substr($cluodyTime,-5). " un tas ir: ". $cloudcover ." % makonains. Vis vejainakais laiks sodien bus ".  substr($windyTime,-5). " un tas ir $wind metri sekundee ";
echo "<br>";
echo "Vis vairak snigs ". substr($snowTime,-5). ", tas ir $snow cm. ";
echo "<br>";
echo"Tuvaka diena, kad snigs visvairak sniegs ir ". substr($snowTimeW, 0, 10). ".";
echo "<br>";
echo"Tuvaka diena, kad bus biezakais sniegs vai temperatura, kas ir vienada vai zemaka par 0 ir ". substr($snowDTimeW, 0, 10). ".";
echo "<br>";
echo"Labaka diena ir ". substr($bestTime,0,10). ".";
?>