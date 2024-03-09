<?php

class WcsaFunctions

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
            header("Location:http://localhost/badi/dashboard/wcsas.php?msg1=insert");
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



    //    wcsaS CRUD
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


    public function displayListWcsas()
    {
        $query = "SELECT * FROM wcsa ORDER BY wcsa_name ASC";
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

    public function displayDataWcsas($aspect_type)
    {

        $query = "SELECT DISTINCT $aspect_type FROM wcsa WHERE $aspect_type IS NOT NULL AND $aspect_type != 0";
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                // var_dump($data); die();
            }

            return $data;


        } else {
            echo "No found records";
        }
    }

    public function displayWcsaName($aspect_type)
    {
        $query = "SELECT * FROM wcsa WHERE '$aspect_type' IS NOT NULL";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                                // var_dump($data); die();
            }
            return $data;
        }else{
            echo "No found records";
        }
    }

    // addModel function that finds unique dataclass WCS's
    public function displayDataclassWcsa()
    {
        $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'dc(%'
                AND dataclass IS NOT NULL AND dataclass <> ''
                AND id IN (
                    SELECT MIN(id)
                    FROM wcsa
                    WHERE wcsa_name LIKE 'dc(%'
                    AND dataclass IS NOT NULL AND dataclass <> ''
                    GROUP BY dataclass
                );";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
                                // var_dump($data); die();
            }
            return $data;
        }else{
            echo "No found records";
        }
    }


        // addModel function that finds unique architect WCS's
        public function displayArchitectWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'arch(%'
                    AND architect IS NOT NULL AND architect <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'arch(%'
                        AND architect IS NOT NULL AND architect <> ''
                        GROUP BY architect
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }
    


        // addModel function that finds unique authprotocols WCS's
        public function displayAuthprotWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'authprot(%'
                    AND authprot IS NOT NULL AND authprot <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'authprot(%'
                        AND authprot IS NOT NULL AND authprot <> ''
                        GROUP BY authprot
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }
    

        // addModel function that finds unique netloc WCS's
        public function displayNetlocWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'netloc(%'
                    AND netloc IS NOT NULL AND netloc <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'netloc(%'
                        AND netloc IS NOT NULL AND netloc <> ''
                        GROUP BY netloc
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }



        // addModel function that finds unique Authfact WCS's
        public function displayAuthfactWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'authfact(%'
                    AND authfact IS NOT NULL AND authfact <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'authfact(%'
                        AND authfact IS NOT NULL AND authfact <> ''
                        GROUP BY authfact
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }


        // addModel function that finds unique Sign WCS's
        public function displaySignWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'sign(%'
                    AND sign IS NOT NULL AND sign <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'sign(%'
                        AND sign IS NOT NULL AND sign <> ''
                        GROUP BY sign
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }


        // addModel function that finds unique ENC WCS's
        public function displayEncWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'enc(%'
                    AND enc IS NOT NULL AND enc <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'enc(%'
                        AND enc IS NOT NULL AND enc <> ''
                        GROUP BY enc
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }



        // addModel function that finds unique UserPriv WCS's
        public function displayUserprivWcsa()
        {
            $query = "SELECT * FROM wcsa WHERE wcsa_name LIKE 'userpriv(%'
                    AND userpriv IS NOT NULL AND userpriv <> ''
                    AND id IN (
                        SELECT MIN(id)
                        FROM wcsa
                        WHERE wcsa_name LIKE 'userpriv(%'
                        AND userpriv IS NOT NULL AND userpriv <> ''
                        GROUP BY userpriv
                    );";
            $result = $this->connection->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                                    // var_dump($data); die();
                }
                return $data;
            }else{
                echo "No found records";
            }
        }


    public function insertDataWcsas($post)
    {
        $wcsa_name = $this->connection->real_escape_string($_POST['wcsa_name']);
        $wcsa_description = $this->connection->real_escape_string($_POST['wcsa_description']);
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


        $query="INSERT INTO wcsa(wcsa_name,wcsa_description,dataclass,architect,authprot,netloc,authfact,sign,enc,userpriv,risklevel,liklevel,likvalue,implevel,impvalue,sl,m,o,s,ed,ee,a,ide,lc,li,lav,lac,fd,rd,nc,pv) VALUES('$wcsa_name','$wcsa_description','$dataclass','$architect','$authprot','$netloc','$authfact','$sign','$enc','$userpriv','$risklevel','$liklevel','$likvalue','$implevel','$impvalue','$sl','$m','$o','$s','$ed','$ee','$a','$ide','$lc','$li','$lav','$lac','$fd','$rd','$nc','$pv')";
        $sql = $this->connection->query($query);

        //$sql = $this->connection->query($query) or die(mysqli_error($this->con));
        if ($sql==true) {
            header("Location: index.php?page=wcsas&msg1=insert");

        }else{
            echo "Registration failed try again!";
        }
    }


    public function displayRecordByIdWcsas($id)
    {
        $query = "SELECT * FROM wcsa WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }else{
            echo "Record not found";
        }
    }

    public function updateRecordWcsas($postData)
    {
        $id = $this->connection->real_escape_string($_POST['id']);
        $wcsa_name = $this->connection->real_escape_string($_POST['uwcsa_name']);
        $wcsa_description = $this->connection->real_escape_string($_POST['uwcsa_description']);
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

        // var_dump($lav,$lac);
//        Vypocet priemerov pre lik a imp
        $likvalue = CalculationFunctions::calculateAverage($sl,$m,$o,$s,$ed,$ee,$a,$ide);
        $impvalue = CalculationFunctions::calculateAverage($lc,$li,$lav,$lac,$fd,$rd,$nc,$pv);

//        Vypocet rizika premennych
        list($liklevel, $implevel, $risklevel) = CalculationFunctions::calculateRiskLevel($likvalue,$impvalue);

        $liklevel = CalculationFunctions::getTranslatedName($liklevel);
        $implevel = CalculationFunctions::getTranslatedName($implevel);
        $risklevel = CalculationFunctions::getTranslatedName($risklevel);




        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE wcsa SET wcsa_name = '$wcsa_name', wcsa_description = '$wcsa_description', dataclass = '$dataclass', architect = '$architect', authprot = '$authprot', netloc = '$netloc', authfact = '$authfact', sign = '$sign', enc = '$enc', userpriv = '$userpriv', risklevel = '$risklevel', liklevel = '$liklevel', likvalue = '$likvalue', implevel = '$implevel', impvalue = '$impvalue', sl = '$sl', m = '$m', o = '$o', s = '$s', ed = '$ed', ee = '$ee', a = '$a', ide = '$ide', lc = '$lc', li = '$li', lav = '$lav', lac = '$lac', fd = '$fd', rd = '$rd', nc = '$nc', pv = '$pv'  WHERE id = '$id'";
            $sql = $this->connection->query($query);

            if ($sql==true) {
                header("Location: index.php?page=wcsas&msg2=update");
                // var_dump($_POST); die();
            }else{
                echo "Registration updated failed try again!";
            }
        }

    }



    public function deleteRecordTh($id)
    {
        $query = "DELETE FROM wcsa WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql==true) {
            header("Location: index.php?page=wcsas&msg3=delete");
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

    public function displayWcsaCount()
    {
        $query = "SELECT COUNT(id) AS count FROM wcsa";
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
