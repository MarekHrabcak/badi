<?php

class FactorFunctions
{
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }

    
    public function displayDataFactors()
    {
        $query = "SELECT * FROM factors ORDER BY factor_name ASC";
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

    public function displayFactorNames()
    {
        $query = "SELECT DISTINCT (factor_name) FROM factors";
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

    //    factors
    public function getFactorItems($factor_name)
    {
        $query = "SELECT * FROM factors WHERE factor_name = '$factor_name'";
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

    public function displayFactorCount()
    {
        $query = "SELECT COUNT(id) AS count FROM factors";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            echo "Record not found";
        }
    }

    public function insertDataFactor($post)
    {
        $factor_name = $this->connection->real_escape_string($_POST['factor_name']);
        $factor_level = $this->connection->real_escape_string($_POST['factor_level']);
        $factor_description = $this->connection->real_escape_string($_POST['factor_description']);
        $query = "INSERT INTO factors(factor_name,factor_level,factor_description) VALUES('$factor_name','$factor_level','$factor_description')";
        $sql = $this->connection->query($query);
        // var_dump($query);
        if ($sql == true) {
            header("Location: index.php?page=factors&msg1=insert");
        } else {
            echo "Registration failed try again!";
        }
    }

    public function deleteRecordFactor($id)
    {
        $query = "DELETE FROM factors WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=factors&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }

    public function updateRecordFactor($postData)
    {
        $factor_name = $this->connection->real_escape_string($_POST['ufactor_name']);
        $factor_level = $this->connection->real_escape_string($_POST['ufactor_level']);
        $factor_description = $this->connection->real_escape_string($_POST['ufactor_description']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE factors SET factor_name = '$factor_name', factor_level = '$factor_level', factor_description = '$factor_description' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                header("Location: index.php?page=factors&msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }


    public function displayRecordByIdFactor($id)
    {
        $query = "SELECT * FROM factors WHERE id = '$id'";
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
        $query = "DELETE FROM factors WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location:http://localhost/badi/dashboard/factors.php?msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }


}