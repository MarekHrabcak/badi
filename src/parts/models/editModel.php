<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

//Minimalna rola, ktora moze vidiet tuto stranku
if (!CoreFunctions::isGranted(CoreFunctions::ROLE_OPERATOR)) {
    CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
}

$wcsaFunctions = new WcsaFunctions($connection->getConnection());
$modelFunctions = new ModelFunctions($connection->getConnection());
$aspectFunctions = new AspectFunctions($connection->getConnection());
$factorFunctions = new FactorFunctions($connection->getConnection());

//var_dump($_GET);
// Edit wcsa record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $models = $modelFunctions->displayRecordByIdModels($editId);

}


?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit model</h1>
</div>

<h3>Edit model</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_EDIT_MODEL;?>" method="POST">
        <div class="form-group">
            <label for="model_name">Change model name:</label>
            <input type="text" class="form-control" name="umodel_name" value="<?php echo $models['model_name'];?>">
        </div>
        <div class="form-group">
            <label for="tmodel_description">Change model description:</label>
            <input type="text" class="form-control" name="umodel_description" value="<?php echo $models['model_description']; ?>">
        </div>

        <!--        Change aspects-->
        <div class="form-group">
            <label for="dataclass">Change data classification:</label>
            <select class="form-control"  name="udataclass">
                <option value="<?php echo $models['dataclass']; ?>"><?php echo $models['dataclass']; ?></option>
                <?php
                $wcsa_aspect = "dataclass";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="architect">Change architecture:</label>
            <select class="form-control"  name="uarchitect">
                <option value="<?php echo $models['architect']; ?>"><?php echo $models['architect']; ?></option>
                <?php
                $wcsa_aspect = "architect";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="authprot">Change authentication protocol:</label>
            <select class="form-control"  name="uauthprot">
                <option value="<?php echo $models['authprot']; ?>"><?php echo $models['authprot']; ?></option>
                <?php
                $wcsa_aspect = "authprot";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="netloc">Change network location:</label>
            <select class="form-control"  name="unetloc">
                <option value="<?php echo $models['netloc']; ?>"><?php echo $models['netloc']; ?></option>
                <?php
                $wcsa_aspect = "dataclass";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="authfact">Change authentication factors:</label>
            <select class="form-control"  name="uauthfact">
                <option value="<?php echo $models['authfact']; ?>"><?php echo $models['authfact']; ?></option>
                <?php
                $wcsa_aspect = "authfact";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sign">Change signing:</label>
            <select class="form-control"  name="usign">
                <option value="<?php echo $models['sign']; ?>"><?php echo $models['sign']; ?></option>
                <?php
                $wcsa_aspect = "sign";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="enc">Change encryption:</label>
            <select class="form-control"  name="uenc">
                <option value="<?php echo $models['enc']; ?>"><?php echo $models['enc']; ?></option>
                <?php
                $wcsa_aspect = "enc";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="userpriv">Change user privileges:</label>
            <select class="form-control"  name="uuserpriv">
                <option value="<?php echo $models['userpriv']; ?>"><?php echo $models['userpriv']; ?></option>
                <?php
                $wcsa_aspect = "dataclass";
                $wcsaItems = $wcsaFunctions->displayDataWcsas($wcsa_aspect);
                foreach($wcsaItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$wcsa_aspect]?>">
                        <?php echo $item[$wcsa_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <H2>Change factors</H2>

        <H3>Likelihood score</H3>
        <!--        Faktory-->
        <div class="form-group">
            <label for="sl">Skills required (SL):</label>
            <select class="form-control"  id="sl" name="usl" onchange="calculate()">
                <option value="<?php echo $models['sl']; ?>"><?php echo $models['sl']; ?></option>
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
                <option value="<?php echo $models['m']; ?>"><?php echo $models['m']; ?></option>
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
                <option value="<?php echo $models['o']; ?>"><?php echo $models['o']; ?></option>
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
                <option value="<?php echo $models['s']; ?>"><?php echo $models['s']; ?></option>
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
        <!-- VULNERABILITY FACTORS -->
        <h4 class="border-bottom" title="The next set of factors are related to the vulnerability involved. The goal here is to estimate the likelihood of the particular vulnerability involved being discovered and exploited. Assume the threat agent selected above.">Vulnerability Factors (VF)</h4>

        <div class="form-group">
            <label for="ed">Change Easy of Discovery (ED):</label>
            <select class="form-control"  id="ed" name="ued" onchange="calculate()">
                <option value="<?php echo $models['ed']; ?>"><?php echo $models['ed']; ?></option>
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
                <option value="<?php echo $models['ee']; ?>"><?php echo $models['ee']; ?></option>
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
            <select class="form-control" id="a" name="ua" onchange="calculate()">
                <option value="<?php echo $models['a']; ?>"><?php echo $models['a']; ?></option>
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
                <option value="<?php echo $models['ide']; ?>"><?php echo $models['ide']; ?></option>
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
        <!--            Impact factors-->
        <H3>Impact factors</H3>

        <!-- TECHNICAL IMPACT FACTORS -->
        <h4 class="border-bottom" title="Technical impact can be broken down into factors aligned with the traditional security areas of concern: confidentiality, integrity, availability, and accountability. The goal is to estimate the magnitude of the impact on the system if the vulnerability were to be exploited. ">Technical Impact Factors (TIF)</h4>

        <div class="form-group">
            <label for="lc">Change Loss of confidentiality (LC):</label>
            <select class="form-control"  id="lc" name="ulc" onchange="calculate()">
                <option value="<?php echo $models['lc']; ?>"><?php echo $models['lc']; ?></option>
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
            <select class="form-control" id="li" name="uli" onchange="calculate()">
                <option value="<?php echo $models['li']; ?>"><?php echo $models['li']; ?></option>
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
                <option value="<?php echo $models['lav']; ?>"><?php echo $models['lav']; ?></option>
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
                <option value="<?php echo $models['lac']; ?>"><?php echo $models['lac']; ?></option>
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
        <!-- BUSINESS IMPACT FACTORS -->
        <h4 class="border-bottom" title="The business impact stems from the technical impact, but requires a deep understanding of what is important to the company running the application. In general, you should be aiming to support your risks with business impact, particularly if your audience is executive level. The business risk is what justifies investment in fixing security problems.">Business Impact Factors (BIF)</h4>

        <div class="form-group">
            <label for="fd">Change Financial damage (FD):</label>
            <select class="form-control"  id="fd" name="ufd" onchange="calculate()">
                <option value="<?php echo $models['fd']; ?>"><?php echo $models['fd']; ?></option>
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
                <option value="<?php echo $models['rd']; ?>"><?php echo $models['rd']; ?></option>
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
                <option value="<?php echo $models['nc']; ?>"><?php echo $models['nc']; ?></option>
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
                <option value="<?php echo $models['pv']; ?>"><?php echo $models['pv']; ?></option>
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

        <div class="form-group">
<!--            Skryte parametre-->
            <input type="hidden" name="id" value="<?php echo $models['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="update">

        </div>
        <br><br>

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

        </div>





    </form>





<script src="/assets/dist/js/jquery.min.js"></script>
<script src="/assets/dist/js/Chart.min.js"></script>
<script src="/assets/dist/js/bootstrap.min.js"></script>
<script src="/assets/dist/js/sweetalert.min.js"></script>
<script src="/assets/dist/js/script.js"></script>

<!--1st Calculation -->
<script>$(document).ready(function () {
        calculate()
    } )</script>
