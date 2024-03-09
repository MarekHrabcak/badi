<?php

class ModelFunctions {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }


//    MODELS CRUD
public function displayDataModels()
{
    $query = "SELECT * FROM models ORDER BY timestamp DESC";
    $result = $this->connection->query($query);
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        // No records found, return an empty array
        return array();
    }
}

    public function displayRecordByIdUsecase($id)
    {
        $query = "SELECT * FROM usecases WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function updateRecordUsecase($postData)
    {
        $actor = $this->connection->real_escape_string($_POST['uactor']);
        $authmech = $this->connection->real_escape_string($_POST['uauthmech']);
        $computer = $this->connection->real_escape_string($_POST['ucomputer']);
        $network = $this->connection->real_escape_string($_POST['unetwork']);
        $datatype = $this->connection->real_escape_string($_POST['udatatype']);
        $riskscore = $this->connection->real_escape_string($_POST['uriskscore']);
        $link = $this->connection->real_escape_string($_POST['ulink']);
        $authpattern = $this->connection->real_escape_string($_POST['uauthpattern']);
        $id = $this->connection->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE usecases SET actor = '$actor', authmech = '$authmech', computer = '$computer', network = '$network', datatype = '$datatype', riskscore = '$riskscore',link = '$link', authpattern = '$authpattern' WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                header("Location:http://localhost/badi/dashboard/index.php?msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }

    public function deleteRecordModel($id)
    {
        $query = "DELETE FROM models WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=models&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }



    public function modelAspects()
    {
        $modelAspects = array();

        $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        $architect = $this->connection->real_escape_string($_POST['architect']);

        $modelAspects = [$dataclass, $architect];

        return $modelAspects;
    }

//    MODELS
    public function insertDataModels($post)
    {
        $model_name = $this->connection->real_escape_string($_POST['model_name']);
        $model_description = $this->connection->real_escape_string($_POST['model_description']);
        $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        $architect = $this->connection->real_escape_string($_POST['architect']);
        $authprot = $this->connection->real_escape_string($_POST['type']);
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

        $risklevel = $this->connection->real_escape_string($_POST['risklevel']);
        $liklevel = $this->connection->real_escape_string($_POST['liklevel']);
        $likvalue = $this->connection->real_escape_string($_POST['likvalue']);
        $implevel = $this->connection->real_escape_string($_POST['implevel']);
        $impvalue = $this->connection->real_escape_string($_POST['impvalue']);


        $query = "INSERT INTO models(model_name,model_description,dataclass,architect,authprot,netloc,authfact,sign,enc,userpriv,risklevel,liklevel,likvalue,implevel,impvalue,sl,m,o,s,ed,ee,a,ide,lc,li,lav,lac,fd,rd,nc,pv) VALUES('$model_name','$model_description','$dataclass','$architect','$authprot','$netloc','$authfact','$sign','$enc','$userpriv','$risklevel','$liklevel','$likvalue','$implevel','$impvalue','$sl','$m','$o','$s','$ed','$ee','$a','$ide','$lc','$li','$lav','$lac','$fd','$rd','$nc','$pv')";
        $sql = $this->connection->query($query);
        // var_dump($sql);
        if ($sql == true) {
            header("Location: index.php?page=models&msg1=insert");
        } else {
            echo "Registration failed try again!";
        }
    }

    public function displayIDModels_temp()
    {
        $query = "SELECT ID FROM `models_temp` ORDER BY timestamp ASC LIMIT 1";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
//            $data = array();
//            while ($row = $result->fetch_assoc()) {
            $data = $result->fetch_assoc();
//                $data[] = $row;
            return $data;
        } else {
            echo "No found records";
        }
    }


    public function countFactorsAll()
    {
        $model_name = '';
        if (isset($_POST['model_name'])) {
            $model_name = $this->connection->real_escape_string($_POST['model_name']);
        }

        $model_description = '';
        if (isset($_POST['model_description'])) {
            $model_description = $this->connection->real_escape_string($_POST['model_description']);
        }

        $dataclass = '0';
        if (isset($_POST['dataclass']) && $_POST['dataclass'] !== '') {
            $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        }

        $architect = '0';
        if (isset($_POST['architect']) && $_POST['architect'] !== '') {
            $architect = $this->connection->real_escape_string($_POST['architect']);
        }

        $netloc = '0';
        if (isset($_POST['netloc']) && $_POST['netloc'] !== '') {
            $netloc = $this->connection->real_escape_string($_POST['netloc']);
        }

        $authfact = '0';
        if (isset($_POST['authfact']) && $_POST['authfact'] !== '') {
            $authfact = $this->connection->real_escape_string($_POST['authfact']);
        }

        $sign = '0';
        if (isset($_POST['sign']) && $_POST['sign'] !== '') {
            $sign = $this->connection->real_escape_string($_POST['sign']);
        }

        $enc = '0';
        if (isset($_POST['enc']) && $_POST['enc'] !== '') {
            $enc = $this->connection->real_escape_string($_POST['enc']);
        }

        $userpriv = '0';
        if (isset($_POST['userpriv']) && $_POST['userpriv'] !== '') {
            $userpriv = $this->connection->real_escape_string($_POST['userpriv']);
        }

    //    var_dump($model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv);
       

       $id_list = implode(',', [$dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv]);
    //    var_dump($id_list);



        $results = [];

        foreach ($this->getAuthprotTypes() as $type) {

            $conditions = [];

            if (!empty($dataclass)) {
                $conditions[] = "dataclass='$dataclass'";
            }

            if (!empty($architect)) {
                $conditions[] = "architect='$architect'";
            }

            if (!empty($netloc)) {
                $conditions[] = "netloc='$netloc'";
            }

            if (!empty($authfact)) {
                $conditions[] = "authfact='$authfact'";
            }

            if (!empty($sign)) {
                $conditions[] = "sign='$sign'";
            }

            if (!empty($enc)) {
                $conditions[] = "enc='$enc'";
            }

            if (!empty($userpriv)) {
                $conditions[] = "userpriv='$userpriv'";
            }
            
        
//            Priprava podmienky do SQL SELECT

            if (!empty($conditions)) {


//                $conditions[] = 0;
//                $conditions[] = "authprot='$type'";
//                V podmienke implode(" OR ", $conditions) by sa zisla namiesto OR lepsi operator alebo funkcia, pre ADN nefunguje MIN() v Selecte
//                Tento SELECT celkom funguje
//                 WHERE
//                ((dataclass='Prísne chránené' OR enc='AES' OR authfact='2FA') AND authprot='http basic authentication')
//                OR
//                (authprot='http basic authentication' AND factor_name='TMP0')
//
//                Stara skoro funkcna querinka
//                $sqlselect = '(' . implode(" OR ", $conditions) . ") OR (authprot='$type' AND factor_name='TMP0')";

//                Dalsi skoro dobry pokus, vnasa ale do podmienky authprot=authprot...
//                $sqlselect = '((' . implode(" OR ", $conditions) . ") AND authprot='$type') OR (authprot='$type' AND factor_name='TMP0')";

//Tato podmienka funguje pre vazby authprot+aspekt
//                $sqlselect = '((' . implode(" OR ", $conditions) . ") AND authprot='$type') OR (authprot='$type' AND factor_name='TMP0')";

//       31.3.2022 Tato podmienka len spocita minimum, nema ziadnu vazbu na aspekt
                // $sqlselect = '(' . implode(" OR ", $conditions) . ") OR (authprot='$type' AND wcsa_name='TMP0')";
               
                // $id_list = $conditions;



            } else {
            //    var_dump($conditions);
            }

//                        var_dump($sqlselect);


            // $query = "SELECT 
            //         MIN(sl) AS sl, MIN(m) AS m, MIN(o) AS o, MIN(s) AS s, 
            //         MIN(ed) AS ed, MIN(ee) AS ee, MIN(a) AS a, MIN(ide) AS ide,
            //         MIN(lc) AS lc, MIN(li) AS li, MIN(lav) AS lav, MIN(lac) AS lac,
            //         MIN(fd) AS fd, MIN(rd) AS rd, MIN(nc) AS nc, MIN(pv) AS pv, MIN(a) AS a
            //         FROM `wcsa` WHERE $sqlselect ";


            $query ="SELECT 
                        COALESCE(MIN(my_sl), 0) AS min_sl,
                        COALESCE(MIN(my_m), 0) AS min_m,
                        COALESCE(MIN(my_o), 0) AS min_o,
                        COALESCE(MIN(my_s), 0) AS min_s,
                        COALESCE(MIN(my_ed), 0) AS min_ed,
                        COALESCE(MIN(my_ee), 0) AS min_ee,
                        COALESCE(MIN(my_a), 0) AS min_a,
                        COALESCE(MIN(my_ide), 0) AS min_ide,
                        COALESCE(MIN(my_lc), 0) AS min_lc, 
                        COALESCE(MIN(my_li), 0) AS min_li, 
                        COALESCE(MIN(my_lav), 0) AS min_lav, 
                        COALESCE(MIN(my_lac), 0) AS min_lac,
                        COALESCE(MIN(my_fd), 0) AS min_fd, 
                        COALESCE(MIN(my_rd), 0) AS min_rd, 
                        COALESCE(MIN(my_nc), 0) AS min_nc, 
                        COALESCE(MIN(my_pv), 0) AS min_pv
                    FROM (
                            SELECT 
                                sl AS my_sl,
                                m AS my_m,
                                o AS my_o,
                                s AS my_s,
                                ed AS my_ed,
                                ee AS my_ee,
                                a AS my_a,
                                ide AS my_ide,
                                lc AS my_lc,
                                li AS my_li,
                                lav AS my_lav,
                                lac AS my_lac,
                                fd AS my_fd,
                                rd AS my_rd,
                                nc AS my_nc,
                                pv AS my_pv
                            FROM `wcsa` 
                        WHERE id IN ($id_list)
                    ) as my_values;";
// var_dump($query);

            $result = $this->connection->query($query);

            // Fetch the row
            // $row = $result->fetch_assoc();

            // Output the overall average
            // -- echo "Overall Average: " . $row['overall_average'];


            if ($result->num_rows > 0) {
                $data2 = array();
                while ($row = $result->fetch_assoc()) {
                    $row['type'] = $type;
                    $row['model_name'] = $model_name;
                    $row['model_description'] = $model_description;
                    $row['dataclass'] = $dataclass;
                    $row['architect'] = $architect;
                    $row['netloc'] = $netloc;
                    $row['authfact'] = $authfact;
                    $row['sign'] = $sign;
                    $row['enc'] = $enc;
                    $row['userpriv'] = $userpriv;
                    // var_dump($type, $model_name,$model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv);
                    

                    //        Vypocet priemerov pre lik a imp
                    $likvalue = CalculationFunctions::calculateAverage($row['min_sl'],$row['min_m'],$row['min_o'],$row['min_s'],$row['min_ed'],$row['min_ee'],$row['min_a'],$row['min_ide']);
                    $impvalue = CalculationFunctions::calculateAverage($row['min_lc'],$row['min_li'],$row['min_lav'],$row['min_lac'],$row['min_fd'],$row['min_rd'],$row['min_nc'],$row['min_pv']);

                    //        Vypocet rizika premennych
                    list($liklevel, $implevel, $risklevel) = CalculationFunctions::calculateRiskLevel($likvalue,$impvalue);

                    $liklevel = CalculationFunctions::getTranslatedName($liklevel);
                    $implevel = CalculationFunctions::getTranslatedName($implevel);
                    $risklevel = CalculationFunctions::getTranslatedName($risklevel);

                    $row['likvalue'] = $likvalue;
                    $row['liklevel'] = $liklevel;
                    $row['impvalue'] = $impvalue;
                    $row['implevel'] = $implevel;
                    $row['risklevel'] = $risklevel;

//                    var_dump($liklevel, $likvalue, $implevel, $impvalue);

                    $data2[] = $row;
                }
                $results[] = $data2;


            } else {
                echo "No found records";
            }
        }


        return $results;



    }



    public function getAuthprotTypes()
    {
        $query = "SELECT authprot FROM wcsa WHERE authprot IS NOT NULL GROUP BY authprot";
        $result = $this->connection->query($query);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {

                $data[] = $row['authprot'];
            }
            return $data;
        } else {
            return [];
        }
    }


    public function displayRecordByIdModels($id)
    {
        $query = "SELECT * FROM models WHERE id = '$id'";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    public function displayModelValues($model_type)
    {
        $query = "SELECT * FROM models WHERE model_type = '$model_type'";
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

    //    factor factors
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
        } else {
            echo "No found records";
        }
    }

    public function updateRecordModels($postData)
    {

        $id = $this->connection->real_escape_string($_POST['id']);
        $model_name = $this->connection->real_escape_string($_POST['umodel_name']);
        $model_description = $this->connection->real_escape_string($_POST['umodel_description']);
        $dataclass = $this->connection->real_escape_string($_POST['udataclass']);
        $architect = $this->connection->real_escape_string($_POST['uarchitect']);
        $authprot = $this->connection->real_escape_string($_POST['uauthprot']);
        $netloc = $this->connection->real_escape_string($_POST['unetloc']);
        $authfact = $this->connection->real_escape_string($_POST['uauthfact']);
        $sign = $this->connection->real_escape_string($_POST['usign']);
        $enc = $this->connection->real_escape_string($_POST['uenc']);
        $userpriv = $this->connection->real_escape_string($_POST['uuserpriv']);

        $sl = $this->connection->real_escape_string($_POST['usl']);
        $m = $this->connection->real_escape_string($_POST['um']);
        $o = $this->connection->real_escape_string($_POST['uo']);
        $s = $this->connection->real_escape_string($_POST['us']);
        $ed = $this->connection->real_escape_string($_POST['ued']);
        $ee = $this->connection->real_escape_string($_POST['uee']);
        $a = $this->connection->real_escape_string($_POST['ua']);
        $ide = $this->connection->real_escape_string($_POST['uide']);
        $lc = $this->connection->real_escape_string($_POST['ulc']);
        $li = $this->connection->real_escape_string($_POST['uli']);
        $lav = $this->connection->real_escape_string($_POST['ulav']);
        $lac = $this->connection->real_escape_string($_POST['ulac']);
        $fd = $this->connection->real_escape_string($_POST['ufd']);
        $rd = $this->connection->real_escape_string($_POST['urd']);
        $nc = $this->connection->real_escape_string($_POST['unc']);
        $pv = $this->connection->real_escape_string($_POST['upv']);

        //        Vypocet priemerov pre lik a imp
        $likvalue = CalculationFunctions::calculateAverage($sl,$m,$o,$s,$ed,$ee,$a,$ide);
        $impvalue = CalculationFunctions::calculateAverage($lc,$li,$lav,$lac,$fd,$rd,$nc,$pv);

//        Vypocet rizika premennych
        list($liklevel, $implevel, $risklevel) = CalculationFunctions::calculateRiskLevel($likvalue,$impvalue);

        $liklevel = CalculationFunctions::getTranslatedName($liklevel);
        $implevel = CalculationFunctions::getTranslatedName($implevel);
        $risklevel = CalculationFunctions::getTranslatedName($risklevel);

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE models SET model_name = '$model_name', model_description = '$model_description', dataclass = '$dataclass', architect = '$architect', authprot = '$authprot', netloc = '$netloc', authfact = '$authfact', sign = '$sign', enc = '$enc', userpriv = '$userpriv', risklevel = '$risklevel', liklevel = '$liklevel', likvalue = '$likvalue', implevel = '$implevel', impvalue = '$impvalue', sl = '$sl', m = '$m', o = '$o', s = '$s', ed = '$ed', ee = '$ee', a = '$a', ide = '$ide', lc = '$lc', li = '$li', lav = '$lav', lac = '$lac', fd = '$fd', rd = '$rd', nc = '$nc', pv = '$pv'  WHERE id = '$id'";
            $sql = $this->connection->query($query);
            if ($sql == true) {
                header("Location: index.php?page=models&msg2=update");
            } else {
                echo "Registration updated failed try again!";
            }
        }

    }

    public static function getRiskColour($value) {
        if($value == "CRITICAL") return 'text-danger';
        if($value == "HIGH") return 'text-warning';
        if($value == "MEDIUM") return 'text-primary';
        if($value == "LOW") return 'text-success';
        if($value == "INFO") return 'text-dark';
    }

    public function displayModelCount()
    {
        $query = "SELECT COUNT(id) AS count FROM models";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['count'];
        } else {
            echo "Record not found";
        }
    }

    public function displayWcsasNames($wcsa_name)
    {
        $query = "SELECT * FROM wcsa WHERE 'dataclass' != '0';";
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


    function calculateOverallAverage($id_list) {

        // Prepare the SQL statement with placeholders
        $query = "
        SELECT 
            (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
        FROM (
            SELECT 
                MIN(my_sl) AS min_sl,
                MIN(my_m) AS min_m,
                MIN(my_o) AS min_o,
                MIN(my_s) AS min_s,
                MIN(my_ed) AS min_ed,
                MIN(my_ee) AS min_ee,
                MIN(my_a) AS min_a,
                MIN(my_ide) AS min_ide
            FROM (
                SELECT 
                    sl AS my_sl,
                    m AS my_m,
                    o AS my_o,
                    s AS my_s,
                    ed AS my_ed,
                    ee AS my_ee,
                    a AS my_a,
                    ide AS my_ide
                FROM `wcsa` 
                WHERE FIND_IN_SET(id, :id_list) > 0
            ) AS my_values
        ) AS myOutput;
        ";

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


    function calculateOverallAverage2($model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv) {
        
    
        // Prepare the SQL statement with placeholders
        $query = "SELECT 
            (COALESCE(min_sl, 0) + COALESCE(min_m, 0) + COALESCE(min_o, 0) + COALESCE(min_s, 0) + COALESCE(min_ed, 0) + COALESCE(min_ee, 0) + COALESCE(min_a, 0) + COALESCE(min_ide, 0)) / 8 AS overall_average
        FROM (
            SELECT 
                MIN(my_sl) AS min_sl,
                MIN(my_m) AS min_m,
                MIN(my_o) AS min_o,
                MIN(my_s) AS min_s,
                MIN(my_ed) AS min_ed,
                MIN(my_ee) AS min_ee,
                MIN(my_a) AS min_a,
                MIN(my_ide) AS min_ide
            FROM (
                SELECT 
                    sl AS my_sl,
                    m AS my_m,
                    o AS my_o,
                    s AS my_s,
                    ed AS my_ed,
                    ee AS my_ee,
                    a AS my_a,
                    ide AS my_ide
                FROM `wcsa` 
                WHERE FIND_IN_SET(id, :id_list) > 0
            ) AS my_values
        ) AS myOutput;
        ";

        // Establish a connection to the database
        $pdo = $this->connection->query($query);
       
    
        // Prepare the statement
        $stmt = $pdo->prepare($query);
    
        // Bind the parameter
        $stmt->bindParam(':id_list', $id_list);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Close the connection
        $pdo = null;
    
        // Return the overall average
        return $result['overall_average'];
    }




}

