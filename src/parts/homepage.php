<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$factorFunctions = new FactorFunctions($connection->getConnection());
$factorCount = $factorFunctions->displayFactorCount();

$aspectFunctions = new AspectFunctions($connection->getConnection());
$aspectCount = $aspectFunctions->displayAspectCount();

$modelFunctions = new ModelFunctions($connection->getConnection());
$modelCount = $modelFunctions->displayModelCount();

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Security aspects of digital identity</h1>
</div>

<div>
    <h3>Dashboard</h3>
</div>

<!--Koniec kapitoly-->
    <div class="row">
        <div class="col-lg-4 col-xs-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?php echo $aspectCount; ?></h3>
                    <p>Aspects</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cube"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?php echo $factorCount; ?></h3>
                    <p>Factors</p>
                </div>
                <div class="icon">
                    <i class="fa fa-file-code"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xs-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?php echo $modelCount; ?></h3>
                    <p>Models</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bug"></i>
                </div>
            </div>
        </div>
    </div>

<!--Koniec reportu -->


    <p>
<h6>Description</h6>
        <br>Information protection is an integral part of the modern society communication. Sharing sensitive data, easy accessibility services and increasingly sophisticated threats and vulnerabilities require active protection of sensitive data and minimize impacts on security incidents.
        <br>The thesis points to the security aspects of digital identity in terms of communication between the consumer and service provider, draws attention to the factors entering the identity verification process. Part of the thesis is a functional and technical description of the application that proposes a model for the optimum form of authentication based on the user's inputs. The application is preparing models from data that were obtained from the materials listed in bibliographic links and evaluated according to the OWASP Risk Assessment Framework methodology.
        <br>The output of work is a functional application that proposes a model for optimum authentication based on the user inputs.
    </p>
    <p>
    <ul class="list-unstyled">Application requires input data (security aspects):<ul>
    <li>Type of data processed (public data, personal data, confidential data, strictly confidential data, non-classified data);</li>
    <li>Application architecture type (1-layer, 2-layer, etc.);</li>
    <li>Authentication protocol type (mTSL, LDAP, Kerberos, NTLM, Radius, OAuth / SAML / OIDC, ...);</li>
    <li>Location of consumer and provider services depending on the number of inspection nodes;</li>
    <li>Authentication factors (1FA, 2FA, MFA, ...),</li>
    <li>Digital Signing (RSA, HMAC, OTP, HASH),</li>
    <li>Encryption (RSA, ECC, AES, DEC, 3DES),</li>
    <li>User Privilege (Anonymous User, Standard User, Administrator , ...).</li>
</p>







