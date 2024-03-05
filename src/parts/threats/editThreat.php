<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

    // Include database file
    $threatFunctions = new ThreatFunctions($connection->getConnection());

    $aspectFunctions = new AspectFunctions($connection->getConnection());

    $dreadFunctions = new DreadFunctions($connection->getConnection());


    // Edit threat record
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
        $editId = $_GET['editId'];
        $threats = $threatFunctions->displayRecordByIdThreats($editId);
    }
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit threat</h1>
</div>

<h3>Edit threat</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_EDIT_THREAT; ?>" method="POST">
        <div class="form-group">
            <label for="threat_name">Change threat name:</label>
            <input type="text" class="form-control" name="uthreat_name" value="<?php echo $threats['threat_name']; ?>">
        </div>
        <div class="form-group">
            <label for="threat_description">Change threat description:</label>
            <input type="text" class="form-control" name="uthreat_description" value="<?php echo $threats['threat_description']; ?>">
        </div>

<!--        Change aspects-->
        <div class="form-group">
            <label for="dataclass">Change data classification level:</label>
            <select class="form-control"  name="udataclass">
                <option value="<?php echo $threats['dataclass']; ?>"><?php echo $threats['dataclass']; ?></option>
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
                <option value="<?php echo $threats['architect']; ?>"><?php echo $threats['architect']; ?></option>
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
                <option value="<?php echo $threats['authprot']; ?>"><?php echo $threats['authprot']; ?></option>
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
                <option value="<?php echo $threats['netloc']; ?>"><?php echo $threats['netloc']; ?></option>
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
                <option value="<?php echo $threats['authfact']; ?>"><?php echo $threats['authfact']; ?></option>
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
                <option value="<?php echo $threats['sign']; ?>"><?php echo $threats['sign']; ?></option>
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
                <option value="<?php echo $threats['enc']; ?>"><?php echo $threats['enc']; ?></option>
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
                <option value="<?php echo $threats['userpriv']; ?>"><?php echo $threats['userpriv']; ?></option>
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
                <option value="<?php echo $threats['risklevel']; ?>"><?php echo $threats['risklevel']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="liklevel">Existing likelihood level:</label>
            <select class="form-control"  name="uliklevel">
                <option value="<?php echo $threats['liklevel']; ?>"><?php echo $threats['liklevel']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="likvalue">Existing likelihood value:</label>
            <select class="form-control"  name="ulikvalue">
                <option value="<?php echo $threats['likvalue']; ?>"><?php echo $threats['likvalue']; ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="implevel">Existing impact level:</label>
            <select class="form-control"  name="uimplevel">
                <option value="<?php echo $threats['implevel']; ?>"><?php echo $threats['implevel']; ?></option>
            </select>
        </div>

        <div class="form-group">
            <label for="impvalue">Existing impact value:</label>
            <select class="form-control"  name="uimpvalue">
                <option value="<?php echo $threats['impvalue']; ?>"><?php echo $threats['impvalue']; ?></option>
            </select>
        </div>


<!--        Faktory-->
        <div class="form-group">
            <label for="sl">Skills required (SL):</label>
            <select class="form-control"  id="sl" name="usl" onchange="calculate()">
                <option value="<?php echo $threats['sl']; ?>"><?php echo $threats['sl']; ?></option>
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
                <option value="<?php echo $threats['m']; ?>"><?php echo $threats['m']; ?></option>
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
                <option value="<?php echo $threats['o']; ?>"><?php echo $threats['o']; ?></option>
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
                <option value="<?php echo $threats['s']; ?>"><?php echo $threats['s']; ?></option>
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

        <div class="form-group">
            <label for="ed">Change Easy of Discovery (ED):</label>
            <select class="form-control"  id="ed" name="ued" onchange="calculate()">
                <option value="<?php echo $threats['ed']; ?>"><?php echo $threats['ed']; ?></option>
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
                <option value="<?php echo $threats['ee']; ?>"><?php echo $threats['ee']; ?></option>
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
            <select class="form-control"  id="a" name="ua" onchange="calculate()">
                <option value="<?php echo $threats['a']; ?>"><?php echo $threats['a']; ?></option>
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
                <option value="<?php echo $threats['ide']; ?>"><?php echo $threats['ide']; ?></option>
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
        <div class="form-group">
            <label for="lc">Change Loss of confidentiality (LC):</label>
            <select class="form-control"  id="lc" name="ulc" onchange="calculate()">
                <option value="<?php echo $threats['lc']; ?>"><?php echo $threats['lc']; ?></option>
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
            <select class="form-control"  id="li" name="uli" onchange="calculate()">
                <option value="<?php echo $threats['li']; ?>"><?php echo $threats['li']; ?></option>
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
                <option value="<?php echo $threats['lav']; ?>"><?php echo $threats['lav']; ?></option>
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
                <option value="<?php echo $threats['lac']; ?>"><?php echo $threats['lac']; ?></option>
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

        <div class="form-group">
            <label for="fd">Change Financial damage (FD):</label>
            <select class="form-control"  id="fd" name="ufd" onchange="calculate()">
                <option value="<?php echo $threats['fd']; ?>"><?php echo $threats['fd']; ?></option>
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
                <option value="<?php echo $threats['rd']; ?>"><?php echo $threats['rd']; ?></option>
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
                <option value="<?php echo $threats['nc']; ?>"><?php echo $threats['nc']; ?></option>
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
                <option value="<?php echo $threats['pv']; ?>"><?php echo $threats['pv']; ?></option>
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
            <input type="hidden" name="id" value="<?php echo $threats['id']; ?>">
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
