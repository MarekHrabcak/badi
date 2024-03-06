<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}
$factorFunctions = new FactorFunctions($connection->getConnection());
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">OWASP factors</h1>
</div>

<h3>Add new OWASP factor</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_ADD_FACTOR; ?>" method="POST">

        <div class="form-group">
                    <label for="factor_name">Select factor category:</label>
                    <select class="form-control"  name="factor_name">
                        <option value=""></option>
                        <?php
                        $factorNameItems = $factorFunctions->displayFactorNames();
                        foreach($factorNameItems as $item)
                        {
                            ?>
                            <option value="<?php echo $item['factor_name']?>">
                                <?php echo $item['factor_name']?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
        </div>



        <!-- <div class="form-group">
            <label for="factor_name">Type factor name:</label>
            <input type="text" class="form-control" name="factor_name" placeholder="Name" >
        </div> -->



        <div class="form-group">
            <label for="factor_level">Type factor level:</label>
            <input type="text" class="form-control" name="factor_level" placeholder="Type number from 1 to 9" >
        </div>
        <div class="form-group">
            <label for="factor_description">Type factor description:</label>
            <input type="text" class="form-control" name="factor_description" placeholder="Description" >
        </div>
        <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
        <input type="submit" name="submit" class="btn btn-primary" style="float:right; margin-top: 20px" value="submit">

    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

