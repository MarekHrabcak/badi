<?php


$menuItems = $connection->getMenuItems();
?>
<!--Nove menu-->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark full-height" style="width: 280px;">

    <a href="index.php?page=homepage" class="d-flex align-items-center mb-3 mb-md-0 ms-3 text-white text-decoration-none table-responsive">
      <span class="fs-4">BADI</span>
    </a>




    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <?php if (CoreFunctions::isGranted()) { ?>
            <?php foreach ($menuItems as $item) {  ?>
                <?php if (CoreFunctions::isGranted($item['code'])) {?>
                    <li class="nav-item">
                        <a href="<?php echo $item['href'] ?>" class="nav-link text-white" aria-current="page">
                            <span class="nav-icon"> <i class="<?php echo $item['icon'] ?> bi me-2"></i> </span>
                            <?php echo $item['name'] ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <li>
                <a href="<?php echo CoreFunctions::PAGE_LOGIN; ?>" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                    Sign in
                </a>
            </li>
        <?php } ?>
    </ul>

    <?php if (CoreFunctions::isGranted()) { ?>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
                <strong><?php echo $_SESSION['email']; ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="<?php echo CoreFunctions::ACTION_LOGOUT; ?>">Sign out</a></li>
            </ul>
        </div>
    <?php } ?>
</div>