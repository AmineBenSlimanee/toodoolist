<?php
$jsonFile = file_get_contents('users.json');
$arrayfile = json_decode($jsonFile, true);
$info = $_POST['sendedData'];
$array = (array)json_decode($info);
$compteur = 0;
$valid = false;
$uuid;
while ($compteur < count($arrayfile))
{
    if ($arrayfile[$compteur][array_keys($arrayfile[$compteur])[0]]['Username'] == $array['Username'] && $arrayfile[$compteur][array_keys($arrayfile[$compteur])[0]]['Password'] == $array['Password']){
        $valid = true;
        $uuid = array_keys($arrayfile[$compteur])[0];
    }
    $compteur++;
}

if(!$valid)
{
    echo json_encode('unvalid');
}
else
{
    echo json_encode($uuid); 
}
?>