<?php
class Task
{
    private $id;
    private $task;
    private $id_utilisateur;
    private $date;
    private $conn;


    public function __construct()
    {

        $this->conn = new mysqli("localhost", "root", "", "to_do_list");
        if (!$this->conn) {
            echo "db connection failed";
        }
    }
    public function createTask($value, $task, $usrId, $date)
    {
        // var_dump("this is task . $task");
        // var_dump($usrId);

        // var_dump("this is  date. $date");
        $stmt = $this->conn->prepare("INSERT INTO tasks (id,task, id_utilisateur, date	) VALUES (?,?,?,?)");

        // $stmt = $this->conn->prepare("INSERT INTO tasks (task) VALUES (?)");
        // var_dump($stmt);
        $stmt->bind_param("bsis", $value,  $task, $usrId, $date);
        // $stmt->bind_param("sis", $task, $usrId, $date);
        if ($stmt->execute()) {
            echo "task hes created";
            return true;
        } else {
            var_dump($this->conn->error_list);
            echo "task didnt saved";
            return false;
        }
    }
}
