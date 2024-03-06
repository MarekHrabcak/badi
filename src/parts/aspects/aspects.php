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
<div>

<p>
The page describes security aspects in communication between the con-sumer and service provider during authentication and proposes procedures that can describe these factors, categorize, measure and evaluate their impact on authentication.<br>
The output of the article is a description of the functionality of the web ap-plication, which, based on the user's inputs, will recommend optimal au-thentication mechanisms sorted by risk score.<br>

<ul>The following input data is required from the user:
<li>Data classification rate; </li>
<li>Number of application ar-chitecture layers;</li>
<li>Type of authentication mechanism or authentication framework; </li>
<li>Description of the network location of the consumer and the provider; </li>
<li>Required number of authentication factors, </li>
<li>The required form of ensuring data integrity control, </li>
<li>The required form of securing the secrecy of transmitted data (encryption), </li> 
<li>Description of user application role per-missions. </li>
</ul>

All options for input data are predefined and therefore the appli-cation is also suitable for a user who does not have a deeper awareness of the risks associated with authentication mechanisms or system integration.<br>

</p>


</div>


        <!--Klasifikacne stupne-->
        <div>
            <h4>Data classification level</h4>

            <p>Data classification level refers to the categorization of data based on its sensitivity, importance, and confidentiality. This classification system helps organizations determine the appropriate level of protection, access controls, and security measures required for handling different types of data.</p>

            <b>Common Data Classification Levels:</b><br>

            <ol>
            <li><strong>Public:</strong> Data that can be freely accessed by anyone, without any restrictions. This may include information intended for public consumption, such as marketing materials or press releases.</li>
            <li><strong>Internal Use:</strong> Data that is meant for internal use within the organization and should not be disclosed to external parties. This could include employee records, internal memos, or non-sensitive project documentation.</li>
            <li><strong>Confidential:</strong> Data that is sensitive and requires protection from unauthorized access or disclosure. This may include financial records, customer information, or intellectual property.</li>
            <li><strong>Restricted:</strong> Highly sensitive data that is subject to strict access controls and additional security measures. This could include trade secrets, classified government information, or personal health records.</li>
            <li><strong>Top Secret:</strong> The highest level of classification, reserved for the most sensitive and critical information. Access to top-secret data is typically highly restricted and closely monitored. This could include national security information or highly confidential business strategies.</li>
            </ol>

            <h5>Customize Your Data Classification
                            <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>

            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                <tr>
                    <!-- <th style="width: 5%">#</th> -->
                    <th style="width: 5%">Value</th>
                    <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Application Architecture</h4>

            <p>n-tier application architecture is a software design pattern that divides an application into multiple layers or tiers, each responsible for specific functionality. This architectural style helps in separating concerns, improving scalability, and enhancing maintainability.</p>

            <b>Key Components:</b></br>

            <ul>
            <li><strong>Presentation Tier (UI Tier):</strong> This tier is responsible for handling user interaction and displaying information to the user. It typically includes user interfaces, such as web pages, mobile apps, or desktop applications.</li>
            
            <li><strong>Application Tier (Logic Tier):</strong> Also known as the business logic tier, this layer contains the core functionality of the application. It handles processing of data, business rules, and application logic. It often includes services, controllers, and business objects.</li>
            
            <li><strong>Data Tier:</strong> This tier manages data storage and retrieval. It includes databases, file systems, or any other data storage mechanism. It is responsible for ensuring data integrity, security, and access.</li>
            
            <li><strong>Additional Tiers (optional):</strong> Depending on the complexity of the application, additional tiers such as caching tier, messaging tier, or security tier may be included to address specific requirements.</li>
            </ul>

            <h5>Customize Your Application Architecture
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>
            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Authentication protocol</h4>


            <p>An authentication protocol is a set of rules and procedures used to verify the identity of a user or system in a computer network. It ensures that the entities accessing the network or resources are who they claim to be.</p>


            <b>Common Authentication Protocols:</b><br>

            <ul>
            <li><strong>Username/Password:</strong> A basic authentication method where users provide a username and password for verification.</li>
            
            <li><strong>OAuth:</strong> An open standard for access delegation, commonly used for authorization between applications.</li>
            
            <li><strong>OpenID:</strong> An open standard for decentralized authentication, allowing users to be authenticated by cooperating sites.</li>
            
            <li><strong>LDAP (Lightweight Directory Access Protocol):</strong> A protocol used for accessing and managing directory information services, often used for centralized authentication in organizations.</li>
            
            <li><strong>OAuth 2.0:</strong> An authorization framework that enables third-party applications to obtain limited access to a user's resources without exposing credentials.</li>
            </ul>
            <h5>Customize Your Authentication Protocols
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>

            <table class="table table-striped table-sm" style="width: 100%">
                <thead>
                        <tr>
                            <!-- <th style="width: 5%">#</th> -->
                            <th style="width: 5%">Value</th>
                            <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Network location in comtext of data inspection</h4>

            <p>In the context of data inspection, network location refers to the physical or logical position of a device or system within a computer network where data inspection takes place. This location can vary depending on the architecture of the network and the specific requirements of data inspection techniques.</p>


            <b>Data Inspection Techniques:</b><br>

            <p>Various techniques can be used for data inspection depending on the network location and specific requirements:</p>

            <ul>
            <li><strong>Packet Inspection:</strong> Analyzing individual network packets to inspect their contents, headers, and metadata.</li>
            
            <li><strong>Deep Packet Inspection (DPI):</strong> Examining the payload of packets at the application layer to identify and classify traffic based on application protocols or content.</li>
            
            <li><strong>Content Filtering:</strong> Filtering or blocking specific types of content or websites based on predefined policies or rules.</li>
            
            <li><strong>Intrusion Detection and Prevention Systems (IDPS):</strong> Monitoring network traffic for signs of malicious activity or security threats and taking automated actions to prevent or mitigate them.</li>
            </ul>

            <h5>Customize Your Data Instection Environment
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>

            <table class="table table-striped table-sm" style="width: 100%">
            <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Authentization factors</h4>

            <p>Authentication factors are the various elements or methods used to verify the identity of a user attempting to access a system or network. These factors are used in authentication processes to ensure that only authorized individuals or entities gain access to protected resources.</p>

            <p>Common combinations of authentication factors in MFA include:</p>

            <ul>
            <li>Knowledge + Possession (e.g., password + OTP sent to a mobile device)</li>
            <li>Knowledge + Inherence (e.g., password + fingerprint scan)</li>
            <li>Knowledge + Possession + Inherence (e.g., password + smart card + fingerprint scan)</li>
            </ul>

            <h5>Customize Your Authentication Factors
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>
            <table class="table table-striped table-sm" style="width: 100%">
            <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Data Integrity</h4>


            <p>Digital signing is a cryptographic process used to ensure the authenticity, integrity, and non-repudiation of digital data or documents. It involves using cryptographic algorithms and keys to generate a unique digital signature that can be attached to the data.</p>

            <b>Digital Signing Techniques:</b><br>

            <ol>
            <li><strong>RSA (Rivest-Shamir-Adleman):</strong> A widely-used asymmetric cryptographic algorithm for digital signing and encryption. In RSA digital signing, the signer's private key is used to encrypt the hash value of the data, while the corresponding public key is used to verify the signature.</li>
            
            <li><strong>HMAC (Hash-based Message Authentication Code):</strong> A technique for generating a cryptographic hash of the data combined with a secret key. HMAC is commonly used for message authentication and integrity checking in digital signing.</li>
            
            <li><strong>Hash Functions:</strong> Cryptographic hash functions such as SHA-256, SHA-3, or MD5 are used to generate a fixed-size hash value from the data. The hash value serves as a unique identifier for the data and is used in digital signing to ensure data integrity.</li>
            
            <li><strong>Timestamping:</strong> Adding a timestamp to the digital signature provides additional evidence of the time at which the signature was created. Timestamping helps prevent repudiation and ensures the long-term validity of digital signatures.</li>
            </ol>

            <h5>Customize Your Data Integrity
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>
            <table class="table table-striped table-sm" style="width: 100%">
            <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>Encryption and Data Protection</h4>

            <p>Encryption is a process of converting plain text or data into a ciphertext format using cryptographic algorithms and keys. This process helps secure sensitive information by making it unreadable to unauthorized parties. Encryption is widely used to protect data during transmission and storage, ensuring confidentiality and privacy.</p>

            <b>Encryption Techniques: </b><br>

            <ol>
            <li><strong>RSA (Rivest-Shamir-Adleman):</strong> An asymmetric encryption algorithm widely used for securing communications and digital signatures. RSA uses a pair of public and private keys for encryption and decryption.</li>
            
            <li><strong>AES (Advanced Encryption Standard):</strong> A symmetric encryption algorithm adopted as a standard by the U.S. government for securing sensitive information. AES operates on blocks of data and supports key lengths of 128, 192, or 256 bits.</li>
            
            <li><strong>DES (Data Encryption Standard):</strong> A symmetric encryption algorithm widely used in the past but now considered insecure due to its small key size (56 bits). DES has been largely replaced by more secure algorithms such as AES.</li>
            
            <li><strong>Encoding:</strong> Encoding is not encryption, but it's often confused with encryption. Encoding involves converting data into a different format, such as Base64 or hexadecimal, for transmission or storage purposes. Unlike encryption, encoded data can be easily reversed back to its original form without the need for a key.</li>
            </ol>

            <h5>Customize Your Data Protection
                <a href="<?php echo CoreFunctions::PAGE_ADD_ASPECT; ?>" class="btn btn-primary" style="float:right;">New</a>
            </h5>


            <table class="table table-striped table-sm" style="width: 100%">
            <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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
            <h4>User privileges</h4>

            <p>User privileges refer to the level of access and permissions granted to individuals or entities within a system or application. Different user privileges determine what actions users can perform and what data they can access. Common user privilege levels include:</p>

        <ul>
        <li><strong>Anonymous User</strong>

        An anonymous user is a user who accesses a system or application without providing any identification or authentication credentials. Anonymous users typically have limited privileges and are granted access to publicly available information or resources.</li>

        <li><strong>App User</strong> An app user is a registered user of an application who has been authenticated and granted access to specific features and functionality within the application. App users typically have access to their own data and settings but may have restricted privileges compared to administrators.</li>

        <li><strong>App Administrator</strong>

        An app administrator, also known as a system administrator or application administrator, is responsible for managing and configuring the application's settings, user accounts, and permissions. App administrators have elevated privileges compared to regular users and can perform administrative tasks such as user management, data management, and system configuration.</li>

        <li><strong>System Administrator (Sys Admin)</strong>

        A system administrator, often referred to as a sys admin, is responsible for managing and maintaining the overall IT infrastructure and systems within an organization. Sys admins have extensive privileges and permissions to perform tasks such as installing software, configuring servers, managing networks, and ensuring the security and availability of IT resources.</li>
                        </ul>
        <h5>Customize Your User Privileges
                
            </h5>

            <table class="table table-striped table-sm" style="width: 100%">
            <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Value</th>
                        <th style="width: 25%">Name</th>
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
                        <!-- <td><?php echo $aspect['id'] ?></td> -->
                        <td><?php echo $aspect['aspect_value'] ?></td>
                        <td><?php echo $aspect['aspect_name'] ?></td>
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

<!--OWASP faktory-->
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">OWASP Risk Assessment </h1>
</div>

        <div>

            <div>
                <h3>OWASP Factors</h3>

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

                                    <p>
                                <h4> Vulnerability Factors</h4><br>
                <p>The next set of factors are related to the vulnerability involved. The goal here is to estimate the likelihood of the particular vulnerability involved being discovered and exploited. Assume the threat agent selected above.</p>

                <ul><b>Ease of Discovery (ed)</b> - How easy is it for this group of threat agents to discover this vulnerability? Practically impossible, difficult, easy, automated tools available</ul>

                <ul><b>Ease of Exploit (ee)</b> - How easy is it for this group of threat agents to actually exploit this vulnerability? Theoretical, difficult, easy, automated tools available</ul>

                <ul><b>Awareness (a)</b> - How well known is this vulnerability to this group of threat agents? Unknown, hidden, obvious, public knowledge</ul>

                <ul><b>Intrusion Detection (ide)</b> - How likely is an exploit to be detected? Active detection in application, logged and reviewed, logged without review, not logged</ul>

                                    </p>
                                    <p>
                                    <h4>Technical Impact Factors</h4><br>
                Technical impact can be broken down into factors aligned with the traditional security areas of concern: confidentiality, integrity, availability, and accountability. The goal is to estimate the magnitude of the impact on the system if the vulnerability were to be exploited. <br>

                <ul><b>Loss of Confidentiality (loc)</b> - How much data could be disclosed and how sensitive is it? Minimal non-sensitive data disclosed, minimal critical data disclosed, extensive non-sensitive data disclosed, extensive critical data disclosed, all data disclosed</ul>
                <ul><b>Loss of Integrity (li)</b> - How much data could be corrupted and how damaged is it? Minimal slightly corrupt data, minimal seriously corrupt data, extensive slightly corrupt data, extensive seriously corrupt data, all data totally corrupt</ul>
                <ul><b>Loss of Availability (lav)</b>- How much service could be lost and how vital is it? Minimal secondary services interrupted (1), minimal primary services interrupted, extensive secondary services interrupted, extensive primary services interrupted, all services completely lost</ul>
                <ul><b>Loss of Accountability (lac)</b>- Are the threat agents’ actions traceable to an individual? Fully traceable, possibly traceable, completely anonymous</ul>
                                </p>
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

                <h4>Customize OWASP Factors
                    <a href="<?php echo CoreFunctions::PAGE_ADD_DREAD; ?>" class="btn btn-primary" style="float:right;">New</a>
                </h4>

                <!-- TEXT  -->
                <table class="table table-striped table-sm" style="width: 100%">
                    <thead>
                    <tr>
                        <!-- <th style="width: 5%">#</th> -->
                        <th style="width: 5%">Level</th>
                        <th style="width: 5%">Cathegory</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>



                    <tbody>
                    <?php
                    $dreads = $aspectFunctions->displayDataDread();
                    foreach ($dreads as $dread) {
                        ?>
                        <tr>
                            <!-- <td><?php echo $dread['id'] ?></td> -->
                            <td><?php echo $dread['dread_level'] ?></td>
                            <td><?php echo $dread['dread_name'] ?></td>
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
