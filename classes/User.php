<?php
class User
{
    private $id;
    public $login;
    public $password;
    private $conn;


    // database connection----------------------------------------------------------------------------------------------------------------------------
    public  function __construct($login)
    {
        $this->login = $login;


        $this->conn = new mysqli("localhost", "root", "", "to_do_list");

        return $this->conn;
    }


    //register the acount into the database and print a tbale with the user details----------------------------------------------------------------
    public function register($login,  $password, $repass)
    {
        // check if username already exist
        $stmt = $this->conn->prepare("SELECT id FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "username already exist";
            return false;
        }
        if ($repass != $password) {
            echo "Make sure password is the same";
            return false;
        }


        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $login, $hashed_password);
        if ($stmt->execute()) {
            echo "username created";

            return true;
        } else {
            return false;
        }
    }


    // login user--------------------------------------------------------------------------------------------------------------------------
    public function login($login, $password)
    {
        $stmt = $this->conn->prepare("SELECT id, password FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        // var_dump($login);
        // var_dump($password);
        if (password_verify($password, $hashed_password)) {
            $this->id = $id;
            $_SESSION['user'] =  ['id' => $this->id, 'login' => $this->login];
            echo "you are now connected";
            return true;
        } else {
            echo "something went worng";
            return false;
        }
    }
    /////////////////////////////// wituhout hashed password just for testing 



    // public function login($login, $password)
    // {
    //     $stmt = $this->conn->prepare("SELECT id, password FROM utilisateurs WHERE login = ?");
    //     $stmt->bind_param("s", $login);
    //     $stmt->execute();
    //     $stmt->bind_result($id, $password);
    //     $stmt->fetch();
    //     if ($password == $password) {
    //         $this->id = $id;
    //         $_SESSION['user'] = $login;
    //         return $id;
    //     } else {
    //         return false;
    //     }
    // }


    // disconnect user---------------------------------------------------------------------------------------------------------------------
    public function disconnect()
    {
        session_unset();
        session_destroy();
    }

    // delete current user-----------------------------------------------------------------------------------------------------------------
    public function delete()
    {
        $stmt = $this->conn->prepare("DELETE FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $this->login);
        $stmt->execute();
        session_unset();
        session_destroy();
    }
    // update the user information-----------------------------------------------------------------------------------------------------------
    public function update($login, $password,  $firstname, $lastname)
    {
        $stmt = $this->conn->prepare("UPDATE utilisateurs SET login = ?, password = ?,  firstname = ?, lastname = ? WHERE login = ?");
        $stmt->bind_param("sssss", $login, $password,  $firstname, $lastname, $this->login);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    // check if user is connected------------------------------------------------------------------------------------------------------------
    public function isConnected()
    {
        if (isset($_SESSION["user"])) {
            return true;
        } else {
            return false;
        }
    }
    // fetch user info and present it as a table--------------------------------------------------------------------------------------------------
    public function getAllInfos()
    {
        echo "<table>";
        echo "<tr><th>ID</th><td>" . $this->id . "</td></tr>";
        echo "<tr><th>Login</th><td>" . $this->login . "</td></tr>";
        echo "</table>";
    }
    //return specific user information--------------------------------------------------------------------------------------------------------
    // username--------------------------
    public function getLogin()
    {
        return $this->login;
    }
}
