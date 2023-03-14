<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}
$aspectFunctions = new AspectFunctions($connection->getConnection());
?>

<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Aspects</h1>
</div>

<h3>Add new aspect</h3>

<!--Formular-->
        <form action="<?php echo CoreFunctions::ACTION_ADD_ASPECT; ?>" method="POST">
            <!--Factor list-->
            <div class="form-group">
                <label for="aspect_type">Select aspect type:</label>
                <select class="form-control"  name="aspect_type">
                    <option value=""></option>
                    <?php
                    $aspectnameItems = $aspectFunctions->displayAspectType();
                    foreach($aspectnameItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['aspect_type']?>">
                            <?php echo $item['aspect_type']?>
                        </option>


                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                  <label for="aspect_name">Type aspect name:</label>
                    <input type="text" class="form-control" name="aspect_name" placeholder="Name" required="">
            </div>

            <div class="form-group">
                <label for="aspect_value">Type aspect value:</label>
                <input type="text" class="form-control" name="aspect_value" placeholder="Value from 0-9" required="">
            </div>
            <div class="form-group">
                <label for="aspect_description">Type aspect description:</label>
                <input type="text" class="form-control" name="aspect_description" placeholder="Description" required="">
            </div>
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="submit" class="btn btn-primary" style="float:right; margin-top: 20px" value="Submit">
        </form>


<!--TEST GRIDU-->
<form>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Last name">
        </div>
    </div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
