<?php
session_start();
require_once("../classes/User.php");
require_once("../classes/Task.php");
// require_once("header.php");
if (isset($_SESSION["user"])) {
    $id = $_SESSION["user"]["id"];
    // var_dump($_SESSION["user"]["id"]);
    $task = new Task();
    $task->fetchTask($id);
}
