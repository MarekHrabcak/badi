<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$relationFunctions = new RelationFunctions($connection->getConnection());


$relation_aspect = '';
if (isset($_POST['aspect'])) {
    $aspect = $_POST['aspect'];
}

$sl = '';
if (isset($_POST['sl'])) {
    $sl = $_POST['sl'];
}

$m = '';
if (isset($_POST['m'])) {
    $m = $_POST['m'];
}

$o = '';
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
    <h1 class="h2">relations</h1>
</div>

<h3>Select aspects and submit <b>Calculate</b> button</h3>
<p>
On this page you can select aspects and by pressing the Calculate button the application will recalculate the risks for all predefined Aspects with respect to the selected Aspects.
</p>

        <!--   INPUT DATA-->
<!--        <hr class=""> <h3>Vyberte aspekty relationu</h3><hr>-->

            <form action="<?php echo CoreFunctions::PAGE_ADD_RELATION;?>" method="POST">
                <div class="form-group">
                    <label for="relation_aspect">Aspect name:</label>
                    <input type="text" class="form-control" name="relation_aspect" placeholder="Enter model name" value="<?php echo $model_name?>" >
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




        </div>
        <?php } ?>




