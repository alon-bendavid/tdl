<?php
session_start();
// if (isset($_SESSION["user"])) {
//     var_dump($_SESSION["user"]["login"]);
// } else {
//     var_dump($_SESSION);
// }
// var_dump($_SESSION);

require_once("classes/User.php");
require_once("classes/Task.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do-List</title>
    <link rel="stylesheet" href="css\style.css">
    <!-- <script src="https://kit.fontawesome.com/e861973d30.js" crossorigin="anonymous"></script> -->

    <script defer src="script.js"></script>

</head>
<header>
    <nav>
        <ul>
            <!-- <a href="todolist.php">To Do List</a> -->
            <h1>To Do List</h1>
            <div>
                <?php if (isset($_SESSION["user"])) { ?>
                    <?php echo "<h4  >Welcome </h4>"; ?>

                    <?php echo "<h3  class='user'>" . $_SESSION['user']['login'] . "</h3>"; ?>
                    <a id="disconnectBtn" href="php\disconnect.php">disconnect</a>

                <?php
                } else { ?>
                    <!-- <a class="loginBtn" href="">login</a> -->

                <?php
                } ?>
            </div>
        </ul>
    </nav>
</header>