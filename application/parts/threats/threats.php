<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}


$threatFunctions = new ThreatFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Threats</h1>
<!--    <a href="index.php?page=addThreat" class="btn btn-primary" style="float:right;">New</a>-->
</div>

<div>
    <h3>Threat list
        <a href="<?php echo CoreFunctions::PAGE_ADD_THREAT; ?>" class="btn btn-primary" style="float:right;">New</a>
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
                $threats = $threatFunctions->displayListThreats();
                foreach ($threats as $threat) {
                $threatColour = $threatFunctions->getRiskColour($threat['risklevel']);
                ?>
                    <tr>
                        <td><?php echo $threat['id'] ?></td>
                        <td><?php echo $threat['threat_name'] ?></td>
                        <td><?php echo $threat['threat_description'] ?></td>
                        <td><?php echo $threat['authprot'] ?></td>
                        <td><?php echo $threat['dataclass'] ?></td>
                        <td><?php echo $threat['architect'] ?></td>
                        <td><?php echo $threat['netloc'] ?></td>
                        <td><?php echo $threat['authfact'] ?></td>
                        <td><?php echo $threat['sign'] ?></td>
                        <td><?php echo $threat['enc'] ?></td>
                        <td><?php echo $threat['userpriv'] ?></td>
                        <td class="<?php echo $threatColour; ?>"><b><?php echo $threat['risklevel'] ?></b></td>
                        <td><?php echo $threat['liklevel'] ?></td>
                        <td><?php echo $threat['likvalue'] ?></td>
                        <td><?php echo $threat['implevel'] ?></td>
                        <td><?php echo $threat['impvalue'] ?></td>
                        <td><?php echo $threat['timestamp'] ?></td>
                        <td>
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_THREAT . $threat['id'] ?>" style="color:green" target="_blank">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="<?php echo CoreFunctions::ACTION_DELETE_THREAT . $threat['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
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
