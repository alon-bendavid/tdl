<?php
session_start();
var_dump($_SESSION);
require_once("classes/User.php");
// require_once("php/connexion.php");
// if ($userTest->isConnected()) {
//     // header('Location: ../todolist.php');
//     echo "user is connectd";
// }
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

                    <a href="">disconnect</a>
                <?php
                } else { ?>
                    <a href="">login</a>

                <?php
                } ?>
            </ul>
        </nav>
    </header>
    <!-- //////////////////inscrption\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="inscrption">
        <h1>sign up page</h1>
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

            <button type="submit" name="loginSub">
                <h2 class="sign">Sign in</h2>
            </button>

        </form>
        <h3 class="small_link"><a href="inscription.php">
                Not a member yet? <strong>Sign Up!</strong>
            </a></h3>
        <!-- <a class="logoGit" href="https://github.com/alon-bendavid/livre-or"><img src="..\media\GitHub-Logo.png" alt=""></a> -->
    </div>
    <!-- //////////////////profil\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="profil">
        <h2>Edit your profile</h2>

        <form action="profil.php" method="post">
            <input type="text" placeholder='New Username' name="editUsr"><br>
            <input type="text" placeholder="New Password" name="editPwd"><br>
            <input type="text" placeholder="Retype password" name="rePwd"><br>
            <button class="sign" type="submit" name="editSub">Edit</button>
            <!-- <input type="submit" name="editSub">edit</input> -->
        </form>
    </div>
    <!-- //////////////////commentaire\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="commentaire">
        <h1>Send a comment!</h1>
        <form action="" method="post">
            <textarea name="comment" id="" cols="30" rows="10" required></textarea>
            <!-- <input type="hidden" name="usrId" value="<?php echo $_SESSION['user'][1] ?>"><br> -->
            <!-- <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s') ?>"><br> -->

            <button class="sign" type="submit" name="subComment">Send</button>


        </form>
    </div>
    <!-- //////////////////livre-or\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="livre-or">


    </div>
</body>

</html>