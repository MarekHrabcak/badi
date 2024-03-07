<?php

class AspectFunctions 
{

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }



    //    aspects CRUD
    public function displayDataAspects($aspect_type)
    {
        $query = "SELECT * FROM aspects WHERE aspect_type = '$aspect_type'";
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

    public function displayAspectNames()
    {
        $query = "SELECT DISTINCT aspect_name FROM aspects";
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

    public function displayAspectType()
    {
        $query = "SELECT DISTINCT aspect_type FROM aspects";
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


    public function insertDataAspects($post)
    {
        $aspect_type = $this->connection->real_escape_string($_POST['aspect_type']);
        $aspect_name = $this->connection->real_escape_string($_POST['aspect_name']);
        $aspect_value = $this->connection->real_escape_string($_POST['aspect_value']);
        $aspect_description = $this->connection->real_escape_string($_POST['aspect_description']);
        $query = "INSERT INTO aspects(aspect_type,aspect_name,aspect_value,aspect_description) VALUES('$aspect_type','$aspect_name','$aspect_value','$aspect_description')";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=aspects&msg1=insert");
        } else {
            echo "Registration failed try again!";
        }
    }


    public function displayRecordByIdAspects($id)
    {
        $query = "SELECT * FROM aspects WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function updateRecordAspects($postData)
    {
        $aspect_value = $this->connection->real_escape_string($_POST['uaspect_value']);
        $aspect_description = $this->connection->real_escape_string($_POST['uaspect_description']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE aspects SET aspect_value = '$aspect_value', aspect_description = '$aspect_description' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                AlertFunctions::addAlert(AlertFunctions::SUCCESS, 'Update successful');
                header("Location: index.php?page=aspects&msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }

    public function deleteRecordAspect($id)
    {
        $query = "DELETE FROM aspects WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=aspects&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    // TODO UPRATANE
    //    aspect CRUD
    public function displayAspectValues($aspect_type)
    {
        $query = "SELECT * FROM aspects WHERE aspect_type = '$aspect_type'";
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

    // This works
    // public function displayAspectDataclassName($aspect_value)
    // {
    //     $query = "SELECT aspect_name FROM aspects WHERE aspect_type = 'dataclass' AND aspect_value = '$aspect_value'";
        
    //     // SELECT * FROM aspects WHERE aspect_type = '$aspect_type'";
    //     $result = $this->connection->query($query);
    //     if ($result->num_rows > 0) {
    //         $data = array();
    //         while ($row = $result->fetch_assoc()) {
    //             $data[] = $row;
    //         }
    //         // var_dump($result);
    //         return $data;
    //     }else{
    //         echo "No found records";
    //     }
    // }


    // Double inputs
    public function displayAspectDataclassName($aspect_type, $aspect_value)
    {
        $query = "SELECT aspect_name FROM aspects WHERE aspect_type = '$aspect_type' AND aspect_value = '$aspect_value'";
        
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array(); // Return an empty array if no records found
        }
    }

    public function displayAspectCount()
    {
        $query = "SELECT COUNT(id) AS count FROM aspects";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            echo "Record not found";
        }
    }




}


