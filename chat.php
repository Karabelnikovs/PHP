<?php
$info="storage.json";
if(!empty($_POST)){
$element=[
    'time'=> date("Y-m-d H:i:s") ,
    'nickname'=> "" ,
    'chat'=>""

];
$element['nickname']=$_POST['nickname'];
$element['chat']=$_POST['chat'];


$data=json_decode(file_get_contents($info),true); 
if(empty($data)){
    $data=[];
}
    array_push($data,$element);
    file_put_contents($info, json_encode($data));
    echo file_get_contents($info);
}
else{
    echo file_get_contents($info);
}
?>