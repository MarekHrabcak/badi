<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$aspectFunctions = new AspectFunctions($connection->getConnection());
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Aspects</h1>
</div>



        <!--Klasifikacne stupne-->
        <div>
            <h3>Data classification level
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>



            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "dataclass";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Architecture-->
        <div>
            <h3>Architecture
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "architect";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


        <!--Auth protocol-->
        <div>
            <h3>Authentication protocol
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "authprot";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Sieťová lokácia-->
        <div>
            <h3>Network location
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "netloc";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Faktory autentizácie-->
        <div>
            <h3>Authentization factors
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "authfact";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Podpisovanie-->
        <div>
            <h3>Signing
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "sign";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Šifrovanie-->
        <div>
            <h3>Encryption
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "enc";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="index.php?action=deleteAspect&id=<?php echo $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!--Nízke oprávnenia-->
        <div>
            <h3>User privileges
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h3>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 15%">Name</th>
                    <th style="width: 15%">Value</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $aspect_type = "userpriv";
                $aspects = $aspectFunctions->displayDataAspects($aspect_type);
                foreach ($aspects as $aspect) {
                    ?>
                    <tr>
                        <td><?php echo $aspect['id'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_description'] ?></td>
                        <td style="text-align: right">
                            <a href="<?php echo CoreFunctions::PAGE_EDIT_ASPECT . $aspect['id'] ?>" style="color:green">
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                            <a href="<?php echo CoreFunctions::ACTION_DELETE_ASPECT . $aspect['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

<!--DREAD faktory-->
        <div>

            <div>
                <h3>DREAD factorization
                    <a href="<?php echo CoreFunctions::PAGE_ADD_DREAD; ?>" class="btn btn-primary" style="float:right;">New</a>
                </h3>

                <table class="table table-striped table-sm" style="width: 100%">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Name</th>
                        <th style="width: 10%">Level</th>
                        <th style="width: 50%">Description</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $dreads = $aspectFunctions->displayDataDread();
                    foreach ($dreads as $dread) {
                        ?>
                        <tr>
                            <td><?php echo $dread['id'] ?></td>
                            <td><?php echo $dread['dread_name'] ?></td>
                            <td><?php echo $dread['dread_level'] ?></td>
                            <td><?php echo $dread['dread_description'] ?></td>
                            <td style="text-align: right">
                                <a href="<?php echo CoreFunctions::PAGE_EDIT_DREAD . $dread['id'] ?>" style="color:green">
                                    <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                                <a href="<?php echo CoreFunctions::ACTION_DELETE_DREAD . $dread['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>




<!--</main>-->
