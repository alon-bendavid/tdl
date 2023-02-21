<?php
session_start();
require_once("../classes/Task.php");


if (isset($_POST["subComment"])) {
    $task1 = new Task();

    $task  =  $_POST["task"];
    $date =   $_POST["current_date"];
    $usrId =  $_SESSION["user"]["id"];
    var_dump($task);
    var_dump($date);
    var_dump($usrId);

    $task1->createTask(null, $task, $usrId, $date);
}
