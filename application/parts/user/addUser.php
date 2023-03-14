<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$userFunctions = new UserFunctions($connection->getConnection());
?>


<!--Hlavicka-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>

<h3>Add new user</h3>

<!--Formular-->
        <form action="<?php echo CoreFunctions::ACTION_ADD_USER; ?>" method="POST">

            <!--Add user form list-->

            <div class="form-group">
                <label for="email">Enter user email:</label>
                <input type="text" class="form-control" name="email" required="required" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="password">Enter user password:</label>
                <input type="text" class="form-control" name="password" required="required" placeholder="Enter password">
            </div>


            <div class="form-group">
                <label for="role">Select user role:</label>
                <select class="form-control"  name="role">
                    <option value=""></option>
                    <?php
                    $userRoleItems = $userFunctions->displayUserRoleInfo();
                    foreach($userRoleItems as $item)
                    {
                        ?>
                        <option value="<?php echo $item['id']?>">
                            <?php echo $item['name']?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <input type="submit" name="cancel" class="btn btn-danger" style="float:right; margin-top: 20px; margin-left: 20px" value="Cancel" onclick="history.go(-1)">
            <input type="submit" name="submit" class="btn btn-primary" style="float:right; margin-top: 20px" value="submit">

        </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
