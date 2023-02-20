<?php
require_once("../classes/User.php");
//fetch connecxion data
// var_dump($_POST);
// if (isset($_POST["inscrptionSub"])) {


$username = $_POST["username"];
$password = $_POST["password"];
$repass = $_POST["repass"];

//create a new usr object and start a database connection
$userTest = new User("$username");

//signup the user if doesnt exist
$userTest->register($username,  $password, $repass);
// var_dump($_SESSION["user"]);

// echo $userTest->login;
// echo "$userTest->login  <br>";

// echo "$loginPwd  <br>";
// echo "$loginUsr  <br>";
// if ($userTest->register($username, $password)) {
//     $response = array("success" => true, "message" => "User created");
// } else {
//     $response = array("fail" => false, "message" => "User already exists.");
// }

    // Return the response as a JSON string
    // echo $response;
// }
