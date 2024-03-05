<?php
//Presunut do indexu k ostatnym podmienkam
//if (!CoreFunctions::isGranted()) {
//CoreFunctions::redirect(CoreFunctions::PAGE_HOMEPAGE);
//}

?>


<!--    Novy login-->
    <div class="login-box">

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post" action="<?php echo CoreFunctions::ACTION_LOGIN; ?>">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" autofocus="" maxlength="254" id="floatingInput">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="id_password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>

                <br>



            </div>

        </div>
    </div>




</main>


