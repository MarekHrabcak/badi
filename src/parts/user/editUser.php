<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$userFunctions = new UserFunctions($connection->getConnection());

// Edit customer record
if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $user = $userFunctions->displayRecordByIdUser($editId);
}
?>

<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User administration</h1>
</div>

<h3>Edit user</h3>

<!--Formular-->
    <form action="<?php CoreFunctions::ACTION_EDIT_USER; ?>" method="POST">
        <div class="form-group">
            <label for="user_email">Edit user email:</label>
            <input type="text" class="form-control" name="uuser_email" value="<?php echo $user['email']; ?>" >
        </div>
        <div class="form-group">
            <label for="user_password">Edit user password:</label>
            <input type="password" class="form-control" name="uuser_password">
        </div>
        <div class="form-group">
            <label for="user_status">Edit user account status:</label>
            <select class="form-control"  name="uuser_status">
<!--                Toto urobit cez tabulku?-->
                <option value="1" <?php if ($user['status'] == 1) { ?> selected="selected" <?php } ?>>Inactive</option>
                <option value="2" <?php if ($user['status'] == 2) { ?> selected="selected" <?php } ?>>Active</option>
            </select>
        </div>

        <div class="form-group">
            <label for="user_role">Edit user application role:</label>
<!--            Role sa daju editovat len priamo v databaze-->
            <select class="form-control"  name="uuser_role">
                <?php
                $userRoleItems = $userFunctions->displayUserRoleInfo();
                foreach($userRoleItems as $item)
                {
                    if ($item['id'] == $user['role']) {
                        ?>
                        <option selected="selected" value="<?php echo $item['id']?>">
                            <?php echo $item['name']?>
                        </option>
                        <?php
                    } else {
                        ?>
                        <option value="<?php echo $item['id']?>">
                            <?php echo $item['name']?>
                        </option>
                        <?php
                    }


                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="update" class="btn btn-primary" style="float:right; margin-top: 20px" value="Update">
        </div>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
