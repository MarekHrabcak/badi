<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$relationFunctions = new RelationFunctions($connection->getConnection());
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


    <div>
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
    </div>





