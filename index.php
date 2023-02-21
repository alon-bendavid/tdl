<?php
session_start();
var_dump($_SESSION["user"]["login"]);
require_once("classes/User.php");
require_once("classes/Task.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livreor-js</title>
    <link rel="stylesheet" href="css\style.css">
    <script defer src="script.js"></script>

</head>

<body>
    <header>
        <nav>
            <ul>

                <a href="">To Do List</a>
                <?php if (isset($_SESSION["user"])) { ?>

                    <a id="disconnectBtn" href="php\disconnect.php">disconnect</a>
                <?php
                } else { ?>
                    <!-- <a href="">login</a> -->

                <?php
                } ?>
            </ul>
        </nav>
    </header>
    <!-- //////////////////inscrption\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="inscrption">
        <h1>sign up</h1>
        <form id="signUp">
            <input type="text" placeholder="username" name="username"><br>
            <input type="password" placeholder="password" name="password" required><br>
            <input type="password" placeholder="retype password" name="repass" required><br>
            <button name="inscrptionSub" id="inscrptionSub">submit </button>


        </form>
    </div>
    <!-- //////////////////connexion\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="connection_form">
        <h2>Sign in!</h2>
        <form id="connexion">
            <input type="text" placeholder="username" name="loginUsr" required><br>

            <input type="password" placeholder="password" name="loginPwd" required><br>

            <button type="submit" name="loginSub">sign in</button>

        </form>
        <h3 class="small_link"><a href="inscription.php">
                Not a member yet? <strong>Sign Up!</strong>
            </a></h3>
        <!-- <a class="logoGit" href="https://github.com/alon-bendavid/livre-or"><img src="..\media\GitHub-Logo.png" alt=""></a> -->
    </div>

    <!-- //////////////////start a task\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="commentaire">
        <h1>start a new task</h1>
        <form action="php/handleTasks.php" method="post">
            <textarea name="task" id="" cols="30" rows="10" required></textarea>
            <input type="hidden" name="current_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly">
            <button class="sign" type="submit" name="subComment">Send</button>


        </form>
    </div>
    <!-- //////////////////tasks\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="livre-or">


    </div>
</body>

</html>