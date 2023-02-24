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
        $this->date = $date;
        $this->id_utilisateur = $usrId;
        $this->task = $task;

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
            // var_dump($this->conn->error_list);
            echo "task didnt saved";
            return false;
        }
    }
    public function fetchTask($usrId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM tasks where id_utilisateur = ?");
        $stmt->bind_param('i', $usrId);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // var_dump($data);
        echo json_encode($data);
        // return $data;
    }
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("s", $id);
        if ($stmt->execute()) {

            echo "task deleted";
            return true;
        } else {
            echo "task delete faild!";
            return false;
        }
    }
}

// if ($stmt->num_rows <= 0) {
//     echo "You have no tasks";
//     return false;
// } else {
//     $stmt->fetch();
//     // var_dump($stmt);
//     print_r($stmt);
//     return $stmt;
// }