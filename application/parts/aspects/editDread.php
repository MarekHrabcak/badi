<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$dreadFunctions = new DreadFunctions($connection->getConnection());

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $dread = $dreadFunctions->displayRecordByIdDread($editId);
}
?>
<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DREAD factor edit page</h1>
</div>

<h3>Edit factor</h3>
    <form action="<?php echo CoreFunctions::ACTION_EDIT_DREAD;?>" method="POST">
        <div class="form-group">
            <label for="name">Edit factor name:</label>
            <input type="text" class="form-control" name="udread_name" value="<?php echo $dread['dread_name']; ?>" >
        </div>
        <div class="form-group">
            <label for="level">Edit factor level:</label>
            <input type="text" class="form-control" name="udread_level" value="<?php echo $dread['dread_level']; ?>" >
        </div>
        <div class="form-group">
            <label for="description">Edit factor description:</label>
            <input type="text" class="form-control" name="udread_description" value="<?php echo $dread['dread_description']; ?>" >
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $dread['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="update">
        </div>
    </form>
