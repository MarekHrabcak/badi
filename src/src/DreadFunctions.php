<?php

class DreadFunctions
{
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }

    //    DREAD factors
    public function getDreadItems($dread_name)
    {
        $query = "SELECT * FROM dread WHERE dread_name = '$dread_name'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }else{
            echo "No found records";
        }
    }

    // OCALC DATA
    public function displayDreadNames()
    {
        $query = "SELECT UNIQUE FROM dread";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }

    public function insertDataDread($post)
    {
        $dread_name = $this->connection->real_escape_string($_POST['dread_name']);
        $dread_level = $this->connection->real_escape_string($_POST['dread_level']);
        $dread_description = $this->connection->real_escape_string($_POST['dread_description']);
        $query = "INSERT INTO dread(dread_name,dread_level,dread_description) VALUES('$dread_name','$dread_level','$dread_description')";
        $sql = $this->connection->query($query);
        var_dump($query);
        if ($sql == true) {
            header("Location: index.php?page=aspects&msg1=insert");
        } else {
            echo "Registration failed try again!";
        }
    }

    public function deleteRecordDread($id)
    {
        $query = "DELETE FROM dread WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=aspects&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function updateRecordDread($postData)
    {
        $dread_name = $this->connection->real_escape_string($_POST['udread_name']);
        $dread_level = $this->connection->real_escape_string($_POST['udread_level']);
        $dread_description = $this->connection->real_escape_string($_POST['udread_description']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE dread SET dread_name = '$dread_name', dread_level = '$dread_level', dread_description = '$dread_description' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                header("Location: index.php?page=aspects&msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }


    public function displayRecordByIdDread($id)
    {
        $query = "SELECT * FROM dread WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function deleteRecordOcalc($id)
    {
        $query = "DELETE FROM dread WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location:http://localhost/badi/dashboard/aspects.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }


}