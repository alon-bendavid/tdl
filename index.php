<?php
require_once("header.php");

?>

<body>

    <!-- //////////////////inscrption\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="inscrption">
        <h1>sign up</h1>
        <form id="signUp">
            <h3 id="signMsg"></h3>
            <input type="text" placeholder="username" name="username"><br>
            <input type="password" placeholder="password" name="password" required><br>
            <input type="password" placeholder="retype password" name="repass" required><br>
            <button name="inscrptionSub" id="inscrptionSub">submit </button>


        </form>
    </div>
    <!-- //////////////////connexion\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="connection_form">
        <h2>Sign in!</h2>
        <h3 id="conMsg"></h3>
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
        <!-- <form action="php/handleTasks.php" method="post"> -->

        <form id="handle_tasks_form">
            <?php date_default_timezone_set('Europe/Paris'); ?>
            <textarea name="task" id="taskDescription" cols="30" rows="10" required></textarea>
            <input id="taskCreatedTime" type="hidden" name="current_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly">
            <button id="tasksFormBtn" class="sign" type="submit" name="subComment">Send</button>


        </form>
    </div>
    <!-- //////////////////tasks\\\\\\\\\\\\\\\\\\\\\ -->
    <div class="livre-or">
        <ul>
            <li>task A <button>del</button> </li>
            <li>task B</li>


        </ul>

    </div>
</body>

</html>