<?php
if(!empty($_POST['latitude']) && !empty($_POST['longitude']) && !empty($_POST['time'])){

$weather=@json_decode(file_get_contents("https://api.open-meteo.com/v1/forecast?latitude=" .$_POST['latitude']. "&longitude=" .$_POST['longitude']. "&hourly=temperature_2m"),true);

// if(!empty($_POST['latitude'])){
//     $weather["latitude"]=$_POST['latitude'];
// }
// if(!empty($_POST['longitude'])){
//     $weather["longitude"]=$_POST['longitude'];
// }
// if(!empty($_POST['time'])){
//     $weather["hourly"]["time"]=$_POST['time'];
// }

$k=0;
for($i=0;$k<1;$i++){
    if($weather["hourly"]["time"][$i]==$_POST['time']){
        $k=1;
    }
}

    $data=[
        'latitude'=>$weather["latitude"],
        'longitude'=>$weather["longitude"],
        'time'=>$weather["hourly"]["time"][$i],
        'temperature'=>$weather["hourly"]["temperature_2m"][$i]
    ];
   
    echo json_encode($data);
}
// else{
//     $data=[

//     ]
// }