<?php
$uuid = $_POST['uuid'];
$JsonTasks = file_get_contents('tasks.json');
$arrayTasks = json_decode(($JsonTasks));
$compteur = 0;
$sendData;
while ($compteur < count($arrayTasks))
{
    if (array_keys((array)$arrayTasks[$compteur])[0] == $uuid){
        $sendData = $arrayTasks[$compteur]->$uuid;
    }
    $compteur++;
}
$history = fopen('history.txt', 'a');
fwrite($history, "\n");
fwrite($history, date("Y/m/d"));
fwrite($history, "\n");
fwrite($history, $JsonTasks);
fwrite($history, "\n");
fclose($history);
echo json_encode($sendData);
?>
