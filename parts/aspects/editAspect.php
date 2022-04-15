<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$aspectFunctions = new AspectFunctions($connection->getConnection());

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $aspect = $aspectFunctions->displayRecordByIdAspects($editId);
}
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit aspect</h1>
</div>

<h3>Edit aspect</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_EDIT_ASPECT; ?>" method="POST">
        <div class="form-group">
            <label for="aspect_value">Edit aspect value:</label>
            <input type="text" class="form-control" name="uaspect_value" value="<?php echo $aspect['aspect_value']; ?>" required="">
        </div>
        <div class="form-group">
            <label for="aspect_description">Edit aspect description:</label>
            <input type="aspect_description" class="form-control" name="uaspect_description" value="<?php echo $aspect['aspect_description']; ?>" required="">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $aspect['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="Update">
        </div>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
