<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}


$wcsaFunctions = new WcsaFunctions($connection->getConnection());
$aspectFunctions = new AspectFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Worse Case Scenario</h1>
</div>

<div>
    <p>
A worst-case scenario is a concept in risk management wherein the planner, in planning for potential disasters, considers the most severe possible outcome that can reasonably be projected to occur in a given situation.

In the following table, you can add your own scenario with which the application will work when assessing risk.
</p>
<br><br>
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
                    <th>Desc.</th>
                    <th>Auth. Protocol</th>
                    <th>DataClass</th>
                    <th>Architecture</th>
                    <th>Location</th>
                    <th>Auth fact.</th>
                    <th>Signing</th>
                    <th>Encryption</th>
                    <th>Privileges</th>
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
                        <!-- Description -->
                        <td><?php echo $wcsa['wcsa_description'] ?></td>
                        <!-- Auth protocol -->
                        <td><?php
                            $aspect_type = "authprot";
                            $aspect_value = $wcsa['authprot'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>
                        <!-- Data classification -->
                        <td><?php 
                            $aspect_type = "dataclass";
                            $aspect_value = $wcsa['dataclass'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>
                        <!-- Architecture -->
                        <td><?php 
                            $aspect_type = "architect";
                            $aspect_value = $wcsa['architect'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>
                        
                        <!-- Net location -->
                        <td><?php 
                            $aspect_type = "netloc";
                            $aspect_value = $wcsa['netloc'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>

                        <!-- Auth factors -->
                        <td><?php 
                            $aspect_type = "authfact";
                            $aspect_value = $wcsa['authfact'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>
                        <!-- Signing -->
                        <td><?php 
                            $aspect_type = "sign";
                            $aspect_value = $wcsa['sign'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>
                        <!-- Encryption -->
                        <td><?php 
                            $aspect_type = "enc";
                            $aspect_value = $wcsa['enc'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>

                        <!-- User priviledges -->
                        <td><?php 
                            $aspect_type = "userpriv";
                            $aspect_value = $wcsa['userpriv'];
                            $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                            if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                echo $aspectName[0]['aspect_name'];
                            } else {
                                echo "Not found.";
                            }
                        ?></td>

                        <!-- Risk ranking -->
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
