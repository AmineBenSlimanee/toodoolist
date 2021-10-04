<?php
$JsonTasks = file_get_contents('tasks.json');
$arrayTasks = json_decode(($JsonTasks));
$sendedData = $_POST['sendedData'];
$uuid = $_POST['uuid'];
$data = json_decode($sendedData);
$compteur = 0;
while ($compteur < count($arrayTasks))
{
    if (array_keys((array)$arrayTasks[$compteur])[0] == $uuid){
        $arrayTasks[$compteur]->$uuid = $data;
    }
    $compteur++;
}
if (json_encode($arrayTasks) != null){
    $file = fopen('tasks.json', "w+");
    fwrite($file, json_encode($arrayTasks));
    fclose($file);
}
?>

