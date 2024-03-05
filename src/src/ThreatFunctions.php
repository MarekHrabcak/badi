<?php

class ThreatFunctions

{

    private $connection;

    public function __construct($connection) {
    $this->connection = $connection;

    }


    //    aspects CRUD
    public function displayDataFactors($factor_name)
    {
        $query = "SELECT * FROM aspects WHERE factor_name = '$factor_name'";
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

    public function displayFactorNames()
    {
        $query = "SELECT DISTINCT factor_name FROM aspects";
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


    public function insertDataFactors($post)
    {
        $factor_name = $this->connection->real_escape_string($_POST['factor_name']);
        $name = $this->connection->real_escape_string($_POST['name']);
        $description = $this->connection->real_escape_string($_POST['description']);
        $query="INSERT INTO aspects(factor_name,name,description) VALUES('$factor_name','$name','$description')";
        $sql = $this->connection->query($query);
        if ($sql==true) {
            header("Location:http://localhost/badi/dashboard/threats.php?msg1=insert");
        }else{
            echo "Registration failed try again!";
        }
    }


    public function displayRecordByIdFactors($id)
    {
        $query = "SELECT * FROM aspects WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
    }

    public function updateRecordFactors($postData)
    {
        $name = $this->connection->real_escape_string($_POST['uname']);
        $description = $this->connection->real_escape_string($_POST['udescription']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE aspects SET name = '$name', description = '$description' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql==true) {
                header("Location:http://localhost/badi/dashboard/aspects.php?msg2=update");
            }else{
                echo "Registration updated failed try again!";
            }
        }

    }
    public function deleteRecordFactors($id)
    {
        $query = "DELETE FROM aspects WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql==true) {
            header("Location:http://localhost/badi/dashboard/aspects.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }



    //    THREATS CRUD
    public function displayDataAspects($aspect_name)
    {
        $query = "SELECT * FROM aspects WHERE factor_name = '$factor_name'";
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


    public function displayListThreats()
    {
        $query = "SELECT * FROM threats ORDER BY timestamp DESC";
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

    public function displayDataThreats($aspect_type)
    {
//        var_dump($aspect_type); die();
        $query = "SELECT DISTINCT $aspect_type FROM threats WHERE $aspect_type IS NOT NULL";
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

    public function insertDataThreats($post)
    {
        $threat_name = $this->connection->real_escape_string($_POST['threat_name']);
        $threat_description = $this->connection->real_escape_string($_POST['threat_description']);
        $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        $architect = $this->connection->real_escape_string($_POST['architect']);
        $authprot = $this->connection->real_escape_string($_POST['authprot']);
        $netloc = $this->connection->real_escape_string($_POST['netloc']);
        $authfact = $this->connection->real_escape_string($_POST['authfact']);
        $sign = $this->connection->real_escape_string($_POST['sign']);
        $enc = $this->connection->real_escape_string($_POST['enc']);
        $userpriv = $this->connection->real_escape_string($_POST['userpriv']);
        $sl = $this->connection->real_escape_string($_POST['sl']);
        $m = $this->connection->real_escape_string($_POST['m']);
        $o = $this->connection->real_escape_string($_POST['o']);
        $s = $this->connection->real_escape_string($_POST['s']);
        $ed = $this->connection->real_escape_string($_POST['ed']);
        $ee = $this->connection->real_escape_string($_POST['ee']);
        $a = $this->connection->real_escape_string($_POST['a']);
        $ide = $this->connection->real_escape_string($_POST['ide']);
        $lc = $this->connection->real_escape_string($_POST['lc']);
        $li = $this->connection->real_escape_string($_POST['li']);
        $lav = $this->connection->real_escape_string($_POST['lav']);
        $lac = $this->connection->real_escape_string($_POST['lac']);
        $fd = $this->connection->real_escape_string($_POST['fd']);
        $rd = $this->connection->real_escape_string($_POST['rd']);
        $nc = $this->connection->real_escape_string($_POST['nc']);
        $pv = $this->connection->real_escape_string($_POST['pv']);

//        Vypocet priemerov pre lik a imp
        $likvalue = CalculationFunctions::calculateAverage($sl,$m,$o,$s,$ed,$ee,$a,$ide);
        $impvalue = CalculationFunctions::calculateAverage($lc,$li,$lav,$lac,$fd,$rd,$nc,$pv);

//        Vypocet rizika premennych
        list($liklevel, $implevel, $risklevel) = CalculationFunctions::calculateRiskLevel($likvalue,$impvalue);

        $liklevel = CalculationFunctions::getTranslatedName($liklevel);
        $implevel = CalculationFunctions::getTranslatedName($implevel);
        $risklevel = CalculationFunctions::getTranslatedName($risklevel);


        $query="INSERT INTO threats(threat_name,threat_description,dataclass,architect,authprot,netloc,authfact,sign,enc,userpriv,risklevel,liklevel,likvalue,implevel,impvalue,sl,m,o,s,ed,ee,a,ide,lc,li,lav,lac,fd,rd,nc,pv) VALUES('$threat_name','$threat_description','$dataclass','$architect','$authprot','$netloc','$authfact','$sign','$enc','$userpriv','$risklevel','$liklevel','$likvalue','$implevel','$impvalue','$sl','$m','$o','$s','$ed','$ee','$a','$ide','$lc','$li','$lav','$lac','$fd','$rd','$nc','$pv')";
        $sql = $this->connection->query($query);

        //$sql = $this->connection->query($query) or die(mysqli_error($this->con));
        if ($sql==true) {
            header("Location: index.php?page=threats&msg1=insert");

        }else{
            echo "Registration failed try again!";
        }
    }


    public function displayRecordByIdThreats($id)
    {
        $query = "SELECT * FROM threats WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
    }

    public function updateRecordThreats($postData)
    {
        $id = $this->connection->real_escape_string($_POST['id']);
        $threat_name = $this->connection->real_escape_string($_POST['uthreat_name']);
        $threat_description = $this->connection->real_escape_string($_POST['uthreat_description']);
        $dataclass = $this->connection->real_escape_string($_POST['udataclass']);
        $architect = $this->connection->real_escape_string($_POST['uarchitect']);
        $authprot = $this->connection->real_escape_string($_POST['uauthprot']);
        $netloc = $this->connection->real_escape_string($_POST['unetloc']);
        $authfact = $this->connection->real_escape_string($_POST['uauthfact']);
        $sign = $this->connection->real_escape_string($_POST['usign']);
        $enc = $this->connection->real_escape_string($_POST['uenc']);
        $userpriv = $this->connection->real_escape_string($_POST['uuserpriv']);

//        $lav = 0 ;
//        var_dump($lav); die();

        $sl = 0;
        if (!empty($_POST['usl'])) {
            $sl = $this->connection->real_escape_string($_POST['usl']);
        }

        $m = 0;
        if (!empty($_POST['um'])) {
            $m = $this->connection->real_escape_string($_POST['um']);
        }

        $o = 0;
        if (!empty($_POST['uo'])) {
            $o = $this->connection->real_escape_string($_POST['uo']);
        }

        $s = 0;
        if (!empty($_POST['us'])) {
            $s = $this->connection->real_escape_string($_POST['us']);
        }

        $ed = 0;
        if (!empty($_POST['ued'])) {
            $ed = $this->connection->real_escape_string($_POST['ued']);
        }

        $ee = 0;
        if (!empty($_POST['uee'])) {
            $ee = $this->connection->real_escape_string($_POST['uee']);
        }

        $a = 0;
        if (!empty($_POST['ua'])) {
            $a = $this->connection->real_escape_string($_POST['ua']);
        }

        $ide = 0;
        if (!empty($_POST['uide'])) {
            $ide = $this->connection->real_escape_string($_POST['uide']);
        }

        $lc = 0;
        if (!empty($_POST['ulc'])) {
            $lc = $this->connection->real_escape_string($_POST['ulc']);
        }

        $li = 0;
        if (!empty($_POST['uli'])) {
            $li = $this->connection->real_escape_string($_POST['uli']);
        }

        $lav = 0 ;
        if (!empty($_POST['ulav'])) {
            $lav = $this->connection->real_escape_string($_POST['ulav']);
        }

        $lac = 0 ;
        if (!empty($_POST['ulac'])) {
            $lac = $this->connection->real_escape_string($_POST['ulac']);
        }

        $fd = 0;
        if (!empty($_POST['ufd'])) {
            $fd = $this->connection->real_escape_string($_POST['ufd']);
        }

        $rd = 0;
        if (!empty($_POST['urd'])) {
            $rd = $this->connection->real_escape_string($_POST['urd']);
        }

        $nc = 0;
        if (!empty($_POST['unc'])) {
            $nc = $this->connection->real_escape_string($_POST['unc']);
        }

        $pv = 0;
        if (!empty($_POST['upv'])) {
            $pv = $this->connection->real_escape_string($_POST['upv']);
        }

//        var_dump($sl,$m,$o,$s,$ed,$ee,$a,$ide);
//        echo "<br>";
//        var_dump($lc,$li,$lav,$lac,$fd,$rd,$nc,$pv);

        var_dump($lav,$lac);
//        Vypocet priemerov pre lik a imp
        $likvalue = CalculationFunctions::calculateAverage($sl,$m,$o,$s,$ed,$ee,$a,$ide);
        $impvalue = CalculationFunctions::calculateAverage($lc,$li,$lav,$lac,$fd,$rd,$nc,$pv);

//        Vypocet rizika premennych
        list($liklevel, $implevel, $risklevel) = CalculationFunctions::calculateRiskLevel($likvalue,$impvalue);

        $liklevel = CalculationFunctions::getTranslatedName($liklevel);
        $implevel = CalculationFunctions::getTranslatedName($implevel);
        $risklevel = CalculationFunctions::getTranslatedName($risklevel);




        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE threats SET threat_name = '$threat_name', threat_description = '$threat_description', dataclass = '$dataclass', architect = '$architect', authprot = '$authprot', netloc = '$netloc', authfact = '$authfact', sign = '$sign', enc = '$enc', userpriv = '$userpriv', risklevel = '$risklevel', liklevel = '$liklevel', likvalue = '$likvalue', implevel = '$implevel', impvalue = '$impvalue', sl = '$sl', m = '$m', o = '$o', s = '$s', ed = '$ed', ee = '$ee', a = '$a', ide = '$ide', lc = '$lc', li = '$li', lav = '$lav', lac = '$lac', fd = '$fd', rd = '$rd', nc = '$nc', pv = '$pv'  WHERE id = '$id'";
            $sql = $this->connection->query($query);

            if ($sql==true) {
                header("Location: index.php?page=threats&msg2=update");
                var_dump($_POST); die();
            }else{
                echo "Registration updated failed try again!";
            }
        }

    }



    public function deleteRecordTh($id)
    {
        $query = "DELETE FROM threats WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql==true) {
            header("Location: index.php?page=threats&msg3=delete");
        }else{
            echo "Record does not delete try again";
        }
    }


    public static function getRiskColour($value) {
        if($value == "CRITICAL") return 'text-danger';
        if($value == "HIGH") return 'text-warning';
        if($value == "MEDIUM") return 'text-primary';
        if($value == "LOW") return 'text-success';
        if($value == "INFO") return 'text-dark';
    }

    public function displayThreatCount()
    {
        $query = "SELECT COUNT(id) AS count FROM threats";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            echo "Record not found";
        }
    }




}
?>
