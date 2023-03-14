<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

//Minimalna rola, ktora moze vidiet tuto stranku
if (!CoreFunctions::isGranted(CoreFunctions::ROLE_OPERATOR)) {
    CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
}

$threatFunctions = new ThreatFunctions($connection->getConnection());
$modelFunctions = new ModelFunctions($connection->getConnection());
$aspectFunctions = new AspectFunctions($connection->getConnection());
$dreadFunctions = new DreadFunctions($connection->getConnection());

//var_dump($_GET);
// Edit threat record
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
                $threat_aspect = "dataclass";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "architect";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "authprot";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "dataclass";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "authfact";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "sign";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "enc";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
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
                $threat_aspect = "dataclass";
                $threatItems = $threatFunctions->displayDataThreats($threat_aspect);
                foreach($threatItems as $item)
                {
                    ?>
                    <option value="<?php echo $item[$threat_aspect]?>">
                        <?php echo $item[$threat_aspect]?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <H2>Change DREAD factors</H2>

        <H3>Likelihood score</H3>
        <!--        Faktory-->
        <div class="form-group">
            <label for="sl">Skills required (SL):</label>
            <select class="form-control"  id="sl" name="usl" onchange="calculate()">
                <option value="<?php echo $models['sl']; ?>"><?php echo $models['sl']; ?></option>
                <?php
                $dread_name = 'sl';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'm';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'o';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 's';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'ed';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'ee';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'a';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'ide';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'lc';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'li';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'lav';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'lac';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'fd';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'rd';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'nc';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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
                $dread_name = 'pv';
                $dreadItems = $dreadFunctions->getDreadItems($dread_name);
                foreach($dreadItems as $item)
                {
                    ?>
                    <option value="<?php echo $item['dread_level']?>">
                        <?php echo $item['dread_description']?>
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





<script src="/badi/assets/dist/js/jquery.min.js"></script>
<script src="/badi/assets/dist/js/Chart.min.js"></script>
<script src="/badi/assets/dist/js/bootstrap.min.js"></script>
<script src="/badi/assets/dist/js/sweetalert.min.js"></script>
<script src="/badi/assets/dist/js/script.js"></script>

<!--1st Calculation -->
<script>$(document).ready(function () {
        calculate()
    } )</script>
