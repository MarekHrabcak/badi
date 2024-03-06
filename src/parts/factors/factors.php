<?php
// kontrola prihlasenia
if (!CoreFunctions::isGranted()) {
    CoreFunctions::redirect(CoreFunctions::PAGE_LOGIN);
}

$factorFunctions = new factorFunctions($connection->getConnection());
?>

<!--OWASP faktory-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">OWASP Factors</h1>
</div>

<div>

    <div>
        

        <!-- TEXT  -->
        <p>
        <h4>Threat Agent Factors</h4><br>
            <p>The first set of factors are related to the threat agent involved. The goal here is to estimate the likelihood of a successful attack by this group of threat agents. Use the worst-case threat agent.</p>

            <ul><b>Skill Level (sl)</b> - How technically skilled is this group of threat agents? No technical skills, some technical skills, advanced computer user, network and programming skills, security penetration skills</ul>

            <ul><b>Motive (m)</b> - How motivated is this group of threat agents to find and exploit this vulnerability?
            Low or no reward, possible reward, high reward</ul>

            <ul><b>Opportunity (o)</b> - What resources and opportunities are required for this group of threat agents to find and exploit this vulnerability? Full access or expensive resources required, special access or resources required, some access or resources required, no access or resources required</ul>

            <ul><b>Size (s)</b> - How large is this group of threat agents? Developers, system administrators, intranet users, partners, authenticated users, anonymous Internet users</ul>
        </p>
<br>
        <p>
                        <h4> Vulnerability Factors</h4><br>
        <p>The next set of factors are related to the vulnerability involved. The goal here is to estimate the likelihood of the particular vulnerability involved being discovered and exploited. Assume the threat agent selected above.</p>

        <ul><b>Ease of Discovery (ed)</b> - How easy is it for this group of threat agents to discover this vulnerability? Practically impossible, difficult, easy, automated tools available</ul>

        <ul><b>Ease of Exploit (ee)</b> - How easy is it for this group of threat agents to actually exploit this vulnerability? Theoretical, difficult, easy, automated tools available</ul>

        <ul><b>Awareness (a)</b> - How well known is this vulnerability to this group of threat agents? Unknown, hidden, obvious, public knowledge</ul>

        <ul><b>Intrusion Detection (ide)</b> - How likely is an exploit to be detected? Active detection in application, logged and reviewed, logged without review, not logged</ul>

                            </p>
<br>
                            <p>
                            <h4>Technical Impact Factors</h4><br>
        Technical impact can be broken down into factors aligned with the traditional security areas of concern: confidentiality, integrity, availability, and accountability. The goal is to estimate the magnitude of the impact on the system if the vulnerability were to be exploited. <br>

        <ul><b>Loss of Confidentiality (loc)</b> - How much data could be disclosed and how sensitive is it? Minimal non-sensitive data disclosed, minimal critical data disclosed, extensive non-sensitive data disclosed, extensive critical data disclosed, all data disclosed</ul>
        <ul><b>Loss of Integrity (li)</b> - How much data could be corrupted and how damaged is it? Minimal slightly corrupt data, minimal seriously corrupt data, extensive slightly corrupt data, extensive seriously corrupt data, all data totally corrupt</ul>
        <ul><b>Loss of Availability (lav)</b>- How much service could be lost and how vital is it? Minimal secondary services interrupted (1), minimal primary services interrupted, extensive secondary services interrupted, extensive primary services interrupted, all services completely lost</ul>
        <ul><b>Loss of Accountability (lac)</b>- Are the threat agents’ actions traceable to an individual? Fully traceable, possibly traceable, completely anonymous</ul>
                        </p>
<br>
                        <p>
                        <h4>Business Impact Factors</h4><br>
        The business impact stems from the technical impact, but requires a deep understanding of what is important to the company running the application. In general, you should be aiming to support your risks with business impact, particularly if your audience is executive level. The business risk is what justifies investment in fixing security problems. Many companies have an asset classification guide and/or a business impact reference to help formalize what is important to their business. These standards can help you focus on what’s truly important for security. If these aren’t available, then it is necessary to talk with people who understand the business to get their take on what’s important.<br>

        The factors below are common areas for many businesses, but this area is even more unique to a company than the factors related to threat agent, vulnerability, and technical impact.<br>

        <ul><b>Financial damage (fd)</b>- How much financial damage will result from an exploit? Less than the cost to fix the vulnerability, minor effect on annual profit, significant effect on annual profit, bankruptcy</ul>
        <ul><b>Reputation damage (rd)</b>- Would an exploit result in reputation damage that would harm the business? Minimal damage, Loss of major accounts, loss of goodwill, brand damage</ul>
        <ul><b>Non-compliance (nc)</b>- How much exposure does non-compliance introduce? Minor violation, clear violation, high profile violation</ul>
        <ul><b>Privacy violation (pv)</b> - How much personally identifiable information could be disclosed? One individual, hundreds of people, thousands of people, millions of people</ul>
                        </p>

        <p>
        Set the desired value of the OWASP factor or leave it in the default settings.
        </p>
<br>
        <h4>Customize OWASP Factors
            <a href="<?php echo CoreFunctions::PAGE_ADD_FACTOR; ?>" class="btn btn-primary" style="float:right;">New</a>
        </h4>

        <!-- TEXT  -->
        <table class="table table-striped table-sm" style="width: 100%">
            <thead>
            <tr>
                <!-- <th style="width: 5%">#</th> -->
                <th style="width: 5%">Level</th>
                <th style="width: 5%">Category</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>



            <tbody>
            <?php
            $factors = $factorFunctions->displayDataFactors();
            foreach ($factors as $factor) {
                ?>
                <tr>
                    <!-- <td><?php echo $factor['id'] ?></td> -->
                    <td><?php echo $factor['factor_level'] ?></td>
                    <td><?php echo $factor['factor_name'] ?></td>
                    <td><?php echo $factor['factor_description'] ?></td>
                    <td style="text-align: right">
                        <a href="<?php echo CoreFunctions::PAGE_EDIT_FACTOR . $factor['id'] ?>" style="color:green">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp
                        <a href="<?php echo CoreFunctions::ACTION_DELETE_FACTOR . $factor['id'] ?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
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
