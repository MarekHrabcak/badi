<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$modelFunctions = new ModelFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Models</h1>
</div>

<div>
    <h3>Model list
        <a href="<?php echo CoreFunctions::PAGE_ADD_MODEL?>" class="btn btn-primary" style="float:right;">New</a>
    </h3>
</div>


    <div>
        <div class="table-responsive">
            <table class="table table-striped table-sm ">
                <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Name</th>
                    <th>Desc.</th>
                    <th>Auth</th>
                    <th>DataClass</th>
                    <th>Arch.</th>
                    <th>Location</th>
                    <th>Auth fact.</th>
                    <th>Sign</th>
                    <th>Enc</th>
                    <th>Priv.</th>
                    <th>Risk</th>
                    <th>Lik.</th>
                    <th>Lik. value</th>
                    <th>Imp.</th>
                    <th>Imp. value</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $models = $modelFunctions->displayDataModels();
                foreach ($models as $item) {
                    $modelColour = $modelFunctions->getRiskColour($item['risklevel']);
                    ?>
                    <tr>
                        <td><?php echo $item['timestamp'] ?></td>
                        <td><?php echo $item['model_name'] ?></td>
                        <td><?php echo $item['model_description'] ?></td>
                        <td><?php echo $item['authprot'] ?></td>
                        <td><?php echo $item['dataclass'] ?></td>
                        <td><?php echo $item['architect'] ?></td>
                        <td><?php echo $item['netloc'] ?></td>
                        <td><?php echo $item['authfact'] ?></td>
                        <td><?php echo $item['sign'] ?></td>
                        <td><?php echo $item['enc'] ?></td>
                        <td><?php echo $item['userpriv'] ?></td>
                        <td class="<?php echo $modelColour; ?>"><b><?php echo $item['risklevel'] ?></td>
                        <td><?php echo $item['liklevel'] ?></td>
                        <td><?php echo $item['likvalue'] ?></td>
                        <td><?php echo $item['implevel'] ?></td>
                        <td><?php echo $item['impvalue'] ?></td>
                        <td>
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_MODEL . $item['id'] ?>" style="color:green" target="_blank">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="<?php echo CoreFunctions::ACTION_DELETE_MODEL . $item['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!--1st Calculation -->
    <script>$(document).ready(function () {
            calculate()
        } )</script>



