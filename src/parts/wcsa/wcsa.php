<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}


$wcsaFunctions = new WcsaFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Worse Case Scenario</h1>
<!--    <a href="index.php?page=addwcsa" class="btn btn-primary" style="float:right;">New</a>-->
</div>

<div>
    <h3>WCS list
        <a href="<?php echo CoreFunctions::PAGE_ADD_WCSA; ?>" class="btn btn-primary" style="float:right;">New</a>
    </h3>
</div>


<div>
    <div class="table-responsive">
        <table class="table table-striped table-sm ">
                <thead>
                <tr>
                    <th>#</th>
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
                    <th>Timestamp</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $wcsas = $wcsaFunctions->displayListWcsas();
                foreach ($wcsas as $wcsa) {
                $wcsaColour = $wcsaFunctions->getRiskColour($wcsa['risklevel']);
                ?>
                    <tr>
                        <td><?php echo $wcsa['id'] ?></td>
                        <td><?php echo $wcsa['wcsa_name'] ?></td>
                        <td><?php echo $wcsa['wcsa_description'] ?></td>
                        <td><?php echo $wcsa['authprot'] ?></td>
                        <td><?php echo $wcsa['dataclass'] ?></td>
                        <td><?php echo $wcsa['architect'] ?></td>
                        <td><?php echo $wcsa['netloc'] ?></td>
                        <td><?php echo $wcsa['authfact'] ?></td>
                        <td><?php echo $wcsa['sign'] ?></td>
                        <td><?php echo $wcsa['enc'] ?></td>
                        <td><?php echo $wcsa['userpriv'] ?></td>
                        <td class="<?php echo $wcsaColour; ?>"><b><?php echo $wcsa['risklevel'] ?></b></td>
                        <td><?php echo $wcsa['liklevel'] ?></td>
                        <td><?php echo $wcsa['likvalue'] ?></td>
                        <td><?php echo $wcsa['implevel'] ?></td>
                        <td><?php echo $wcsa['impvalue'] ?></td>
                        <td><?php echo $wcsa['timestamp'] ?></td>
                        <td>
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_WCSA . $wcsa['id'] ?>" style="color:green" target="_blank">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="<?php echo CoreFunctions::ACTION_DELETE_WCSA . $wcsa['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
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

<!--</main>-->
