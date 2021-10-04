<?php
$jsonFile = file_get_contents('users.json');
$arrayfile = json_decode($jsonFile, true);
$info = $_POST['sendedData'];
$tabInfo = (array)json_decode($info);
$uuid = uniqid(true);
$array = [$uuid => $tabInfo];
$compteur = 0;
$boolUsernameAlreadyExist = false;
while ($compteur < count($arrayfile))
{
 if ($arrayfile[$compteur][array_keys($arrayfile[$compteur])[0]]['Username'] == $array[$uuid]['Username']){
    $boolUsernameAlreadyExist = true;
 }
 $compteur++;
}
if($boolUsernameAlreadyExist)
{
    echo json_encode('unvalid');
}
else
{
    array_push($arrayfile, $array);
    $file = fopen('users.json', "w+");
    fwrite($file, json_encode($arrayfile));
    fclose($file); 

    $JsonTasks = file_get_contents('tasks.json');
    $arrayTasks = json_decode(($JsonTasks));
    $Tasks = array((string)$uuid => []);
    array_push($arrayTasks, $Tasks);
    $file = fopen('tasks.json', "w+");
    fwrite($file, json_encode($arrayTasks));
    fclose($file); 
    echo json_encode('valid');
}
?>
