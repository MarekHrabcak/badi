<?php

class RelationFunctions {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;

    }


//    relationS CRUD
    public function displayDataRelations()
    {
        $query = "SELECT * FROM relations ORDER BY timestamp DESC";
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

    public function displayListWcsasRelations()
    {
        $query = "SELECT * FROM wcsa WHERE wcsa_name != 'WCS' ORDER BY wcsa_name ASC";
        $result = $this->connection->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
                    var_dump($sql);
        }else{
            echo "No found records";
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

    public function deleteRecordRelation($id)
    {
        $query = "DELETE FROM relations WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?page=relations&msg3=delete");
        } else {
            echo "Record does not delete try again";
        }
    }



    public function relationAspects()
    {
        $relationAspects = array();

        $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        $architect = $this->connection->real_escape_string($_POST['architect']);

        $relationAspects = [$dataclass, $architect];

        return $relationAspects;
    }

//    relationS
    public function insertDataRelations($post)
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

        $dataclass = '';
        if (isset($_POST['dataclass'])) {
            $dataclass = $this->connection->real_escape_string($_POST['dataclass']);
        }

        $architect = '';
        if (isset($_POST['architect'])) {
            $architect = $this->connection->real_escape_string($_POST['architect']);
        }

        $netloc = '';
        if (isset($_POST['netloc'])) {
            $netloc = $this->connection->real_escape_string($_POST['netloc']);
        }

        $authfact = '';
        if (isset($_POST['authfact'])) {
            $authfact = $this->connection->real_escape_string($_POST['authfact']);
        }

        $sign = '';
        if (isset($_POST['sign'])) {
            $sign = $this->connection->real_escape_string($_POST['sign']);
        }

        $enc = '';
        if (isset($_POST['enc'])) {
            $enc = $this->connection->real_escape_string($_POST['enc']);
        }

        $userpriv = '';
        if (isset($_POST['userpriv'])) {
            $userpriv = $this->connection->real_escape_string($_POST['userpriv']);
        }

//        var_dump($model_name, $model_description, $dataclass, $architect, $netloc, $authfact, $sign, $enc, $userpriv);

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
                $sqlselect = '(' . implode(" OR ", $conditions) . ") OR (authprot='$type' AND wcsa_name='TMP0')";


            } else {
                $sqlselect = "authprot='$type' AND wcsa_name='TMP0'";
            }

//                        var_dump($sqlselect);


            $query = "SELECT 
                    MIN(sl) AS sl, MIN(m) AS m, MIN(o) AS o, MIN(s) AS s, 
                    MIN(ed) AS ed, MIN(ee) AS ee, MIN(a) AS a, MIN(ide) AS ide,
                    MIN(lc) AS lc, MIN(li) AS li, MIN(lav) AS lav, MIN(lac) AS lac,
                    MIN(fd) AS fd, MIN(rd) AS rd, MIN(nc) AS nc, MIN(pv) AS pv, MIN(a) AS a
                    FROM `wcsa` WHERE $sqlselect ";

//var_dump($query);

            $result = $this->connection->query($query);

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

                    //        Vypocet priemerov pre lik a imp
                    $likvalue = CalculationFunctions::calculateAverage($row['sl'],$row['m'],$row['o'],$row['s'],$row['ed'],$row['ee'],$row['a'],$row['ide']);
                    $impvalue = CalculationFunctions::calculateAverage($row['lc'],$row['li'],$row['lav'],$row['lac'],$row['fd'],$row['rd'],$row['nc'],$row['pv']);

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

    public function updateRecordRelationb($postData)
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

}

}