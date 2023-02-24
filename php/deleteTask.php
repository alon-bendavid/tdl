<?php
require_once("../classes/Task.php");
$taskId  =  $_POST["taskId"];
$task = new Task();
$task->delete($taskId);

// echo $task;


// var_dump($taskId);
// $task1 = new Task();
