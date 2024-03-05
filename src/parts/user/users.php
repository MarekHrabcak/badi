<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$userFunctions = new UserFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>

<div>
    <h3>User list
        <a href="<?php echo CoreFunctions::PAGE_ADD_USER?>" class="btn btn-primary" style="float:right;">New</a>
    </h3>
</div>


<div>
    <div class="table-responsive">
        <table class="table table-striped table-sm ">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Status</th>
                <th>Role</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <?php
            $userItems = $userFunctions->displayAllUsers();
            foreach ($userItems as $item) {
                ?>
                <tr>
                    <td style="width: 5%"><?php echo $item['id'] ?></td>
                    <td style="width: 15%"><?php echo $item['email'] ?></td>
<!-- ak je status = 1 tak vypis Inactiv, ak je status = 2 tak Active -->
                    <td>
                        <?php if ($item['status'] == 1) {
                            echo 'Inactive';
                        } elseif ($item['status'] == 2) {
                            echo 'Active';}
                        ?>
                    </td>
                    <td><?php echo $item['role_name'] ?></td>
                    <td style="text-align: right">
                        <a href="<?php echo CoreFunctions::PAGE_EDIT_USER . $item['id'] ?>" style="color:green" target="_blank">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                        <a href="<?php echo CoreFunctions::ACTION_DELETE_USER . $item['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>

</div>


<h3>Application role list
</h3>

<div>
    <div class="table-responsive">
        <table class="table table-striped table-sm ">
            <thead>
            <tr>
                <th>#</th>
                <th>Role name</th>
                <th>Role description</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            <?php
            $roleItems = $userFunctions->displayAllRoles();
            foreach ($roleItems as $item) {
                ?>
                <tr>
                    <td style="width: 5%"><?php echo $item['id'] ?></td>
                    <td style="width: 15%"><?php echo $item['name'] ?></td>
                    <td><?php echo $item['code'] ?></td>
                    <td style="text-align: right">
                        <a href="<?php echo CoreFunctions::PAGE_EDIT_ROLE . $item['id'] ?>" style="color:green" target="_blank">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>