<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$relationFunctions = new RelationFunctions($connection->getConnection());
$aspectFunctions = new AspectFunctions($connection->getConnection());
// $wcsaFunctions = new WcsaFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Relations</h1>
</div>

<div>
    <p>
The following table shows the matrix of relationships between aspects and factors.
<li>1 means that the aspect and the factor influence each other.</li>
<li>0 means that the aspect and the factor do not influence each other.</li>
</p>
</div>

<div>
    <h3>Relation Matrix</h3>
</div>
 
        <div class="table-responsive">
            <table class="table table-striped table-sm ">
                <thead>
                <tr>
                    <th>Aspect</th>
                    <th>SL</th>
                    <th>M</th>
                    <th>O</th>
                    <th>S</th>
                    <th>ED</th>
                    <th>EE</th>
                    <th>A</th>
                    <th>IDE</th>
                    <th>LC</th>
                    <th>LI</th>
                    <th>LAV</th>
                    <th>LAC</th>
                    <th>FD</th>
                    <th>RD</th>
                    <th>NC</th>
                    <th>PV</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $relations = $relationFunctions->displayDataRelations();
                foreach ($relations as $item) {
                    // $relationColour = $relationFunctions->getRiskColour($item['risklevel']);
                    ?>
                    <tr>
                        <td><?php echo $item['aspect'] ?></td>
                        <td><?php echo $item['sl'] ?></td>
                        <td><?php echo $item['m'] ?></td>
                        <td><?php echo $item['o'] ?></td>
                        <td><?php echo $item['s'] ?></td>
                        <td><?php echo $item['ed'] ?></td>
                        <td><?php echo $item['ee'] ?></td>
                        <td><?php echo $item['a'] ?></td>
                        <td><?php echo $item['ide'] ?></td>
                        <td><?php echo $item['lc'] ?></td>
                        <td><?php echo $item['li'] ?></td>
                        <!-- <td class="<?php echo $relationColour; ?>"><b><?php echo $item['risklevel'] ?></td> -->
                        <td><?php echo $item['lav'] ?></td>
                        <td><?php echo $item['lac'] ?></td>
                        <td><?php echo $item['fd'] ?></td>
                        <td><?php echo $item['rd'] ?></td>
                        <td><?php echo $item['nc'] ?></td>
                        <td><?php echo $item['pv'] ?></td>
                        <td>
                            <!-- <a href="<?php echo CoreFunctions::PAGE_EDIT_RELATION . $item['id'] ?>" style="color:green" target="_blank">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="<?php echo CoreFunctions::ACTION_DELETE_RELATION . $item['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a> -->
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div> 
            <p>
                   
            Here, prepare a new assessment of the impact of the aspect on the selected authentication protocol or modify the existing ones.
           
           The riskiness of your scenario will be calculated automatically after entering the relevant OWASP factors.
    </p>    
    </div>

        <div>
            <h3>List
                <a href="<?php echo CoreFunctions::PAGE_ADD_RELATION; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm ">
                <thead>
                    <tr>
                        <th>Description</th>
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
                    $relations = $relationFunctions->displayListWcsasRelations();
                    foreach ($relations as $relation) {
                    $relationColour = $relationFunctions->getRiskColour($relation['risklevel']);
                    ?>
                        <tr>
                            <!-- Description -->
                            <td><?php echo $relation['wcsa_description'] ?></td>
                            <!-- Auth protocol -->
                            <td><?php
                                $aspect_type = "authprot";
                                $aspect_value = $relation['authprot'];
                                $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                                // var_dump($aspectName);
                                if (!empty($aspectName) && isset($aspectName[0]['aspect_name']) && $aspectName[0]['aspect_name'] !== '0') {
                                    echo $aspectName[0]['aspect_name'];
                                } else {
                                    echo 0;
                                }
                                
                            ?></td>
                            <!-- Data classification -->
                            <td><?php 
                                $aspect_type = "dataclass";
                                $aspect_value = $relation['dataclass'];
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
                                $aspect_value = $relation['architect'];
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
                                $aspect_value = $relation['netloc'];
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
                                $aspect_value = $relation['authfact'];
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
                                $aspect_value = $relation['sign'];
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
                                $aspect_value = $relation['enc'];
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
                                $aspect_value = $relation['userpriv'];
                                $aspectName = $aspectFunctions->displayAspectDataclassName($aspect_type, $aspect_value);
                                if (!empty($aspectName) && isset($aspectName[0]['aspect_name'])) {
                                    echo $aspectName[0]['aspect_name'];
                                } else {
                                    echo "Not found.";
                                }
                            ?></td>

                            <!-- Risk ranking -->
                            <td class="<?php echo $relationColour; ?>"><b><?php echo $relation['risklevel'] ?></b></td>
                            <td><?php echo $relation['liklevel'] ?></td>
                            <td><?php echo $relation['likvalue'] ?></td>
                            <td><?php echo $relation['implevel'] ?></td>
                            <td><?php echo $relation['impvalue'] ?></td>
                            <td><?php echo $relation['timestamp'] ?></td>
                            <td>
                                <a href="<?php echo CoreFunctions::PAGE_EDIT_RELATION . $relation['id'] ?>" style="color:green" target="_blank">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>&nbsp
                                <a href="<?php echo CoreFunctions::ACTION_DELETE_RELATION . $relation['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
        
            </div>
