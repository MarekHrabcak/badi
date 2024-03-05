<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$userFunctions = new UserFunctions($connection->getConnection());

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $role = $userFunctions->displayRecordByIdRole($editId);
}
?>

<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Application roles</h1>
</div>

<h3>Edit application roles</h3>

<!--Formular-->
    <form action="<?php echo CoreFunctions::ACTION_EDIT_ROLE?>" method="POST">
        <div class="form-group">
            <label for="code">Change role code:</label>
            <input type="text" class="form-control" name="ucode" value="<?php echo $role['code']; ?>" >
        </div>
        <div class="form-group">
            <label for="name">Change role name:</label>
            <input type="text" class="form-control" name="uname" value="<?php echo $role['name']; ?>" >
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $role['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="Update">
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
