<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}


$threatFunctions = new ThreatFunctions($connection->getConnection());

$aspectFunctions = new AspectFunctions($connection->getConnection());

$dreadFunctions = new DreadFunctions($connection->getConnection());


?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Threats</h1>
</div>

<h3>Add new threat</h3>

<!--Formular-->

        <form action="<?php echo CoreFunctions::ACTION_ADD_THREAT; ?>" method="POST">

            <div class="form-group">
            <label for="threat_name">Type threat name:</label>
            <input type="text" class="form-control" name="threat_name" placeholder="Name" >
            </div>

            <div class="form-group">
                <label for="threat_description">Type threat description:</label>
                <input type="text" class="form-control" name="threat_description" placeholder="Description" >
            </div>

            <!--Aspect list-->
            <div class="form-group">
                <label for="authprot">Select authentication protocol:</label>
                <select class="form-control"  name="authprot" required>
                    <option value=""></option>
                    <?php
                    $aspect_type = "authprot";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="dataclass">Select data classification level:</label>
                <select class="form-control"  name="dataclass">
                    <option value=""></option>
                    <?php
                    $aspect_type = "dataclass";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="architect">Select architecture:</label>
                <select class="form-control"  name="architect">
                    <option value=""></option>
                    <?php
                    $aspect_type = "architect";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="netloc">Select network location:</label>
                <select class="form-control"  name="netloc">
                    <option value=""></option>
                    <?php
                    $aspect_type = "netloc";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="authfact">Select number of authentication factors:</label>
                <select class="form-control"  name="authfact">
                    <option value=""></option>
                    <?php
                    $aspect_type = "authfact";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="sign">Select signing:</label>
                <select class="form-control"  name="sign">
                    <option value=""></option>
                    <?php
                    $aspect_type = "sign";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="enc">Select encryption:</label>
                <select class="form-control"  name="enc">
                    <option value=""></option>
                    <?php
                    $aspect_type = "enc";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="userpriv">Select account privilege level:</label>
                <select class="form-control"  name="userpriv">
                    <option value=""></option>
                    <?php
                    $aspect_type = "userpriv";
                    $aspectnameItems = $aspectFunctions->displayAspectValues($aspect_type);
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_name']?>">
                            <?php echo $item['aspect_name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>


<!--            DREAD Factors-->

            <H2>DREAD faktory</H2>

            <H3>Likelihood score</H3>

            <h4 class="border-bottom" title="The first set of factors are related to the threat agent involved. The goal here is to estimate the likelihood of a successful attack by this group of threat agents. Use the worst-case threat agent.">Threat Agent Factors (TAF)</h4>

            <div class="form-group">
                <label for="sl">Skill level</label>
                <select class="form-control" id="sl" name="sl" onchange="calculate()">
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
                <label for="sl">Motive</label>
                <select class="form-control" id="m" name="m" onchange="calculate()">
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
                <label for="o">Opportunity</label>
                <select class="form-control" id="o" name="o" onchange="calculate()">
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
                <label for="s">Size</label>
                <select class="form-control" id="s" name="s" onchange="calculate()">
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
                <label for="ed">Ease of discovery</label>
                <select class="form-control" id="ed" name="ed" onchange="calculate()">
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
                <label for="ee">Ease of exploit</label>
                <select class="form-control" id="ee" name="ee" onchange="calculate()">
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
                <label for="a">Awareness</label>
                <select class="form-control" id="a" name="a" onchange="calculate()">
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
                <label for="ide">Intrusion detection</label>
                <select class="form-control" id="ide" name="ide" onchange="calculate()">
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
                <label for="lc">Loss of confidentiality</label>
                <select class="form-control" id="lc" name="lc" onchange="calculate()">
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
                <label for="o">Loss of integrity</label>
                <select class="form-control" id="li" name="li" onchange="calculate()">
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
                <label for="lav">Loss of availability</label>
                <select class="form-control" id="lav" name="lav" onchange="calculate()">
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
                <label for="lac">Loss of accountability</label>
                <select class="form-control" id="lac" name="lac" onchange="calculate()">
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
                <label for="fd">Financial damage</label>
                <select class="form-control" id="fd" name="fd" onchange="calculate()">
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
                <label for="rd">Reputation damage</label>
                <select class="form-control" id="rd" name="rd" onchange="calculate()">
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
                <label for="nc">Non-compliance</label>
                <select class="form-control" id="nc" name="nc" onchange="calculate()">
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
                <label for="pv">Privacy violation</label>
                <select class="form-control" id="pv" name="pv" onchange="calculate()">
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
            <!--            Button -->
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="submit">


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
