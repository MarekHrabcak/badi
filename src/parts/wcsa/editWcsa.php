<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

    // Include database file
    $wcsaFunctions = new WcsaFunctions($connection->getConnection());

    $aspectFunctions = new AspectFunctions($connection->getConnection());

    $factorFunctions = new FactorFunctions($connection->getConnection());


    // Edit wcsa record
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $wcsas = $wcsaFunctions->displayRecordByIdWcsas($editId);
    }
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit WCS</h1>
</div>

<h3>Edit WCS</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_EDIT_WCSA; ?>" method="POST">
        <div class="form-group">
            <label for="wcsa_name">Change WCS name:</label>
            <input type="text" class="form-control" name="uwcsa_name" value="<?php echo $wcsas['wcsa_name']; ?>">
        </div>
        <div class="form-group">
            <label for="wcsa_description">Change WCS description:</label>
            <input type="text" class="form-control" name="uwcsa_description" value="<?php echo $wcsas['wcsa_description']; ?>">
        </div>

<!--        Change aspects-->
        <div class="form-group">
            <label for="dataclass">Change data classification level:</label>
            <select class="form-control"  name="udataclass">
                <option value="<?php echo $wcsas['dataclass']; ?>"><?php echo $wcsas['dataclass']; ?></option>
                <?php
                $aspect_type = "dataclass";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="architect">Change architecture:</label>
            <select class="form-control"  name="uarchitect">
                <option value="<?php echo $wcsas['architect']; ?>"><?php echo $wcsas['architect']; ?></option>
                <?php
                $aspect_type = "architect";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="authprot">Change authentication protocol:</label>
            <select class="form-control"  name="uauthprot">
                <option value="<?php echo $wcsas['authprot']; ?>"><?php echo $wcsas['authprot']; ?></option>
                <?php
                $aspect_type = "authprot";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="netloc">Change network location:</label>
            <select class="form-control"  name="unetloc">
                <option value="<?php echo $wcsas['netloc']; ?>"><?php echo $wcsas['netloc']; ?></option>
                <?php
                $aspect_type = "netloc";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="authfact">Change authentication factors:</label>
            <select class="form-control"  name="uauthfact">
                <option value="<?php echo $wcsas['authfact']; ?>"><?php echo $wcsas['authfact']; ?></option>
                <?php
                $aspect_type = "authfact";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sign">Change signing:</label>
            <select class="form-control"  name="usign">
                <option value="<?php echo $wcsas['sign']; ?>"><?php echo $wcsas['sign']; ?></option>
                <?php
                $aspect_type = "sign";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="enc">Change encryption:</label>
            <select class="form-control"  name="uenc">
                <option value="<?php echo $wcsas['enc']; ?>"><?php echo $wcsas['enc']; ?></option>
                <?php
                $aspect_type = "enc";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="userpriv">Change privilege level:</label>
            <select class="form-control"  name="uuserpriv">
                <option value="<?php echo $wcsas['userpriv']; ?>"><?php echo $wcsas['userpriv']; ?></option>
                <?php
                $aspect_type = "userpriv";
                $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                foreach($aspectnameItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['aspect_value']?>">
                        <?php echo $item['aspect_value']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="risklevel">Existing risk level:</label>
            <select class="form-control"  name="urisklevel">
                <option value="<?php echo $wcsas['risklevel']; ?>"><?php echo $wcsas['risklevel']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="liklevel">Existing likelihood level:</label>
            <select class="form-control"  name="uliklevel">
                <option value="<?php echo $wcsas['liklevel']; ?>"><?php echo $wcsas['liklevel']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="likvalue">Existing likelihood value:</label>
            <select class="form-control"  name="ulikvalue">
                <option value="<?php echo $wcsas['likvalue']; ?>"><?php echo $wcsas['likvalue']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="implevel">Existing impact level:</label>
            <select class="form-control"  name="uimplevel">
                <option value="<?php echo $wcsas['implevel']; ?>"><?php echo $wcsas['implevel']; ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="impvalue">Existing impact value:</label>
            <select class="form-control"  name="uimpvalue">
                <option value="<?php echo $wcsas['impvalue']; ?>"><?php echo $wcsas['impvalue']; ?></option>
            </select>
        </div>


<!--        Faktory-->
        <div class="form-group">
            <label for="sl">Skills required (SL):</label>
            <select class="form-control"  id="sl" name="usl" onchange="calculate()">
                <option value="<?php echo $wcsas['sl']; ?>"><?php echo $wcsas['sl']; ?></option>
                <?php
                $factor_name = 'sl';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="m">Change Motive (M):</label>
            <select class="form-control"  id="m" name="um" onchange="calculate()">
                <option value="<?php echo $wcsas['m']; ?>"><?php echo $wcsas['m']; ?></option>
                <?php
                $factor_name = 'm';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="o">Change Opportunity (O):</label>
            <select class="form-control"  id="o" name="uo" onchange="calculate()">
                <option value="<?php echo $wcsas['o']; ?>"><?php echo $wcsas['o']; ?></option>
                <?php
                $factor_name = 'o';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="s">Change Population Size (S):</label>
            <select class="form-control"  id="s" name="us" onchange="calculate()">
                <option value="<?php echo $wcsas['s']; ?>"><?php echo $wcsas['s']; ?></option>
                <?php
                $factor_name = 's';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ed">Change Easy of Discovery (ED):</label>
            <select class="form-control"  id="ed" name="ued" onchange="calculate()">
                <option value="<?php echo $wcsas['ed']; ?>"><?php echo $wcsas['ed']; ?></option>
                <?php
                $factor_name = 'ed';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ee">Change Ease of Exploit (EE):</label>
            <select class="form-control"  id="ee" name="uee" onchange="calculate()">
                <option value="<?php echo $wcsas['ee']; ?>"><?php echo $wcsas['ee']; ?></option>
                <?php
                $factor_name = 'ee';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="a">Change Awareness (A):</label>
            <select class="form-control"  id="a" name="ua" onchange="calculate()">
                <option value="<?php echo $wcsas['a']; ?>"><?php echo $wcsas['a']; ?></option>
                <?php
                $factor_name = 'a';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ide">Change Intrusion Detection (ID):</label>
            <select class="form-control"  id="ide" name="uide" onchange="calculate()">
                <option value="<?php echo $wcsas['ide']; ?>"><?php echo $wcsas['ide']; ?></option>
                <?php
                $factor_name = 'ide';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lc">Change Loss of confidentiality (LC):</label>
            <select class="form-control"  id="lc" name="ulc" onchange="calculate()">
                <option value="<?php echo $wcsas['lc']; ?>"><?php echo $wcsas['lc']; ?></option>
                <?php
                $factor_name = 'lc';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="li">Change Loss of Integrity (LI):</label>
            <select class="form-control"  id="li" name="uli" onchange="calculate()">
                <option value="<?php echo $wcsas['li']; ?>"><?php echo $wcsas['li']; ?></option>
                <?php
                $factor_name = 'li';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lav">Change Loss of Availability (LAV):</label>
            <select class="form-control"  id="lav" name="ulav" onchange="calculate()">
                <option value="<?php echo $wcsas['lav']; ?>"><?php echo $wcsas['lav']; ?></option>
                <?php
                $factor_name = 'lav';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="lac">Change Loss of Accountability (LAC):</label>
            <select class="form-control"  id="lac" name="ulac" onchange="calculate()">
                <option value="<?php echo $wcsas['lac']; ?>"><?php echo $wcsas['lac']; ?></option>
                <?php
                $factor_name = 'lac';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="fd">Change Financial damage (FD):</label>
            <select class="form-control"  id="fd" name="ufd" onchange="calculate()">
                <option value="<?php echo $wcsas['fd']; ?>"><?php echo $wcsas['fd']; ?></option>
                <?php
                $factor_name = 'fd';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="rd">Change Reputation damage (RD):</label>
            <select class="form-control"  id="rd" name="urd" onchange="calculate()">
                <option value="<?php echo $wcsas['rd']; ?>"><?php echo $wcsas['rd']; ?></option>
                <?php
                $factor_name = 'rd';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nc">Change Non-Compliance (NC):</label>
            <select class="form-control"  id="nc" name="unc" onchange="calculate()">
                <option value="<?php echo $wcsas['nc']; ?>"><?php echo $wcsas['nc']; ?></option>
                <?php
                $factor_name = 'nc';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="pv">Change Privacy violation (PV):</label>
            <select class="form-control"  id="pv" name="upv" onchange="calculate()">
                <option value="<?php echo $wcsas['pv']; ?>"><?php echo $wcsas['pv']; ?></option>
                <?php
                $factor_name = 'pv';
                $factorItems = $factorFunctions->getFactorItems($factor_name);
                foreach($factorItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['factor_level']?>">
                        <?php echo $item['factor_description']?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>



        <!--            Vypocty-->
        <!-- THIRD -->
        <div >
            <!-- LIKELIHOOD SCORE -->
            <section>
                <h3 class="border-bottom">Likelihood score</h3>
                <h4 class="LS nomargin">0</h4>
            </section>
            <!-- IMPACT SCORE -->
            <section>
                <h3 class="border-bottom">Impact score</h3>
                <h4 class="IS nomargin">0 </h4>
            </section>
            <section>
                <h3 class="border-bottom">Risk score</h3>
                <h4 class="risk RS">0 </h4>
            </section>
            <br><br>

            <!--            CHART-->
            <section>
                <canvas class="riskChart" id="riskChart" height="150"></canvas>
            </section>
        </div>





        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $wcsas['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
        </div>

    </form>


<script src="/badi/assets/dist/js/jquery.min.js"></script>
<script src="/badi/assets/dist/js/Chart.min.js"></script>
<script src="/badi/assets/dist/js/bootstrap.min.js"></script>
<script src="/badi/assets/dist/js/sweetalert.min.js"></script>
<script src="/badi/assets/dist/js/script.js"></script>

<!--1st Calculation -->
<script>$(document).ready(function () {
        calculate()
    } )</script>
