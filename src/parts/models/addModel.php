<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$modelFunctions = new ModelFunctions($connection->getConnection());

$wcsaFunctions = new WcsaFunctions($connection->getConnection());

$aspectFunctions = new AspectFunctions($connection->getConnection());

$factorFunctions = new FactorFunctions($connection->getConnection());


$model_name = '';
if (isset($_POST['model_name'])) {
    $model_name = $_POST['model_name'];
}

$model_description = '';
if (isset($_POST['model_description'])) {
    $model_description = $_POST['model_description'];
}

$dataclass = '';
if (isset($_POST['dataclass'])) {
    $dataclass = $_POST['dataclass'];
}

$architect = '';
if (isset($_POST['architect'])) {
    $architect = $_POST['architect'];
}

$netloc = '';
if (isset($_POST['netloc'])) {
    $netloc = $_POST['netloc'];
}

$authfact = '';
if (isset($_POST['authfact'])) {
    $authfact = $_POST['authfact'];
}

$sign = '';
if (isset($_POST['sign'])) {
    $sign = $_POST['sign'];
}

$enc = '';
if (isset($_POST['enc'])) {
    $enc = $_POST['enc'];
}

$userpriv = '';
if (isset($_POST['userpriv'])) {
    $userpriv = $_POST['userpriv'];
}


?>


<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Models</h1>
</div>

<h3>Select aspects and submit <b>Calculate</b> button</h3>
<p>
On this page you can select aspects and by pressing the Calculate button the application will recalculate the risks for all predefined Aspects with respect to the selected Aspects.
</p>

        <!--   INPUT DATA-->
<!--        <hr class=""> <h3>Vyberte aspekty modelu</h3><hr>-->

            <form action="<?php echo CoreFunctions::PAGE_ADD_MODEL;?>" method="POST">
                <div class="form-group">
                    <label for="model_name">Model name:</label>
                    <input type="text" class="form-control" name="model_name" placeholder="Enter model name" value="<?php echo $model_name?>" >
                </div>
                <div class="form-group">
                    <label for="model_description">Model description:</label>
                    <input type="text" class="form-control" name="model_description" placeholder="Enter description" value="<?php echo $model_description?>">
                </div>


                <div class="form-group">
                    <label for="dataclass">Change dataclass level:</label>
                    <br>
                    <select class="form-control"  name="dataclass">
                        <option value=""></option>
                        <?php
                        $aspect_type = "dataclass";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($dataclass == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="architect">Change architecture:</label>
                    <br>
                    <select class="form-control"  name="architect">
                        <option value=""></option>
                        <?php
                        $aspect_type = "architect";
//                        $aspect_type = '$architect';
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($architect == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="netloc">Change network location:</label>
                    <br>
                    <select class="form-control"  name="netloc">
                        <option value=""></option>
                        <?php
                        $aspect_type = "netloc";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($netloc == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="authfact">Change authentication factors:</label>
                    <br>
                    <select class="form-control"  name="authfact">
                        <option value=""></option>
                        <?php
                        $aspect_type = "authfact";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($authfact == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="sign">Change signing:</label>
                    <br>
                    <select class="form-control"  name="sign">
                        <option value=""></option>
                        <?php
                        $aspect_type = "sign";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($sign == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="enc">Change encryption:</label>
                    <br>
                    <select class="form-control"  name="enc">
                        <option value=""></option>
                        <?php
                        $aspect_type = "enc";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($enc == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="userpriv">Change user privileges:</label>
                    <br>
                    <select class="form-control"  name="userpriv">
                        <option value=""></option>
                        <?php
                        $aspect_type = "userpriv";
                        $wcsaItems = $wcsaFunctions->displayDataWcsas($aspect_type);
                        foreach($wcsaItems as $item)
                        {
                            if ($userpriv == $item[$aspect_type]) {
                                ?>
                                <option selected="selected" value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $item[$aspect_type]?>">
                                    <?php echo $item[$aspect_type]?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
                <input type="submit" name="submit" class="btn btn-primary" style="float:right; margin-top: 20px" value="Calculate">
            </form>
<!--</div>-->
        <br><br><br><br>


        <?php
        if(!empty($_POST) && isset($_POST['submit'])) {

            $results = $modelFunctions->countFactorsAll();

        ?>
<!-- counting -->

        <div>
            <h2>Output</h2>
            <p>
            The output of the calculation is a list of authentication mechanisms marked with the degree of calculated risk according to the aspects you choose. 
            By changing the selected aspects and pressing the Calculate button again, the risks will be recalculated.
            <br>
        </p>
        <br>

            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <!-- <th>model_name</th> -->
                    <th>Authentication</th>
                    <th>SL</th>
                    <th>M</th>
                    <th>O</th>
                    <th>S</th>
                    <th>ED</th>
                    <th>EE</th>
                    <th>A</th>
                    <th>IDE</th>
                    <th>LC</th>
                    <th>LI</th>
                    <th>LAV</th>
                    <th>LAC</th>
                    <th>FD</th>
                    <th>RD</th>
                    <th>NC</th>
                    <th>PV</th>
                    <th>Risk Level</th>
                    <th>Lik. Value</th>
                    <th>Lik. Level</th>
                    <th>Imp. Value</th>
                    <th>Imp. Level</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php

                foreach ($results as $type) {
                    foreach($type as $item) {
                        $modelColour = $modelFunctions->getRiskColour($item['risklevel']);
                        ?>
                        <tr>
                            <!-- <td><?php echo $item['model_name'] ?></td> -->
                            <td><?php echo $item['type'] ?></td>
                            <td><?php echo $item['sl'] ?></td>
                            <td><?php echo $item['m'] ?></td>
                            <td><?php echo $item['o'] ?></td>
                            <td><?php echo $item['s'] ?></td>
                            <td><?php echo $item['ed'] ?></td>
                            <td><?php echo $item['ee'] ?></td>
                            <td><?php echo $item['a'] ?></td>
                            <td><?php echo $item['ide'] ?></td>
                            <td><?php echo $item['lc'] ?></td>
                            <td><?php echo $item['li'] ?></td>
                            <td><?php echo $item['lav'] ?></td>
                            <td><?php echo $item['lac'] ?></td>
                            <td><?php echo $item['fd'] ?></td>
                            <td><?php echo $item['rd'] ?></td>
                            <td><?php echo $item['nc'] ?></td>
                            <td><?php echo $item['pv'] ?></td>
                            <td class="<?php echo $modelColour; ?>"><b><?php echo $item['risklevel'] ?></td>
                            <td><?php echo $item['likvalue'] ?></td>
                            <td><?php echo $item['liklevel'] ?></td>
                            <td><?php echo $item['impvalue'] ?></td>
                            <td><?php echo $item['implevel'] ?></td>

                            <td>
                                <form action="<?php echo CoreFunctions::ACTION_ADD_MODEL?>" id="final-form" method="post">
                                    <input type="hidden" name="model_name" id="model_name" value="<?php echo $item['model_name'] ?>">
                                    <input type="hidden" name="model_description" id="model_description" value="<?php echo $item['model_description'] ?>">
                                    <input type="hidden" name="dataclass" id="dataclass" value="<?php echo $item['dataclass'] ?>">
                                    <input type="hidden" name="architect" id="architect" value="<?php echo $item['architect'] ?>">
                                    <input type="hidden" name="netloc" id="netloc" value="<?php echo $item['netloc'] ?>">
                                    <input type="hidden" name="sign" id="sign" value="<?php echo $item['sign'] ?>">
                                    <input type="hidden" name="enc" id="enc" value="<?php echo $item['enc'] ?>">
                                    <input type="hidden" name="userpriv" id="userpriv" value="<?php echo $item['userpriv'] ?>">
                                    <input type="hidden" name="authfact" id="authfact" value="<?php echo $item['authfact'] ?>">
                                    <input type="hidden" name="risklevel" id="risklevel" value="<?php echo $item['risklevel'] ?>">
                                    <input type="hidden" name="liklevel" id="liklevel" value="<?php echo $item['liklevel'] ?>">
                                    <input type="hidden" name="likvalue" id="likvalue" value="<?php echo $item['likvalue'] ?>">
                                    <input type="hidden" name="implevel" id="implevel" value="<?php echo $item['implevel'] ?>">
                                    <input type="hidden" name="impvalue" id="impvalue" value="<?php echo $item['impvalue'] ?>">


                                    <input type="hidden" name="type" id="type" value="<?php echo $item['type'] ?>">
                                    <input type="hidden" name="sl" id="sl" value="<?php echo $item['sl'] ?>">
                                    <input type="hidden" name="m" id="m" value="<?php echo $item['m'] ?>">
                                    <input type="hidden" name="o" id="o" value="<?php echo $item['o'] ?>">
                                    <input type="hidden" name="s" id="s" value="<?php echo $item['s'] ?>">
                                    <input type="hidden" name="lc" id="lc" value="<?php echo $item['lc'] ?>">
                                    <input type="hidden" name="lav" id="lav" value="<?php echo $item['lav'] ?>">
                                    <input type="hidden" name="lac" id="lac" value="<?php echo $item['lac'] ?>">
                                    <input type="hidden" name="ed" id="ed" value="<?php echo $item['ed'] ?>">
                                    <input type="hidden" name="ee" id="ee" value="<?php echo $item['ee'] ?>">
                                    <input type="hidden" name="a" id="a" value="<?php echo $item['a'] ?>">
                                    <input type="hidden" name="ide" id="ide" value="<?php echo $item['ide'] ?>">
                                    <input type="hidden" name="fd" id="fd" value="<?php echo $item['fd'] ?>">
                                    <input type="hidden" name="rd" id="rd" value="<?php echo $item['rd'] ?>">
                                    <input type="hidden" name="nc" id="nc" value="<?php echo $item['nc'] ?>">
                                    <input type="hidden" name="pv" id="pv" value="<?php echo $item['pv'] ?>">
                                    <input type="hidden" name="li" id="li" value="<?php echo $item['li'] ?>">
                                    <input type="submit" name="save" class="btn btn-primary" style="float:right;" value="save">
                                </form>

                            </td>
                        </tr>
                    <?php }
                } ?>
                </tbody>


            </table>

        </div>
        <?php } ?>




