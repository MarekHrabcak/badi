<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$factorFunctions = new FactorFunctions($connection->getConnection());

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $factor = $factorFunctions->displayRecordByIdFactor($editId);
}
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Factor edit page</h1>
</div>

<h3>Edit factor</h3>
    <form action="<?php echo CoreFunctions::ACTION_EDIT_FACTOR;?>" method="POST">
        <div class="form-group">
            <label for="name">Edit factor name:</label>
            <input type="text" class="form-control" name="ufactor_name" value="<?php echo $factor['factor_name']; ?>" >
        </div>
        <div class="form-group">
            <label for="level">Edit factor level:</label>
            <input type="text" class="form-control" name="ufactor_level" value="<?php echo $factor['factor_level']; ?>" >
        </div>
        <div class="form-group">
            <label for="description">Edit factor description:</label>
            <input type="text" class="form-control" name="ufactor_description" value="<?php echo $factor['factor_description']; ?>" >
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $factor['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="update">
        </div>
    </form>
